<?php

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

if (!class_exists('WcEazyClient')) {
    class WcEazyClient
    {

        public $utils;
        public $settings;

        /* ======== Auto Apply Coupon ========== */
        public $auto_apply_coupon;
        /* ======== BOGO Deal ========== */
        public $bogo_deal;
        /* ======== Coupon Generator ========== */
        /* ======== URL Coupon ========== */
        public $url_coupon;
        /* ======== Product Sticky Bar ========== */
        public $product_sticky_bar;
        /* ======== One Click Checkout ========== */
        public $one_click_checkout;
        /* ======== Floating Cart ========== */
        public $floating_cart;
        /* ======== PDF Invoice ========== */
        public $pdf_invoice;
        /* ======== Shipping Bar ========== */
        public $shipping_bar;
        /* ======== Address Book ========== */
        public $address_book;
        /* ======== Product Filter ========== */
        public $product_filter;

        public function __construct()
        {
            if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {
                $this->utils = new WcEazyUtils($this);
                $this->settings = new WcEazySettings($this);
                new WcEazyClientAjax($this);
                add_action('wp_enqueue_scripts', array($this, 'wceazy_client_enqueue'));
                add_action('wp_footer', array($this, 'wceazy_client_dashboard'));

                /* ======== Auto Apply Coupon ========== */
                if ($this->settings->getModuleStatus("auto_apply_coupon")) {
                    include_once WCEAZY_PATH . "modules/auto_apply_coupon/class-module-client.php";
                    include_once WCEAZY_PATH . "modules/auto_apply_coupon/ModuleUtils.php";
                    $this->auto_apply_coupon = new WcEazyAutoApplyCouponClient($this);
                }
                /* ======== BOGO Deal ========== */
                if ($this->settings->getModuleStatus("bogo_deal")) {
                    include_once WCEAZY_PATH . "modules/bogo_deal/class-module-client.php";
                    include_once WCEAZY_PATH . "modules/bogo_deal/ModuleUtils.php";
                    $this->bogo_deal = new WcEazyBogoDealClient($this);
                }
                /* ======== Coupon Generator ========== */
                /* ======== URL Coupon ========== */
                if ($this->settings->getModuleStatus("url_coupon")) {
                    include_once WCEAZY_PATH . "modules/url_coupon/class-module-client.php";
                    include_once WCEAZY_PATH . "modules/url_coupon/ModuleUtils.php";
                    $this->url_coupon = new WcEazyUrlCouponClient($this);
                }

                /* ======== Product Sticky Bar ========== */
                if ($this->settings->getModuleStatus("product_sticky_bar")) {
                    include_once WCEAZY_PATH . "modules/product_sticky_bar/class-module-client.php";
                    include_once WCEAZY_PATH . "modules/product_sticky_bar/ModuleUtils.php";
                    $this->product_sticky_bar = new WcEazyProductStickyBarClient($this);
                }
                /* ======== One Click Checkout ========== */
                if ($this->settings->getModuleStatus("one_click_checkout")) {
                    include_once WCEAZY_PATH . "modules/one_click_checkout/class-module-client.php";
                    include_once WCEAZY_PATH . "modules/one_click_checkout/ModuleUtils.php";
                    $this->one_click_checkout = new WcEazyOneClickCheckoutClient($this);
                }
                /* ======== Floating Cart ========== */
                if ($this->settings->getModuleStatus("floating_cart")) {
                    include_once WCEAZY_PATH . "modules/floating_cart/class-module-client.php";
                    include_once WCEAZY_PATH . "modules/floating_cart/ModuleUtils.php";
                    $this->floating_cart = new WcEazyFloatingCartClient($this);
                }

                /* ======== PDF Invoice ========== */
                if ($this->settings->getModuleStatus("pdf_invoice")) {
                    include_once WCEAZY_PATH . "modules/pdf_invoice/class-module-client.php";
                    include_once WCEAZY_PATH . "modules/pdf_invoice/ModuleUtils.php";
                    $this->pdf_invoice = new WcEazyPdfInvoiceClient($this);
                }
                /* ======== Shipping Bar ========== */
                if ($this->settings->getModuleStatus("shipping_bar")) {
                    include_once WCEAZY_PATH . "modules/shipping_bar/class-module-client.php";
                    include_once WCEAZY_PATH . "modules/shipping_bar/ModuleUtils.php";
                    $this->shipping_bar = new WcEazyShippingBarClient($this);
                }
                /* ======== Pre Order ========== */
                if ($this->settings->getModuleStatus("pre_order")) {
                    include_once WCEAZY_PATH . "modules/pre_order/pre-class-module-client.php";
                    include_once WCEAZY_PATH . "modules/pre_order/ModuleUtils.php";
                    $this->pre_order = new WcEazyPreOrderClient($this);
                    // WcEazyPreOrderClient
                }

                /* ======== Address Book ========== */
                if ($this->settings->getModuleStatus("address_book")) {
                    include_once WCEAZY_PATH . "modules/address_book/class-module-client.php";
                    include_once WCEAZY_PATH . "modules/address_book/ModuleUtils.php";
                    $this->address_book = new WcEazyAddressBookClient($this);
                }
                /* ======== Product Filter ========== */
                if ($this->settings->getModuleStatus("product_filter")) {
                    include_once WCEAZY_PATH . "modules/product_filter/class-module-client.php";
                    include_once WCEAZY_PATH . "modules/product_filter/ModuleUtils.php";
                    $this->product_filter = new WcEazyProductFilterClient($this);
                }
            }

        }


        function wceazy_client_enqueue()
        {
            /* ======== Product Sticky Bar ========== */
            if ($this->settings->getModuleStatus("product_sticky_bar")) {
                wp_enqueue_style('wceazy-client-module-product-sticky-bar', WCEAZY_CSS_DIR . 'product_sticky_bar/client_main.css', array(), WCEAZY_VERSION);
                wp_enqueue_script('wceazy-client-module-product-sticky-bar', WCEAZY_JS_DIR . 'product_sticky_bar/client_main.js', array('jquery'), WCEAZY_VERSION);
                wp_localize_script(
                    'wceazy-client-module-product-sticky-bar',
                    'wceazy_client_product_sticky_bar_object',
                    array(
                        'ajaxurl' => admin_url('admin-ajax.php')
                    )
                );
            }

            /* ======== One Click Checkout ========== */
            if ($this->settings->getModuleStatus("one_click_checkout")) {
                wp_enqueue_style('wceazy-client-module-one-click-checkout', WCEAZY_CSS_DIR . 'one_click_checkout/client_main.css', array(), WCEAZY_VERSION);
                wp_enqueue_script('wceazy-client-module-one-click-checkout', WCEAZY_JS_DIR . 'one_click_checkout/client_main.js', array('jquery'), WCEAZY_VERSION);
                wp_localize_script(
                    'wceazy-client-module-one-click-checkout',
                    'wceazy_client_one_click_checkout_object',
                    array(
                        'ajaxurl' => admin_url('admin-ajax.php')
                    )
                );
            }

            /* ======== Floating Cart ========== */
            if ($this->settings->getModuleStatus("floating_cart")) {
                wp_enqueue_style('wceazy-client-module-floating-cart', WCEAZY_CSS_DIR . 'floating_cart/client_main.css', array(), WCEAZY_VERSION);
                wp_enqueue_script('wceazy-client-module-floating-cart', WCEAZY_JS_DIR . 'floating_cart/client_main.js', array('jquery'), WCEAZY_VERSION);
                wp_localize_script(
                    'wceazy-client-module-floating-cart',
                    'wceazy_client_floating_cart_object',
                    array(
                        'ajaxurl' => admin_url('admin-ajax.php')
                    )
                );
            }

            /* ======== Shipping Bar ========== */
            if ($this->settings->getModuleStatus("shipping_bar")) {
                wp_enqueue_style('wceazy-client-module-shipping-bar', WCEAZY_CSS_DIR . 'shipping_bar/client_main.css', array(), WCEAZY_VERSION);
                wp_enqueue_script('wceazy-client-module-shipping-bar', WCEAZY_JS_DIR . 'shipping_bar/client_main.js', array('jquery'), WCEAZY_VERSION);
                wp_localize_script(
                    'wceazy-client-module-shipping-bar',
                    'wceazy_client_shipping_bar_object',
                    array(
                        'ajaxurl' => admin_url('admin-ajax.php')
                    )
                );
            }
            /* ======== Address Book ========== */
            if ($this->settings->getModuleStatus("address_book")) {
                wp_enqueue_style('wceazy-client-module-address-book', WCEAZY_CSS_DIR . 'address_book/client_main.css', array(), WCEAZY_VERSION);
                wp_enqueue_script('wceazy-client-module-address-book', WCEAZY_JS_DIR . 'address_book/client_main.js', array('jquery'), WCEAZY_VERSION);
                wp_localize_script(
                    'wceazy-client-module-address-book',
                    'wceazy_client_address_book_object',
                    array(
                        'ajaxurl' => admin_url('admin-ajax.php')
                    )
                );
            }

            /* ======== Product Filter ========== */
            if ($this->settings->getModuleStatus("product_filter")) {
                wp_enqueue_style('wceazy-client-module-product-filter', WCEAZY_CSS_DIR . 'product_filter/client_main.css', array(), WCEAZY_VERSION);
                wp_enqueue_script('wceazy-client-module-product-filter', WCEAZY_JS_DIR . 'product_filter/client_main.js', array('jquery'), WCEAZY_VERSION);
                wp_localize_script(
                    'wceazy-client-module-product-filter',
                    'wceazy_client_product_filter_object',
                    array(
                        'ajaxurl' => admin_url('admin-ajax.php')
                    )
                );
            }


            /* ======== Pre order ========== */
            if ($this->settings->getModuleStatus("pre_order")) {
                wp_enqueue_style('wceazy-client-module-pre-order', WCEAZY_CSS_DIR . 'pre_order/client_main.css', array(), WCEAZY_VERSION);

                wp_enqueue_script('wceazy-client-module-pre-order', WCEAZY_JS_DIR . 'pre_order/client_main.js', array('jquery'), WCEAZY_VERSION);
                wp_localize_script(
                    'wceazy-client-module-pre-order',
                    'wceazy_client_pre_order_object',
                    array(
                        'ajaxurl' => admin_url('admin-ajax.php')
                    )
                );
            }

        }


        function wceazy_client_dashboard()
        {
            include_once WCEAZY_PATH . "frontend/templates/dashboard.php";
        }

    }
}



new WcEazyClient();