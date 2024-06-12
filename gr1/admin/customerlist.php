<?php
include "header.php";
include "slider.php";
include "class/customers_class.php";
?>

<?php
    $customers = new customers;
    $show = $customers ->show_customers();
?>


<div class="admin-content-right">
<div class="admin-content-right-category_list">
                <h1>Danh sách khách hàng</h1>
                    <table>
                        <tr>
                            <th>STT</th>
                            <th>ID Khách hàng</th>
                            <th>Tên Khách hàng</th>
                            <th>Số điện thoại</th>
                            <th>Email</th>
                            <th>Địa chỉ</th>
                            <th>Giới tính</th>
                            <th>Tùy biến</th>
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
                                    <?php echo $result['customer_id'] ?>
                                </td>
                                <td>
                                    <?php echo $result['customer_name'] ?>
                                </td>
                                <td>
                                    <?php echo $result['customer_phone'] ?>
                                </td>
                                <td>
                                    <?php echo $result['customer_email'] ?>
                                </td>
                                <td>
                                    <?php echo $result['customer_address'] ?>
                                </td>
                                <td>
                                    <?php echo $result['gender'] ?>
                                </td>
                                <td>
                                    <button><a href="customerdelete.php?customer_id=<?php echo $result['customer_id'] ?>">Xóa</a></button>
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