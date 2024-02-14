<?php


// If this file is called directly, abort.
if (!defined ('WPINC')) {
    die;
}

if (!class_exists ('WcEazyAddressBookClient')) {
    class WcEazyAddressBookClient
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


            add_filter( 'woocommerce_account_menu_items', array( $this->utils, 'wc_address_book_add_to_menu' ), 10 );
            add_action( 'woocommerce_account_edit-address_endpoint', array( $this->utils, 'wc_address_book_page' ), 20 );

            // Save an address to the address book.
            add_action( 'woocommerce_customer_save_address', array( $this->utils, 'update_address_names' ), 10, 2 );
            add_action( 'woocommerce_customer_save_address', array( $this->utils, 'redirect_on_save' ), 9999, 2 );

            // Clear Field Values on New Address Create
            add_filter( 'woocommerce_billing_fields', array( $this->utils, 'replace_address_key' ), 10001, 2 );
            add_filter( 'woocommerce_shipping_fields', array( $this->utils, 'replace_address_key' ), 10001, 2 );

            // For New Address Saving
            add_action( 'template_redirect', array( $this->utils, 'before_save_address' ), 9 );

            // Show address on checkout page
            add_filter( 'woocommerce_checkout_fields', array( $this->utils, 'checkout_address_select_field' ), 9999, 1 );



        }

    }
}