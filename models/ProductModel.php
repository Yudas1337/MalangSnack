<?php
require_once __DIR__ . "/../configs/Config.php";
require_once __DIR__ . "/../interfaces/IMain.php";
require_once __DIR__ . "/../helpers/formHelper.php";
require_once __DIR__ . "/../helpers/fileHelper.php";

class ProductModel extends Config implements IMain
{
    private $formHelper;
    private $upload_path = "assets/images/product/";

    function __construct()
    {
        parent::__construct();
        $this->formHelper = new formHelper();
    }

    public function show(): array
    {
        $arr = array();

        $sql = $this->db->query("SELECT * FROM product");
        while ($data = $sql->fetch_object()) {
            $arr[] = $data;
        }

        return $arr;
    }

    public function save(): void
    {
        $product_id     = $this->formHelper->sanitizeInput($_POST['product_id']);
        $category_id    = $this->formHelper->sanitizeInput($_POST['category_id']);
        $supplier_id    = $this->formHelper->sanitizeInput($_POST['supplier_id']);
        $name           = $this->formHelper->sanitizeInput($_POST['name']);
        $merk           = $this->formHelper->sanitizeInput($_POST['merk']);
        $description    = $this->formHelper->sanitizeInput($_POST['description']);
        $price          = $this->formHelper->sanitizeInput($_POST['price']);
        $stock          = $this->formHelper->sanitizeInput($_POST['stock']);

        $thumbnail = $_FILES['thumbnail'];
        $thumbnail = fileHelper::_doUpload($this->upload_path, $thumbnail);

        $this->db->query("INSERT INTO product VALUES (NULL, '$product_id', '$category_id','$supplier_id','$name','$merk','$description','$thumbnail','$price','$stock', NOW(), NOW())");
    }

    public function update(int $id): void
    {
        $product_id     = $this->formHelper->sanitizeInput($_POST['product_id']);
        $category_id    = $this->formHelper->sanitizeInput($_POST['category_id']);
        $supplier_id    = $this->formHelper->sanitizeInput($_POST['supplier_id']);
        $name           = $this->formHelper->sanitizeInput($_POST['name']);
        $merk           = $this->formHelper->sanitizeInput($_POST['merk']);
        $description    = $this->formHelper->sanitizeInput($_POST['description']);
        $price          = $this->formHelper->sanitizeInput($_POST['price']);
        $stock          = $this->formHelper->sanitizeInput($_POST['stock']);


        $sql = $this->db->query("SELECT * FROM product WHERE id = '$id'");
        $fetch = $sql->fetch_object();
        $countRows = $sql->num_rows;

        $thumbnail = $fetch->thumbnail;

        if ($countRows > 0) {
            if (!empty($_FILES['thumbnail']['name'])) {
                fileHelper::_removeImage($this->upload_path, $thumbnail);
                $thumbnail = $_FILES['thumbnail'];
                $thumbnail = fileHelper::_doUpload($this->upload_path, $thumbnail);
            }

            $this->db->query("UPDATE product SET product_id = '$product_id', category_id ='$category_id', supplier_id = '$supplier_id', name = '$name', merk = '$merk', description = '$description', thumbnail = '$thumbnail', price = '$price', stock = '$stock' WHERE id = '$id'");
        } else {
            alertHelper::failedActions("data tidak ditemukan");
        }
    }

    public function delete(int $id): void
    {
        $sql = $this->db->query("SELECT * FROM product WHERE id = '$id'")->fetch_object();
        fileHelper::_removeImage($this->upload_path, $sql->thumbnail);
        $this->db->query("DELETE FROM product WHERE id = '$id'");
    }

    public function getById(int $id): array
    {
        $arr = array();
        $sql = $this->db->query("SELECT * FROM product WHERE id = '$id'")->fetch_object();
        $arr['id']              = $sql->id;
        $arr['product_id']      = $sql->product_id;
        $arr['category_id']     = $sql->category_id;
        $arr['supplier_id']     = $sql->supplier_id;
        $arr['name']            = $sql->name;
        $arr['merk']            = $sql->merk;
        $arr['description']     = $sql->description;
        $arr['thumbnail']       = $sql->thumbnail;
        $arr['price']           = $sql->price;
        $arr['stock']           = $sql->stock;

        return $arr;
    }

    public function countRows(): int
    {
        return $this->db->query("SELECT * FROM product")->num_rows;
    }

    public function getLatestProduct(): array
    {
        $arr = array();

        $sql = $this->db->query("SELECT * FROM product ORDER BY id DESC LIMIT 9");
        while ($data = $sql->fetch_object()) {
            $arr[] = $data;
        }

        return $arr;
    }

    public function getFavoriteProduct(): array
    {
        $arr = array();

        $sql = $this->db->query("SELECT DISTINCT od.product_id, p.*, SUM(od.qty) AS favorit FROM order_details od JOIN product p ON od.product_id = p.id GROUP BY p.id ORDER BY favorit DESC LIMIT 9");
        while ($data = $sql->fetch_object()) {
            $arr[] = $data;
        }

        return $arr;
    }
}
