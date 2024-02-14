<?php

$wceazy_floating_cart_settings = get_option('wceazy_floating_cart_settings', False);
$wceazy_fc_settings = $wceazy_floating_cart_settings ? json_decode($wceazy_floating_cart_settings, true) : array();

$wceazy_fc_auto_open_cart = isset($wceazy_fc_settings["auto_open_cart"]) ? $wceazy_fc_settings["auto_open_cart"] : "no";
$wceazy_fc_bascket_count = isset($wceazy_fc_settings["bascket_count"]) ? $wceazy_fc_settings["bascket_count"] : "number_of_items";
$wceazy_fc_dont_show_cart_pages = isset($wceazy_fc_settings["dont_show_cart_pages"]) ? explode(",",$wceazy_fc_settings["dont_show_cart_pages"]) : array();

$wceazy_fc_show_header_basket_icon = isset($wceazy_fc_settings["show_header_basket_icon"]) ? $wceazy_fc_settings["show_header_basket_icon"] : "yes";
$wceazy_fc_show_header_close_icon = isset($wceazy_fc_settings["show_header_close_icon"]) ? $wceazy_fc_settings["show_header_close_icon"] : "yes";

$wceazy_fc_show_product_image = isset($wceazy_fc_settings["show_product_image"]) ? $wceazy_fc_settings["show_product_image"] : "yes";
$wceazy_fc_show_product_name = isset($wceazy_fc_settings["show_product_name"]) ? $wceazy_fc_settings["show_product_name"] : "yes";
$wceazy_fc_show_product_price = isset($wceazy_fc_settings["show_product_price"]) ? $wceazy_fc_settings["show_product_price"] : "yes";
$wceazy_fc_show_product_price_total = isset($wceazy_fc_settings["show_product_price_total"]) ? $wceazy_fc_settings["show_product_price_total"] : "yes";
$wceazy_fc_link_to_single_product = isset($wceazy_fc_settings["link_to_single_product"]) ? $wceazy_fc_settings["link_to_single_product"] : "yes";
$wceazy_fc_delete_item_form_cart = isset($wceazy_fc_settings["delete_item_form_cart"]) ? $wceazy_fc_settings["delete_item_form_cart"] : "yes";
$wceazy_fc_allowed_quantity_update = isset($wceazy_fc_settings["allowed_quantity_update"]) ? $wceazy_fc_settings["allowed_quantity_update"] : "yes";

$wceazy_fc_footer_position_fixed = isset($wceazy_fc_settings["footer_position_fixed"]) ? $wceazy_fc_settings["footer_position_fixed"] : "yes";
$wceazy_fc_show_subtotal = isset($wceazy_fc_settings["show_subtotal"]) ? $wceazy_fc_settings["show_subtotal"] : "yes";
$wceazy_fc_show_discount = isset($wceazy_fc_settings["show_discount"]) ? $wceazy_fc_settings["show_discount"] : "yes";
$wceazy_fc_show_shipping_amount = isset($wceazy_fc_settings["show_shipping_amount"]) ? $wceazy_fc_settings["show_shipping_amount"] : "yes";
$wceazy_fc_show_cart_total = isset($wceazy_fc_settings["show_cart_total"]) ? $wceazy_fc_settings["show_cart_total"] : "yes";
$wceazy_fc_show_coupon = isset($wceazy_fc_settings["show_coupon"]) ? $wceazy_fc_settings["show_coupon"] : "yes";

$wceazy_fc_heading_title = isset($wceazy_fc_settings["heading_title"]) ? $wceazy_fc_settings["heading_title"] : "Your Shopping Cart";
$wceazy_fc_continue_btn_text = isset($wceazy_fc_settings["continue_btn_text"]) ? $wceazy_fc_settings["continue_btn_text"] : "Continue Shopping";
$wceazy_fc_view_cart_text = isset($wceazy_fc_settings["view_cart_text"]) ? $wceazy_fc_settings["view_cart_text"] : "View Cart";
$wceazy_fc_checkout_btn_text = isset($wceazy_fc_settings["checkout_btn_text"]) ? $wceazy_fc_settings["checkout_btn_text"] : "Checkout";
$wceazy_fc_empty_cart_message = isset($wceazy_fc_settings["empty_cart_message"]) ? $wceazy_fc_settings["empty_cart_message"] : "No items in cart";
$wceazy_fc_subtotal_text = isset($wceazy_fc_settings["subtotal_text"]) ? $wceazy_fc_settings["subtotal_text"] : "Subtotal";
$wceazy_fc_total_amount_text = isset($wceazy_fc_settings["total_amount_text"]) ? $wceazy_fc_settings["total_amount_text"] : "Total Amount";

