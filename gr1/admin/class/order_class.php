<?php
require_once "database.php"
?>

<?php
class order{
    private $db;

    public function __construct(){
        $this -> db = new Database();
    }
    
    public function show_orders(){
        $query = "SELECT * FROM tbl_orders JOIN tbl_order_product 
                ON tbl_orders.order_id = tbl_order_product.order_id";
        $result = $this->db->select($query);
        return $result;
    }

    public function delete_order($order_id){
        $query = "DELETE FROM tbl_orders WHERE order_id = '$order_id'";
        $result = $this -> db -> delete($query);
        header('Location:orderlist.php');
        return $result;
    }
}
?>