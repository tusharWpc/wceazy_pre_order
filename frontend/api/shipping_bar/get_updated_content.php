<?php

$wceazy_shipping_bar_settings = get_option('wceazy_shipping_bar_settings', False);
$wceazy_sb_settings = $wceazy_shipping_bar_settings ? json_decode($wceazy_shipping_bar_settings, true) : array();

$wceazy_sb_enable_shipping_bar = isset($wceazy_sb_settings["enable_shipping_bar"]) ? $wceazy_sb_settings["enable_shipping_bar"] : "yes";
$wceazy_sb_display_desktop = isset($wceazy_sb_settings["display_desktop"]) ? $wceazy_sb_settings["display_desktop"] : "yes";
$wceazy_sb_display_mobile = isset($wceazy_sb_settings["display_mobile"]) ? $wceazy_sb_settings["display_mobile"] : "yes";
$wceazy_sb_shipping_zone = isset($wceazy_sb_settings["shipping_zone"]) ? $wceazy_sb_settings["shipping_zone"] : "";
$wceazy_sb_dont_show_pages = isset($wceazy_sb_settings["dont_show_pages"]) ? explode(",",$wceazy_sb_settings["dont_show_pages"]) : array();
$wceazy_sb_exclude_products = isset($wceazy_sb_settings["exclude_products"]) ? explode(",",$wceazy_sb_settings["exclude_products"]) : array();

$wceazy_sb_show_in_cart = isset($wceazy_sb_settings["show_in_cart"]) ? $wceazy_sb_settings["show_in_cart"] : "yes";
$wceazy_sb_position_cart_subtotal = isset($wceazy_sb_settings["position_cart_subtotal"]) ? $wceazy_sb_settings["position_cart_subtotal"] : "woocommerce_cart_totals_before_shipping";
$wceazy_sb_show_in_checkout = isset($wceazy_sb_settings["show_in_checkout"]) ? $wceazy_sb_settings["show_in_checkout"] : "yes";
$wceazy_sb_position_checkout_subtotal = isset($wceazy_sb_settings["position_checkout_subtotal"]) ? $wceazy_sb_settings["position_checkout_subtotal"] : "woocommerce_review_order_before_shipping";
$wceazy_sb_cart_checkout_headline = isset($wceazy_sb_settings["cart_checkout_headline"]) ? $wceazy_sb_settings["cart_checkout_headline"] : "Free Shipping";
$wceazy_sb_cart_checkout_progress_bar_bg = isset($wceazy_sb_settings["cart_checkout_progress_bar_bg"]) ? $wceazy_sb_settings["cart_checkout_progress_bar_bg"] : "#0A9663";
$wceazy_sb_cart_checkout_progress_color = isset($wceazy_sb_settings["cart_checkout_progress_color"]) ? $wceazy_sb_settings["cart_checkout_progress_color"] : "#000000";
$wceazy_sb_cart_checkout_progress_text_color = isset($wceazy_sb_settings["cart_checkout_progress_text_color"]) ? $wceazy_sb_settings["cart_checkout_progress_text_color"] : "#ffffff";


$wceazy_sb_zero_order_amount_msg = isset($wceazy_sb_settings["zero_order_amount_msg"]) ? $wceazy_sb_settings["zero_order_amount_msg"] : "Start placing order of minimum {minimum_order} to apply free shipping";
$wceazy_sb_partial_order_amount_msg = isset($wceazy_sb_settings["partial_order_amount_msg"]) ? $wceazy_sb_settings["partial_order_amount_msg"] : "You have purchased {cart_total} of {minimum_order} , Buy {missing_amount} worth products more to get the free shipping";
$wceazy_sb_completed_order_amount_msg = isset($wceazy_sb_settings["completed_order_amount_msg"]) ? $wceazy_sb_settings["completed_order_amount_msg"] : "You are now qualified for the Free shipping, go to {checkout_page}";

$wceazy_sb_initial_delay = isset($wceazy_sb_settings["initial_delay"]) ? $wceazy_sb_settings["initial_delay"] : "0";
$wceazy_sb_allow_disappear_time = isset($wceazy_sb_settings["allow_disappear_time"]) ? $wceazy_sb_settings["allow_disappear_time"] : "no";
$wceazy_sb_disappear_time = isset($wceazy_sb_settings["disappear_time"]) ? $wceazy_sb_settings["disappear_time"] : "0";