$wceazy_fc_continue_btn_url = isset($wceazy_fc_settings["continue_btn_url"]) ? $wceazy_fc_settings["continue_btn_url"] : home_url()."/shop";
$wceazy_fc_view_cart_btn_url = isset($wceazy_fc_settings["view_cart_btn_url"]) ? $wceazy_fc_settings["view_cart_btn_url"] : home_url()."/cart";
$wceazy_fc_checkout_btn_url = isset($wceazy_fc_settings["checkout_btn_url"]) ? $wceazy_fc_settings["checkout_btn_url"] : home_url()."/checkout";

$wceazy_fc_width = isset($wceazy_fc_settings["width"]) ? $wceazy_fc_settings["width"] : "460";
$wceazy_fc_open_from = isset($wceazy_fc_settings["open_from"]) ? $wceazy_fc_settings["open_from"] : "right";
$wceazy_fc_btn_font_size = isset($wceazy_fc_settings["btn_font_size"]) ? $wceazy_fc_settings["btn_font_size"] : "16";
$wceazy_fc_btn_font_color = isset($wceazy_fc_settings["btn_font_color"]) ? $wceazy_fc_settings["btn_font_color"] : "#ffffff";
$wceazy_fc_btn_bg_color = isset($wceazy_fc_settings["btn_bg_color"]) ? $wceazy_fc_settings["btn_bg_color"] : "#6E32C9";
$wceazy_fc_btn_hover_font_color = isset($wceazy_fc_settings["btn_hover_font_color"]) ? $wceazy_fc_settings["btn_hover_font_color"] : "#ffffff";
$wceazy_fc_btn_hover_bg_color = isset($wceazy_fc_settings["btn_hover_bg_color"]) ? $wceazy_fc_settings["btn_hover_bg_color"] : "#510bbb";
$wceazy_fc_btn_border_color = isset($wceazy_fc_settings["btn_border_color"]) ? $wceazy_fc_settings["btn_border_color"] : "#6E32C9";
$wceazy_fc_btn_border_hover_color = isset($wceazy_fc_settings["btn_border_hover_color"]) ? $wceazy_fc_settings["btn_border_hover_color"] : "#510bbb";
$wceazy_fc_btn_border_radius = isset($wceazy_fc_settings["btn_border_radius"]) ? $wceazy_fc_settings["btn_border_radius"] : "4";

$wceazy_fc_cross_icon_size = isset($wceazy_fc_settings["cross_icon_size"]) ? $wceazy_fc_settings["cross_icon_size"] : "30";
$wceazy_fc_header_basket_icon_size = isset($wceazy_fc_settings["header_basket_icon_size"]) ? $wceazy_fc_settings["header_basket_icon_size"] : "30";
$wceazy_fc_heading_font_size = isset($wceazy_fc_settings["heading_font_size"]) ? $wceazy_fc_settings["heading_font_size"] : "24";
$wceazy_fc_heading_font_color = isset($wceazy_fc_settings["heading_font_color"]) ? $wceazy_fc_settings["heading_font_color"] : "#3a3a3a";
$wceazy_fc_heading_border_bottom_color = isset($wceazy_fc_settings["heading_border_bottom_color"]) ? $wceazy_fc_settings["heading_border_bottom_color"] : "#cccccc";

