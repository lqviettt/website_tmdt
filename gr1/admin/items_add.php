<?php
include "header.php";
include "slider.php";
include "class/items_class.php";
?>

<?php
    $items = new items;
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $category_id = $_POST['category_id'];
        $items_name = $_POST['items_name'];
        $insert_items = $items -> insert_items($category_id, $items_name); 
    }
?>

<style>
    select{
        height: 30px;
        width: 200px;
    }
</style>

<div class="admin-content-right">
            <div class="admin-content-right-category_add">
                <h1>Thêm loại sản phẩm</h1><br>
                <form action="" method="POST">
                    <select name="category_id" id="">
                        <option value="">Chọn danh mục</option>
                        <?php
                        $show_category = $items ->show_category();
                        if($show_category){
                            while($result = $show_category -> fetch_assoc()){
                            ?>
                            <option value="<?php echo $result ['category_id']?>"><?php echo $result ['category_name']?></option>
                            <?php
                            }
                        }
                        ?>
                    </select> <br>
                    <input required name="items_name" type="text" placeholder="Nhập tên loại sản phẩm">
                    <button type="submit">Thêm</button>
                </form>
            </div>
        </div>
    </section>
</body>
</html>