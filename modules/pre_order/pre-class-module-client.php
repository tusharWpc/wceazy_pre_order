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

            // add_action('plugins_loaded', array($this->utils, 'hemal_loaded'));
            // Free Hooks Start
            // Add pre-order fields to product general settings
            add_action('woocommerce_product_options_general_product_data', array($this->utils, 'add_preorder_fields'));

            // Show/hide pre-order fields in the admin area
            add_action('admin_footer', array($this->utils, 'show_hide_preorder_fields'));

            // Save pre-order fields when product is updated
            add_action('woocommerce_process_product_meta', array($this->utils, 'save_preorder_fields'));

            // Modify single product add to cart text based on '_is_pre_order' meta
            add_action('woocommerce_single_product_summary', array($this, 'modify_add_to_cart_text'), 30);

            // Change add to cart text for pre-order products
            add_filter('woocommerce_product_add_to_cart_text', array($this->utils, 'custom_preorder_button_text'), 10, 1);

            // Schedule pre-order availability update
            add_action('wp', array($this->utils, 'schedule_preorder_availability_update'));

            // Display pre-order date and time on product page
            add_action('woocommerce_before_add_to_cart_form', array($this->utils, 'display_preorder_date_and_time'), 15);

            // Display pre-order information in order details page
            add_action('woocommerce_order_details_after_order_table', array($this->utils, 'display_preorder_information_in_order_details'), 10, 1);

            // Add pre-order status to product
            add_action('init', array($this->utils, 'add_preorder_status_to_product'), 10, 2);

            // Modify product price for pre-order products
            add_filter('woocommerce_product_get_price', array($this->utils, 'custom_preorder_price'), 10, 2);
            // add_filter('woocommerce_product_get_regular_price', array($this->utils, 'custom_preorder_price_html'), 10, 2);
            add_filter('woocommerce_product_variation_get_regular_price', array($this->utils, 'custom_preorder_price'), 10, 2);
            add_filter('woocommerce_product_variation_get_price', array($this->utils, 'custom_preorder_price'), 10, 2);

            // Free Hooks End

            // Hook into the 'woocommerce_admin_order_data_after_billing_address' or 'woocommerce_admin_order_data_after_shipping_address' action hook
            add_filter('manage_edit-shop_order_columns', array($this->utils, 'preorderCustomColumn'), 10, 2);


            add_filter('manage_woocommerce_page_wc-orders_columns', array($this->utils, 'preorderCustomColumn'), 10, 2);
 


            // pro Hooks start
            // Set pre-order date when the order is placed
            add_action('woocommerce_checkout_order_processed', array($this, 'set_preorder_date_on_order_placement'), 10, 3);

            // // Send email notification for users when pre-order period is over and products are fully available
            // add_action('woocommerce_order_status_pending_to_processing', array($this->utils, 'send_preorder_purchase_notification'), 10, 2);

            // // Notify website admins when pre-order periods are nearing their end
            // add_action('wp', array($this->utils, 'schedule_auto_cancel_task'));

            // // Update pre-order availability
            // add_action('update_preorder_availability', array($this->utils, 'update_preorder_availability'));

            // // Automatically cancel pre-orders if the product is no longer available
            // add_action('auto_cancel_pre_orders', array($this, 'auto_cancel_pre_orders'));

            // pro Hooks End

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
