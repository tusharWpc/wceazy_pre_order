
function wceazy_pdf_invoice_init(host){
    wceazy_hide_all()
    jQuery("#wceazy_pdf_invoice").show();

    wceazy_pdf_invoice_init_select2();
    wceazy_pdf_invoice_tab_init();
    wceazy_pdf_invoice_selection_changed();
}


function wceazy_pdf_invoice_init_select2(){
    var wceazy_pdf_invoice_country_state = jQuery('.wceazy_pdf_invoice_country_state select')
    var wceazy_pdf_invoice_display_download = jQuery('.wceazy_pdf_invoice_display_download select')
    var wceazy_pdf_invoice_disabled_status = jQuery('.wceazy_pdf_invoice_disabled_status select')
    var wceazy_pdf_invoice_attach_to_email = jQuery('.wceazy_pdf_invoice_attach_to_email select')

    if (wceazy_pdf_invoice_country_state.data('select2')) { wceazy_pdf_invoice_country_state.select2('destroy');}
    if (wceazy_pdf_invoice_display_download.data('select2')) { wceazy_pdf_invoice_display_download.select2('destroy');}
    if (wceazy_pdf_invoice_disabled_status.data('select2')) { wceazy_pdf_invoice_disabled_status.select2('destroy');}
    if (wceazy_pdf_invoice_attach_to_email.data('select2')) { wceazy_pdf_invoice_attach_to_email.select2('destroy');}

    wceazy_pdf_invoice_country_state.select2();
    wceazy_pdf_invoice_display_download.select2();
    wceazy_pdf_invoice_disabled_status.select2();
    wceazy_pdf_invoice_attach_to_email.select2();
}



function wceazy_pdf_invoice_tab_init(){
    jQuery(".wceazy_pdf_invoice_container .coupon_tab_body").hide();
    jQuery(".wceazy_pdf_invoice_container .coupon_tab_body[data-id='tab_pdf_document']").show();
    jQuery(".wceazy_pdf_invoice_container .coupon_data_tabs .tab_item").unbind("click");
    jQuery(".wceazy_pdf_invoice_container .coupon_data_tabs .tab_item").bind("click", function () {
        jQuery(".wceazy_pdf_invoice_container .coupon_data_tabs .tab_item").removeClass('tab_item_active');
        jQuery(this).addClass('tab_item_active');
        jQuery(".wceazy_pdf_invoice_container .coupon_tab_body").hide();
        jQuery(".wceazy_pdf_invoice_container .coupon_tab_body[data-id='" + jQuery(this).data('target') + "']").show();
    });
}


