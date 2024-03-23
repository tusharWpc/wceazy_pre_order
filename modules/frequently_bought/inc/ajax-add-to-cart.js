jQuery(document).ready(function($) {
    $('#add-selected-to-cart-btn').on('click', function() {
        var selectedProducts = [];
        $('.product-checkbox:checked').each(function() {
            selectedProducts.push($(this).val());
        });

        if (selectedProducts.length > 0) {
            $.ajax({
                url: ajax_params.ajax_url,
                type: 'POST',
                data: {
                    action: 'add_selected_products_to_cart',
                    selected_products: selectedProducts,
                    security: ajax_params.add_to_cart_nonce
                },
                success: function(response) {
                    // Handle success response here
                    console.log(response);
                },
                error: function(xhr, status, error) {
                    // Handle error here
                    console.log(xhr.responseText);
                }
            });
        } else {
            alert('Please select at least one product to add to cart.');
        }
    });
});
