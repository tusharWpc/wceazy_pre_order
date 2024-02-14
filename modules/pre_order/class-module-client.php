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
 



            add_action( 'woocommerce_product_after_variable_attributes',  array($this->utils,  'wceazy_customVariationsFields'));
            add_action( 'woocommerce_product_options_stock_status',  array($this->utils,  'wceazy_customSimpleFields'));
            add_action( 'woocommerce_save_product_variation',  array($this->utils,  'wceazy_customVariationsFieldsSave'));
            add_action( 'woocommerce_process_product_meta',  array($this->utils,  'wceazy_customSimpleFieldsSave')); 
            add_action( 'admin_enqueue_scripts', [$this, 'wceazy_enqueue_datepicker'] ); // Enqueue datepicker script


        }

    }
}