
function wceazy_floating_cart_init(host){
    wceazy_hide_all()
    jQuery("#wceazy_floating_cart").show();

    wceazy_floating_cart_init_select2();
    wceazy_floating_cart_init_icon_field(host);
    wceazy_floating_cart_tab_init();
    //wceazy_one_click_checkout_selection_changed();
}


function wceazy_floating_cart_init_select2(){
    var wceazy_floating_cart_bascket_count = jQuery('.wceazy_floating_cart_bascket_count select')
    var wceazy_floating_cart_dont_show_cart_pages = jQuery('.wceazy_floating_cart_dont_show_cart_pages select')
    var wceazy_floating_cart_open_from = jQuery('.wceazy_floating_cart_open_from select')
    var wceazy_floating_cart_basket_enable = jQuery('.wceazy_floating_cart_basket_enable select')
    var wceazy_floating_cart_basket_shape = jQuery('.wceazy_floating_cart_basket_shape select')
    var wceazy_floating_cart_basket_position = jQuery('.wceazy_floating_cart_basket_position select')
    var wceazy_floating_cart_basket_count_position = jQuery('.wceazy_floating_cart_basket_count_position select')

    if (wceazy_floating_cart_bascket_count.data('select2')) { wceazy_floating_cart_bascket_count.select2('destroy');}
    if (wceazy_floating_cart_dont_show_cart_pages.data('select2')) { wceazy_floating_cart_dont_show_cart_pages.select2('destroy');}
    if (wceazy_floating_cart_open_from.data('select2')) { wceazy_floating_cart_open_from.select2('destroy');}
    if (wceazy_floating_cart_basket_enable.data('select2')) { wceazy_floating_cart_basket_enable.select2('destroy');}
    if (wceazy_floating_cart_basket_shape.data('select2')) { wceazy_floating_cart_basket_shape.select2('destroy');}
    if (wceazy_floating_cart_basket_position.data('select2')) { wceazy_floating_cart_basket_position.select2('destroy');}
    if (wceazy_floating_cart_basket_count_position.data('select2')) { wceazy_floating_cart_basket_count_position.select2('destroy');}

    wceazy_floating_cart_bascket_count.select2();
    wceazy_floating_cart_dont_show_cart_pages.select2();
    wceazy_floating_cart_open_from.select2();
    wceazy_floating_cart_basket_enable.select2();
    wceazy_floating_cart_basket_shape.select2();
    wceazy_floating_cart_basket_position.select2();
    wceazy_floating_cart_basket_count_position.select2();
}

function wceazy_floating_cart_init_icon_field(host){
    var wceazy_floating_cart_item_remove_icon = jQuery('.wceazy_floating_cart_item_remove_icon')
    var wceazy_floating_cart_basket_icon = jQuery('.wceazy_floating_cart_basket_icon')



    jQuery(wceazy_floating_cart_item_remove_icon).find(".icon_field_item").unbind("click");
    jQuery(wceazy_floating_cart_item_remove_icon).find(".icon_field_item").bind("click", function () {
        jQuery(wceazy_floating_cart_item_remove_icon).find(".icon_field_item").removeClass('active');
        jQuery(this).addClass('active');
    });


    jQuery(wceazy_floating_cart_basket_icon).find(".icon_field_item").unbind("click");
    jQuery(wceazy_floating_cart_basket_icon).find(".icon_field_item").bind("click", function () {
        jQuery(wceazy_floating_cart_basket_icon).find(".icon_field_item").removeClass('active');
        jQuery(this).addClass('active');
    });


    jQuery(wceazy_floating_cart_item_remove_icon).find(".icon_1").css("background", "transparent url("+host+"assets/img/modules/floating_cart/delete_icon_1.svg) no-repeat center center / 16px")
    jQuery(wceazy_floating_cart_item_remove_icon).find(".icon_2").css("background", "transparent url("+host+"assets/img/modules/floating_cart/delete_icon_2.svg) no-repeat center center / 16px")
    jQuery(wceazy_floating_cart_item_remove_icon).find(".icon_3").css("background", "transparent url("+host+"assets/img/modules/floating_cart/delete_icon_3.svg) no-repeat center center / 16px")
    jQuery(wceazy_floating_cart_item_remove_icon).find(".icon_4").css("background", "transparent url("+host+"assets/img/modules/floating_cart/delete_icon_4.svg) no-repeat center center / 16px")
    jQuery(wceazy_floating_cart_item_remove_icon).find(".icon_5").css("background", "transparent url("+host+"assets/img/modules/floating_cart/delete_icon_5.svg) no-repeat center center / 16px")


    jQuery(wceazy_floating_cart_basket_icon).find(".icon_1").css("background", "transparent url("+host+"assets/img/modules/floating_cart/basket_icon_1.svg) no-repeat center center / 16px")
    jQuery(wceazy_floating_cart_basket_icon).find(".icon_2").css("background", "transparent url("+host+"assets/img/modules/floating_cart/basket_icon_2.svg) no-repeat center center / 16px")
    jQuery(wceazy_floating_cart_basket_icon).find(".icon_3").css("background", "transparent url("+host+"assets/img/modules/floating_cart/basket_icon_3.svg) no-repeat center center / 16px")
    jQuery(wceazy_floating_cart_basket_icon).find(".icon_4").css("background", "transparent url("+host+"assets/img/modules/floating_cart/basket_icon_4.svg) no-repeat center center / 16px")
    jQuery(wceazy_floating_cart_basket_icon).find(".icon_5").css("background", "transparent url("+host+"assets/img/modules/floating_cart/basket_icon_5.svg) no-repeat center center / 16px")
    jQuery(wceazy_floating_cart_basket_icon).find(".icon_6").css("background", "transparent url("+host+"assets/img/modules/floating_cart/basket_icon_6.svg) no-repeat center center / 16px")


}


