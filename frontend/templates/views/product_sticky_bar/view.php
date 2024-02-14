<?php
if (is_product ()) {
    $product = wc_get_product ();
} else {
    return;
}

$wceazy_product_sticky_bar_settings = get_option('wceazy_product_sticky_bar_settings', False);
$wceazy_psb_settings = $wceazy_product_sticky_bar_settings ? json_decode($wceazy_product_sticky_bar_settings, true) : array();

$wceazy_psb_is_enable = isset($wceazy_psb_settings["is_enable"]) ? $wceazy_psb_settings["is_enable"] : "yes";
$wceazy_psb_show_on_desktop = isset($wceazy_psb_settings["show_on_desktop"]) ? $wceazy_psb_settings["show_on_desktop"] : "yes";
$wceazy_psb_show_on_mobile = isset($wceazy_psb_settings["show_on_mobile"]) ? $wceazy_psb_settings["show_on_mobile"] : "yes";
$wceazy_psb_show_in = isset($wceazy_psb_settings["show_in"]) ? $wceazy_psb_settings["show_in"] : "top";
$wceazy_psb_show_only_scroll = isset($wceazy_psb_settings["show_only_scroll"]) ? $wceazy_psb_settings["show_only_scroll"] : "yes";
$wceazy_psb_scroll_pixels = isset($wceazy_psb_settings["scroll_pixels"]) ? $wceazy_psb_settings["scroll_pixels"] : "180";
$wceazy_psb_product_review = isset($wceazy_psb_settings["product_review"]) ? $wceazy_psb_settings["product_review"] : "yes";
$wceazy_psb_product_review_count = isset($wceazy_psb_settings["product_review_count"]) ? $wceazy_psb_settings["product_review_count"] : "yes";
$wceazy_psb_disabled_products = isset($wceazy_psb_settings["disabled_products"]) ? explode(",",$wceazy_psb_settings["disabled_products"]) : array();
$wceazy_psb_enable_qty_input = isset($wceazy_psb_settings["enable_qty_input"]) ? $wceazy_psb_settings["enable_qty_input"] : "yes";
$wceazy_psb_enable_variable_product = isset($wceazy_psb_settings["enable_variable_product"]) ? $wceazy_psb_settings["enable_variable_product"] : "yes";
$wceazy_psb_show_product_image = isset($wceazy_psb_settings["show_product_image"]) ? $wceazy_psb_settings["show_product_image"] : "yes";
$wceazy_psb_show_stock = isset($wceazy_psb_settings["show_stock"]) ? $wceazy_psb_settings["show_stock"] : "yes";
$wceazy_psb_hidebar_outofstock = isset($wceazy_psb_settings["hidebar_outofstock"]) ? $wceazy_psb_settings["hidebar_outofstock"] : "no";

