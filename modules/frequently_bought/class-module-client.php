<?php

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

if (!class_exists('WcEazyFrequentlyBoughtClient')) {
    class WcEazyFrequentlyBoughtClient
    {

        public $utils;
        public $base_admin;
        public $module_admin;
        public $module_slug = "frequently_bought";

        public function __construct($base_admin)
        {
            $this->module_admin = $this;
            $this->base_admin = $base_admin;
            $this->utils = new WcEazyFrequentlyBoughtUtils($this->base_admin, $this->module_admin);

            add_shortcode('product_type_selector', array($this, 'product_type_selector'));



            add_action('woocommerce_product_set_stock_status', array($this->utils, 'send_preorder_availability_notification', 10, 2));


            add_action('init', array($this->utils, 'init', 10, 2));


            // Add image to variation
            add_filter('woocommerce_available_variation', array($this->utils, 'available_variation', 10, 2));


            // Settings
            add_action('admin_init', array($this->utils, 'register_settings', 10, 2));
            add_action('admin_menu', array($this->utils, 'admin_menu', 10, 2));

            // Enqueue frontend scripts
            add_action('wp_enqueue_scripts', array($this->utils, 'enqueue_scripts', 10, 2));

            // Enqueue backend scripts
            add_action('admin_enqueue_scripts', array($this->utils, 'admin_enqueue_scripts', 10, 2));

            // Backend AJAX
            add_action('wp_ajax_woosb_update_search_settings', array($this->utils, 'ajax_update_search_settings', 10, 2));
            add_action('wp_ajax_woosb_get_search_results', array($this->utils, 'ajax_get_search_results', 10, 2));

            // Add to selector
            add_filter('product_type_selector', array($this->utils, 'product_data_tabs', 10, 2));

            // Product data tabs
            add_filter('woocommerce_product_data_tabs', array($this->utils, $this, 'product_data_tabs', 10, 2));



        }




        public function wceazy_frequently_bought_shortcode_parser($atts, $content = null)
        {
            return $this->wceazy_frequently_bought_view_maker();
        }

        public function wceazy_frequently_bought_view_maker()
        {
            ob_start();

            include 'template.php';

            return ob_get_clean();
        }

    }
}