function wceazy_pdf_invoice_selection_changed(){
    if(jQuery(".wceazy_pdf_invoice_ordernumber_as_invoice_number input[type='checkbox']:checked").length > 0){
        jQuery(".wceazy_pdf_invoice_invoice_start_number").hide()
    }else{
        jQuery(".wceazy_pdf_invoice_invoice_start_number").show()
    }



    if(jQuery(".wceazy_pdf_invoice_enable_invoice_title input[type='checkbox']:checked").length > 0){
        jQuery(".wceazy_pi_emulator_invoice_title").show()
    }else{
        jQuery(".wceazy_pi_emulator_invoice_title").hide()
    }
    if(jQuery(".wceazy_pdf_invoice_enable_shop_logo input[type='checkbox']:checked").length > 0){
        jQuery(".wceazy_pi_emulator_shop_logo").show()
    }else{
        jQuery(".wceazy_pi_emulator_shop_logo").hide()
    }
    if(jQuery(".wceazy_pdf_invoice_enable_invoice_number input[type='checkbox']:checked").length > 0){
        jQuery(".wceazy_pi_emulator_invoice_number").show()
    }else{
        jQuery(".wceazy_pi_emulator_invoice_number").hide()
    }
    if(jQuery(".wceazy_pdf_invoice_enable_order_number input[type='checkbox']:checked").length > 0){
        jQuery(".wceazy_pi_emulator_order_number").show()
    }else{
        jQuery(".wceazy_pi_emulator_order_number").hide()
    }
    if(jQuery(".wceazy_pdf_invoice_enable_invoice_date input[type='checkbox']:checked").length > 0){
        jQuery(".wceazy_pi_emulator_invoice_date").show()
    }else{
        jQuery(".wceazy_pi_emulator_invoice_date").hide()
    }
    if(jQuery(".wceazy_pdf_invoice_enable_order_date input[type='checkbox']:checked").length > 0){
        jQuery(".wceazy_pi_emulator_order_date").show()
    }else{
        jQuery(".wceazy_pi_emulator_order_date").hide()
    }
    if(jQuery(".wceazy_pdf_invoice_enable_ssn_id input[type='checkbox']:checked").length > 0){
        jQuery(".wceazy_pi_emulator_ssn_id").show()
    }else{
        jQuery(".wceazy_pi_emulator_ssn_id").hide()
    }
    if(jQuery(".wceazy_pdf_invoice_enable_vat_id input[type='checkbox']:checked").length > 0){
        jQuery(".wceazy_pi_emulator_vat_id").show()
    }else{
        jQuery(".wceazy_pi_emulator_vat_id").hide()
    }
    if(jQuery(".wceazy_pdf_invoice_enable_from_address input[type='checkbox']:checked").length > 0){
        jQuery(".wceazy_pi_emulator_from_address").show()
    }else{
        jQuery(".wceazy_pi_emulator_from_address").hide()
    }
    if(jQuery(".wceazy_pdf_invoice_enable_billing_address input[type='checkbox']:checked").length > 0){
        jQuery(".wceazy_pi_emulator_billing_address").show()
    }else{
        jQuery(".wceazy_pi_emulator_billing_address").hide()
    }
    if(jQuery(".wceazy_pdf_invoice_enable_shipping_address input[type='checkbox']:checked").length > 0){
        jQuery(".wceazy_pi_emulator_shipping_address").show()
    }else{
        jQuery(".wceazy_pi_emulator_shipping_address").hide()
    }
    if(jQuery(".wceazy_pdf_invoice_enable_email input[type='checkbox']:checked").length > 0){
        jQuery(".wceazy_pi_emulator_email").show()
    }else{
        jQuery(".wceazy_pi_emulator_email").hide()
    }
    if(jQuery(".wceazy_pdf_invoice_enable_phone input[type='checkbox']:checked").length > 0){
        jQuery(".wceazy_pi_emulator_phone").show()
    }else{
        jQuery(".wceazy_pi_emulator_phone").hide()
    }
    if(jQuery(".wceazy_pdf_invoice_enable_payment_method input[type='checkbox']:checked").length > 0){
        jQuery(".wceazy_pi_emulator_payment_method").show()
    }else{
        jQuery(".wceazy_pi_emulator_payment_method").hide()
    }
    if(jQuery(".wceazy_pdf_invoice_enable_customer_note input[type='checkbox']:checked").length > 0){
        jQuery(".wceazy_pi_emulator_customer_note").show()
    }else{
        jQuery(".wceazy_pi_emulator_customer_note").hide()
    }
    if(jQuery(".wceazy_pdf_invoice_enable_footer input[type='checkbox']:checked").length > 0){
        jQuery(".wceazy_pi_emulator_footer").show()
    }else{
        jQuery(".wceazy_pi_emulator_footer").hide()
    }


    if(jQuery(".wceazy_pdf_invoice_enable_shipping_shop_logo input[type='checkbox']:checked").length > 0){
        jQuery(".wceazy_pi_emulator_shipping_shop_logo").show()
    }else{
        jQuery(".wceazy_pi_emulator_shipping_shop_logo").hide()
    }
    if(jQuery(".wceazy_pdf_invoice_enable_shipping_from_address input[type='checkbox']:checked").length > 0){
        jQuery(".wceazy_pi_emulator_shipping_from_address").show()
    }else{
        jQuery(".wceazy_pi_emulator_shipping_from_address").hide()
    }
    if(jQuery(".wceazy_pdf_invoice_enable_shipping_to_address input[type='checkbox']:checked").length > 0){
        jQuery(".wceazy_pi_emulator_shipping_to_address").show()
    }else{
        jQuery(".wceazy_pi_emulator_shipping_to_address").hide()
    }
    if(jQuery(".wceazy_pdf_invoice_enable_shipping_order_number input[type='checkbox']:checked").length > 0){
        jQuery(".wceazy_pi_emulator_shipping_order_number").show()
    }else{
        jQuery(".wceazy_pi_emulator_shipping_order_number").hide()
    }
    if(jQuery(".wceazy_pdf_invoice_enable_shipping_weight input[type='checkbox']:checked").length > 0){
        jQuery(".wceazy_pi_emulator_shipping_weight").show()
    }else{
        jQuery(".wceazy_pi_emulator_shipping_weight").hide()
    }
    if(jQuery(".wceazy_pdf_invoice_enable_shipping_date input[type='checkbox']:checked").length > 0){
        jQuery(".wceazy_pi_emulator_shipping_date").show()
    }else{
        jQuery(".wceazy_pi_emulator_shipping_date").hide()
    }
    if(jQuery(".wceazy_pdf_invoice_enable_shipping_email input[type='checkbox']:checked").length > 0){
        jQuery(".wceazy_pi_emulator_shipping_email").show()
    }else{
        jQuery(".wceazy_pi_emulator_shipping_email").hide()
    }
    if(jQuery(".wceazy_pdf_invoice_enable_shipping_phone input[type='checkbox']:checked").length > 0){
        jQuery(".wceazy_pi_emulator_shipping_phone").show()
    }else{
        jQuery(".wceazy_pi_emulator_shipping_phone").hide()
    }
}



