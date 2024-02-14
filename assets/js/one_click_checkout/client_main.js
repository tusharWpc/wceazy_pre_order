

function wceazy_frontend_occ_ajax_add_to_cart_init(){

    var elWrap =  jQuery('.single_add_to_cart_button');
    if( elWrap.length >= 0 ){
        jQuery(elWrap).addClass( ' occ-single-addto-cart' );
    }

    jQuery(document).on('click', '.occ-single-addto-cart', function (e) {
        e.preventDefault();

        var btn_text = jQuery('.occ-single-addto-cart').text();
        jQuery('.occ-single-addto-cart').text('Processing..');

        var thisbutton = jQuery(this),
            form = thisbutton.closest('form.cart'),
            id = thisbutton.val(),
            product_qty = form.find('input[name=quantity]').val() || 1,
            product_id = form.find('input[name=product_id]').val() || id,
            variation_id = form.find('input[name=variation_id]').val() || 0;


        let post_data = {
            'action': 'wceazy_one_click_checkout_ajax_add_to_cart',
            'product_id': product_id,
            'product_sku': '',
            'quantity': product_qty,
            'variation_id': variation_id,
        };

        jQuery(document.body).trigger('adding_to_cart', [thisbutton, post_data]);
        jQuery.ajax({
            type: 'post',
            url: wceazy_client_one_click_checkout_object.ajaxurl,
            data: post_data,
            success: function (response) {
                if (response.error && response.product_url) {
                    window.location = response.product_url;
                    return;
                } else {
                    jQuery(document.body).trigger('added_to_cart', [response.fragments, response.cart_hash, thisbutton]);
                }

                setTimeout(function(){
                    jQuery('.occ-single-addto-cart').text(btn_text);
                },500);
            },
        });

        return false;
    });

}
