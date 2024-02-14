function wceazy_frontend_fc_init(){

    jQuery('.wceazy_fc_loading').css("display" , "flex");
    jQuery('.wceazy_fc_products .wceazy_fc_product').remove();


    let post_data = {'action': 'wceazy_floating_cart_get_cart'};

    jQuery.ajax({
        type: 'post',
        url: wceazy_client_floating_cart_object.ajaxurl,
        data: post_data,
        success: function (data) {

            var obj = JSON.parse(data);
            if(obj.status === "true") {

                var products = obj.products;
                if(products.length > 0){
                    jQuery('.wceazy_fc_product_empty').css("display" , "none");
                    for (var i = 0; i < products.length; i++) {
                        var html = "<div class=\"wceazy_fc_product\" data-product_id=\""+products[i].product_id+"\">\n" +
                            "           <div class=\"wceazy_fc_product_part_1\">\n" +
                            "               <img src=\""+products[i].product_image+"\"/>\n" +
                            "           </div>\n" +
                            "           <div class=\"wceazy_fc_product_part_2\">\n" +
                            "               <a href=\""+products[i].product_url+"\" class=\"wceazy_fc_product_title\">"+products[i].product_title+"</a>\n" +
                            "               <div class=\"wceazy_fc_product_quantity\">\n" +
                            "                   <button class=\"wceazy_fc_product_quantity_down\" onclick=\"wceazy_frontend_fc_update_quantity_update(this, `-1`)\">-</button>\n" +
                            "                   <input class=\"wceazy_fc_product_quantity_field\" type=\"number\" onchange=\"wceazy_frontend_fc_update_quantity(this)\" value=\""+products[i].product_cart_quantity+"\"/>\n" +
                            "                   <button class=\"wceazy_fc_product_quantity_up\" onclick=\"wceazy_frontend_fc_update_quantity_update(this, `1`)\">+</button>\n" +
                            "               </div>\n" +
                            "               <p class=\"wceazy_fc_product_unit_price\">Unit Price: "+products[i].product_unit_price+"</p>\n" +
                            "           </div>\n" +
                            "           <div class=\"wceazy_fc_product_part_3\">\n" +
                            "               <button class=\"wceazy_fc_product_remove\" onclick=\"wceazy_frontend_fc_remove_product(this)\"></button>\n" +
                            "               <p class=\"wceazy_fc_product_total\">"+products[i].product_subtotal+"</p>\n" +
                            "           </div>\n" +
                            "       </div>"
                        jQuery('.wceazy_fc_products').prepend(html);
                    }
                }else{
                    jQuery('.wceazy_fc_product_empty').css("display" , "flex");
                }

                jQuery('.wceazy_fc_stats_subtotal p').eq(1).html(obj.subtotal);
                jQuery('.wceazy_fc_stats_discount p').eq(1).html(obj.discount);
                jQuery('.wceazy_fc_stats_shipping p').eq(1).html(obj.shipping);
                jQuery('.wceazy_fc_stats_total p').eq(1).html(obj.total);

            }



            jQuery('.wceazy_fc_loading').css("display" , "none");
        },
    });

}


function wceazy_frontend_fc_remove_product(view){
    jQuery('.wceazy_fc_loading').css("display" , "flex");
    var product_id = jQuery(view).parent().parent().attr("data-product_id");

    let post_data = {'action': 'wceazy_floating_cart_remove_cart_item', 'product_id': product_id};
    jQuery.ajax({
        type: 'post',
        url: wceazy_client_floating_cart_object.ajaxurl,
        data: post_data,
        success: function (data) {
            jQuery(document.body).trigger('wc_fragment_refresh');
            wceazy_frontend_fc_init()
        },
    });
}
function wceazy_frontend_fc_update_quantity(view){
    jQuery('.wceazy_fc_loading').css("display" , "flex");
    var product_id = jQuery(view).parent().parent().parent().attr("data-product_id");
    var quantity = jQuery(view).parent().find("input").val();

    let post_data = {'action': 'wceazy_floating_cart_update_quantity', 'product_id': product_id, 'quantity': quantity};
    jQuery.ajax({
        type: 'post',
        url: wceazy_client_floating_cart_object.ajaxurl,
        data: post_data,
        success: function (data) {
            jQuery(document.body).trigger('wc_fragment_refresh');
            wceazy_frontend_fc_init()
        },
    });
}
function wceazy_frontend_fc_update_quantity_update(view, addition){
    var old_quantity = parseInt(jQuery(view).parent().find("input").val())
    jQuery(view).parent().find("input").val(Number(old_quantity) + Number(addition)).trigger("change")
}
function wceazy_frontend_fc_apply_coupon(view){
    jQuery('.wceazy_fc_loading').css("display" , "flex");
    var coupon_code = jQuery(view).parent().find("input").val();

    let post_data = {'action': 'wceazy_floating_cart_apply_coupon', 'coupon_code': coupon_code};
    jQuery.ajax({
        type: 'post',
        url: wceazy_client_floating_cart_object.ajaxurl,
        data: post_data,
        success: function (data) {
            jQuery(document.body).trigger('wc_fragment_refresh');
            jQuery(view).parent().find("input").val("")
            wceazy_frontend_fc_init()
        },
    });
}




function wceazy_frontend_fc_open_cart(){
    jQuery('.wceazy_fc_main').css("display" , "flex");
}
function wceazy_frontend_fc_close_cart(){
    jQuery('.wceazy_fc_main').css("display" , "none");
}