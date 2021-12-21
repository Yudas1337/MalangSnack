<?php
require_once __DIR__ . "/../models/CheckoutModel.php";

class CheckoutController
{
    private $checkoutModel;

    function __construct()
    {
        $this->checkoutModel = new CheckoutModel();
    }

    /**
     * checkout current session.
     * @return void
     */
    public function checkout(string $invoice_id): void
    {
        $this->checkoutModel->checkout($invoice_id);
    }
}
