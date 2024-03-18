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

            // add_shortcode('product_type_selector', array($this, 'product_type_selector')); 

  
            // add section in product edit page.
            add_filter('woocommerce_product_data_tabs', array($this->utils, 'add_bought_together_tab'), 10, 1);
            add_action('woocommerce_product_data_panels', array($this->utils, 'add_bought_together_panel'));

            // search product.
            add_action('wp_ajax_wceazy_ajax_search_product', array($this->utils, 'wceazy_ajax_search_product'));
            add_action('wp_ajax_nopriv_wceazy_ajax_search_product', array($this->utils, 'wceazy_ajax_search_product'));

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