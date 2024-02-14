<?php

// If this file is called directly, abort.
if (!defined ('WPINC')) {
    die;
}

if(!isset($_SESSION)){session_start();}

if (!class_exists ('WcEazyProductStickyBarUtils')) {
    class WcEazyProductStickyBarUtils
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


        public function saveSettings($post_data){
            if(!empty($post_data)){
                update_option( 'wceazy_product_sticky_bar_settings', json_encode($post_data) );
            }
        }

    }
}