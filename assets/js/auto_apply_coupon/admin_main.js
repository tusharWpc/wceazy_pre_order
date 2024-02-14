
function wceazy_auto_apply_coupon_init(host){
    wceazy_hide_all()
    jQuery("#wceazy_auto_apply_coupon").show();

    wceazy_auto_apply_coupon_init_table_header_actions();
    wceazy_auto_apply_coupon_load_coupons();
}




function wceazy_auto_apply_coupon_init_table_header_actions(){

    jQuery( ".wceazy_auto_apply_coupon_table_top_actions .wceazy_auto_apply_coupon_items_per_page").unbind( "change" );
    jQuery( ".wceazy_auto_apply_coupon_table_top_actions .wceazy_auto_apply_coupon_items_per_page" ).bind( "change", function() {
        var pageLength = jQuery('.wceazy_auto_apply_coupon_table_top_actions .wceazy_auto_apply_coupon_items_per_page').val();
        wceazy_auto_apply_coupon_load_coupons(pageLength);
    });

    jQuery( ".wceazy_auto_apply_coupon_top_actions_part_right input").unbind( "keyup" );
    jQuery( ".wceazy_auto_apply_coupon_top_actions_part_right input" ).bind( "keyup", function() {
        jQuery( ".wceazy_auto_apply_coupon_filter_discount_type").val("")
        jQuery('.wceazy_auto_apply_coupon_table').DataTable().search(jQuery(this).val()).draw() ;
    });

    jQuery( ".wceazy_auto_apply_coupon_filter_discount_type").unbind( "change" );
    jQuery( ".wceazy_auto_apply_coupon_filter_discount_type" ).bind( "change", function() {
        jQuery( ".wceazy_auto_apply_coupon_top_actions_part_right input").val("")
        jQuery('.wceazy_auto_apply_coupon_table').DataTable().search(jQuery(this).val()).draw() ;
    });

}




function wceazy_auto_apply_coupon_bulk_edit_check_ability() {
    let wfaac_action_type = jQuery('.wceazy_auto_apply_coupon_bulk_action_type').val();
    var singleChecklen = jQuery("input[name='wceazy_auto_apply_coupon_table_row_checkboxes[]']:checked").length;
    if (singleChecklen > 0 && wfaac_action_type !== '') {
        jQuery(".wceazy_auto_apply_coupon_bulk_edit_btn").prop('disabled', false);
    }else{
        jQuery(".wceazy_auto_apply_coupon_bulk_edit_btn").prop('disabled', true);
    }
}

function wceazy_auto_apply_coupon_checkbox_select_all(field) {
    'use strict';
    jQuery(".wceazy_auto_apply_coupon_table_body input[type='checkbox']").each(function (i, object) {
        if(jQuery(field).is(':checked')) {
            jQuery(object).prop('checked', true).change();
        }else{
            jQuery(object).prop('checked', false).change();
        }
    })
}


function wceazy_auto_apply_coupon_bulk_edit() {
    wceazy_get_pro_open_popup("");
    return;
}




function wceazy_auto_apply_coupon_load_coupons(pageLength=10) {
    if (jQuery.fn.DataTable.isDataTable('.wceazy_auto_apply_coupon_table')) {
        jQuery('.wceazy_auto_apply_coupon_table').DataTable().destroy();
    }
    var post_data = {'action': 'wceazy_auto_apply_coupon_list_coupons'};
    jQuery('.wceazy_auto_apply_coupon_table').DataTable({
        processing: false,
        serverSide: false,
        pageLength: pageLength,
        searching: true,
        paging: true,
        ajax: {
            url: ajaxurl,
            type: "POST",
            data: post_data,
        },
        order: [],
        dom: 'Bfrtip',
        "columnDefs": [ {
            "targets": 'no-sort',
            "orderable": false
        } ]
    });
}



function wceazy_add_to_auto_apply_coupon(couponData) {
    jQuery('.wceazy_auto_apply_coupon_popup').addClass('opened');
    var couponCode = couponData.coupon_code;
    jQuery('.wceazy_auto_apply_coupon_popup .wceazy-popup-content').text('Do you want to add this coupon('+couponCode+') to Auto Apply List ?');

    var post_data = {'action': 'wceazy_auto_apply_coupon_add_to_auto_apply', 'data': couponData};

    jQuery( ".wceazy_auto_apply_coupon_popup .wceazy-btn-success").unbind( "click" );
    jQuery( ".wceazy_auto_apply_coupon_popup .wceazy-btn-success" ).bind( "click", function() {
        jQuery.ajax({
            url: ajaxurl,
            type: "POST",
            data: post_data,
            success: function (data) {
                var obj = JSON.parse(data);
                if (obj.status == 'true') {
                    jQuery('.wceazy_auto_apply_coupon_popup').removeClass('opened');
                    Command: toastr["success"]("Auto Apply Coupon Added Successfully!");
                    wceazy_auto_apply_coupon_load_coupons();
                } else {
                    jQuery('.wceazy_auto_apply_coupon_popup').removeClass('opened');
                    Command: toastr["error"]("Failed, Please try again!");
                }
            }
        });
    });
}



function wceazy_remove_from_auto_apply_coupon(couponData) {
    jQuery('.wceazy_auto_apply_coupon_popup').addClass('opened');
    var couponCode = couponData.coupon_code;
    jQuery('.wceazy_auto_apply_coupon_popup .wceazy-popup-content').text('Do you want to remove this coupon('+couponCode+') to Auto Apply List ?');

    var post_data = {'action': 'wceazy_auto_apply_coupon_remove_from_auto_apply', 'data': couponData};

    jQuery( ".wceazy_auto_apply_coupon_popup .wceazy-btn-success").unbind( "click" );
    jQuery( ".wceazy_auto_apply_coupon_popup .wceazy-btn-success" ).bind( "click", function() {
        jQuery.ajax({
            url: ajaxurl, type: "POST", data: post_data,
            success: function (data) {
                var obj = JSON.parse(data);
                if (obj.status == 'true') {
                    jQuery('.wceazy_auto_apply_coupon_popup').removeClass('opened');
                    wceazy_auto_apply_coupon_load_coupons();
                    Command: toastr["success"]("Auto Apply Coupon has been removed successfully!");
                } else {
                    jQuery('.wceazy_auto_apply_coupon_popup').removeClass('opened');
                    Command: toastr["success"]("Failed, Please try again!");
                }
            }
        });
    });

}


function wceazy_auto_apply_coupon_close_popup() {
    jQuery('.wceazy_auto_apply_coupon_popup').removeClass('opened');
}