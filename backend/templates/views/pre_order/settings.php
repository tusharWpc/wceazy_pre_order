<?php

$wceazy_pre_order_settings = get_option('wceazy_pre_order_settings', False);
$wceazy_po_settings = $wceazy_pre_order_settings ? json_decode($wceazy_pre_order_settings, true) : array();

    // echo "<pre>";
    // var_dump($wceazy_po_settings);
    // echo "</pre>";
 

$wceazy_po_enable_pre_order = isset($wceazy_po_settings["enable_pre_order"]) ? $wceazy_po_settings["enable_pre_order"] : "yes";
 
$wceazy_po_pre_order_btn_text = isset($wceazy_po_settings["pre_order_btn_text"]) ? $wceazy_po_settings["pre_order_btn_text"] : "PreOrder Now!";

// echo "<pre>";
// var_dump($wceazy_po_pre_order_btn_text);
// echo "</pre>";


$wceazy_po_display_desktop = isset($wceazy_po_settings["display_desktop"]) ? $wceazy_po_settings["display_desktop"] : "yes";
$wceazy_po_display_mobile = isset($wceazy_po_settings["display_mobile"]) ? $wceazy_po_settings["display_mobile"] : "yes";
$wceazy_po_Pre_Order_zone = isset($wceazy_po_settings["Pre_Order_zone"]) ? $wceazy_po_settings["Pre_Order_zone"] : "";
$wceazy_po_dont_show_pages = isset($wceazy_po_settings["dont_show_pages"]) ? explode(",", $wceazy_po_settings["dont_show_pages"]) : array();
$wceazy_po_exclude_products = isset($wceazy_po_settings["exclude_products"]) ? explode(",", $wceazy_po_settings["exclude_products"]) : array();


$wceazy_po_show_in_cart = isset($wceazy_po_settings["show_in_cart"]) ? $wceazy_po_settings["show_in_cart"] : "yes";
$wceazy_po_position_cart_subtotal = isset($wceazy_po_settings["position_cart_subtotal"]) ? $wceazy_po_settings["position_cart_subtotal"] : "woocommerce_cart_totals_before_Pre_Order";
$wceazy_po_show_in_checkout = isset($wceazy_po_settings["show_in_checkout"]) ? $wceazy_po_settings["show_in_checkout"] : "yes";
$wceazy_po_position_checkout_subtotal = isset($wceazy_po_settings["position_checkout_subtotal"]) ? $wceazy_po_settings["position_checkout_subtotal"] : "woocommerce_review_order_before_Pre_Order";
$wceazy_po_pre_order_headline = isset($wceazy_po_settings["pre_order_headline"]) ? $wceazy_po_settings["pre_order_headline"] : "Free Pre_Order";
$wceazy_po_pre_order_progress_bar_bg = isset($wceazy_po_settings["pre_order_progress_bar_bg"]) ? $wceazy_po_settings["pre_order_progress_bar_bg"] : "#0A9663";
$wceazy_po_pre_order_progress_color = isset($wceazy_po_settings["pre_order_progress_color"]) ? $wceazy_po_settings["pre_order_progress_color"] : "#000000";
$wceazy_po_pre_order_progress_text_color = isset($wceazy_po_settings["pre_order_progress_text_color"]) ? $wceazy_po_settings["pre_order_progress_text_color"] : "#ffffff";


$wceazy_po_zero_order_amount_msg = isset($wceazy_po_settings["zero_order_amount_msg"]) ? $wceazy_po_settings["zero_order_amount_msg"] : "Start placing order of minimum {minimum_order} to apply free Pre_Order";
$wceazy_po_partial_order_amount_msg = isset($wceazy_po_settings["partial_order_amount_msg"]) ? $wceazy_po_settings["partial_order_amount_msg"] : "You have purchased {cart_total} of {minimum_order} , Buy {missing_amount} worth products more to get the free Pre_Order";
$wceazy_po_completed_order_amount_msg = isset($wceazy_po_settings["completed_order_amount_msg"]) ? $wceazy_po_settings["completed_order_amount_msg"] : "You are now qualified for the Free Pre_Order, go to {checkout_page}";

$wceazy_po_initial_delay = isset($wceazy_po_settings["initial_delay"]) ? $wceazy_po_settings["initial_delay"] : "0";
$wceazy_po_allow_disappear_time = isset($wceazy_po_settings["allow_disappear_time"]) ? $wceazy_po_settings["allow_disappear_time"] : "no";
$wceazy_po_disappear_time = isset($wceazy_po_settings["disappear_time"]) ? $wceazy_po_settings["disappear_time"] : "0";

