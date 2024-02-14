
function wceazy_address_book_init(host){
    wceazy_hide_all()
    jQuery("#wceazy_address_book").show();

    wceazy_address_book_tab_init();
}


function wceazy_address_book_tab_init(){
    jQuery(".wceazy_address_book_container .coupon_tab_body").hide();
    jQuery(".wceazy_address_book_container .coupon_tab_body[data-id='tab_general']").show();
    jQuery(".wceazy_address_book_container .coupon_data_tabs .tab_item").unbind("click");
    jQuery(".wceazy_address_book_container .coupon_data_tabs .tab_item").bind("click", function () {
        jQuery(".wceazy_address_book_container .coupon_data_tabs .tab_item").removeClass('tab_item_active');
        jQuery(this).addClass('tab_item_active');
        jQuery(".wceazy_address_book_container .coupon_tab_body").hide();
        jQuery(".wceazy_address_book_container .coupon_tab_body[data-id='" + jQuery(this).data('target') + "']").show();
    });
}



function wceazy_address_book_save() {
    jQuery('.wceazy_address_book_bottom_button_section button').text('Please Wait..');
    jQuery('.wceazy_address_book_bottom_button_section button').prop('disabled', true);
    let jQuerypostData = {

        'enable_billing_address_book': jQuery(".wceazy_address_book_enable_billing_address_book input[type='checkbox']:checked").length > 0 ? "yes" : "no",
        'enable_shipping_address_book': jQuery(".wceazy_address_book_enable_shipping_address_book input[type='checkbox']:checked").length > 0 ? "yes" : "no",
        'enable_billing_address_book_checkout': jQuery(".wceazy_address_book_enable_billing_address_book_checkout input[type='checkbox']:checked").length > 0 ? "yes" : "no",
        'enable_shipping_address_book_checkout': jQuery(".wceazy_address_book_enable_shipping_address_book_checkout input[type='checkbox']:checked").length > 0 ? "yes" : "no",


        'checkout_field_label': jQuery(".wceazy_address_book_checkout_field_label input").val(),
        'menu_title': jQuery(".wceazy_address_book_menu_title input").val(),
        'billing_headline_text': jQuery(".wceazy_address_book_billing_headline_text input").val(),
        'shipping_headline_text': jQuery(".wceazy_address_book_shipping_headline_text input").val(),


    };



    let jQuerypost_data = {'action': 'wceazy_address_book_save', 'data': jQuerypostData};
    jQuery.ajax({
        url: ajaxurl, type: "POST", data: jQuerypost_data,
        success: function (data) {
            var obj = JSON.parse(data);
            if (obj.status == 'true') {
                Command: toastr["success"]("Settings Saved Successfully!");
                jQuery('.wceazy_address_book_bottom_button_section button').text('Save Settings');
                jQuery('.wceazy_address_book_bottom_button_section button').prop('disabled', false);
            } else {
                Command: toastr["error"]("Failed, Please try again!");
                jQuery('.wceazy_address_book_bottom_button_section button').text('Save Settings');
                jQuery('.wceazy_address_book_bottom_button_section button').prop('disabled', false);
            }
        }
    });
}


