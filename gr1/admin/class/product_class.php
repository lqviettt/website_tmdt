<?php
include "database.php"
?>

<?php
class product{
    private $db;

    public function __construct(){
        $this -> db = new Database();
    }


     public function show_category(){
        $query = "SELECT * FROM tbl_category";
        $result = $this -> db -> select($query);
        return $result;
    }

    public function show_items(){
        // $query = "SELECT * FROM tbl_itemss";
        $query = "SELECT tbl_itemss.*, tbl_category.category_name FROM tbl_itemss INNER JOIN tbl_category ON tbl_itemss.category_id = tbl_category.category_id";
        $result = $this -> db -> select($query);
        return $result;
    }

    public function insert_product(){
        $product_name = $_POST['product_name'];
        $category_id = $_POST['category_id'];
        $items_id = $_POST['items_id'];
        $product_price = $_POST['product_price'];
        $product_img = $_FILES['product_img']['name'];
        move_uploaded_file(
            $_FILES['product_img']['tmp_name'], "uploads/".$_FILES['product_img']['name']
        );

        $query = "INSERT INTO tbl_product (
                product_name,
                category_id, 
                items_id,
                product_price,
                product_img 
            ) VALUES (
                '$product_name',
                '$category_id',
                '$items_id',
                '$product_price',
                '$product_img')";
        $result = $this ->db-> insert($query);
        // header('Location:product_list.php');
        return $result;
    }











    



  
    public function get_items($items_id){
        $query = "SELECT * FROM tbl_itemss WHERE items_id = '$items_id' ";
        $result = $this -> db -> select($query);
        return $result;
    }

    public function update_items($items_name, $items_id){
        $query = "UPDATE tbl_itemss SET items_name = '$items_name' WHERE items_id = '$items_id' ";
        $result = $this -> db -> update($query);
        header('Location:items_list.php');
        return $result;
    }

    public function delete_items($items_id){
        $query = "DELETE FROM tbl_itemss WHERE items_id = '$items_id'";
        $result = $this -> db -> delete($query);
        header('Location:items_list.php');
        return $result;
    }
}
?>