$wceazy_po_position = isset($wceazy_po_settings["position"]) ? $wceazy_po_settings["position"] : "top";
$wceazy_po_layout = isset($wceazy_po_settings["layout"]) ? $wceazy_po_settings["layout"] : "1";
$wceazy_po_bg = isset($wceazy_po_settings["bg"]) ? $wceazy_po_settings["bg"] : "#0A9663";
$wceazy_po_padding_top = isset($wceazy_po_settings["padding_top"]) ? $wceazy_po_settings["padding_top"] : "10";
$wceazy_po_padding_bottom = isset($wceazy_po_settings["padding_bottom"]) ? $wceazy_po_settings["padding_bottom"] : "10";
$wceazy_po_padding_left_right = isset($wceazy_po_settings["padding_left_right"]) ? $wceazy_po_settings["padding_left_right"] : "120";
$wceazy_po_msg_text_color = isset($wceazy_po_settings["msg_text_color"]) ? $wceazy_po_settings["msg_text_color"] : "#ffffff";
$wceazy_po_msg_link_text_color = isset($wceazy_po_settings["msg_link_text_color"]) ? $wceazy_po_settings["msg_link_text_color"] : "#ffffff";
$wceazy_po_msg_font_size = isset($wceazy_po_settings["msg_font_size"]) ? $wceazy_po_settings["msg_font_size"] : "16";
$wceazy_po_msg_text_align = isset($wceazy_po_settings["msg_text_align"]) ? $wceazy_po_settings["msg_text_align"] : "center";
$wceazy_po_remove_icon = isset($wceazy_po_settings["remove_icon"]) ? $wceazy_po_settings["remove_icon"] : "icon_1";
$wceazy_po_remove_icon_color = isset($wceazy_po_settings["remove_icon_color"]) ? $wceazy_po_settings["remove_icon_color"] : "#ffffff";
$wceazy_po_remove_icon_size = isset($wceazy_po_settings["remove_icon_size"]) ? $wceazy_po_settings["remove_icon_size"] : "16";
$wceazy_po_enable_progress_bar = isset($wceazy_po_settings["enable_progress_bar"]) ? $wceazy_po_settings["enable_progress_bar"] : "yes";
$wceazy_po_progress_margin_top = isset($wceazy_po_settings["progress_margin_top"]) ? $wceazy_po_settings["progress_margin_top"] : "5";
$wceazy_po_progress_bar_bg = isset($wceazy_po_settings["progress_bar_bg"]) ? $wceazy_po_settings["progress_bar_bg"] : "#ffffff";
$wceazy_po_progress_color = isset($wceazy_po_settings["progress_color"]) ? $wceazy_po_settings["progress_color"] : "#000000";
$wceazy_po_progress_text_color = isset($wceazy_po_settings["progress_text_color"]) ? $wceazy_po_settings["progress_text_color"] : "#ffffff";
$wceazy_po_progress_font_size = isset($wceazy_po_settings["progress_font_size"]) ? $wceazy_po_settings["progress_font_size"] : "15";
$wceazy_po_progress_border_radius = isset($wceazy_po_settings["progress_border_radius"]) ? $wceazy_po_settings["progress_border_radius"] : "20";

?>


