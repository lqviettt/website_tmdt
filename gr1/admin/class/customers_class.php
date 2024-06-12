<?php
require_once "database.php"
?>

<?php
class customers{
    private $db;

    public function __construct(){
        $this -> db = new Database();
    }
    
    public function show_customers(){
        $query = "SELECT * FROM tbl_customers";
        $result = $this->db->select($query);
        return $result;
    }

    public function delete_customer($customer_id){
        $query = "DELETE FROM tbl_customers WHERE customer_id = '$customer_id'";
        $result = $this -> db -> delete($query);
        header('Location:customerlist.php');
        return $result;
    }
}
?>