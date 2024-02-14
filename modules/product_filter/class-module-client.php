<?php


// If this file is called directly, abort.
if (!defined ('WPINC')) {
    die;
}

if (!class_exists ('WcEazyProductFilterClient')) {
    class WcEazyProductFilterClient
    {

        public $utils;
        public $base_admin;
        public $module_admin;
        public $module_slug = "product_filter";

        public function __construct ($base_admin)
        {
            $this->module_admin = $this;
            $this->base_admin = $base_admin;
            $this->utils = new WcEazyProductFilterUtils($this->base_admin, $this->module_admin);

            add_shortcode( 'wceazy_product_filter', array($this, 'wceazy_product_filter_shortcode_parser') );
        }

        public function wceazy_product_filter_shortcode_parser( $atts , $content = null) {
            return $this->wceazy_product_filter_view_maker();
        }

        public function wceazy_product_filter_view_maker() {
            ob_start();

            include 'template.php';

            return ob_get_clean();
        }

    }
}