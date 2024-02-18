<?php

// If this file is called directly, abort.
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

            add_action('woocommerce_product_options_general_product_data', array($this->utils, 'add_preorder_fields'));
            add_action('admin_footer', array($this->utils, 'show_hide_preorder_fields'));
            add_action('woocommerce_process_product_meta', array($this->utils, 'save_preorder_fields'));
            add_filter('woocommerce_product_single_add_to_cart_text', array($this->utils, 'custom_preorder_button_text'), 10, 1);
            add_filter('woocommerce_product_add_to_cart_text', array($this->utils, 'custom_preorder_button_text'), 10, 1);
            add_action('wp', array($this->utils, 'schedule_preorder_availability_update'));
            add_action('update_preorder_availability', array($this->utils, 'update_preorder_availability'));
            add_action('woocommerce_before_add_to_cart_form', array($this->utils, 'display_preorder_date_and_time'), 15);
            add_filter('woocommerce_product_get_price', array($this->utils, 'custom_preorder_price'), 10, 2);
            add_filter('woocommerce_product_get_regular_price', array($this->utils, 'custom_preorder_price'), 10, 2);
            add_filter('woocommerce_product_variation_get_regular_price', array($this->utils, 'custom_preorder_price'), 10, 2);
            add_filter('woocommerce_product_variation_get_price', array($this->utils, 'custom_preorder_price'), 10, 2);

        }

        public function schedule_preorder_availability_update()
        {
            if (!wp_next_scheduled('update_preorder_availability')) {
                wp_schedule_event(time(), 'daily', 'update_preorder_availability');
            }
        }
    }
}