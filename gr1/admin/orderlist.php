<?php
include "header.php";
include "slider.php";
include "class/order_class.php";
?>

<?php
    $order = new order;
    $show = $order ->show_orders();
?>



<div class="admin-content-right">
<div class="admin-content-right-category_list">
                <h1>Danh sách đơn hàng</h1>
                    <table>
                        <tr>
                            <th>STT</th>
                            <th>ID Đặt hàng</th>
                            <th>ID Khách hàng</th>
                            <th>ID Sản phẩm</th>
                            <th>Tên sản phẩm</th>
                            <th>Giá sản phẩm</th>
                            <th>SL</th>
                            <th>Tổng tiền</th>
                            <th>Order Date</th>
                            <th>Order Thêm</th>
                            <th>Trạng thái</th>
                        </tr>
                        <?php
                            if($show){
                                $i=0;
                                while($result = $show->fetch_assoc()){
                                $i++;
                            ?>
                            <tr>
                                <td>
                                    <?php echo $i ?>
                                </td>
                                <td>
                                    <?php echo $result['order_id'] ?>
                                </td>
                                <td>
                                    <?php echo $result['customer_id'] ?>
                                </td>
                                <td>
                                    <?php echo $result['product_id'] ?>
                                </td>
                                <td>
                                    <?php echo $result['product_name'] ?>
                                </td>
                                <td>
                                    <?php echo $result['product_price'] ?>
                                </td>
                                <td>
                                    <?php echo $result['quantity'] ?>
                                </td>
                                <td>
                                    <?php echo $result['total_amount'] ?>
                                </td>
                                <td>
                                    <?php echo $result['order_date'] ?>
                                </td>
                                <td>
                                    <?php echo $result['order_others'] ?>
                                </td>
                                <td>
                                    <button><a href="orderdelete.php?order_id=<?php echo $result['order_id'] ?>">Xóa</a></button>
                                    <button><a href="#">Done</a></button>
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