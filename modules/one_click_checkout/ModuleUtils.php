<?php

// If this file is called directly, abort.
if (!defined ('WPINC')) {
    die;
}

if(!isset($_SESSION)){session_start();}

if (!class_exists ('WcEazyOneClickCheckoutUtils')) {
    class WcEazyOneClickCheckoutUtils
    {
        public $base_admin;
        public $module_admin;

        public function __construct ($base_admin, $module_admin)
        {
            $this->base_admin = $base_admin;
            $this->module_admin = $module_admin;
        }

        public function saveSettings($post_data){
            if(!empty($post_data)){
                update_option( 'wceazy_one_click_checkout_settings', json_encode($post_data) );
            }
        }



        public function init_cart_and_checkout_controls() {

            $wceazy_one_click_checkout_settings = get_option('wceazy_one_click_checkout_settings', False);
            $wceazy_occ_settings = $wceazy_one_click_checkout_settings ? json_decode($wceazy_one_click_checkout_settings, true) : array();

            $wceazy_occ_disable_cart = isset($wceazy_occ_settings["disable_cart"]) ? $wceazy_occ_settings["disable_cart"] : "yes";
            $wceazy_occ_enable_single_page = isset($wceazy_occ_settings["enable_single_page"]) ? $wceazy_occ_settings["enable_single_page"] : "no";
            $wceazy_occ_enable_redirect_to_cart = isset($wceazy_occ_settings["enable_redirect_to_cart"]) ? $wceazy_occ_settings["enable_redirect_to_cart"] : "yes";
            $wceazy_occ_disable_continue_shopping_button = isset($wceazy_occ_settings["disable_continue_shopping_button"]) ? $wceazy_occ_settings["disable_continue_shopping_button"] : "no";

            $wceazy_occ_change_add_to_cart_button_text = isset($wceazy_occ_settings["change_add_to_cart_button_text"]) ? $wceazy_occ_settings["change_add_to_cart_button_text"] : "no";

            $wceazy_occ_enable_buy_now_button_on_product = isset($wceazy_occ_settings["enable_buy_now_button_on_product"]) ? $wceazy_occ_settings["enable_buy_now_button_on_product"] : "no";
            $wceazy_occ_buy_btn_position_on_product = isset($wceazy_occ_settings["buy_btn_position_on_product"]) ? $wceazy_occ_settings["buy_btn_position_on_product"] : "";

            $wceazy_occ_enable_buy_now_button_on_product_archive = isset($wceazy_occ_settings["enable_buy_now_button_on_product_archive"]) ? $wceazy_occ_settings["enable_buy_now_button_on_product_archive"] : "no";
            $wceazy_occ_buy_btn_position_on_product_archive = isset($wceazy_occ_settings["buy_btn_position_on_product_archive"]) ? $wceazy_occ_settings["buy_btn_position_on_product_archive"] : "";

            $wceazy_occ_remove_order_comment = isset($wceazy_occ_settings["remove_order_comment"]) ? $wceazy_occ_settings["remove_order_comment"] : "no";
            $wceazy_occ_remove_coupon_form = isset($wceazy_occ_settings["remove_coupon_form"]) ? $wceazy_occ_settings["remove_coupon_form"] : "no";
            $wceazy_occ_remove_policy_text = isset($wceazy_occ_settings["remove_policy_text"]) ? $wceazy_occ_settings["remove_policy_text"] : "no";
            $wceazy_occ_remove_billing_fields = isset($wceazy_occ_settings["remove_billing_fields"]) ? explode(",",$wceazy_occ_settings["remove_billing_fields"]) : array();
            $wceazy_occ_remove_shipping_fields = isset($wceazy_occ_settings["remove_shipping_fields"]) ? explode(",",$wceazy_occ_settings["remove_shipping_fields"]) : array();


            if ( 'yes' === $wceazy_occ_disable_cart ) {
                add_action('template_redirect', array($this, 'wfocc_cart_redirect'));
                remove_action('woocommerce_widget_shopping_cart_buttons', 'woocommerce_widget_shopping_cart_proceed_to_checkout', 10);
            }

            if ( 'yes' === $wceazy_occ_enable_redirect_to_cart ) {
                update_option( 'woocommerce_enable_ajax_add_to_cart', 'no' );
                add_filter( 'woocommerce_add_to_cart_redirect', array($this,'wfocc_redirect_to_selected_page') );
            }else{
                update_option( 'woocommerce_enable_ajax_add_to_cart', 'yes' );
            }

            if( 'yes' ===  $wceazy_occ_enable_single_page ){
                add_filter( 'the_content', array($this,'single_page_template') ) ;
            }

            if( 'yes' ===  $wceazy_occ_disable_continue_shopping_button ){
                add_filter( 'wc_add_to_cart_message_html', array($this,'remove_continue_shopping_button'));
            }

            if( 'yes' ===  $wceazy_occ_change_add_to_cart_button_text ){
                add_filter('woocommerce_product_single_add_to_cart_text', array($this, 'wfocc_custom_single_add_to_cart_text'), 10, 2);
                add_filter('woocommerce_product_add_to_cart_text', array($this, 'wfocc_custom_product_add_to_cart_text'), 10, 2);
            }

            if( 'yes' ===  $wceazy_occ_enable_buy_now_button_on_product ){
                $position = '';
                switch($wceazy_occ_buy_btn_position_on_product){
                    case 'before_form' :
                        $position = 'woocommerce_before_add_to_cart_form';
                        break;
                    case 'after_form' :
                        $position = 'woocommerce_after_add_to_cart_form';
                        break;
                    case 'before_button' :
                        $position = 'woocommerce_before_add_to_cart_button';
                        break;
                    default :
                        $position = 'woocommerce_after_add_to_cart_button';
                        break;
                }
                add_action( $position, array( $this, 'wfocc_add_quick_buy_button' ), 99 );
            }

            if( 'yes' ===  $wceazy_occ_enable_buy_now_button_on_product_archive ){
                $position = 'woocommerce_after_shop_loop_item';
                $priority = 5;
                switch($wceazy_occ_buy_btn_position_on_product_archive){
                    case 'before_button' :
                        $priority = 9;
                        break;
                    case 'after_button' :
                        $priority = 11;
                        break;
                    default :
                        $priority = 5;
                        break;
                }
                add_action( $position, array( $this, 'wfocc_add_shop_quick_buy_button' ), $priority );
            }

            if( 'yes' ===  $wceazy_occ_remove_order_comment ){
                add_filter( 'woocommerce_checkout_fields' , [ $this,'wfocc_remove_order_comment' ] );
            }

            if( 'yes' === $wceazy_occ_remove_coupon_form ){
                add_filter( 'woocommerce_coupons_enabled', array($this,'wfocc_remove_coupon') );
            }

            if( 'yes' === $wceazy_occ_remove_policy_text ){
                remove_action('woocommerce_checkout_terms_and_conditions', 'wc_checkout_privacy_policy_text', 20);
            }

            if( !empty( $wceazy_occ_remove_billing_fields ) ){
                add_filter( 'woocommerce_checkout_fields' , array($this, 'wfocc_remove_billing_fields') );
            }

            if( !empty( $wceazy_occ_remove_shipping_fields ) ){
                add_filter('woocommerce_checkout_fields', array( $this, 'wfocc_remove_shipping_fields') );
            }

        }

        public function woocommerce_widget_shopping_cart_proceed_to_checkout() {
            echo '<a href="' . esc_url( wc_get_cart_url() ) . '" class="button wc-forward">' . esc_html__( 'View cart', 'woocommerce' ) . '</a>';
        }

        public function wfocc_cart_redirect($permalink) {
            $cart_id = wc_get_page_id('cart');
            $checkout_id = wc_get_page_id('checkout');
            if($cart_id == $checkout_id) { return; }
            if ( ! is_cart() ) { return; }
            if ( WC()->cart->get_cart_contents_count() == 0 ) {
                wp_redirect( apply_filters( 'wfocc_redirect', wc_get_page_permalink( 'shop' ) ) );
                exit;
            }
            wp_redirect( wc_get_checkout_url(), '301' );
            exit;
        }

        public function wfocc_redirect_to_selected_page( $url ) {
            if (defined('DOING_AJAX') && DOING_AJAX) return "";

            wc_clear_notices();

            $wceazy_one_click_checkout_settings = get_option('wceazy_one_click_checkout_settings', False);
            $wceazy_occ_settings = $wceazy_one_click_checkout_settings ? json_decode($wceazy_one_click_checkout_settings, true) : array();
            $wceazy_occ_enable_redirect_to_cart = isset($wceazy_occ_settings["enable_redirect_to_cart"]) ? $wceazy_occ_settings["enable_redirect_to_cart"] : "yes";
            $wceazy_occ_enable_custom_url = isset($wceazy_occ_settings["enable_custom_url"]) ? $wceazy_occ_settings["enable_custom_url"] : "no";
            $wceazy_occ_redirect_to_custom_url = isset($wceazy_occ_settings["redirect_to_custom_url"]) ? $wceazy_occ_settings["redirect_to_custom_url"] : wc_get_page_permalink( 'checkout' );
            $wceazy_occ_redirect_to_page = isset($wceazy_occ_settings["redirect_to_page"]) ? $wceazy_occ_settings["redirect_to_page"] : wc_get_page_permalink( 'checkout' );

            if( 'yes' === $wceazy_occ_enable_redirect_to_cart ){
                if( 'yes' ===  $wceazy_occ_enable_custom_url ){
                    $url = $wceazy_occ_redirect_to_custom_url;
                }else{
                    $url =  $wceazy_occ_redirect_to_page;
                }
            }

            return $url;

        }

        public function single_page_template($content) {
            global $post;
            $cart_id = wc_get_page_id('checkout');
            if ($post->ID == $cart_id) {
                ob_start();
                if ( !is_wc_endpoint_url( 'order-received' ) ){
                    echo do_shortcode('[woocommerce_cart]');
                }
                echo do_shortcode('[woocommerce_checkout]');

                $output = ob_get_contents();
                ob_end_clean();
                $content = $output;
            }
            return $content;
        }

        public function remove_continue_shopping_button( $string, $product_id = 0 ) {
            $start = strpos( $string, '<a href=' ) ?: 0;
            $end = strpos( $string, '</a>', $start ) ?: 0;
            return substr( $string, $end ) ?: $string;
        }

        public function wfocc_custom_single_add_to_cart_text( $button_text, $product){

            $wceazy_one_click_checkout_settings = get_option('wceazy_one_click_checkout_settings', False);
            $wceazy_occ_settings = $wceazy_one_click_checkout_settings ? json_decode($wceazy_one_click_checkout_settings, true) : array();
            $wceazy_occ_cart_button_text = isset($wceazy_occ_settings["cart_button_text"]) ? $wceazy_occ_settings["cart_button_text"] : "Add to cart";
            $button_text = $wceazy_occ_cart_button_text;
            return $button_text;
        }

        public function wfocc_custom_product_add_to_cart_text( $button_text, $product){

            $wceazy_one_click_checkout_settings = get_option('wceazy_one_click_checkout_settings', False);
            $wceazy_occ_settings = $wceazy_one_click_checkout_settings ? json_decode($wceazy_one_click_checkout_settings, true) : array();
            $wceazy_occ_cart_button_text = isset($wceazy_occ_settings["cart_button_text"]) ? $wceazy_occ_settings["cart_button_text"] : "Add to cart";
            $wceazy_occ_select_options_button_text = isset($wceazy_occ_settings["select_options_button_text"]) ? $wceazy_occ_settings["select_options_button_text"] : "Select Options";
            $wceazy_occ_read_more_button_text = isset($wceazy_occ_settings["read_more_button_text"]) ? $wceazy_occ_settings["read_more_button_text"] : "Read More";

            $product_price =  $product->get_regular_price();
            if($product->is_type('variable')){
                $button_text = $wceazy_occ_select_options_button_text;
            }else if( empty($product_price) ){
                $button_text = $wceazy_occ_read_more_button_text;
            }else{
                if($product->is_in_stock()){
                    $button_text = $wceazy_occ_cart_button_text;
                }else{
                    $button_text = $wceazy_occ_read_more_button_text;
                }
            }
            return $button_text;
        }

        public function wfocc_add_quick_buy_button() {
            global $product;
            $product_id    = $product->get_id();
            $product_price = $product->get_regular_price();

            $wceazy_one_click_checkout_settings = get_option('wceazy_one_click_checkout_settings', False);
            $wceazy_occ_settings = $wceazy_one_click_checkout_settings ? json_decode($wceazy_one_click_checkout_settings, true) : array();
            $wceazy_occ_buy_btn_position_on_product = isset($wceazy_occ_settings["buy_btn_position_on_product"]) ? $wceazy_occ_settings["buy_btn_position_on_product"] : "";
            $wceazy_occ_buy_btn_redirect_on_product = isset($wceazy_occ_settings["buy_btn_redirect_on_product"]) ? $wceazy_occ_settings["buy_btn_redirect_on_product"] : wc_get_checkout_url();
            $wceazy_occ_buy_btn_label_on_product = isset($wceazy_occ_settings["buy_btn_label_on_product"]) ? $wceazy_occ_settings["buy_btn_label_on_product"] : "Buy Now";

            if( !empty($product_price) ){
                echo '<a href="'. $wceazy_occ_buy_btn_redirect_on_product.'" class="button wfocc_single_product_buy_now  wfocc_'.$wceazy_occ_buy_btn_position_on_product.'" type="submit" value="'.esc_attr($product_id).'">'.$wceazy_occ_buy_btn_label_on_product.'</a>';
            }
            if ($product->get_type() == 'variable'){
                echo '<a  data-redirect="'.$wceazy_occ_buy_btn_redirect_on_product.'"  href="javascript:void(0)" class="wfocc_variation_btn_disabled button wfocc_single_product_buy_now  wfocc_'.$wceazy_occ_buy_btn_position_on_product.'" type="submit" value="'.esc_attr($product_id).'">'.$wceazy_occ_buy_btn_label_on_product.'</a>';
            }


        }

        public function wfocc_add_shop_quick_buy_button(){
            global $product;
            $product_price = $product->get_regular_price();

            $wceazy_one_click_checkout_settings = get_option('wceazy_one_click_checkout_settings', False);
            $wceazy_occ_settings = $wceazy_one_click_checkout_settings ? json_decode($wceazy_one_click_checkout_settings, true) : array();
            $wceazy_occ_buy_btn_position_on_product_archive = isset($wceazy_occ_settings["buy_btn_position_on_product_archive"]) ? $wceazy_occ_settings["buy_btn_position_on_product_archive"] : "";
            $wceazy_occ_buy_btn_redirect_on_product_archive = isset($wceazy_occ_settings["buy_btn_redirect_on_product_archive"]) ? $wceazy_occ_settings["buy_btn_redirect_on_product_archive"] : wc_get_checkout_url();
            $wceazy_occ_buy_btn_label_on_product_archive = isset($wceazy_occ_settings["buy_btn_label_on_product_archive"]) ? $wceazy_occ_settings["buy_btn_label_on_product_archive"] : "Buy Now";

            if( $product->is_in_stock() && !empty( $product_price ) ){
                echo '<a href="'. $wceazy_occ_buy_btn_redirect_on_product_archive.'" class="button wfocc_product_archive_buy_now wfoccpa_'.$wceazy_occ_buy_btn_position_on_product_archive.'" type="submit" value="">'.$wceazy_occ_buy_btn_label_on_product_archive.'</a>';
            }

        }

        public function wfocc_remove_order_comment($fields ){
            unset($fields['order']['order_comments']);
            return $fields;
        }

        public function wfocc_remove_coupon( $enabled ) {
            if ( is_checkout() ) {
                $enabled = false;
            }
            return $enabled;
        }

        public function wfocc_remove_billing_fields( $fields ){
            $wceazy_one_click_checkout_settings = get_option('wceazy_one_click_checkout_settings', False);
            $wceazy_occ_settings = $wceazy_one_click_checkout_settings ? json_decode($wceazy_one_click_checkout_settings, true) : array();
            $wceazy_occ_remove_billing_fields = isset($wceazy_occ_settings["remove_billing_fields"]) ? explode(",",$wceazy_occ_settings["remove_billing_fields"]) : array();
            foreach(  $wceazy_occ_remove_billing_fields as  $billing_field ){
                unset($fields['billing'][$billing_field]);
            }
            return $fields;

        }

        public function wfocc_remove_shipping_fields( $fields ){
            $wceazy_one_click_checkout_settings = get_option('wceazy_one_click_checkout_settings', False);
            $wceazy_occ_settings = $wceazy_one_click_checkout_settings ? json_decode($wceazy_one_click_checkout_settings, true) : array();
            $wceazy_occ_remove_shipping_fields = isset($wceazy_occ_settings["remove_shipping_fields"]) ? explode(",",$wceazy_occ_settings["remove_shipping_fields"]) : array();
            foreach(  $wceazy_occ_remove_shipping_fields as  $shipping_field ){
                unset($fields['shipping'][$shipping_field]);
            }
            return $fields;
        }

    }
}