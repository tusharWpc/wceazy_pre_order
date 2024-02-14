<?php

$result = array();


if(isset($_REQUEST['product_id']) && isset($_REQUEST['quantity']) && isset($_REQUEST['variation'])) {
    $product_id = sanitize_text_field($_REQUEST['product_id']);
    $quantity = sanitize_text_field($_REQUEST['quantity']);
    $variation = sanitize_text_field($_REQUEST['variation']);


    $product_status = get_post_status($product_id);
    if (WC()->cart->add_to_cart($product_id, $quantity, $variation) && 'publish' === $product_status) {
        wc_add_to_cart_message(array($product_id => $quantity), true);
        $result = array("status" => 'true');
    } else {
        $result = array("status" => 'false');
    }
}else {
    $result = array("status" => 'false');
}


echo json_encode ($result, JSON_UNESCAPED_UNICODE);