jQuery(document).ready(function($) {
    $('.single_add_to_cart_button ').click(function(e) {
        e.preventDefault();

        var selectedProducts = [];
        $('.product-checkbox:checked').each(function() {
            selectedProducts.push($(this).val());
        });

        $.ajax({
            type: 'POST',
            url: ajax_params.ajax_url,
            data: {
                action: 'add_to_cart_selected_products',
                security: ajax_params.add_to_cart_nonce,
                selected_products: selectedProducts
            },
            success: function(response) {
                // Redirect to the cart page after successful addition
                window.location.href = response.redirect_url;
            },
            error: function(xhr, status, error) {
                // Handle error
                console.log(xhr.responseText);
            }
        });
    });
});
