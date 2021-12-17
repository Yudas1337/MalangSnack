<?php
require_once __DIR__ . "/../../../../controllers/ProductController.php";

if (isset($_GET['id'])) {
    $id = abs($_GET['id']);
    $product = new ProductController();
    $product->delete($id);
}
