<?php
include "header.php";
include "slider.php";
include "class/items_class.php";
?>

<?php
    $items = new items;
    if(!isset($_GET['items_id']) || $_GET['items_id'] == NULL){
        echo "<script>window.location = 'items_list.php'</script";
    }else{
        $items_id = $_GET['items_id'];
    }

    $get_items = $items -> get_items($items_id);

    if($get_items){
        $result = $get_items -> fetch_assoc();
    }
?>

<?php
    $items = new items;
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $items_name = $_POST['items_name'];
        $update_items = $items -> update_items($items_name, $items_id); 
    }
?>

<div class="admin-content-right">
            <div class="admin-content-right-category_add">
                <h1>Thêm danh mục</h1>
                <form action="" method="POST">
                    <input required name="items_name" type="text" placeholder="Nhập tên danh mục" 
                        value="<?php echo $result['items_name']?>">
                    <button type="submit">Sửa</button>
                </form>
            </div>
        </div>
    </section>
</body>
</html>