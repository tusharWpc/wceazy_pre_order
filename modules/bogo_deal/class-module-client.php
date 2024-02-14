<?php


// If this file is called directly, abort.
if (!defined ('WPINC')) {
    die;
}

if (!class_exists ('WcEazyBogoDealClient')) {
    class WcEazyBogoDealClient
    {

        public $utils;
        public $base_admin;
        public $module_admin;
        public $module_slug = "bogo_deal";

        public function __construct ($base_admin)
        {
            $this->module_admin = $this;
            $this->base_admin = $base_admin;

            $this->utils = new WcEazyBogoDealUtils($this->base_admin, $this->module_admin);


            add_action('woocommerce_add_to_cart', array($this->utils, 'addGiftProduct'));
            add_action('woocommerce_update_cart_action_cart_updated', array($this->utils, 'addGiftProduct'));
            add_action('woocommerce_cart_item_removed', array($this->utils, 'addGiftProduct'));

            add_filter('woocommerce_before_calculate_totals', array($this->utils, 'displayDiscountPrice'), 10, 1 );
            add_filter( 'woocommerce_cart_item_price', array($this->utils, 'displayDiscountPriceText'), 10, 3 );

        }

    }
}