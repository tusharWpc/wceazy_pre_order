<?php

$result = array();


if(isset($_REQUEST['coupon_code'])) {
    $coupon_code = sanitize_text_field($_REQUEST['coupon_code']);
    WC()->cart->apply_coupon( $coupon_code );
    WC_AJAX::get_refreshed_fragments();
    $result = array("status" => 'true');
}else {
    $result = array("status" => 'false');
}


echo json_encode ($result, JSON_UNESCAPED_UNICODE);