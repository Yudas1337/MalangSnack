<?php
require_once __DIR__ . "/../../../../controllers/SupplierController.php";
if (isset($_GET['id'])) {
    $id = abs($_GET['id']);
    $supplier = new SupplierController();
    $supplier->delete($id);
}
