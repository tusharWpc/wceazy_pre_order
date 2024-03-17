<?php
// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

if (!isset ($_SESSION)) {
    session_start();
}

$wceazy_frequently_bought_settings = get_option('wceazy_frequently_bought_settings', false);
$wceazy_po_settings = $wceazy_frequently_bought_settings ? json_decode($wceazy_frequently_bought_settings, true) : array();

// Correct the array key to access the frequently_bought_avl_date_label
$wceazy_po_frequently_bought_avl_date_label = isset ($wceazy_po_settings["frequently_bought_avl_date_label"]) ? $wceazy_po_settings["frequently_bought_avl_date_label"] : "Default Avl Data";
$wceazy_po_frequently_bought_enable_avl_date_label = isset ($wceazy_po_settings["frequently_bought_enable_avl_date_label"]) ? $wceazy_po_settings["frequently_bought_enable_avl_date_label"] : "on";
$wceazy_po_frequently_bought_enable_avl_date_and_label = isset ($wceazy_po_settings["frequently_bought_enable_avl_date_and_label"]) ? $wceazy_po_settings["frequently_bought_enable_avl_date_and_label"] : "yes";
$wceazy_po_frequently_bought_automatically_cancel_frequently_boughts = isset ($wceazy_po_settings["frequently_bought_automatically_cancel_frequently_boughts"]) ? $wceazy_po_settings["frequently_bought_automatically_cancel_frequently_boughts"] : "yes";

