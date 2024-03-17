<?php

$wceazy_frequently_bought_settings = get_option('wceazy_frequently_bought_settings', False);
$wceazy_pf_settings = $wceazy_frequently_bought_settings ? json_decode($wceazy_frequently_bought_settings, true) : array();

// echo"<pre>";
// var_dump($wceazy_frequently_bought_settings);
// echo"</pre>";


$wceazy_pf_show_search_filter = isset ($wceazy_pf_settings["show_search_filter"]) ? $wceazy_pf_settings["show_search_filter"] : "yes";
$wceazy_pf_show_price_filter = isset ($wceazy_pf_settings["show_price_filter"]) ? $wceazy_pf_settings["show_price_filter"] : "yes";
$wceazy_pf_show_rating_filter = isset ($wceazy_pf_settings["show_rating_filter"]) ? $wceazy_pf_settings["show_rating_filter"] : "yes";
$wceazy_pf_show_category_filter = isset ($wceazy_pf_settings["show_category_filter"]) ? $wceazy_pf_settings["show_category_filter"] : "yes";
$wceazy_pf_show_stock_filter = isset ($wceazy_pf_settings["show_stock_filter"]) ? $wceazy_pf_settings["show_stock_filter"] : "yes";
$wceazy_pf_sidebar_position = isset ($wceazy_pf_settings["sidebar_position"]) ? $wceazy_pf_settings["sidebar_position"] : "right";

$wceazy_pf_product_per_page = isset ($wceazy_pf_settings["product_per_page"]) ? $wceazy_pf_settings["product_per_page"] : "15";
$wceazy_pf_add_to_cart_btn_text = isset ($wceazy_pf_settings["add_to_cart_btn_text"]) ? $wceazy_pf_settings["add_to_cart_btn_text"] : "Add to Cart";
$wceazy_pf_select_options_btn_text = isset ($wceazy_pf_settings["select_options_btn_text"]) ? $wceazy_pf_settings["select_options_btn_text"] : "Select Options";
$wceazy_pf_stock_out_btn_text = isset ($wceazy_pf_settings["stock_out_btn_text"]) ? $wceazy_pf_settings["stock_out_btn_text"] : "Stock Out";
$wceazy_pf_prev_btn_text = isset ($wceazy_pf_settings["prev_btn_text"]) ? $wceazy_pf_settings["prev_btn_text"] : "Previous";
$wceazy_pf_next_btn_text = isset ($wceazy_pf_settings["next_btn_text"]) ? $wceazy_pf_settings["next_btn_text"] : "Next";
$wceazy_pf_action_btn_bg_color = isset ($wceazy_pf_settings["action_btn_bg_color"]) ? $wceazy_pf_settings["action_btn_bg_color"] : "#6E32C9";
$wceazy_pf_action_btn_text_color = isset ($wceazy_pf_settings["action_btn_text_color"]) ? $wceazy_pf_settings["action_btn_text_color"] : "#FFFFFF";
$wceazy_pf_pagination_btn_border_color = isset ($wceazy_pf_settings["pagination_btn_border_color"]) ? $wceazy_pf_settings["pagination_btn_border_color"] : "#6E32C9";
$wceazy_pf_pagination_btn_text_color = isset ($wceazy_pf_settings["pagination_btn_text_color"]) ? $wceazy_pf_settings["pagination_btn_text_color"] : "#6E32C9";
$wceazy_pf_loader_color = isset ($wceazy_pf_settings["loader_color"]) ? $wceazy_pf_settings["loader_color"] : "#E0E1E3";

// $wceazy_pf_search_filter_label_text = isset($wceazy_pf_settings["search_filter_label_text"]) ? $wceazy_pf_settings["search_filter_label_text"] : "Search Product";
$wceazy_pf_search_filter_label_text = isset ($wceazy_pf_settings["search_filter_label_text"]) ? $wceazy_pf_settings["search_filter_label_text"] : __('Search Product', 'wceazy');

