<?php


// If this file is called directly, abort.
if (!defined ('WPINC')) {
    die;
}

if (!class_exists ('WcEazyPdfInvoiceAdmin')) {
    class WcEazyPdfInvoiceAdmin
    {

        public $utils;
        public $base_admin;
        public $module_admin;
        public $module_slug = "pdf_invoice";

        public function __construct ($base_admin)
        {
            $this->module_admin = $this;
            $this->base_admin = $base_admin;

            $this->utils = new WcEazyPdfInvoiceUtils($this->base_admin, $this->module_admin);
            add_filter( 'woocommerce_admin_order_actions', array($this->utils, 'wceazy_edit_shop_order_action_column'), 10, 2 );
            add_filter( 'admin_head', array($this->utils, 'wceazy_add_custom_order_status_actions_button_css'));

        }

    }
}