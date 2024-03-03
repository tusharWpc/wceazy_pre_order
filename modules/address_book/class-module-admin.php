<?php


// If this file is called directly, abort.
if (!defined ('WPINC')) {
    die;
}

if (!class_exists ('WcEazyAddressBookAdmin')) {
    class WcEazyAddressBookAdmin
    {

        public $utils;
        public $base_admin;
        public $module_admin;
        public $module_slug = "address_book";

        public function __construct ($base_admin)
        {
            $this->module_admin = $this;
            $this->base_admin = $base_admin;

            $this->utils = new WcEazyAddressBookUtils($this->base_admin, $this->module_admin);

        }

    }
}