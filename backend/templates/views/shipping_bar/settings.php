<?php

$wceazy_shipping_bar_settings = get_option('wceazy_shipping_bar_settings', False);
$wceazy_sb_settings = $wceazy_shipping_bar_settings ? json_decode($wceazy_shipping_bar_settings, true) : array();

$wceazy_sb_enable_shipping_bar = isset($wceazy_sb_settings["enable_shipping_bar"]) ? $wceazy_sb_settings["enable_shipping_bar"] : "yes";
$wceazy_sb_display_desktop = isset($wceazy_sb_settings["display_desktop"]) ? $wceazy_sb_settings["display_desktop"] : "yes";
$wceazy_sb_display_mobile = isset($wceazy_sb_settings["display_mobile"]) ? $wceazy_sb_settings["display_mobile"] : "yes";
$wceazy_sb_shipping_zone = isset($wceazy_sb_settings["shipping_zone"]) ? $wceazy_sb_settings["shipping_zone"] : "";
$wceazy_sb_dont_show_pages = isset($wceazy_sb_settings["dont_show_pages"]) ? explode(",", $wceazy_sb_settings["dont_show_pages"]) : array();
$wceazy_sb_exclude_products = isset($wceazy_sb_settings["exclude_products"]) ? explode(",", $wceazy_sb_settings["exclude_products"]) : array();

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


?>


