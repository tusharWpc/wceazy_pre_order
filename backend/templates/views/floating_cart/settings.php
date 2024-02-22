<?php

$wceazy_floating_cart_settings = get_option('wceazy_floating_cart_settings', False);
$wceazy_fc_settings = $wceazy_floating_cart_settings ? json_decode($wceazy_floating_cart_settings, true) : array();


$wceazy_fc_auto_open_cart = isset($wceazy_fc_settings["auto_open_cart"]) ? $wceazy_fc_settings["auto_open_cart"] : "no";
$wceazy_fc_bascket_count = isset($wceazy_fc_settings["bascket_count"]) ? $wceazy_fc_settings["bascket_count"] : "number_of_items";
$wceazy_fc_dont_show_cart_pages = isset($wceazy_fc_settings["dont_show_cart_pages"]) ? explode(",", $wceazy_fc_settings["dont_show_cart_pages"]) : array();

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

$wceazy_fc_continue_btn_url = isset($wceazy_fc_settings["continue_btn_url"]) ? $wceazy_fc_settings["continue_btn_url"] : home_url() . "/shop";
$wceazy_fc_view_cart_btn_url = isset($wceazy_fc_settings["view_cart_btn_url"]) ? $wceazy_fc_settings["view_cart_btn_url"] : home_url() . "/cart";
$wceazy_fc_checkout_btn_url = isset($wceazy_fc_settings["checkout_btn_url"]) ? $wceazy_fc_settings["checkout_btn_url"] : home_url() . "/checkout";

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



?>


