jQuery(document).ready(function($){
    'use strict';


    // BlockUI settings
    jQuery.blockUI.defaults.message = null;
    jQuery.blockUI.defaults.overlayCSS.backgroundColor = '#fff';

    /* Enable Select2 or WooSelect on Address Selection Field on Checkout */
    var address_book = jQuery( 'select#shipping_address_book:visible, select#billing_address_book:visible' );
    if ( jQuery.fn.selectWoo ) {
        address_book.selectWoo();
    } else if ( jQuery.fn.select2 ) {
        address_book.select2();
    }



    jQuery( '#billing_address_book_field #billing_address_book' ).on( 'change', function () {
        checkout_field_prepop( 'billing' );
    });

    jQuery( '#shipping_address_book_field #shipping_address_book' ).on( 'change', function () {
        checkout_field_prepop( 'shipping' );
    } );


});

function wceazy_frontend_address_book_delete(view, address_name){
    jQuery(view).text("Please wait...")
    jQuery( '.woocommerce-MyAccount-content' ).block();
    let post_data = {'action': 'wceazy_address_book_delete', 'name': address_name};
    jQuery.ajax({
        type: 'post',
        url: wceazy_client_address_book_object.ajaxurl,
        data: post_data,
        success: function (data) {
            location.reload();
        },
    });
}


function wceazy_frontend_address_book_make_primary(view, address_name){

    jQuery(view).text("Please wait...")
    jQuery( '.woocommerce-MyAccount-content' ).block();
    let post_data = {'action': 'wceazy_address_book_make_primary', 'name': address_name};
    jQuery.ajax({
        type: 'post',
        url: wceazy_client_address_book_object.ajaxurl,
        data: post_data,
        success: function (data) {
            location.reload();
        },
    });
}












function checkout_field_prepop( address_type ) {


    let that = jQuery( '#' + address_type + '_address_book_field #' + address_type + '_address_book' );

    let name = jQuery(that).val();

    if ( name !== undefined && name !== null ) {

        if ( 'add_new' === name ) {

            // Clear values when adding a new address.
            jQuery( '.woocommerce-' + address_type + '-fields__field-wrapper input' ).not( jQuery( '#' + address_type + '_country' ) ).not( jQuery('#' + address_type + '_address_book') ).each( function () {
                var input = jQuery( this );
                if ( input.attr("type") === "checkbox" || input.attr("type") === "radio") {
                    input.prop( "checked", false );
                } else {
                    input.val( '' );
                }
            } );
            jQuery( '.woocommerce-' + address_type + '-fields__field-wrapper select' ).not( jQuery( '#' + address_type + '_country' ) ).not( jQuery('#' + address_type + '_address_book') ).each( function () {
                var input = jQuery( this );
                if ( input.hasClass( 'selectized' ) && input[0] && input[0].selectize ) {
                    input[0].selectize.setValue( "" );
                } else {
                    input.val( "" ).trigger( 'change' );
                }
            } );

            // If shipping calculator used on cart page

            return;
        }

        if ( name.length > 0 ) {

            // Show BlockUI overlay
            jQuery( '.woocommerce-' + address_type + '-fields' ).block();





            let post_data = {'action': 'wceazy_address_book_get_address_on_checkout', 'name': name};
            jQuery.ajax({
                type: 'post',
                url: wceazy_client_address_book_object.ajaxurl,
                data: post_data,
                success: function (data) {

                    jQuery( '.woocommerce-' + address_type + '-fields' ).unblock();

                    var obj = JSON.parse(data);
                    if(obj.status === "true"){
                        var field_data = obj.field_data;

                        for (var i = 0; i < field_data.length; i++) {

                            let input = jQuery( '#' + field_data[i].key );
                            if ( input.length > 0 ) {
                                if ( input.attr( 'readonly' ) !== 'readonly' ) {
                                    if ( input.is("select") ) {
                                        if ( input.hasClass( 'selectized' ) && input[0] && input[0].selectize ) {
                                            input[0].selectize.setValue( field_data[i].value );
                                        } else {
                                            input.val( field_data[i].value ).trigger( 'change' );
                                        }
                                    } else if ( input.attr("type") === "checkbox" ) {
                                        input.prop( 'checked', field_data[i].value === "1" ).trigger( 'change' );
                                    } else {
                                        input.val( field_data[i].value ).trigger( 'change' );
                                    }
                                }
                            } else {
                                // Handle radio buttons.
                                let radio_field = jQuery( '#' + field_data[i].key + '_field' );
                                if ( radio_field.length > 0 ) {
                                    radio_field.find("input[type='radio']").each( function (index, radio_button) {
                                        if ( jQuery(radio_button).val() === field_data[i].value ) {
                                            jQuery(radio_button).prop( 'checked', true ).trigger( 'change' );
                                        }
                                    });
                                }
                            }
                        }
                    }

                },
            });

        }
    }
}