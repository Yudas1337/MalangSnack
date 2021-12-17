<?php
require_once __DIR__ . "/../configs/Config.php";
require_once __DIR__ . "/../helpers/fileHelper.php";


class HomeProductModel extends Config
{
    public function getCategory():  array
    {
        $arr = array();

        $sql = $this->db->query("SELECT * FROM category");
        while ($data = $sql->fetch_object()) {
            $arr[] = $data;
        }

        return $arr;
    }

    public function getProduct():  array
    {
        $arr = array();

        $sql = $this->db->query("SELECT * FROM product");
        while ($data = $sql->fetch_object()) {
            $arr[] = $data;
        }

        return $arr;
    }

    public function getProductDetail($id): object
    {
        return $this->db->query("SELECT * FROM product WHERE id='$id'")->fetch_object();
    }
}