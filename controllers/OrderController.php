<?php
require_once __DIR__ . "/../models/OrderModel.php";

class OrderController
{
    private $redirect = 'index.php?page=dashboard&content=order&menu=list';
    private $orderModel;

    function __construct()
    {
        $this->orderModel = new OrderModel();
    }

    /**
     * GetAll orders
     * @return array
     */

    public function getAll(): array
    {
        return $this->orderModel->getAll();
    }

    /**
     * Get orders by id
     * @return array
     */

    public function getById(string $id): array
    {
        return $this->orderModel->getById($id);
    }


    /**
     * Get order details
     * @return array
     */

    public function getOrderDetails(string $invoice_id): array
    {
        return $this->orderModel->getOrderDetails($invoice_id);
    }


    /**
     * update invoice
     * @return array
     */
    public function updateInvoice(string $invoice_id): void
    {
        $this->orderModel->updateInvoice($invoice_id);
        alertHelper::successAndRedirect("Berhasil update tagihan", $this->redirect);
    }
}
