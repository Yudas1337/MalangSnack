<?php

require_once __DIR__ . "/../configs/Config.php";
require_once __DIR__ . "/../helpers/formHelper.php";

class SearchModel extends Config 
{

    private $formHelper;

    function __construct()
    {
        parent::__construct();
        $this->formHelper = new formHelper();
    }

    public function search($key): array
    {
        $key = $this->formHelper->sanitizeInput($key);
        $arr = array();

        $sql = $this->db->query("SELECT * FROM product WHERE name LIKE '%$key%' OR merk LIKE '%$key%'");
        while ($data = $sql->fetch_object()) {
            $arr[] = $data;
        }

        return $arr;
    }

    public function filter($key): array
    {
        $key = $this->formHelper->sanitizeInput($key);
        $arr = array();

        $sql = $this->db->query("SELECT * FROM product WHERE category_id = $key");
        while ($data = $sql->fetch_object()) {
            $arr[] = $data;
        }

        return $arr;
    }
}