function wceazy_pdf_invoice_image_chooser(view){
    var image_frame;
    if(image_frame){
        image_frame.open();
    }
    image_frame = wp.media({
        title: 'Select Media',
        multiple : false,
        library : {
            type : 'image',
        }
    });
    image_frame.on('close',function() {
        var selection =  image_frame.state().get('selection');
        jQuery(view).parent().find("input").val(selection.models[0].attributes.url)
        jQuery(view).parent().find("img").attr("src", selection.models[0].attributes.url);
    });
    image_frame.on('open',function() {
        var selection =  image_frame.state().get('selection');
        var ids = jQuery('#'+input_field_id).val().split(',');
        ids.forEach(function(id) {
            var attachment = wp.media.attachment(id);
            attachment.fetch();
            selection.add( attachment ? [ attachment ] : [] );
        });
    });
    image_frame.open();
}


function wceazy_pdf_invoice_save() {
    jQuery('.wceazy_pdf_invoice_bottom_button_section button').text('Please Wait..');
    jQuery('.wceazy_pdf_invoice_bottom_button_section button').prop('disabled', true);
    let jQuerypostData = {


        'deactivate_invoice': jQuery(".wceazy_pdf_invoice_deactivate_invoice input[type='checkbox']:checked").length > 0 ? "yes" : "no",
        'deactivate_shipping_label': jQuery(".wceazy_pdf_invoice_deactivate_shipping_label input[type='checkbox']:checked").length > 0 ? "yes" : "no",

        'shop_name': jQuery(".wceazy_pdf_invoice_shop_name input").val(),
        'shop_logo': jQuery(".wceazy_pdf_invoice_shop_logo input").val(),
        'footer_info': jQuery(".wceazy_pdf_invoice_footer_info textarea").val(),
        'sender_name': jQuery(".wceazy_pdf_invoice_sender_name input").val(),
        'address_line_one': jQuery(".wceazy_pdf_invoice_address_line_one input").val(),
        'address_line_two': jQuery(".wceazy_pdf_invoice_address_line_two input").val(),
        'address_city': jQuery(".wceazy_pdf_invoice_address_city input").val(),
        'postal_code': jQuery(".wceazy_pdf_invoice_postal_code input").val(),
        'country_state': jQuery(".wceazy_pdf_invoice_country_state select").val(),
        'contact_number': jQuery(".wceazy_pdf_invoice_contact_number input").val(),
        'display_download': jQuery(".wceazy_pdf_invoice_display_download select").val(),

        'disabled_status': jQuery(".wceazy_pdf_invoice_disabled_status select").val().join(","),
        /*'enable_vat_ssn': jQuery(".wceazy_pdf_invoice_enable_vat_ssn input[type='checkbox']:checked").length > 0 ? "yes" : "no",
        'attach_to_email': jQuery(".wceazy_pdf_invoice_attach_to_email select").val().join(","),*/
        'ordernumber_as_invoice_number': jQuery(".wceazy_pdf_invoice_ordernumber_as_invoice_number input[type='checkbox']:checked").length > 0 ? "yes" : "no",
        'invoice_start_number': jQuery(".wceazy_pdf_invoice_invoice_start_number input").val(),
        /*'invoice_prefix': jQuery(".wceazy_pdf_invoice_invoice_prefix input").val(),
        'invoice_suffix': jQuery(".wceazy_pdf_invoice_invoice_suffix input").val(),*/

        'enable_invoice_title': jQuery(".wceazy_pdf_invoice_enable_invoice_title input[type='checkbox']:checked").length > 0 ? "yes" : "no",
        'enable_shop_logo': jQuery(".wceazy_pdf_invoice_enable_shop_logo input[type='checkbox']:checked").length > 0 ? "yes" : "no",
        'enable_invoice_number': jQuery(".wceazy_pdf_invoice_enable_invoice_number input[type='checkbox']:checked").length > 0 ? "yes" : "no",
        'enable_order_number': jQuery(".wceazy_pdf_invoice_enable_order_number input[type='checkbox']:checked").length > 0 ? "yes" : "no",
        'enable_invoice_date': jQuery(".wceazy_pdf_invoice_enable_invoice_date input[type='checkbox']:checked").length > 0 ? "yes" : "no",
        'enable_order_date': jQuery(".wceazy_pdf_invoice_enable_order_date input[type='checkbox']:checked").length > 0 ? "yes" : "no",
        /*'enable_ssn_id': jQuery(".wceazy_pdf_invoice_enable_ssn_id input[type='checkbox']:checked").length > 0 ? "yes" : "no",
        'enable_vat_id': jQuery(".wceazy_pdf_invoice_enable_vat_id input[type='checkbox']:checked").length > 0 ? "yes" : "no",*/
        'enable_from_address': jQuery(".wceazy_pdf_invoice_enable_from_address input[type='checkbox']:checked").length > 0 ? "yes" : "no",
        'enable_billing_address': jQuery(".wceazy_pdf_invoice_enable_billing_address input[type='checkbox']:checked").length > 0 ? "yes" : "no",
        'enable_shipping_address': jQuery(".wceazy_pdf_invoice_enable_shipping_address input[type='checkbox']:checked").length > 0 ? "yes" : "no",
        'enable_email': jQuery(".wceazy_pdf_invoice_enable_email input[type='checkbox']:checked").length > 0 ? "yes" : "no",
        'enable_phone': jQuery(".wceazy_pdf_invoice_enable_phone input[type='checkbox']:checked").length > 0 ? "yes" : "no",
        'enable_payment_method': jQuery(".wceazy_pdf_invoice_enable_payment_method input[type='checkbox']:checked").length > 0 ? "yes" : "no",
        'enable_customer_note': jQuery(".wceazy_pdf_invoice_enable_customer_note input[type='checkbox']:checked").length > 0 ? "yes" : "no",
        'enable_footer': jQuery(".wceazy_pdf_invoice_enable_footer input[type='checkbox']:checked").length > 0 ? "yes" : "no",


        'enable_shipping_shop_logo': jQuery(".wceazy_pdf_invoice_enable_shipping_shop_logo input[type='checkbox']:checked").length > 0 ? "yes" : "no",
        'enable_shipping_from_address': jQuery(".wceazy_pdf_invoice_enable_shipping_from_address input[type='checkbox']:checked").length > 0 ? "yes" : "no",
        'enable_shipping_to_address': jQuery(".wceazy_pdf_invoice_enable_shipping_to_address input[type='checkbox']:checked").length > 0 ? "yes" : "no",
        'enable_shipping_order_number': jQuery(".wceazy_pdf_invoice_enable_shipping_order_number input[type='checkbox']:checked").length > 0 ? "yes" : "no",
        'enable_shipping_weight': jQuery(".wceazy_pdf_invoice_enable_shipping_weight input[type='checkbox']:checked").length > 0 ? "yes" : "no",
        'enable_shipping_date': jQuery(".wceazy_pdf_invoice_enable_shipping_date input[type='checkbox']:checked").length > 0 ? "yes" : "no",
        'enable_shipping_email': jQuery(".wceazy_pdf_invoice_enable_shipping_email input[type='checkbox']:checked").length > 0 ? "yes" : "no",
        'enable_shipping_phone': jQuery(".wceazy_pdf_invoice_enable_shipping_phone input[type='checkbox']:checked").length > 0 ? "yes" : "no",


    };



    let jQuerypost_data = {'action': 'wceazy_pdf_invoice_save', 'data': jQuerypostData};

    jQuery.ajax({
        url: ajaxurl, type: "POST", data: jQuerypost_data,
        success: function (data) {
            var obj = JSON.parse(data);
            if (obj.status == 'true') {
                Command: toastr["success"]("Settings Saved Successfully!");
                jQuery('.wceazy_pdf_invoice_bottom_button_section button').text('Save Settings');
                jQuery('.wceazy_pdf_invoice_bottom_button_section button').prop('disabled', false);
            } else {
                Command: toastr["error"]("Failed, Please try again!");
                jQuery('.wceazy_pdf_invoice_bottom_button_section button').text('Save Settings');
                jQuery('.wceazy_pdf_invoice_bottom_button_section button').prop('disabled', false);
            }
        }
    });
}


