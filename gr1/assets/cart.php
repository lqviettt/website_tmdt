<?php
include "menu.php";
include  "session.php";  // Include session management

Session::init();

$cart = Session::get('cart') ? Session::get('cart') : [];
?>


<div class="container-cart-product">
    <div class="wrap-payment">
        <form action="cart.php" method="post">
            <h3>Thông tin giỏ hàng</h3>
            <?php foreach ($cart as $item) : ?>
                <div class="wrap-payment-head" data-product-id="<?php echo $item['product_id']; ?>">
                    <div class="wrap-payment-head-left">
                        <img src="<?php echo $item['product_img']; ?>" alt="" style="width:150px; padding-bottom: 20px;">
                        <a href="remove_from_cart.php?product_id=<?php echo $item['product_id']; ?>" class="clear-product">XÓA</a>
                    </div>
                    <div class="wrap-payment-head-right">
                        <div class="" style="height:65px;">
                            <div class="wrap-payment-head-right-title">
                                <a href="product_detail.php?id=<?php echo $item['product_id']; ?>">
                                    <?php echo $item['product_name']; ?>
                                </a>
                            </div>
                            <div class="price" style="float: right;">
                                <?php echo $item['product_price']; ?>₫
                            </div>
                        </div>
                        <div class="" style="width:100%; min-height:40px;">
                            <div class="choose-color">
                                <span>Size</span>
                            </div>
                            <div class="choose-number">
                                <div class="minus">
                                    <i class="fa-solid fa-minus"></i>
                                </div>
                                <div class="number"><?php echo $item['quantity']; ?></div>
                                <div class="plus">
                                    <i class="fa-solid fa-plus"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </form>
        <div class="Tinhtien">
            <div class="Tong-tien">
                <span>Tổng tiền</span>
                <div class="price" style="float: right;">
                    <p class="tongtien">
                        <?php
                        $total = 0;
                        foreach ($cart as $item) {
                            $total += $item['product_price'] * $item['quantity'];
                        }
                        echo $total;
                        ?>.000₫
                    </p>
                </div>
            </div>
            <div class="Can-thanh-toan">
                <span>Cần thanh toán</span>
                <div class="price" style="float: right;">
                    <p class="tongtien"><?php echo $total; ?>.000₫</p>
                </div>
            </div>
        </div>
        <div class="back_product">
            <?php
            $items_id = 25;
            echo '<a href="products.php?items_id=' . $items_id . '">';
            echo '<button class="back">';
            echo '<i class="fa-solid fa-arrow-left"></i>';
            echo 'TIẾP TỤC MUA HÀNG';
            echo '</button>';
            echo '</a>';
            ?>
        </div>
    </div>

    <div class="wrap-payment">
        <h3>Thông tin thanh toán</h3>
        <div class="wrap-payment-body">
            <table style="width:100%;">
                <tr>
                    <td colspan="2" style="float: left; margin-bottom: 15px;">
                        <input type="checkbox" id="checkbox1" name="checkbox1" checked="checked" value="1">
                        <label for="checkbox1">Anh</label>
                        <input type="checkbox" id="checkbox2" name="checkbox2" value="0">
                        <label for="checkbox2">Chị</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" placeholder="Họ và tên (*)" id="name" style="width:95%; float: left;" class="form-control" onblur="checkName()">
                        <div id="nameError" style="display:none; color:red;">Vui lòng nhập tên!</div>
                    </td>
                    <td>
                        <input type="text" placeholder="Số điện thoại (*)" id="number" style="width:95%; float: right;" class="form-control" onblur="checkNumber()">
                        <div id="numberError" style="display:none; color:red;">Vui lòng nhập số điện thoại!</div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="text" placeholder="Email" style="width: 100%;" id="email" class="form-control" onblur="checkEmail()">
                        <div id="emailError" style="display:none; color:red;">Vui lòng nhập email!</div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="text" placeholder="Địa chỉ" style="width: 100%;" id="address">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="text" placeholder="Yêu cầu khác (không bắt buộc)" style="width: 100%;">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div class="checkout" style="margin-top: 15px;">
                            <button class="btn-checkout" onclick="check()" value="submit">
                                THANH TOÁN
                            </button>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>



<?php
include "footer.php";
?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // Xử lý tăng số lượng sản phẩm
    $('.plus').on('click', function() {
        var quantityDiv = $(this).siblings('.number');
        var quantity = parseInt(quantityDiv.text());
        var productId = $(this).closest('.wrap-payment-head').data('product-id');
        updateQuantity(productId, quantity + 1, quantityDiv);
    });

    // Xử lý giảm số lượng sản phẩm
    $('.minus').on('click', function() {
        var quantityDiv = $(this).siblings('.number');
        var quantity = parseInt(quantityDiv.text());
        if (quantity > 1) {
            var productId = $(this).closest('.wrap-payment-head').data('product-id');
            updateQuantity(productId, quantity - 1, quantityDiv);
        }
    });

    // Hàm cập nhật số lượng sản phẩm
    function updateQuantity(productId, newQuantity, quantityDiv) {
        $.ajax({
            url: 'update_quantity.php',
            type: 'POST',
            data: { product_id: productId, quantity: newQuantity },
            success: function(response) {
                var data = JSON.parse(response);
                if (data.success) {
                    quantityDiv.text(newQuantity);
                    $('.tongtien').text(data.total + '.000₫');
                } else {
                    alert('Failed to update quantity.');
                }
            },
            error: function() {
                alert('An error occurred while updating the quantity.');
            }
        });
    }

    // Xử lý xóa sản phẩm khỏi giỏ hàng
    $('.clear-product').on('click', function(event) {
        event.preventDefault();  // Ngăn chặn hành vi mặc định của liên kết
        var productId = $(this).closest('.wrap-payment-head').data('product-id');
        removeFromCart(productId, $(this).closest('.wrap-payment-head'));
    });

    // Hàm xóa sản phẩm khỏi giỏ hàng
    function removeFromCart(productId, productDiv) {
        $.ajax({
            url: 'remove_from_cart.php',
            type: 'POST',
            data: { product_id: productId },
            success: function(response) {
                var data = JSON.parse(response);
                if (data.success) {
                    productDiv.remove();
                    $('.tongtien').text(data.total + '.000₫');
                } else {
                    alert('Failed to remove product.');
                }
            },
            error: function() {
                alert('An error occurred while removing the product.');
            }
        });
    }
});
</script>