<?php


// If this file is called directly, abort.
if (!defined ('WPINC')) {
    die;
}

if (!class_exists ('WcEazyFloatingCartAdmin')) {
    class WcEazyFloatingCartAdmin
    {

        public $utils;
        public $base_admin;
        public $module_admin;
        public $module_slug = "floating_cart";

        public function __construct ($base_admin)
        {
            $this->module_admin = $this;
            $this->base_admin = $base_admin;

            $this->utils = new WcEazyFloatingCartUtils($this->base_admin, $this->module_admin);

        }

    }
}