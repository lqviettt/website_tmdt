<?php
include "header.php";
include "slider.php";
include "class/product_class.php";
?>


<?php
    $product = new product;
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $insert_product = $product -> insert_product($_POST, $_FILES); 
    }
?>

<div class="admin-content-right">
            <div class="admin-content-right-product_add">
                <h1>Thêm sản phẩm</h1>
                <form action="" method="POST" enctype="multipart/form-data">
                    <label for="">Nhập tên sản phẩm <span style="color :brown">*</span></label>
                    <input name="product_name" required type="text">
                    <label for="">Chọn danh mục <span style="color :brown">*</span></label>
                    <select name="category_id" id="">
                        <option value="">Chọn</option>
                        <?php
                        $show_category = $product ->show_category();
                        if($show_category){
                            while($result = $show_category -> fetch_assoc()){
                            ?>
                            <option value="<?php echo $result ['category_id']?>"><?php echo $result ['category_name']?></option>
                            <?php
                            }
                        }
                        ?>
                    </select>
                    <label for="">Chọn loại sản phẩm <span style="color :brown">*</span></label>
                    <select name="items_id" id="">
                        <option value="">Chọn</option>
                        <?php
                        $show_items = $product ->show_items();
                        if($show_category){
                            while($result = $show_items -> fetch_assoc()){
                            ?>
                            <option value="<?php echo $result ['items_id']?>"><?php echo $result ['items_name']?></option>
                            <?php
                            }
                        }
                        ?>
                    </select>
                    <label for="">Nhập giá sản phẩm<span style="color: red">*</span></label>
                    <input name="product_price" required type="text">

                    <label for="">Chọn ảnh sản phẩm<span style="color: red">*</span></label>
                    <input name="product_img" type="file" onchange="previewImage(event)">
                    <img id="preview" src="<?php echo isset($product_details['product_img']) ? $product_details['product_img'] : ''; ?>" width="100" style="display: <?php echo isset($product_details['product_img']) ? 'block' : 'none'; ?>;"><br>
                    <input type="hidden" name="current_img" value="<?php echo isset($product_details['product_img']) ? $product_details['product_img'] : ''; ?>">

                    <button type="submit">Thêm</button>
                </form>
                <!-- Hiển thị ảnh khi chọn -->
                <script>
                    function previewImage(event) {
                        var reader = new FileReader();
                        reader.onload = function(){
                            var output = document.getElementById('preview');
                            output.src = reader.result;
                            output.style.display = 'block';
                        };
                        reader.readAsDataURL(event.target.files[0]);
                    }
                </script>
                <!--  -->
            </div>
        </div>
    </section>
</body>
</html>