// $wceazy_pf_search_filter_label_text = isset($wceazy_pf_settings["search_filter_label_text"]) ? sanitize_text_field($wceazy_pf_settings["search_filter_label_text"]) : __("Search Product", "wceazy");
$wceazy_pf_search_filter_placeholder_text = isset ($wceazy_pf_settings["search_filter_placeholder_text"]) ? $wceazy_pf_settings["search_filter_placeholder_text"] : __('Search Product', 'wceazy');
$wceazy_pf_search_filter_label_color = isset ($wceazy_pf_settings["search_filter_label_color"]) ? $wceazy_pf_settings["search_filter_label_color"] : "#222222";
$wceazy_pf_search_filter_input_border_color = isset ($wceazy_pf_settings["search_filter_input_border_color"]) ? $wceazy_pf_settings["search_filter_input_border_color"] : "#E4E4E6";
$wceazy_pf_search_filter_input_bg_color = isset ($wceazy_pf_settings["search_filter_input_bg_color"]) ? $wceazy_pf_settings["search_filter_input_bg_color"] : "#F6F8FA";
$wceazy_pf_search_filter_input_text_color = isset ($wceazy_pf_settings["search_filter_input_text_color"]) ? $wceazy_pf_settings["search_filter_input_text_color"] : "#43454B";

$wceazy_pf_price_filter_label_text = isset ($wceazy_pf_settings["price_filter_label_text"]) ? $wceazy_pf_settings["price_filter_label_text"] : "Filter By Price";
$wceazy_pf_price_filter_min_placeholder_text = isset ($wceazy_pf_settings["price_filter_min_placeholder_text"]) ? $wceazy_pf_settings["price_filter_min_placeholder_text"] : "Min";
$wceazy_pf_price_filter_max_placeholder_text = isset ($wceazy_pf_settings["price_filter_max_placeholder_text"]) ? $wceazy_pf_settings["price_filter_max_placeholder_text"] : "Max";
$wceazy_pf_price_filter_label_color = isset ($wceazy_pf_settings["price_filter_label_color"]) ? $wceazy_pf_settings["price_filter_label_color"] : "#222222";
$wceazy_pf_price_filter_input_border_color = isset ($wceazy_pf_settings["price_filter_input_border_color"]) ? $wceazy_pf_settings["price_filter_input_border_color"] : "#E4E4E6";
$wceazy_pf_price_filter_input_bg_color = isset ($wceazy_pf_settings["price_filter_input_bg_color"]) ? $wceazy_pf_settings["price_filter_input_bg_color"] : "#F6F8FA";
$wceazy_pf_price_filter_input_text_color = isset ($wceazy_pf_settings["price_filter_input_text_color"]) ? $wceazy_pf_settings["price_filter_input_text_color"] : "#43454B";


$wceazy_pf_rating_filter_label_text = isset ($wceazy_pf_settings["rating_filter_label_text"]) ? $wceazy_pf_settings["rating_filter_label_text"] : __('Filter By Rating', 'wceazy');
$wceazy_pf_rating_filter_and_up_text = isset ($wceazy_pf_settings["rating_filter_and_up_text"]) ? $wceazy_pf_settings["rating_filter_and_up_text"] : __('And Up', 'wceazy');
$wceazy_pf_rating_filter_label_color = isset ($wceazy_pf_settings["rating_filter_label_color"]) ? $wceazy_pf_settings["rating_filter_label_color"] : "#222222";
$wceazy_pf_rating_filter_and_up_color = isset ($wceazy_pf_settings["rating_filter_and_up_color"]) ? $wceazy_pf_settings["rating_filter_and_up_color"] : "#555555";
$wceazy_pf_rating_filter_show_5_star_rating = isset ($wceazy_pf_settings["rating_filter_show_5_star_rating"]) ? $wceazy_pf_settings["rating_filter_show_5_star_rating"] : "yes";
$wceazy_pf_rating_filter_show_4_star_rating = isset ($wceazy_pf_settings["rating_filter_show_4_star_rating"]) ? $wceazy_pf_settings["rating_filter_show_4_star_rating"] : "yes";
$wceazy_pf_rating_filter_show_3_star_rating = isset ($wceazy_pf_settings["rating_filter_show_3_star_rating"]) ? $wceazy_pf_settings["rating_filter_show_3_star_rating"] : "yes";
$wceazy_pf_rating_filter_show_2_star_rating = isset ($wceazy_pf_settings["rating_filter_show_2_star_rating"]) ? $wceazy_pf_settings["rating_filter_show_2_star_rating"] : "yes";
$wceazy_pf_rating_filter_show_1_star_rating = isset ($wceazy_pf_settings["rating_filter_show_1_star_rating"]) ? $wceazy_pf_settings["rating_filter_show_1_star_rating"] : "yes";
$wceazy_pf_rating_filter_show_0_star_rating = isset ($wceazy_pf_settings["rating_filter_show_0_star_rating"]) ? $wceazy_pf_settings["rating_filter_show_0_star_rating"] : "no";


