<?php
require_once __DIR__ . "/../configs/Config.php";
require_once __DIR__ . "/../helpers/formHelper.php";

class OrderModel extends Config
{
    private $formHelper;

    function __construct()
    {
        parent::__construct();
        $this->formHelper = new formHelper();
    }


    /**
     * Get All orders
     * @return array
     */
    public function getAll(): array
    {
        $arr = array();

        $sql = $this->db->query("SELECT * FROM orders");
        while ($data = $sql->fetch_object()) {
            $arr[] = $data;
        }

        return $arr;
    }

    /**
     * Get order details
     * @return array
     */
    public function getOrderDetails(string $invoice_id): array
    {
        $arr = array();

        $sql = $this->db->query("SELECT * FROM order_details od JOIN product p ON od.product_id = p.id WHERE od.orders_id = '$invoice_id'");
        while ($data = $sql->fetch_object()) {
            $arr[] = $data;
        }

        return $arr;
    }

    /**
     * Get order by id
     * @return array
     */
    public function getById(string $invoice_id): array
    {
        $arr = array();
        $sql = $this->db->query("SELECT * FROM orders WHERE invoice_id = '$invoice_id'")->fetch_object();
        $arr['invoice_id']      = $sql->invoice_id;
        $arr['user_id']         = $sql->user_id;
        $arr['email']           = $sql->email;
        $arr['name']            = $sql->name;
        $arr['phone_number']    = $sql->phone_number;
        $arr['address']         = $sql->address;
        $arr['amount']          = $sql->amount;
        $arr['delivery_cost']   = $sql->delivery_cost;
        $arr['total_amount']    = $sql->total_amount;
        $arr['status_paid']     = $sql->status_paid;
        $arr['payment_method']  = $sql->payment_method;
        $arr['delivery']        = $sql->delivery;
        $arr['transfer_verify'] = $sql->transfer_verify;
        $arr['paid_at']         = $sql->paid_at;
        $arr['created_at']      = $sql->created_at;
        $arr['updated_at']      = $sql->updated_at;

        return $arr;
    }

    public function updateInvoice(string $invoice_id): void
    {
        $status_paid = $this->formHelper->sanitizeInput($_POST['status_paid']);
        $this->db->query("UPDATE orders SET status_paid = '$status_paid', paid_at = NOW() WHERE invoice_id = '$invoice_id'");
    }
}
