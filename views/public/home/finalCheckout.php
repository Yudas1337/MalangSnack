<?php
require_once __DIR__ . "/../../../controllers/CheckoutController.php";
if (isset($_POST)) {
    $invoice_id = uniqid("malangsnack-invoice-");
    $checkout = new CheckoutController();
    $checkout->checkout($invoice_id);

    echo json_encode(array(
        'data' => array(
            'id' => $invoice_id
        )
    ));
}
