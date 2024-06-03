<!-- <?php
require_once "database.php"
?> -->

<?php
class Order {
    private $db;

    public function __construct() {
        $this->db = new mysqli('localhost', 'username', 'password', 'website_gr1');
        if ($this->db->connect_error) {
            die("Kết nối thất bại: " . $this->db->connect_error);
        }
    }

    public function create_order($customer_name, $customer_email, $customer_phone, $customer_address, $product_id, $product_price) {
        $this->db->begin_transaction();

        try {
            $customer_query = "INSERT INTO customers (customer_name, customer_email, customer_phone, customer_address) VALUES (?, ?, ?, ?)";
            $customer_stmt = $this->db->prepare($customer_query);
            $customer_stmt->bind_param("ssss", $customer_name, $customer_email, $customer_phone, $customer_address);
            $customer_stmt->execute();
            $customer_id = $this->db->insert_id;

            $order_query = "INSERT INTO tbl_orders (customer_id, product_id, product_price) VALUES (?, ?, ?)";
            $order_stmt = $this->db->prepare($order_query);
            $order_stmt->bind_param("iid", $customer_id, $product_id, $product_price);
            $order_stmt->execute();
            $order_id = $this->db->insert_id;

            $this->db->commit();
            return $order_id;
        } catch (Exception $e) {
            $this->db->rollback();
            return false;
        }
    }
}
?>