$wceazy_fc_item_remove_icon = isset($wceazy_fc_settings["item_remove_icon"]) ? $wceazy_fc_settings["item_remove_icon"] : "icon_1";
$wceazy_fc_remove_icon_size = isset($wceazy_fc_settings["remove_icon_size"]) ? $wceazy_fc_settings["remove_icon_size"] : "16";
$wceazy_fc_product_img_width = isset($wceazy_fc_settings["product_img_width"]) ? $wceazy_fc_settings["product_img_width"] : "100";
$wceazy_fc_product_title_color = isset($wceazy_fc_settings["product_title_color"]) ? $wceazy_fc_settings["product_title_color"] : "#6E32C9";
$wceazy_fc_product_title_font_size = isset($wceazy_fc_settings["product_title_font_size"]) ? $wceazy_fc_settings["product_title_font_size"] : "16";
$wceazy_fc_quantity_box_width = isset($wceazy_fc_settings["quantity_box_width"]) ? $wceazy_fc_settings["quantity_box_width"] : "56";
$wceazy_fc_quantity_box_border_color = isset($wceazy_fc_settings["quantity_box_border_color"]) ? $wceazy_fc_settings["quantity_box_border_color"] : "#6E32C9";
$wceazy_fc_quantity_box_bg_color = isset($wceazy_fc_settings["quantity_box_bg_color"]) ? $wceazy_fc_settings["quantity_box_bg_color"] : "#ffffff";
$wceazy_fc_quantity_box_text_color = isset($wceazy_fc_settings["quantity_box_text_color"]) ? $wceazy_fc_settings["quantity_box_text_color"] : "#000000";

$wceazy_fc_basket_enable = isset($wceazy_fc_settings["basket_enable"]) ? $wceazy_fc_settings["basket_enable"] : "show_always";
$wceazy_fc_basket_shape = isset($wceazy_fc_settings["basket_shape"]) ? $wceazy_fc_settings["basket_shape"] : "round";
$wceazy_fc_basket_icon_size = isset($wceazy_fc_settings["basket_icon_size"]) ? $wceazy_fc_settings["basket_icon_size"] : "35";
$wceazy_fc_basket_show_count = isset($wceazy_fc_settings["basket_show_count"]) ? $wceazy_fc_settings["basket_show_count"] : "yes";
$wceazy_fc_basket_icon = isset($wceazy_fc_settings["basket_icon"]) ? $wceazy_fc_settings["basket_icon"] : "icon_1";
$wceazy_fc_basket_position = isset($wceazy_fc_settings["basket_position"]) ? $wceazy_fc_settings["basket_position"] : "bottom_right";
$wceazy_fc_basket_offset_vertical = isset($wceazy_fc_settings["basket_offset_vertical"]) ? $wceazy_fc_settings["basket_offset_vertical"] : "0";
$wceazy_fc_basket_offset_horizontal = isset($wceazy_fc_settings["basket_offset_horizontal"]) ? $wceazy_fc_settings["basket_offset_horizontal"] : "0";
$wceazy_fc_basket_count_position = isset($wceazy_fc_settings["basket_count_position"]) ? $wceazy_fc_settings["basket_count_position"] : "top_left";
$wceazy_fc_basket_icon_color = isset($wceazy_fc_settings["basket_icon_color"]) ? $wceazy_fc_settings["basket_icon_color"] : "#ffffff";
$wceazy_fc_basket_bg_color = isset($wceazy_fc_settings["basket_bg_color"]) ? $wceazy_fc_settings["basket_bg_color"] : "#000000";
$wceazy_fc_basket_count_color = isset($wceazy_fc_settings["basket_count_color"]) ? $wceazy_fc_settings["basket_count_color"] : "#ffffff";
$wceazy_fc_basket_count_bg_color = isset($wceazy_fc_settings["basket_count_bg_color"]) ? $wceazy_fc_settings["basket_count_bg_color"] : "#d00000";

/* Disable on disabled pages */
if(in_array (get_the_ID(), $wceazy_fc_dont_show_cart_pages)){
    return;
}

$unique_id = rand();


/* Show or Hide Bsket */
$show_basket = True;
if($wceazy_fc_basket_enable == "hide_always"){
    $show_basket = False;
}else if($wceazy_fc_basket_enable == "hide_empty_cart"){
    if ( WC()->cart->get_cart_contents_count() == 0 ) {
        $show_basket = False;
    }
}

?>

