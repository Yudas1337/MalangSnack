<?php
require_once __DIR__ . "/Controller.php";
require_once __DIR__ . "/../models/InvoiceModel.php";

class InvoiceController 
{
    private $invoiceModel;

    function __construct()
    {
        $this->invoiceModel = new InvoiceModel();
    }

    public function getInvoice() : array
    {
        $idUser = $_SESSION['user_id'];
        return $this->invoiceModel->getInvoice($idUser);
    }

    public function getById($idInvoice) : object 
    {
        return $this->invoiceModel->getById($idInvoice);
    }

    public function getDetailOrder($idInvoice) : array 
    {
        return $this->invoiceModel->getDetailOrder($idInvoice);
    }
}