function wceazy_floating_cart_tab_init(){
    jQuery(".wceazy_floating_cart_container .coupon_tab_body").hide();
    jQuery(".wceazy_floating_cart_container .coupon_tab_body[data-id='tab_general']").show();
    jQuery(".wceazy_floating_cart_container .coupon_data_tabs .tab_item").unbind("click");
    jQuery(".wceazy_floating_cart_container .coupon_data_tabs .tab_item").bind("click", function () {
        jQuery(".wceazy_floating_cart_container .coupon_data_tabs .tab_item").removeClass('tab_item_active');
        jQuery(this).addClass('tab_item_active');
        jQuery(".wceazy_floating_cart_container .coupon_tab_body").hide();
        jQuery(".wceazy_floating_cart_container .coupon_tab_body[data-id='" + jQuery(this).data('target') + "']").show();
    });
}



function wceazy_floating_cart_save() {
    jQuery('.wceazy_floating_cart_bottom_button_section button').text('Please Wait..');
    jQuery('.wceazy_floating_cart_bottom_button_section button').prop('disabled', true);
    let jQuerypostData = {

        'auto_open_cart': jQuery(".wceazy_floating_cart_auto_open_cart input[type='checkbox']:checked").length > 0 ? "yes" : "no",
        'bascket_count': jQuery(".wceazy_floating_cart_bascket_count select").val(),
        'dont_show_cart_pages': jQuery(".wceazy_floating_cart_dont_show_cart_pages select").val().join(","),


        'show_header_basket_icon': jQuery(".wceazy_floating_cart_show_header_basket_icon input[type='checkbox']:checked").length > 0 ? "yes" : "no",
        'show_header_close_icon': jQuery(".wceazy_floating_cart_show_header_close_icon input[type='checkbox']:checked").length > 0 ? "yes" : "no",

        'show_product_image': jQuery(".wceazy_floating_cart_show_product_image input[type='checkbox']:checked").length > 0 ? "yes" : "no",
        'show_product_name': jQuery(".wceazy_floating_cart_show_product_name input[type='checkbox']:checked").length > 0 ? "yes" : "no",
        'show_product_price': jQuery(".wceazy_floating_cart_show_product_price input[type='checkbox']:checked").length > 0 ? "yes" : "no",
        'show_product_price_total': jQuery(".wceazy_floating_cart_show_product_price_total input[type='checkbox']:checked").length > 0 ? "yes" : "no",
        'delete_item_form_cart': jQuery(".wceazy_floating_cart_delete_item_form_cart input[type='checkbox']:checked").length > 0 ? "yes" : "no",
        'allowed_quantity_update': jQuery(".wceazy_floating_cart_allowed_quantity_update input[type='checkbox']:checked").length > 0 ? "yes" : "no",

        'footer_position_fixed': jQuery(".wceazy_floating_cart_footer_position_fixed input[type='checkbox']:checked").length > 0 ? "yes" : "no",
        'show_subtotal': jQuery(".wceazy_floating_cart_show_subtotal input[type='checkbox']:checked").length > 0 ? "yes" : "no",
        'show_discount': jQuery(".wceazy_floating_cart_show_discount input[type='checkbox']:checked").length > 0 ? "yes" : "no",
        'show_shipping_amount': jQuery(".wceazy_floating_cart_show_shipping_amount input[type='checkbox']:checked").length > 0 ? "yes" : "no",
        'show_cart_total': jQuery(".wceazy_floating_cart_show_cart_total input[type='checkbox']:checked").length > 0 ? "yes" : "no",
        'show_coupon': jQuery(".wceazy_floating_cart_show_coupon input[type='checkbox']:checked").length > 0 ? "yes" : "no",

        'heading_title': jQuery(".wceazy_floating_cart_heading_title input").val(),
        'continue_btn_text': jQuery(".wceazy_floating_cart_continue_btn_text input").val(),
        'view_cart_text': jQuery(".wceazy_floating_cart_view_cart_text input").val(),
        'checkout_btn_text': jQuery(".wceazy_floating_cart_checkout_btn_text input").val(),
        'empty_cart_message': jQuery(".wceazy_floating_cart_empty_cart_message input").val(),
        'subtotal_text': jQuery(".wceazy_floating_cart_subtotal_text input").val(),
        'total_amount_text': jQuery(".wceazy_floating_cart_total_amount_text input").val(),

        /*'continue_btn_url': jQuery(".wceazy_floating_cart_continue_btn_url input").val(),
        'view_cart_btn_url': jQuery(".wceazy_floating_cart_view_cart_btn_url input").val(),
        'checkout_btn_url': jQuery(".wceazy_floating_cart_checkout_btn_url input").val(),*/

        'width': jQuery(".wceazy_floating_cart_width input").val(),
        'open_from': jQuery(".wceazy_floating_cart_open_from select").val(),
        'btn_font_size': jQuery(".wceazy_floating_cart_btn_font_size input").val(),
        /*'btn_font_color': jQuery(".wceazy_floating_cart_btn_font_color input").val(),
        'btn_bg_color': jQuery(".wceazy_floating_cart_btn_bg_color input").val(),
        'btn_hover_font_color': jQuery(".wceazy_floating_cart_btn_hover_font_color input").val(),
        'btn_hover_bg_color': jQuery(".wceazy_floating_cart_btn_hover_bg_color input").val(),
        'btn_border_color': jQuery(".wceazy_floating_cart_btn_border_color input").val(),
        'btn_border_hover_color': jQuery(".wceazy_floating_cart_btn_border_hover_color input").val(),
        'btn_border_radius': jQuery(".wceazy_floating_cart_btn_border_radius input").val(),*/

        'cross_icon_size': jQuery(".wceazy_floating_cart_cross_icon_size input").val(),
        'header_basket_icon_size': jQuery(".wceazy_floating_cart_header_basket_icon_size input").val(),
        'heading_font_size': jQuery(".wceazy_floating_cart_heading_font_size input").val(),
        /*'heading_font_color': jQuery(".wceazy_floating_cart_heading_font_color input").val(),
        'heading_border_bottom_color': jQuery(".wceazy_floating_cart_heading_border_bottom_color input").val(),*/

        'item_remove_icon': jQuery(".wceazy_floating_cart_item_remove_icon .icon_field_item.active").attr("data-value"),
        'remove_icon_size': jQuery(".wceazy_floating_cart_remove_icon_size input").val(),
        'product_img_width': jQuery(".wceazy_floating_cart_product_img_width input").val(),
        /*'product_title_color': jQuery(".wceazy_floating_cart_product_title_color input").val(),*/
        'product_title_font_size': jQuery(".wceazy_floating_cart_product_title_font_size input").val(),
        'quantity_box_width': jQuery(".wceazy_floating_cart_quantity_box_width input").val(),
        /*'quantity_box_border_color': jQuery(".wceazy_floating_cart_quantity_box_border_color input").val(),
        'quantity_box_bg_color': jQuery(".wceazy_floating_cart_quantity_box_bg_color input").val(),
        'quantity_box_text_color': jQuery(".wceazy_floating_cart_quantity_box_text_color input").val(),*/

        'basket_enable': jQuery(".wceazy_floating_cart_basket_enable select").val(),
        'basket_shape': jQuery(".wceazy_floating_cart_basket_shape select").val(),
        'basket_icon_size': jQuery(".wceazy_floating_cart_basket_icon_size input").val(),
        'basket_show_count': jQuery(".wceazy_floating_cart_basket_show_count input[type='checkbox']:checked").length > 0 ? "yes" : "no",
        'basket_icon': jQuery(".wceazy_floating_cart_basket_icon .icon_field_item.active").attr("data-value"),
        'basket_position': jQuery(".wceazy_floating_cart_basket_position select").val(),
        'basket_offset_vertical': jQuery(".wceazy_floating_cart_basket_offset_vertical input").val(),
        'basket_offset_horizontal': jQuery(".wceazy_floating_cart_basket_offset_horizontal input").val(),
        'basket_count_position': jQuery(".wceazy_floating_cart_basket_count_position select").val(),
        /*'basket_icon_color': jQuery(".wceazy_floating_cart_basket_icon_color input").val(),
        'basket_bg_color': jQuery(".wceazy_floating_cart_basket_bg_color input").val(),
        'basket_count_color': jQuery(".wceazy_floating_cart_basket_count_color input").val(),
        'basket_count_bg_color': jQuery(".wceazy_floating_cart_basket_count_bg_color input").val(),*/


    };



    let jQuerypost_data = {'action': 'wceazy_floating_cart_save', 'data': jQuerypostData};

    jQuery.ajax({
        url: ajaxurl, type: "POST", data: jQuerypost_data,
        success: function (data) {
            var obj = JSON.parse(data);
            if (obj.status == 'true') {
                Command: toastr["success"]("Settings Saved Successfully!");
                jQuery('.wceazy_floating_cart_bottom_button_section button').text('Save Settings');
                jQuery('.wceazy_floating_cart_bottom_button_section button').prop('disabled', false);
            } else {
                Command: toastr["error"]("Failed, Please try again!");
                jQuery('.wceazy_floating_cart_bottom_button_section button').text('Save Settings');
                jQuery('.wceazy_floating_cart_bottom_button_section button').prop('disabled', false);
            }
        }
    });
}


