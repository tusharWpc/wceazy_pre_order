<?php

$wceazy_one_click_checkout_settings = get_option('wceazy_one_click_checkout_settings', False);
$wceazy_occ_settings = $wceazy_one_click_checkout_settings ? json_decode($wceazy_one_click_checkout_settings, true) : array();

$wceazy_occ_enable_product_ajax_to_cart = isset($wceazy_occ_settings["enable_product_ajax_to_cart"]) ? $wceazy_occ_settings["enable_product_ajax_to_cart"] : "no";



$wceazy_occ_buy_btn_size_on_product = isset($wceazy_occ_settings["buy_btn_size_on_product"]) ? $wceazy_occ_settings["buy_btn_size_on_product"]."px" : "fit-content";
$wceazy_occ_buy_now_btn_product_mt = isset($wceazy_occ_settings["buy_now_btn_product_mt"]) ? $wceazy_occ_settings["buy_now_btn_product_mt"]."px" : "0px";
$wceazy_occ_buy_now_btn_product_mb = isset($wceazy_occ_settings["buy_now_btn_product_mb"]) ? $wceazy_occ_settings["buy_now_btn_product_mb"]."px" : "0px";
$wceazy_occ_buy_now_btn_product_ml = isset($wceazy_occ_settings["buy_now_btn_product_ml"]) ? $wceazy_occ_settings["buy_now_btn_product_ml"]."px" : "5px";
$wceazy_occ_buy_now_btn_product_mr = isset($wceazy_occ_settings["buy_now_btn_product_mr"]) ? $wceazy_occ_settings["buy_now_btn_product_mr"]."px" : "5px";

$wceazy_occ_buy_btn_size_on_product_archive = isset($wceazy_occ_settings["buy_btn_size_on_product_archive"]) ? $wceazy_occ_settings["buy_btn_size_on_product_archive"]."px" : "fit-content";
$wceazy_occ_buy_now_btn_product_archive_mt = isset($wceazy_occ_settings["buy_now_btn_product_archive_mt"]) ? $wceazy_occ_settings["buy_now_btn_product_archive_mt"]."px" : "0px";
$wceazy_occ_buy_now_btn_product_archive_mb = isset($wceazy_occ_settings["buy_now_btn_product_archive_mb"]) ? $wceazy_occ_settings["buy_now_btn_product_archive_mb"]."px" : "0px";
$wceazy_occ_buy_now_btn_product_archive_ml = isset($wceazy_occ_settings["buy_now_btn_product_archive_ml"]) ? $wceazy_occ_settings["buy_now_btn_product_archive_ml"]."px" : "5px";
$wceazy_occ_buy_now_btn_product_archive_mr = isset($wceazy_occ_settings["buy_now_btn_product_archive_mr"]) ? $wceazy_occ_settings["buy_now_btn_product_archive_mr"]."px" : "5px";

$wceazy_occ_buy_now_btn_color = isset($wceazy_occ_settings["buy_now_btn_color"]) ? $wceazy_occ_settings["buy_now_btn_color"] : "#ffffff";
$wceazy_occ_buy_now_btn_bg_color = isset($wceazy_occ_settings["buy_now_btn_bg_color"]) ? $wceazy_occ_settings["buy_now_btn_bg_color"] : "#0170B9";
$wceazy_occ_buy_now_btn_hover_color = isset($wceazy_occ_settings["buy_now_btn_hover_color"]) ? $wceazy_occ_settings["buy_now_btn_hover_color"] : "#ffffff";
$wceazy_occ_buy_now_btn_hover_bg_color = isset($wceazy_occ_settings["buy_now_btn_hover_bg_color"]) ? $wceazy_occ_settings["buy_now_btn_hover_bg_color"] : "#000000";
$wceazy_occ_buy_now_btn_ptpb = isset($wceazy_occ_settings["buy_now_btn_ptpb"]) ? $wceazy_occ_settings["buy_now_btn_ptpb"]."px" : "15px";
$wceazy_occ_buy_now_btn_plpr = isset($wceazy_occ_settings["buy_now_btn_plpr"]) ? $wceazy_occ_settings["buy_now_btn_plpr"]."px" : "30px";
$wceazy_occ_buy_now_btn_border_radius = isset($wceazy_occ_settings["buy_now_btn_border_radius"]) ? $wceazy_occ_settings["buy_now_btn_border_radius"]."px" : "2px";

