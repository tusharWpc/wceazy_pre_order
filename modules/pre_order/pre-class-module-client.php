<?php
if (!defined('WPINC')) {
    die;
}

if (!class_exists('WcEazyPreOrderClient')) {
    class WcEazyPreOrderClient
    {
        public $utils;
        public $base_admin;
        public $module_admin;
        public $module_slug = "pre_order";

        public function __construct($base_admin)
        {
            $this->module_admin = $this;
            $this->base_admin = $base_admin;

            $this->utils = new WcEazyPreOrderUtils($this->base_admin, $this->module_admin);


            // In the constructor of WcEazyPreOrderClient class
            add_action('woocommerce_order_status_pending_to_processing', array($this->utils, 'send_preorder_purchase_notification'), 10, 2);


            add_action('woocommerce_before_calculate_totals', array($this->utils, 'apply_preorder_discount_to_cart'), 1100, 1);
            add_action('woocommerce_product_options_general_product_data', array($this->utils, 'add_preorder_fields'));
            add_action('admin_footer', array($this->utils, 'show_hide_preorder_fields'));
            add_action('woocommerce_process_product_meta', array($this->utils, 'save_preorder_fields'));

            // Hook to modify single product add to cart text based on '_is_pre_order' meta
            add_action('woocommerce_single_product_summary', array($this, 'modify_add_to_cart_text'), 30);

            add_filter('woocommerce_product_add_to_cart_text', array($this->utils, 'custom_preorder_button_text'), 10, 1);
            add_action('wp', array($this->utils, 'schedule_preorder_availability_update'));
            add_action('update_preorder_availability', array($this->utils, 'update_preorder_availability'));
            add_action('woocommerce_before_add_to_cart_form', array($this->utils, 'display_preorder_date_and_time'), 15);
            add_filter('woocommerce_get_price_html', array($this->utils, 'custom_preorder_price_html'), 10, 2);


            // Hook into WooCommerce to display pre-order information in the order details page
            add_action('woocommerce_order_details_after_order_table', array($this->utils, 'display_preorder_information_in_order_details'), 10, 1);

            add_action('init', array($this->utils, 'add_preorder_status_to_product'), 10, 2);

            add_filter('woocommerce_product_get_price', array($this->utils, 'custom_preorder_price'), 10, 2);
            add_filter('woocommerce_product_get_regular_price', array($this->utils, 'custom_preorder_price'), 10, 2);

            add_filter('woocommerce_product_variation_get_regular_price', array($this->utils, 'custom_preorder_price'), 10, 2);

            add_filter('woocommerce_product_variation_get_price', array($this->utils, 'custom_preorder_price'), 10, 2);

            // //    Error
            //   add_filter('woocommerce_order_query', array($this->utils, 'filter_orders_by_preorder_products'), 10, 2);

            // // // Hook to set pre-order date when the order is placed
            add_action('woocommerce_checkout_order_processed', array($this, 'set_preorder_date_on_order_placement'), 10, 3);

            // // // Hook into the auto-cancel task using the WcEazyPreOrderUtils instance
            add_action('wp', array($this->utils, 'schedule_auto_cancel_task'));


            // // // Hook into the auto-cancel task
            add_action('auto_cancel_pre_orders', array($this, 'auto_cancel_pre_orders'));

        }

        // Modify single product add to cart text based on '_is_pre_order' meta
        public function modify_add_to_cart_text()
        {
            global $product;

            $is_pre_order = get_post_meta($product->get_id(), '_is_pre_order', true);

            // var_dump($is_pre_order);

            if ($is_pre_order === 'yes') {
                add_filter('woocommerce_product_single_add_to_cart_text', array($this->utils, 'custom_preorder_button_text'), 10, 1);
            }
        }
    }
}
?>