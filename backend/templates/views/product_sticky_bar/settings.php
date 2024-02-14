<?php

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
$wceazy_psb_disabled_products = isset($wceazy_psb_settings["disabled_products"]) ? explode(",", $wceazy_psb_settings["disabled_products"]) : array();
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

?>



<div id="wceazy_product_sticky_bar">


    <div class="wceazy_product_sticky_bar_header">
        <div class="wceazy_header_part_left">
            <p><?php esc_html_e('wcEazy', 'wceazy') ?> <span><?php echo esc_attr(WCEAZY_VERSION); ?></span></p>
        </div>
        <div class="wceazy_header_part_right">
            <a class="wceazy_get_pro" target="_blank"
                href="<?php echo WCEAZY_GET_PRO_URL; ?>"><?php esc_html_e('GET PRO', 'wceazy') ?></a>
        </div>
    </div>



    <div class="wceazy_product_sticky_bar_page_title">
        <div class="page_title_part_left">
            <h2><?php esc_html_e('Product Sticky Bar', 'wceazy') ?></h2>
            <a target="_blank" href="<?php echo WCEAZY_DOCS_PAGE; ?>"><?php esc_html_e('Documentation', 'wceazy') ?></a>
        </div>
        <div class="page_title_part_right">
            <button class="wceazy_product_sticky_bar_back_to_dashboard_btn"
                onclick="wceazy_modules_page_init(`<?php echo esc_url(WCEAZY_URL); ?>`)"><?php esc_html_e('Back to all Modules', 'wceazy') ?></button>
        </div>
    </div>



    <div class="wceazy_product_sticky_bar_container">


        <div class="wceazy_product_sticky_bar_tab">
            <div class="wceazy_product_sticky_bar_tab_part_left">
                <div class="coupon_data_tabs">
                    <div class="tab_item tab_item_active" data-target="tab_settings">
                        <h1><?php esc_html_e('Settings', 'wceazy') ?></h1>
                    </div>
                    <div class="tab_item" data-target="tab_style">
                        <h1><?php esc_html_e('Style', 'wceazy') ?></h1>
                    </div>
                </div>
            </div>

            <div class="wceazy_product_sticky_bar_tab_part_right">
                <div class="coupon_tab_body" data-id="tab_settings">
                    <div class="tab_body_title">
                        <h1><?php esc_html_e('Settings', 'wceazy'); ?></h1>
                    </div>
                    <div class="tab_body_form">


                        <div class="wceazy_product_sticky_bar_field_group wceazy_product_sticky_bar_is_enable">
                            <label
                                for="coupon_generator_coupon_amount"><?php esc_html_e('Enable Sticky Bar', 'wceazy') ?></label>
                            <div class="field_with_msg_container">
                                <label class="toggle_switch"><input type="checkbox"
                                        <?php echo esc_attr($wceazy_psb_is_enable == "yes" ? "checked" : ""); ?>><span
                                        class="slider round"></span></label>
                                <small><?php esc_html_e('Turn On/Off the product sticky bar.', 'wceazy') ?></small>
                            </div>
                        </div>

                        <div class="wceazy_product_sticky_bar_field_group wceazy_product_sticky_bar_show_on_desktop">
                            <label
                                for="coupon_generator_coupon_amount"><?php esc_html_e('Show on Desktop', 'wceazy') ?></label>
                            <div class="field_with_msg_container">
                                <label class="toggle_switch"><input type="checkbox"
                                        <?php echo esc_attr($wceazy_psb_show_on_desktop == "yes" ? "checked" : ""); ?>><span
                                        class="slider round"></span></label>
                                <small>
                                    <?php esc_html_e('Show/Hide sticky bar on Desktop', 'wceazy') ?>
                                </small>

                            </div>
                        </div>

                        <div class="wceazy_product_sticky_bar_field_group wceazy_product_sticky_bar_show_on_mobile">
                            <label
                                for="coupon_generator_coupon_amount"><?php esc_html_e('Show on Mobile', 'wceazy'); ?></label>
                            <div class="field_with_msg_container">
                                <label class="toggle_switch">
                                    <input type="checkbox"
                                        <?php echo esc_attr($wceazy_psb_show_on_mobile == "yes" ? "checked" : ""); ?>>
                                    <span class="slider round"></span>
                                </label>
                                <small><?php esc_html_e('Toggle off if you don/t want the sticky bar on mobile.', 'wceazy'); ?></small>
                            </div>
                        </div>

                        <div class="wceazy_product_sticky_bar_field_group wceazy_product_sticky_bar_show_in">
                            <label
                                for="coupon_generator_coupon_amount"><?php esc_html_e('Sticky Bar Position', 'wceazy'); ?></label>
                            <div class="field_with_msg_container">
                                <select class="wceazy_product_sticky_bar_select_field">
                                    <option value=""><?php esc_html_e('Please select', 'wceazy'); ?></option>
                                    <option value="top"
                                        <?php echo esc_attr($wceazy_psb_show_in == "top" ? "selected" : ""); ?>>
                                        <?php esc_html_e('Top', 'wceazy'); ?></option>
                                    <option value="bottom"
                                        <?php echo esc_attr($wceazy_psb_show_in == "bottom" ? "selected" : ""); ?>>
                                        <?php esc_html_e('Bottom', 'wceazy'); ?></option>
                                </select>
                            </div>
                        </div>

                        <div class="wceazy_product_sticky_bar_field_group wceazy_product_sticky_bar_show_only_scroll">
                            <label
                                for="coupon_generator_coupon_amount"><?php esc_html_e('Show Only After Scroll', 'wceazy'); ?></label>
                            <div class="field_with_msg_container">
                                <label class="toggle_switch">
                                    <input type="checkbox"
                                        <?php echo esc_attr($wceazy_psb_show_only_scroll == "yes" ? "checked" : ""); ?>>
                                    <span class="slider round"></span>
                                </label>
                                <small><?php esc_html_e('Show sticky bar only when user scrolls down in product page', 'wceazy'); ?></small>
                            </div>
                        </div>

                        <div class="wceazy_product_sticky_bar_field_group wceazy_product_sticky_bar_scroll_pixels">
                            <label
                                for="coupon_generator_coupon_amount"><?php esc_html_e('Scroll Pixels', 'wceazy'); ?></label>
                            <div class="field_with_msg_container">
                                <input class="wceazy_product_sticky_bar_text_field" type="number" placeholder="180"
                                    value="<?php echo esc_attr($wceazy_psb_scroll_pixels); ?>">
                                <small><?php esc_html_e('Display a bar on the product page when the user scrolls a certain distance. It only activates if the "Scroll Pixels" option is turned on, with a default setting of 180 pixels.', 'wceazy'); ?></small>
                            </div>
                        </div>

                        <div class="wceazy_product_sticky_bar_field_group wceazy_product_sticky_bar_product_review">
                            <label
                                for="coupon_generator_coupon_amount"><?php esc_html_e('Show Product Review', 'wceazy'); ?></label>
                            <div class="field_with_msg_container">
                                <label class="toggle_switch">
                                    <input type="checkbox"
                                        <?php echo esc_attr($wceazy_psb_product_review == "yes" ? "checked" : ""); ?>>
                                    <span class="slider round"></span>
                                </label>
                                <small><?php esc_html_e('Show/Hide sticky bar on mobile', 'wceazy'); ?></small>
                            </div>
                        </div>

                        <div
                            class="wceazy_product_sticky_bar_field_group wceazy_product_sticky_bar_product_review_count">
                            <label
                                for="coupon_generator_coupon_amount"><?php esc_html_e('Show Product Review Count', 'wceazy'); ?></label>
                            <div class="field_with_msg_container">
                                <label class="toggle_switch">
                                    <input type="checkbox"
                                        <?php echo esc_attr($wceazy_psb_product_review_count == "yes" ? "checked" : ""); ?>>
                                    <span class="slider round"></span>
                                </label>
                                <small><?php esc_html_e('Show/Hide the product review count on the sticky bar.', 'wceazy'); ?></small>
                            </div>
                        </div>

                        <!-- <p style="font-size: 13px;"><?php esc_html_e('Total', 'wceazy'); ?></p> -->



                        <div class="wceazy_product_sticky_bar_field_group wceazy_product_sticky_bar_disabled_products">
                            <label
                                for="coupon_generator_coupon_amount"><?php esc_html_e('Turn off Products', 'wceazy'); ?>
                                <span style="color: #FF521D;"><?php esc_html_e('(Pro)', 'wceazy'); ?></span></label>
                            <div class="field_with_msg_container">
                                <select class="wceazy_product_sticky_bar_select_field" multiple="multiple" disabled>
                                    <option value=""><?php esc_html_e('Please select', 'wceazy'); ?></option>
                                    <?php foreach ($this->product_sticky_bar->utils->getWooProducts() as $product) { ?>
                                    <option value="<?php echo esc_attr($product["id"]); ?>"
                                        <?php echo esc_attr(in_array($product["id"], $wceazy_psb_disabled_products) ? "selected" : ""); ?>>
                                        <?php echo esc_html($product["text"]); ?>
                                    </option>
                                    <?php } ?>
                                </select>
                                <small><?php esc_html_e('Select the products where you do not want to show the sticky bar', 'wceazy'); ?></small>
                            </div>
                        </div>

                        <div class="wceazy_product_sticky_bar_field_group wceazy_product_sticky_bar_enable_qty_input">
                            <label
                                for="coupon_generator_coupon_amount"><?php esc_html_e('Enable Update Product Qty', 'wceazy'); ?></label>
                            <div class="field_with_msg_container">
                                <label class="toggle_switch"><input type="checkbox"
                                        <?php echo esc_attr($wceazy_psb_enable_qty_input == "yes" ? "checked" : ""); ?>><span
                                        class="slider round"></span></label>
                                <small><?php esc_html_e('Show/Hide the product quantity update option on the sticky bar.', 'wceazy'); ?></small>
                            </div>
                        </div>

                        <div
                            class="wceazy_product_sticky_bar_field_group wceazy_product_sticky_bar_enable_variable_product">
                            <label
                                for="coupon_generator_coupon_amount"><?php esc_html_e('Enable Variable Product', 'wceazy'); ?></label>
                            <div class="field_with_msg_container">
                                <label class="toggle_switch"><input type="checkbox"
                                        <?php echo esc_attr($wceazy_psb_enable_variable_product == "yes" ? "checked" : ""); ?>><span
                                        class="slider round"></span></label>
                                <small><?php esc_html_e('Show/Hide the variable product selection option on the sticky bar', 'wceazy'); ?></small>
                            </div>
                        </div>

                        <div class="wceazy_product_sticky_bar_field_group wceazy_product_sticky_bar_show_product_image">
                            <label
                                for="coupon_generator_coupon_amount"><?php esc_html_e('Show Product Image', 'wceazy'); ?></label>
                            <div class="field_with_msg_container">
                                <label class="toggle_switch"><input type="checkbox"
                                        <?php echo esc_attr($wceazy_psb_show_product_image == "yes" ? "checked" : ""); ?>><span
                                        class="slider round"></span></label>
                                <small><?php esc_html_e('Show/Hide the product image on the sticky bar.', 'wceazy'); ?></small>
                            </div>
                        </div>

                        <div class="wceazy_product_sticky_bar_field_group wceazy_product_sticky_bar_show_stock">
                            <label
                                for="coupon_generator_coupon_amount"><?php esc_html_e('Show Stock Status', 'wceazy'); ?></label>
                            <div class="field_with_msg_container">
                                <label class="toggle_switch"><input type="checkbox"
                                        <?php echo esc_attr($wceazy_psb_show_stock == "yes" ? "checked" : ""); ?>><span
                                        class="slider round"></span></label>
                                <small><?php esc_html_e('Please turn off if you don\'t want to show stock quantity on sticky bar', 'wceazy'); ?></small>
                            </div>
                        </div>

                        <div class="wceazy_product_sticky_bar_field_group wceazy_product_sticky_bar_hidebar_outofstock">
                            <label
                                for="coupon_generator_coupon_amount"><?php esc_html_e('Hide Sticky bar (Product Out of Stock)', 'wceazy'); ?></label>
                            <div class="field_with_msg_container">
                                <label class="toggle_switch"><input type="checkbox"
                                        <?php echo esc_attr($wceazy_psb_hidebar_outofstock == "yes" ? "checked" : ""); ?>><span
                                        class="slider round"></span></label>
                                <small>
                                    <?php esc_html_e('Turn off the sticky bar for out-of-stock products.', 'wceazy'); ?></small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="coupon_tab_body" data-id="tab_style">
                    <div class="tab_body_title">
                        <h1><?php esc_html_e('Bar Style', 'wceazy'); ?></h1>
                    </div>
                    <div class="tab_body_form">

                        <div class="wceazy_product_sticky_bar_field_group wceazy_product_sticky_bar_height">
                            <label for="coupon_generator_coupon_amount"><?php esc_html_e('Height', 'wceazy'); ?></label>
                            <div class="field_with_msg_container">
                                <input class="wceazy_product_sticky_bar_text_field" type="number" placeholder="100"
                                    value="<?php echo esc_attr($wceazy_psb_height); ?>">
                                <small><?php esc_html_e('Set sticky bar height in pixel(Ex.150) - Default 100px.', 'wceazy'); ?></small>
                            </div>
                        </div>

                        <div
                            class="wceazy_product_sticky_bar_field_group wceazy_product_sticky_bar_product_image_shape">
                            <label
                                for="coupon_generator_coupon_amount"><?php esc_html_e('Product Image Shape', 'wceazy'); ?></label>
                            <div class="field_with_msg_container">
                                <select class="wceazy_product_sticky_bar_select_field">
                                    <option value=""> Please select</option>
                                    <option value="round"
                                        <?php echo esc_attr($wceazy_psb_product_image_shape == "round" ? "selected" : ""); ?>>
                                        <?php esc_html_e('Round', 'wceazy'); ?></option>
                                    <option value="square"
                                        <?php echo esc_attr($wceazy_psb_product_image_shape == "square" ? "selected" : ""); ?>>
                                        <?php esc_html_e('Square', 'wceazy'); ?></option>
                                </select>
                                <small><?php esc_html_e('Show product image shape (Default: Square)', 'wceazy'); ?></small>
                            </div>
                        </div>


                        <div
                            class="wceazy_product_sticky_bar_field_group wceazy_product_sticky_bar_product_title_color">
                            <label
                                for="coupon_generator_coupon_amount"><?php esc_html_e('Product Title Color ', 'wceazy'); ?><span
                                    style="color: #FF521D;"><?php esc_html_e('(Pro)', 'wceazy'); ?></span></label>
                            <div class="field_with_msg_container">
                                <div class="color_picker_area">
                                    <input disabled type="color" id="wceazy_product_sticky_bar_product_title_color"
                                        value="<?php echo esc_attr($wceazy_psb_product_title_color); ?>">
                                    <label
                                        for="wceazy_product_sticky_bar_product_title_color"><?php esc_html_e('Select Color', 'wceazy'); ?></label>
                                </div>
                            </div>
                        </div>


                        <div
                            class="wceazy_product_sticky_bar_field_group wceazy_product_sticky_bar_product_rating_color">
                            <label
                                for="coupon_generator_coupon_amount"><?php esc_html_e('Product Rating Color ', 'wceazy'); ?><span
                                    style="color: #FF521D;"><?php esc_html_e('(Pro)', 'wceazy'); ?></span></label>
                            <div class="field_with_msg_container">
                                <div class="color_picker_area">
                                    <input disabled type="color" id="wceazy_product_sticky_bar_product_rating_color"
                                        value="<?php echo esc_attr($wceazy_psb_product_rating_color); ?>">
                                    <label
                                        for="wceazy_product_sticky_bar_product_rating_color"><?php esc_html_e('Select Color', 'wceazy'); ?></label>
                                </div>
                            </div>
                        </div>


                        <div
                            class="wceazy_product_sticky_bar_field_group wceazy_product_sticky_bar_product_rating_count_color">
                            <label
                                for="coupon_generator_coupon_amount"><?php esc_html_e('Product Rating Count Color', 'wceazy'); ?>
                                <span style="color: #FF521D;"><?php esc_html_e('(Pro)', 'wceazy'); ?></span></label>
                            <div class="field_with_msg_container">
                                <div class="color_picker_area">
                                    <input disabled type="color"
                                        id="wceazy_product_sticky_bar_product_rating_count_color"
                                        value="<?php echo esc_attr($wceazy_psb_product_rating_count_color); ?>">
                                    <label
                                        for="wceazy_product_sticky_bar_product_rating_count_color"><?php esc_html_e('Select Color', 'wceazy'); ?></label>
                                </div>
                            </div>
                        </div>


                        <div
                            class="wceazy_product_sticky_bar_field_group wceazy_product_sticky_bar_product_price_color">
                            <label
                                for="coupon_generator_coupon_amount"><?php esc_html_e('Product Price Color', 'wceazy'); ?>
                                <span style="color: #FF521D;"><?php esc_html_e('(Pro)', 'wceazy'); ?></span></label>
                            <div class="field_with_msg_container">
                                <div class="color_picker_area">
                                    <input disabled type="color" id="wceazy_product_sticky_bar_product_price_color"
                                        value="<?php echo esc_attr($wceazy_psb_product_price_color); ?>">
                                    <label
                                        for="wceazy_product_sticky_bar_product_price_color"><?php esc_html_e('Select Color', 'wceazy'); ?><?php esc_html_e('', 'wceazy'); ?></label>
                                </div>
                            </div>
                        </div>


                        <div
                            class="wceazy_product_sticky_bar_field_group wceazy_product_sticky_bar_product_price_font_size">
                            <label
                                for="coupon_generator_coupon_amount"><?php esc_html_e('Product Price Font Size', 'wceazy'); ?><?php esc_html_e('', 'wceazy'); ?></label>
                            <div class="field_with_msg_container">
                                <input class="wceazy_product_sticky_bar_text_field" type="number" placeholder="17"
                                    value="<?php echo esc_attr($wceazy_psb_product_price_font_size); ?>">
                                <small><?php esc_html_e('Set sticky bar product price font size (Ex. 17)', 'wceazy'); ?></small>
                            </div>
                        </div>


                        <div class="wceazy_product_sticky_bar_field_group wceazy_product_sticky_bar_btn_bg_color">
                            <label
                                for="coupon_generator_coupon_amount"><?php esc_html_e('Button Background Color', 'wceazy'); ?>
                                <span style="color: #FF521D;"><?php esc_html_e('(Pro)', 'wceazy'); ?></span></label>
                            <div class="field_with_msg_container">
                                <div class="color_picker_area">
                                    <input disabled type="color" id="wceazy_product_sticky_bar_btn_bg_color"
                                        value="<?php echo esc_attr($wceazy_psb_btn_bg_color); ?>">
                                    <label
                                        for="wceazy_product_sticky_bar_btn_bg_color"><?php esc_html_e('Select Color', 'wceazy'); ?><?php esc_html_e('', 'wceazy'); ?></label>
                                </div>
                            </div>
                        </div>


                        <div class="wceazy_product_sticky_bar_field_group wceazy_product_sticky_bar_btn_font_color">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Button Font Color', 'wceazy'); ?>
                                <span style="color: #FF521D;"><?php esc_html_e('(Pro)', 'wceazy'); ?></span>
                            </label>
                            <div class="field_with_msg_container">
                                <div class="color_picker_area">
                                    <input disabled type="color" id="wceazy_product_sticky_bar_btn_font_color"
                                        value="<?php echo esc_attr($wceazy_psb_btn_font_color); ?>">
                                    <label
                                        for="wceazy_product_sticky_bar_btn_font_color"><?php esc_html_e('Select Color', 'wceazy'); ?></label>
                                </div>
                            </div>
                        </div>

                        <div class="wceazy_product_sticky_bar_field_group wceazy_product_sticky_bar_btn_font_size">
                            <label
                                for="coupon_generator_coupon_amount"><?php esc_html_e('Button Font Size', 'wceazy'); ?></label>
                            <div class="field_with_msg_container">
                                <input class="wceazy_product_sticky_bar_text_field" type="number" placeholder="14"
                                    value="<?php echo esc_attr($wceazy_psb_btn_font_size); ?>">
                                <small><?php esc_html_e('Set sticky bar add to cart button font size (Ex. 14)', 'wceazy'); ?></small>
                            </div>
                        </div>


                        <div class="wceazy_product_sticky_bar_field_group wceazy_product_sticky_bar_btn_border_color">
                            <label
                                for="coupon_generator_coupon_amount"><?php esc_html_e('Button Border Color', 'wceazy'); ?>
                                <span style="color: #FF521D;"><?php esc_html_e('(Pro)', 'wceazy'); ?></span></label>
                            <div class="field_with_msg_container">
                                <div class="color_picker_area">
                                    <input disabled type="color" id="wceazy_product_sticky_bar_btn_border_color"
                                        value="<?php echo esc_attr($wceazy_psb_btn_border_color); ?>">
                                    <label
                                        for="wceazy_product_sticky_bar_btn_border_color"><?php esc_html_e('Select Color', 'wceazy'); ?></label>
                                </div>
                            </div>
                        </div>


                        <div class="wceazy_product_sticky_bar_field_group wceazy_product_sticky_bar_btn_border_width">
                            <label
                                for="coupon_generator_coupon_amount"><?php esc_html_e('Button Border Width', 'wceazy'); ?></label>
                            <div class="field_with_msg_container">
                                <input class="wceazy_product_sticky_bar_text_field" type="number" placeholder="1"
                                    value="<?php echo esc_attr($wceazy_psb_btn_border_width); ?>">
                                <small><?php esc_html_e('Set sticky bar add to cart button border width (Ex. 1)', 'wceazy'); ?></small>
                            </div>
                        </div>


                        <div class="wceazy_product_sticky_bar_field_group wceazy_product_sticky_bar_btn_bg_hover_color">
                            <label
                                for="coupon_generator_coupon_amount"><?php esc_html_e('Button Background Hover Color ', 'wceazy'); ?><span
                                    style="color: #FF521D;"><?php esc_html_e('(Pro)', 'wceazy'); ?></span></label>
                            <div class="field_with_msg_container">
                                <div class="color_picker_area">
                                    <input disabled type="color" id="wceazy_product_sticky_bar_btn_bg_hover_color"
                                        value="<?php echo esc_attr($wceazy_psb_btn_bg_hover_color); ?>">
                                    <label
                                        for="wceazy_product_sticky_bar_btn_bg_hover_color"><?php esc_html_e('Select Color', 'wceazy'); ?></label>
                                </div>
                            </div>
                        </div>


                        <div
                            class="wceazy_product_sticky_bar_field_group wceazy_product_sticky_bar_btn_border_hover_color">
                            <label
                                for="coupon_generator_coupon_amount"><?php esc_html_e('Button Border Hover Color', 'wceazy'); ?>
                                <span style="color: #FF521D;"><?php esc_html_e('(Pro)', 'wceazy'); ?></span></label>
                            <div class="field_with_msg_container">
                                <div class="color_picker_area">
                                    <input disabled type="color" id="wceazy_product_sticky_bar_btn_border_hover_color"
                                        value="<?php echo esc_attr($wceazy_psb_btn_border_hover_color); ?>">
                                    <label
                                        for="wceazy_product_sticky_bar_btn_border_hover_color"><?php esc_html_e('Select Color', 'wceazy'); ?></label>
                                </div>
                            </div>
                        </div>



                        <div
                            class="wceazy_product_sticky_bar_field_group wceazy_product_sticky_bar_btn_font_hover_color">
                            <label
                                for="coupon_generator_coupon_amount"><?php esc_html_e('Button Hover Font Color', 'wceazy'); ?>
                                <span style="color: #FF521D;"><?php esc_html_e('(Pro)', 'wceazy'); ?></span></label>
                            <div class="field_with_msg_container">
                                <div class="color_picker_area">
                                    <input disabled type="color" id="wceazy_product_sticky_bar_btn_font_hover_color"
                                        value="<?php echo esc_attr($wceazy_psb_btn_font_hover_color); ?>">
                                    <label
                                        for="wceazy_product_sticky_bar_btn_font_hover_color"><?php esc_html_e('Select Color', 'wceazy'); ?></label>
                                </div>
                            </div>
                        </div>


                        <div
                            class="wceazy_product_sticky_bar_field_group wceazy_product_sticky_bar_btn_padding_left_right">
                            <label
                                for="coupon_generator_coupon_amount"><?php esc_html_e('Button Padding Left-Right ', 'wceazy'); ?>
                                <span style="color: #FF521D;"><?php esc_html_e('(Pro)', 'wceazy'); ?></span></label>
                            <div class="field_with_msg_container">
                                <input disabled class="wceazy_product_sticky_bar_text_field" type="number"
                                    placeholder="30"
                                    value="<?php echo esc_attr($wceazy_psb_btn_padding_left_right); ?>">
                                <small><?php esc_html_e('Adjust space around the add to cart button in the sticky bar (Default: 30).', 'wceazy'); ?></small>
                            </div>
                        </div>


                        <div
                            class="wceazy_product_sticky_bar_field_group wceazy_product_sticky_bar_btn_padding_top_bottom">
                            <label
                                for="coupon_generator_coupon_amount"><?php esc_html_e('Button Padding Top-Bottom', 'wceazy'); ?>
                                <span style="color: #FF521D;"><?php esc_html_e('(Pro)', 'wceazy'); ?></span></label>
                            <div class="field_with_msg_container">
                                <input disabled class="wceazy_product_sticky_bar_text_field" type="number"
                                    placeholder="10"
                                    value="<?php echo esc_attr($wceazy_psb_btn_padding_top_bottom); ?>">
                                <small><?php esc_html_e('Set sticky bar add to cart button top-bottom padding (Default: 10)', 'wceazy'); ?></small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="wceazy_product_sticky_bar_bottom_button_section">
            <button onclick="wceazy_product_sticky_bar_save();"><?php esc_html_e('Save Settings', 'wceazy'); ?></button>
        </div>



    </div>

</div>