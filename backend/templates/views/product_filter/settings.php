<?php


$wceazy_product_filter_settings = get_option('wceazy_product_filter_settings', False);
$wceazy_pf_settings = $wceazy_product_filter_settings ? json_decode($wceazy_product_filter_settings, true) : array();

// echo"<pre>";
// var_dump($wceazy_product_filter_settings);
// echo"</pre>";


$wceazy_pf_show_search_filter = isset($wceazy_pf_settings["show_search_filter"]) ? $wceazy_pf_settings["show_search_filter"] : "yes";
$wceazy_pf_show_price_filter = isset($wceazy_pf_settings["show_price_filter"]) ? $wceazy_pf_settings["show_price_filter"] : "yes";
$wceazy_pf_show_rating_filter = isset($wceazy_pf_settings["show_rating_filter"]) ? $wceazy_pf_settings["show_rating_filter"] : "yes";
$wceazy_pf_show_category_filter = isset($wceazy_pf_settings["show_category_filter"]) ? $wceazy_pf_settings["show_category_filter"] : "yes";
$wceazy_pf_show_stock_filter = isset($wceazy_pf_settings["show_stock_filter"]) ? $wceazy_pf_settings["show_stock_filter"] : "yes";
$wceazy_pf_sidebar_position = isset($wceazy_pf_settings["sidebar_position"]) ? $wceazy_pf_settings["sidebar_position"] : "right";

$wceazy_pf_product_per_page = isset($wceazy_pf_settings["product_per_page"]) ? $wceazy_pf_settings["product_per_page"] : "16";
$wceazy_pf_add_to_cart_btn_text = isset($wceazy_pf_settings["add_to_cart_btn_text"]) ? $wceazy_pf_settings["add_to_cart_btn_text"] : "Add to Cart";
$wceazy_pf_select_options_btn_text = isset($wceazy_pf_settings["select_options_btn_text"]) ? $wceazy_pf_settings["select_options_btn_text"] : "Select Options";
$wceazy_pf_stock_out_btn_text = isset($wceazy_pf_settings["stock_out_btn_text"]) ? $wceazy_pf_settings["stock_out_btn_text"] : "Stock Out";
$wceazy_pf_prev_btn_text = isset($wceazy_pf_settings["prev_btn_text"]) ? $wceazy_pf_settings["prev_btn_text"] : "Previous";
$wceazy_pf_next_btn_text = isset($wceazy_pf_settings["next_btn_text"]) ? $wceazy_pf_settings["next_btn_text"] : "Next";
$wceazy_pf_action_btn_bg_color = isset($wceazy_pf_settings["action_btn_bg_color"]) ? $wceazy_pf_settings["action_btn_bg_color"] : "#6E32C9";
$wceazy_pf_action_btn_text_color = isset($wceazy_pf_settings["action_btn_text_color"]) ? $wceazy_pf_settings["action_btn_text_color"] : "#FFFFFF";
$wceazy_pf_pagination_btn_border_color = isset($wceazy_pf_settings["pagination_btn_border_color"]) ? $wceazy_pf_settings["pagination_btn_border_color"] : "#6E32C9";
$wceazy_pf_pagination_btn_text_color = isset($wceazy_pf_settings["pagination_btn_text_color"]) ? $wceazy_pf_settings["pagination_btn_text_color"] : "#6E32C9";
$wceazy_pf_loader_color = isset($wceazy_pf_settings["loader_color"]) ? $wceazy_pf_settings["loader_color"] : "#E0E1E3";


$wceazy_pf_search_filter_label_text = isset($wceazy_pf_settings["search_filter_label_text"]) ? $wceazy_pf_settings["search_filter_label_text"] : esc_html__('Search Product', 'wceazy');



$wceazy_pf_search_filter_placeholder_text = isset($wceazy_pf_settings["search_filter_placeholder_text"]) ? $wceazy_pf_settings["search_filter_placeholder_text"] : esc_html__('Search by Product Name', 'wceazy');
$wceazy_pf_search_filter_label_color = isset($wceazy_pf_settings["search_filter_label_color"]) ? $wceazy_pf_settings["search_filter_label_color"] : "#222222";
$wceazy_pf_search_filter_input_border_color = isset($wceazy_pf_settings["search_filter_input_border_color"]) ? $wceazy_pf_settings["search_filter_input_border_color"] : "#E4E4E6";
$wceazy_pf_search_filter_input_bg_color = isset($wceazy_pf_settings["search_filter_input_bg_color"]) ? $wceazy_pf_settings["search_filter_input_bg_color"] : "#F6F8FA";
$wceazy_pf_search_filter_input_text_color = isset($wceazy_pf_settings["search_filter_input_text_color"]) ? $wceazy_pf_settings["search_filter_input_text_color"] : "#43454B";

$wceazy_pf_price_filter_label_text = isset($wceazy_pf_settings["price_filter_label_text"]) ? $wceazy_pf_settings["price_filter_label_text"] : esc_html__('Filter By Price', 'wceazy');
$wceazy_pf_price_filter_min_placeholder_text = isset($wceazy_pf_settings["price_filter_min_placeholder_text"]) ? $wceazy_pf_settings["price_filter_min_placeholder_text"] : esc_html__('Min', 'wceazy');
$wceazy_pf_price_filter_max_placeholder_text = isset($wceazy_pf_settings["price_filter_max_placeholder_text"]) ? $wceazy_pf_settings["price_filter_max_placeholder_text"] : esc_html__('Max', 'wceazy');
$wceazy_pf_price_filter_label_color = isset($wceazy_pf_settings["price_filter_label_color"]) ? $wceazy_pf_settings["price_filter_label_color"] : "#222222";
$wceazy_pf_price_filter_input_border_color = isset($wceazy_pf_settings["price_filter_input_border_color"]) ? $wceazy_pf_settings["price_filter_input_border_color"] : "#E4E4E6";
$wceazy_pf_price_filter_input_bg_color = isset($wceazy_pf_settings["price_filter_input_bg_color"]) ? $wceazy_pf_settings["price_filter_input_bg_color"] : "#F6F8FA";
$wceazy_pf_price_filter_input_text_color = isset($wceazy_pf_settings["price_filter_input_text_color"]) ? $wceazy_pf_settings["price_filter_input_text_color"] : "#43454B";


