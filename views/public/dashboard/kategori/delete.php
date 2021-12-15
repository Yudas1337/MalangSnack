<?php
require_once __DIR__ . "/../../../../controllers/CategoryController.php";
if (isset($_GET['id'])) {
    $id = abs($_GET['id']);
    $category = new CategoryController();
    $category->delete($id);
}
