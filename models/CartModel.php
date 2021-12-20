<?php
require_once __DIR__ . "/../configs/Config.php";
require_once __DIR__ . "/../helpers/formHelper.php";
require_once __DIR__ . "/../interfaces/IForm.php";

class CartModel extends Config implements IForm
{

    private $formHelper;

    function __construct()
    {
        parent::__construct();
        $this->formHelper = new formHelper();
    }

    /**
     * Check items input qty .
     * @return void
     */

    private function checkQty(int $qty): void
    {
        if ($qty <= 0) {
            alertHelper::failedActions("Jumlah produk tidak valid");
        }
    }

    /**
     * Count total cart items .
     * @return void
     */

    private function countRows(): int
    {
        return count($_SESSION['cart']);
    }

    /**
     * add items to cart .
     * @return void
     */

    public function add(int $id): void
    {
        $this->filterForm();
        $qty = $this->formHelper->sanitizeInput($_POST['qty']);

        $this->checkQty($qty);

        $sql = $this->db->query("SELECT * FROM product WHERE id = '$id'");
        $fetch = $sql->fetch_object();
        $countRows = $sql->num_rows;

        if ($countRows > 0) {
            if ($fetch->stock < $qty) {
                alertHelper::failedActions("Stok produk tidak mencukupi");
            } else {
                $item_data = array(
                    'id' => $fetch->id,
                    'qty' => $qty
                );
                $_SESSION['cart'][$fetch->id] = $item_data;
            }
        } else {
            alertHelper::failedActions("Produk tidak valid");
        }
    }

    /**
     * delete items in cart
     * @return void
     */

    public function delete(int $id): void
    {
        if (isset($_SESSION['cart'][$id])) {
            unset($_SESSION['cart'][$id]);
        } else {
            alertHelper::failedActions("Produk tidak valid atau belum ada di keranjang");
        }


        if ($this->countRows() == 0) {
            unset($_SESSION['cart']);
        }
    }

    /**
     * update cart qty from $id
     * @return void
     */

    public function update(int $id): void
    {
        $this->filterForm();
        $qty = $this->formHelper->sanitizeInput($_POST['qty']);

        $this->checkQty($qty);

        $sql = $this->db->query("SELECT * FROM product WHERE id = '$id'");
        $fetch = $sql->fetch_object();
        $countRows = $sql->num_rows;

        if ($countRows > 0) {
            if ($fetch->stock < $qty) {
                alertHelper::failedActions("Stok produk tidak mencukupi");
            } else {
                $item_data = array(
                    'id' => $fetch->id,
                    'qty' => $qty
                );
                $_SESSION['cart'][$fetch->id] = $item_data;
            }
        } else {
            alertHelper::failedActions("Produk tidak valid");
        }
    }

    /**
     * destroy cart sessions
     * @return void
     */

    public function destroy(): void
    {
        unset($_SESSION['cart']);
    }

    /**
     * form validation for qty
     * @return void
     */
    public function filterForm(): void
    {
        $this->formHelper->isNotNull(['qty']);
    }
}
