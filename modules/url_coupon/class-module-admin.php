<?php


// If this file is called directly, abort.
if (!defined ('WPINC')) {
    die;
}

if (!class_exists ('WcEazyUrlCouponAdmin')) {
    class WcEazyUrlCouponAdmin
    {

        public $utils;
        public $base_admin;
        public $module_admin;
        public $module_slug = "url_coupon";

        public function __construct ($base_admin)
        {
            $this->module_admin = $this;
            $this->base_admin = $base_admin;

            $this->utils = new WcEazyUrlCouponUtils($this->base_admin, $this->module_admin);


            add_filter( 'woocommerce_coupon_data_tabs', array( $this->utils, 'wceazy_url_coupon_admin_data_tab' ), 10, 1 );
            add_action( 'woocommerce_coupon_data_panels', array( $this->utils, 'wceazy_url_coupon_admin_data_panel' ) );
            add_action( 'save_post', array( $this->utils, 'wceazy_save_url_coupon_data'), 10, 1 );

        }

    }
}