$wceazy_pf_category_filter_label_text = isset ($wceazy_pf_settings["category_filter_label_text"]) ? $wceazy_pf_settings["category_filter_label_text"] : __('Filter By Category', 'wceazy');
$wceazy_pf_category_filter_label_color = isset ($wceazy_pf_settings["category_filter_label_color"]) ? $wceazy_pf_settings["category_filter_label_color"] : "#222222";
$wceazy_pf_category_filter_category_color = isset ($wceazy_pf_settings["category_filter_category_color"]) ? $wceazy_pf_settings["category_filter_category_color"] : "#444444";
$wceazy_pf_category_filter_checkbox_unchecked_bg = isset ($wceazy_pf_settings["category_filter_checkbox_unchecked_bg"]) ? $wceazy_pf_settings["category_filter_checkbox_unchecked_bg"] : "#F6F8FA";
$wceazy_pf_category_filter_checkbox_unchecked_border = isset ($wceazy_pf_settings["category_filter_checkbox_unchecked_border"]) ? $wceazy_pf_settings["category_filter_checkbox_unchecked_border"] : "#E4E4E6";
$wceazy_pf_category_filter_checkbox_checked_bg = isset ($wceazy_pf_settings["category_filter_checkbox_checked_bg"]) ? $wceazy_pf_settings["category_filter_checkbox_checked_bg"] : "#787B83";


$wceazy_pf_stock_filter_label_text = isset ($wceazy_pf_settings["stock_filter_label_text"]) ? $wceazy_pf_settings["stock_filter_label_text"] : __('Filter By Stock', 'wceazy');
$wceazy_pf_stock_filter_in_stock_text = isset ($wceazy_pf_settings["stock_filter_in_stock_text"]) ? $wceazy_pf_settings["stock_filter_in_stock_text"] : __('In Stock', 'wceazy');
$wceazy_pf_stock_filter_out_stock_text = isset ($wceazy_pf_settings["stock_filter_out_stock_text"]) ? $wceazy_pf_settings["stock_filter_out_stock_text"] : __('Out of Stock', 'wceazy');
$wceazy_pf_stock_filter_label_color = isset ($wceazy_pf_settings["stock_filter_label_color"]) ? $wceazy_pf_settings["stock_filter_label_color"] : "#222222";
$wceazy_pf_stock_filter_stock_color = isset ($wceazy_pf_settings["stock_filter_stock_color"]) ? $wceazy_pf_settings["stock_filter_stock_color"] : "#444444";
$wceazy_pf_stock_filter_checkbox_unchecked_bg = isset ($wceazy_pf_settings["stock_filter_checkbox_unchecked_bg"]) ? $wceazy_pf_settings["stock_filter_checkbox_unchecked_bg"] : "#F6F8FA";
$wceazy_pf_stock_filter_checkbox_unchecked_border = isset ($wceazy_pf_settings["stock_filter_checkbox_unchecked_border"]) ? $wceazy_pf_settings["stock_filter_checkbox_unchecked_border"] : "#E4E4E6";
$wceazy_pf_stock_filter_checkbox_checked_bg = isset ($wceazy_pf_settings["stock_filter_checkbox_checked_bg"]) ? $wceazy_pf_settings["stock_filter_checkbox_checked_bg"] : "#787B83";



