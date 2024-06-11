
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

});
