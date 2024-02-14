
function wceazy_coupon_generator_init(host){
    wceazy_hide_all()
    jQuery("#wceazy_coupon_generator").show();

    wceazy_coupon_generator_init_select2();
    wceazy_coupon_generator_tab_init();
}


function wceazy_coupon_generator_init_select2(){
    var wceazy_coupon_generator_coupon_type = jQuery('.wceazy_coupon_generator_coupon_type select')
    var wceazy_coupon_generator_coupon_length = jQuery('.wceazy_coupon_generator_coupon_length select')
    var wceazy_coupon_generator_discount_type = jQuery('.wceazy_coupon_generator_discount_type select')
    var wceazy_coupon_generator_product_ids = jQuery('.wceazy_coupon_generator_product_ids select')
    var wceazy_coupon_generator_exclude_product_ids = jQuery('.wceazy_coupon_generator_exclude_product_ids select')
    var wceazy_coupon_generator_product_categories = jQuery('.wceazy_coupon_generator_product_categories select')
    var wceazy_coupon_generator_exclude_product_categories = jQuery('.wceazy_coupon_generator_exclude_product_categories select')

    if (wceazy_coupon_generator_coupon_type.data('select2')) { wceazy_coupon_generator_coupon_type.select2('destroy');}
    if (wceazy_coupon_generator_coupon_length.data('select2')) { wceazy_coupon_generator_coupon_length.select2('destroy');}
    if (wceazy_coupon_generator_discount_type.data('select2')) { wceazy_coupon_generator_discount_type.select2('destroy');}
    if (wceazy_coupon_generator_product_ids.data('select2')) { wceazy_coupon_generator_product_ids.select2('destroy');}
    if (wceazy_coupon_generator_exclude_product_ids.data('select2')) { wceazy_coupon_generator_exclude_product_ids.select2('destroy');}
    if (wceazy_coupon_generator_product_categories.data('select2')) { wceazy_coupon_generator_product_categories.select2('destroy');}
    if (wceazy_coupon_generator_exclude_product_categories.data('select2')) { wceazy_coupon_generator_exclude_product_categories.select2('destroy');}

    wceazy_coupon_generator_coupon_type.select2();
    wceazy_coupon_generator_coupon_length.select2();
    wceazy_coupon_generator_discount_type.select2();
    wceazy_coupon_generator_product_ids.select2();
    wceazy_coupon_generator_exclude_product_ids.select2();
    wceazy_coupon_generator_product_categories.select2();
    wceazy_coupon_generator_exclude_product_categories.select2();
}


function wceazy_coupon_generator_tab_init(){
    jQuery(".wceazy_coupon_generator_container .coupon_tab_body").hide();
    jQuery(".wceazy_coupon_generator_container .coupon_tab_body[data-id='coupon_tab_general']").show();
    jQuery(".wceazy_coupon_generator_container .coupon_data_tabs .tab_item").unbind("click");
    jQuery(".wceazy_coupon_generator_container .coupon_data_tabs .tab_item").bind("click", function () {
        jQuery(".wceazy_coupon_generator_container .coupon_data_tabs .tab_item").removeClass('tab_item_active');
        jQuery(this).addClass('tab_item_active');
        jQuery(".wceazy_coupon_generator_container .coupon_tab_body").hide();
        jQuery(".wceazy_coupon_generator_container .coupon_tab_body[data-id='" + jQuery(this).data('target') + "']").show();
    });
}


function wceazy_coupon_generator_removeChar(item) {
    //alert();
    var val = item.value;
    val = val.replace(/[^0-9,.]/g, "");
    if (val == ' ') {
        val = ''
    }
    ;
    item.value = val;
}

function wceazy_coupon_generator_close_popup(){
    jQuery('.wceazy_coupon_generator_popup').removeClass('wceazy_coupon_generator_popup_opened');
}

