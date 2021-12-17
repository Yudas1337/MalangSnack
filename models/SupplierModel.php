<?php
require_once __DIR__ . "/../configs/Config.php";
require_once __DIR__ . "/../interfaces/IMain.php";
require_once __DIR__ . "/../helpers/formHelper.php";
require_once __DIR__ . "/../helpers/fileHelper.php";

class SupplierModel extends Config implements IMain
{
    private $formHelper;
    private $redirect = "index.php?page=dashboard&content=supplier&menu=list";

    function __construct()
    {
        parent::__construct();
        $this->formHelper = new formHelper();
    }

    public function show(): array
    {
        $arr = array();

        $sql = $this->db->query("SELECT * FROM supplier");
        while ($data = $sql->fetch_object()) {
            $arr[] = $data;
        }

        return $arr;
    }

    public function save(): void
    {
        $name         = $this->formHelper->sanitizeInput($_POST['name']);
        $address      = $this->formHelper->sanitizeInput($_POST['address']);
        $phone_number = formHelper::changePhoneFormat($this->formHelper->sanitizeInput($_POST['phone_number']));

        $this->db->query("INSERT INTO supplier VALUES (NULL, '$name', '$address', '$phone_number', NOW(), NOW())");
    }

    public function update(int $id): void
    {
        $name         = $this->formHelper->sanitizeInput($_POST['name']);
        $address      = $this->formHelper->sanitizeInput($_POST['address']);
        $phone_number = formHelper::changePhoneFormat($this->formHelper->sanitizeInput($_POST['phone_number']));

        $sql = $this->db->query("SELECT * FROM supplier WHERE id = '$id'");
        $countRows = $sql->num_rows;

        if ($countRows > 0) {
            $this->db->query("UPDATE supplier SET name = '$name', address = '$address', phone_number = '$phone_number' WHERE id = '$id'");
        } else {
            alertHelper::failedActions("data tidak ditemukan");
        }
    }
    public function delete(int $id): void
    {
        $query = $this->db->query("DELETE FROM supplier WHERE id = '$id'");

        if (!$query) {
            alertHelper::failedAndRedirect("Data supplier sedang digunakan", $this->redirect);
        } else {
            alertHelper::successAndRedirect("Berhasil hapus supplier", $this->redirect);
        }
    }

    public function getById(int $id): array
    {
        $arr = array();
        $sql = $this->db->query("SELECT * FROM supplier WHERE id = '$id'")->fetch_object();
        $arr['id']   = $sql->id;
        $arr['name'] = $sql->name;
        $arr['address'] = $sql->address;
        $arr['phone_number'] = $sql->phone_number;

        return $arr;
    }
}