$wceazy_psb_height = isset($wceazy_psb_settings["height"]) ? $wceazy_psb_settings["height"] : "100";
$wceazy_psb_product_image_shape = isset($wceazy_psb_settings["product_image_shape"]) ? $wceazy_psb_settings["product_image_shape"] : "square";
$wceazy_psb_product_title_color = isset($wceazy_psb_settings["product_title_color"]) ? $wceazy_psb_settings["product_title_color"] : "#3a3a3a";
$wceazy_psb_product_rating_color = isset($wceazy_psb_settings["product_rating_color"]) ? $wceazy_psb_settings["product_rating_color"] : "#0170b9";
$wceazy_psb_product_rating_count_color = isset($wceazy_psb_settings["product_rating_count_color"]) ? $wceazy_psb_settings["product_rating_count_color"] : "#3a3a3a";
$wceazy_psb_product_price_color = isset($wceazy_psb_settings["product_price_color"]) ? $wceazy_psb_settings["product_price_color"] : "#ca0815";
$wceazy_psb_product_price_font_size = isset($wceazy_psb_settings["product_price_font_size"]) ? $wceazy_psb_settings["product_price_font_size"] : "17";
$wceazy_psb_btn_bg_color = isset($wceazy_psb_settings["btn_bg_color"]) ? $wceazy_psb_settings["btn_bg_color"] : "#ca0815";
$wceazy_psb_btn_font_color = isset($wceazy_psb_settings["btn_font_color"]) ? $wceazy_psb_settings["btn_font_color"] : "#ffffff";
$wceazy_psb_btn_font_size = isset($wceazy_psb_settings["btn_font_size"]) ? $wceazy_psb_settings["btn_font_size"] : "14";
$wceazy_psb_btn_border_color = isset($wceazy_psb_settings["btn_border_color"]) ? $wceazy_psb_settings["btn_border_color"] : "#ca0815";
$wceazy_psb_btn_border_width = isset($wceazy_psb_settings["btn_border_width"]) ? $wceazy_psb_settings["btn_border_width"] : "1";
$wceazy_psb_btn_bg_hover_color = isset($wceazy_psb_settings["btn_bg_hover_color"]) ? $wceazy_psb_settings["btn_bg_hover_color"] : "#ffffff";
$wceazy_psb_btn_border_hover_color = isset($wceazy_psb_settings["btn_border_hover_color"]) ? $wceazy_psb_settings["btn_border_hover_color"] : "#000000";
$wceazy_psb_btn_font_hover_color = isset($wceazy_psb_settings["btn_font_hover_color"]) ? $wceazy_psb_settings["btn_font_hover_color"] : "#000000";
$wceazy_psb_btn_padding_left_right = isset($wceazy_psb_settings["btn_padding_left_right"]) ? $wceazy_psb_settings["btn_padding_left_right"] : "30";
$wceazy_psb_btn_padding_top_bottom = isset($wceazy_psb_settings["btn_padding_top_bottom"]) ? $wceazy_psb_settings["btn_padding_top_bottom"] : "10";


/* Disable if Sticky Bar is disabled */
if($wceazy_psb_is_enable == "no"){
    return;
}

/* Disable on disabled product */
if(in_array ($product->get_id(), $wceazy_psb_disabled_products)){
    return;
}

/* Disable if Out of Stock settings are True */
if( $wceazy_psb_hidebar_outofstock == 'yes' ){
    if($product->get_stock_quantity() === 0 || !$product->is_in_stock()){
        return;
    }
}

// get product variations
$variations = $product->is_type( 'variable' ) ? $product->get_available_variations () : [];


/* Generate Stock Status */
$stock_html = "";
if ($product->managing_stock() && ! $product->is_in_stock() ){
    $stock_html = 'Out of stock';
}else if($product->managing_stock() == true){
    $stock_html = $product->get_stock_quantity().' in stock';
}

$unique_id = rand();

?>


<style>
    #wceazy_frontend_psd_<?php echo esc_attr($unique_id);?> {
        --wceazy_psb_height: <?php echo $wceazy_psb_height; ?>px;
        --wceazy_psb_product_title_color: <?php echo $wceazy_psb_product_title_color; ?>;
        --wceazy_psb_product_rating_color: <?php echo $wceazy_psb_product_rating_color; ?>;
        --wceazy_psb_product_rating_count_color: <?php echo $wceazy_psb_product_rating_count_color; ?>;
        --wceazy_psb_product_price_color: <?php echo $wceazy_psb_product_price_color; ?>;
        --wceazy_psb_product_price_font_size: <?php echo $wceazy_psb_product_price_font_size; ?>px;
        --wceazy_psb_btn_bg_color: <?php echo $wceazy_psb_btn_bg_color; ?>;
        --wceazy_psb_btn_font_color: <?php echo $wceazy_psb_btn_font_color; ?>;
        --wceazy_psb_btn_font_size: <?php echo $wceazy_psb_btn_font_size; ?>px;
        --wceazy_psb_btn_border_color: <?php echo $wceazy_psb_btn_border_color; ?>;
        --wceazy_psb_btn_border_width: <?php echo $wceazy_psb_btn_border_width; ?>px;
        --wceazy_psb_btn_bg_hover_color: <?php echo $wceazy_psb_btn_bg_hover_color; ?>;
        --wceazy_psb_btn_border_hover_color: <?php echo $wceazy_psb_btn_border_hover_color; ?>;
        --wceazy_psb_btn_font_hover_color: <?php echo $wceazy_psb_btn_font_hover_color; ?>;
        --wceazy_psb_btn_padding_top_bottom: <?php echo $wceazy_psb_btn_padding_top_bottom; ?>px;
        --wceazy_psb_btn_padding_left_right: <?php echo $wceazy_psb_btn_padding_left_right; ?>px;
    }
