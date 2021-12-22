<?php
require_once __DIR__ . "/../configs/Config.php";
require_once __DIR__ . "/../helpers/formHelper.php";
require_once __DIR__ . "/../helpers/fileHelper.php";

class InvoiceModel extends Config
{
    public function getInvoice($idUser): array 
    {
        $arr = array();

        $sql = $this->db->query("SELECT * FROM orders WHERE user_id = '$idUser'");
        while ($data = $sql->fetch_object()) {
            $arr[] = $data;
        }

        return $arr;
    }

    public function getById($idInvoice) : object 
    {
        $sql = $this->db->query("SELECT * FROM orders WHERE invoice_id = '$idInvoice'")->fetch_object();

        return $sql;
    }

    public function getDetailOrder($idInvoice) : array 
    {
        $arr = array();

        $sql = $this->db->query("SELECT * FROM order_details od JOIN product p ON od.product_id = p.id  WHERE od.orders_id = '$idInvoice'");
        while ($data = $sql->fetch_object()) {
            $arr[] = $data;
        }

        return $arr;
    }
}