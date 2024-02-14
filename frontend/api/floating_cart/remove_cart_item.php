<?php

$result = array();


if(isset($_REQUEST['product_id'])) {
    $product_id = sanitize_text_field($_REQUEST['product_id']);

    $product_cart_id = WC()->cart->generate_cart_id( $product_id );
    $cart_item_key = WC()->cart->find_product_in_cart( $product_cart_id );
    if ( $cart_item_key ) {
        WC()->cart->remove_cart_item( $cart_item_key );
    }
    WC_AJAX::get_refreshed_fragments();
    $result = array("status" => 'true');
}else {
    $result = array("status" => 'false');
}


echo json_encode ($result, JSON_UNESCAPED_UNICODE);