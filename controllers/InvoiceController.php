<?php
require_once __DIR__ . "/Controller.php";
require_once __DIR__ . "/../models/InvoiceModel.php";

class InvoiceController
{
    private $redirect = "index.php?page=dashboard&content=invoice&menu=list";
    private $invoiceModel;

    function __construct()
    {
        $this->invoiceModel = new InvoiceModel();
    }

    /**
     * Get Invoice
     * @return array
     */
    public function getInvoice(): array
    {
        $idUser = $_SESSION['user_id'];
        return $this->invoiceModel->getInvoice($idUser);
    }

    /**
     * Get By Id
     * @return object
     */
    public function getById($idInvoice): object
    {
        return $this->invoiceModel->getById($idInvoice);
    }

    /**
     * Get Detail Order
     * @return array
     */
    public function getDetailOrder($idInvoice): array
    {
        return $this->invoiceModel->getDetailOrder($idInvoice);
    }

    /**
     * upload transfer
     * @return void
     */
    public function uploadTransfer(string $idInvoice): void
    {
        formHelper::shouldUpload($_FILES['transfer_verify']['name'], 'Bukti Upload');

        $this->invoiceModel->uploadTransfer($idInvoice);
        alertHelper::successAndRedirect("Berhasil upload bukti transfer", $this->redirect);
    }
}
