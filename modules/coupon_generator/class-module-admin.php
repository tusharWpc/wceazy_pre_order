<?php


// If this file is called directly, abort.
if (!defined ('WPINC')) {
    die;
}

if (!class_exists ('WcEazyCouponGeneratorAdmin')) {
    class WcEazyCouponGeneratorAdmin
    {

        public $utils;
        public $base_admin;
        public $module_admin;
        public $module_slug = "coupon_generator";

        public function __construct ($base_admin)
        {
            $this->module_admin = $this;
            $this->base_admin = $base_admin;

            $this->utils = new WcEazyCouponGeneratorUtils($this->base_admin, $this->module_admin);

        }

    }
}