<div id="wceazy_floating_cart">


    <div class="wceazy_floating_cart_header">
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



    <div class="wceazy_floating_cart_page_title">
        <div class="page_title_part_left">
            <h2>
                <?php esc_html_e('Floating Cart', 'wceazy'); ?>
            </h2>
            <a target="_blank" href="<?php echo WCEAZY_DOCS_PAGE; ?>">
                <?php esc_html_e('Documentation', 'wceazy'); ?>
            </a>
        </div>
        <div class="page_title_part_right">
            <button class="wceazy_floating_cart_back_to_dashboard_btn"
                onclick="wceazy_modules_page_init(`<?php echo esc_url(WCEAZY_URL); ?>`)">
                <?php esc_html_e('Back to all Modules', 'wceazy'); ?>
            </button>
        </div>
    </div>



    <div class="wceazy_floating_cart_container">
        <div class="wceazy_floating_cart_tab">
            <div class="wceazy_floating_cart_tab_part_left">
                <div class="coupon_data_tabs">
                    <div class="tab_item tab_item_active" data-target="tab_general">
                        <h1>
                            <?php esc_html_e('General', 'wceazy'); ?>
                        </h1>
                    </div>
                    <div class="tab_item" data-target="tab_cart_header">
                        <h1>
                            <?php esc_html_e('Cart Header', 'wceazy'); ?>
                        </h1>
                    </div>
                    <div class="tab_item" data-target="tab_cart_body">
                        <h1>
                            <?php esc_html_e('Cart Body', 'wceazy'); ?>
                        </h1>
                    </div>
                    <div class="tab_item" data-target="tab_cart_footer">
                        <h1>
                            <?php esc_html_e('Cart Footer', 'wceazy'); ?>
                        </h1>
                    </div>
                    <div class="tab_item" data-target="tab_typography">
                        <h1>
                            <?php esc_html_e('Typography', 'wceazy'); ?>
                        </h1>
                    </div>
                    <div class="tab_item" data-target="tab_redirect_urls">
                        <h1>
                            <?php esc_html_e('Redirect URLs', 'wceazy'); ?>
                        </h1>
                    </div>
                    <div class="tab_item" data-target="tab_general_style">
                        <h1>
                            <?php esc_html_e('General Style', 'wceazy'); ?>
                        </h1>
                    </div>
                    <div class="tab_item" data-target="tab_header_style">
                        <h1>
                            <?php esc_html_e('Header Style', 'wceazy'); ?>
                        </h1>
                    </div>
                    <div class="tab_item" data-target="tab_content_style">
                        <h1>
                            <?php esc_html_e('Content Style', 'wceazy'); ?>
                        </h1>
                    </div>
                    <div class="tab_item" data-target="tab_basket_style">
                        <h1>
                            <?php esc_html_e('Basket Style', 'wceazy'); ?>
                        </h1>
                    </div>
                </div>
            </div>

            <div class="wceazy_floating_cart_tab_part_right">

                <div class="coupon_tab_body" data-id="tab_general">
                    <div class="tab_body_title">
                        <h1>
                            <?php esc_html_e('General Settings', 'wceazy'); ?>
                        </h1>
                    </div>
                    <div class="tab_body_form">


                        <div class="wceazy_floating_cart_field_group wceazy_floating_cart_auto_open_cart">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Enable Auto Open Cart', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <label class="toggle_switch"><input type="checkbox" <?php echo esc_attr($wceazy_fc_auto_open_cart == "yes" ? "checked" : ""); ?>><span
                                        class="slider round"></span></label>
                                <small>
                                    <?php esc_html_e('Turn on/off the auto-open floating cart menu.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div class="wceazy_floating_cart_field_group wceazy_floating_cart_bascket_count">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Basket Count', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <select class="wceazy_floating_cart_select_field">
                                    <option value="">
                                        <?php esc_html_e('Please select', 'wceazy'); ?>
                                    </option>
                                    <option value="number_of_products" <?php echo esc_attr("number_of_products" == $wceazy_fc_bascket_count ? "selected" : ""); ?>>
                                        <?php esc_html_e('Number Of Products', 'wceazy'); ?>
                                    </option>
                                    <option value="number_of_items" <?php echo esc_attr("number_of_items" == $wceazy_fc_bascket_count ? "selected" : ""); ?>>
                                        <?php esc_html_e('Total Number Of Items', 'wceazy'); ?>
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="wceazy_floating_cart_field_group wceazy_floating_cart_dont_show_cart_pages">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Select Don\'t Show Pages', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <select class="wceazy_floating_cart_select_field" multiple="multiple">
                                    <option value="">
                                        <?php esc_html_e(' Please select', 'wceazy'); ?>
                                    </option>
                                    <?php foreach (get_pages() as $single_page) { ?>
                                        <option value="<?php echo esc_attr($single_page->ID); ?>" <?php echo esc_attr(in_array($single_page->ID, $wceazy_fc_dont_show_cart_pages) ? "selected" : ""); ?>>
                                            <?php echo esc_attr($single_page->post_title); ?>
                                        </option>
                                    <?php } ?>
                                </select>
                                <small>
                                    <?php esc_html_e('Please select pages where you do not show floating cart.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="coupon_tab_body" data-id="tab_cart_header">
                    <div class="tab_body_title">
                        <h1>
                            <?php esc_html_e('Header Settings', 'wceazy'); ?>
                        </h1>
                    </div>
                    <div class="tab_body_form">

                        <div class="wceazy_floating_cart_field_group wceazy_floating_cart_show_header_basket_icon">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Show Basket Icon', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <label class="toggle_switch"><input type="checkbox" <?php echo esc_attr($wceazy_fc_show_header_basket_icon == "yes" ? "checked" : ""); ?>><span
                                        class="slider round"></span></label>
                                <small>
                                    <?php esc_html_e('Turn off if you don/t want to show the basket icon in the cart header.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div class="wceazy_floating_cart_field_group wceazy_floating_cart_show_header_close_icon">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Show Close Icon', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <label class="toggle_switch"><input type="checkbox" <?php echo esc_attr($wceazy_fc_show_header_close_icon == "yes" ? "checked" : ""); ?>><span
                                        class="slider round"></span></label>
                                <small>
                                    <?php esc_html_e('Show/Hide the close icon on the cart header.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                    </div>
                </div>


                <div class="coupon_tab_body" data-id="tab_cart_body">
                    <div class="tab_body_title">
                        <h1>
                            <?php esc_html_e('Body Settings', 'wceazy'); ?>
                        </h1>
                    </div>
                    <div class="tab_body_form">

                        <div class="wceazy_floating_cart_field_group wceazy_floating_cart_show_product_image">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Show Product Image', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <label class="toggle_switch"><input type="checkbox" <?php echo esc_attr($wceazy_fc_show_product_image == "yes" ? "checked" : ""); ?>><span
                                        class="slider round"></span></label>
                                <small>
                                    <?php esc_html_e('Show/Hide the product image on the cart menu.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div class="wceazy_floating_cart_field_group wceazy_floating_cart_show_product_name">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Show Product Name', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <label class="toggle_switch"><input type="checkbox" <?php echo esc_attr($wceazy_fc_show_product_name == "yes" ? "checked" : ""); ?>><span
                                        class="slider round"></span></label>
                                <small>
                                    <?php esc_html_e('Show/Hide the product name on the cart menu.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div class="wceazy_floating_cart_field_group wceazy_floating_cart_show_product_price">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Show Product Unit Price', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <label class="toggle_switch"><input type="checkbox" <?php echo esc_attr($wceazy_fc_show_product_price == "yes" ? "checked" : ""); ?>><span
                                        class="slider round"></span></label>
                                <small>
                                    <?php esc_html_e('Show/Hide the product unit price on the cart menu.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div class="wceazy_floating_cart_field_group wceazy_floating_cart_show_product_price_total">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Show Product Price Total', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <label class="toggle_switch"><input type="checkbox" <?php echo esc_attr($wceazy_fc_show_product_price_total == "yes" ? "checked" : ""); ?>><span
                                        class="slider round"></span></label>
                                <small>
                                    <?php esc_html_e('Show/Hide the product price total on the cart menu.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div class="wceazy_floating_cart_field_group wceazy_floating_cart_delete_item_form_cart">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Allow Deleting Item From Cart', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <label class="toggle_switch"><input type="checkbox" <?php echo esc_attr($wceazy_fc_delete_item_form_cart == "yes" ? "checked" : ""); ?>><span
                                        class="slider round"></span></label>
                                <small>
                                    <?php esc_html_e('Enable/disable the deleting item option on the cart menu.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div class="wceazy_floating_cart_field_group wceazy_floating_cart_allowed_quantity_update">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Allow Quantity Update', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <label class="toggle_switch"><input type="checkbox" <?php echo esc_attr($wceazy_fc_allowed_quantity_update == "yes" ? "checked" : ""); ?>><span
                                        class="slider round"></span></label>
                                <small>
                                    <?php esc_html_e('Show/Hide the quantity update option on the cart menu.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="coupon_tab_body" data-id="tab_cart_footer">
                    <div class="tab_body_title">
                        <h1>
                            <?php esc_html_e('Footer Settings', 'wceazy'); ?>
                        </h1>
                    </div>
                    <div class="tab_body_form">

                        <div class="wceazy_floating_cart_field_group wceazy_floating_cart_footer_position_fixed">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Footer Position Fixed', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <label class="toggle_switch"><input type="checkbox" <?php echo esc_attr($wceazy_fc_footer_position_fixed == "yes" ? "checked" : ""); ?>><span
                                        class="slider round"></span></label>
                                <small>
                                    <?php esc_html_e('Enable/Disable the fixed footer position on the cart.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div class="wceazy_floating_cart_field_group wceazy_floating_cart_show_subtotal">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Show Subtotal Number', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <label class="toggle_switch"><input type="checkbox" <?php echo esc_attr($wceazy_fc_show_subtotal == "yes" ? "checked" : ""); ?>><span
                                        class="slider round"></span></label>
                                <small>
                                    <?php esc_html_e('Show/Hide the subtotal amount on the cart menu.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div class="wceazy_floating_cart_field_group wceazy_floating_cart_show_discount">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Show Discount Amoun', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <label class="toggle_switch"><input type="checkbox" <?php echo esc_attr($wceazy_fc_show_discount == "yes" ? "checked" : ""); ?>><span
                                        class="slider round"></span></label>
                                <small>
                                    <?php esc_html_e('Show/Hide the discount amount on the cart menu.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div class="wceazy_floating_cart_field_group wceazy_floating_cart_show_shipping_amount">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Show Shipping Amount?', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <label class="toggle_switch"><input type="checkbox" <?php echo esc_attr($wceazy_fc_show_shipping_amount == "yes" ? "checked" : ""); ?>><span
                                        class="slider round"></span></label>
                                <small>
                                    <?php esc_html_e('Turn off if you don/t want to show the shipping amount on the cart.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div class="wceazy_floating_cart_field_group wceazy_floating_cart_show_cart_total">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Show Total Cart Number', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <label class="toggle_switch"><input type="checkbox" <?php echo esc_attr($wceazy_fc_show_cart_total == "yes" ? "checked" : ""); ?>><span
                                        class="slider round"></span></label>
                                <small>
                                    <?php esc_html_e('Show/Hide the total cart number on the cart menu.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div class="wceazy_floating_cart_field_group wceazy_floating_cart_show_coupon">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Show Apply Coupon Option', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <label class="toggle_switch"><input type="checkbox" <?php echo esc_attr($wceazy_fc_show_coupon == "yes" ? "checked" : ""); ?>><span
                                        class="slider round"></span></label>
                                <small>
                                    <?php esc_html_e('Show/Hide the apply coupon option on the cart menu.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="coupon_tab_body" data-id="tab_typography">
                    <div class="tab_body_title">
                        <h1>
                            <?php esc_html_e('Typography Settings', 'wceazy'); ?>
                        </h1>
                    </div>
                    <div class="tab_body_form">

                        <div class="wceazy_floating_cart_field_group wceazy_floating_cart_heading_title">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Heading Title', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <input class="wceazy_floating_cart_text_field" type="text" placeholder=""
                                    value="<?php echo esc_attr($wceazy_fc_heading_title); ?>">
                                <small>
                                    <?php esc_html_e('Customize the heading title for the cart.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div class="wceazy_floating_cart_field_group wceazy_floating_cart_continue_btn_text">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Continue Shopping Button', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <input class="wceazy_floating_cart_text_field" type="text" placeholder=""
                                    value="<?php echo esc_attr($wceazy_fc_continue_btn_text); ?>">
                                <small>
                                    <?php esc_html_e(' Customize the continue shopping button text.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div class="wceazy_floating_cart_field_group wceazy_floating_cart_view_cart_text">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('View Cart Button', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <input class="wceazy_floating_cart_text_field" type="text" placeholder=""
                                    value="<?php echo esc_attr($wceazy_fc_view_cart_text); ?>">
                                <small>
                                    <?php esc_html_e('Customize the view cart button text', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div class="wceazy_floating_cart_field_group wceazy_floating_cart_checkout_btn_text">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Checkout Button', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <input class="wceazy_floating_cart_text_field" type="text" placeholder=""
                                    value="<?php echo esc_attr($wceazy_fc_checkout_btn_text); ?>">
                                <small>
                                    <?php esc_html_e('Customize the checkout button text.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div class="wceazy_floating_cart_field_group wceazy_floating_cart_empty_cart_message">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Empty Cart Message', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <input class="wceazy_floating_cart_text_field" type="text" placeholder=""
                                    value="<?php echo esc_attr($wceazy_fc_empty_cart_message); ?>">
                                <small>
                                    <?php esc_html_e('Customize the empty cart message for the cart.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div class="wceazy_floating_cart_field_group wceazy_floating_cart_subtotal_text">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Subtotal Text', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <input class="wceazy_floating_cart_text_field" type="text" placeholder=""
                                    value="<?php echo esc_attr($wceazy_fc_subtotal_text); ?>">
                                <small>
                                    <?php esc_html_e('Customize the subtotal text of the cart.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div class="wceazy_floating_cart_field_group wceazy_floating_cart_total_amount_text">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Total Amount Text', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <input class="wceazy_floating_cart_text_field" type="text" placeholder=""
                                    value="<?php echo esc_attr($wceazy_fc_total_amount_text); ?>">
                                <small>
                                    <?php esc_html_e('Customize the total amount text of in the cart.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="coupon_tab_body" data-id="tab_redirect_urls">
                    <div class="tab_body_title">
                        <h1>
                            <?php esc_html_e('Redirect URLs Settings', 'wceazy'); ?>
                        </h1>

                    </div>
                    <div class="tab_body_form">
                        <div class="wceazy_floating_cart_field_group wceazy_floating_cart_continue_btn_url">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Continue Shopping Button Url', 'wceazy'); ?>
                                <span style="color: #FF521D;">(Pro)</span>
                            </label>
                            <div class="field_with_msg_container">
                                <input disabled class="wceazy_floating_cart_text_field" type="text" placeholder=""
                                    value="<?php echo esc_attr($wceazy_fc_continue_btn_url); ?>">
                                <small>
                                    <?php esc_html_e('Set continue shopping button url.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div class="wceazy_floating_cart_field_group wceazy_floating_cart_view_cart_btn_url">

                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('View Cart Button Url', 'wceazy'); ?>
                                <span style="color: #FF521D;">(Pro)</span>
                            </label>
                            <div class="field_with_msg_container">
                                <input disabled class="wceazy_floating_cart_text_field" type="text" placeholder=""
                                    value="<?php echo esc_attr($wceazy_fc_view_cart_btn_url); ?>">
                                <small>
                                    <?php esc_html_e('Set view cart details button url.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div class="wceazy_floating_cart_field_group wceazy_floating_cart_checkout_btn_url">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('View Checkout Button Url', 'wceazy'); ?>
                                <span style="color: #FF521D;">(Pro)</span>
                            </label>
                            <div class="field_with_msg_container">
                                <input disabled class="wceazy_floating_cart_text_field" type="text" placeholder=""
                                    value="<?php echo esc_attr($wceazy_fc_checkout_btn_url); ?>">
                                <small>
                                    <?php esc_html_e('Set view checkout button url.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                    </div>
                </div>


                <div class="coupon_tab_body" data-id="tab_general_style">
                    <div class="tab_body_title">
                        <h1>
                            <?php esc_html_e('General Style', 'wceazy'); ?>
                        </h1>
                    </div>
                    <div class="tab_body_form">

                        <div class="wceazy_floating_cart_field_group wceazy_floating_cart_width">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Cart Width(px)', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <input class="wceazy_floating_cart_text_field" type="number" placeholder=""
                                    value="<?php echo esc_attr($wceazy_fc_width); ?>">
                                <small>
                                    <?php esc_html_e('Set your cart width in px (Ex. 460)', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div class="wceazy_floating_cart_field_group wceazy_floating_cart_open_from">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Cart Open From', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <select class="wceazy_floating_cart_select_field">
                                    <option value="">
                                        <?php esc_html_e('Please select', 'wceazy'); ?>
                                    </option>
                                    <option value="left" <?php echo esc_attr("left" == $wceazy_fc_open_from ? "selected" : ""); ?>>
                                        <?php esc_html_e('Left', 'wceazy'); ?>
                                    </option>
                                    <option value="right" <?php echo esc_attr("right" == $wceazy_fc_open_from ? "selected" : ""); ?>>
                                        <?php esc_html_e('Right', 'wceazy'); ?>
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="wceazy_floating_cart_field_group wceazy_floating_cart_btn_font_size">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Button Font Size', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <input class="wceazy_floating_cart_text_field" type="number" placeholder=""
                                    value="<?php echo esc_attr($wceazy_fc_btn_font_size); ?>">
                                <small>
                                    <?php esc_html_e('Set your all button font size in px (Ex. 16)', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div class="wceazy_floating_cart_field_group wceazy_floating_cart_btn_font_color">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Button Font Color', 'wceazy'); ?>
                                <span style="color: #FF521D;">(Pro)</span>
                            </label>
                            <div class="field_with_msg_container">
                                <div class="color_picker_area">
                                    <input disabled type="color" id="wceazy_floating_cart_btn_font_color"
                                        value="<?php echo esc_attr($wceazy_fc_btn_font_color); ?>">
                                    <label for="wceazy_floating_cart_btn_font_color">
                                        <?php esc_html_e('Select Color', 'wceazy'); ?>
                                    </label>
                                </div>
                                <small>
                                    <?php esc_html_e('Set font color of all buttons', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div class="wceazy_floating_cart_field_group wceazy_floating_cart_btn_bg_color">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Button Background Color', 'wceazy'); ?>
                                <span style="color: #FF521D;">(Pro)</span>
                            </label>
                            <div class="field_with_msg_container">
                                <div class="color_picker_area">
                                    <input disabled type="color" id="wceazy_floating_cart_btn_bg_color"
                                        value="<?php echo esc_attr($wceazy_fc_btn_bg_color); ?>">
                                    <label for="wceazy_floating_cart_btn_bg_color">
                                        <?php esc_html_e('Select Color', 'wceazy'); ?>
                                    </label>
                                </div>
                                <small>
                                    <?php esc_html_e('Set background color of all buttons', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div class="wceazy_floating_cart_field_group wceazy_floating_cart_btn_hover_font_color">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Button Hover Font Color', 'wceazy'); ?>
                                <span style="color: #FF521D;">(Pro)</span>
                            </label>
                            <div class="field_with_msg_container">
                                <div class="color_picker_area">
                                    <input disabled type="color" id="wceazy_floating_cart_btn_hover_font_color"
                                        value="<?php echo esc_attr($wceazy_fc_btn_hover_font_color); ?>">
                                    <label for="wceazy_floating_cart_btn_hover_font_color">
                                        <?php esc_html_e('Select Color', 'wceazy'); ?>
                                    </label>
                                </div>
                                <small>
                                    <?php esc_html_e('Set hover font color of all buttons', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div class="wceazy_floating_cart_field_group wceazy_floating_cart_btn_hover_bg_color">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Button Hover Background', 'wceazy'); ?>
                                <span style="color: #FF521D;">(Pro)</span>
                            </label>
                            <div class="field_with_msg_container">
                                <div class="color_picker_area">
                                    <input disabled type="color" id="wceazy_floating_cart_btn_hover_bg_color"
                                        value="<?php echo esc_attr($wceazy_fc_btn_hover_bg_color); ?>">
                                    <label for="wceazy_floating_cart_btn_hover_bg_color">
                                        <?php esc_html_e('Select Color', 'wceazy'); ?>
                                    </label>
                                </div>
                                <small>
                                    <?php esc_html_e('Set hover background color of all buttons', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div class="wceazy_floating_cart_field_group wceazy_floating_cart_btn_border_color">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Button Border Color', 'wceazy'); ?>
                                <span style="color: #FF521D;">(Pro)</span>
                            </label>
                            <div class="field_with_msg_container">
                                <div class="color_picker_area">
                                    <input disabled type="color" id="wceazy_floating_cart_btn_border_color"
                                        value="<?php echo esc_attr($wceazy_fc_btn_border_color); ?>">
                                    <label for="wceazy_floating_cart_btn_border_color">
                                        <?php esc_html_e('Select Color', 'wceazy'); ?>
                                    </label>
                                </div>
                                <small>
                                    <?php esc_html_e('Set border color of all buttons', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div class="wceazy_floating_cart_field_group wceazy_floating_cart_btn_border_hover_color">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Button Border Hover Color', 'wceazy'); ?>
                                <span style="color: #FF521D;">(Pro)</span>
                            </label>
                            <div class="field_with_msg_container">
                                <div class="color_picker_area">
                                    <input disabled type="color" id="wceazy_floating_cart_btn_border_hover_color"
                                        value="<?php echo esc_attr($wceazy_fc_btn_border_hover_color); ?>">
                                    <label for="wceazy_floating_cart_btn_border_hover_color">
                                        <?php esc_html_e('Select Color', 'wceazy'); ?>
                                    </label>
                                </div>
                                <small>
                                    <?php esc_html_e('Set border hover color of all buttons', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div class="wceazy_floating_cart_field_group wceazy_floating_cart_btn_border_radius">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Button Border Radius', 'wceazy'); ?>
                                <span style="color: #FF521D;">(Pro)</span>
                            </label>
                            <div class="field_with_msg_container">
                                <input disabled class="wceazy_floating_cart_text_field" type="number" placeholder=""
                                    value="<?php echo esc_attr($wceazy_fc_btn_border_radius); ?>">
                                <small>
                                    <?php esc_html_e('Set your all button border raduis (Ex. 4)', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                    </div>
                </div>


                <div class="coupon_tab_body" data-id="tab_header_style">
                    <div class="tab_body_title">
                        <h1>
                            <?php esc_html_e('Header Style', 'wceazy'); ?>
                        </h1>
                    </div>
                    <div class="tab_body_form">

                        <div class="wceazy_floating_cart_field_group wceazy_floating_cart_cross_icon_size">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Cross Icon Size(px)', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <input class="wceazy_floating_cart_text_field" type="number" placeholder=""
                                    value="<?php echo esc_attr($wceazy_fc_cross_icon_size); ?>">
                                <small>
                                    <?php esc_html_e('Set your cart header cross icon in px (Ex. 30)', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div class="wceazy_floating_cart_field_group wceazy_floating_cart_header_basket_icon_size">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Heading Basket Icon Size(px)', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <input class="wceazy_floating_cart_text_field" type="number" placeholder=""
                                    value="<?php echo esc_attr($wceazy_fc_header_basket_icon_size); ?>">
                                <small>
                                    <?php esc_html_e('Set your cart header basket icon in px (Ex. 30)', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div class="wceazy_floating_cart_field_group wceazy_floating_cart_heading_font_size">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Heading Font Size(px)', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <input class="wceazy_floating_cart_text_field" type="number" placeholder=""
                                    value="<?php echo esc_attr($wceazy_fc_heading_font_size); ?>">
                                <small>
                                    <?php esc_html_e('Set your cart header font size in px (Ex. 24)', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div class="wceazy_floating_cart_field_group wceazy_floating_cart_heading_font_color">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Heading Font Color', 'wceazy'); ?>
                                <span style="color: #FF521D;">(Pro)</span>
                            </label>
                            <div class="field_with_msg_container">
                                <div class="color_picker_area">
                                    <input disabled type="color" id="wceazy_floating_cart_heading_font_color"
                                        value="<?php echo esc_attr($wceazy_fc_heading_font_color); ?>">
                                    <label for="wceazy_floating_cart_heading_font_color">
                                        <?php esc_html_e('Select Color', 'wceazy'); ?>
                                    </label>
                                </div>
                                <small>
                                    <?php esc_html_e('Set your cart header font color.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div class="wceazy_floating_cart_field_group wceazy_floating_cart_heading_border_bottom_color">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Heading Border Bottom Color', 'wceazy'); ?>
                                <span style="color: #FF521D;">(Pro)</span>
                            </label>
                            <div class="field_with_msg_container">
                                <div class="color_picker_area">
                                    <input disabled type="color" id="wceazy_floating_cart_heading_border_bottom_color"
                                        value="<?php echo esc_attr($wceazy_fc_heading_border_bottom_color); ?>">
                                    <label for="wceazy_floating_cart_heading_border_bottom_color">
                                        <?php esc_html_e('Select Color', 'wceazy'); ?>
                                    </label>
                                </div>
                                <small>
                                    <?php esc_html_e('Set your cart header border bottom color.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                    </div>
                </div>


                <div class="coupon_tab_body" data-id="tab_content_style">
                    <div class="tab_body_title">
                        <h1>
                            <?php esc_html_e('Content Style', 'wceazy'); ?>
                        </h1>
                    </div>
                    <div class="tab_body_form">

                        <div class="wceazy_floating_cart_field_group wceazy_floating_cart_item_remove_icon">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Product Remove Icon', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <div class="icon_selection_area">
                                    <div class="icon_field_item icon_1 <?php echo esc_attr("icon_1" == $wceazy_fc_item_remove_icon ? "active" : ""); ?>"
                                        data-value="icon_1"></div>
                                    <div class="icon_field_item icon_2 <?php echo esc_attr("icon_2" == $wceazy_fc_item_remove_icon ? "active" : ""); ?>"
                                        data-value="icon_2"></div>
                                    <div class="icon_field_item icon_3 <?php echo esc_attr("icon_3" == $wceazy_fc_item_remove_icon ? "active" : ""); ?>"
                                        data-value="icon_3"></div>
                                    <div class="icon_field_item icon_4 <?php echo esc_attr("icon_4" == $wceazy_fc_item_remove_icon ? "active" : ""); ?>"
                                        data-value="icon_4"></div>
                                    <div class="icon_field_item icon_5 <?php echo esc_attr("icon_5" == $wceazy_fc_item_remove_icon ? "active" : ""); ?>"
                                        data-value="icon_5"></div>
                                </div>
                                <small>
                                    <?php esc_html_e('Please select your delete icon.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div class="wceazy_floating_cart_field_group wceazy_floating_cart_remove_icon_size">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Product Remove Icon Size(px)', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <input class="wceazy_floating_cart_text_field" type="number" placeholder=""
                                    value="<?php echo esc_attr($wceazy_fc_remove_icon_size); ?>">
                                <small>
                                    <?php esc_html_e('Set your cart content delete icon size in px (Ex. 16)', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div class="wceazy_floating_cart_field_group wceazy_floating_cart_product_img_width">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Product Image Width', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <input class="wceazy_floating_cart_text_field" type="number" placeholder=""
                                    value="<?php echo esc_attr($wceazy_fc_product_img_width); ?>">
                                <small>
                                    <?php esc_html_e('Set your cart content product image width in percent(%) (Ex. 100)', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div class="wceazy_floating_cart_field_group wceazy_floating_cart_product_title_color">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Product Title Color', 'wceazy'); ?>
                                <span style="color: #FF521D;">(Pro)</span>
                            </label>
                            <div class="field_with_msg_container">
                                <div class="color_picker_area">
                                    <input disabled type="color" id="wceazy_floating_cart_product_title_color"
                                        value="<?php echo esc_attr($wceazy_fc_product_title_color); ?>">
                                    <label for="wceazy_floating_cart_product_title_color">
                                        <?php esc_html_e('Select Color', 'wceazy'); ?>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="wceazy_floating_cart_field_group wceazy_floating_cart_product_title_font_size">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Product Title Font Size', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <input class="wceazy_floating_cart_text_field" type="number" placeholder=""
                                    value="<?php echo esc_attr($wceazy_fc_product_title_font_size); ?>">
                                <small>
                                    <?php esc_html_e('Set your cart content product title font size in px (Ex. 16)', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div class="wceazy_floating_cart_field_group wceazy_floating_cart_quantity_box_width">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Quantity Box Width', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <input class="wceazy_floating_cart_text_field" type="number" placeholder=""
                                    value="<?php echo esc_attr($wceazy_fc_quantity_box_width); ?>">
                                <small>
                                    <?php esc_html_e('Set your cart content product quantity input box width in px (Ex. 56)', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div class="wceazy_floating_cart_field_group wceazy_floating_cart_quantity_box_border_color">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Quantity Box Border Color', 'wceazy'); ?>
                                <span style="color: #FF521D;">(Pro)</span>
                            </label>
                            <div class="field_with_msg_container">
                                <div class="color_picker_area">
                                    <input disabled type="color" id="wceazy_floating_cart_quantity_box_border_color"
                                        value="<?php echo esc_attr($wceazy_fc_quantity_box_border_color); ?>">
                                    <label for="wceazy_floating_cart_quantity_box_border_color">
                                        <?php esc_html_e('Select Color', 'wceazy'); ?>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="wceazy_floating_cart_field_group wceazy_floating_cart_quantity_box_bg_color">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Quantity Box Background Color', 'wceazy'); ?>
                                <span style="color: #FF521D;">(Pro)</span>
                            </label>
                            <div class="field_with_msg_container">
                                <div class="color_picker_area">
                                    <input disabled type="color" id="wceazy_floating_cart_quantity_box_bg_color"
                                        value="<?php echo esc_attr($wceazy_fc_quantity_box_bg_color); ?>">
                                    <label for="wceazy_floating_cart_quantity_box_bg_color">
                                        <?php esc_html_e('Select Color', 'wceazy'); ?>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="wceazy_floating_cart_field_group wceazy_floating_cart_quantity_box_text_color">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Quantity Box Text Color', 'wceazy'); ?>
                                <span style="color: #FF521D;">(Pro)</span>
                            </label>
                            <div class="field_with_msg_container">
                                <div class="color_picker_area">
                                    <input disabled type="color" id="wceazy_floating_cart_quantity_box_text_color"
                                        value="<?php echo esc_attr($wceazy_fc_quantity_box_text_color); ?>">
                                    <label for="wceazy_floating_cart_quantity_box_text_color">
                                        <?php esc_html_e('Select Color', 'wceazy'); ?>
                                    </label>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>



                <div class="coupon_tab_body" data-id="tab_basket_style">
                    <div class="tab_body_title">
                        <h1>
                            <?php esc_html_e('Basket Style', 'wceazy'); ?>
                        </h1>
                    </div>
                    <div class="tab_body_form">

                        <div class="wceazy_floating_cart_field_group wceazy_floating_cart_basket_enable">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Enable Basket d', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <select class="wceazy_floating_cart_select_field">
                                    <option value="">
                                        <?php esc_html_e('Please select', 'wceazy'); ?>
                                    </option>
                                    <option value="show_always" <?php echo esc_attr("show_always" == $wceazy_fc_basket_enable ? "selected" : ""); ?>>
                                        <?php esc_html_e('Always Show', 'wceazy'); ?>
                                    </option>
                                    <option value="hide_always" <?php echo esc_attr("hide_always" == $wceazy_fc_basket_enable ? "selected" : ""); ?>>
                                        <?php esc_html_e('Always Hide', 'wceazy'); ?>
                                    </option>
                                    <option value="hide_empty_cart" <?php echo esc_attr("hide_empty_cart" == $wceazy_fc_basket_enable ? "selected" : ""); ?>>
                                        <?php esc_html_e('Hide when cart is empty', 'wceazy'); ?>
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="wceazy_floating_cart_field_group wceazy_floating_cart_basket_shape">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Basket Shape', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <select class="wceazy_floating_cart_select_field">
                                    <option value="">
                                        <?php esc_html_e('Please select', 'wceazy'); ?>
                                    </option>
                                    <option value="round" <?php echo esc_attr("round" == $wceazy_fc_basket_shape ? "selected" : ""); ?>>
                                        <?php esc_html_e('Round', 'wceazy'); ?>
                                    </option>
                                    <option value="square" <?php echo esc_attr("square" == $wceazy_fc_basket_shape ? "selected" : ""); ?>>
                                        <?php esc_html_e('Square', 'wceazy'); ?>
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="wceazy_floating_cart_field_group wceazy_floating_cart_basket_icon_size">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Basket Icon Size', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <input class="wceazy_floating_cart_text_field" type="number" placeholder=""
                                    value="<?php echo esc_attr($wceazy_fc_basket_icon_size); ?>">
                                <small>
                                    <?php esc_html_e('Set your basket icon size in px (Ex. 35)', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div class="wceazy_floating_cart_field_group wceazy_floating_cart_basket_show_count">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Show Item Count?', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <label class="toggle_switch"><input type="checkbox" <?php echo esc_attr($wceazy_fc_basket_show_count == "yes" ? "checked" : ""); ?>><span
                                        class="slider round"></span></label>
                                <small>
                                    <?php esc_html_e('Turn off if you don/t want to show basket item count.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div class="wceazy_floating_cart_field_group wceazy_floating_cart_basket_icon">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Basket Icon', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <div class="icon_selection_area">
                                    <div class="icon_field_item icon_1 <?php echo esc_attr("icon_1" == $wceazy_fc_basket_icon ? "active" : ""); ?>"
                                        data-value="icon_1"></div>
                                    <div class="icon_field_item icon_2 <?php echo esc_attr("icon_2" == $wceazy_fc_basket_icon ? "active" : ""); ?>"
                                        data-value="icon_2"></div>
                                    <div class="icon_field_item icon_3 <?php echo esc_attr("icon_3" == $wceazy_fc_basket_icon ? "active" : ""); ?>"
                                        data-value="icon_3"></div>
                                    <div class="icon_field_item icon_4 <?php echo esc_attr("icon_4" == $wceazy_fc_basket_icon ? "active" : ""); ?>"
                                        data-value="icon_4"></div>
                                    <div class="icon_field_item icon_5 <?php echo esc_attr("icon_5" == $wceazy_fc_basket_icon ? "active" : ""); ?>"
                                        data-value="icon_5"></div>
                                    <div class="icon_field_item icon_6 <?php echo esc_attr("icon_6" == $wceazy_fc_basket_icon ? "active" : ""); ?>"
                                        data-value="icon_6"></div>
                                </div>
                                <small>
                                    <?php esc_html_e('Please select your basket icon.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div class="wceazy_floating_cart_field_group wceazy_floating_cart_basket_position">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Basket Position', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <select class="wceazy_floating_cart_select_field">
                                    <option value="">
                                        <?php esc_html_e('Please select', 'wceazy'); ?>
                                    </option>
                                    <option value="top_left" <?php echo esc_attr("top_left" == $wceazy_fc_basket_position ? "selected" : ""); ?>>
                                        <?php esc_html_e('Top Left', 'wceazy'); ?>
                                    </option>
                                    <option value="top_right" <?php echo esc_attr("top_right" == $wceazy_fc_basket_position ? "selected" : ""); ?>>
                                        <?php esc_html_e('Top Right', 'wceazy'); ?>
                                    </option>
                                    <option value="bottom_left" <?php echo esc_attr("bottom_left" == $wceazy_fc_basket_position ? "selected" : ""); ?>>
                                        <?php esc_html_e('Bottom Left', 'wceazy'); ?>
                                    </option>
                                    <option value="bottom_right" <?php echo esc_attr("bottom_right" == $wceazy_fc_basket_position ? "selected" : ""); ?>>
                                        <?php esc_html_e('Bottom Right', 'wceazy'); ?>
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="wceazy_floating_cart_field_group wceazy_floating_cart_basket_offset_vertical">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Basket Offset (Vertical)', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <input class="wceazy_floating_cart_text_field" type="number" placeholder=""
                                    value="<?php echo esc_attr($wceazy_fc_basket_offset_vertical); ?>">
                                <small>
                                    <?php esc_html_e('Set your basket vertical offset in px (Ex. 110)', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div class="wceazy_floating_cart_field_group wceazy_floating_cart_basket_offset_horizontal">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Basket Offset (Horizontal)', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <input class="wceazy_floating_cart_text_field" type="number" placeholder=""
                                    value="<?php echo esc_attr($wceazy_fc_basket_offset_horizontal); ?>">
                                <small>
                                    <?php esc_html_e('Set your basket horizontal offset in px (Ex. 60)', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div class="wceazy_floating_cart_field_group wceazy_floating_cart_basket_count_position">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Basket Count Position', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <select class="wceazy_floating_cart_select_field">
                                    <option value="">
                                        <?php esc_html_e('Please select', 'wceazy'); ?>
                                    </option>
                                    <option value="top_left" <?php echo esc_attr("top_left" == $wceazy_fc_basket_count_position ? "selected" : ""); ?>>
                                        <?php esc_html_e('Top Left', 'wceazy'); ?>
                                    </option>
                                    <option value="top_right" <?php echo esc_attr("top_right" == $wceazy_fc_basket_count_position ? "selected" : ""); ?>>
                                        <?php esc_html_e('Top Right', 'wceazy'); ?>
                                    </option>
                                    <option value="bottom_left" <?php echo esc_attr("bottom_left" == $wceazy_fc_basket_count_position ? "selected" : ""); ?>>
                                        <?php esc_html_e('Bottom Left', 'wceazy'); ?>
                                    </option>
                                    <option value="bottom_right" <?php echo esc_attr("bottom_right" == $wceazy_fc_basket_count_position ? "selected" : ""); ?>>
                                        <?php esc_html_e('Bottom Right', 'wceazy'); ?>
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="wceazy_floating_cart_field_group wceazy_floating_cart_basket_icon_color">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Basket Icon Color', 'wceazy'); ?>
                                <span style="color: #FF521D;">(Pro)</span>
                            </label>
                            <div class="field_with_msg_container">
                                <div class="color_picker_area">
                                    <input disabled type="color" id="wceazy_floating_cart_basket_icon_color"
                                        value="<?php echo esc_attr($wceazy_fc_basket_icon_color); ?>">
                                    <label for="wceazy_floating_cart_basket_icon_color">
                                        <?php esc_html_e('Select Color', 'wceazy'); ?>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="wceazy_floating_cart_field_group wceazy_floating_cart_basket_bg_color">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Basket Background Color', 'wceazy'); ?>
                                <span style="color: #FF521D;">(Pro)</span>
                            </label>
                            <div class="field_with_msg_container">
                                <div class="color_picker_area">
                                    <input disabled type="color" id="wceazy_floating_cart_basket_bg_color"
                                        value="<?php echo esc_attr($wceazy_fc_basket_bg_color); ?>">
                                    <label for="wceazy_floating_cart_basket_bg_color">
                                        <?php esc_html_e('Select Color', 'wceazy'); ?>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="wceazy_floating_cart_field_group wceazy_floating_cart_basket_count_color">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Basket Count Color', 'wceazy'); ?>
                                <span style="color: #FF521D;">(Pro)</span>
                            </label>
                            <div class="field_with_msg_container">
                                <div class="color_picker_area">
                                    <input disabled type="color" id="wceazy_floating_cart_basket_count_color"
                                        value="<?php echo esc_attr($wceazy_fc_basket_count_color); ?>">
                                    <label for="wceazy_floating_cart_basket_count_color">
                                        <?php esc_html_e('Select Color', 'wceazy'); ?>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="wceazy_floating_cart_field_group wceazy_floating_cart_basket_count_bg_color">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Basket Count Background Color', 'wceazy'); ?>
                                <span style="color: #FF521D;">(Pro)</span>
                            </label>
                            <div class="field_with_msg_container">
                                <div class="color_picker_area">
                                    <input disabled type="color" id="wceazy_floating_cart_basket_count_bg_color"
                                        value="<?php echo esc_attr($wceazy_fc_basket_count_bg_color); ?>">
                                    <label for="wceazy_floating_cart_basket_count_bg_color">
                                        <?php esc_html_e('Select Color', 'wceazy'); ?>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="wceazy_floating_cart_bottom_button_section">
            <button onclick="wceazy_floating_cart_save();">
                <?php esc_html_e('Save Settings', 'wceazy'); ?>
            </button>
        </div>

    </div>

</div>