<div id="wceazy_shipping_bar">


    <div class="wceazy_shipping_bar_header">
        <div class="wceazy_header_part_left">
            <p>wcEazy <span>
                    <?php echo esc_attr(WCEAZY_VERSION); ?>
                </span></p>
        </div>
        <div class="wceazy_header_part_right">
            <a class="wceazy_get_pro" target="_blank" href="<?php echo WCEAZY_GET_PRO_URL; ?>">GET PRO</a>
        </div>
    </div>



    <div class="wceazy_shipping_bar_page_title">
        <div class="page_title_part_left">
            <h2>Free Shipping Bar</h2>
            <a target="_blank" href="<?php echo WCEAZY_DOCS_PAGE; ?>">Documentation</a>
        </div>
        <div class="page_title_part_right">
            <button class="wceazy_shipping_bar_back_to_dashboard_btn"
                onclick="wceazy_modules_page_init(`<?php echo esc_url(WCEAZY_URL); ?>`)">Back to all Modules</button>
        </div>
    </div>



    <div class="wceazy_shipping_bar_container">


        <div class="wceazy_shipping_bar_tab">
            <div class="wceazy_shipping_bar_tab_part_left">
                <div class="coupon_data_tabs">
                    <div class="tab_item tab_item_active" data-target="tab_general">
                        <h1>General</h1>
                    </div>
                    <div class="tab_item" data-target="tab_cart_and_checkout">
                        <h1>Cart & Checkout</h1>
                    </div>
                    <div class="tab_item" data-target="tab_messages">
                        <h1>Messages</h1>
                    </div>
                    <div class="tab_item" data-target="tab_effect">
                        <h1>Effect</h1>
                    </div>
                    <div class="tab_item" data-target="tab_style">
                        <h1>Style</h1>
                    </div>
                </div>
            </div>

            <div class="wceazy_shipping_bar_tab_part_right">

                <div class="coupon_tab_body" data-id="tab_general">
                    <div class="tab_body_title">
                        <h1>General Settings</h1>
                    </div>
                    <div class="tab_body_form">
                        <div class="wceazy_shipping_bar_field_group wceazy_shipping_bar_enable_shipping_bar">
                            <label for="coupon_generator_coupon_amount">Enable Shipping Bar</label>
                            <div class="field_with_msg_container">
                                <label class="toggle_switch"><input type="checkbox" <?php echo esc_attr($wceazy_sb_enable_shipping_bar == "yes" ? "checked" : ""); ?>><span
                                        class="slider round"></span></label>
                                <small>Turn ON the switch to enable the Shipping Bar.</small>
                            </div>
                        </div>

                        <div class="wceazy_shipping_bar_field_group wceazy_shipping_bar_display_desktop">
                            <label for="coupon_generator_coupon_amount">Display in Desktop</label>
                            <div class="field_with_msg_container">
                                <label class="toggle_switch"><input type="checkbox" <?php echo esc_attr($wceazy_sb_display_desktop == "yes" ? "checked" : ""); ?>><span
                                        class="slider round"></span></label>
                                <small>Turn ON the switch to show the Shipping Bar on the Desktop Screen.</small>
                            </div>
                        </div>

                        <div class="wceazy_shipping_bar_field_group wceazy_shipping_bar_display_mobile">
                            <label for="coupon_generator_coupon_amount">Display in Mobile</label>
                            <div class="field_with_msg_container">
                                <label class="toggle_switch"><input type="checkbox" <?php echo esc_attr($wceazy_sb_display_mobile == "yes" ? "checked" : ""); ?>><span
                                        class="slider round"></span></label>
                                <small>Turn ON the switch to show the Shipping Bar on the Mobile Screen.</small>
                            </div>
                        </div>

                        <div class="wceazy_shipping_bar_field_group wceazy_shipping_bar_shipping_zone">
                            <label for="coupon_generator_coupon_amount">Select Shipping Zone</label>
                            <div class="field_with_msg_container">
                                <select class="wceazy_shipping_bar_select_field">
                                    <option value=""> Please select</option>
                                    <?php foreach ($this->shipping_bar->utils->wceazy_get_all_free_shipping_zone() as $id => $zone) { ?>
                                        <option value="<?php echo esc_attr($id); ?>" <?php echo esc_attr($id == $wceazy_sb_shipping_zone ? "selected" : ""); ?>>
                                            <?php echo esc_attr($zone); ?>
                                        </option>
                                    <?php } ?>
                                </select>
                                <small style="color:#e91717">You must select your shipping zone, if not created please
                                    create <a target="_blank" style="color:#f109aa; margin-left:3px"
                                        href="<?php echo admin_url('admin.php?page=wc-settings&tab=shipping'); ?>">Here</a>.</small>
                            </div>
                        </div>


                        <div class="wceazy_shipping_bar_field_group wceazy_shipping_bar_dont_show_pages">
                            <label for="coupon_generator_coupon_amount">Exclude Pages <span
                                    style="color: #FF521D;">(Pro)</span></label>
                            <div class="field_with_msg_container">
                                <select disabled class="wceazy_shipping_bar_select_field" multiple="multiple">
                                    <option value=""> Please select</option>
                                    <?php foreach (get_pages() as $page) { ?>
                                        <option value="<?php echo esc_attr($page->ID); ?>" <?php echo esc_attr(in_array($page->ID, $wceazy_sb_dont_show_pages) ? "selected" : ""); ?>>
                                            <?php echo esc_attr($page->post_title); ?>
                                        </option>
                                    <?php } ?>
                                </select>
                                <small>Select the pages where you don't want to show the Free Shipping Bar.</small>
                            </div>
                        </div>

                        <div class="wceazy_shipping_bar_field_group wceazy_shipping_bar_exclude_products">
                            <label for="coupon_generator_coupon_amount">Exclude Products <span
                                    style="color: #FF521D;">(Pro)</span></label>
                            <div class="field_with_msg_container">
                                <select disabled class="wceazy_shipping_bar_select_field" multiple="multiple">
                                    <option value=""> Please select</option>
                                    <?php foreach ($this->shipping_bar->utils->getWooProducts() as $key => $product) { ?>
                                        <option value="<?php echo esc_attr($product["id"]); ?>" <?php echo esc_attr(in_array($product["id"], $wceazy_sb_exclude_products) ? "selected" : ""); ?>>
                                            <?php echo esc_attr($product["text"]); ?>
                                        </option>
                                    <?php } ?>
                                </select>
                                <small>Select the products for which you don't want to allow Free Shipping Bar.</small>
                            </div>
                        </div>





                    </div>
                </div>

                <div class="coupon_tab_body" data-id="tab_cart_and_checkout">
                    <div class="tab_body_title">
                        <h1>Cart & Checkout Page Settings</h1>
                    </div>
                    <div class="tab_body_form">



                        <h4>Cart Page</h4>

                        <div class="wceazy_shipping_bar_field_group wceazy_shipping_bar_show_in_cart">
                            <label for="coupon_generator_coupon_amount">Show in Cart Subtotal Area</label>
                            <div class="field_with_msg_container">
                                <label class="toggle_switch"><input type="checkbox" <?php echo esc_attr($wceazy_sb_show_in_cart == "yes" ? "checked" : ""); ?>><span
                                        class="slider round"></span></label>
                                <small>Turn ON the switch to show the free shipping notification in cart page subtotal
                                    area.</small>
                            </div>
                        </div>

                        <div class="wceazy_shipping_bar_field_group wceazy_shipping_bar_position_cart_subtotal">
                            <label for="coupon_generator_coupon_amount">Select Position on Cart Page</label>
                            <div class="field_with_msg_container">
                                <select class="wceazy_shipping_bar_select_field">
                                    <option value=""> Please select</option>
                                    <option value="woocommerce_cart_totals_before_shipping" <?php echo esc_attr("woocommerce_cart_totals_before_shipping" == $wceazy_sb_position_cart_subtotal ? "selected" : ""); ?>> Before shipping block </option>
                                    <option value="woocommerce_cart_totals_after_shipping" <?php echo esc_attr("woocommerce_cart_totals_after_shipping" == $wceazy_sb_position_cart_subtotal ? "selected" : ""); ?>> After shipping block </option>
                                </select>
                                <small>Select position of the free shipping notification in cart page.</small>
                            </div>
                        </div>


                        <h4>Checkout Page</h4>

                        <div class="wceazy_shipping_bar_field_group wceazy_shipping_bar_show_in_checkout">
                            <label for="coupon_generator_coupon_amount">Show in Checkout Subtotal Area</label>
                            <div class="field_with_msg_container">
                                <label class="toggle_switch"><input type="checkbox" <?php echo esc_attr($wceazy_sb_show_in_checkout == "yes" ? "checked" : ""); ?>><span
                                        class="slider round"></span></label>
                                <small>Turn ON the switch to show the free shipping notification in checkout subtotal
                                    area.</small>
                            </div>
                        </div>

                        <div class="wceazy_shipping_bar_field_group wceazy_shipping_bar_position_checkout_subtotal">
                            <label for="coupon_generator_coupon_amount">Select Position on Checkout Page</label>
                            <div class="field_with_msg_container">
                                <select class="wceazy_shipping_bar_select_field">
                                    <option value=""> Please select</option>
                                    <option value="woocommerce_review_order_before_shipping" <?php echo esc_attr("woocommerce_review_order_before_shipping" == $wceazy_sb_position_checkout_subtotal ? "selected" : ""); ?>> Before shipping block </option>
                                    <option value="woocommerce_review_order_after_shipping" <?php echo esc_attr("woocommerce_review_order_after_shipping" == $wceazy_sb_position_checkout_subtotal ? "selected" : ""); ?>> After shipping block </option>
                                </select>
                                <small>Select position where the free shipping notification will be displayed on
                                    checkout page.</small>
                            </div>
                        </div>


                        <h4>Style</h4>

                        <div class="wceazy_shipping_bar_field_group wceazy_shipping_bar_cart_checkout_headline">
                            <label for="coupon_generator_coupon_amount">Headline Text</label>
                            <div class="field_with_msg_container">
                                <input class="wceazy_shipping_bar_text_field" type="text" placeholder=""
                                    value="<?php echo esc_attr($wceazy_sb_cart_checkout_headline); ?>">
                                <small>Enter cart & checkout page free shipping progress bar headline text.</small>
                            </div>
                        </div>

                        <div class="wceazy_shipping_bar_field_group wceazy_shipping_bar_cart_checkout_progress_bar_bg">
                            <label for="coupon_generator_coupon_amount">Progress Bar's Background <span
                                    style="color: #FF521D;">(Pro)</span></label>
                            <div class="field_with_msg_container">
                                <div class="color_picker_area">
                                    <input disabled type="color" id="wceazy_shipping_bar_cart_checkout_progress_bar_bg"
                                        value="<?php echo esc_attr($wceazy_sb_cart_checkout_progress_bar_bg); ?>">
                                    <label for="wceazy_shipping_bar_cart_checkout_progress_bar_bg">Select Color</label>
                                </div>
                                <small>Set your progress bar's background color.</small>
                            </div>
                        </div>

                        <div class="wceazy_shipping_bar_field_group wceazy_shipping_bar_cart_checkout_progress_color">
                            <label for="coupon_generator_coupon_amount">Progress Bar's Color <span
                                    style="color: #FF521D;">(Pro)</span></label>
                            <div class="field_with_msg_container">
                                <div class="color_picker_area">
                                    <input disabled type="color" id="wceazy_shipping_bar_cart_checkout_progress_color"
                                        value="<?php echo esc_attr($wceazy_sb_cart_checkout_progress_color); ?>">
                                    <label for="wceazy_shipping_bar_cart_checkout_progress_color">Select Color</label>
                                </div>
                                <small>Set your free shipping bar's progress color.</small>
                            </div>
                        </div>

                        <div
                            class="wceazy_shipping_bar_field_group wceazy_shipping_bar_cart_checkout_progress_text_color">
                            <label for="coupon_generator_coupon_amount">Progress Bar's Text Color <span
                                    style="color: #FF521D;">(Pro)</span></label>
                            <div class="field_with_msg_container">
                                <div class="color_picker_area">
                                    <input disabled type="color"
                                        id="wceazy_shipping_bar_cart_checkout_progress_text_color"
                                        value="<?php echo esc_attr($wceazy_sb_cart_checkout_progress_text_color); ?>">
                                    <label for="wceazy_shipping_bar_cart_checkout_progress_text_color">Select
                                        Color</label>
                                </div>
                                <small>Set your free shipping bar's progress text color.</small>
                            </div>
                        </div>



                    </div>
                </div>

                <div class="coupon_tab_body" data-id="tab_messages">
                    <div class="tab_body_title">
                        <h1>Customize Messages</h1>
                    </div>
                    <div class="tab_body_form">



                        <div class="wceazy_shipping_bar_field_group wceazy_shipping_bar_zero_order_amount_msg">
                            <label for="coupon_generator_coupon_amount">Message on Zero Order Amount <span
                                    style="color: #FF521D;">(Pro)</span></label>
                            <div class="field_with_msg_container">
                                <textarea disabled class="wceazy_shipping_bar_textarea_field"
                                    rows="3"><?php echo esc_attr($wceazy_sb_zero_order_amount_msg); ?></textarea>
                                <small>Message to display when user in shipping zone but cart is empty. Use shortcoe
                                    {minimum_order} to display minimum order amount for Free Shipping.</small>
                            </div>
                        </div>

                        <div class="wceazy_shipping_bar_field_group wceazy_shipping_bar_partial_order_amount_msg">
                            <label for="coupon_generator_coupon_amount">Message on Partially Completed Order Amount
                                <span style="color: #FF521D;">(Pro)</span></label>
                            <div class="field_with_msg_container">
                                <textarea disabled class="wceazy_shipping_bar_textarea_field"
                                    rows="3"><?php echo esc_attr($wceazy_sb_partial_order_amount_msg); ?></textarea>
                                <small>Message to display when user in shipping zone and cart is not empty but less then
                                    required minimum order amount. Use Short Codes like {cart_total} - The total amount
                                    of your purchases
                                    {minimum_order} - Minimum order amount for Free Shipping
                                    {missing_amount} - The outstanding amount of the free shipping program.</small>
                            </div>
                        </div>

                        <div class="wceazy_shipping_bar_field_group wceazy_shipping_bar_completed_order_amount_msg">
                            <label for="coupon_generator_coupon_amount">Message on Completed Order Amount <span
                                    style="color: #FF521D;">(Pro)</span></label>
                            <div class="field_with_msg_container">
                                <textarea disabled class="wceazy_shipping_bar_textarea_field"
                                    rows="3"><?php echo esc_attr($wceazy_sb_completed_order_amount_msg); ?></textarea>
                                <small>Message to display when user in shipping zone and cart total is eligible to get
                                    free shipping. Use the shortcode {checkout_page} to show the checkout page
                                    link.</small>
                            </div>
                        </div>



                    </div>
                </div>

                <div class="coupon_tab_body" data-id="tab_effect">
                    <div class="tab_body_title">
                        <h1>Effect Settings</h1>
                    </div>
                    <div class="tab_body_form">



                        <div class="wceazy_shipping_bar_field_group wceazy_shipping_bar_initial_delay">
                            <label for="coupon_generator_coupon_amount">Initial Delay Time <span
                                    style="color: #FF521D;">(Pro)</span></label>
                            <div class="field_with_msg_container">
                                <input disabled class="wceazy_shipping_bar_text_field" type="number" placeholder=""
                                    value="<?php echo esc_attr($wceazy_sb_initial_delay); ?>">
                                <small>Set initial delay time in mili second. The Free Shipping Bar will appear
                                    according to your setting time.</small>
                            </div>
                        </div>


                        <div class="wceazy_shipping_bar_field_group wceazy_shipping_bar_allow_disappear_time">
                            <label for="coupon_generator_coupon_amount">Allow Disappear Time <span
                                    style="color: #FF521D;">(Pro)</span></label>
                            <div class="field_with_msg_container">
                                <label class="toggle_switch"><input disabled type="checkbox" <?php echo esc_attr($wceazy_sb_allow_disappear_time == "yes" ? "checked" : ""); ?>
                                        onchange="wceazy_shipping_bar_selection_changed()"><span
                                        class="slider round"></span></label>
                                <small>Turn ON the switch to allow disappear time.</small>
                            </div>
                        </div>

                        <div class="wceazy_shipping_bar_field_group wceazy_shipping_bar_disappear_time">
                            <label for="coupon_generator_coupon_amount">Set Disappear Time <span
                                    style="color: #FF521D;">(Pro)</span></label>
                            <div class="field_with_msg_container">
                                <input disabled class="wceazy_shipping_bar_text_field" type="number" placeholder=""
                                    value="<?php echo esc_attr($wceazy_sb_disappear_time); ?>">
                                <small>Set disappear time in mili second. The Free Shipping Bar will disappear according
                                    to your setting time.</small>
                            </div>
                        </div>



                    </div>
                </div>

                <div class="coupon_tab_body" data-id="tab_style">
                    <div class="tab_body_title">
                        <h1>Customize Styles</h1>
                    </div>
                    <div class="tab_body_form">



                        <div class="wceazy_shipping_bar_field_group wceazy_shipping_bar_position">
                            <label for="coupon_generator_coupon_amount">Shipping Bar Position</label>
                            <div class="field_with_msg_container">
                                <select class="wceazy_shipping_bar_select_field">
                                    <option value=""> Please select</option>
                                    <option value="top" <?php echo esc_attr("top" == $wceazy_sb_position ? "selected" : ""); ?>> Top </option>
                                    <option value="bottom" <?php echo esc_attr("bottom" == $wceazy_sb_position ? "selected" : ""); ?>> Bottom </option>
                                </select>
                            </div>
                        </div>


                        <div class="wceazy_shipping_bar_field_group wceazy_shipping_bar_layout">
                            <label for="coupon_generator_coupon_amount">Shipping Bar Layout</label>
                            <div class="field_with_msg_container">
                                <select class="wceazy_shipping_bar_select_field"
                                    onchange="wceazy_shipping_bar_layout_auto_fill()">
                                    <option value=""> Please select</option>
                                    <option value="1" <?php echo esc_attr("1" == $wceazy_sb_layout ? "selected" : ""); ?>>
                                        Layout 1 </option>
                                    <option value="2" <?php echo esc_attr("2" == $wceazy_sb_layout ? "selected" : ""); ?>>
                                        Layout 2 </option>
                                </select>
                                <small>Choose layout to auto fill other style configurations.</small>
                            </div>
                        </div>

                        <div class="wceazy_shipping_bar_field_group wceazy_shipping_bar_bg">
                            <label for="coupon_generator_coupon_amount">Background Color <span
                                    style="color: #FF521D;">(Pro)</span></label>
                            <div class="field_with_msg_container">
                                <div class="color_picker_area">
                                    <input disabled type="color" id="wceazy_shipping_bar_bg"
                                        value="<?php echo esc_attr($wceazy_sb_bg); ?>">
                                    <label for="wceazy_shipping_bar_bg">Select Color</label>
                                </div>
                                <small>Set your free shipping bar background color.</small>
                            </div>
                        </div>

                        <div class="wceazy_shipping_bar_field_group wceazy_shipping_bar_padding_top">
                            <label for="coupon_generator_coupon_amount">Padding Top</label>
                            <div class="field_with_msg_container">
                                <input class="wceazy_shipping_bar_text_field" type="number" placeholder=""
                                    value="<?php echo esc_attr($wceazy_sb_padding_top); ?>">
                                <small>Set your free shipping bar's top padding.</small>
                            </div>
                        </div>

                        <div class="wceazy_shipping_bar_field_group wceazy_shipping_bar_padding_bottom">
                            <label for="coupon_generator_coupon_amount">Padding Bottom</label>
                            <div class="field_with_msg_container">
                                <input class="wceazy_shipping_bar_text_field" type="number" placeholder=""
                                    value="<?php echo esc_attr($wceazy_sb_padding_bottom); ?>">
                                <small>Set your free shipping bar's bottom padding.</small>
                            </div>
                        </div>


                        <div class="wceazy_shipping_bar_field_group wceazy_shipping_bar_padding_left_right">
                            <label for="coupon_generator_coupon_amount">Padding Left-Right</label>
                            <div class="field_with_msg_container">
                                <input class="wceazy_shipping_bar_text_field" type="number" placeholder=""
                                    value="<?php echo esc_attr($wceazy_sb_padding_left_right); ?>">
                                <small>Set your free shipping bar's left and right padding.</small>
                            </div>
                        </div>

                        <div class="wceazy_shipping_bar_field_group wceazy_shipping_bar_msg_text_color">
                            <label for="coupon_generator_coupon_amount">Text Color of Message <span
                                    style="color: #FF521D;">(Pro)</span></label>
                            <div class="field_with_msg_container">
                                <div class="color_picker_area">
                                    <input disabled type="color" id="wceazy_shipping_bar_msg_text_color"
                                        value="<?php echo esc_attr($wceazy_sb_msg_text_color); ?>">
                                    <label for="wceazy_shipping_bar_msg_text_color">Select Color</label>
                                </div>
                                <small>Set your free shipping bar's message text color.</small>
                            </div>
                        </div>

                        <div class="wceazy_shipping_bar_field_group wceazy_shipping_bar_msg_link_text_color">
                            <label for="coupon_generator_coupon_amount">Link Color on Message <span
                                    style="color: #FF521D;">(Pro)</span></label>
                            <div class="field_with_msg_container">
                                <div class="color_picker_area">
                                    <input disabled type="color" id="wceazy_shipping_bar_msg_link_text_color"
                                        value="<?php echo esc_attr($wceazy_sb_msg_link_text_color); ?>">
                                    <label for="wceazy_shipping_bar_msg_link_text_color">Select Color</label>
                                </div>
                                <small>Set your free shipping bar's message link text color.</small>
                            </div>
                        </div>

                        <div class="wceazy_shipping_bar_field_group wceazy_shipping_bar_msg_font_size">
                            <label for="coupon_generator_coupon_amount">Font Size of Message</label>
                            <div class="field_with_msg_container">
                                <input class="wceazy_shipping_bar_text_field" type="number" placeholder=""
                                    value="<?php echo esc_attr($wceazy_sb_msg_font_size); ?>">
                                <small>Set your free shipping bar's message font size.</small>
                            </div>
                        </div>

                        <div class="wceazy_shipping_bar_field_group wceazy_shipping_bar_msg_text_align">
                            <label for="coupon_generator_coupon_amount">Text Align of Message</label>
                            <div class="field_with_msg_container">
                                <select class="wceazy_shipping_bar_select_field">
                                    <option value=""> Please select</option>
                                    <option value="left" <?php echo esc_attr("left" == $wceazy_sb_msg_text_align ? "selected" : ""); ?>> Left </option>
                                    <option value="center" <?php echo esc_attr("center" == $wceazy_sb_msg_text_align ? "selected" : ""); ?>> Center </option>
                                    <option value="right" <?php echo esc_attr("right" == $wceazy_sb_msg_text_align ? "selected" : ""); ?>> Right </option>
                                </select>
                            </div>
                        </div>

                        <div class="wceazy_shipping_bar_field_group wceazy_shipping_bar_remove_icon">
                            <label for="coupon_generator_coupon_amount">Shipping Bar Close Icon</label>
                            <div class="field_with_msg_container">
                                <div class="icon_selection_area">
                                    <div class="icon_field_item icon_1 <?php echo esc_attr("icon_1" == $wceazy_sb_remove_icon ? "active" : ""); ?>"
                                        data-value="icon_1"></div>
                                    <div class="icon_field_item icon_2 <?php echo esc_attr("icon_2" == $wceazy_sb_remove_icon ? "active" : ""); ?>"
                                        data-value="icon_2"></div>
                                    <div class="icon_field_item icon_3 <?php echo esc_attr("icon_3" == $wceazy_sb_remove_icon ? "active" : ""); ?>"
                                        data-value="icon_3"></div>
                                    <div class="icon_field_item icon_4 <?php echo esc_attr("icon_4" == $wceazy_sb_remove_icon ? "active" : ""); ?>"
                                        data-value="icon_4"></div>
                                    <div class="icon_field_item icon_5 <?php echo esc_attr("icon_5" == $wceazy_sb_remove_icon ? "active" : ""); ?>"
                                        data-value="icon_5"></div>
                                </div>
                                <small>Please select your close icon of shipping bar.</small>
                            </div>
                        </div>

                        <div class="wceazy_shipping_bar_field_group wceazy_shipping_bar_remove_icon_color">
                            <label for="coupon_generator_coupon_amount">Close Icon Color <span
                                    style="color: #FF521D;">(Pro)</span></label>
                            <div class="field_with_msg_container">
                                <div class="color_picker_area">
                                    <input disabled type="color" id="wceazy_shipping_bar_remove_icon_color"
                                        value="<?php echo esc_attr($wceazy_sb_remove_icon_color); ?>">
                                    <label for="wceazy_shipping_bar_remove_icon_color">Select Color</label>
                                </div>
                                <small>Set your free shipping bar's close icon color.</small>
                            </div>
                        </div>

                        <div class="wceazy_shipping_bar_field_group wceazy_shipping_bar_remove_icon_size">
                            <label for="coupon_generator_coupon_amount">Close Icon Size</label>
                            <div class="field_with_msg_container">
                                <input class="wceazy_shipping_bar_text_field" type="number" placeholder=""
                                    value="<?php echo esc_attr($wceazy_sb_remove_icon_size); ?>">
                                <small>Set your free shipping bar's close icon size.</small>
                            </div>
                        </div>




                        <h4>Progress Bar Style</h4>

                        <div class="wceazy_shipping_bar_field_group wceazy_shipping_bar_enable_progress_bar">
                            <label for="coupon_generator_coupon_amount">Enable Progress Bar</label>
                            <div class="field_with_msg_container">
                                <label class="toggle_switch"><input type="checkbox" <?php echo esc_attr($wceazy_sb_enable_progress_bar == "yes" ? "checked" : ""); ?>><span
                                        class="slider round"></span></label>
                                <small>Show progress bar with free shipping bar.</small>
                            </div>
                        </div>

                        <div class="wceazy_shipping_bar_field_group wceazy_shipping_bar_progress_margin_top">
                            <label for="coupon_generator_coupon_amount">Progress Bar's Top Margin</label>
                            <div class="field_with_msg_container">
                                <input class="wceazy_shipping_bar_text_field" type="number" placeholder=""
                                    value="<?php echo esc_attr($wceazy_sb_progress_margin_top); ?>">
                                <small>Set your free shipping bar progress margin top.</small>
                            </div>
                        </div>

                        <div class="wceazy_shipping_bar_field_group wceazy_shipping_bar_progress_bar_bg">
                            <label for="coupon_generator_coupon_amount">Progress Bar's Background <span
                                    style="color: #FF521D;">(Pro)</span></label>
                            <div class="field_with_msg_container">
                                <div class="color_picker_area">
                                    <input disabled type="color" id="wceazy_shipping_bar_progress_bar_bg"
                                        value="<?php echo esc_attr($wceazy_sb_progress_bar_bg); ?>">
                                    <label for="wceazy_shipping_bar_progress_bar_bg">Select Color</label>
                                </div>
                                <small>Set your progress bar's background color.</small>
                            </div>
                        </div>

                        <div class="wceazy_shipping_bar_field_group wceazy_shipping_bar_progress_color">
                            <label for="coupon_generator_coupon_amount">Progress Bar's Color <span
                                    style="color: #FF521D;">(Pro)</span></label>
                            <div class="field_with_msg_container">
                                <div class="color_picker_area">
                                    <input disabled type="color" id="wceazy_shipping_bar_progress_color"
                                        value="<?php echo esc_attr($wceazy_sb_progress_color); ?>">
                                    <label for="wceazy_shipping_bar_progress_color">Select Color</label>
                                </div>
                                <small>Set your free shipping bar's progress color.</small>
                            </div>
                        </div>

                        <div class="wceazy_shipping_bar_field_group wceazy_shipping_bar_progress_text_color">
                            <label for="coupon_generator_coupon_amount">Progress Bar's Text Color <span
                                    style="color: #FF521D;">(Pro)</span></label>
                            <div class="field_with_msg_container">
                                <div class="color_picker_area">
                                    <input disabled type="color" id="wceazy_shipping_bar_progress_text_color"
                                        value="<?php echo esc_attr($wceazy_sb_progress_text_color); ?>">
                                    <label for="wceazy_shipping_bar_progress_text_color">Select Color</label>
                                </div>
                                <small>Set your free shipping bar's progress text color.</small>
                            </div>
                        </div>

                        <div class="wceazy_shipping_bar_field_group wceazy_shipping_bar_progress_font_size">
                            <label for="coupon_generator_coupon_amount">Progress Bar's Font Size</label>
                            <div class="field_with_msg_container">
                                <input class="wceazy_shipping_bar_text_field" type="number" placeholder=""
                                    value="<?php echo esc_attr($wceazy_sb_progress_font_size); ?>">
                                <small>Set your free shipping bar progress font size.</small>
                            </div>
                        </div>

                        <div class="wceazy_shipping_bar_field_group wceazy_shipping_bar_progress_border_radius">
                            <label for="coupon_generator_coupon_amount">Progress Bar's Border Radius</label>
                            <div class="field_with_msg_container">
                                <input class="wceazy_shipping_bar_text_field" type="number" placeholder=""
                                    value="<?php echo esc_attr($wceazy_sb_progress_border_radius); ?>">
                                <small>Set your free shipping bar progress border radius.</small>
                            </div>
                        </div>





                    </div>
                </div>



            </div>
        </div>


        <div class="wceazy_shipping_bar_bottom_button_section">
            <button onclick="wceazy_shipping_bar_save();">Save Settings</button>
        </div>



    </div>

</div>