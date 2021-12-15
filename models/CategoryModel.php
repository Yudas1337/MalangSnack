<?php
require_once __DIR__ . "/../configs/Config.php";
require_once __DIR__ . "/../interfaces/IMain.php";
require_once __DIR__ . "/../helpers/formHelper.php";
require_once __DIR__ . "/../helpers/fileHelper.php";


class CategoryModel extends Config implements IMain
{
    private $formHelper;
    private $upload_path = "assets/images/category/";

    function __construct()
    {
        parent::__construct();
        $this->formHelper = new formHelper();
    }

    public function show(): array
    {
        $arr = array();

        $sql = $this->db->query("SELECT * FROM category");
        while ($data = $sql->fetch_object()) {
            $arr[] = $data;
        }

        return $arr;
    }

    public function save(): void
    {
        $name = $this->formHelper->sanitizeInput($_POST['name']);
        $icon = $_FILES['icon'];
        $icon = fileHelper::_doUpload($this->upload_path, $icon);

        $this->db->query("INSERT INTO category VALUES (NULL, '$icon', '$name', NOW(), NOW())");
    }

    public function edit(int $id): void
    {
        $name = $this->formHelper->sanitizeInput($_POST['name']);

        $sql = $this->db->query("SELECT * FROM category WHERE id = '$id'");
        $fetch = $sql->fetch_object();
        $countRows = $sql->num_rows;

        $icon = $fetch->icon;

        if ($countRows > 0) {
            if (!empty($_FILES['icon']['name'])) {
                fileHelper::_removeImage($this->upload_path, $icon);
                $icon = $_FILES['icon'];
                $icon = fileHelper::_doUpload($this->upload_path, $icon);
            }

            $this->db->query("UPDATE category SET name = '$name', icon = '$icon' WHERE id = '$id'");
        } else {
            alertHelper::failedActions("data tidak ditemukan");
        }
    }
    public function delete(int $id): void
    {
        $sql = $this->db->query("SELECT * FROM category WHERE id = '$id'")->fetch_object();

        fileHelper::_removeImage($this->upload_path, $sql->icon);
        $this->db->query("DELETE FROM category WHERE id = '$id'");
    }

    public function getById(int $id): array
    {
        $arr = array();
        $sql = $this->db->query("SELECT * FROM category WHERE id = '$id'")->fetch_object();
        $arr['id']   = $sql->id;
        $arr['name'] = $sql->name;
        $arr['icon'] = $sql->icon;

        return $arr;
    }
}
