<?php

// If this file is called directly, abort.
if (!defined ('WPINC')) {
    die;
}

if(!isset($_SESSION)){session_start();}

if (!class_exists ('WcEazyProductFilterUtils')) {
    class WcEazyProductFilterUtils
    {
        public $base_admin;
        public $module_admin;

        public function __construct ($base_admin, $module_admin)
        {
            $this->base_admin = $base_admin;
            $this->module_admin = $module_admin;
        }

        public function saveSettings($post_data){
            if(!empty($post_data)){
                update_option( 'wceazy_product_filter_settings', json_encode($post_data) );
            }
        }

        public function getWooProductCategories(){
            $categories = array();
            $cat_args = array(
                'orderby'    => "name",
                'order'      => "asc",
                'hide_empty' => false,
            );
            $product_categories = get_terms( 'product_cat', $cat_args );
            foreach ($product_categories as $key => $category) {
                $categories[] = array(
                    "title" => $category->name,
                    "slug" => $category->slug,
                );
            }
            return $categories;
        }


    }
}