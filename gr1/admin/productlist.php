<?php
include "header.php";
include "slider.php";
include "class/product_class.php";
?>

<?php
    $product = new product;
    $show_product = $product ->show_product();
?>



<div class="admin-content-right">
<div class="admin-content-right-category_list">
                <h1>Danh sách sản phẩm</h1>
                    <table>
                        <tr>
                            <th>STT</th>
                            <th>ID Sản phẩm</th>
                            <th>Tên sản phẩm</th>
                            <th>Loại sản phẩm</th>
                            <th>Giá</th>
                            <th>Ảnh sản phẩm</th>
                            <th>Tùy biến</th>
                        </tr>
                        <?php
                            if($show_product){
                                $i=0;
                                while($result = $show_product->fetch_assoc()){
                                $i++;
                            ?>
                            <tr>
                                <td>
                                    <?php echo $i ?>
                                </td>
                                <td>
                                    <?php echo $result['product_id'] ?>
                                </td>
                                <td>
                                    <?php echo $result['product_name'] ?>
                                </td>
                                <td>
                                    <?php echo $result['items_name'] ?>
                                </td>
                                <td>
                                    <?php echo $result['product_price'] ?>
                                </td>
                                <td>
                                    <img style="width:100px" src="<?php echo $result['product_img'] ?>" alt="">
                                </td>
                                <td>
                                <button><a href="productedit.php?product_id=<?php echo $result['product_id'] ?>">Sửa</a></button>
                                <button><a href="productdelete.php?product_id=<?php echo $result['product_id'] ?>">Xóa</a></button>
                            </td>
                            </tr>

                            <?php
                            }
                        }
                        ?>
                    </table>
            </div>
        </div>
    </section>
</body>
</html>