if (!class_exists('WcEazyFrequentlyBoughtUtils')) {
    class WcEazyFrequentlyBoughtUtils
    {




        
        public $base_admin;
        public $module_admin;
        public $wceazy_po_frequently_bought_btn_text; // Define the variable within the class
        public $wceazy_po_enable_frequently_bought; // Define the variable within the class
        public $wceazy_po_frequently_bought_avl_date_label;
        public $wceazy_po_frequently_bought_enable_avl_date_label;

        // Constructor to initialize class properties
        public function __construct($base_admin, $module_admin)
        {
            $this->base_admin = $base_admin;
            $this->module_admin = $module_admin;

            // Assuming this is a valid method to call
            // $this->wcz_frequently_bought_mail();

            $wceazy_frequently_bought_settings = get_option('wceazy_frequently_bought_settings', false);
            $wceazy_po_settings = $wceazy_frequently_bought_settings ? json_decode($wceazy_frequently_bought_settings, true) : array();

            $wceazy_po_frequently_bought_automatically_cancel_frequently_boughts = isset ($wceazy_po_settings["frequently_bought_automatically_cancel_frequently_boughts"]) ? $wceazy_po_settings["frequently_bought_automatically_cancel_frequently_boughts"] : "yes";


            // Hook to save preorder date when the order is placed
            add_action('woocommerce_checkout_update_order_meta', array($this, 'save_preorder_date'), 10, 2);


            if ($wceazy_po_frequently_bought_automatically_cancel_frequently_boughts == "yes") {

                add_action('wp', array($this, 'auto_cancel_frequently_boughts'));
            }
        }


		function init() {
			// image size
			self::$image_size = apply_filters( 'woosb_image_size', self::$image_size );

			// shortcode
			add_shortcode( 'woosb_form', [ $this, 'shortcode_form' ] );
			add_shortcode( 'woosb_bundled', [ $this, 'shortcode_bundled' ] );
			add_shortcode( 'woosb_bundles', [ $this, 'shortcode_bundles' ] );
		}

		function available_variation( $data, $variable, $variation ) {
			if ( $image_id = $variation->get_image_id() ) {
				$data['woosb_image'] = wp_get_attachment_image( $image_id, self::$image_size );
			}

			return $data;
		}
		function register_settings() {
			// settings
			register_setting( 'woosb_settings', 'woosb_settings' );
			// localization
			register_setting( 'woosb_localization', 'woosb_localization' );
		}

		function admin_menu() {
			add_submenu_page( 'wpclever', esc_html__( 'WPC Product Bundles', 'woo-product-bundle' ), esc_html__( 'Product Bundles', 'woo-product-bundle' ), 'manage_options', 'wpclever-woosb', [
				$this,
				'admin_menu_content'
			] );
		}



		function enqueue_scripts() {
			wp_enqueue_style( 'woosb-frontend', WOOSB_URI . 'assets/css/frontend.css', [], WOOSB_VERSION );
			wp_enqueue_script( 'woosb-frontend', WOOSB_URI . 'assets/js/frontend.js', [ 'jquery' ], WOOSB_VERSION, true );
			wp_localize_script( 'woosb-frontend', 'woosb_vars', apply_filters( 'woosb_vars', [
					'wc_price_decimals'           => wc_get_price_decimals(),
					'wc_price_format'             => get_woocommerce_price_format(),
					'wc_price_thousand_separator' => wc_get_price_thousand_separator(),
					'wc_price_decimal_separator'  => wc_get_price_decimal_separator(),
					'wc_currency_symbol'          => get_woocommerce_currency_symbol(),
					'price_decimals'              => apply_filters( 'woosb_price_decimals', wc_get_price_decimals() ),
					'price_format'                => get_woocommerce_price_format(), // old version before 7.1.0
					'price_thousand_separator'    => wc_get_price_thousand_separator(), // old version before 7.1.0
					'price_decimal_separator'     => wc_get_price_decimal_separator(), // old version before 7.1.0
					'currency_symbol'             => get_woocommerce_currency_symbol(), // old version before 7.1.0
					'trim_zeros'                  => apply_filters( 'woosb_price_trim_zeros', apply_filters( 'woocommerce_price_trim_zeros', false ) ),
					'change_image'                => WPCleverWoosb_Helper()->get_setting( 'change_image', 'yes' ),
					'bundled_price'               => WPCleverWoosb_Helper()->get_setting( 'bundled_price', 'price' ),
					'bundled_price_from'          => WPCleverWoosb_Helper()->get_setting( 'bundled_price_from', 'sale_price' ),
					'change_price'                => WPCleverWoosb_Helper()->get_setting( 'change_price', 'yes' ),
					'price_selector'              => WPCleverWoosb_Helper()->get_setting( 'change_price_custom', '' ),
					'saved_text'                  => WPCleverWoosb_Helper()->localization( 'saved', esc_html__( '(saved [d])', 'woo-product-bundle' ) ),
					'price_text'                  => WPCleverWoosb_Helper()->localization( 'total', esc_html__( 'Bundle price:', 'woo-product-bundle' ) ),
					'alert_selection'             => WPCleverWoosb_Helper()->localization( 'alert_selection', esc_html__( 'Please select a purchasable variation for [name] before adding this bundle to the cart.', 'woo-product-bundle' ) ),
					'alert_unpurchasable'         => WPCleverWoosb_Helper()->localization( 'alert_unpurchasable', esc_html__( 'Product [name] is unpurchasable. Please remove it before adding the bundle to the cart.', 'woo-product-bundle' ) ),
					'alert_empty'                 => WPCleverWoosb_Helper()->localization( 'alert_empty', esc_html__( 'Please choose at least one product before adding this bundle to the cart.', 'woo-product-bundle' ) ),
					'alert_min'                   => WPCleverWoosb_Helper()->localization( 'alert_min', esc_html__( 'Please choose at least a total quantity of [min] products before adding this bundle to the cart.', 'woo-product-bundle' ) ),
					'alert_max'                   => WPCleverWoosb_Helper()->localization( 'alert_max', esc_html__( 'Sorry, you can only choose at max a total quantity of [max] products before adding this bundle to the cart.', 'woo-product-bundle' ) ),
					'alert_total_min'             => WPCleverWoosb_Helper()->localization( 'alert_total_min', esc_html__( 'The total must meet the minimum amount of [min].', 'woo-product-bundle' ) ),
					'alert_total_max'             => WPCleverWoosb_Helper()->localization( 'alert_total_max', esc_html__( 'The total must meet the maximum amount of [max].', 'woo-product-bundle' ) ),
				] )
			);
		}

		function admin_enqueue_scripts() {
			wp_enqueue_style( 'hint', WOOSB_URI . 'assets/css/hint.css' );
			wp_enqueue_style( 'woosb-backend', WOOSB_URI . 'assets/css/backend.css', [], WOOSB_VERSION );
			wp_enqueue_script( 'woosb-backend', WOOSB_URI . 'assets/js/backend.js', [
				'jquery',
				'jquery-ui-dialog',
				'jquery-ui-sortable',
				'selectWoo',
			], WOOSB_VERSION, true );
			wp_localize_script( 'woosb-backend', 'woosb_vars', [
					'nonce'                    => wp_create_nonce( 'woosb-security' ),
					'price_decimals'           => wc_get_price_decimals(),
					'price_thousand_separator' => wc_get_price_thousand_separator(),
					'price_decimal_separator'  => wc_get_price_decimal_separator()
				]
			);
		} 


        // Function to save settings data
        public function saveSettings($post_data)
        {
            if (!empty ($post_data)) {
                update_option('wceazy_frequently_bought_settings', json_encode($post_data));
            }
        }

        // `````new satrt  


        function product_type_selector($types)
        {
            $types['woosb'] = esc_html__('Smart bundleX', 'woo-product-bundle');

            return $types;
        }





    }
}