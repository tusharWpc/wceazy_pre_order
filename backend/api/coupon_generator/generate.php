<?php

$result = array();

/* Check if user has manage option capabilities */
if (current_user_can('manage_options')) {

    $post_data = array();
    if (isset($_REQUEST) && $_REQUEST['data']) {
        $post_data = isset( $_REQUEST['data'] ) ? array_map( 'esc_attr', $_REQUEST['data']) : array();
    } else {
        $result = array("status" => 'false', "coupons" => array());
    }

    // get post data
    $prefix = '';
    $number_of_coupon = isset($post_data['number_of_coupon']) && !empty($post_data['number_of_coupon']) ? (sanitize_text_field($post_data['number_of_coupon'])) : 1;
    $coupon_type = 'char';
    $coupon_length = isset($post_data['coupon_length']) && !empty($post_data['coupon_length']) ? (sanitize_text_field($post_data['coupon_length'])) : 8;

    $post_data = array(
        'discount_type' => isset($post_data['discount_type']) ? (sanitize_text_field($post_data['discount_type'])) : "fixed_cart",
        'coupon_amount' => isset($post_data['coupon_amount']) ? (sanitize_text_field($post_data['coupon_amount'])) : "",
        'free_shipping' => isset($post_data['free_shipping']) ? (sanitize_text_field($post_data['free_shipping'])) : "no",
        'expiry_date' => isset($post_data['expiry_date']) ? (sanitize_text_field($post_data['expiry_date'])) : "",
        'minimum_amount' => isset($post_data['minimum_amount']) ? (sanitize_text_field($post_data['minimum_amount'])) : "",
        'maximum_amount' => isset($post_data['maximum_amount']) ? (sanitize_text_field($post_data['maximum_amount'])) : "",
        'individual_use' => isset($post_data['individual_use']) ? (sanitize_text_field($post_data['individual_use'])) : "no",
        'exclude_sale_items' => isset($post_data['exclude_sale_items']) ? (sanitize_text_field($post_data['exclude_sale_items'])) : "no",
        'product_ids' => isset($post_data['product_ids']) ? (sanitize_text_field($post_data['product_ids'])) : "",
        'exclude_product_ids' => isset($post_data['exclude_product_ids']) ? (sanitize_text_field($post_data['exclude_product_ids'])) : "",
        'product_categories' => isset($post_data['product_categories']) ? (sanitize_text_field($post_data['product_categories'])) : "" ,
        'exclude_product_categories' => isset($post_data['exclude_product_categories']) ?  (sanitize_text_field($post_data['exclude_product_categories'])) : "",
        'customer_email' => isset($post_data['customer_email']) ? explode(",", $post_data['customer_email']) : array(),
        'usage_limit' => isset($post_data['usage_limit']) ? (sanitize_text_field($post_data['usage_limit'])) : "",
        'usage_limit_per_user' => isset($post_data['usage_limit_per_user']) ? (sanitize_text_field($post_data['usage_limit_per_user'])) : "",
        'limit_usage_to_x_items' =>  isset($post_data['limit_usage_to_x_items']) ? (sanitize_text_field($post_data['limit_usage_to_x_items'])) : "",
        /*'usage_count' =>  0,*/
    );

    $coupons = $this->base_admin->coupon_generator->utils->get_generated_coupon_codes($prefix, $number_of_coupon, $coupon_type, $coupon_length, $post_data);
    $result = array("status" => 'true', "coupons" => $coupons);

} else {
    $result = array("status" => 'false', "coupons" => array());
}

echo json_encode($result, JSON_UNESCAPED_UNICODE);