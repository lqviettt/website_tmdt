<?php
include "menu.php";
require_once "session.php";

Session::init();
Session::checkSession();

$cart = Session::get('cart') ? Session::get('cart') : [];
?>



<div class="container-cart-product">
    <div class="wrap-payment">
        <?php if (empty($cart)): ?>
                <h3>Giỏ hàng của bạn đang trống!</h3>
                <div class="back_product">
                    <?php $items_id = 25; ?>
                    <a href="products.php?items_id=<?= $items_id; ?>">
                        <button class="back">
                            <i class="fa-solid fa-arrow-left"></i>
                            QUAY LẠI MUA HÀNG
                        </button>
                    </a>
                </div>
            <?php else: ?>
                <form action="order_class.php" method="post">
                    <h3>Thông tin giỏ hàng</h3>
                    <?php foreach ($cart as $item) : ?>
                        <!-- Phần hiển thị sản phẩm trong giỏ hàng -->
                        <div class="wrap-payment-head" data-product-id="<?php echo $item['product_id']; ?>">
                            <div class="wrap-payment-head-left">
                                <img src="<?php echo $item['product_img']; ?>" alt="" style="width:150px; margin-bottom: 40px;">
                                <a href="remove_from_cart.php?product_id=<?php echo $item['product_id'];?>">
                                    <button class="clear-product">XÓA</button>
                                </a>
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
                </form>
                <div class="back_product">
                    <?php $items_id = 25; ?>
                    <a href="products.php?items_id=<?= $items_id; ?>">
                        <button class="back">
                            <i class="fa-solid fa-arrow-left"></i>
                            TIẾP TỤC MUA HÀNG
                        </button>
                    </a>
                </div>
        <?php endif; ?>
    </div>

    <?php if (!empty($cart)): ?>
        <div class="wrap-payment">
            <form action="order_class.php" method="post" onsubmit="return validateForm(event);">
                <h3>Thông tin thanh toán</h3>
                <div class="wrap-payment-body">
                    <table style="width:100%;">
                        <tr>
                            <td colspan="2" style="float: left; margin-bottom: 15px;">
                                <input type="radio" id="gender" name="gender" value="1" checked="check">
                                <label for="radio1">Anh</label>
                                <input type="radio" id="gender" name="gender" value="0">
                                <label for="radio2">Chị</label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="name" placeholder="Họ và tên (*)" id="name" style="width:95%; float: left;" class="form-control" onblur="checkName()">
                                <div id="nameError" style="display:none; color:red; font-size:12px;">Tên không được chứa số hoặc ký tự đặc biệt và không được để trống!</div>
                            </td>
                            <td>
                                <input type="text" name="number" placeholder="Số điện thoại (*)" id="number" style="width:95%; float: right;" class="form-control" onblur="checkNumber()">
                                <div id="numberError" style="display:none; color:red; font-size:12px;">Vui lòng nhập đúng định dạng!</div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="text" name="email" placeholder="Email" style="width: 100%;" id="email" class="form-control" onblur="checkEmail()">
                                <div id="emailError" style="display:none; color:red; font-size:12px;">Email sai định dạng, xin vui lòng nhập lại!</div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="text" name="address" placeholder="Địa chỉ" style="width: 100%;" id="address">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="text" name="others" placeholder="Yêu cầu khác (không bắt buộc)" style="width: 100%;" id="others">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div class="checkout" style="margin-top: 15px;">
                                    <button type="submit" class="btn-checkout" >ĐẶT HÀNG</button>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </form>
        </div>
    <?php endif; ?>
</div>

<?php
include "footer.php";
?>

<script src="../JS/checkinput.js"></script>
<script src="../JS/cart.js"></script>