<style>
    #wceazy_frontend_fc_bubble_<?php echo esc_attr($unique_id);?> {
        --wceazy_fc_basket_icon_size: <?php echo $wceazy_fc_basket_icon_size; ?>px;
        --wceazy_fc_basket_icon: url(<?php echo WCEAZY_URL; ?>assets/img/modules/floating_cart/basket_<?php echo $wceazy_fc_basket_icon; ?>.svg);
        --wceazy_fc_basket_icon_color: <?php echo $wceazy_fc_basket_icon_color; ?>;
        --wceazy_fc_basket_bg_color: <?php echo $wceazy_fc_basket_bg_color; ?>;
        --wceazy_fc_basket_count_color: <?php echo $wceazy_fc_basket_count_color; ?>;
        --wceazy_fc_basket_count_bg_color: <?php echo $wceazy_fc_basket_count_bg_color; ?>;
    }
    #wceazy_frontend_fc_<?php echo esc_attr($unique_id);?> {
        --wceazy_fc_width: <?php echo $wceazy_fc_width; ?>px;
        --wceazy_fc_btn_font_size: <?php echo $wceazy_fc_btn_font_size; ?>px;
        --wceazy_fc_btn_font_color: <?php echo $wceazy_fc_btn_font_color; ?>;
        --wceazy_fc_btn_bg_color: <?php echo $wceazy_fc_btn_bg_color; ?>;
        --wceazy_fc_btn_hover_font_color: <?php echo $wceazy_fc_btn_hover_font_color; ?>;
        --wceazy_fc_btn_hover_bg_color: <?php echo $wceazy_fc_btn_hover_bg_color; ?>;
        --wceazy_fc_btn_border_color: <?php echo $wceazy_fc_btn_border_color; ?>;
        --wceazy_fc_btn_border_hover_color: <?php echo $wceazy_fc_btn_border_hover_color; ?>;
        --wceazy_fc_btn_border_radius: <?php echo $wceazy_fc_btn_border_radius; ?>px;

        --wceazy_fc_cross_icon_size: <?php echo $wceazy_fc_cross_icon_size; ?>px;
        --wceazy_fc_header_basket_icon_size: <?php echo $wceazy_fc_header_basket_icon_size; ?>px;
        --wceazy_fc_heading_font_size: <?php echo $wceazy_fc_heading_font_size; ?>px;
        --wceazy_fc_heading_font_color: <?php echo $wceazy_fc_heading_font_color; ?>;
        --wceazy_fc_heading_border_bottom_color: <?php echo $wceazy_fc_heading_border_bottom_color; ?>;

        --wceazy_fc_item_remove_icon: url(<?php echo WCEAZY_URL; ?>assets/img/modules/floating_cart/delete_<?php echo $wceazy_fc_item_remove_icon; ?>.svg);
        --wceazy_fc_remove_icon_size: <?php echo $wceazy_fc_remove_icon_size; ?>px;
        --wceazy_fc_product_img_width: <?php echo $wceazy_fc_product_img_width; ?>px;
        --wceazy_fc_product_title_color: <?php echo $wceazy_fc_product_title_color; ?>;
        --wceazy_fc_product_title_font_size: <?php echo $wceazy_fc_product_title_font_size; ?>px;
        --wceazy_fc_quantity_box_width: <?php echo $wceazy_fc_quantity_box_width; ?>px;
        --wceazy_fc_quantity_box_border_color: <?php echo $wceazy_fc_quantity_box_border_color; ?>;
        --wceazy_fc_quantity_box_bg_color: <?php echo $wceazy_fc_quantity_box_bg_color; ?>;
        --wceazy_fc_quantity_box_text_color: <?php echo $wceazy_fc_quantity_box_text_color; ?>;
    }
    .wceazy_fc_bubble{
        <?php if($wceazy_fc_basket_position == "top_left") { ?> top: 110px; bottom: auto; right: auto; left: 60px; <?php } ?>
        <?php if($wceazy_fc_basket_position == "top_right") { ?> top: 110px; bottom: auto; right: 60px; left: auto; <?php } ?>
        <?php if($wceazy_fc_basket_position == "bottom_left") { ?> top: auto; bottom: 110px; right: auto; left: 60px; <?php } ?>
        <?php if($wceazy_fc_basket_position == "bottom_right") { ?> top: auto; bottom: 110px; right: 60px; left: auto; <?php } ?>

        <?php if($wceazy_fc_basket_position == "top_left") { ?>
        margin-left: <?php echo $wceazy_fc_basket_offset_vertical; ?>px;
        margin-top: <?php echo $wceazy_fc_basket_offset_horizontal; ?>px;
        <?php } ?>
        <?php if($wceazy_fc_basket_position == "top_right") { ?>
            margin-right: <?php echo $wceazy_fc_basket_offset_vertical; ?>px;
            margin-top: <?php echo $wceazy_fc_basket_offset_horizontal; ?>px;
        <?php } ?>
        <?php if($wceazy_fc_basket_position == "bottom_left") { ?>
            margin-left: <?php echo $wceazy_fc_basket_offset_vertical; ?>px;
            margin-bottom: <?php echo $wceazy_fc_basket_offset_horizontal; ?>px;
        <?php } ?>
        <?php if($wceazy_fc_basket_position == "bottom_right") { ?>
            margin-right: <?php echo $wceazy_fc_basket_offset_vertical; ?>px;
            margin-bottom: <?php echo $wceazy_fc_basket_offset_horizontal; ?>px;
        <?php } ?>
    }
    .wceazy_fc_bubble .wceazy_fc_basket_item_count{
        <?php if($wceazy_fc_basket_count_position == "top_left") { ?> top: -5px; bottom: auto; left: -11px; right: auto; <?php } ?>
        <?php if($wceazy_fc_basket_count_position == "top_right") { ?> top: -5px; bottom: auto; left: auto; right: -11px; <?php } ?>
        <?php if($wceazy_fc_basket_count_position == "bottom_left") { ?> top: auto; bottom: -5px; left: -11px; right: auto; <?php } ?>
        <?php if($wceazy_fc_basket_count_position == "bottom_right") { ?> top: auto; bottom: -5px; left: auto; right: -11px; <?php } ?>
    }

    <?php if($wceazy_fc_auto_open_cart == "yes") { ?>  .wceazy_fc_main{ display: flex; }  <?php } ?>

    <?php if($wceazy_fc_show_header_basket_icon == "no") { ?>  .wceazy_fc_header .wceazy_fc_header_title{ background: none; padding: 0; }  <?php } ?>
    <?php if($wceazy_fc_show_header_close_icon == "no") { ?>  .wceazy_fc_header .wceazy_fc_close{ display: none; }  <?php } ?>

    <?php if($wceazy_fc_show_product_image == "no") { ?>  .wceazy_fc_product_part_1{ display: none; }  <?php } ?>
    <?php if($wceazy_fc_show_product_name == "no") { ?>  .wceazy_fc_product_part_2 .wceazy_fc_product_title{ display: none; }  <?php } ?>
    <?php if($wceazy_fc_show_product_price == "no") { ?>  .wceazy_fc_product_part_2 .wceazy_fc_product_unit_price{ display: none; }  <?php } ?>
    <?php if($wceazy_fc_show_product_price_total == "no") { ?>  .wceazy_fc_product_part_3 .wceazy_fc_product_total{ display: none; }  <?php } ?>
    <?php if($wceazy_fc_delete_item_form_cart == "no") { ?>  .wceazy_fc_product_part_3 .wceazy_fc_product_remove{ display: none; }  <?php } ?>
    <?php if($wceazy_fc_allowed_quantity_update == "no") { ?>  .wceazy_fc_product_part_2 .wceazy_fc_product_quantity{ display: none; }  <?php } ?>

    <?php if($wceazy_fc_show_subtotal == "no") { ?>  .wceazy_fc_stats .wceazy_fc_stats_subtotal{ display: none; }  <?php } ?>
    <?php if($wceazy_fc_show_discount == "no") { ?>  .wceazy_fc_stats .wceazy_fc_stats_discount{ display: none; }  <?php } ?>
    <?php if($wceazy_fc_show_shipping_amount == "no") { ?>  .wceazy_fc_stats .wceazy_fc_stats_shipping{ display: none; }  <?php } ?>
    <?php if($wceazy_fc_show_cart_total == "no") { ?>  .wceazy_fc_stats .wceazy_fc_stats_total{ display: none; }  <?php } ?>
    <?php if($wceazy_fc_show_coupon == "no") { ?>  .wceazy_fc_coupon{ display: none; }  <?php } ?>

    <?php if($wceazy_fc_basket_show_count == "no") { ?>  .wceazy_fc_bubble .wceazy_fc_basket_item_count{ display: none; }  <?php } ?>
