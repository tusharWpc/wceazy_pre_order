<?php

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

if (!class_exists('WcEazyAdminAjax')) {
    class WcEazyAdminAjax
    {

        public $base_admin;

        public function __construct($base_admin)
        {
            $this->base_admin = $base_admin;

            add_action( 'wp_ajax_wceazy_update_module_status', array($this, 'wceazy_update_module_status'));

            /* Auto Apply Coupon */
            add_action( 'wp_ajax_wceazy_auto_apply_coupon_list_coupons', array($this, 'wceazy_auto_apply_coupon_list_coupons'));
            add_action( 'wp_ajax_wceazy_auto_apply_coupon_add_to_auto_apply', array($this, 'wceazy_auto_apply_coupon_add_to_auto_apply'));
            add_action( 'wp_ajax_wceazy_auto_apply_coupon_remove_from_auto_apply', array($this, 'wceazy_auto_apply_coupon_remove_from_auto_apply'));

            /* BOGO Deal */
            add_action( 'wp_ajax_wceazy_bogo_deal_get_rules', array($this, 'wceazy_bogo_deal_get_rules'));
            add_action( 'wp_ajax_wceazy_bogo_deal_save_rules', array($this, 'wceazy_bogo_deal_save_rules'));
            add_action( 'wp_ajax_wceazy_bogo_deal_get_products', array($this, 'wceazy_bogo_deal_get_products'));

            /* Coupon Generator */
            add_action( 'wp_ajax_wceazy_coupon_generator_generate', array($this, 'wceazy_coupon_generator_generate'));

            /* URL Coupon */
            add_action( 'wp_ajax_wceazy_url_coupon_list_coupons', array($this, 'wceazy_url_coupon_list_coupons'));

            /* Product Sticky Bar */
            add_action( 'wp_ajax_wceazy_product_sticky_bar_save', array($this, 'wceazy_product_sticky_bar_save'));

            /* One Click Checkout */
            add_action( 'wp_ajax_wceazy_one_click_checkout_save', array($this, 'wceazy_one_click_checkout_save'));

            /* Floating Cart */
            add_action( 'wp_ajax_wceazy_floating_cart_save', array($this, 'wceazy_floating_cart_save'));

            /* PDF Invoice */
            add_action( 'wp_ajax_wceazy_pdf_invoice_save', array($this, 'wceazy_pdf_invoice_save'));
            add_action ('wp_ajax_wceazy_pdf_invoice_generate_invoice', array($this, 'wceazy_pdf_invoice_generate_invoice'));
            add_action ('wp_ajax_wceazy_pdf_invoice_generate_shipping_label', array($this, 'wceazy_pdf_invoice_generate_shipping_label'));

            /* Shipping Bar */
            add_action( 'wp_ajax_wceazy_shipping_bar_save', array($this, 'wceazy_shipping_bar_save'));
            
            /* pre order */
            add_action( 'wp_ajax_wceazy_pre_order_save', array($this, 'wceazy_pre_order_save'));

            /* Address Book */
            add_action( 'wp_ajax_wceazy_address_book_save', array($this, 'wceazy_address_book_save'));

            /* Product Filter */
            add_action( 'wp_ajax_wceazy_product_filter_save', array($this, 'wceazy_product_filter_save'));
        }



        public function wceazy_update_module_status() {
            include_once WCEAZY_PATH . "backend/api/update_module_status.php";
            wp_die();
        }


        /* Auto Apply Coupon */
        public function wceazy_auto_apply_coupon_list_coupons() {
            include_once WCEAZY_PATH . "backend/api/auto_apply_coupon/coupon_list.php";
            wp_die();
        }
        public function wceazy_auto_apply_coupon_add_to_auto_apply() {
            include_once WCEAZY_PATH . "backend/api/auto_apply_coupon/add_to_auto_apply.php";
            wp_die();
        }
        public function wceazy_auto_apply_coupon_remove_from_auto_apply() {
            include_once WCEAZY_PATH . "backend/api/auto_apply_coupon/remove_from_auto_apply.php";
            wp_die();
        }


        /* BOGO Deal */
        public function wceazy_bogo_deal_get_rules() {
            include_once WCEAZY_PATH . "backend/api/bogo_deal/get_rules.php";
            wp_die();
        }
        public function wceazy_bogo_deal_save_rules() {
            include_once WCEAZY_PATH . "backend/api/bogo_deal/save_rules.php";
            wp_die();
        }
        public function wceazy_bogo_deal_get_products() {
            include_once WCEAZY_PATH . "backend/api/bogo_deal/get_products.php";
            wp_die();
        }


        /* Coupon Generator */
        public function wceazy_coupon_generator_generate() {
            include_once WCEAZY_PATH . "backend/api/coupon_generator/generate.php";
            wp_die();
        } 


        /* URL Coupon */
        public function wceazy_url_coupon_list_coupons() {
            include_once WCEAZY_PATH . "backend/api/url_coupon/coupon_list.php";
            wp_die();
        } 


        /* Product Sticky Bar */
        public function wceazy_product_sticky_bar_save() {
            include_once WCEAZY_PATH . "backend/api/product_sticky_bar/save.php";
            wp_die();
        }


        /* One Click Checkout */
        public function wceazy_one_click_checkout_save() {
            include_once WCEAZY_PATH . "backend/api/one_click_checkout/save.php";
            wp_die();
        }

        /* Floating Cart */
        public function wceazy_floating_cart_save() {
            include_once WCEAZY_PATH . "backend/api/floating_cart/save.php";
            wp_die();
        }

        /* PDF Invoice */
        public function wceazy_pdf_invoice_save() {
            include_once WCEAZY_PATH . "backend/api/pdf_invoice/save.php";
            wp_die();
        }
        public function wceazy_pdf_invoice_generate_invoice() {
            include_once WCEAZY_PATH . "backend/api/pdf_invoice/generate_invoice.php";
            wp_die();
        }
        public function wceazy_pdf_invoice_generate_shipping_label() {
            include_once WCEAZY_PATH . "backend/api/pdf_invoice/generate_shipping_label.php";
            wp_die();
        }

        /* Shipping Bar */
        public function wceazy_shipping_bar_save() {
            include_once WCEAZY_PATH . "backend/api/shipping_bar/save.php";
            wp_die();
        }
  
        // pre order
        public function wceazy_pre_order_save() {
            include_once WCEAZY_PATH . "backend/api/pre_order/save.php";
            wp_die();
        } 

        /* Address Book */
        public function wceazy_address_book_save() {
            include_once WCEAZY_PATH . "backend/api/address_book/save.php";
            wp_die();
        }

        /* Product Filter */
        public function wceazy_product_filter_save() {
            include_once WCEAZY_PATH . "backend/api/product_filter/save.php";
            wp_die();
        }

    }
}