$wceazy_sb_position = isset($wceazy_sb_settings["position"]) ? $wceazy_sb_settings["position"] : "top";
$wceazy_sb_layout = isset($wceazy_sb_settings["layout"]) ? $wceazy_sb_settings["layout"] : "1";
$wceazy_sb_bg = isset($wceazy_sb_settings["bg"]) ? $wceazy_sb_settings["bg"] : "#0A9663";
$wceazy_sb_padding_top = isset($wceazy_sb_settings["padding_top"]) ? $wceazy_sb_settings["padding_top"] : "10";
$wceazy_sb_padding_bottom = isset($wceazy_sb_settings["padding_bottom"]) ? $wceazy_sb_settings["padding_bottom"] : "10";
$wceazy_sb_padding_left_right = isset($wceazy_sb_settings["padding_left_right"]) ? $wceazy_sb_settings["padding_left_right"] : "120";
$wceazy_sb_msg_text_color = isset($wceazy_sb_settings["msg_text_color"]) ? $wceazy_sb_settings["msg_text_color"] : "#ffffff";
$wceazy_sb_msg_link_text_color = isset($wceazy_sb_settings["msg_link_text_color"]) ? $wceazy_sb_settings["msg_link_text_color"] : "#ffffff";
$wceazy_sb_msg_font_size = isset($wceazy_sb_settings["msg_font_size"]) ? $wceazy_sb_settings["msg_font_size"] : "16";
$wceazy_sb_msg_text_align = isset($wceazy_sb_settings["msg_text_align"]) ? $wceazy_sb_settings["msg_text_align"] : "center";
$wceazy_sb_remove_icon = isset($wceazy_sb_settings["remove_icon"]) ? $wceazy_sb_settings["remove_icon"] : "icon_1";
$wceazy_sb_remove_icon_color = isset($wceazy_sb_settings["remove_icon_color"]) ? $wceazy_sb_settings["remove_icon_color"] : "#ffffff";
$wceazy_sb_remove_icon_size = isset($wceazy_sb_settings["remove_icon_size"]) ? $wceazy_sb_settings["remove_icon_size"] : "16";
$wceazy_sb_enable_progress_bar = isset($wceazy_sb_settings["enable_progress_bar"]) ? $wceazy_sb_settings["enable_progress_bar"] : "yes";
$wceazy_sb_progress_margin_top = isset($wceazy_sb_settings["progress_margin_top"]) ? $wceazy_sb_settings["progress_margin_top"] : "5";
$wceazy_sb_progress_bar_bg = isset($wceazy_sb_settings["progress_bar_bg"]) ? $wceazy_sb_settings["progress_bar_bg"] : "#ffffff";
$wceazy_sb_progress_color = isset($wceazy_sb_settings["progress_color"]) ? $wceazy_sb_settings["progress_color"] : "#000000";
$wceazy_sb_progress_text_color = isset($wceazy_sb_settings["progress_text_color"]) ? $wceazy_sb_settings["progress_text_color"] : "#ffffff";
$wceazy_sb_progress_font_size = isset($wceazy_sb_settings["progress_font_size"]) ? $wceazy_sb_settings["progress_font_size"] : "15";
$wceazy_sb_progress_border_radius = isset($wceazy_sb_settings["progress_border_radius"]) ? $wceazy_sb_settings["progress_border_radius"] : "20";



/* Disable if Shipping Bar is disabled */
if($wceazy_sb_enable_shipping_bar == "no"){
    return;
}

/* Disable if shipping zone not defined */
if($wceazy_sb_shipping_zone == ""){
    return;
}

/* Check if zone matches */
$zone_id = $this->base_client->shipping_bar->utils->getUsersShippingZoneID();
if($wceazy_sb_shipping_zone != $zone_id){
    return;
}

/* Check if zone has free shipping method */
if(!$this->base_client->shipping_bar->utils->isZoneHasFreeShippingMethod($zone_id)){
    return;
}


/* Get shipping zone's minimum amount */
$min_required_amount = $this->base_client->shipping_bar->utils->getShippingZoneMinAmount();


/* Total Cart Amount */
$cart_amount = WC()->cart->get_cart_contents_total();

/* Progress Percent */
if($cart_amount >= $min_required_amount){
    $percent = "100";
}else{
    $percent = (100 * $cart_amount) / $min_required_amount;
}


/* Cart Messages */
$message_text = "";
if($cart_amount == 0){
    $message_text = $wceazy_sb_zero_order_amount_msg;
}else if($cart_amount > 0 && $cart_amount < $min_required_amount){
    $message_text = $wceazy_sb_partial_order_amount_msg;
}else if($cart_amount > 0 && $cart_amount >= $min_required_amount){
    $message_text = $wceazy_sb_completed_order_amount_msg;
}
$message_text = str_replace("{minimum_order}", wc_price($min_required_amount), $message_text);
$message_text = str_replace("{cart_total}", wc_price($cart_amount), $message_text);
$message_text = str_replace("{missing_amount}", wc_price($min_required_amount - $cart_amount), $message_text);
$message_text = str_replace("{checkout_page}", '<a href="'.home_url()."/checkout".'">Checkout</a>', $message_text);



?>

<div class="wceazy_frontend_sb_header">
    <p><?php echo $message_text; ?></p>
    <button class="wceazy_frontend_sb_close_icon" onclick="wceazy_close_sb()"></button>
</div>
<?php if($cart_amount != 0) { ?>
    <?php if($wceazy_sb_enable_progress_bar == "yes") { ?>
        <div class="wceazy_frontend_sb_progress_container">
            <div class="bar-holder">
                <div class="bar-1" style="width: <?php echo $percent; ?>%;"><?php echo $percent; ?>%</div>
            </div>
        </div>
    <?php } ?>
<?php } ?>
