function wceazy_frontend_sb_get_contents_on_cart_updated() {

    let post_data = { 'action': 'wceazy_pre_order_cart_updated' };
    jQuery.ajax({
        type: 'post',
        url: wceazy_client_pre_order_object.ajaxurl,
        data: post_data,
        success: function (data) {
            jQuery(".wceazy_frontend_sb").empty()
            jQuery(".wceazy_frontend_sb").append(data)
        },
    });
}