$wceazy_pf_rating_filter_label_text = isset($wceazy_pf_settings["rating_filter_label_text"]) ? $wceazy_pf_settings["rating_filter_label_text"] : esc_html__('Filter By Rating', 'wceazy');
$wceazy_pf_rating_filter_and_up_text = isset($wceazy_pf_settings["rating_filter_and_up_text"]) ? $wceazy_pf_settings["rating_filter_and_up_text"] : esc_html__('And Up', 'wceazy');
$wceazy_pf_rating_filter_label_color = isset($wceazy_pf_settings["rating_filter_label_color"]) ? $wceazy_pf_settings["rating_filter_label_color"] : "#222222";
$wceazy_pf_rating_filter_and_up_color = isset($wceazy_pf_settings["rating_filter_and_up_color"]) ? $wceazy_pf_settings["rating_filter_and_up_color"] : "#555555";
$wceazy_pf_rating_filter_show_5_star_rating = isset($wceazy_pf_settings["rating_filter_show_5_star_rating"]) ? $wceazy_pf_settings["rating_filter_show_5_star_rating"] : "yes";
$wceazy_pf_rating_filter_show_4_star_rating = isset($wceazy_pf_settings["rating_filter_show_4_star_rating"]) ? $wceazy_pf_settings["rating_filter_show_4_star_rating"] : "yes";
$wceazy_pf_rating_filter_show_3_star_rating = isset($wceazy_pf_settings["rating_filter_show_3_star_rating"]) ? $wceazy_pf_settings["rating_filter_show_3_star_rating"] : "yes";
$wceazy_pf_rating_filter_show_2_star_rating = isset($wceazy_pf_settings["rating_filter_show_2_star_rating"]) ? $wceazy_pf_settings["rating_filter_show_2_star_rating"] : "yes";
$wceazy_pf_rating_filter_show_1_star_rating = isset($wceazy_pf_settings["rating_filter_show_1_star_rating"]) ? $wceazy_pf_settings["rating_filter_show_1_star_rating"] : "yes";
$wceazy_pf_rating_filter_show_0_star_rating = isset($wceazy_pf_settings["rating_filter_show_0_star_rating"]) ? $wceazy_pf_settings["rating_filter_show_0_star_rating"] : "no";


$wceazy_pf_category_filter_label_text = isset($wceazy_pf_settings["category_filter_label_text"]) ? $wceazy_pf_settings["category_filter_label_text"] : esc_html__('Filter By Category', 'wceazy');
$wceazy_pf_category_filter_label_color = isset($wceazy_pf_settings["category_filter_label_color"]) ? $wceazy_pf_settings["category_filter_label_color"] : "#222222";
$wceazy_pf_category_filter_category_color = isset($wceazy_pf_settings["category_filter_category_color"]) ? $wceazy_pf_settings["category_filter_category_color"] : "#444444";
$wceazy_pf_category_filter_checkbox_unchecked_bg = isset($wceazy_pf_settings["category_filter_checkbox_unchecked_bg"]) ? $wceazy_pf_settings["category_filter_checkbox_unchecked_bg"] : "#F6F8FA";
$wceazy_pf_category_filter_checkbox_unchecked_border = isset($wceazy_pf_settings["category_filter_checkbox_unchecked_border"]) ? $wceazy_pf_settings["category_filter_checkbox_unchecked_border"] : "#E4E4E6";
$wceazy_pf_category_filter_checkbox_checked_bg = isset($wceazy_pf_settings["category_filter_checkbox_checked_bg"]) ? $wceazy_pf_settings["category_filter_checkbox_checked_bg"] : "#787B83";


$wceazy_pf_stock_filter_label_text = isset($wceazy_pf_settings["stock_filter_label_text"]) ? $wceazy_pf_settings["stock_filter_label_text"] : __("Filter By Stock", "wceazy");
$wceazy_pf_stock_filter_in_stock_text = isset($wceazy_pf_settings["stock_filter_in_stock_text"]) ? $wceazy_pf_settings["stock_filter_in_stock_text"] : __("In Stock", "wceazy");
$wceazy_pf_stock_filter_out_stock_text = isset($wceazy_pf_settings["stock_filter_out_stock_text"]) ? $wceazy_pf_settings["stock_filter_out_stock_text"] : __("Out of Stock", "wceazy");
$wceazy_pf_stock_filter_label_color = isset($wceazy_pf_settings["stock_filter_label_color"]) ? $wceazy_pf_settings["stock_filter_label_color"] : "#222222";
$wceazy_pf_stock_filter_stock_color = isset($wceazy_pf_settings["stock_filter_stock_color"]) ? $wceazy_pf_settings["stock_filter_stock_color"] : "#444444";
$wceazy_pf_stock_filter_checkbox_unchecked_bg = isset($wceazy_pf_settings["stock_filter_checkbox_unchecked_bg"]) ? $wceazy_pf_settings["stock_filter_checkbox_unchecked_bg"] : "#F6F8FA";
$wceazy_pf_stock_filter_checkbox_unchecked_border = isset($wceazy_pf_settings["stock_filter_checkbox_unchecked_border"]) ? $wceazy_pf_settings["stock_filter_checkbox_unchecked_border"] : "#E4E4E6";
$wceazy_pf_stock_filter_checkbox_checked_bg = isset($wceazy_pf_settings["stock_filter_checkbox_checked_bg"]) ? $wceazy_pf_settings["stock_filter_checkbox_checked_bg"] : "#787B83";


?>