</style>


<div class="wceazy_frontend_psb <?php echo $wceazy_psb_show_only_scroll == "no" ? "active" : ""; ?> <?php echo $wceazy_psb_show_in; ?> <?php echo $wceazy_psb_show_on_desktop == "yes" ? "wceazy_frontend_psb_desktop" : ""; ?> <?php echo $wceazy_psb_show_on_mobile == "yes" ? "wceazy_frontend_psb_mobile" : ""; ?>" id="wceazy_frontend_psd_<?php echo esc_attr($unique_id);?>">
    <div class="wceazy_frontend_psb_container">

        <div class="wceazy_frontend_psb_part_left">
            <div class="wceazy_frontend_psb_thumbnail <?php echo $wceazy_psb_product_image_shape == "round" ? "round" : ""; ?>">
                <?php if($wceazy_psb_show_product_image == "yes"){ ?>
                <?php echo $product->get_image_id() != NULL ? wp_get_attachment_image ($product->get_image_id(), array(100, 100)) : ""; ?>
                <?php } ?>
            </div>
            <div class="wceazy_frontend_psb_details">
                <h1 class="wceazy_frontend_psb_title"><?php echo $product->get_title (); ?></h1>
                <div class="wceazy_frontend_psb_rating_review_stock">
                    <?php if($wceazy_psb_product_review == "yes"){ ?>
                        <?php echo wc_get_rating_html ($product->get_average_rating ()) ?>
                    <?php } ?>
                    <?php if($wceazy_psb_product_review_count == "yes"){ ?>
                        <span class="wceazy_frontend_psb_product_rating_count"> (<?php echo $product->get_rating_count(); ?> Review)</span>
                    <?php } ?>
                    <?php if($wceazy_psb_show_stock == "yes"){ ?>
                        <span class="wceazy_frontend_psb_stock_status"><?php echo $stock_html; ?></span>
                    <?php } ?>
                </div>
            </div>
        </div>

        <div class="wceazy_frontend_psb_part_right">

            <div class="wceazy_frontend_psb_product_price_and_quantity">
                <span class="wceazy_frontend_psb_product_price"><?php echo $product->get_price_html (); ?></span>
                <?php if (($product->managing_stock() && $product->is_in_stock()) || !$product->managing_stock()){ ?>
                    <?php if($wceazy_psb_enable_qty_input == "yes"){ ?>
                        <div class="wceazy_frontend_psb_product_quantity">
                            <input type="number" value="1" placeholder="Quantity" />
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>

            <?php if (($product->managing_stock() && $product->is_in_stock()) || !$product->managing_stock()){ ?>
                <?php if( !empty( $variations ) && $wceazy_psb_enable_variable_product == 'yes' ){ ?>
                    <div class="wceazy_frontend_psb_variations">
                        <select>
                            <option value="">Choose an option</option>
                            <?php $i = 0; ?>
                            <?php foreach ($variations as $key => $value) { ?>
                                <?php $variation_id = $value['variation_id']; ?>
                                <?php foreach ($value['attributes'] as $attr_key => $attr_value) { ?>
                                    <option value="<?php echo $variation_id; ?>"><?php echo ucfirst ($attr_value); ?></option>
                                <?php } ?>
                                <?php $i++;} ?>
                        </select>
                    </div>
                <?php } ?>
            <?php } ?>

            <?php if (($product->managing_stock() && $product->is_in_stock()) || !$product->managing_stock()){ ?>
                <button class="wceazy_frontend_psb_add_to_cart" onclick="wceazy_frontend_psb_add_to_cart(`<?php echo $product->get_id(); ?>`)">Add to Cart</button>
            <?php } ?>
        </div>

    </div>
</div>



<script type="text/javascript">

    jQuery(document).ready(function($){
        'use strict';
        <?php if($wceazy_psb_show_only_scroll == "yes"){ ?>
        wceazy_frontend_psb_init_scrolling(<?php echo $wceazy_psb_scroll_pixels; ?>);
        <?php } ?>
    });

</script>