<?php
require_once __DIR__ . "/../../../../controllers/SupplierController.php";
require_once __DIR__ . "/../../../layouts/dashboard/sidebar.php";
require_once __DIR__ . "/../../../layouts/dashboard/footer.php";
if (isset($_GET['id'])) {
    $id = abs($_GET['id']);
    $supplier = new SupplierController();
    $supplier->delete($id);
}
