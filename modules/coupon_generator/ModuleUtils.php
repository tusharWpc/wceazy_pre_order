<?php

// If this file is called directly, abort.
if (!defined ('WPINC')) {
    die;
}

if(!isset($_SESSION)){session_start();}

if (!class_exists ('WcEazyCouponGeneratorUtils')) {
    class WcEazyCouponGeneratorUtils
    {
        public $base_admin;
        public $module_admin;

        public function __construct ($base_admin, $module_admin)
        {
            $this->base_admin = $base_admin;
            $this->module_admin = $module_admin;
        }

        public function getWooProducts()
        {
            $results = array();
            $args = array('post_type' => 'product', 'posts_per_page' => -1);
            foreach (get_posts($args) as $product) {
                $results[] = array("id" => $product->ID, "text" => $product->post_title);
            }
            return $results;
        }

        public function getWooCategories()
        {
            $results = array();
            $cat_args = array('taxonomy' => "product_cat", 'orderby' => 'name', 'order' => 'asc', 'hide_empty' => false);
            $product_categories = get_terms($cat_args);
            foreach ($product_categories as $category) {
                $results[] = array("id" => $category->term_id, "text" => $category->name);
            }
            return $results;
        }



        public function get_generated_coupon_codes ($prefix = '', $numberOfCoupon = 1, $isChar = 'char', $maxLength = 8, $post_data = array())
        {
            $coupon_codes = [];

            // create number of coupon codes
            for ($i = 1; $i <= $numberOfCoupon; $i++) {
                $random_code = $this->generate_unique_coupon_code (strtolower($prefix), $isChar, $maxLength);

                if($this->insert_coupon_post_data ($random_code, $post_data)){
                    $coupon_codes[] = $random_code;
                }
            }

            return $coupon_codes;
        }

        public function generate_unique_coupon_code ($prefix = '', $isChar = 'char', $maxLength = 8)
        {
            $charset = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $numberset = '0123456789';
            $numbeCharset = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
            $random_code = $prefix;
            $count = ($isChar == 'charNum') ? strlen ($numbeCharset) : (($isChar == 'num') ? strlen ($numberset) : strlen ($charset));
            while ($maxLength--) {
                $random_code .= ($isChar == 'charNum') ? $numbeCharset[mt_rand (0, $count - 1)] : ($isChar == 'num' ? $numberset[mt_rand (0, $count - 1)] : $charset[mt_rand (0, $count - 1)]);
            }
            return strtolower($random_code);
        }


        public function insert_coupon_post_data ($coupon_code, $post_data){

            $coupon = array(
                'post_title' => $coupon_code,
                'post_content' => '',
                'post_status' => 'publish',
                'post_author' => wp_get_current_user()->ID,
                'post_type' => 'shop_coupon');

            $new_coupon_id = wp_insert_post( $coupon );

            update_post_meta( $new_coupon_id, 'discount_type', $post_data['discount_type'] );
            update_post_meta( $new_coupon_id, 'coupon_amount', $post_data['coupon_amount'] );
            update_post_meta( $new_coupon_id, 'free_shipping', $post_data['free_shipping'] );
            update_post_meta( $new_coupon_id, 'date_expires', strtotime($post_data['expiry_date']) );
            update_post_meta( $new_coupon_id, 'minimum_amount', $post_data['minimum_amount'] );
            update_post_meta( $new_coupon_id, 'maximum_amount', $post_data['maximum_amount'] );
            update_post_meta( $new_coupon_id, 'individual_use', $post_data['individual_use']);
            update_post_meta( $new_coupon_id, 'exclude_sale_items', $post_data['exclude_sale_items'] );
            update_post_meta( $new_coupon_id, 'product_ids', $post_data['product_ids'] );
            update_post_meta( $new_coupon_id, 'exclude_product_ids', $post_data['exclude_product_ids'] );
            update_post_meta( $new_coupon_id, 'product_categories', $post_data['product_categories'] );
            update_post_meta( $new_coupon_id, 'exclude_product_categories', $post_data['exclude_product_categories'] );
            update_post_meta( $new_coupon_id, 'customer_email', $post_data['customer_email'] );
            update_post_meta( $new_coupon_id, 'usage_limit', $post_data['usage_limit'] );
            update_post_meta( $new_coupon_id, 'usage_limit_per_user', $post_data['usage_limit_per_user'] );
            update_post_meta( $new_coupon_id, 'limit_usage_to_x_items', $post_data['limit_usage_to_x_items'] );
            /*update_post_meta( $new_coupon_id, 'usage_count', 0 );*/
            return True;
        }


    }
}