$wceazy_occ_remove_terms_condition = isset($wceazy_occ_settings["remove_terms_condition"]) ? $wceazy_occ_settings["remove_terms_condition"] : "no";


?>


<style>
    a.button.wfocc_single_product_buy_now{
        width: <?php echo esc_attr($wceazy_occ_buy_btn_size_on_product); ?>;
        color: <?php echo esc_attr($wceazy_occ_buy_now_btn_color); ?>;
        background-color:  <?php echo esc_attr($wceazy_occ_buy_now_btn_bg_color); ?>;
        text-align: center;
        border-radius: <?php echo esc_attr($wceazy_occ_buy_now_btn_border_radius); ?> !important;
        padding-top: <?php echo esc_attr($wceazy_occ_buy_now_btn_ptpb); ?> !important;
        padding-right: <?php echo esc_attr($wceazy_occ_buy_now_btn_plpr); ?> !important;
        padding-bottom: <?php echo esc_attr($wceazy_occ_buy_now_btn_ptpb); ?> !important;
        padding-left: <?php echo esc_attr($wceazy_occ_buy_now_btn_plpr); ?> !important;
        margin-top: <?php echo esc_attr($wceazy_occ_buy_now_btn_product_mt); ?> !important;
        margin-bottom: <?php echo esc_attr($wceazy_occ_buy_now_btn_product_mb); ?> !important;
        margin-left: <?php echo esc_attr($wceazy_occ_buy_now_btn_product_ml); ?> !important;
        margin-right: <?php echo esc_attr($wceazy_occ_buy_now_btn_product_mr); ?> !important;

    }
    a.button.wfocc_single_product_buy_now:hover{
        color: <?php echo esc_attr($wceazy_occ_buy_now_btn_hover_color); ?>;
        background-color: <?php echo esc_attr($wceazy_occ_buy_now_btn_hover_bg_color); ?>;
    }
    a.button.wfocc_product_archive_buy_now{
        width: <?php echo esc_attr($wceazy_occ_buy_btn_size_on_product_archive); ?>;
        color: <?php echo esc_attr($wceazy_occ_buy_now_btn_color); ?>;
        background-color:  <?php echo esc_attr($wceazy_occ_buy_now_btn_bg_color); ?>;
        text-align: center;
        border-radius: <?php echo esc_attr($wceazy_occ_buy_now_btn_border_radius); ?> !important;
        padding-top: <?php echo esc_attr($wceazy_occ_buy_now_btn_ptpb); ?> !important;
        padding-right: <?php echo esc_attr($wceazy_occ_buy_now_btn_plpr); ?> !important;
        padding-bottom: <?php echo esc_attr($wceazy_occ_buy_now_btn_ptpb); ?> !important;
        padding-left: <?php echo esc_attr($wceazy_occ_buy_now_btn_plpr); ?> !important;
        margin-top: <?php echo esc_attr($wceazy_occ_buy_now_btn_product_archive_mt); ?> !important;
        margin-bottom: <?php echo esc_attr($wceazy_occ_buy_now_btn_product_archive_mb); ?> !important;
        margin-left: <?php echo esc_attr($wceazy_occ_buy_now_btn_product_archive_ml); ?> !important;
        margin-right: <?php echo esc_attr($wceazy_occ_buy_now_btn_product_archive_mr); ?> !important;
    }
    a.button.wfocc_product_archive_buy_now:hover{
        color: <?php echo esc_attr($wceazy_occ_buy_now_btn_hover_color); ?>;
        background-color: <?php echo esc_attr($wceazy_occ_buy_now_btn_hover_bg_color); ?>;
    }
    <?php if( 'yes' === $wceazy_occ_remove_terms_condition ){ ?>
    .woocommerce-page.woocommerce-checkout .woocommerce-terms-and-conditions-wrapper .form-row.validate-required{
        display:none !important;
    }
    <?php } ?>
</style>



<script type="text/javascript">

    jQuery(document).ready(function($){
        'use strict';



        <?php if($wceazy_occ_enable_product_ajax_to_cart == "yes"){ ?>
        wceazy_frontend_occ_ajax_add_to_cart_init();
        <?php } ?>
    });

</script>