</style>

<?php if($show_basket){ ?>
<div id="wceazy_frontend_fc_bubble_<?php echo esc_attr($unique_id);?>" class="wceazy_fc_bubble <?php echo $wceazy_fc_basket_shape == "round" ? "round" : ""; ?>" onclick="wceazy_frontend_fc_open_cart()">
    <div class="wceazy_fc_basket_img"></div>
    <div class="wceazy_fc_basket_item_count"><?php echo $wceazy_fc_bascket_count == "number_of_items" ? WC()->cart->get_cart_contents_count() : count( WC()->cart->get_cart() ); ?></div>
</div>
<?php } ?>

<div id="wceazy_frontend_fc_<?php echo esc_attr($unique_id);?>" class="wceazy_fc_main <?php echo $wceazy_fc_footer_position_fixed == "yes" ? "fixed_footer" : ""; ?> <?php echo esc_attr($wceazy_fc_open_from);?>">

    <div class="wceazy_fc_main_container">
        <div class="wceazy_fc_loading">
            <div class="wceazy_fc_loader"></div>
        </div>
        <div class="wceazy_fc_header">
            <div class="wceazy_fc_header_title"><?php echo $wceazy_fc_heading_title; ?></div>
            <button class="wceazy_fc_close" onclick="wceazy_frontend_fc_close_cart()"></button>
        </div>

        <div class="wceazy_fc_products">

            <div class="wceazy_fc_product_empty"><?php echo $wceazy_fc_empty_cart_message; ?></div>

        </div>

        <div class="wceazy_fc_coupon">
            <p class="wceazy_fc_coupon_title">Got a discount code?</p>
            <div class="wceazy_fc_coupon_box">
                <input class="wceazy_fc_coupon_field" type="text" placeholder="Enter Discount Code"/>
                <button class="wceazy_fc_coupon_apply_btn" onclick="wceazy_frontend_fc_apply_coupon(this)">Apply</button>
            </div>
        </div>

        <div class="wceazy_fc_stats">
            <div class="wceazy_fc_stats_subtotal">
                <p class="wceazy_fc_stats_title bold"><?php echo $wceazy_fc_subtotal_text; ?></p>
                <p class="wceazy_fc_stats_value bold">$100</p>
            </div>
            <div class="wceazy_fc_stats_discount">
                <p class="wceazy_fc_stats_title">Discount</p>
                <p class="wceazy_fc_stats_value">$0.00</p>
            </div>
            <div class="wceazy_fc_stats_shipping">
                <p class="wceazy_fc_stats_title">Shipping</p>
                <p class="wceazy_fc_stats_value">$0.00</p>
            </div>
            <div class="wceazy_fc_stats_total">
                <p class="wceazy_fc_stats_title bold"><?php echo $wceazy_fc_total_amount_text; ?></p>
                <p class="wceazy_fc_stats_value bold">$100.00</p>
            </div>
        </div>

        <a href="<?php echo $wceazy_fc_view_cart_btn_url; ?>" class="wceazy_fc_main_action_btn"><?php echo $wceazy_fc_view_cart_text; ?></a>
        <a href="<?php echo $wceazy_fc_continue_btn_url; ?>" class="wceazy_fc_main_action_btn"><?php echo $wceazy_fc_continue_btn_text; ?></a>
        <a href="<?php echo $wceazy_fc_checkout_btn_url; ?>" class="wceazy_fc_main_action_btn"><?php echo $wceazy_fc_checkout_btn_text; ?></a>
    </div>


</div>



<script type="text/javascript">

    jQuery(document).ready(function($){
        'use strict';
        wceazy_frontend_fc_init();
    });

</script>