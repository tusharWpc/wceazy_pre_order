
function wceazy_url_coupon_init(host){
    wceazy_hide_all()
    jQuery("#wceazy_url_coupon").show();

    wceazy_url_coupon_init_table_header_actions();
    wceazy_url_coupon_load_coupons();
}




function wceazy_url_coupon_init_table_header_actions(){

    jQuery( ".wceazy_url_coupon_table_top_actions .wceazy_url_coupon_items_per_page").unbind( "change" );
    jQuery( ".wceazy_url_coupon_table_top_actions .wceazy_url_coupon_items_per_page" ).bind( "change", function() {
        var pageLength = jQuery('.wceazy_url_coupon_table_top_actions .wceazy_url_coupon_items_per_page').val();
        wceazy_url_coupon_load_coupons(pageLength);
    });

    jQuery( ".wceazy_url_coupon_top_actions_part_right input").unbind( "keyup" );
    jQuery( ".wceazy_url_coupon_top_actions_part_right input" ).bind( "keyup", function() {
        jQuery( ".wceazy_url_coupon_filter_discount_type").val("")
        jQuery('.wceazy_url_coupon_table').DataTable().search(jQuery(this).val()).draw() ;
    });

    jQuery( ".wceazy_url_coupon_filter_discount_type").unbind( "change" );
    jQuery( ".wceazy_url_coupon_filter_discount_type" ).bind( "change", function() {
        jQuery( ".wceazy_url_coupon_top_actions_part_right input").val("")
        jQuery('.wceazy_url_coupon_table').DataTable().search(jQuery(this).val()).draw() ;
    });

}




function wceazy_url_coupon_load_coupons(pageLength=10) {
    if (jQuery.fn.DataTable.isDataTable('.wceazy_url_coupon_table')) {
        jQuery('.wceazy_url_coupon_table').DataTable().destroy();
    }
    var post_data = {'action': 'wceazy_url_coupon_list_coupons'};
    jQuery('.wceazy_url_coupon_table').DataTable({
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
            "targets": 0,
            "orderable": false
        } ]
    });
}


