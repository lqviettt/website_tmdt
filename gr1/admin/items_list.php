<?php
include "header.php";
include "slider.php";
include "class/items_class.php";
?>

<?php
    $items = new items;
    $show_items = $items ->show_items();
?>



<div class="admin-content-right">
<div class="admin-content-right-category_list">
                <h1>Danh sách sản phẩm</h1>
                    <table>
                        <tr>
                            <th>STT</th>
                            <th>ID</th>
                            <th>Danh mục</th>
                            <th>Loại sản phẩm</th>
                            <th>Tùy biến</th>
                        </tr>
                        <?php
                            if($show_items){
                                $i=0;
                                while($result = $show_items->fetch_assoc()){
                                $i++;
                            ?>
                            <tr>
                                <td>
                                    <?php echo $i ?>
                                </td>
                                <td>
                                    <?php echo $result['items_id'] ?>
                                </td>
                                <td>
                                    <?php echo $result['category_name'] ?>
                                </td>
                                <td>
                                    <?php echo $result['items_name'] ?>
                                </td>
                                <td>
                                <button><a href="itemsedit.php?items_id=<?php echo $result['items_id'] ?>">Sửa</a></button>
                                <button><a href="itemsdelete.php?items_id=<?php echo $result['items_id'] ?>">Xóa</a></button>
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