<?php

// If this file is called directly, abort.
if (!defined ('WPINC')) {
    die;
}

if (!class_exists ('WcEazyFrequentlyBoughtClient')) {
    class WcEazyFrequentlyBoughtClient
    {

        public $utils;
        public $base_admin;
        public $module_admin;
        public $module_slug = "frequently_bought";

        public function __construct ($base_admin)
        {
            $this->module_admin = $this;
            $this->base_admin = $base_admin;
            $this->utils = new WcEazyFrequentlyBoughtUtils($this->base_admin, $this->module_admin);

            add_shortcode( 'wceazy_frequently_bought', array($this, 'wceazy_frequently_bought_shortcode_parser') );
        }

        public function wceazy_frequently_bought_shortcode_parser( $atts , $content = null) {
            return $this->wceazy_frequently_bought_view_maker();
        }

        public function wceazy_frequently_bought_view_maker() {
            ob_start();

            include 'template.php';

            return ob_get_clean();
        }

    }
}