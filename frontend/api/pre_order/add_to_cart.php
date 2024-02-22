<?php

$result = array();


if(isset($_REQUEST['product_id'])) {
    $product_id = sanitize_text_field($_REQUEST['product_id']);


    $product_status = get_post_status($product_id);
    if (WC()->cart->add_to_cart($product_id) && 'publish' === $product_status) {
        WC_AJAX::get_refreshed_fragments();
        $result = array("status" => 'true');
    } else {
        $result = array("status" => 'false');
    }
}else {
    $result = array("status" => 'false');
}


echo json_encode ($result, JSON_UNESCAPED_UNICODE);