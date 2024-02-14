<?php


// If this file is called directly, abort.
if (!defined ('WPINC')) {
    die;
}

if (!class_exists ('WcEazyAutoApplyCouponClient')) {
    class WcEazyAutoApplyCouponClient
    {

        public $utils;
        public $base_admin;
        public $module_admin;
        public $module_slug = "auto_apply_coupon";

        public function __construct ($base_admin)
        {
            $this->module_admin = $this;
            $this->base_admin = $base_admin;

            $this->utils = new WcEazyAutoApplyCouponUtils($this->base_admin, $this->module_admin);


            add_filter('woocommerce_before_cart', array($this->utils, 'apply_coupon_automatically'));
            add_action('woocommerce_thankyou', array( $this->utils, 'wceazy_session_unset'), 10, 1);

        }

    }
}