<div id="wceazy_pre_order">
    <div class="wceazy_pre_order_header">
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

    <div class="wceazy_pre_order_page_title">
        <div class="page_title_part_left">
            <h2>
                <?php esc_html_e('Pre Order', 'wceazy'); ?>
            </h2>
            <a target="_blank" href="<?php echo WCEAZY_DOCS_PAGE; ?>">
                <?php esc_html_e('Documentation', 'wceazy'); ?>
            </a>
        </div>
        <div class="page_title_part_right">
            <button class="wceazy_pre_order_back_to_dashboard_btn"
                onclick="wceazy_modules_page_init(`<?php echo esc_url(WCEAZY_URL); ?>`)">
                <?php esc_html_e('Back to all Modules', 'wceazy'); ?>
            </button>
        </div>
    </div>



    <div class="wceazy_pre_order_container">

        <div class="wceazy_pre_order_tab">
            <div class="wceazy_pre_order_tab_part_left">
                <div class="coupon_data_tabs">
                    <div class="tab_item tab_item_active" data-target="tab_general">
                        <h1>
                            <?php esc_html_e('General', 'wceazy'); ?>
                        </h1>
                    </div>
                    <!-- <div class="tab_item" data-target="tab_text">
                        <h1>
                            <?php esc_html_e('Text & Labels', 'wceazy'); ?>
                        </h1>
                    </div> -->
                    <!-- <div class="tab_item" data-target="tab_messages">
                        <h1>
                            <?php esc_html_e('Messages', 'wceazy'); ?>
                        </h1>
                    </div>
                    <div class="tab_item" data-target="tab_email">
                        <h1>
                            <?php esc_html_e('Email', 'wceazy'); ?>
                        </h1>
                    </div>
                    <div class="tab_item" data-target="tab_effect">
                        <h1>
                            <?php esc_html_e('Notifications', 'wceazy'); ?>
                        </h1>
                    </div>
                    <div class="tab_item" data-target="tab_style">
                        <h1>
                            <?php esc_html_e('Style', 'wceazy'); ?>
                        </h1>
                    </div> -->
                </div>
            </div>

            <div class="wceazy_pre_order_tab_part_right">

                <div class="coupon_tab_body" data-id="tab_general">
                    <div class="tab_body_title">
                        <h1>
                            <?php esc_html_e('General Settings', 'wceazy'); ?>
                        </h1> 
                    </div>
                    <div class="tab_body_form">

                        <div class="wceazy_pre_order_field_group wceazy_pre_order_btn_text">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Button Text', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <input class="wceazy_pre_order_text_field" type="text" placeholder=""
                                    value="<?php echo esc_attr($wceazy_po_pre_order_btn_text); ?>">
                                <small>
                                    <?php esc_html_e('Set your Pre Order button text', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <!-- <div class="wceazy_pre_order_field_group wceazy_pre_order_enable_pre_order">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Enable Pre Order', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <label class="toggle_switch"><input type="checkbox"
                                        <?php echo esc_attr($wceazy_po_enable_pre_order == "yes" ? "checked" : ""); ?>><span
                                        class="slider round"></span></label>
                                <small>
                                    <?php esc_html_e('Turn ON the switch to enable the Pre Order.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div> -->

                        <!-- <div class="wceazy_pre_order_field_group wceazy_pre_order_display_desktop">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Display in Desktop', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <label class="toggle_switch"><input type="checkbox"
                                        <?php echo esc_attr($wceazy_po_display_desktop == "yes" ? "checked" : ""); ?>><span
                                        class="slider round"></span></label>
                                <small>
                                    <?php esc_html_e('Switch ON to display Pre Order on Desktop.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div> -->

                        <!-- <div class="wceazy_pre_order_field_group wceazy_pre_order_display_mobile">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Display in Mobile', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <label class="toggle_switch"><input type="checkbox"
                                        <?php echo esc_attr($wceazy_po_display_mobile == "yes" ? "checked" : ""); ?>><span
                                        class="slider round"></span></label>
                                <small>
                                    <?php esc_html_e('Switch ON to display Pre Order on mobile.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div> -->

                    </div>
                </div>

                <div class="coupon_tab_body" data-id="tab_text">
                    <div class="tab_body_title">
                        <h1>
                            <?php esc_html_e('Text & Labels Page Settings', 'wceazy'); ?>
                        </h1>
                    </div>
                    <div class="tab_body_form">
                        <h4>
                            <?php esc_html_e('Cart Page', 'wceazy'); ?>
                        </h4>

                        <div class="wceazy_pre_order_field_group wceazy_pre_order_show_in_cart">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Cart Total', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <label class="toggle_switch"><input type="checkbox"
                                        <?php echo esc_attr($wceazy_po_show_in_cart == "yes" ? "checked" : ""); ?>><span
                                        class="slider round"></span></label>
                                <small>
                                    <?php esc_html_e('Turn on the switch to show the free Pre_Order message in the shopping cart.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div class="wceazy_pre_order_field_group wceazy_pre_order_position_cart_subtotal">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Choose spot on cart page.', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <select class="wceazy_pre_order_select_field">
                                    <option value="">
                                        <?php esc_html_e('Please select', 'wceazy'); ?>
                                    </option>
                                    <option value="woocommerce_cart_totals_before_Pre_Order"
                                        <?php echo esc_attr("woocommerce_cart_totals_before_Pre_Order" == $wceazy_po_position_cart_subtotal ? "selected" : ""); ?>>
                                        <?php esc_html_e('Before Pre_Order block', 'wceazy'); ?>
                                    </option>
                                    <option value="woocommerce_cart_totals_after_Pre_Order"
                                        <?php echo esc_attr("woocommerce_cart_totals_after_Pre_Order" == $wceazy_po_position_cart_subtotal ? "selected" : ""); ?>>
                                        <?php esc_html_e('After Pre_Order block', 'wceazy'); ?>
                                    </option>
                                </select>
                                <small>
                                    <?php esc_html_e('Select position of the free Pre_Order notification in cart page.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <h4>
                            <?php esc_html_e('Checkout Page', 'wceazy'); ?>
                        </h4>

                        <div class="wceazy_pre_order_field_group wceazy_pre_order_show_in_checkout">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Display in Total Cost Area', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <label class="toggle_switch"><input type="checkbox"
                                        <?php echo esc_attr($wceazy_po_show_in_checkout == "yes" ? "checked" : ""); ?>><span
                                        class="slider round"></span></label>
                                <small>
                                    <?php esc_html_e('Turn ON the switch to show the free Pre_Order notification in checkout subtotal area.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div class="wceazy_pre_order_field_group wceazy_pre_order_position_checkout_subtotal">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Select Position on Checkout Page', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <select class="wceazy_pre_order_select_field">
                                    <option value="">
                                        <?php esc_html_e('Please select', 'wceazy'); ?>
                                    </option>
                                    <option value="woocommerce_review_order_before_Pre_Order"
                                        <?php echo esc_attr("woocommerce_review_order_before_Pre_Order" == $wceazy_po_position_checkout_subtotal ? "selected" : ""); ?>>
                                        <?php esc_html_e('Before Pre_Order block', 'wceazy'); ?>
                                    </option>
                                    <option value="woocommerce_review_order_after_Pre_Order"
                                        <?php echo esc_attr("woocommerce_review_order_after_Pre_Order" == $wceazy_po_position_checkout_subtotal ? "selected" : ""); ?>>
                                        <?php esc_html_e('After Pre_Order block', 'wceazy'); ?>
                                    </option>
                                </select>
                                <small>
                                    <?php esc_html_e('Select position where the free Pre_Order notification will be displayed on checkout page.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <h4>
                            <?php esc_html_e('Style', 'wceazy'); ?>
                        </h4>

                        <div class="wceazy_pre_order_field_group wceazy_Pre_Order_headline">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Headline Text', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <input class="wceazy_pre_order_text_field" type="text" placeholder=""
                                    value="<?php echo esc_attr($wceazy_po_pre_order_headline); ?>">
                                <small>
                                    <?php esc_html_e('Enter cart & checkout page free Pre_Order progress bar headline text.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div class="wceazy_pre_order_field_group wceazy_Pre_Order_progress_bar_bg">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Progress Bar\'s Background', 'wceazy'); ?>
                                <span style="color: #FF521D;">
                                    <?php esc_html_e('(Pro)', 'wceazy'); ?>
                                </span>
                            </label>
                            <div class="field_with_msg_container">
                                <div class="color_picker_area">
                                    <input disabled type="color" id="wceazy_Pre_Order_progress_bar_bg"
                                        value="<?php echo esc_attr($wceazy_po_pre_order_progress_bar_bg); ?>">
                                    <label for="wceazy_Pre_Order_progress_bar_bg">
                                        <?php esc_html_e('Select Color', 'wceazy'); ?>
                                    </label>
                                </div>
                                <small>
                                    <?php esc_html_e('Set your progress bar\'s background color.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div class="wceazy_pre_order_field_group wceazy_Pre_Order_progress_color">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Progress Bar\'s Color', 'wceazy'); ?>
                                <span style="color: #FF521D;">
                                    <?php esc_html_e('(Pro)', 'wceazy'); ?>
                                </span>
                            </label>
                            <div class="field_with_msg_container">
                                <div class="color_picker_area">
                                    <input disabled type="color" id="wceazy_Pre_Order_progress_color"
                                        value="<?php echo esc_attr($wceazy_po_pre_order_progress_color); ?>">
                                    <label for="wceazy_Pre_Order_progress_color">
                                        <?php esc_html_e('Select Color', 'wceazy'); ?>
                                    </label>
                                </div>
                                <small>
                                    <?php esc_html_e('Set your free Pre Order\'s progress color.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div class="wceazy_pre_order_field_group wceazy_Pre_Order_progress_text_color">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Progress Bar\'s Text Color', 'wceazy'); ?>
                                <span style="color: #FF521D;">
                                    <?php esc_html_e('(Pro)', 'wceazy'); ?>
                                </span>
                            </label>
                            <div class="field_with_msg_container">
                                <div class="color_picker_area">
                                    <input disabled type="color" id="wceazy_Pre_Order_progress_text_color"
                                        value="<?php echo esc_attr($wceazy_po_pre_order_progress_text_color); ?>">
                                    <label for="wceazy_Pre_Order_progress_text_color">
                                        <?php esc_html_e('Select Color', 'wceazy'); ?>
                                    </label>
                                </div>
                                <small>
                                    <?php esc_html_e('Set your free Pre Order\'s progress text color.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="coupon_tab_body" data-id="tab_messages">
                    <div class="tab_body_title">
                        <h1>
                            <?php esc_html_e('Customize Messages', 'wceazy'); ?>
                        </h1>
                    </div>
                    <div class="tab_body_form">

                        <div class="wceazy_pre_order_field_group wceazy_pre_order_zero_order_amount_msg">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Message on Zero Order Amount', 'wceazy'); ?>
                                <span style="color: #FF521D;">
                                    <?php esc_html_e('(Pro)', 'wceazy'); ?>
                                </span>
                            </label>
                            <div class="field_with_msg_container">
                                <textarea disabled class="wceazy_pre_order_textarea_field"
                                    rows="3"><?php echo esc_attr($wceazy_po_zero_order_amount_msg); ?></textarea>
                                <small>
                                    <?php esc_html_e('"Empty Cart in Pre_Order Zone: Add items to qualify for Free Pre_Order ({minimum_order})."', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div class="wceazy_pre_order_field_group wceazy_pre_order_partial_order_amount_msg">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Message on Partially Completed Order Amount', 'wceazy'); ?>
                                <span style="color: #FF521D;">
                                    <?php esc_html_e('(Pro)', 'wceazy'); ?>
                                </span>
                            </label>
                            <div class="field_with_msg_container">
                                <textarea disabled class="wceazy_pre_order_textarea_field"
                                    rows="3"><?php echo esc_attr($wceazy_po_partial_order_amount_msg); ?></textarea>
                                <small>
                                    <?php esc_html_e('Pre_Order Alert: Add {missing_amount} for Free Pre_Order (Min. order: {minimum_order}, Current total: {cart_total}).', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div class="wceazy_pre_order_field_group wceazy_pre_order_completed_order_amount_msg">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Message on Completed Order Amount', 'wceazy'); ?>
                                <span style="color: #FF521D;">
                                    <?php esc_html_e('(Pro)', 'wceazy'); ?>
                                </span>
                            </label>
                            <div class="field_with_msg_container">
                                <textarea disabled class="wceazy_pre_order_textarea_field"
                                    rows="3"><?php echo esc_attr($wceazy_po_completed_order_amount_msg); ?></textarea>
                                <small>
                                    <?php esc_html_e('Free Pre_Order Alert: Your order qualifies! Click {checkout_page} to proceed.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="coupon_tab_body" data-id="tab_email">
                    <div class="tab_body_title">
                        <h1>
                            <?php esc_html_e('Customize Email Templates', 'wceazy'); ?>
                        </h1>
                    </div>
                    <div class="tab_body_form">

                        <div class="wceazy_pre_order_field_group wceazy_pre_order_zero_order_amount_msg">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Message on Zero Order Amount', 'wceazy'); ?>
                                <span style="color: #FF521D;">
                                    <?php esc_html_e('(Pro)', 'wceazy'); ?>
                                </span>
                            </label>
                            <div class="field_with_msg_container">
                                <textarea disabled class="wceazy_pre_order_textarea_field"
                                    rows="3"><?php echo esc_attr($wceazy_po_zero_order_amount_msg); ?></textarea>
                                <small>
                                    <?php esc_html_e('"Empty Cart in Pre_Order Zone: Add items to qualify for Free Pre_Order ({minimum_order})."', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div class="wceazy_pre_order_field_group wceazy_pre_order_partial_order_amount_msg">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Message on Partially Completed Order Amount', 'wceazy'); ?>
                                <span style="color: #FF521D;">
                                    <?php esc_html_e('(Pro)', 'wceazy'); ?>
                                </span>
                            </label>
                            <div class="field_with_msg_container">
                                <textarea disabled class="wceazy_pre_order_textarea_field"
                                    rows="3"><?php echo esc_attr($wceazy_po_partial_order_amount_msg); ?></textarea>
                                <small>
                                    <?php esc_html_e('Pre_Order Alert: Add {missing_amount} for Free Pre_Order (Min. order: {minimum_order}, Current total: {cart_total}).', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div class="wceazy_pre_order_field_group wceazy_pre_order_completed_order_amount_msg">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Message on Completed Order Amount', 'wceazy'); ?>
                                <span style="color: #FF521D;">
                                    <?php esc_html_e('(Pro)', 'wceazy'); ?>
                                </span>
                            </label>
                            <div class="field_with_msg_container">
                                <textarea disabled class="wceazy_pre_order_textarea_field"
                                    rows="3"><?php echo esc_attr($wceazy_po_completed_order_amount_msg); ?></textarea>
                                <small>
                                    <?php esc_html_e('Free Pre_Order Alert: Your order qualifies! Click {checkout_page} to proceed.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="coupon_tab_body" data-id="tab_effect">
                    <div class="tab_body_title">
                        <h1>
                            <?php esc_html_e('Notifications Settings', 'wceazy'); ?>
                        </h1>
                    </div>
                    <div class="tab_body_form">
                        <div class="wceazy_pre_order_field_group wceazy_pre_order_initial_delay">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Initial Delay Time', 'wceazy'); ?>
                                <span style="color: #FF521D;">
                                    <?php esc_html_e('(Pro)', 'wceazy'); ?>
                                </span>
                            </label>
                            <div class="field_with_msg_container">
                                <input disabled class="wceazy_pre_order_text_field" type="number" placeholder=""
                                    value="<?php echo esc_attr($wceazy_po_initial_delay); ?>">
                                <small>
                                    <?php esc_html_e('Set the time delay for Free Pre Order to decide when it appears in milliseconds.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div class="wceazy_pre_order_field_group wceazy_pre_order_allow_disappear_time">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Allow Disappear Time', 'wceazy'); ?>
                                <span style="color: #FF521D;">
                                    <?php esc_html_e('(Pro)', 'wceazy'); ?>
                                </span>
                            </label>
                            <div class="field_with_msg_container">
                                <label class="toggle_switch"><input disabled type="checkbox"
                                        <?php echo esc_attr($wceazy_po_allow_disappear_time == "yes" ? "checked" : ""); ?>
                                        onchange="wceazy_pre_order_selection_changed()"><span
                                        class="slider round"></span></label>
                                <small>
                                    <?php esc_html_e('Turn ON the switch to allow disappear time.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div class="wceazy_pre_order_field_group wceazy_pre_order_disappear_time">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Set Disappear Time', 'wceazy'); ?>
                                <span style="color: #FF521D;">
                                    <?php esc_html_e('(Pro)', 'wceazy'); ?>
                                </span>
                            </label>
                            <div class="field_with_msg_container">
                                <input disabled class="wceazy_pre_order_text_field" type="number" placeholder=""
                                    value="<?php echo esc_attr($wceazy_po_disappear_time); ?>">
                                <small>
                                    <?php esc_html_e('Set disappear time in milliseconds. The Free Pre Order will disappear according to your setting time.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="coupon_tab_body" data-id="tab_style">
                    <div class="tab_body_title">
                        <h1>
                            <?php esc_html_e('Customize Styles', 'wceazy'); ?>
                        </h1>
                    </div>
                    <div class="tab_body_form">

                        <div class="wceazy_pre_order_field_group wceazy_pre_order_position">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Pre Order Position', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <select class="wceazy_pre_order_select_field">
                                    <option value="">
                                        <?php esc_html_e('Please select', 'wceazy'); ?>
                                    </option>
                                    <option value="top"
                                        <?php echo esc_attr("top" == $wceazy_po_position ? "selected" : ""); ?>>
                                        <?php esc_html_e('Top', 'wceazy'); ?>
                                    </option>
                                    <option value="bottom"
                                        <?php echo esc_attr("bottom" == $wceazy_po_position ? "selected" : ""); ?>>
                                        <?php esc_html_e('Bottom', 'wceazy'); ?>
                                    </option>
                                </select>
                            </div>
                        </div>


                        <div class="wceazy_pre_order_field_group wceazy_pre_order_layout">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Pre Order Layout', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <select class="wceazy_pre_order_select_field"
                                    onchange="wceazy_pre_order_layout_auto_fill()">
                                    <option value="">
                                        <?php esc_html_e('Please select', 'wceazy'); ?>
                                    </option>
                                    <option value="1"
                                        <?php echo esc_attr("1" == $wceazy_po_layout ? "selected" : ""); ?>>
                                        <?php esc_html_e('Layout 1', 'wceazy'); ?>
                                    </option>
                                    <option value="2"
                                        <?php echo esc_attr("2" == $wceazy_po_layout ? "selected" : ""); ?>>
                                        <?php esc_html_e('Layout 2', 'wceazy'); ?>
                                    </option>
                                </select>
                                <small>
                                    <?php esc_html_e('Choose layout to auto fill other style configurations.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div class="wceazy_pre_order_field_group wceazy_pre_order_bg">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Background Color', 'wceazy'); ?>
                                <span style="color: #FF521D;">
                                    <?php esc_html_e('(Pro)', 'wceazy'); ?>
                                </span>
                            </label>
                            <div class="field_with_msg_container">
                                <div class="color_picker_area">
                                    <input disabled type="color" id="wceazy_pre_order_bg"
                                        value="<?php echo esc_attr($wceazy_po_bg); ?>">
                                    <label for="wceazy_pre_order_bg">
                                        <?php esc_html_e('Select Color', 'wceazy'); ?>
                                    </label>
                                </div>
                                <small>
                                    <?php esc_html_e('Set your free Pre Order background color.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div class="wceazy_pre_order_field_group wceazy_pre_order_padding_top">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Padding Top', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <input class="wceazy_pre_order_text_field" type="number" placeholder=""
                                    value="<?php echo esc_attr($wceazy_po_padding_top); ?>">
                                <small>
                                    <?php esc_html_e('Set your free Pre Order\'s top padding.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div class="wceazy_pre_order_field_group wceazy_pre_order_padding_bottom">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Padding Bottom', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <input class="wceazy_pre_order_text_field" type="number" placeholder=""
                                    value="<?php echo esc_attr($wceazy_po_padding_bottom); ?>">
                                <small>
                                    <?php esc_html_e('Set your free Pre Order\'s bottom padding.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div class="wceazy_pre_order_field_group wceazy_pre_order_padding_left_right">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Padding Left-Right', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <input class="wceazy_pre_order_text_field" type="number" placeholder=""
                                    value="<?php echo esc_attr($wceazy_po_padding_left_right); ?>">
                                <small>
                                    <?php esc_html_e('Set your free Pre Order\'s left and right padding.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>


                        <div class="wceazy_pre_order_field_group wceazy_pre_order_msg_text_color">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Text Color of Message', 'wceazy'); ?>
                                <span style="color: #FF521D;">
                                    <?php esc_html_e('(Pro)', 'wceazy'); ?>
                                </span>
                            </label>
                            <div class="field_with_msg_container">
                                <div class="color_picker_area">
                                    <input disabled type="color" id="wceazy_pre_order_msg_text_color"
                                        value="<?php echo esc_attr($wceazy_po_msg_text_color); ?>">
                                    <label for="wceazy_pre_order_msg_text_color">
                                        <?php esc_html_e('Select Color', 'wceazy'); ?>
                                    </label>
                                </div>
                                <small>
                                    <?php esc_html_e('Set your free Pre Order\'s message text color.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div class="wceazy_pre_order_field_group wceazy_pre_order_msg_link_text_color">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Link Color on Message', 'wceazy'); ?>
                                <span style="color: #FF521D;">
                                    <?php esc_html_e('(Pro)', 'wceazy'); ?>
                                </span>
                            </label>
                            <div class="field_with_msg_container">
                                <div class="color_picker_area">
                                    <input disabled type="color" id="wceazy_pre_order_msg_link_text_color"
                                        value="<?php echo esc_attr($wceazy_po_msg_link_text_color); ?>">
                                    <label for="wceazy_pre_order_msg_link_text_color">
                                        <?php esc_html_e('Select Color', 'wceazy'); ?>
                                    </label>
                                </div>
                                <small>
                                    <?php esc_html_e('Set your free Pre Order\'s message link text color.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div class="wceazy_pre_order_field_group wceazy_pre_order_msg_font_size">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Font Size of Message', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <input class="wceazy_pre_order_text_field" type="number" placeholder=""
                                    value="<?php echo esc_attr($wceazy_po_msg_font_size); ?>">
                                <small>
                                    <?php esc_html_e('Set your free Pre Order\'s message font size.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>


                        <div class="wceazy_pre_order_field_group wceazy_pre_order_msg_text_align">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Text Align of Message', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <select class="wceazy_pre_order_select_field">
                                    <option value="">
                                        <?php esc_html_e('Please select', 'wceazy'); ?>
                                    </option>
                                    <option value="left"
                                        <?php echo esc_attr("left" == $wceazy_po_msg_text_align ? "selected" : ""); ?>>
                                        <?php esc_html_e('Left', 'wceazy'); ?>
                                    </option>
                                    <option value="center"
                                        <?php echo esc_attr("center" == $wceazy_po_msg_text_align ? "selected" : ""); ?>>
                                        <?php esc_html_e('Center', 'wceazy'); ?>
                                    </option>
                                    <option value="right"
                                        <?php echo esc_attr("right" == $wceazy_po_msg_text_align ? "selected" : ""); ?>>
                                        <?php esc_html_e('Right', 'wceazy'); ?>
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="wceazy_pre_order_field_group wceazy_pre_order_remove_icon">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Pre Order Close Icon', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <div class="icon_selection_area">
                                    <div class="icon_field_item icon_1 <?php echo esc_attr("icon_1" == $wceazy_po_remove_icon ? "active" : ""); ?>"
                                        data-value="icon_1"></div>
                                    <div class="icon_field_item icon_2 <?php echo esc_attr("icon_2" == $wceazy_po_remove_icon ? "active" : ""); ?>"
                                        data-value="icon_2"></div>
                                    <div class="icon_field_item icon_3 <?php echo esc_attr("icon_3" == $wceazy_po_remove_icon ? "active" : ""); ?>"
                                        data-value="icon_3"></div>
                                    <div class="icon_field_item icon_4 <?php echo esc_attr("icon_4" == $wceazy_po_remove_icon ? "active" : ""); ?>"
                                        data-value="icon_4"></div>
                                    <div class="icon_field_item icon_5 <?php echo esc_attr("icon_5" == $wceazy_po_remove_icon ? "active" : ""); ?>"
                                        data-value="icon_5"></div>
                                </div>
                                <small>
                                    <?php esc_html_e('Please select your close icon of Pre Order.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div class="wceazy_pre_order_field_group wceazy_pre_order_remove_icon_color">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Close Icon Color', 'wceazy'); ?>
                                <span style="color: #FF521D;">
                                    <?php esc_html_e('(Pro)', 'wceazy'); ?>
                                </span>
                            </label>
                            <div class="field_with_msg_container">
                                <div class="color_picker_area">
                                    <input disabled type="color" id="wceazy_pre_order_remove_icon_color"
                                        value="<?php echo esc_attr($wceazy_po_remove_icon_color); ?>">
                                    <label for="wceazy_pre_order_remove_icon_color">
                                        <?php esc_html_e('Select Color', 'wceazy'); ?>
                                    </label>
                                </div>
                                <small>
                                    <?php esc_html_e('Set your free Pre Order\'s close icon color.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>


                        <div class="wceazy_pre_order_field_group wceazy_pre_order_remove_icon_size">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Close Icon Size', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <input class="wceazy_pre_order_text_field" type="number" placeholder=""
                                    value="<?php echo esc_attr($wceazy_po_remove_icon_size); ?>">
                                <small>
                                    <?php esc_html_e('Set your free Pre Order\'s close icon size.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <h4>
                            <?php esc_html_e('Progress Bar Style', 'wceazy'); ?>
                        </h4>

                        <div class="wceazy_pre_order_field_group wceazy_pre_order_enable_progress_bar">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Enable Progress Bar', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <label class="toggle_switch"><input type="checkbox"
                                        <?php echo esc_attr($wceazy_po_enable_progress_bar == "yes" ? "checked" : ""); ?>><span
                                        class="slider round"></span></label>
                                <small>
                                    <?php esc_html_e('Show progress bar with free Pre Order.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div class="wceazy_pre_order_field_group wceazy_pre_order_progress_margin_top">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Progress Bar\'s Top Margin', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <input class="wceazy_pre_order_text_field" type="number" placeholder=""
                                    value="<?php echo esc_attr($wceazy_po_progress_margin_top); ?>">
                                <small>
                                    <?php esc_html_e('Set your free Pre Order progress margin top.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div class="wceazy_pre_order_field_group wceazy_pre_order_progress_bar_bg">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Progress Bar\'s Background', 'wceazy'); ?>
                                <span style="color: #FF521D;">
                                    <?php esc_html_e('(Pro)', 'wceazy'); ?>
                                </span>
                            </label>
                            <div class="field_with_msg_container">
                                <div class="color_picker_area">
                                    <input disabled type="color" id="wceazy_pre_order_progress_bar_bg"
                                        value="<?php echo esc_attr($wceazy_po_progress_bar_bg); ?>">
                                    <label for="wceazy_pre_order_progress_bar_bg">
                                        <?php esc_html_e('Select Color', 'wceazy'); ?>
                                    </label>
                                </div>
                                <small>
                                    <?php esc_html_e('Set your progress bar\'s background color.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div class="wceazy_pre_order_field_group wceazy_pre_order_progress_color">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Progress Bar\'s Color', 'wceazy'); ?>
                                <span style="color: #FF521D;">
                                    <?php esc_html_e('(Pro)', 'wceazy'); ?>
                                </span>
                            </label>
                            <div class="field_with_msg_container">
                                <div class="color_picker_area">
                                    <input disabled type="color" id="wceazy_pre_order_progress_color"
                                        value="<?php echo esc_attr($wceazy_po_progress_color); ?>">
                                    <label for="wceazy_pre_order_progress_color">
                                        <?php esc_html_e('Select Color', 'wceazy'); ?>
                                    </label>
                                </div>
                                <small>
                                    <?php esc_html_e('Set your free Pre Order\'s progress color.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>


                        <div class="wceazy_pre_order_field_group wceazy_pre_order_progress_text_color">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e("Progress Bar's Text Color", 'wceazy'); ?>
                                <span style="color: #FF521D;">
                                    <?php esc_html_e('(Pro)', 'wceazy'); ?>
                                </span>
                            </label>
                            <div class="field_with_msg_container">
                                <div class="color_picker_area">
                                    <input disabled type="color" id="wceazy_pre_order_progress_text_color"
                                        value="<?php echo esc_attr($wceazy_po_progress_text_color); ?>">
                                    <label for="wceazy_pre_order_progress_text_color">
                                        <?php esc_html_e('Select Color', 'wceazy'); ?>
                                    </label>
                                </div>
                                <small>
                                    <?php esc_html_e('Set your free Pre Order\'s progress text color.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div class="wceazy_pre_order_field_group wceazy_pre_order_progress_font_size">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e("Progress Bar's Font Size", 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <input class="wceazy_pre_order_text_field" type="number" placeholder=""
                                    value="<?php echo esc_attr($wceazy_po_progress_font_size); ?>">
                                <small>
                                    <?php esc_html_e('Set your free Pre Order progress font size.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div class="wceazy_pre_order_field_group wceazy_pre_order_progress_border_radius">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e("Progress Bar's Border Radius", 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <input class="wceazy_pre_order_text_field" type="number" placeholder=""
                                    value="<?php echo esc_attr($wceazy_po_progress_border_radius); ?>">
                                <small>
                                    <?php esc_html_e('Set your free Pre Order progress border radius.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="wceazy_pre_order_bottom_button_section">
            <button onclick="wceazy_pre_order_save();">
                <?php esc_html_e('Save Settings', 'wceazy'); ?>
            </button>
        </div>



    </div>

</div>