<?php


// If this file is called directly, abort.
if (!defined ('WPINC')) {
    die;
}

if (!class_exists ('WcEazyUrlCouponClient')) {
    class WcEazyUrlCouponClient
    {

        public $utils;
        public $base_admin;
        public $module_admin;
        public $module_slug = "auto_apply_coupon";

        public function __construct ($base_admin)
        {
            $this->module_admin = $this;
            $this->base_admin = $base_admin;

            $this->utils = new WcEazyUrlCouponUtils($this->base_admin, $this->module_admin);


            add_action( 'template_redirect', array( $this->utils, 'wceazy_implement_url_coupon' ), 10, 2 );
            add_action( 'woocommerce_thankyou', array($this->utils, 'wceazy_session_unset'), 10, 2 );
            add_action( 'woocommerce_cart_totals_before_order_total', array($this->utils, 'wceazy_session_unset'), 10, 2 );
            add_filter('woocommerce_coupon_message', array($this->utils, 'wceazy_coupon_success_mesage'), 10, 3);

        }

    }
}