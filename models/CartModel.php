<?php
require_once __DIR__ . "/../configs/Config.php";
require_once __DIR__ . "/../helpers/formHelper.php";

class CartModel extends Config
{

    private $formHelper;

    function __construct()
    {
        parent::__construct();
        $this->formHelper = new formHelper();
    }

    /**
     * add items to cart .
     * @return void
     */

    public function add(int $id): void
    {
        $qty = $this->formHelper->sanitizeInput($_POST['qty']);

        $sql = $this->db->query("SELECT * FROM product WHERE id = '$id'");
        $fetch = $sql->fetch_object();
        $countRows = $sql->num_rows;

        if ($countRows > 0) {
            if ($fetch->stock < $qty) {
                alertHelper::failedActions("Stok produk tidak mencukupi");
            } else {
                $_SESSION['cart'][$fetch->id] = array(
                    'id'  => $fetch->id,
                    'qty' => $qty
                );
            }
        } else {
            alertHelper::failedActions("Produk tidak valid");
        }
    }
}
