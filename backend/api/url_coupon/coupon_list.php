<?php

$result = array();

/* Check if user has manage option capabilities */
if (current_user_can ('manage_options')) {

    $tableData = array();

    // start query here
    $coupons = get_posts (array(
        'posts_per_page' => -1,
        'post_type' => 'shop_coupon',
        'post_status' => 'publish',
    ));

    // generate new auto apply coupon data for
    if (!empty($coupons)) {
        foreach ($coupons as $key => $coupon) {

            $code = "<strong>" . $coupon->post_name . "</strong>";

            // get meta data
            $fixed_cart_discount = get_post_meta ($coupon->ID, 'discount_type', true);
            $amount = get_post_meta ($coupon->ID, 'coupon_amount', true);
            $free_shipping = get_post_meta ($coupon->ID, 'free_shipping', true);
            $expiry_date = get_post_meta ($coupon->ID, 'date_expires', true);
            $minimum_amount = get_post_meta ($coupon->ID, 'minimum_amount', true);
            $maximum_amount = get_post_meta ($coupon->ID, 'maximum_amount', true);
            $individual_use = get_post_meta ($coupon->ID, 'individual_use', true);
            $exclude_sale_items = get_post_meta ($coupon->ID, 'exclude_sale_items', true);
            $product_ids = get_post_meta ($coupon->ID, 'product_ids', true);
            $exclude_product_ids = get_post_meta ($coupon->ID, 'exclude_product_ids', true);
            $product_categories = get_post_meta ($coupon->ID, 'product_categories', true);
            $exclude_product_categories = get_post_meta ($coupon->ID, 'exclude_product_categories', true);
            $customer_email = get_post_meta ($coupon->ID, 'customer_email', true);
            $limit_usage_to_x_items = get_post_meta ($coupon->ID, 'limit_usage_to_x_items', true);
            $usage_limit = get_post_meta ($coupon->ID, 'usage_limit', true);
            $usage_count = get_post_meta ($coupon->ID, 'usage_count', true);
            $usage_limit_per_user = get_post_meta ($coupon->ID, 'usage_limit_per_user', true);

            $discount_type = ($fixed_cart_discount == 'fixed_cart') ? 'Fixed cart discount' : ($fixed_cart_discount == 'percent' ? 'Percentage discount' : 'Fixed product discount');
            $couponPost = get_post ($coupon->ID);
            $description = !empty( $couponPost->post_excerpt ) ? $couponPost->post_excerpt : "-";

            $url_coupon = get_post_meta ($coupon->ID, 'wceazy_url_coupon_enable', true);
            $is_url_coupon = (!empty($url_coupon)) ? $url_coupon : 'No';
            $usage_limit = ($usage_limit > 0) ? $usage_limit : '∞';
            $usage_count = ($usage_count > 0) ? $usage_count : 0;
            $usageLimit = $usage_count . ' / ' . $usage_limit;
            $date_expires = (!empty($expiry_date)) ? date ('F d, Y', $expiry_date) : '-';

            $is_coupon_class = ($is_url_coupon == 'yes') ? 'text-success' : 'text-warning';


            $actions = "<div class='wceazy_url_coupon_table_row_action'>
                                <a class='wceazy_url_coupon_edit_apply_btn' title='Edit Coupon' target='_blank' href='".site_url('wp-admin/post.php?post='.$coupon->ID.'&action=edit')."'></a>
                        </div>";



            // generate data table here
            $tableData[] = array(
                // columns dynamic valus
                $code,
                $discount_type,
                $amount,
                $description,
                $product_ids,
                $usageLimit,
                $date_expires,
                '<span class="' . $is_coupon_class . '">' . ucfirst ($is_url_coupon) . '</span>',
                $actions,

                // table columns
                'code',
                'fixed_cart_discount',
                'amount',
                'description',
                'product_ids',
                'usage_limit',
                'expiry_date',
                'is_uto_coupon',
                'actions'
            );
        }

        $result['draw'] = 1;
        $result['recordsTotal'] = 1;
        $result['recordsFiltered'] = 1;
        $result['data'] = $tableData;
    } else {
        $result['draw'] = 0;
        $result['recordsTotal'] = 0;
        $result['recordsFiltered'] = 0;
        $result['data'] = [];
    }

} else {
    $result['draw'] = 0;
    $result['recordsTotal'] = 0;
    $result['recordsFiltered'] = 0;
    $result['data'] = [];
}

echo json_encode ($result, JSON_UNESCAPED_UNICODE);
