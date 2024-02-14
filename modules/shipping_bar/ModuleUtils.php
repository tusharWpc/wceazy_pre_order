<?php

// If this file is called directly, abort.
if (!defined ('WPINC')) {
    die;
}

if(!isset($_SESSION)){session_start();}

if (!class_exists ('WcEazyShippingBarUtils')) {
    class WcEazyShippingBarUtils
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
                update_option( 'wceazy_shipping_bar_settings', json_encode($post_data) );
            }
        }



        public function wceazy_get_all_free_shipping_zone() {
            $values = [];
            $data_store = WC_Data_Store::load( 'shipping-zone' );
            $raw_zones = $data_store->get_zones();
            foreach ( $raw_zones as $raw_zone ) {
                $zones[] = new WC_Shipping_Zone( $raw_zone );
            }
            $zones[] = new WC_Shipping_Zone( 0 ); // ADD ZONE "0" MANUALLY
            foreach ( $zones as $zone ) {
                if($this->isZoneHasFreeShippingMethod($zone->get_id())){
                    $values[$zone->get_id()]  = $zone->get_zone_name();
                }
            }
            return $values;
        }

        public function getUsersShippingZoneID() {
            $shipping_packages =  WC()->cart->get_shipping_packages();
            $shipping_zone = wc_get_shipping_zone( reset( $shipping_packages ) );
            $zone_id   = $shipping_zone->get_id();
            return $zone_id;

        }

        public function isZoneHasFreeShippingMethod($zone_id) {
            $data_store = WC_Data_Store::load( 'shipping-zone' );
            $raw_zones = $data_store->get_zones();
            foreach ( $raw_zones as $raw_zone ) {
                $zones[] = new WC_Shipping_Zone( $raw_zone );
            }
            $zones[] = new WC_Shipping_Zone( 0 ); // ADD ZONE "0" MANUALLY
            foreach ( $zones as $zone ) {
                if($zone->get_id() == $zone_id){
                    $zone_shipping_methods = $zone->get_shipping_methods(); // SEE BELOW
                    foreach ( $zone_shipping_methods as $index => $method ) {
                        if($method->get_method_title()== "Free shipping" && $method->is_enabled()){
                            return True;
                        }
                    }
                }
            }
            return False;
        }


        public function getShippingZoneMinAmount() {

            $method_instance_id = 0;
            $data_store = WC_Data_Store::load( 'shipping-zone' );
            $raw_zones = $data_store->get_zones();
            foreach ( $raw_zones as $raw_zone ) {
                $zones[] = new WC_Shipping_Zone( $raw_zone );
            }
            $zones[] = new WC_Shipping_Zone( 0 ); // ADD ZONE "0" MANUALLY
            foreach ( $zones as $zone ) {
                if($this->getUsersShippingZoneID() == $zone->get_id()){
                    $zone_shipping_methods = $zone->get_shipping_methods();
                    foreach ( $zone_shipping_methods as $index => $method ) {
                        if($method->get_method_title() == "Free shipping" && $method->is_enabled()){
                            $method_instance_id = $method->get_instance_id();
                        }
                    }
                }
            }
            $free_shipping_settings = get_option('woocommerce_free_shipping_'.$method_instance_id.'_settings');
            if(isset($free_shipping_settings['requires']) && isset($free_shipping_settings['min_amount'])){
                if($free_shipping_settings['requires'] == "min_amount"){
                    return $free_shipping_settings['min_amount'];
                }
            }
            return 0;
        }

        public function wceazy_cart_before_shipping() {
            $wceazy_shipping_bar_settings = get_option('wceazy_shipping_bar_settings', False);
            $wceazy_sb_settings = $wceazy_shipping_bar_settings ? json_decode($wceazy_shipping_bar_settings, true) : array();

            $wceazy_sb_show_in_cart = isset($wceazy_sb_settings["show_in_cart"]) ? $wceazy_sb_settings["show_in_cart"] : "yes";
            $wceazy_sb_position_cart_subtotal = isset($wceazy_sb_settings["position_cart_subtotal"]) ? $wceazy_sb_settings["position_cart_subtotal"] : "woocommerce_cart_totals_before_shipping";

            if($wceazy_sb_show_in_cart == "yes" && $wceazy_sb_position_cart_subtotal == "woocommerce_cart_totals_before_shipping"){
                echo $this->wceazy_cart_checkout_shipping_bar_view();
            }
        }
        public function wceazy_cart_after_shipping() {
            $wceazy_shipping_bar_settings = get_option('wceazy_shipping_bar_settings', False);
            $wceazy_sb_settings = $wceazy_shipping_bar_settings ? json_decode($wceazy_shipping_bar_settings, true) : array();

            $wceazy_sb_show_in_cart = isset($wceazy_sb_settings["show_in_cart"]) ? $wceazy_sb_settings["show_in_cart"] : "yes";
            $wceazy_sb_position_cart_subtotal = isset($wceazy_sb_settings["position_cart_subtotal"]) ? $wceazy_sb_settings["position_cart_subtotal"] : "woocommerce_cart_totals_before_shipping";

            if($wceazy_sb_show_in_cart == "yes" && $wceazy_sb_position_cart_subtotal == "woocommerce_cart_totals_after_shipping"){
                echo $this->wceazy_cart_checkout_shipping_bar_view();
            }
        }
        public function wceazy_checkout_before_shipping() {
            $wceazy_shipping_bar_settings = get_option('wceazy_shipping_bar_settings', False);
            $wceazy_sb_settings = $wceazy_shipping_bar_settings ? json_decode($wceazy_shipping_bar_settings, true) : array();

            $wceazy_sb_show_in_checkout = isset($wceazy_sb_settings["show_in_checkout"]) ? $wceazy_sb_settings["show_in_checkout"] : "yes";
            $wceazy_sb_position_checkout_subtotal = isset($wceazy_sb_settings["position_checkout_subtotal"]) ? $wceazy_sb_settings["position_checkout_subtotal"] : "woocommerce_review_order_before_shipping";

            if($wceazy_sb_show_in_checkout == "yes" && $wceazy_sb_position_checkout_subtotal == "woocommerce_review_order_before_shipping"){
                echo $this->wceazy_cart_checkout_shipping_bar_view();
            }
        }
        public function wceazy_checkout_after_shipping() {
            $wceazy_shipping_bar_settings = get_option('wceazy_shipping_bar_settings', False);
            $wceazy_sb_settings = $wceazy_shipping_bar_settings ? json_decode($wceazy_shipping_bar_settings, true) : array();

            $wceazy_sb_show_in_checkout = isset($wceazy_sb_settings["show_in_checkout"]) ? $wceazy_sb_settings["show_in_checkout"] : "yes";
            $wceazy_sb_position_checkout_subtotal = isset($wceazy_sb_settings["position_checkout_subtotal"]) ? $wceazy_sb_settings["position_checkout_subtotal"] : "woocommerce_review_order_before_shipping";

            if($wceazy_sb_show_in_checkout == "yes" && $wceazy_sb_position_checkout_subtotal == "woocommerce_review_order_after_shipping"){
                echo $this->wceazy_cart_checkout_shipping_bar_view();
            }
        }

        public function wceazy_cart_checkout_shipping_bar_view() {

            $wceazy_shipping_bar_settings = get_option('wceazy_shipping_bar_settings', False);
            $wceazy_sb_settings = $wceazy_shipping_bar_settings ? json_decode($wceazy_shipping_bar_settings, true) : array();

            $wceazy_sb_enable_shipping_bar = isset($wceazy_sb_settings["enable_shipping_bar"]) ? $wceazy_sb_settings["enable_shipping_bar"] : "yes";
            $wceazy_sb_shipping_zone = isset($wceazy_sb_settings["shipping_zone"]) ? $wceazy_sb_settings["shipping_zone"] : "";

            $wceazy_sb_cart_checkout_headline = isset($wceazy_sb_settings["cart_checkout_headline"]) ? $wceazy_sb_settings["cart_checkout_headline"] : "Free Shipping";
            $wceazy_sb_cart_checkout_progress_bar_bg = isset($wceazy_sb_settings["cart_checkout_progress_bar_bg"]) ? $wceazy_sb_settings["cart_checkout_progress_bar_bg"] : "#0A9663";
            $wceazy_sb_cart_checkout_progress_color = isset($wceazy_sb_settings["cart_checkout_progress_color"]) ? $wceazy_sb_settings["cart_checkout_progress_color"] : "#000000";
            $wceazy_sb_cart_checkout_progress_text_color = isset($wceazy_sb_settings["cart_checkout_progress_text_color"]) ? $wceazy_sb_settings["cart_checkout_progress_text_color"] : "#ffffff";

            /* Disable if Shipping Bar is disabled */
            if($wceazy_sb_enable_shipping_bar == "no"){
                return;
            }
            /* Disable if shipping zone not defined */
            if($wceazy_sb_shipping_zone == ""){
                return;
            }
            /* Check if zone matches */
            $zone_id = $this->getUsersShippingZoneID();
            if($wceazy_sb_shipping_zone != $zone_id){
                return;
            }
            /* Check if zone has free shipping method */
            if(!$this->isZoneHasFreeShippingMethod($zone_id)){
                return;
            }

            /* Get shipping zone's minimum amount */
            $min_required_amount = $this->getShippingZoneMinAmount();


            /* Total Cart Amount */
            $cart_amount = WC()->cart->get_cart_contents_total();

            /* Progress Percent */
            if($cart_amount >= $min_required_amount){
                $percent = "100";
            }else{
                $percent = (100 * $cart_amount) / $min_required_amount;
            }
            $unique_id = rand();

            ?>

            <style>
                #wceazy_cart_checkout_sb_<?php echo esc_attr($unique_id);?> {
                    --wceazy_cart_checkout_sb_bar_bg: <?php echo $wceazy_sb_cart_checkout_progress_bar_bg; ?>;
                    --wceazy_cart_checkout_sb_bar_progress_bg: <?php echo $wceazy_sb_cart_checkout_progress_color; ?>;
                    --wceazy_cart_checkout_sb_bar_text_color: <?php echo $wceazy_sb_cart_checkout_progress_text_color; ?>;
                }
            </style>

            <tr class="cart-total-wceazy-sb">
                <th><?php echo $wceazy_sb_cart_checkout_headline; ?></th>
                <td data-title="total-volume">
                    <div id="wceazy_cart_checkout_sb_<?php echo esc_attr($unique_id);?>" class="wceazy_cart_checkout_sb_progress_container">
                        <div class="bar-holder">
                            <div class="bar-1" style="width: <?php echo $percent; ?>%;"><?php echo round($percent, 2); ?>%</div>
                        </div>
                    </div>
                </td>
            </tr>



            <?php

        }

        public function getWooProducts() {
            $results = array();
            $args = array('post_type' => 'product', 'posts_per_page' => -1);
            foreach (get_posts($args) as $product) {
                $results[] = array("id" => $product->ID, "text" => $product->post_title);
            }
            return $results;
        }

    }
}