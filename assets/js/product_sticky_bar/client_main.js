
function wceazy_frontend_psb_init_scrolling(scroll_pixel) {
    jQuery(window).scroll(function () {
        var scroll = jQuery(window).scrollTop();
        if (scroll >= scroll_pixel) {
            if(!jQuery(".wceazy_frontend_psb").hasClass("active")){
                jQuery(".wceazy_frontend_psb").hide();
                jQuery(".wceazy_frontend_psb").addClass("active");
                jQuery(".wceazy_frontend_psb").slideDown("fast");
            }

        }
        if (scroll <= scroll_pixel) {
            if(jQuery(".wceazy_frontend_psb").hasClass("active")){
                jQuery(".wceazy_frontend_psb").slideUp("fast", function(){
                    jQuery(".wceazy_frontend_psb").removeClass("active");
                });

            }
        }
    });
}


function wceazy_frontend_psb_add_to_cart(product_id){
    var quantity = "1";
    var variation = "";

    jQuery('.wceazy_frontend_psb .wceazy_frontend_psb_add_to_cart').text('Please Wait..');
    jQuery('.wceazy_frontend_psb .wceazy_frontend_psb_add_to_cart').prop('disabled', true);

    if (jQuery(".wceazy_frontend_psb .wceazy_frontend_psb_product_quantity input").length ) {
        quantity = jQuery(".wceazy_frontend_psb .wceazy_frontend_psb_product_quantity input").val()
    }
    if (jQuery(".wceazy_frontend_psb .wceazy_frontend_psb_variations select").length ) {
        variation = jQuery(".wceazy_frontend_psb .wceazy_frontend_psb_variations select").val()
    }

    var post_data = {
        'action': 'wceazy_product_sticky_bar_add_to_cart',
        'product_id': product_id,
        'quantity': quantity,
        'variation': variation,
    };

    jQuery.ajax({
        url: wceazy_client_product_sticky_bar_object.ajaxurl,
        type: "POST",
        data: post_data,
        success: function (data) {
            location.reload();
        }
    })

}
