<?php

$wceazy_address_book_settings = get_option('wceazy_address_book_settings', False);
$wceazy_ab_settings = $wceazy_address_book_settings ? json_decode($wceazy_address_book_settings, true) : array();


$wceazy_ab_enable_billing_address_book = isset($wceazy_ab_settings["enable_billing_address_book"]) ? $wceazy_ab_settings["enable_billing_address_book"] : "yes";
$wceazy_ab_enable_shipping_address_book = isset($wceazy_ab_settings["enable_shipping_address_book"]) ? $wceazy_ab_settings["enable_shipping_address_book"] : "yes";
$wceazy_ab_enable_billing_address_book_checkout = isset($wceazy_ab_settings["enable_billing_address_book_checkout"]) ? $wceazy_ab_settings["enable_billing_address_book_checkout"] : "yes";
$wceazy_ab_enable_shipping_address_book_checkout = isset($wceazy_ab_settings["enable_shipping_address_book_checkout"]) ? $wceazy_ab_settings["enable_shipping_address_book_checkout"] : "yes";

$wceazy_ab_checkout_field_label = isset($wceazy_ab_settings["checkout_field_label"]) ? $wceazy_ab_settings["checkout_field_label"] : "Select Address";
$wceazy_ab_menu_title = isset($wceazy_ab_settings["menu_title"]) ? $wceazy_ab_settings["menu_title"] : "Address Book";
$wceazy_ab_billing_headline_text = isset($wceazy_ab_settings["billing_headline_text"]) ? $wceazy_ab_settings["billing_headline_text"] : "Billing Address Book";
$wceazy_ab_shipping_headline_text = isset($wceazy_ab_settings["shipping_headline_text"]) ? $wceazy_ab_settings["shipping_headline_text"] : "Shipping Address Book";
$wceazy_ab_billing_add_btn_text = isset($wceazy_ab_settings["billing_add_btn_text"]) ? $wceazy_ab_settings["billing_add_btn_text"] : "Add New";
$wceazy_ab_shipping_add_btn_text = isset($wceazy_ab_settings["shipping_add_btn_text"]) ? $wceazy_ab_settings["shipping_add_btn_text"] : "Add New";
$wceazy_ab_billing_empty_text = isset($wceazy_ab_settings["billing_empty_text"]) ? $wceazy_ab_settings["billing_empty_text"] : "No additional billing address has been created.";
$wceazy_ab_shipping_empty_text = isset($wceazy_ab_settings["shipping_empty_text"]) ? $wceazy_ab_settings["shipping_empty_text"] : "No additional shipping address has been created.";
$wceazy_ab_edit_text = isset($wceazy_ab_settings["edit_text"]) ? $wceazy_ab_settings["edit_text"] : "Edit";
$wceazy_ab_delete_text = isset($wceazy_ab_settings["delete_text"]) ? $wceazy_ab_settings["delete_text"] : "Delete";
$wceazy_ab_make_primary_text = isset($wceazy_ab_settings["make_primary_text"]) ? $wceazy_ab_settings["make_primary_text"] : "Make Primary";

$wceazy_ab_add_btn_bg_color = isset($wceazy_ab_settings["add_btn_bg_color"]) ? $wceazy_ab_settings["add_btn_bg_color"] : "#6E32C9";
$wceazy_ab_add_btn_text_color = isset($wceazy_ab_settings["add_btn_text_color"]) ? $wceazy_ab_settings["add_btn_text_color"] : "#ffffff";
$wceazy_ab_add_btn_bg_hover_color = isset($wceazy_ab_settings["add_btn_bg_hover_color"]) ? $wceazy_ab_settings["add_btn_bg_hover_color"] : "#ffffff";
$wceazy_ab_add_btn_text_hover_color = isset($wceazy_ab_settings["add_btn_text_hover_color"]) ? $wceazy_ab_settings["add_btn_text_hover_color"] : "#6E32C9";
$wceazy_ab_add_btn_border_hover_color = isset($wceazy_ab_settings["add_btn_border_hover_color"]) ? $wceazy_ab_settings["add_btn_border_hover_color"] : "#6E32C9";
$wceazy_ab_card_bg_color = isset($wceazy_ab_settings["card_bg_color"]) ? $wceazy_ab_settings["card_bg_color"] : "#ffffff";
$wceazy_ab_card_border_color = isset($wceazy_ab_settings["card_border_color"]) ? $wceazy_ab_settings["card_border_color"] : "#e2e2ef";
$wceazy_ab_card_text_color = isset($wceazy_ab_settings["card_text_color"]) ? $wceazy_ab_settings["card_text_color"] : "#6d6d6d";
$wceazy_ab_card_footer_color = isset($wceazy_ab_settings["card_footer_color"]) ? $wceazy_ab_settings["card_footer_color"] : "#fafbff";
$wceazy_ab_card_link_text_color = isset($wceazy_ab_settings["card_link_text_color"]) ? $wceazy_ab_settings["card_link_text_color"] : "#6E32C9";

