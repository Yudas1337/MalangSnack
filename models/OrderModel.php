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

    /**
     * update invoice
     * @return void
     */
    public function updateInvoice(string $invoice_id): void
    {
        $status_paid = $this->formHelper->sanitizeInput($_POST['status_paid']);
        $this->db->query("UPDATE orders SET status_paid = '$status_paid', paid_at = NOW() WHERE invoice_id = '$invoice_id'");
    }


    /**
     * Get revenue
     * @return int
     */
    public function countRevenue(): int
    {
        $sql = $this->db->query("SELECT SUM(o.total_amount) AS revenue FROM orders o")->fetch_object();

        return $sql->revenue;
    }

    /**
     * count orders
     * @return int
     */
    public function countRows(): int
    {
        return $this->db->query("SELECT * FROM orders")->num_rows;
    }

    /**
     * filter orders
     * @return array
     */
    public function getByFilter(string $filter): array
    {
        $arr = array();

        $sql = $this->db->query("SELECT * FROM orders WHERE status_paid = '$filter'");
        while ($data = $sql->fetch_object()) {
            $arr[] = $data;
        }

        return $arr;
    }

    /**
     * filter orders
     * @return array
     */
    public function getNewOrder(): array
    {
        $arr = array();
        $sql = $this->db->query("SELECT DISTINCT od.product_id, o.*, u.*,od.*, o.name AS orderName, SUM(od.qty) AS buyTotal FROM orders o JOIN user u ON o.user_id = u.id JOIN order_details od ON o.invoice_id = od.orders_id WHERE status_paid IN('PENDING','PROGRESS') GROUP BY u.id LIMIT 5");
        while ($data = $sql->fetch_object()) {
            $arr[] = $data;
        }

        return $arr;
    }
}
