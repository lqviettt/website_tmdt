<?php
require_once "database.php"
?>

<link rel="stylesheet" href="/">

<?php
class product
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }


    public function show_category()
    {
        $query = "SELECT * FROM tbl_category";
        $result = $this->db->select($query);
        return $result;
    }

    public function show_items()
    {
        // $query = "SELECT * FROM tbl_itemss";
        $query = "SELECT tbl_itemss.*, tbl_category.category_name FROM tbl_itemss INNER JOIN tbl_category ON tbl_itemss.category_id = tbl_category.category_id";
        $result = $this->db->select($query);
        return $result;
    }

    public function show_product()
    {
        // $query = "SELECT * FROM tbl_itemss";
        $query = "SELECT p.product_id, p.product_name, i.items_name, p.product_price, p.product_img
        FROM tbl_product p
        JOIN tbl_itemss i ON p.items_id = i.items_id
        WHERE p.category_id = i.category_id";
        $result = $this->db->select($query);
        return $result;
    }

    public function insert_product()
    {
        $product_name = $_POST['product_name'];
        $category_id = $_POST['category_id'];
        $items_id = $_POST['items_id'];
        $product_price = $_POST['product_price'];
        $product_img = $_FILES['product_img']['name'];
        $file_path = '../assets/uploads_img/';
        $fileurl = $file_path . $_FILES['product_img']['name'];

        $filetarget = basename($_FILES['product_img']['name']);
        $filetype = strtolower(pathinfo($product_img, PATHINFO_EXTENSION));
        $filesize = $_FILES['product_img']['size'];

        // if(file_exists("uploads_img/$filetarget")){
        //     $alert = " File da ton tai";
        //     return $alert;
        // }else{
        //     if($filetype != "jpg" && $filetype != "png" && $filetype != "jpeg"){
        //         $alert = " Chi chon file jpg, png, jpeg";
        //         return $alert;
        //     }else{
        if ($filesize > 1000000) {
            $alert = " File khong duoc lon hon 1MB";
            return $alert;
        } else {
            move_uploaded_file(
                $_FILES['product_img']['tmp_name'],
                "../assets/uploads_img/" . $_FILES['product_img']['name']
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
                            '$fileurl')";
            $result = $this->db->insert($query);
        }
        //     }
        // }
        header('Location:productlist.php');
        return $result;
    }

    public function update_product($product_id)
    {
        $product_name = $_POST['product_name'];
        $category_id = $_POST['category_id'];
        $items_id = $_POST['items_id'];
        $product_price = $_POST['product_price'];
        $file_path = '../assets/uploads_img/';
        $fileurl = $file_path . $_FILES['product_img']['name'];
        $filesize = $_FILES['product_img']['size'];
        
        // $current_img = $_POST['current_img'];

        // $product_img = $_FILES['product_img']['name'];
        // $filetype = strtolower(pathinfo($product_img, PATHINFO_EXTENSION));
        // if ($filetype != "jpg" && $filetype != "png" && $filetype != "jpeg") {
        //     $alert = " Chi chon file jpg, png, jpeg";
        //     return $alert;
        // } else {
       
            if ($filesize > 1000000) {
                $alert = " File khong duoc lon hon 1MB";
                return $alert;
            } else {
                move_uploaded_file(
                    $_FILES['product_img']['tmp_name'],
                    "../assets/uploads_img/" . $_FILES['product_img']['name']
                );

                // Test không chọn ảnh
                // if (!empty($files['product_img']['name'])) {
                //     $file_name = $files['product_img']['name'];
                //     $file_temp = $files['product_img']['tmp_name'];
                //     $div = explode('.', $file_name);
                //     $file_ext = strtolower(end($div));
                //     $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
                //     $uploaded_image = "../uploads_img/" . $unique_image;
        
                //     move_uploaded_file($file_temp, $uploaded_image);
                // } else {
                //     $uploaded_image = $current_img;  // Retain the current image
                // }

                // 
                $query = "UPDATE tbl_product SET
                product_name = '$product_name',
                category_id = '$category_id',
                items_id = '$items_id',
                product_price = '$product_price',
                product_img = '$fileurl'
                WHERE product_id = $product_id";
                $result = $this->db->update($query);
            }
        
        header('Location:productlist.php');
        return $result;
    }

    public function delete_product($product_id)
    {
        $query = "DELETE FROM tbl_product WHERE product_id = $product_id";
        $result = $this->db->delete($query);
        return $result;
    }
    // Font_end
    public function get_product_by_id($product_id)
    {
        $query = "SELECT p.product_id, p.product_name, p.product_price, p.product_img, 
                 i.items_name, i.items_id, c.category_name, c.category_id
          FROM tbl_product p
          JOIN tbl_itemss i ON p.items_id = i.items_id
          JOIN tbl_category c ON i.category_id = c.category_id
          WHERE p.product_id = $product_id";
        $result = $this->db->select($query);
        return $result;
    }

    public function show_product_by_items($items_id)
    {
        $query = "SELECT * FROM tbl_product WHERE items_id = '$items_id'";
        $result = $this->db->select($query);
        return $result;
    }
}
?>
