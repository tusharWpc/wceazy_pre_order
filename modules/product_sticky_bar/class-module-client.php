<?php


// If this file is called directly, abort.
if (!defined ('WPINC')) {
    die;
}

if (!class_exists ('WcEazyProductStickyBarClient')) {
    class WcEazyProductStickyBarClient
    {

        public $utils;
        public $base_admin;
        public $module_admin;
        public $module_slug = "product_sticky_bar";

        public function __construct ($base_admin)
        {
            $this->module_admin = $this;
            $this->base_admin = $base_admin;

            $this->utils = new WcEazyProductStickyBarUtils($this->base_admin, $this->module_admin);

        }

    }
}