<?php

// If this file is called directly, abort.
if (!defined ('WPINC')) {
    die;
}

if(!isset($_SESSION)){session_start();}

if (!class_exists ('WcEazyBogoDealUtils')) {
    class WcEazyBogoDealUtils
    {
        public $base_admin;
        public $module_admin;

        public function __construct ($base_admin, $module_admin)
        {
            $this->base_admin = $base_admin;
            $this->module_admin = $module_admin;

            if (!get_option("wceazy_bogo_deal_rules")) {
                update_option('wceazy_bogo_deal_rules', "");
            }
        }





        public function listAllRules()
        {
            $dataRules = get_option("wceazy_bogo_deal_rules");
            return stripslashes($dataRules);
        }

        public function saveAllRules($rules)
        {
            update_option('wceazy_bogo_deal_rules', $rules);
            return True;
        }


        public function getWooProducts($search = "")
        {
            global $wpdb;
            $results = array();
            if (class_exists('WooCommerce')) {
                $sql = $wpdb->prepare( "SELECT ID, post_title FROM {$wpdb->prefix}posts WHERE post_type = 'product' AND post_status = 'publish' AND post_title LIKE %s ORDER BY ID DESC LIMIT 10", array( '%'.$search.'%' ) );
                $listPosts = $wpdb->get_results($sql);
                if (sizeof($listPosts) > 0) {
                    foreach ($listPosts as $singlePost) {
                        $results[] = array("id" => $singlePost->ID, "text" => $singlePost->post_title);
                    }
                }
            }
            return $results;
        }


        public function addOrUpdateProductOnCart($product_id, $quantity){
            $is_exists = False;

            $cart = WC()->cart;
            foreach ( $cart->get_cart() as $cart_item_key => $cart_item ) {
                $cart_product_id = $cart_item['product_id'];

                if($cart_product_id == $product_id){
                    $is_exists = True;
                    $cart->set_quantity( $cart_item_key, ($quantity + $cart_item['quantity']) );
                    break;
                }
            }

            if(!$is_exists){
                $cart->add_to_cart( $product_id, $quantity);
            }
        }


        public function getCartProductQuantity ($woo_cart, $product_id)
        {
            $quantity = 0;
            foreach ( $woo_cart as $cart_item_key => $cart_item ) {
                $cart_product_id = $cart_item['product_id'];

                if($cart_product_id == $product_id){
                    $quantity = $cart_item['quantity'];
                    break;
                }
            }
            return $quantity;
        }

        public function getBuyProductQuantity ($buy_data, $product_id)
        {
            $quantity = 0;
            foreach ( $buy_data as $required_product ) {
                if($required_product->id == $product_id){
                    $quantity = $required_product->quantity;
                    break;
                }
            }
            return $quantity;
        }

        public function addGiftProduct()
        {
            if (class_exists('WooCommerce')) {

                $woo_cart = WC()->cart->get_cart();

                $rules = !empty($this->listAllRules()) ? json_decode($this->listAllRules(), false) : array();

                foreach ($rules as $rule){

                    $rule_achieved = array();

                    foreach ($rule->buy_data as $required_product){
                        if($required_product->quantity <= $this->getCartProductQuantity($woo_cart, $required_product->id)){
                            $rule_achieved[] = 1;
                        }else{
                            $rule_achieved[] = 0;
                        }
                    }

                    if (!in_array(0, $rule_achieved)) {
                        // Operation to add get products
                        foreach ($rule->get_data as $gift_product){
                            $quantity_in_cart = $this->getCartProductQuantity($woo_cart, $gift_product->id);
                            $quantity_required = $this->getBuyProductQuantity($rule->buy_data, $gift_product->id);
                            if($quantity_in_cart < $quantity_required + $gift_product->quantity){

                                $this->addOrUpdateProductOnCart($gift_product->id, $gift_product->quantity);

                            }
                        }
                    }
                }
            }
        }


        public function displayDiscountPrice( $cart ) {
            if (class_exists('WooCommerce')) {
                if ( is_admin() && ! defined( 'DOING_AJAX' ) ){
                    return;
                }

                if ( did_action( 'woocommerce_before_calculate_totals' ) >= 2 ){
                    return;
                }

                $rules = !empty($this->listAllRules()) ? json_decode($this->listAllRules(), false) : array();

                foreach ($rules as $rule){
                    $rule_achieved = array();
                    foreach ($rule->buy_data as $required_product){
                        if($required_product->quantity <= $this->getCartProductQuantity($cart->get_cart(), $required_product->id)){
                            $rule_achieved[] = 1;
                        }else{
                            $rule_achieved[] = 0;
                        }
                    }

                    if (!in_array(0, $rule_achieved)) {
                        foreach ( $cart->get_cart() as $cart_item_key => $cart_item ) {
                            $price = wc_get_product( $cart_item['product_id'] )->get_price();
                            foreach ($rule->get_data as $gift_product){
                                if($cart_item['product_id'] == $gift_product->id){
                                    $quantity_in_cart = $this->getCartProductQuantity($cart->get_cart(), $gift_product->id);
                                    $quantity_required = $this->getBuyProductQuantity($rule->buy_data, $gift_product->id);
                                    if($quantity_in_cart >= $quantity_required + $gift_product->quantity){

                                        $normal_price = ($quantity_in_cart - $gift_product->quantity) * $price;
                                        if($rule->discount_type == "percent"){
                                            $percent = ($rule->discount_amount / 100) * $price;
                                            $discounted_price = $gift_product->quantity * ($price - $percent);
                                        }else{
                                            $discounted_price = $gift_product->quantity * ($price - $rule->discount_amount);
                                        }
                                        $new_price = ($normal_price + $discounted_price) / $quantity_in_cart;
                                        $cart_item['data']->set_price( $new_price );

                                    }
                                }
                            }
                        }

                    }
                }
            }
        }

        public function displayDiscountPriceText( $price, $cart_item, $cart_item_key ) {
            $product_id = $cart_item['product_id'];
            $cart = WC()->cart;
            $rules = !empty($this->listAllRules()) ? json_decode($this->listAllRules(), false) : array();
            foreach ($rules as $rule){
                $rule_achieved = array();
                foreach ($rule->buy_data as $required_product){
                    if($required_product->quantity <= $this->getCartProductQuantity($cart->get_cart(), $required_product->id)){
                        $rule_achieved[] = 1;
                    }else{
                        $rule_achieved[] = 0;
                    }
                }

                if (!in_array(0, $rule_achieved)) {
                    foreach ($rule->get_data as $gift_product){
                        if($product_id == $gift_product->id){
                            $quantity_in_cart = $this->getCartProductQuantity($cart->get_cart(), $gift_product->id);
                            $quantity_required = $this->getBuyProductQuantity($rule->buy_data, $gift_product->id);
                            if($quantity_in_cart >= $quantity_required + $gift_product->quantity){


                                $price = wc_get_product( $product_id )->get_price();
                                $normal_quantity = $quantity_in_cart - $gift_product->quantity;

                                if($rule->discount_type == "percent"){
                                    $percent = ($rule->discount_amount / 100) * $price;
                                    $discounted_price = $price - $percent;
                                }else{
                                    $discounted_price = $price - $rule->discount_amount;
                                }

                                $discounted_quantity = $gift_product->quantity;

                                if($quantity_in_cart == $gift_product->quantity){
                                    $price = "<s>".wc_price($price)."</s> ".wc_price($discounted_price);
                                }else{
                                    $price = wc_price($price)." x ".$normal_quantity."<br>";
                                    $price .= wc_price($discounted_price)." x ".$discounted_quantity;
                                }


                                return $price;


                            }
                        }
                    }

                }
            }
            return $price;
        }



    }
}