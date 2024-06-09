
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
            data: {
                product_id: productId,
                quantity: newQuantity
            },
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
        event.preventDefault(); // Ngăn chặn hành vi mặc định của liên kết
        var productId = $(this).closest('.wrap-payment-head').data('product-id');
        removeFromCart(productId, $(this).closest('.wrap-payment-head'));
    });

    // Hàm xóa sản phẩm khỏi giỏ hàng
    function removeFromCart(productId, productDiv) {
        $.ajax({
            url: 'remove_from_cart.php',
            type: 'POST',
            data: {
                product_id: productId
            },
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


    function checkName() {
        var name = document.getElementById('name').value;
        var nameError = document.getElementById('nameError');
        if (name.trim() === '') {
            nameError.style.display = 'block';
            return false;
        } else {
            nameError.style.display = 'none';
            return true;
        }
    }

    function checkNumber() {
        var number = document.getElementById('number').value;
        var numberError = document.getElementById('numberError');
        var phonePattern = /^[0-9]{10}$/; // Điều chỉnh theo định dạng số điện thoại phù hợp

        if (!phonePattern.test(number)) {
            numberError.style.display = 'block';
            return false;
        } else {
            numberError.style.display = 'none';
            return true;
        }
    }

    function checkEmail() {
        var email = document.getElementById('email').value;
        var emailError = document.getElementById('emailError');
        var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;

        if (!emailPattern.test(email)) {
            emailError.style.display = 'block';
            return false;
        } else {
            emailError.style.display = 'none';
            return true;
        }
    }
});