$unique_id = rand();

?>


<style>
    #wceazy_pf_main_<?php echo esc_attr($unique_id); ?> {

        --wceazy_pf_action_btn_bg_color:
            <?php echo $wceazy_pf_action_btn_bg_color; ?>
        ;
        --wceazy_pf_action_btn_text_color:
            <?php echo $wceazy_pf_action_btn_text_color; ?>
        ;
        --wceazy_pf_pagination_btn_border_color:
            <?php echo $wceazy_pf_pagination_btn_border_color; ?>
        ;
        --wceazy_pf_pagination_btn_text_color:
            <?php echo $wceazy_pf_pagination_btn_text_color; ?>
        ;
        --wceazy_pf_loader_color:
            <?php echo $wceazy_pf_loader_color; ?>
        ;

        --wceazy_pf_search_filter_label_color:
            <?php echo $wceazy_pf_search_filter_label_color; ?>
        ;
        --wceazy_pf_search_filter_input_border_color:
            <?php echo $wceazy_pf_search_filter_input_border_color; ?>
        ;
        --wceazy_pf_search_filter_input_bg_color:
            <?php echo $wceazy_pf_search_filter_input_bg_color; ?>
        ;
        --wceazy_pf_search_filter_input_text_color:
            <?php echo $wceazy_pf_search_filter_input_text_color; ?>
        ;

        --wceazy_pf_price_filter_label_color:
            <?php echo $wceazy_pf_price_filter_label_color; ?>
        ;
        --wceazy_pf_price_filter_input_border_color:
            <?php echo $wceazy_pf_price_filter_input_border_color; ?>
        ;
        --wceazy_pf_price_filter_input_bg_color:
            <?php echo $wceazy_pf_price_filter_input_bg_color; ?>
        ;
        --wceazy_pf_price_filter_input_text_color:
            <?php echo $wceazy_pf_price_filter_input_text_color; ?>
        ;

        --wceazy_pf_rating_filter_label_color:
            <?php echo $wceazy_pf_rating_filter_label_color; ?>
        ;
        --wceazy_pf_rating_filter_and_up_color:
            <?php echo $wceazy_pf_rating_filter_and_up_color; ?>
        ;

        --wceazy_pf_category_filter_label_color:
            <?php echo $wceazy_pf_category_filter_label_color; ?>
        ;
        --wceazy_pf_category_filter_category_color:
            <?php echo $wceazy_pf_category_filter_category_color; ?>
        ;
        --wceazy_pf_category_filter_checkbox_unchecked_bg:
            <?php echo $wceazy_pf_category_filter_checkbox_unchecked_bg; ?>
        ;
        --wceazy_pf_category_filter_checkbox_unchecked_border:
            <?php echo $wceazy_pf_category_filter_checkbox_unchecked_border; ?>
        ;
        --wceazy_pf_category_filter_checkbox_checked_bg:
            <?php echo $wceazy_pf_category_filter_checkbox_checked_bg; ?>
        ;

        --wceazy_pf_stock_filter_label_color:
            <?php echo $wceazy_pf_stock_filter_label_color; ?>
        ;
        --wceazy_pf_stock_filter_stock_color:
            <?php echo $wceazy_pf_stock_filter_stock_color; ?>
        ;
        --wceazy_pf_stock_filter_checkbox_unchecked_bg:
            <?php echo $wceazy_pf_stock_filter_checkbox_unchecked_bg; ?>
        ;
        --wceazy_pf_stock_filter_checkbox_unchecked_border:
            <?php echo $wceazy_pf_stock_filter_checkbox_unchecked_border; ?>
        ;
        --wceazy_pf_stock_filter_checkbox_checked_bg:
            <?php echo $wceazy_pf_stock_filter_checkbox_checked_bg; ?>
        ;
    }
