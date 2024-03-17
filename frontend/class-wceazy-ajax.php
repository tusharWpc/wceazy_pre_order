<?php

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

if (!class_exists('WcEazyClientAjax')) {
    class WcEazyClientAjax
    {
        public $base_client;

        public function __construct($base_client)
        {
            $this->base_client = $base_client;

            /* Product Sticky Bar */
            add_action('wp_ajax_wceazy_product_sticky_bar_add_to_cart', array($this, 'wceazy_product_sticky_bar_add_to_cart'));
            add_action('wp_ajax_nopriv_wceazy_product_sticky_bar_add_to_cart', array($this, 'wceazy_product_sticky_bar_add_to_cart'));

            /* One Click Checkout */
            add_action('wp_ajax_wceazy_one_click_checkout_ajax_add_to_cart', array($this, 'wceazy_one_click_checkout_ajax_add_to_cart'));
            add_action('wp_ajax_nopriv_wceazy_one_click_checkout_ajax_add_to_cart', array($this, 'wceazy_one_click_checkout_ajax_add_to_cart'));

            /* Floating Cart */
            add_action('wp_ajax_wceazy_floating_cart_get_cart', array($this, 'wceazy_floating_cart_get_cart'));
            add_action('wp_ajax_nopriv_wceazy_floating_cart_get_cart', array($this, 'wceazy_floating_cart_get_cart'));

            add_action('wp_ajax_wceazy_floating_cart_remove_cart_item', array($this, 'wceazy_floating_cart_remove_cart_item'));
            add_action('wp_ajax_nopriv_wceazy_floating_cart_remove_cart_item', array($this, 'wceazy_floating_cart_remove_cart_item'));

            add_action('wp_ajax_wceazy_floating_cart_update_quantity', array($this, 'wceazy_floating_cart_update_quantity'));
            add_action('wp_ajax_nopriv_wceazy_floating_cart_update_quantity', array($this, 'wceazy_floating_cart_update_quantity'));

            add_action('wp_ajax_wceazy_floating_cart_apply_coupon', array($this, 'wceazy_floating_cart_apply_coupon'));
            add_action('wp_ajax_nopriv_wceazy_floating_cart_apply_coupon', array($this, 'wceazy_floating_cart_apply_coupon'));

            /* Shipping Bar */
            add_action('wp_ajax_wceazy_shipping_bar_cart_updated', array($this, 'wceazy_shipping_bar_cart_updated'));
            add_action('wp_ajax_nopriv_wceazy_shipping_bar_cart_updated', array($this, 'wceazy_shipping_bar_cart_updated'));

            /* Address Book */
            add_action('wp_ajax_wceazy_address_book_delete', array($this, 'wceazy_address_book_delete'));
            add_action('wp_ajax_wceazy_address_book_make_primary', array($this, 'wceazy_address_book_make_primary'));
            add_action('wp_ajax_wceazy_address_book_get_address_on_checkout', array($this, 'wceazy_address_book_get_address_on_checkout'));

            /* Product Filter */
            add_action('wp_ajax_wceazy_product_filter_search', array($this, 'wceazy_product_filter_search'));
            add_action('wp_ajax_wceazy_product_filter_add_to_cart', array($this, 'wceazy_product_filter_add_to_cart'));

            /* Product Filter */
            add_action('wp_ajax_wceazy_frequently_bought_search', array($this, 'wceazy_frequently_bought_search'));
            add_action('wp_ajax_wceazy_frequently_bought_add_to_cart', array($this, 'wceazy_frequently_bought_add_to_cart'));

        }



        /* Product Sticky Bar */
        public function wceazy_product_sticky_bar_add_to_cart()
        {
            include_once WCEAZY_PATH . "frontend/api/product_sticky_bar/add_to_cart.php";
            wp_die();
        }

        /* One Click Checkout */
        public function wceazy_one_click_checkout_ajax_add_to_cart()
        {
            include_once WCEAZY_PATH . "frontend/api/one_click_checkout/ajax_add_to_cart.php";
            wp_die();
        }

        /* Floating Cart */
        public function wceazy_floating_cart_get_cart()
        {
            include_once WCEAZY_PATH . "frontend/api/floating_cart/get_cart.php";
            wp_die();
        }
        public function wceazy_floating_cart_remove_cart_item()
        {
            include_once WCEAZY_PATH . "frontend/api/floating_cart/remove_cart_item.php";
            wp_die();
        }
        public function wceazy_floating_cart_update_quantity()
        {
            include_once WCEAZY_PATH . "frontend/api/floating_cart/update_quantity.php";
            wp_die();
        }
        public function wceazy_floating_cart_apply_coupon()
        {
            include_once WCEAZY_PATH . "frontend/api/floating_cart/apply_coupon.php";
            wp_die();
        }


        /* Shipping Bar */
        public function wceazy_shipping_bar_cart_updated()
        {
            include_once WCEAZY_PATH . "frontend/api/shipping_bar/get_updated_content.php";
            wp_die();
        }


        /* Address Book */
        public function wceazy_address_book_delete()
        {
            include_once WCEAZY_PATH . "frontend/api/address_book/delete.php";
            wp_die();
        }
        public function wceazy_address_book_make_primary()
        {
            include_once WCEAZY_PATH . "frontend/api/address_book/make_primary.php";
            wp_die();
        }
        public function wceazy_address_book_get_address_on_checkout()
        {
            include_once WCEAZY_PATH . "frontend/api/address_book/get_address_on_checkout.php";
            wp_die();
        }

        // Pre order
        public function wceazy_pre_order_search()
        {
            include_once WCEAZY_PATH . "frontend/api/pre_order/search.php";
            wp_die();
        }

        public function wceazy_pre_order_add_to_cart()
        {
            include_once WCEAZY_PATH . "frontend/api/pre_order/add_to_cart.php";
            wp_die();
        }

        // NF
        /* Product Filter */
        public function wceazy_product_filter_search()
        {
            include_once WCEAZY_PATH . "frontend/api/product_filter/search.php";
            wp_die();
        }
        public function wceazy_product_filter_add_to_cart()
        {
            include_once WCEAZY_PATH . "frontend/api/product_filter/add_to_cart.php";
            wp_die();
        }


        public function wceazy_frequently_bought_search()
        {
            include_once WCEAZY_PATH . "frontend/api/frequently_bought/search.php";
            wp_die();
        }
        public function wceazy_frequently_bought_add_to_cart()
        {
            include_once WCEAZY_PATH . "frontend/api/frequently_bought/add_to_cart.php";
            wp_die();
        }


    }
}
