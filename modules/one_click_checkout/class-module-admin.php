<?php


// If this file is called directly, abort.
if (!defined ('WPINC')) {
    die;
}

if (!class_exists ('WcEazyOneClickCheckoutAdmin')) {
    class WcEazyOneClickCheckoutAdmin
    {

        public $utils;
        public $base_admin;
        public $module_admin;
        public $module_slug = "one_click_checkout";

        public function __construct ($base_admin)
        {
            $this->module_admin = $this;
            $this->base_admin = $base_admin;

            $this->utils = new WcEazyOneClickCheckoutUtils($this->base_admin, $this->module_admin);

        }

    }
}