</style>




<div>
    <div id="wceazy_pf_main_<?php echo esc_attr($unique_id); ?>"
        class="wceazy_pf_main sidebar_<?php echo esc_attr($wceazy_pf_sidebar_position) ?>">
        <div class="wceazy_pf_sidebar">

            <?php if ($wceazy_pf_show_search_filter == "yes") { ?>
                <div class="wceazy_pf_search_filter">

                    <label>
                        <?php echo esc_html__($wceazy_pf_search_filter_label_text, 'wceazy'); ?>
                    </label>

                    <input type="text" placeholder="<?php echo $wceazy_pf_search_filter_placeholder_text; ?>"
                        onkeyup="wceazy_frontend_pf_search()">
                </div>
            <?php } ?>


            <?php if ($wceazy_pf_show_price_filter == "yes") { ?>
                <div class="wceazy_pf_price_filter_1">
                    <label>
                        <?php echo esc_html_e($wceazy_pf_price_filter_label_text, 'wceazy'); ?>
                    </label>
                    <div class="wceazy_pf_price_filter_1_container">
                        <input type="number" placeholder="<?php echo $wceazy_pf_price_filter_min_placeholder_text; ?>"
                            onkeyup="wceazy_frontend_pf_search()">
                        <span>-</span>
                        <input type="number" placeholder="<?php echo $wceazy_pf_price_filter_max_placeholder_text; ?>"
                            onkeyup="wceazy_frontend_pf_search()">
                    </div>
                </div>
            <?php } ?>

            <?php if ($wceazy_pf_show_rating_filter == "yes") { ?>
                <div class="wceazy_pf_rating_filter">
                    <label>
                        <?php echo esc_html_e($wceazy_pf_rating_filter_label_text, 'wceazy'); ?>
                    </label>
                    <div class="wceazy_pf_rating_filter_container">
                        <?php if ($wceazy_pf_rating_filter_show_5_star_rating == "yes") { ?>
                            <div class="wceazy_pf_rating_filter_item" data-rating="5"
                                onclick="wceazy_frontend_pf_rating_changed(this)">
                                <span class="wceazy_pf_rating_filter_star wceazy_pf_rating_filter_star_5"></span>
                            </div>
                        <?php } ?>
                        <?php if ($wceazy_pf_rating_filter_show_4_star_rating == "yes") { ?>
                            <div class="wceazy_pf_rating_filter_item" data-rating="4"
                                onclick="wceazy_frontend_pf_rating_changed(this)">
                                <span class="wceazy_pf_rating_filter_star wceazy_pf_rating_filter_star_4"></span>
                                <span class="additional_text">
                                    <?php echo $wceazy_pf_rating_filter_and_up_text; ?>
                                </span>
                            </div>
                        <?php } ?>
                        <?php if ($wceazy_pf_rating_filter_show_3_star_rating == "yes") { ?>
                            <div class="wceazy_pf_rating_filter_item" data-rating="3"
                                onclick="wceazy_frontend_pf_rating_changed(this)">
                                <span class="wceazy_pf_rating_filter_star wceazy_pf_rating_filter_star_3"></span>
                                <span class="additional_text">
                                    <?php echo $wceazy_pf_rating_filter_and_up_text; ?>
                                </span>
                            </div>
                        <?php } ?>
                        <?php if ($wceazy_pf_rating_filter_show_2_star_rating == "yes") { ?>
                            <div class="wceazy_pf_rating_filter_item" data-rating="2"
                                onclick="wceazy_frontend_pf_rating_changed(this)">
                                <span class="wceazy_pf_rating_filter_star wceazy_pf_rating_filter_star_2"></span>
                                <span class="additional_text">
                                    <?php echo $wceazy_pf_rating_filter_and_up_text; ?>
                                </span>
                            </div>
                        <?php } ?>
                        <?php if ($wceazy_pf_rating_filter_show_1_star_rating == "yes") { ?>
                            <div class="wceazy_pf_rating_filter_item" data-rating="1"
                                onclick="wceazy_frontend_pf_rating_changed(this)">
                                <span class="wceazy_pf_rating_filter_star wceazy_pf_rating_filter_star_1"></span>
                                <span class="additional_text">
                                    <?php echo $wceazy_pf_rating_filter_and_up_text; ?>
                                </span>
                            </div>
                        <?php } ?>
                        <?php if ($wceazy_pf_rating_filter_show_0_star_rating == "yes") { ?>
                            <div class="wceazy_pf_rating_filter_item" data-rating="0"
                                onclick="wceazy_frontend_pf_rating_changed(this)">
                                <span class="wceazy_pf_rating_filter_star wceazy_pf_rating_filter_star_0"></span>
                                <span class="additional_text">
                                    <?php echo $wceazy_pf_rating_filter_and_up_text; ?>
                                </span>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>

            <?php if ($wceazy_pf_show_category_filter == "yes") { ?>
                <div class="wceazy_pf_category_filter">
                    <label>
                        <?php echo esc_html_e($wceazy_pf_category_filter_label_text, 'wceazy'); ?>
                    </label>
                    <div class="wceazy_pf_category_filter_checkbox_container">

                        <?php
                        if (taxonomy_exists('product_cat')) {
                            $product_categories = get_terms(
                                array(
                                    'taxonomy' => 'product_cat',
                                    'hide_empty' => true,
                                )
                            );

                            if (!empty ($product_categories) && !is_wp_error($product_categories)) {
                                foreach ($product_categories as $category) { ?>
                                    <label class="wceazy_pf_category_filter_checkbox_item"
                                        data-slug="<?php echo esc_attr($category->slug); ?>">
                                        <?php echo esc_attr($category->name); ?>
                                        <input type="checkbox" onchange="wceazy_frontend_pf_search()">
                                        <span class="checkmark"></span>
                                    </label>
                                <?php }
                            }
                        }

                        if (empty ($product_categories)) {
                            foreach ($this->utils->getWooProductCategories() as $category) { ?>
                                <label class="wceazy_pf_category_filter_checkbox_item"
                                    data-slug="<?php echo esc_attr($category["slug"]); ?>">
                                    <?php echo esc_attr($category["title"]); ?>
                                    <input type="checkbox" onchange="wceazy_frontend_pf_search()">
                                    <span class="checkmark"></span>
                                </label>
                            <?php }
                        }
                        ?>
                    </div>

                </div>
            <?php } ?>



            <?php if ($wceazy_pf_show_stock_filter == "yes") { ?>
                <div class="wceazy_pf_stock_filter">
                    <label>
                        <?php echo esc_html_e($wceazy_pf_stock_filter_label_text, 'wceazy'); ?>
                    </label>
                    <div class="wceazy_pf_stock_filter_checkbox_container">
                        <label class="wceazy_pf_stock_filter_checkbox_item" data-slug="instock">
                            <?php echo $wceazy_pf_stock_filter_in_stock_text; ?><input type="checkbox"
                                onchange="wceazy_frontend_pf_search()"><span class="checkmark"></span>
                        </label>
                        <label class="wceazy_pf_stock_filter_checkbox_item" data-slug="outofstock">
                            <?php echo $wceazy_pf_stock_filter_out_stock_text; ?><input type="checkbox"
                                onchange="wceazy_frontend_pf_search()"><span class="checkmark"></span>
                        </label>
                    </div>
                </div>
            <?php } ?>


        </div>
        <div class="wceazy_pf_product_container">



        </div>


    </div>

</div>




<script type="text/javascript">
    jQuery(document).ready(function () {
        wceazy_frontend_pf_search()
    });
</script>