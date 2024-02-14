<?php


// If this file is called directly, abort.
if (!defined ('WPINC')) {
    die;
}

if (!class_exists ('WcEazyShippingBarClient')) {
    class WcEazyShippingBarClient
    {

        public $utils;
        public $base_admin;
        public $module_admin;
        public $module_slug = "shipping_bar";

        public function __construct ($base_admin)
        {
            $this->module_admin = $this;
            $this->base_admin = $base_admin;

            $this->utils = new WcEazyShippingBarUtils($this->base_admin, $this->module_admin);

            add_action( "woocommerce_cart_totals_before_shipping", array($this->utils, 'wceazy_cart_before_shipping'));
            add_action( "woocommerce_cart_totals_after_shipping", array($this->utils, 'wceazy_cart_after_shipping'));
            add_action( "woocommerce_review_order_before_shipping", array($this->utils, 'wceazy_checkout_before_shipping'));
            add_action( "woocommerce_review_order_after_shipping", array($this->utils, 'wceazy_checkout_after_shipping'));

        }

    }
}