<?php
require_once __DIR__ . "/../configs/Config.php";
require_once __DIR__ . "/../helpers/formHelper.php";
require_once __DIR__ . "/../controllers/ProductController.php";

class CheckoutModel extends Config
{
    private $formHelper, $productController;

    function __construct()
    {
        parent::__construct();
        $this->formHelper = new formHelper();
        $this->productController = new ProductController();
    }

    public function checkout(string $invoice_id): void
    {
        $amount = 0;
        $delivery_cost = 0;
        $total_amount = 0;

        $invoice_id     = $this->formHelper->sanitizeInput($invoice_id);
        $user_id        = $_SESSION['user_id'];
        $email          = $this->formHelper->sanitizeInput($_POST['email']);
        $name           = $this->formHelper->sanitizeInput($_POST['name']);
        $phone_number   = $this->formHelper->sanitizeInput($_POST['phone_number']);
        $address        = $this->formHelper->sanitizeInput($_POST['address']);
        $payment_method = $this->formHelper->sanitizeInput($_POST['payment_method']);
        $delivery       = $this->formHelper->sanitizeInput($_POST['delivery']);

        foreach ($_SESSION['cart'] as $cart) {
            $data = $this->productController->getById($cart['id']);
            $amount += ($data['price'] * $cart['qty']);
        }

        $delivery_cost = $amount * 0.1;

        $total_amount = $amount + $delivery_cost;

        $this->db->query("INSERT INTO orders VALUES ('$invoice_id', '$user_id', '$email', '$name', '$phone_number', '$address', '$amount', '$delivery_cost', '$total_amount', 'PENDING','$payment_method','$delivery',NULL,NULL,NOW(),NOW())");

        foreach ($_SESSION['cart'] as $cart) {
            $data = $this->productController->getById($cart['id']);
            $product_id = $data['id'];
            $price = $data['price'];
            $qty = $cart['qty'];
            $current = $data['stock'] - $cart['qty'];
            $this->db->query("INSERT INTO order_details VALUES(NULL, '$invoice_id', '$product_id', '$price','$qty', NOW(), NOW())");
            $this->db->query("UPDATE product SET stock = '$current' WHERE id = '$product_id'");
        }

        unset($_SESSION['cart']);
    }
}
