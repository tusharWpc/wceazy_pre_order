<?php

$result = array();


if(isset($_REQUEST['product_id']) && isset($_REQUEST['quantity'])) {
    $product_id = sanitize_text_field($_REQUEST['product_id']);
    $quantity = sanitize_text_field($_REQUEST['quantity']);

    $product_cart_id = WC()->cart->generate_cart_id( $product_id );
    $cart_item_key = WC()->cart->find_product_in_cart( $product_cart_id );
    if ( $cart_item_key ) {
        WC()->cart->set_quantity( $cart_item_key, $quantity );
    }
    WC_AJAX::get_refreshed_fragments();
    $result = array("status" => 'true');
}else {
    $result = array("status" => 'false');
}


echo json_encode ($result, JSON_UNESCAPED_UNICODE);