<div id="wceazy_product_filter">
    <div class="wceazy_product_filter_header">
        <div class="wceazy_header_part_left">
            <p>wcEazy <span>
                    <?php echo esc_attr(WCEAZY_VERSION); ?>
                </span></p>
        </div>
        <div class="wceazy_header_part_right">
            <a class="wceazy_get_pro" target="_blank" href="<?php echo WCEAZY_GET_PRO_URL; ?>">
                <?php esc_html_e('GET PRO', 'wceazy'); ?>
            </a>
        </div>
    </div>

    <div class="wceazy_product_filter_page_title">
        <div class="page_title_part_left">
            <h2>
                <?php esc_html_e('Product Filter', 'wceazy'); ?>
            </h2>
            <a target="_blank" href="<?php echo WCEAZY_DOCS_PAGE; ?>">
                <?php esc_html_e('Documentation', 'wceazy'); ?>
            </a>
        </div>
        <div class="page_title_part_right">
            <button class="wceazy_product_filter_copy_shortcode" onclick="wceazy_product_filter_copy_shortcode()"
                style="display: inline-block;">[wceazy_product_filter]</button>
            <button class="wceazy_product_filter_back_to_dashboard_btn"
                onclick="wceazy_modules_page_init(`<?php echo esc_url(WCEAZY_URL); ?>`)">
                <?php esc_html_e('Back to all Modules', 'wceazy'); ?>
            </button>
        </div>
    </div>

    <div class="wceazy_product_filter_container">
        <div class="wceazy_product_filter_tab">
            <div class="wceazy_product_filter_tab_part_left">
                <div class="coupon_data_tabs">
                    <div class="tab_item tab_item_active" data-target="tab_general">
                        <h1>
                            <?php esc_html_e('General', 'wceazy'); ?>
                        </h1>
                    </div>
                    <div class="tab_item" data-target="tab_product">
                        <h1>
                            <?php esc_html_e('Product Settings', 'wceazy'); ?>
                        </h1>
                    </div>
                    <div class="tab_item" data-target="tab_search_filter">
                        <h1>
                            <?php esc_html_e('Search Filter', 'wceazy'); ?>
                        </h1>
                    </div>
                    <div class="tab_item" data-target="tab_price_filter">
                        <h1>
                            <?php esc_html_e('Price Filter', 'wceazy'); ?>
                        </h1>
                    </div>
                    <div class="tab_item" data-target="tab_rating_filter">
                        <h1>
                            <?php esc_html_e('Rating Filter', 'wceazy'); ?>
                        </h1>
                    </div>
                    <div class="tab_item" data-target="tab_category_filter">
                        <h1>
                            <?php esc_html_e('Category Filter', 'wceazy'); ?>
                        </h1>
                    </div>
                    <div class="tab_item" data-target="tab_stock_filter">
                        <h1>
                            <?php esc_html_e('Stock Filter', 'wceazy'); ?>
                        </h1>
                    </div>
                </div>
            </div>

            <div class="wceazy_product_filter_tab_part_right">
                <div class="coupon_tab_body" data-id="tab_general">
                    <div class="tab_body_title">
                        <h1>
                            <?php esc_html_e('General Settings', 'wceazy'); ?>
                        </h1>
                    </div>
                    <div class="tab_body_form">
                        <div class="wceazy_product_filter_field_group wceazy_product_filter_show_search_filter">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Show Search Filter', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <label class="toggle_switch"><input type="checkbox" <?php echo esc_attr($wceazy_pf_show_search_filter == "yes" ? "checked" : ""); ?>><span
                                        class="slider round"></span></label>
                                <small>
                                    <?php esc_html_e('Enable/Disable the search filter on the sidebar.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div class="wceazy_product_filter_field_group wceazy_product_filter_show_price_filter">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Show Price Filter', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <label class="toggle_switch"><input type="checkbox" <?php echo esc_attr($wceazy_pf_show_price_filter == "yes" ? "checked" : ""); ?>><span
                                        class="slider round"></span></label>
                                <small>
                                    <?php esc_html_e('Enable/Disable the price filter on the sidebar.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div class="wceazy_product_filter_field_group wceazy_product_filter_show_rating_filter">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Show Rating Filter', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <label class="toggle_switch"><input type="checkbox" <?php echo esc_attr($wceazy_pf_show_rating_filter == "yes" ? "checked" : ""); ?>><span
                                        class="slider round"></span></label>
                                <small>
                                    <?php esc_html_e('Enable/Disable the rating filter on the sidebar.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div class="wceazy_product_filter_field_group wceazy_product_filter_show_category_filter">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Show Category Filter ', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <label class="toggle_switch"><input type="checkbox" <?php echo esc_attr($wceazy_pf_show_category_filter == "yes" ? "checked" : ""); ?>><span
                                        class="slider round"></span></label>
                                <small>
                                    <?php esc_html_e('Enable/Disable the category filter on the sidebar.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>
                        <div class="wceazy_product_filter_field_group wceazy_product_filter_show_stock_filter">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Show Stock Status Filter', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <label class="toggle_switch"><input type="checkbox" <?php echo esc_attr($wceazy_pf_show_stock_filter == "yes" ? "checked" : ""); ?>><span
                                        class="slider round"></span></label>
                                <small>
                                    <?php esc_html_e('Enable/Disable the stock status filter on the sidebar. ', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div class="wceazy_product_filter_field_group wceazy_product_filter_sidebar_position">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Filter Sidebar Position', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <select class="wceazy_product_filter_select_field">
                                    <option value="">
                                        <?php esc_html_e('Please select', 'wceazy'); ?>
                                    </option>
                                    <option value="right" <?php echo esc_attr("right" == $wceazy_pf_sidebar_position ? "selected" : ""); ?>>
                                        <?php esc_html_e('Right ', 'wceazy'); ?>
                                    </option>
                                    <option value="left" <?php echo esc_attr("left" == $wceazy_pf_sidebar_position ? "selected" : ""); ?>>
                                        <?php esc_html_e('Left', 'wceazy'); ?>
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="coupon_tab_body" data-id="tab_product">
                    <div class="tab_body_title">
                        <h1>
                            <?php esc_html_e('Product Settings', 'wceazy'); ?>
                        </h1>
                    </div>
                    <div class="tab_body_form">

                        <div class="wceazy_product_filter_field_group wceazy_product_filter_product_per_page">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('
                                Max Product Per Page', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <input class="wceazy_product_filter_text_field" type="number" placeholder=""
                                    value="<?php echo esc_attr($wceazy_pf_product_per_page); ?>">
                                <small>
                                    <?php esc_html_e('Set maximum number of products can be showed in a page.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div class="wceazy_product_filter_field_group wceazy_product_filter_add_to_cart_btn_text">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('"Add to Cart" Button Text', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <input class="wceazy_product_filter_text_field" type="text" placeholder=""
                                    value="<?php echo esc_attr($wceazy_pf_add_to_cart_btn_text); ?>">
                                <small>
                                    <?php esc_html_e('Set the "Add to Cart" button text.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div class="wceazy_product_filter_field_group wceazy_product_filter_select_options_btn_text">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('"Select Options" Button Text', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <input class="wceazy_product_filter_text_field" type="text" placeholder=""
                                    value="<?php echo esc_attr($wceazy_pf_select_options_btn_text); ?>">
                                <small>
                                    <?php esc_html_e('Set the "Select Options" button text for variable products.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div class="wceazy_product_filter_field_group wceazy_product_filter_stock_out_btn_text">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('"Stock Out" Button Text', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <input class="wceazy_product_filter_text_field" type="text" placeholder=""
                                    value="<?php echo esc_attr($wceazy_pf_stock_out_btn_text); ?>">
                                <small>
                                    <?php esc_html_e('Set the "Stock Out" button text for stock out products.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>


                        <div class="wceazy_product_filter_field_group wceazy_product_filter_prev_btn_text">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('"Previous Page" Button Text', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <input class="wceazy_product_filter_text_field" type="text" placeholder=""
                                    value="<?php echo esc_attr($wceazy_pf_prev_btn_text); ?>">
                                <small>
                                    <?php esc_html_e('Set the "Previous Page" button text.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>


                        <div class="wceazy_product_filter_field_group wceazy_product_filter_next_btn_text">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('"Next Page" Button Text', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <input class="wceazy_product_filter_text_field" type="text" placeholder=""
                                    value="<?php echo esc_attr($wceazy_pf_next_btn_text); ?>">
                                <small>
                                    <?php esc_html_e('Set the "Next Page" button text.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>
                        <div class="wceazy_product_filter_field_group wceazy_product_filter_action_btn_bg_color">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Action Button Background Color', 'wceazy') ?>
                                <span style="color: #FF521D;">
                                    <?php esc_html_e('(Pro)', 'wceazy') ?>
                                </span>
                            </label>
                            <div class="field_with_msg_container">
                                <div class="color_picker_area">
                                    <input disabled type="color" id="wceazy_product_filter_action_btn_bg_color"
                                        value="<?php echo esc_attr($wceazy_pf_action_btn_bg_color); ?>">
                                    <label for="wceazy_product_filter_action_btn_bg_color">
                                        <?php esc_html_e('Select Color', 'wceazy') ?>
                                    </label>
                                </div>
                                <small>
                                    <?php esc_html_e('Set background color of Add to Cart, Select Option and Stock Out button.', 'wceazy') ?>
                                </small>
                            </div>
                        </div>

                        <div class="wceazy_product_filter_field_group wceazy_product_filter_action_btn_text_color">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Action Button Font Color', 'wceazy') ?>
                                <span style="color: #FF521D;">
                                    <?php esc_html_e('(Pro)', 'wceazy') ?>
                                </span>
                            </label>
                            <div class="field_with_msg_container">
                                <div class="color_picker_area">
                                    <input disabled type="color" id="wceazy_product_filter_action_btn_text_color"
                                        value="<?php echo esc_attr($wceazy_pf_action_btn_text_color); ?>">
                                    <label for="wceazy_product_filter_action_btn_text_color">
                                        <?php esc_html_e('Select Color', 'wceazy') ?>
                                    </label>
                                </div>
                                <small>
                                    <?php esc_html_e('Set text color of Add to Cart, Select Option and Stock Out button.', 'wceazy') ?>
                                </small>
                            </div>
                        </div>


                        <div
                            class="wceazy_product_filter_field_group wceazy_product_filter_pagination_btn_border_color">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Pagination Button Border Color', 'wceazy') ?>
                                <span style="color: #FF521D;">
                                    <?php esc_html_e('(Pro)', 'wceazy') ?>
                                </span>
                            </label>
                            <div class="field_with_msg_container">
                                <div class="color_picker_area">
                                    <input disabled type="color" id="wceazy_product_filter_pagination_btn_border_color"
                                        value="<?php echo esc_attr($wceazy_pf_pagination_btn_border_color); ?>">
                                    <label for="wceazy_product_filter_pagination_btn_border_color">
                                        <?php esc_html_e('Select Color', 'wceazy') ?>
                                    </label>
                                </div>
                                <small>
                                    <?php esc_html_e('Set border color of Previous Page and Next Page buttons.', 'wceazy') ?>
                                </small>
                            </div>
                        </div>


                        <div class="wceazy_product_filter_field_group wceazy_product_filter_pagination_btn_text_color">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Pagination Button Font Color', 'wceazy') ?>
                                <span style="color: #FF521D;">
                                    <?php esc_html_e('(Pro)', 'wceazy') ?>
                                </span>
                            </label>
                            <div class="field_with_msg_container">
                                <div class="color_picker_area">
                                    <input disabled type="color" id="wceazy_product_filter_pagination_btn_text_color"
                                        value="<?php echo esc_attr($wceazy_pf_pagination_btn_text_color); ?>">
                                    <label for="wceazy_product_filter_pagination_btn_text_color">
                                        <?php esc_html_e('Select Color', 'wceazy') ?>
                                    </label>
                                </div>
                                <small>
                                    <?php esc_html_e('Set text color of Previous Page and Next Page buttons.', 'wceazy') ?>
                                </small>
                            </div>
                        </div>


                        <div class="wceazy_product_filter_field_group wceazy_product_filter_loader_color">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Product Loader Color', 'wceazy') ?>
                                <span style="color: #FF521D;">
                                    <?php esc_html_e('(Pro)', 'wceazy') ?>
                                </span>
                            </label>
                            <div class="field_with_msg_container">
                                <div class="color_picker_area">
                                    <input disabled type="color" id="wceazy_product_filter_loader_color"
                                        value="<?php echo esc_attr($wceazy_pf_loader_color); ?>">
                                    <label for="wceazy_product_filter_loader_color">
                                        <?php esc_html_e('Select Color', 'wceazy') ?>
                                    </label>
                                </div>
                                <small>
                                    <?php esc_html_e('Set the color of product loader animation.', 'wceazy') ?>
                                </small>
                            </div>
                        </div>



                    </div>
                </div>

                <div class="coupon_tab_body" data-id="tab_search_filter">
                    <div class="tab_body_title">
                        <h1>
                            <?php esc_html_e('Search Filter Settings', 'wceazy') ?>
                        </h1>
                    </div>
                    <div class="tab_body_form">



                        <div class="wceazy_product_filter_field_group wceazy_product_filter_search_filter_label_text">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Label Text', 'wceazy') ?>
                            </label>
                            <div class="field_with_msg_container">
                                <input class="wceazy_product_filter_text_field" type="text" placeholder=""
                                    value="<?php echo esc_attr($wceazy_pf_search_filter_label_text); ?>">
                                <small>
                                    <?php esc_html_e('Set the Search Filter Label text.', 'wceazy') ?>
                                </small>
                            </div>
                        </div>

                        <div
                            class="wceazy_product_filter_field_group wceazy_product_filter_search_filter_placeholder_text">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Placeholder Text', 'wceazy') ?>
                            </label>
                            <div class="field_with_msg_container">
                                <input class="wceazy_product_filter_text_field" type="text" placeholder=""
                                    value="<?php echo esc_attr($wceazy_pf_search_filter_placeholder_text); ?>">
                                <small>
                                    <?php esc_html_e('Set the Search Field input placeholder text.', 'wceazy') ?>
                                </small>
                            </div>
                        </div>



                        <div class="wceazy_product_filter_field_group wceazy_product_filter_search_filter_label_color">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Label Font Color', 'wceazy') ?>
                                <span style="color: #FF521D;">
                                    <?php esc_html_e('(Pro)', 'wceazy') ?>
                                </span>
                            </label>
                            <div class="field_with_msg_container">
                                <div class="color_picker_area">
                                    <input disabled type="color" id="wceazy_product_filter_search_filter_label_color"
                                        value="<?php echo esc_attr($wceazy_pf_search_filter_label_color); ?>">
                                    <label for="wceazy_product_filter_search_filter_label_color">
                                        <?php esc_html_e('Select Color', 'wceazy') ?>
                                    </label>
                                </div>
                                <small>
                                    <?php esc_html_e('Set text color of label of the search filter.', 'wceazy') ?>
                                </small>
                            </div>
                        </div>


                        <div
                            class="wceazy_product_filter_field_group wceazy_product_filter_search_filter_input_border_color">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Input Field Border Color ', 'wceazy') ?><span style="color: #FF521D;">
                                    <?php esc_html_e('(Pro)', 'wceazy') ?>
                            </label>
                            <div class="field_with_msg_container">
                                <div class="color_picker_area">
                                    <input disabled type="color"
                                        id="wceazy_product_filter_search_filter_input_border_color"
                                        value="<?php echo esc_attr($wceazy_pf_search_filter_input_border_color); ?>">
                                    <label for="wceazy_product_filter_search_filter_input_border_color">
                                        <?php esc_html_e('Select Color', 'wceazy') ?>
                                    </label>
                                </div>
                                <small>
                                    <?php esc_html_e('Set border color of input field of the search filter.', 'wceazy') ?>
                                </small>
                            </div>
                        </div>


                        <div
                            class="wceazy_product_filter_field_group wceazy_product_filter_search_filter_input_bg_color">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Input Field Background Color', 'wceazy') ?>
                                <span style="color: #FF521D;">
                                    <?php esc_html_e('(Pro)', 'wceazy') ?>
                            </label>
                            <div class="field_with_msg_container">
                                <div class="color_picker_area">
                                    <input disabled type="color" id="wceazy_product_filter_search_filter_input_bg_color"
                                        value="<?php echo esc_attr($wceazy_pf_search_filter_input_bg_color); ?>">
                                    <label for="wceazy_product_filter_search_filter_input_bg_color">
                                        <?php esc_html_e('Select Color', 'wceazy') ?>
                                    </label>
                                </div>
                                <small>
                                    <?php esc_html_e('Set background color of input field of the search filter.', 'wceazy') ?>
                                </small>
                            </div>
                        </div>


                        <div
                            class="wceazy_product_filter_field_group wceazy_product_filter_search_filter_input_text_color">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Input Field Text Color', 'wceazy') ?>
                                <span style="color: #FF521D;">
                                    <?php esc_html_e('(Pro)', 'wceazy') ?>
                            </label>
                            <div class="field_with_msg_container">
                                <div class="color_picker_area">
                                    <input disabled type="color"
                                        id="wceazy_product_filter_search_filter_input_text_color"
                                        value="<?php echo esc_attr($wceazy_pf_search_filter_input_text_color); ?>">
                                    <label for="wceazy_product_filter_search_filter_input_text_color">
                                        <?php esc_html_e('Select Color', 'wceazy') ?>
                                    </label>
                                </div>
                                <small>
                                    <?php esc_html_e('Set text color of input field of the search filter.', 'wceazy') ?>
                                </small>
                            </div>
                        </div>


                    </div>
                </div>

                <div class="coupon_tab_body" data-id="tab_price_filter">
                    <div class="tab_body_title">
                        <h1>
                            <?php esc_html_e('Price Filter Settings', 'wceazy') ?>
                        </h1>
                    </div>
                    <div class="tab_body_form">



                        <div class="wceazy_product_filter_field_group wceazy_product_filter_price_filter_label_text">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Label Text', 'wceazy') ?>
                            </label>
                            <div class="field_with_msg_container">
                                <input class="wceazy_product_filter_text_field" type="text" placeholder=""
                                    value="<?php echo esc_attr($wceazy_pf_price_filter_label_text); ?>">
                                <small>
                                    <?php esc_html_e('Set the Price Filter Label text.', 'wceazy') ?>
                                </small>
                            </div>
                        </div>

                        <div
                            class="wceazy_product_filter_field_group wceazy_product_filter_price_filter_min_placeholder_text">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Min Placeholder Text', 'wceazy') ?>
                            </label>
                            <div class="field_with_msg_container">
                                <input class="wceazy_product_filter_text_field" type="text" placeholder=""
                                    value="<?php echo esc_attr($wceazy_pf_price_filter_min_placeholder_text); ?>">
                                <small>
                                    <?php esc_html_e('Set the Minimum Price Field input placeholder text.', 'wceazy') ?>
                                </small>
                            </div>
                        </div>


                        <div
                            class="wceazy_product_filter_field_group wceazy_product_filter_price_filter_max_placeholder_text">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Max Placeholder Text', 'wceazy') ?>
                            </label>
                            <div class="field_with_msg_container">
                                <input class="wceazy_product_filter_text_field" type="text" placeholder=""
                                    value="<?php echo esc_attr($wceazy_pf_price_filter_max_placeholder_text); ?>">
                                <small>
                                    <?php esc_html_e('Set the Maximum Price Field input placeholder text.', 'wceazy') ?>
                                </small>
                            </div>
                        </div>



                        <div class="wceazy_product_filter_field_group wceazy_product_filter_price_filter_label_color">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Label Font Color', 'wceazy') ?>
                                <span style="color: #FF521D;">
                                    <?php esc_html_e('(Pro)', 'wceazy') ?>
                            </label>
                            <div class="field_with_msg_container">
                                <div class="color_picker_area">
                                    <input disabled type="color" id="wceazy_product_filter_price_filter_label_color"
                                        value="<?php echo esc_attr($wceazy_pf_price_filter_label_color); ?>">
                                    <label for="wceazy_product_filter_price_filter_label_color">
                                        <?php esc_html_e('Select Color', 'wceazy') ?>
                                    </label>
                                </div>
                                <small>
                                    <?php esc_html_e('Set text color of label of the price filter.', 'wceazy') ?>
                                </small>
                            </div>
                        </div>


                        <div
                            class="wceazy_product_filter_field_group wceazy_product_filter_price_filter_input_border_color">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Input Field Border Color', 'wceazy') ?>
                                <span style="color: #FF521D;">
                                    <?php esc_html_e('(Pro)', 'wceazy') ?>
                            </label>
                            <div class="field_with_msg_container">
                                <div class="color_picker_area">
                                    <input disabled type="color"
                                        id="wceazy_product_filter_price_filter_input_border_color"
                                        value="<?php echo esc_attr($wceazy_pf_price_filter_input_border_color); ?>">
                                    <label for="wceazy_product_filter_price_filter_input_border_color">
                                        <?php esc_html_e('Select Color', 'wceazy') ?>
                                    </label>
                                </div>
                                <small>
                                    <?php esc_html_e('Set border color of input field of the price filter.', 'wceazy') ?>
                                </small>
                            </div>
                        </div>


                        <div
                            class="wceazy_product_filter_field_group wceazy_product_filter_price_filter_input_bg_color">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Input Field Background Color ', 'wceazy') ?><span
                                    style="color: #FF521D;">
                                    <?php esc_html_e('(Pro)', 'wceazy') ?>
                            </label>
                            <div class="field_with_msg_container">
                                <div class="color_picker_area">
                                    <input disabled type="color" id="wceazy_product_filter_price_filter_input_bg_color"
                                        value="<?php echo esc_attr($wceazy_pf_price_filter_input_bg_color); ?>">
                                    <label for="wceazy_product_filter_price_filter_input_bg_color">
                                        <?php esc_html_e('Select Color', 'wceazy') ?>
                                    </label>
                                </div>
                                <small>
                                    <?php esc_html_e('Set background color of input field of the price filter.', 'wceazy') ?>
                                </small>
                            </div>
                        </div>


                        <div
                            class="wceazy_product_filter_field_group wceazy_product_filter_price_filter_input_text_color">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Input Field Text Color ', 'wceazy') ?><span style="color: #FF521D;">
                                    <?php esc_html_e('(Pro)', 'wceazy') ?>
                            </label>
                            <div class="field_with_msg_container">
                                <div class="color_picker_area">
                                    <input disabled type="color"
                                        id="wceazy_product_filter_price_filter_input_text_color"
                                        value="<?php echo esc_attr($wceazy_pf_price_filter_input_text_color); ?>">
                                    <label for="wceazy_product_filter_price_filter_input_text_color">
                                        <?php esc_html_e('Select Color', 'wceazy') ?>
                                    </label>
                                </div>
                                <small>
                                    <?php esc_html_e('Set text color of input field of the price filter.', 'wceazy') ?>
                                </small>
                            </div>
                        </div>


                    </div>
                </div>

                <div class="coupon_tab_body" data-id="tab_rating_filter">
                    <div class="tab_body_title">
                        <h1>
                            <?php esc_html_e('Rating Filter Settings', 'wceazy') ?>
                        </h1>
                    </div>
                    <div class="tab_body_form">



                        <div class="wceazy_product_filter_field_group wceazy_product_filter_rating_filter_label_text">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Label Text', 'wceazy') ?>
                            </label>
                            <div class="field_with_msg_container">
                                <input class="wceazy_product_filter_text_field" type="text" placeholder=""
                                    value="<?php echo esc_attr($wceazy_pf_rating_filter_label_text); ?>">
                                <small>
                                    <?php esc_html_e('Set the Rating Filter Label text.', 'wceazy') ?>
                                </small>
                            </div>
                        </div>

                        <div class="wceazy_product_filter_field_group wceazy_product_filter_rating_filter_and_up_text">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('"And Up" Text', 'wceazy') ?>
                            </label>
                            <div class="field_with_msg_container">
                                <input class="wceazy_product_filter_text_field" type="text" placeholder=""
                                    value="<?php echo esc_attr($wceazy_pf_rating_filter_and_up_text); ?>">
                                <small>
                                    <?php esc_html_e('Set the "And Up" text shown beside ratings.', 'wceazy') ?>
                                </small>
                            </div>
                        </div>

                        <div class="wceazy_product_filter_field_group wceazy_product_filter_rating_filter_label_color">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Label Font Color ', 'wceazy') ?><span style="color: #FF521D;">
                                    <?php esc_html_e('(Pro)', 'wceazy') ?>
                            </label>
                            <div class="field_with_msg_container">
                                <div class="color_picker_area">
                                    <input disabled type="color" id="wceazy_product_filter_rating_filter_label_color"
                                        value="<?php echo esc_attr($wceazy_pf_rating_filter_label_color); ?>">
                                    <label for="wceazy_product_filter_rating_filter_label_color">
                                        <?php esc_html_e('Select Color', 'wceazy') ?>
                                    </label>
                                </div>
                                <small>
                                    <?php esc_html_e('Set text color of label of the rating filter.', 'wceazy') ?>
                                </small>
                            </div>
                        </div>


                        <div class="wceazy_product_filter_field_group wceazy_product_filter_rating_filter_and_up_color">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('"And Up" Font Color', 'wceazy') ?>
                                <span style="color: #FF521D;">
                                    <?php esc_html_e('(Pro)', 'wceazy') ?>
                            </label>
                            <div class="field_with_msg_container">
                                <div class="color_picker_area">
                                    <input disabled type="color" id="wceazy_product_filter_rating_filter_and_up_color"
                                        value="<?php echo esc_attr($wceazy_pf_rating_filter_and_up_color); ?>">
                                    <label for="wceazy_product_filter_rating_filter_and_up_color">
                                        <?php esc_html_e('Select Color', 'wceazy') ?>
                                    </label>
                                </div>
                                <small>
                                    <?php esc_html_e('Set text color of "And Up" text shown beside ratings.', 'wceazy') ?>
                                </small>
                            </div>
                        </div>


                        <div
                            class="wceazy_product_filter_field_group wceazy_product_filter_rating_filter_show_5_star_rating">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Show 5 Star Rating?', 'wceazy') ?>
                            </label>
                            <div class="field_with_msg_container">
                                <label class="toggle_switch"><input type="checkbox" <?php echo esc_attr($wceazy_pf_rating_filter_show_5_star_rating == "yes" ? "checked" : ""); ?>><span class="slider round"></span></label>
                                <small>
                                    <?php esc_html_e('Please turn off if you do not want to show the 5 star rating filter.', 'wceazy') ?>
                                </small>
                            </div>
                        </div>


                        <div
                            class="wceazy_product_filter_field_group wceazy_product_filter_rating_filter_show_4_star_rating">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Show 4 Star Rating?', 'wceazy') ?>
                            </label>
                            <div class="field_with_msg_container">
                                <label class="toggle_switch"><input type="checkbox" <?php echo esc_attr($wceazy_pf_rating_filter_show_4_star_rating == "yes" ? "checked" : ""); ?>><span class="slider round"></span></label>
                                <small>
                                    <?php esc_html_e('Please turn off if you do not want to show the 4 star rating filter.', 'wceazy') ?>
                                </small>
                            </div>
                        </div>


                        <div
                            class="wceazy_product_filter_field_group wceazy_product_filter_rating_filter_show_3_star_rating">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Show 3 Star Rating?', 'wceazy') ?>
                            </label>
                            <div class="field_with_msg_container">
                                <label class="toggle_switch"><input type="checkbox" <?php echo esc_attr($wceazy_pf_rating_filter_show_3_star_rating == "yes" ? "checked" : ""); ?>><span class="slider round"></span></label>
                                <small>
                                    <?php esc_html_e('Please turn off if you do not want to show the 3 star rating filter.', 'wceazy') ?>
                                </small>
                            </div>
                        </div>


                        <div
                            class="wceazy_product_filter_field_group wceazy_product_filter_rating_filter_show_2_star_rating">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Show 2 Star Rating?', 'wceazy') ?>
                            </label>
                            <div class="field_with_msg_container">
                                <label class="toggle_switch"><input type="checkbox" <?php echo esc_attr($wceazy_pf_rating_filter_show_2_star_rating == "yes" ? "checked" : ""); ?>><span class="slider round"></span></label>
                                <small>
                                    <?php esc_html_e('Please turn off if you do not want to show the 2 star rating filter.', 'wceazy') ?>
                                </small>
                            </div>
                        </div>


                        <div
                            class="wceazy_product_filter_field_group wceazy_product_filter_rating_filter_show_1_star_rating">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Show 1 Star Rating?', 'wceazy') ?>
                            </label>
                            <div class="field_with_msg_container">
                                <label class="toggle_switch"><input type="checkbox" <?php echo esc_attr($wceazy_pf_rating_filter_show_1_star_rating == "yes" ? "checked" : ""); ?>><span class="slider round"></span></label>
                                <small>
                                    <?php esc_html_e('Please turn off if you do not want to show the 1 star rating filter.', 'wceazy') ?>
                                </small>
                            </div>
                        </div>


                        <div
                            class="wceazy_product_filter_field_group wceazy_product_filter_rating_filter_show_0_star_rating">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Show 0 Star Rating?', 'wceazy') ?>
                            </label>
                            <div class="field_with_msg_container">
                                <label class="toggle_switch"><input type="checkbox" <?php echo esc_attr($wceazy_pf_rating_filter_show_0_star_rating == "yes" ? "checked" : ""); ?>><span class="slider round"></span></label>
                                <small>
                                    <?php esc_html_e('Please turn off if you do not want to show the 0 star rating filter.', 'wceazy') ?>
                                </small>
                            </div>
                        </div>


                    </div>
                </div>

                <div class="coupon_tab_body" data-id="tab_category_filter">
                    <div class="tab_body_title">
                        <h1>
                            <?php esc_html_e('Category Filter Settings', 'wceazy') ?>
                        </h1>
                    </div>
                    <div class="tab_body_form">


                        <div class="wceazy_product_filter_field_group wceazy_product_filter_category_filter_label_text">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Label Text', 'wceazy') ?>
                            </label>
                            <div class="field_with_msg_container">
                                <input class="wceazy_product_filter_text_field" type="text" placeholder=""
                                    value="<?php echo esc_attr($wceazy_pf_category_filter_label_text); ?>">
                                <small>
                                    <?php esc_html_e('Set the Category Filter Label text.', 'wceazy') ?>
                                </small>
                            </div>
                        </div>


                        <div
                            class="wceazy_product_filter_field_group wceazy_product_filter_category_filter_label_color">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Label Font Color ', 'wceazy') ?><span style="color: #FF521D;">
                                    <?php esc_html_e('(Pro)', 'wceazy') ?>
                            </label>
                            <div class="field_with_msg_container">
                                <div class="color_picker_area">
                                    <input disabled type="color" id="wceazy_product_filter_category_filter_label_color"
                                        value="<?php echo esc_attr($wceazy_pf_category_filter_label_color); ?>">
                                    <label for="wceazy_product_filter_category_filter_label_color">
                                        <?php esc_html_e('Select Color', 'wceazy') ?>
                                    </label>
                                </div>
                                <small>
                                    <?php esc_html_e('Set text color of label of the category filter.', 'wceazy') ?>
                                </small>
                            </div>
                        </div>


                        <div
                            class="wceazy_product_filter_field_group wceazy_product_filter_category_filter_category_color">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Category Font Color', 'wceazy') ?>
                                <span style="color: #FF521D;">
                                    <?php esc_html_e('(Pro)', 'wceazy') ?>
                            </label>
                            <div class="field_with_msg_container">
                                <div class="color_picker_area">
                                    <input disabled type="color"
                                        id="wceazy_product_filter_category_filter_category_color"
                                        value="<?php echo esc_attr($wceazy_pf_category_filter_category_color); ?>">
                                    <label for="wceazy_product_filter_category_filter_category_color">
                                        <?php esc_html_e('Select Color', 'wceazy') ?>
                                    </label>
                                </div>
                                <small>
                                    <?php esc_html_e('Set text color of category name.', 'wceazy') ?>
                                </small>
                            </div>
                        </div>


                        <div
                            class="wceazy_product_filter_field_group wceazy_product_filter_category_filter_checkbox_unchecked_bg">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Checkbox Unchecked Background Color ', 'wceazy') ?><span
                                    style="color: #FF521D;">
                                    <?php esc_html_e('(Pro)', 'wceazy') ?>
                            </label>
                            <div class="field_with_msg_container">
                                <div class="color_picker_area">
                                    <input disabled type="color"
                                        id="wceazy_product_filter_category_filter_checkbox_unchecked_bg"
                                        value="<?php echo esc_attr($wceazy_pf_category_filter_checkbox_unchecked_bg); ?>">
                                    <label for="wceazy_product_filter_category_filter_checkbox_unchecked_bg">
                                        <?php esc_html_e('Select Color', 'wceazy') ?>
                                    </label>
                                </div>
                                <small>
                                    <?php esc_html_e('Set the background color of checkbox on unchecked state.', 'wceazy') ?>
                                </small>
                            </div>
                        </div>


                        <div
                            class="wceazy_product_filter_field_group wceazy_product_filter_category_filter_checkbox_unchecked_border">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Checkbox Unchecked Border Color ', 'wceazy') ?><span
                                    style="color: #FF521D;">
                                    <?php esc_html_e('(Pro)', 'wceazy') ?>
                            </label>
                            <div class="field_with_msg_container">
                                <div class="color_picker_area">
                                    <input disabled type="color"
                                        id="wceazy_product_filter_category_filter_checkbox_unchecked_border"
                                        value="<?php echo esc_attr($wceazy_pf_category_filter_checkbox_unchecked_border); ?>">
                                    <label for="wceazy_product_filter_category_filter_checkbox_unchecked_border">
                                        <?php esc_html_e('Select Color', 'wceazy') ?>
                                    </label>
                                </div>
                                <small>
                                    <?php esc_html_e('Set the border color of checkbox on unchecked state.', 'wceazy') ?>
                                </small>
                            </div>
                        </div>


                        <div
                            class="wceazy_product_filter_field_group wceazy_product_filter_category_filter_checkbox_checked_bg">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Checkbox Checked Background Color', 'wceazy') ?>
                                <span style="color: #FF521D;">
                                    <?php esc_html_e('(Pro)', 'wceazy') ?>
                            </label>
                            <div class="field_with_msg_container">
                                <div class="color_picker_area">
                                    <input disabled type="color"
                                        id="wceazy_product_filter_category_filter_checkbox_checked_bg"
                                        value="<?php echo esc_attr($wceazy_pf_category_filter_checkbox_checked_bg); ?>">
                                    <label for="wceazy_product_filter_category_filter_checkbox_checked_bg">
                                        <?php esc_html_e('Select Color', 'wceazy') ?>
                                    </label>
                                </div>
                                <small>
                                    <?php esc_html_e('Set the background color of checkbox on checked state.', 'wceazy') ?>
                                </small>
                            </div>
                        </div>


                    </div>
                </div>

                <div class="coupon_tab_body" data-id="tab_stock_filter">
                    <div class="tab_body_title">
                        <h1>
                            <?php esc_html_e('Stock Filter Settings', 'wceazy') ?>
                        </h1>
                    </div>
                    <div class="tab_body_form">


                        <div class="wceazy_product_filter_field_group wceazy_product_filter_stock_filter_label_text">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Label Text', 'wceazy') ?>
                            </label>
                            <div class="field_with_msg_container">
                                <input class="wceazy_product_filter_text_field" type="text" placeholder=""
                                    value="<?php echo esc_attr($wceazy_pf_stock_filter_label_text); ?>">
                                <small>
                                    <?php esc_html_e('Set the Stock Filter Label text.', 'wceazy') ?>
                                </small>
                            </div>
                        </div>


                        <div class="wceazy_product_filter_field_group wceazy_product_filter_stock_filter_in_stock_text">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('"In Stock" Text', 'wceazy') ?>
                            </label>
                            <div class="field_with_msg_container">
                                <input class="wceazy_product_filter_text_field" type="text" placeholder=""
                                    value="<?php echo esc_attr($wceazy_pf_stock_filter_in_stock_text); ?>">
                                <small>
                                    <?php esc_html_e('Set the "In Stock" option text.', 'wceazy') ?>
                                </small>
                            </div>
                        </div>

                        <div
                            class="wceazy_product_filter_field_group wceazy_product_filter_stock_filter_out_stock_text">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('"Out of Stock" Text', 'wceazy') ?>
                            </label>
                            <div class="field_with_msg_container">
                                <input class="wceazy_product_filter_text_field" type="text" placeholder=""
                                    value="<?php echo esc_attr($wceazy_pf_stock_filter_out_stock_text); ?>">
                                <small>
                                    <?php esc_html_e('Set the "Out of Stock" option text.', 'wceazy') ?>
                                </small>
                            </div>
                        </div>


                        <div class="wceazy_product_filter_field_group wceazy_product_filter_stock_filter_label_color">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Label Font Color ', 'wceazy') ?><span style="color: #FF521D;">
                                    <?php esc_html_e('(Pro)', 'wceazy') ?>
                            </label>
                            <div class="field_with_msg_container">
                                <div class="color_picker_area">
                                    <input disabled type="color" id="wceazy_product_filter_stock_filter_label_color"
                                        value="<?php echo esc_attr($wceazy_pf_stock_filter_label_color); ?>">
                                    <label for="wceazy_product_filter_stock_filter_label_color">
                                        <?php esc_html_e('Select Color', 'wceazy') ?>
                                    </label>
                                </div>
                                <small>
                                    <?php esc_html_e('Set text color of label of the stock filter.', 'wceazy') ?>
                                </small>
                            </div>
                        </div>


                        <div class="wceazy_product_filter_field_group wceazy_product_filter_stock_filter_stock_color">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Stock Status Font Color ', 'wceazy') ?><span style="color: #FF521D;">
                                    <?php esc_html_e('(Pro)', 'wceazy') ?>
                            </label>
                            <div class="field_with_msg_container">
                                <div class="color_picker_area">
                                    <input disabled type="color" id="wceazy_product_filter_stock_filter_stock_color"
                                        value="<?php echo esc_attr($wceazy_pf_stock_filter_stock_color); ?>">
                                    <label for="wceazy_product_filter_stock_filter_stock_color">
                                        <?php esc_html_e('Select Color', 'wceazy') ?>
                                    </label>
                                </div>
                                <small>
                                    <?php esc_html_e('Set text color of stock status name.', 'wceazy') ?>
                                </small>
                            </div>
                        </div>


                        <div
                            class="wceazy_product_filter_field_group wceazy_product_filter_stock_filter_checkbox_unchecked_bg">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Checkbox Unchecked Background Color', 'wceazy') ?>
                                <span style="color: #FF521D;">
                                    <?php esc_html_e('(Pro)', 'wceazy') ?>
                            </label>
                            <div class="field_with_msg_container">
                                <div class="color_picker_area">
                                    <input disabled type="color"
                                        id="wceazy_product_filter_stock_filter_checkbox_unchecked_bg"
                                        value="<?php echo esc_attr($wceazy_pf_stock_filter_checkbox_unchecked_bg); ?>">
                                    <label for="wceazy_product_filter_stock_filter_checkbox_unchecked_bg">
                                        <?php esc_html_e('Select Color', 'wceazy') ?>
                                    </label>
                                </div>
                                <small>
                                    <?php esc_html_e('Set the background color of checkbox on unchecked state.', 'wceazy') ?>
                                </small>
                            </div>
                        </div>


                        <div
                            class="wceazy_product_filter_field_group wceazy_product_filter_stock_filter_checkbox_unchecked_border">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Checkbox Unchecked Border Color', 'wceazy') ?>
                                <span style="color: #FF521D;">
                                    <?php esc_html_e('(Pro)', 'wceazy') ?>
                            </label>
                            <div class="field_with_msg_container">
                                <div class="color_picker_area">
                                    <input disabled type="color"
                                        id="wceazy_product_filter_stock_filter_checkbox_unchecked_border"
                                        value="<?php echo esc_attr($wceazy_pf_stock_filter_checkbox_unchecked_border); ?>">
                                    <label for="wceazy_product_filter_stock_filter_checkbox_unchecked_border">
                                        <?php esc_html_e('Select Color', 'wceazy') ?>
                                    </label>
                                </div>
                                <small>
                                    <?php esc_html_e('Set the border color of checkbox on unchecked state.', 'wceazy') ?>
                                </small>
                            </div>
                        </div>


                        <div
                            class="wceazy_product_filter_field_group wceazy_product_filter_stock_filter_checkbox_checked_bg">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Checkbox Checked Background Color', 'wceazy') ?>
                                <span style="color: #FF521D;">
                                    <?php esc_html_e('(Pro)', 'wceazy') ?>
                            </label>
                            <div class="field_with_msg_container">
                                <div class="color_picker_area">
                                    <input disabled type="color"
                                        id="wceazy_product_filter_stock_filter_checkbox_checked_bg"
                                        value="<?php echo esc_attr($wceazy_pf_stock_filter_checkbox_checked_bg); ?>">
                                    <label for="wceazy_product_filter_stock_filter_checkbox_checked_bg">
                                        <?php esc_html_e('Select Color', 'wceazy') ?>
                                    </label>
                                </div>
                                <small>
                                    <?php esc_html_e('Set the background color of checkbox on checked state.', 'wceazy') ?>
                                </small>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>

        <div class="wceazy_product_filter_bottom_button_section">
            <button onclick="wceazy_product_filter_save();">
                <?php esc_html_e('Save Settings', 'wceazy') ?>
            </button>
        </div>
    </div>

</div>