?>


<div id="wceazy_address_book">


    <div class="wceazy_address_book_header">
        <div class="wceazy_header_part_left">
            <p>wcEazy <span><?php echo esc_attr(WCEAZY_VERSION); ?></span></p>
        </div>
        <div class="wceazy_header_part_right">
            <a class="wceazy_get_pro" target="_blank" href="<?php echo WCEAZY_GET_PRO_URL; ?>"> <?php esc_html_e('GET PRO', 'wceazy'); ?> </a>
        </div>
    </div>



    <div class="wceazy_address_book_page_title">
        <div class="page_title_part_left">
            <h2> <?php esc_html_e('Address Book', 'wceazy'); ?> </h2>
            <a target="_blank" href="<?php echo WCEAZY_DOCS_PAGE; ?>"><?php esc_html_e('Documentation', 'wceazy'); ?> </a>
        </div>
        <div class="page_title_part_right">
            <button class="wceazy_address_book_back_to_dashboard_btn" onclick="wceazy_modules_page_init(`<?php echo esc_url(WCEAZY_URL); ?>`)"><?php esc_html_e('Back to all Modules', 'wceazy'); ?> </button>
        </div>
    </div>



    <div class="wceazy_address_book_container">


        <div class="wceazy_address_book_tab">
            <div class="wceazy_address_book_tab_part_left">
                <div class="coupon_data_tabs">
                    <div class="tab_item tab_item_active" data-target="tab_general"><h1><?php esc_html_e('General', 'wceazy'); ?> </h1></div>
                    <div class="tab_item" data-target="tab_typography"><h1><?php esc_html_e('Typography', 'wceazy'); ?> </h1></div>
                    <div class="tab_item" data-target="tab_styles"><h1><?php esc_html_e('Style', 'wceazy'); ?> </h1></div>
                </div>
            </div>

            <div class="wceazy_address_book_tab_part_right">

                <div class="coupon_tab_body" data-id="tab_general">
                    <div class="tab_body_title"><h1><?php esc_html_e('General Settings', 'wceazy'); ?> </h1></div>
                    <div class="tab_body_form">


                        <h4><?php esc_html_e('Address Book on Account Page', 'wceazy'); ?> </h4>

                        <div class="wceazy_address_book_field_group wceazy_address_book_enable_billing_address_book">
                            <label for="coupon_generator_coupon_amount"><?php esc_html_e('Enable Billing Address Book', 'wceazy'); ?> </label>
                            <div class="field_with_msg_container">
                                <label class="toggle_switch"><input type="checkbox" <?php echo esc_attr($wceazy_ab_enable_billing_address_book == "yes" ? "checked" : ""); ?>><span class="slider round"></span></label>
                                <small><?php esc_html_e('Turn ON the switch to enable address book for billing.', 'wceazy'); ?> </small>
                            </div>
                        </div>

                        <div class="wceazy_address_book_field_group wceazy_address_book_enable_shipping_address_book">
                            <label for="coupon_generator_coupon_amount"><?php esc_html_e('Enable Shipping Address Book', 'wceazy'); ?> </label>
                            <div class="field_with_msg_container">
                                <label class="toggle_switch"><input type="checkbox" <?php echo esc_attr($wceazy_ab_enable_shipping_address_book == "yes" ? "checked" : ""); ?>><span class="slider round"></span></label>
                                <small><?php esc_html_e('Turn ON the switch to enable address book for shipping.', 'wceazy'); ?> </small>
                            </div>
                        </div>

                        <h4><?php esc_html_e('Address Field on Checkout Page', 'wceazy'); ?> </h4>

                        <div class="wceazy_address_book_field_group wceazy_address_book_enable_billing_address_book_checkout">
                            <label for="coupon_generator_coupon_amount"><?php esc_html_e('Billing Address Field on Checkout?', 'wceazy'); ?> </label>
                            <div class="field_with_msg_container">
                                <label class="toggle_switch"><input type="checkbox" <?php echo esc_attr($wceazy_ab_enable_billing_address_book_checkout == "yes" ? "checked" : ""); ?>><span class="slider round"></span></label>
                                <small><?php esc_html_e('Turn ON the switch to enable address field selection for billing on checkout page.', 'wceazy'); ?> </small>
                            </div>
                        </div>

                        <div class="wceazy_address_book_field_group wceazy_address_book_enable_shipping_address_book_checkout">
                            <label for="coupon_generator_coupon_amount"><?php esc_html_e('Shipping Address Field on Checkout?', 'wceazy'); ?> </label>
                            <div class="field_with_msg_container">
                                <label class="toggle_switch"><input type="checkbox" <?php echo esc_attr($wceazy_ab_enable_shipping_address_book_checkout == "yes" ? "checked" : ""); ?>><span class="slider round"></span></label>
                                <small><?php esc_html_e('Turn ON the switch to enable address field selection for shipping on checkout page.', 'wceazy'); ?> </small>
                            </div>
                        </div>


                    </div>
                </div>

                <div class="coupon_tab_body" data-id="tab_typography">
                    <div class="tab_body_title"><h1><?php esc_html_e('Typography Settings', 'wceazy'); ?> </h1></div>
                    <div class="tab_body_form">

                        <h4><?php esc_html_e('Checkout Page', 'wceazy'); ?> </h4>

                        <div class="wceazy_address_book_field_group wceazy_address_book_checkout_field_label">
                            <label for="coupon_generator_coupon_amount"><?php esc_html_e('Address Field Label', 'wceazy'); ?> </label>
                            <div class="field_with_msg_container">
                                <input class="wceazy_address_book_text_field" type="text" placeholder="" value="<?php echo esc_attr($wceazy_ab_checkout_field_label); ?>">
                                <small><?php esc_html_e('Set the address selection field label text on checkout page.', 'wceazy'); ?> </small>
                            </div>
                        </div>

                        <h4><?php esc_html_e('Account Page', 'wceazy'); ?> </h4>

                        <div class="wceazy_address_book_field_group wceazy_address_book_menu_title">
                            <label for="coupon_generator_coupon_amount"><?php esc_html_e('Menu Title', 'wceazy'); ?> </label>
                            <div class="field_with_msg_container">
                                <input class="wceazy_address_book_text_field" type="text" placeholder="" value="<?php echo esc_attr($wceazy_ab_menu_title); ?>">
                                <small><?php esc_html_e('Set the account page menu title for Address Book.', 'wceazy'); ?> </small>
                            </div>
                        </div>

                        <div class="wceazy_address_book_field_group wceazy_address_book_billing_headline_text">
                            <label for="coupon_generator_coupon_amount"><?php esc_html_e('Billing Address Book Headline', 'wceazy'); ?> </label>
                            <div class="field_with_msg_container">
                                <input class="wceazy_address_book_text_field" type="text" placeholder="" value="<?php echo esc_attr($wceazy_ab_billing_headline_text); ?>">
                                <small><?php esc_html_e('Set the headline text of billing address book.', 'wceazy'); ?> </small>
                            </div>
                        </div>

                        <div class="wceazy_address_book_field_group wceazy_address_book_shipping_headline_text">
                            <label for="coupon_generator_coupon_amount"><?php esc_html_e('Shipping Address Book Headline', 'wceazy'); ?> </label>
                            <div class="field_with_msg_container">
                                <input class="wceazy_address_book_text_field" type="text" placeholder="" value="<?php echo esc_attr($wceazy_ab_shipping_headline_text); ?>">
                                <small><?php esc_html_e('Set the headline text of shipping address book.', 'wceazy'); ?> </small>
                            </div>
                        </div>

                        <div class="wceazy_address_book_field_group wceazy_address_book_billing_add_btn_text">
                            <label for="coupon_generator_coupon_amount"><?php esc_html_e('Add Billing Address Button Text', 'wceazy'); ?>  <span style="color: #FF521D;"><?php esc_html_e('(Pro)', 'wceazy'); ?> </span></label>
                            <div class="field_with_msg_container">
                                <input disabled class="wceazy_address_book_text_field" type="text" placeholder="" value="<?php echo esc_attr($wceazy_ab_billing_add_btn_text); ?>">
                                <small><?php esc_html_e('Set the button text of add new billing address.', 'wceazy'); ?> </small>
                            </div>
                        </div>


                        <div class="wceazy_address_book_field_group wceazy_address_book_shipping_add_btn_text">
                            <label for="coupon_generator_coupon_amount"><?php esc_html_e('Add Shipping Address Button Text', 'wceazy'); ?>  <span style="color: #FF521D;">(Pro)</span></label>
                            <div class="field_with_msg_container">
                                <input disabled class="wceazy_address_book_text_field" type="text" placeholder="" value="<?php echo esc_attr($wceazy_ab_shipping_add_btn_text); ?>">
                                <small><?php esc_html_e('Set the button text of add new shipping address.', 'wceazy'); ?> </small>
                            </div>
                        </div>

                        <div class="wceazy_address_book_field_group wceazy_address_book_billing_empty_text">
                            <label for="coupon_generator_coupon_amount"><?php esc_html_e('Billing Address Book Empty Message ', 'wceazy'); ?> <span style="color: #FF521D;"><?php esc_html_e('(Pro)', 'wceazy'); ?> </span></label>
                            <div class="field_with_msg_container">
                                <input disabled class="wceazy_address_book_text_field" type="text" placeholder="" value="<?php echo esc_attr($wceazy_ab_billing_empty_text); ?>">
                                <small><?php esc_html_e('Set the empty message text of billing address book.', 'wceazy'); ?> </small>
                            </div>
                        </div>

                        <div class="wceazy_address_book_field_group wceazy_address_book_shipping_empty_text">
                            <label for="coupon_generator_coupon_amount"><?php esc_html_e('Shipping Address Book Empty Message ', 'wceazy'); ?> <span style="color: #FF521D;"><?php esc_html_e('(Pro)', 'wceazy'); ?> </span></label>
                            <div class="field_with_msg_container">
                                <input disabled class="wceazy_address_book_text_field" type="text" placeholder="" value="<?php echo esc_attr($wceazy_ab_shipping_empty_text); ?>">
                                <small><?php esc_html_e('Set the empty message text of shipping address book.', 'wceazy'); ?> </small>
                            </div>
                        </div>


                        <div class="wceazy_address_book_field_group wceazy_address_book_edit_text">
                            <label for="coupon_generator_coupon_amount"><?php esc_html_e('Address Edit Link Text', 'wceazy'); ?>  <span style="color: #FF521D;"><?php esc_html_e('(Pro)', 'wceazy'); ?> </span></label>
                            <div class="field_with_msg_container">
                                <input disabled class="wceazy_address_book_text_field" type="text" placeholder="" value="<?php echo esc_attr($wceazy_ab_edit_text); ?>">
                                <small><?php esc_html_e('Set the address edit link text.', 'wceazy'); ?> </small>
                            </div>
                        </div>

                        <div class="wceazy_address_book_field_group wceazy_address_book_delete_text">
                            <label for="coupon_generator_coupon_amount"><?php esc_html_e('Address Delete Link Text', 'wceazy'); ?>  <span style="color: #FF521D;"><?php esc_html_e('(Pro)', 'wceazy'); ?> </span></label>
                            <div class="field_with_msg_container">
                                <input disabled class="wceazy_address_book_text_field" type="text" placeholder="" value="<?php echo esc_attr($wceazy_ab_delete_text); ?>">
                                <small><?php esc_html_e('Set the address delete link text.', 'wceazy'); ?> </small>
                            </div>
                        </div>

                        <div class="wceazy_address_book_field_group wceazy_address_book_make_primary_text">
                            <label for="coupon_generator_coupon_amount"><?php esc_html_e('Address Make Primary Link Text', 'wceazy'); ?>  <span style="color: #FF521D;"><?php esc_html_e('(Pro)', 'wceazy'); ?> </span></label>
                            <div class="field_with_msg_container">
                                <input disabled class="wceazy_address_book_text_field" type="text" placeholder="" value="<?php echo esc_attr($wceazy_ab_make_primary_text); ?>">
                                <small><?php esc_html_e('Set the address make primary link text.', 'wceazy'); ?> </small>
                            </div>
                        </div>



                    </div>
                </div>


                <div class="coupon_tab_body" data-id="tab_styles">
                    <div class="tab_body_title"><h1><?php esc_html_e('Customize Styles', 'wceazy'); ?> </h1></div>
                    <div class="tab_body_form">



                        <div class="wceazy_address_book_field_group wceazy_address_book_add_btn_bg_color">
                            <label for="coupon_generator_coupon_amount"><?php esc_html_e('Add Button Background Color', 'wceazy'); ?>  <span style="color: #FF521D;"><?php esc_html_e('(Pro)', 'wceazy'); ?> </span></label>
                            <div class="field_with_msg_container">
                                <div class="color_picker_area">
                                    <input disabled type="color" id="wceazy_address_book_add_btn_bg_color" value="<?php echo esc_attr($wceazy_ab_add_btn_bg_color); ?>">
                                    <label for="wceazy_address_book_add_btn_bg_color"><?php esc_html_e('Select Color', 'wceazy'); ?> </label>
                                </div>
                                <small><?php esc_html_e('Set the add new button background color.', 'wceazy'); ?> </small>
                            </div>
                        </div>

                        <div class="wceazy_address_book_field_group wceazy_address_book_add_btn_text_color">
                            <label for="coupon_generator_coupon_amount"><?php esc_html_e('Add Button Text Color', 'wceazy'); ?>  <span style="color: #FF521D;"><?php esc_html_e('(Pro)', 'wceazy'); ?> </span></label>
                            <div class="field_with_msg_container">
                                <div class="color_picker_area">
                                    <input disabled type="color" id="wceazy_address_book_add_btn_text_color" value="<?php echo esc_attr($wceazy_ab_add_btn_text_color); ?>">
                                    <label for="wceazy_address_book_add_btn_text_color"><?php esc_html_e('Select Color', 'wceazy'); ?> </label>
                                </div>
                                <small><?php esc_html_e('Set the add new button text color.', 'wceazy'); ?> </small>
                            </div>
                        </div>

                        <div class="wceazy_address_book_field_group wceazy_address_book_add_btn_bg_hover_color">
                            <label for="coupon_generator_coupon_amount"><?php esc_html_e('Add Button Background Hover Color', 'wceazy'); ?>  <span style="color: #FF521D;"><?php esc_html_e('(Pro)', 'wceazy'); ?> </span></label>
                            <div class="field_with_msg_container">
                                <div class="color_picker_area">
                                    <input disabled type="color" id="wceazy_address_book_add_btn_bg_hover_color" value="<?php echo esc_attr($wceazy_ab_add_btn_bg_hover_color); ?>">
                                    <label for="wceazy_address_book_add_btn_bg_hover_color"><?php esc_html_e('Select Color', 'wceazy'); ?> </label>
                                </div>
                                <small><?php esc_html_e('Set the add new button background color on hover.', 'wceazy'); ?> </small>
                            </div>
                        </div>

                        <div class="wceazy_address_book_field_group wceazy_address_book_add_btn_text_hover_color">
                            <label for="coupon_generator_coupon_amount"><?php esc_html_e('Add Button Text Hover Color', 'wceazy'); ?>  <span style="color: #FF521D;"><?php esc_html_e('(Pro)', 'wceazy'); ?> </span></label>
                            <div class="field_with_msg_container">
                                <div class="color_picker_area">
                                    <input disabled type="color" id="wceazy_address_book_add_btn_text_hover_color" value="<?php echo esc_attr($wceazy_ab_add_btn_text_hover_color); ?>">
                                    <label for="wceazy_address_book_add_btn_text_hover_color"><?php esc_html_e('Select Color', 'wceazy'); ?> </label>
                                </div>
                                <small><?php esc_html_e('Set the add new button text color on hover.', 'wceazy'); ?> </small>
                            </div>
                        </div>


                        <div class="wceazy_address_book_field_group wceazy_address_book_add_btn_border_hover_color">
                            <label for="coupon_generator_coupon_amount"><?php esc_html_e('Add Button Border Hover Color', 'wceazy'); ?>  <span style="color: #FF521D;"><?php esc_html_e('(Pro)', 'wceazy'); ?> </span></label>
                            <div class="field_with_msg_container">
                                <div class="color_picker_area">
                                    <input disabled type="color" id="wceazy_address_book_add_btn_border_hover_color" value="<?php echo esc_attr($wceazy_ab_add_btn_border_hover_color); ?>">
                                    <label for="wceazy_address_book_add_btn_border_hover_color"><?php esc_html_e('Select Color', 'wceazy'); ?> </label>
                                </div>
                                <small><?php esc_html_e('Set the add new button border color on hover.', 'wceazy'); ?> </small>
                            </div>
                        </div>



                        <div class="wceazy_address_book_field_group wceazy_address_book_card_bg_color">
                            <label for="coupon_generator_coupon_amount"><?php esc_html_e('Address Card Background Color', 'wceazy'); ?>  <span style="color: #FF521D;"><?php esc_html_e('(Pro)', 'wceazy'); ?> </span></label>
                            <div class="field_with_msg_container">
                                <div class="color_picker_area">
                                    <input disabled type="color" id="wceazy_address_book_card_bg_color" value="<?php echo esc_attr($wceazy_ab_card_bg_color); ?>">
                                    <label for="wceazy_address_book_card_bg_color"><?php esc_html_e('Select Color', 'wceazy'); ?> </label>
                                </div>
                                <small><?php esc_html_e('Set the background color of address card.', 'wceazy'); ?> </small>
                            </div>
                        </div>

                        <div class="wceazy_address_book_field_group wceazy_address_book_card_border_color">
                            <label for="coupon_generator_coupon_amount"><?php esc_html_e('Address Card Border Color ', 'wceazy'); ?> <span style="color: #FF521D;"><?php esc_html_e('(Pro)', 'wceazy'); ?> </span></label>
                            <div class="field_with_msg_container">
                                <div class="color_picker_area">
                                    <input disabled type="color" id="wceazy_address_book_card_border_color" value="<?php echo esc_attr($wceazy_ab_card_border_color); ?>">
                                    <label for="wceazy_address_book_card_border_color"><?php esc_html_e('Select Color', 'wceazy'); ?> </label>
                                </div>
                                <small><?php esc_html_e('Set the border color of address card.', 'wceazy'); ?> </small>
                            </div>
                        </div>

                        <div class="wceazy_address_book_field_group wceazy_address_book_card_text_color">
                            <label for="coupon_generator_coupon_amount"><?php esc_html_e('Address Text Color', 'wceazy'); ?>  <span style="color: #FF521D;"><?php esc_html_e('(Pro)', 'wceazy'); ?> </span></label>
                            <div class="field_with_msg_container">
                                <div class="color_picker_area">
                                    <input disabled type="color" id="wceazy_address_book_card_text_color" value="<?php echo esc_attr($wceazy_ab_card_text_color); ?>">
                                    <label for="wceazy_address_book_card_text_color"><?php esc_html_e('Select Color', 'wceazy'); ?> </label>
                                </div>
                                <small><?php esc_html_e('Set the text color of address inside address card.', 'wceazy'); ?> </small>
                            </div>
                        </div>

                        <div class="wceazy_address_book_field_group wceazy_address_book_card_footer_color">
                            <label for="coupon_generator_coupon_amount"><?php esc_html_e('Address Card Footer Background Color', 'wceazy'); ?>  <span style="color: #FF521D;"><?php esc_html_e('(Pro)', 'wceazy'); ?> </span></label>
                            <div class="field_with_msg_container">
                                <div class="color_picker_area">
                                    <input disabled type="color" id="wceazy_address_book_card_footer_color" value="<?php echo esc_attr($wceazy_ab_card_footer_color); ?>">
                                    <label for="wceazy_address_book_card_footer_color"><?php esc_html_e('Select Color', 'wceazy'); ?> </label>
                                </div>
                                <small><?php esc_html_e('Set the footer background color of address card.', 'wceazy'); ?> </small>
                            </div>
                        </div>


                        <div class="wceazy_address_book_field_group wceazy_address_book_card_link_text_color">
                            <label for="coupon_generator_coupon_amount"><?php esc_html_e('Address Card Link Text Color', 'wceazy'); ?>  <span style="color: #FF521D;"><?php esc_html_e('(Pro)', 'wceazy'); ?> </span></label>
                            <div class="field_with_msg_container">
                                <div class="color_picker_area">
                                    <input disabled type="color" id="wceazy_address_book_card_link_text_color" value="<?php echo esc_attr($wceazy_ab_card_link_text_color); ?>">
                                    <label for="wceazy_address_book_card_link_text_color"><?php esc_html_e('Select Color', 'wceazy'); ?> </label>
                                </div>
                                <small><?php esc_html_e('Set the link text color of address card.', 'wceazy'); ?> </small>
                            </div>
                        </div> 
                    </div>
                </div> 

            </div>
        </div>


        <div class="wceazy_address_book_bottom_button_section">
            <button onclick="wceazy_address_book_save();"><?php esc_html_e('Save Settings', 'wceazy'); ?> </button>
        </div> 

    </div>

</div>