function wceazy_submit_coupon_generator() {
    jQuery('.wceazy_coupon_generator_bottom_button_section button').text('Please Wait..');
    jQuery('.wceazy_coupon_generator_bottom_button_section button').prop('disabled', true);
    jQuery('.wceazy_coupon_generator_popup').addClass('wceazy_coupon_generator_popup_opened');
    jQuery('.wceazy_coupon_generator_popup .generating_coupon').show();
    jQuery('.wceazy_coupon_generator_popup .successes_message').hide();
    let jQuerypostData = {
        'prefix': jQuery(".wceazy_coupon_generator_prefix input").val(),
        'number_of_coupon': jQuery(".wceazy_coupon_generator_number_of_coupon input").val(),
        'coupon_type': jQuery(".wceazy_coupon_generator_coupon_type select").val(),
        'coupon_length': jQuery(".wceazy_coupon_generator_coupon_length select").val(),
        'discount_type': jQuery(".wceazy_coupon_generator_discount_type select").val(),
        'coupon_amount': jQuery(".wceazy_coupon_generator_coupon_amount input").val(),
        'free_shipping': jQuery(".wceazy_coupon_generator_free_shipping input[type='checkbox']:checked").length > 0 ? "yes" : "no",
        'expiry_date': jQuery(".wceazy_coupon_generator_expiry_date input").val(),
        'minimum_amount': jQuery(".wceazy_coupon_generator_minimum_amount input").val(),
        'maximum_amount': jQuery(".wceazy_coupon_generator_maximum_amount input").val(),
        'individual_use': jQuery(".wceazy_coupon_generator_individual_use input[type='checkbox']:checked").length > 0 ? "yes" : "no",
        'exclude_sale_items': jQuery(".wceazy_coupon_generator_exclude_sale_items input[type='checkbox']:checked").length > 0 ? "yes" : "no",
        'product_ids': jQuery(".wceazy_coupon_generator_product_ids select").val().join(","),
        'exclude_product_ids': jQuery(".wceazy_coupon_generator_exclude_product_ids select").val().join(","),
        'product_categories': jQuery(".wceazy_coupon_generator_product_categories select").val().join(","),
        'exclude_product_categories': jQuery(".wceazy_coupon_generator_exclude_product_categories select").val().join(","),
        'customer_email': jQuery(".wceazy_coupon_generator_customer_email input").val(),
        'usage_limit': jQuery(".wceazy_coupon_generator_usage_limit input").val(),
        'usage_limit_per_user': jQuery(".wceazy_coupon_generator_usage_limit_per_user input").val(),
        'limit_usage_to_x_items': jQuery(".wceazy_coupon_generator_limit_usage_to_x_items input").val(),

    };

    let jQuerypost_data = {'action': 'wceazy_coupon_generator_generate', 'data': jQuerypostData};

    jQuery.ajax({
        url: ajaxurl, type: "POST", data: jQuerypost_data,
        success: function (data) {

            var obj = JSON.parse(data);
            if (obj.status == 'true') {
                var totalCoupon = obj.coupons.length;
                if ( totalCoupon > 0) {
                    jQuery('.wceazy_coupon_generator_popup .generating_coupon').hide();
                    jQuery('.wceazy_coupon_generator_popup .successes_message').show();
                    jQuery('.wceazy_coupon_generator_popup .coupon_count').text(totalCoupon);


                    jQuery(".wceazy_coupon_generator_popup_export_btn").unbind("click");
                    jQuery(".wceazy_coupon_generator_popup_export_btn").bind("click", function () {
                        let csvContent = "data:text/csv;charset=utf-8,";
                        let coupons = obj.coupons;
                        coupons.forEach(function (single_coupon) {
                            csvContent += single_coupon + "\r\n";
                        });
                        var encodedUri = encodeURI(csvContent);
                        var link = document.createElement("a");
                        link.setAttribute("href", encodedUri);
                        link.setAttribute("download", "coupon-list.csv");
                        document.body.appendChild(link); // Required for FF
                        link.click();
                        jQuery('.wceazy_coupon_generator_popup').removeClass('wceazy_coupon_generator_popup_opened');
                    });
                }

                Command: toastr["success"]("Coupon Generated Successfully!");

                jQuery('.wceazy_coupon_generator_form_for_reset_purpose')[0].reset();
                jQuery('.wceazy_coupon_generator_container .select2-selection__rendered').val("").text("Please select").trigger('change');
                jQuery('.wceazy_coupon_generator_bottom_button_section button').text('Generate Coupons');
                jQuery('.wceazy_coupon_generator_bottom_button_section button').prop('disabled', false);
            } else {
                Command: toastr["success"]("Failed, Please try again!");
                jQuery('.wceazy_coupon_generator_form_for_reset_purpose')[0].reset();
                jQuery('.wceazy_coupon_generator_container .select2-selection__rendered').val("").text("Please select").trigger('change');
                jQuery('.wceazy_coupon_generator_bottom_button_section button').text('Generate Coupons');
                jQuery('.wceazy_coupon_generator_bottom_button_section button').prop('disabled', false);
                console.log('Oops: something is wrong please try later!');
            }

        }
    });
}
