<?php


// If this file is called directly, abort.
if (!defined ('WPINC')) {
    die;
}

if (!class_exists ('WcEazyPdfInvoiceClient')) {
    class WcEazyPdfInvoiceClient
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
            add_action( 'woocommerce_after_order_notes', array($this->utils, 'wceazy_add_ssn_vat_fields'));
            add_action( 'woocommerce_checkout_update_order_meta', array($this->utils, 'wceazy_save_ssn_vat_fields'));

            add_filter( 'woocommerce_email_attachments', array($this->utils, 'wceazy_attach_pdf_to_emails'), 10, 3 );

        }

    }
}