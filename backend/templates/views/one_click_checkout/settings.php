<?php


$wceazy_one_click_checkout_settings = get_option('wceazy_one_click_checkout_settings', False);
$wceazy_occ_settings = $wceazy_one_click_checkout_settings ? json_decode($wceazy_one_click_checkout_settings, true) : array();

$wceazy_occ_disable_cart = isset ($wceazy_occ_settings["disable_cart"]) ? $wceazy_occ_settings["disable_cart"] : "yes";
$wceazy_occ_enable_single_page = isset ($wceazy_occ_settings["enable_single_page"]) ? $wceazy_occ_settings["enable_single_page"] : "no";
$wceazy_occ_enable_redirect_to_cart = isset ($wceazy_occ_settings["enable_redirect_to_cart"]) ? $wceazy_occ_settings["enable_redirect_to_cart"] : "yes";
$wceazy_occ_enable_custom_url = isset ($wceazy_occ_settings["enable_custom_url"]) ? $wceazy_occ_settings["enable_custom_url"] : "no";
$wceazy_occ_redirect_to_page = isset ($wceazy_occ_settings["redirect_to_page"]) ? $wceazy_occ_settings["redirect_to_page"] : wc_get_page_permalink('checkout');
$wceazy_occ_redirect_to_custom_url = isset ($wceazy_occ_settings["redirect_to_custom_url"]) ? $wceazy_occ_settings["redirect_to_custom_url"] : wc_get_page_permalink('checkout');
$wceazy_occ_disable_continue_shopping_button = isset ($wceazy_occ_settings["disable_continue_shopping_button"]) ? $wceazy_occ_settings["disable_continue_shopping_button"] : "no";

$wceazy_occ_enable_product_ajax_to_cart = isset ($wceazy_occ_settings["enable_product_ajax_to_cart"]) ? $wceazy_occ_settings["enable_product_ajax_to_cart"] : "no";
$wceazy_occ_change_add_to_cart_button_text = isset ($wceazy_occ_settings["change_add_to_cart_button_text"]) ? $wceazy_occ_settings["change_add_to_cart_button_text"] : "no";
$wceazy_occ_cart_button_text = isset ($wceazy_occ_settings["cart_button_text"]) ? $wceazy_occ_settings["cart_button_text"] : "Add to cart";
$wceazy_occ_select_options_button_text = isset ($wceazy_occ_settings["select_options_button_text"]) ? $wceazy_occ_settings["select_options_button_text"] : "Select Options";
$wceazy_occ_read_more_button_text = isset ($wceazy_occ_settings["read_more_button_text"]) ? $wceazy_occ_settings["read_more_button_text"] : "Read More";

$wceazy_occ_enable_buy_now_button_on_product = isset ($wceazy_occ_settings["enable_buy_now_button_on_product"]) ? $wceazy_occ_settings["enable_buy_now_button_on_product"] : "no";
$wceazy_occ_buy_btn_label_on_product = isset ($wceazy_occ_settings["buy_btn_label_on_product"]) ? $wceazy_occ_settings["buy_btn_label_on_product"] : "Buy Now";
$wceazy_occ_buy_btn_redirect_on_product = isset ($wceazy_occ_settings["buy_btn_redirect_on_product"]) ? $wceazy_occ_settings["buy_btn_redirect_on_product"] : wc_get_checkout_url();
$wceazy_occ_buy_btn_position_on_product = isset ($wceazy_occ_settings["buy_btn_position_on_product"]) ? $wceazy_occ_settings["buy_btn_position_on_product"] : "";
$wceazy_occ_buy_btn_size_on_product = isset ($wceazy_occ_settings["buy_btn_size_on_product"]) ? $wceazy_occ_settings["buy_btn_size_on_product"] : "";
$wceazy_occ_buy_now_btn_product_mt = isset ($wceazy_occ_settings["buy_now_btn_product_mt"]) ? $wceazy_occ_settings["buy_now_btn_product_mt"] : "";
$wceazy_occ_buy_now_btn_product_mb = isset ($wceazy_occ_settings["buy_now_btn_product_mb"]) ? $wceazy_occ_settings["buy_now_btn_product_mb"] : "";
$wceazy_occ_buy_now_btn_product_ml = isset ($wceazy_occ_settings["buy_now_btn_product_ml"]) ? $wceazy_occ_settings["buy_now_btn_product_ml"] : "";
$wceazy_occ_buy_now_btn_product_mr = isset ($wceazy_occ_settings["buy_now_btn_product_mr"]) ? $wceazy_occ_settings["buy_now_btn_product_mr"] : "";

$wceazy_occ_enable_buy_now_button_on_product_archive = isset ($wceazy_occ_settings["enable_buy_now_button_on_product_archive"]) ? $wceazy_occ_settings["enable_buy_now_button_on_product_archive"] : "no";
$wceazy_occ_buy_btn_label_on_product_archive = isset ($wceazy_occ_settings["buy_btn_label_on_product_archive"]) ? $wceazy_occ_settings["buy_btn_label_on_product_archive"] : "Buy Now";
$wceazy_occ_buy_btn_redirect_on_product_archive = isset ($wceazy_occ_settings["buy_btn_redirect_on_product_archive"]) ? $wceazy_occ_settings["buy_btn_redirect_on_product_archive"] : wc_get_checkout_url();
$wceazy_occ_buy_btn_position_on_product_archive = isset ($wceazy_occ_settings["buy_btn_position_on_product_archive"]) ? $wceazy_occ_settings["buy_btn_position_on_product_archive"] : "";
$wceazy_occ_buy_btn_size_on_product_archive = isset ($wceazy_occ_settings["buy_btn_size_on_product_archive"]) ? $wceazy_occ_settings["buy_btn_size_on_product_archive"] : "";
$wceazy_occ_buy_now_btn_product_archive_mt = isset ($wceazy_occ_settings["buy_now_btn_product_archive_mt"]) ? $wceazy_occ_settings["buy_now_btn_product_archive_mt"] : "";
$wceazy_occ_buy_now_btn_product_archive_mb = isset ($wceazy_occ_settings["buy_now_btn_product_archive_mb"]) ? $wceazy_occ_settings["buy_now_btn_product_archive_mb"] : "";
$wceazy_occ_buy_now_btn_product_archive_ml = isset ($wceazy_occ_settings["buy_now_btn_product_archive_ml"]) ? $wceazy_occ_settings["buy_now_btn_product_archive_ml"] : "";
$wceazy_occ_buy_now_btn_product_archive_mr = isset ($wceazy_occ_settings["buy_now_btn_product_archive_mr"]) ? $wceazy_occ_settings["buy_now_btn_product_archive_mr"] : "";

$wceazy_occ_buy_now_btn_color = isset ($wceazy_occ_settings["buy_now_btn_color"]) ? $wceazy_occ_settings["buy_now_btn_color"] : "#ffffff";
$wceazy_occ_buy_now_btn_bg_color = isset ($wceazy_occ_settings["buy_now_btn_bg_color"]) ? $wceazy_occ_settings["buy_now_btn_bg_color"] : "#0170B9";
$wceazy_occ_buy_now_btn_hover_color = isset ($wceazy_occ_settings["buy_now_btn_hover_color"]) ? $wceazy_occ_settings["buy_now_btn_hover_color"] : "#ffffff";
$wceazy_occ_buy_now_btn_hover_bg_color = isset ($wceazy_occ_settings["buy_now_btn_hover_bg_color"]) ? $wceazy_occ_settings["buy_now_btn_hover_bg_color"] : "#000000";
$wceazy_occ_buy_now_btn_ptpb = isset ($wceazy_occ_settings["buy_now_btn_ptpb"]) ? $wceazy_occ_settings["buy_now_btn_ptpb"] : "";
$wceazy_occ_buy_now_btn_plpr = isset ($wceazy_occ_settings["buy_now_btn_plpr"]) ? $wceazy_occ_settings["buy_now_btn_plpr"] : "";
$wceazy_occ_buy_now_btn_border_radius = isset ($wceazy_occ_settings["buy_now_btn_border_radius"]) ? $wceazy_occ_settings["buy_now_btn_border_radius"] : "";

$wceazy_occ_remove_order_comment = isset ($wceazy_occ_settings["remove_order_comment"]) ? $wceazy_occ_settings["remove_order_comment"] : "no";
$wceazy_occ_remove_coupon_form = isset ($wceazy_occ_settings["remove_coupon_form"]) ? $wceazy_occ_settings["remove_coupon_form"] : "no";
$wceazy_occ_remove_policy_text = isset ($wceazy_occ_settings["remove_policy_text"]) ? $wceazy_occ_settings["remove_policy_text"] : "no";
$wceazy_occ_remove_terms_condition = isset ($wceazy_occ_settings["remove_terms_condition"]) ? $wceazy_occ_settings["remove_terms_condition"] : "no";
$wceazy_occ_remove_billing_fields = isset ($wceazy_occ_settings["remove_billing_fields"]) ? explode(",", $wceazy_occ_settings["remove_billing_fields"]) : array();
$wceazy_occ_remove_shipping_fields = isset ($wceazy_occ_settings["remove_shipping_fields"]) ? explode(",", $wceazy_occ_settings["remove_shipping_fields"]) : array();


?>



<div id="wceazy_one_click_checkout">


    <div class="wceazy_one_click_checkout_header">
        <div class="wceazy_header_part_left">
            <p>
                <?php esc_html_e('wcEazy', 'wceazy'); ?> <span>
                    <?php echo esc_attr(WCEAZY_VERSION); ?>
                </span>
            </p>
        </div>
        <div class="wceazy_header_part_right">
            <a class="wceazy_get_pro" target="_blank" href="<?php echo WCEAZY_GET_PRO_URL; ?>">
                <?php esc_html_e('GET PRO', 'wceazy'); ?>
            </a>
        </div>
    </div>



    <div class="wceazy_one_click_checkout_page_title">
        <div class="page_title_part_left">
            <h2>
                <?php esc_html_e('One Click Checkout', 'wceazy'); ?>
            </h2>
            <a target="_blank" href="<?php echo WCEAZY_DOCS_PAGE; ?>">
                <?php esc_html_e('Documentation', 'wceazy'); ?>
            </a>
        </div>
        <div class="page_title_part_right">
            <button class="wceazy_one_click_checkout_back_to_dashboard_btn"
                onclick="wceazy_modules_page_init(`<?php echo esc_url(WCEAZY_URL); ?>`)">
                <?php esc_html_e('Back to all Modules', 'wceazy'); ?>
            </button>
        </div>
    </div>



    <div class="wceazy_one_click_checkout_container">

        <div class="wceazy_one_click_checkout_tab">
            <div class="wceazy_one_click_checkout_tab_part_left">
                <div class="coupon_data_tabs">
                    <div class="tab_item tab_item_active" data-target="tab_general">
                        <h1>
                            <?php esc_html_e('General', 'wceazy'); ?>
                        </h1>
                    </div>
                    <div class="tab_item" data-target="tab_add_to_cart">
                        <h1>
                            <?php esc_html_e('Add To Cart', 'wceazy'); ?>
                        </h1>
                    </div>
                    <div class="tab_item" data-target="tab_buy_now_button">
                        <h1>
                            <?php esc_html_e('Buy Now Button', 'wceazy'); ?>
                        </h1>
                    </div>
                    <div class="tab_item" data-target="tab_checkout">
                        <h1>
                            <?php esc_html_e('Checkout', 'wceazy'); ?>
                        </h1>
                    </div>
                </div>
            </div>

            <div class="wceazy_one_click_checkout_tab_part_right">

                <div class="coupon_tab_body" data-id="tab_general">
                    <div class="tab_body_title">
                        <h1>
                            <?php esc_html_e('General Settings', 'wceazy'); ?>
                        </h1>
                    </div>
                    <div class="tab_body_form">


                        <div class="wceazy_one_click_checkout_field_group wceazy_one_click_checkout_disable_cart">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Disable Cart Page', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <label class="toggle_switch"><input type="checkbox" <?php echo esc_attr($wceazy_occ_disable_cart == "yes" ? "checked" : ""); ?>><span
                                        class="slider round"></span></label>
                                <small>
                                    <?php esc_html_e('Disable the cart page. It will automatically redirect to the checkout page.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div class="wceazy_one_click_checkout_field_group wceazy_one_click_checkout_enable_single_page">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Enable single page checkout', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <label class="toggle_switch"><input type="checkbox" <?php echo esc_attr($wceazy_occ_enable_single_page == "yes" ? "checked" : ""); ?>><span
                                        class="slider round"></span></label>
                                <small>
                                    <?php esc_html_e('Turn on the single page checkout to show the cart menu as well.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div
                            class="wceazy_one_click_checkout_field_group wceazy_one_click_checkout_enable_redirect_to_cart">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Enable Redirect on Add to Cart', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <label class="toggle_switch"><input type="checkbox" <?php echo esc_attr($wceazy_occ_enable_redirect_to_cart == "yes" ? "checked" : ""); ?>
                                        onchange="wceazy_one_click_checkout_selection_changed()"><span
                                        class="slider round"></span></label>
                                <small>
                                    <?php esc_html_e('After clicking the add to cart button, it will automatically redirect to the checkout page.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div class="wceazy_one_click_checkout_field_group wceazy_one_click_checkout_enable_custom_url">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Redirect to custom url', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <label class="toggle_switch"><input type="checkbox" <?php echo esc_attr($wceazy_occ_enable_custom_url == "yes" ? "checked" : ""); ?>
                                        onchange="wceazy_one_click_checkout_selection_changed()"><span
                                        class="slider round"></span></label>
                                <small>
                                    <?php esc_html_e('Redirect to custom url instead of page, so using this you can redirect to any page.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div class="wceazy_one_click_checkout_field_group wceazy_one_click_checkout_redirect_to_page">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Redirect to page', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <select class="wceazy_one_click_checkout_select_field">
                                    <option value=""> Please select</option>
                                    <?php foreach (get_pages() as $single_page) { ?>
                                        <option value="<?php echo esc_attr(get_permalink($single_page->ID)); ?>" <?php echo esc_attr(get_permalink($single_page->ID) == $wceazy_occ_redirect_to_page ? "selected" : ""); ?>>
                                            <?php echo esc_attr($single_page->post_title); ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div
                            class="wceazy_one_click_checkout_field_group wceazy_one_click_checkout_redirect_to_custom_url">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Redirect to custom url', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <input class="wceazy_one_click_checkout_text_field" type="text" placeholder=""
                                    value="<?php echo esc_attr($wceazy_occ_redirect_to_custom_url); ?>">
                                <small>
                                    <?php esc_html_e('Redirect to this any custom url of your website e.g.: http://yourwebsite.com', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>


                        <div
                            class="wceazy_one_click_checkout_field_group wceazy_one_click_checkout_disable_continue_shopping_button">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Turn off the "Keep Shopping" button.', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <label class="toggle_switch"><input type="checkbox" <?php echo esc_attr($wceazy_occ_disable_continue_shopping_button == "yes" ? "checked" : ""); ?>><span class="slider round"></span></label>
                                <small>
                                    <?php esc_html_e('WooCommerce shows a continue shopping button after a product is added to cart. With this option, you can disable that link so users replace the text you want to complete the sentence here', 'wceazy'); ?>.
                                </small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="coupon_tab_body" data-id="tab_add_to_cart">
                    <div class="tab_body_title">
                        <h1>
                            <?php esc_html_e('Add to Cart Button Settings', 'wceazy'); ?>
                        </h1>
                    </div>
                    <div class="tab_body_form">
                        <div
                            class="wceazy_one_click_checkout_field_group wceazy_one_click_checkout_enable_product_ajax_to_cart">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Quickly add item to shopping cart with Ajax.', 'wceazy'); ?>
                                <span style="color: #FF521D;">
                                    <?php esc_html_e('(Pro)', 'wceazy'); ?>
                                </span>
                            </label>

                            <div class="field_with_msg_container">
                                <label class="toggle_switch"><input disabled type="checkbox" <?php echo esc_attr($wceazy_occ_enable_product_ajax_to_cart == "yes" ? "checked" : ""); ?>><span class="slider round"></span></label>
                                <small>
                                    <?php esc_html_e('Turn on to enable Quickly add item to shopping cart with Ajax.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>


                        <div
                            class="wceazy_one_click_checkout_field_group wceazy_one_click_checkout_change_add_to_cart_button_text">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Alter the "Add to Cart" button text.', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <label class="toggle_switch"><input type="checkbox" <?php echo esc_attr($wceazy_occ_change_add_to_cart_button_text == "yes" ? "checked" : ""); ?>
                                        onchange="wceazy_one_click_checkout_selection_changed()"><span
                                        class="slider round"></span></label>
                                <small>
                                    <?php esc_html_e('Turn on to change the button text of add to cart button.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>


                        <div class="wceazy_one_click_checkout_field_group wceazy_one_click_checkout_cart_button_text">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Add to cart button text', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <input class="wceazy_one_click_checkout_text_field" type="text" placeholder=""
                                    value="<?php echo esc_attr($wceazy_occ_cart_button_text); ?>">
                                <small>
                                    <?php esc_html_e('This text will be shown inside add to cart button.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div
                            class="wceazy_one_click_checkout_field_group wceazy_one_click_checkout_select_options_button_text">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Select options button text', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <input class="wceazy_one_click_checkout_text_field" type="text" placeholder=""
                                    value="<?php echo esc_attr($wceazy_occ_select_options_button_text); ?>">
                                <small>
                                    <?php esc_html_e('This text will be shown on the archive page for the variable product, leave blank if you want to use default text.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div
                            class="wceazy_one_click_checkout_field_group wceazy_one_click_checkout_read_more_button_text">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Read more button text', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <input class="wceazy_one_click_checkout_text_field" type="text" placeholder=""
                                    value="<?php echo esc_attr($wceazy_occ_read_more_button_text); ?>">
                                <small>
                                    <?php esc_html_e('This text will be shown on archive page for the product when the product is out of stock, leave blank if you want to use default', 'wceazy'); ?>
                                    text.
                                </small>
                            </div>
                        </div>


                    </div>
                </div>

                <div class="coupon_tab_body" data-id="tab_buy_now_button">
                    <div class="tab_body_title">
                        <h1>
                            <?php esc_html_e('Buy Now Button Settings', 'wceazy'); ?>
                        </h1>
                    </div>
                    <div class="tab_body_form">
                        <h4>
                            <?php esc_html_e('Buy Now Button on the Product Page', 'wceazy'); ?>
                        </h4>

                        <div
                            class="wceazy_one_click_checkout_field_group wceazy_one_click_checkout_enable_buy_now_button_on_product">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Enable Buy Now Button', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <label class="toggle_switch"><input type="checkbox" <?php echo esc_attr($wceazy_occ_enable_buy_now_button_on_product == "yes" ? "checked" : ""); ?> onchange="wceazy_one_click_checkout_selection_changed()"><span
                                        class="slider round"></span></label>
                                <small>
                                    <?php esc_html_e('Turn on/off the buy now button on the product page.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div
                            class="wceazy_one_click_checkout_field_group wceazy_one_click_checkout_buy_btn_label_on_product">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Buy now button label <span style="color: #FF521D;">(Pro)</span>', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <input disabled class="wceazy_one_click_checkout_text_field" type="text" placeholder=""
                                    value="<?php echo esc_attr($wceazy_occ_buy_btn_label_on_product); ?>">
                                <small>
                                    <?php esc_html_e('Buy now button label', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div
                            class="wceazy_one_click_checkout_field_group wceazy_one_click_checkout_buy_btn_redirect_on_product">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Redirect to page <span style="color: #FF521D;">(Pro)</span>', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <select disabled class="wceazy_one_click_checkout_select_field">
                                    <option value=""> Please select</option>
                                    <?php foreach (get_pages() as $single_page) { ?>
                                        <option value="<?php echo esc_attr(get_permalink($single_page->ID)); ?>" <?php echo esc_attr(get_permalink($single_page->ID) == $wceazy_occ_buy_btn_redirect_on_product ? "selected" : ""); ?>>
                                            <?php echo esc_attr($single_page->post_title); ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div
                            class="wceazy_one_click_checkout_field_group wceazy_one_click_checkout_buy_btn_position_on_product">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Position Of the Button <span style="color: #FF521D;">(Pro)</span>', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <select disabled class="wceazy_one_click_checkout_select_field">
                                    <option value=""> Please select</option>
                                    <option value="before_form" <?php echo esc_attr("before_form" == $wceazy_occ_buy_btn_position_on_product ? "selected" : ""); ?>>
                                        Before add to cart form </option>
                                    <option value="after_form" <?php echo esc_attr("after_form" == $wceazy_occ_buy_btn_position_on_product ? "selected" : ""); ?>>
                                        After add to cart form </option>
                                    <option value="before_button" <?php echo esc_attr("before_button" == $wceazy_occ_buy_btn_position_on_product ? "selected" : ""); ?>>
                                        Before add to cart button </option>
                                    <option value="after_button" <?php echo esc_attr("after_button" == $wceazy_occ_buy_btn_position_on_product ? "selected" : ""); ?>>
                                        After add to cart button </option>
                                </select>
                            </div>
                        </div>

                        <div
                            class="wceazy_one_click_checkout_field_group wceazy_one_click_checkout_buy_btn_size_on_product">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Buy now button width', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <input class="wceazy_one_click_checkout_text_field" type="number" placeholder=""
                                    value="<?php echo esc_attr($wceazy_occ_buy_btn_size_on_product); ?>">
                                <small>
                                    <?php esc_html_e('Buy now button width on product page (PX).', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div
                            class="wceazy_one_click_checkout_field_group wceazy_one_click_checkout_buy_now_btn_product_mt">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Buy now button margin top', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <input class="wceazy_one_click_checkout_text_field" type="text" placeholder=""
                                    value="<?php echo esc_attr($wceazy_occ_buy_now_btn_product_mt); ?>">
                                <small>
                                    <?php esc_html_e('Buy now button margin top (PX).', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div
                            class="wceazy_one_click_checkout_field_group wceazy_one_click_checkout_buy_now_btn_product_mb">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Buy now button margin bottom', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <input class="wceazy_one_click_checkout_text_field" type="text" placeholder=""
                                    value="<?php echo esc_attr($wceazy_occ_buy_now_btn_product_mb); ?>">
                                <small>
                                    <?php esc_html_e('Buy now button margin bottom (PX).', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div
                            class="wceazy_one_click_checkout_field_group wceazy_one_click_checkout_buy_now_btn_product_ml">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Buy now button margin left', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <input class="wceazy_one_click_checkout_text_field" type="text" placeholder=""
                                    value="<?php echo esc_attr($wceazy_occ_buy_now_btn_product_ml); ?>">
                                <small>
                                    <?php esc_html_e('Buy now button margin left (PX).', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div
                            class="wceazy_one_click_checkout_field_group wceazy_one_click_checkout_buy_now_btn_product_mr">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Buy now button margin right', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <input class="wceazy_one_click_checkout_text_field" type="text" placeholder=""
                                    value="<?php echo esc_attr($wceazy_occ_buy_now_btn_product_mr); ?>">
                                <small>
                                    <?php esc_html_e('Buy now button margin right (PX).', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <h4>
                            <?php esc_html_e('Buy Now Button on the Archive Page', 'wceazy'); ?>
                        </h4>

                        <div
                            class="wceazy_one_click_checkout_field_group wceazy_one_click_checkout_enable_buy_now_button_on_product_archive">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Enable Buy Now Button', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <label class="toggle_switch"><input type="checkbox" <?php echo esc_attr($wceazy_occ_enable_buy_now_button_on_product_archive == "yes" ? "checked" : ""); ?> onchange="wceazy_one_click_checkout_selection_changed()"><span
                                        class="slider round"></span></label>
                                <small>
                                    <?php esc_html_e('Turn on/off the buy now button on the product archive page.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div
                            class="wceazy_one_click_checkout_field_group wceazy_one_click_checkout_buy_btn_label_on_product_archive">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Buy now button label <span style="color: #FF521D;">(Pro)</span>', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <input disabled class="wceazy_one_click_checkout_text_field" type="text" placeholder=""
                                    value="<?php echo esc_attr($wceazy_occ_buy_btn_label_on_product_archive); ?>">
                                <small>
                                    <?php esc_html_e('Buy now button label', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div
                            class="wceazy_one_click_checkout_field_group wceazy_one_click_checkout_buy_btn_redirect_on_product_archive">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Redirect to page <span style="color: #FF521D;">(Pro)</span>', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <select disabled class="wceazy_one_click_checkout_select_field">
                                    <option value=""> Please select</option>
                                    <?php foreach (get_pages() as $single_page) { ?>
                                        <option value="<?php echo esc_attr(get_permalink($single_page->ID)); ?>" <?php echo esc_attr(get_permalink($single_page->ID) == $wceazy_occ_buy_btn_redirect_on_product_archive ? "selected" : ""); ?>>
                                            <?php echo esc_attr($single_page->post_title); ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div
                            class="wceazy_one_click_checkout_field_group wceazy_one_click_checkout_buy_btn_position_on_product_archive">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Position Of the Button <span style="color: #FF521D;">(Pro)</span>', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <select disabled class="wceazy_one_click_checkout_select_field">
                                    <option value=""> Please select</option>
                                    <option value="before_button" <?php echo esc_attr("before_button" == $wceazy_occ_buy_btn_position_on_product_archive ? "selected" : ""); ?>>
                                        Before add to cart button </option>
                                    <option value="after_button" <?php echo esc_attr("after_button" == $wceazy_occ_buy_btn_position_on_product_archive ? "selected" : ""); ?>>
                                        After add to cart button </option>
                                </select>
                            </div>
                        </div>

                        <div
                            class="wceazy_one_click_checkout_field_group wceazy_one_click_checkout_buy_btn_size_on_product_archive">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Buy now button width', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <input class="wceazy_one_click_checkout_text_field" type="number" placeholder=""
                                    value="<?php echo esc_attr($wceazy_occ_buy_btn_size_on_product_archive); ?>">
                                <small>
                                    <?php esc_html_e('Buy now button width on product archive page (PX).', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div
                            class="wceazy_one_click_checkout_field_group wceazy_one_click_checkout_buy_now_btn_product_archive_mt">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Buy now button margin top', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <input class="wceazy_one_click_checkout_text_field" type="text" placeholder=""
                                    value="<?php echo esc_attr($wceazy_occ_buy_now_btn_product_archive_mt); ?>">
                                <small>
                                    <?php esc_html_e('Buy now button margin top (PX).', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div
                            class="wceazy_one_click_checkout_field_group wceazy_one_click_checkout_buy_now_btn_product_archive_mb">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Buy now button margin bottom', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <input class="wceazy_one_click_checkout_text_field" type="text" placeholder=""
                                    value="<?php echo esc_attr($wceazy_occ_buy_now_btn_product_archive_mb); ?>">
                                <small>
                                    <?php esc_html_e('Buy now button margin bottom (PX).', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div
                            class="wceazy_one_click_checkout_field_group wceazy_one_click_checkout_buy_now_btn_product_archive_ml">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Buy now button margin left', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <input class="wceazy_one_click_checkout_text_field" type="text" placeholder=""
                                    value="<?php echo esc_attr($wceazy_occ_buy_now_btn_product_archive_ml); ?>">
                                <small>
                                    <?php esc_html_e('Buy now button margin left (PX).', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div
                            class="wceazy_one_click_checkout_field_group wceazy_one_click_checkout_buy_now_btn_product_archive_mr">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Buy now button margin right', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <input class="wceazy_one_click_checkout_text_field" type="text" placeholder=""
                                    value="<?php echo esc_attr($wceazy_occ_buy_now_btn_product_archive_mr); ?>">
                                <small>
                                    <?php esc_html_e('Buy now button margin right (PX).', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>



                        <h4>
                            <?php esc_html_e('Buy Now Button design', 'wceazy'); ?>
                        </h4>

                        <div class="wceazy_one_click_checkout_field_group wceazy_one_click_checkout_buy_now_btn_color">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Font Color', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <div class="color_picker_area">
                                    <input type="color" id="wceazy_one_click_checkout_buy_now_btn_color"
                                        value="<?php echo esc_attr($wceazy_occ_buy_now_btn_color); ?>">
                                    <label for="wceazy_one_click_checkout_buy_now_btn_color">
                                        <?php esc_html_e('Select Color', 'wceazy'); ?>
                                    </label>
                                </div>
                                <small>
                                    <?php esc_html_e('Set button font color', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div
                            class="wceazy_one_click_checkout_field_group wceazy_one_click_checkout_buy_now_btn_bg_color">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Background Color', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <div class="color_picker_area">
                                    <input type="color" id="wceazy_one_click_checkout_buy_now_btn_bg_color"
                                        value="<?php echo esc_attr($wceazy_occ_buy_now_btn_bg_color); ?>">
                                    <label for="wceazy_one_click_checkout_buy_now_btn_bg_color">
                                        <?php esc_html_e('Select Color', 'wceazy'); ?>
                                    </label>
                                </div>
                                <small>
                                    <?php esc_html_e('Set button background color', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div
                            class="wceazy_one_click_checkout_field_group wceazy_one_click_checkout_buy_now_btn_hover_color">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Hover Font Color', 'wceazy'); ?>
                                <span style="color: #FF521D;">
                                    <?php esc_html_e('(Pro)', 'wceazy'); ?>
                                </span>
                            </label>

                            <div class="field_with_msg_container">
                                <div class="color_picker_area">
                                    <input disabled type="color" id="wceazy_one_click_checkout_buy_now_btn_hover_color"
                                        value="<?php echo esc_attr($wceazy_occ_buy_now_btn_hover_color); ?>">
                                    <label for="wceazy_one_click_checkout_buy_now_btn_hover_color">
                                        <?php esc_html_e('Select Color', 'wceazy'); ?>
                                    </label>
                                </div>
                                <small>
                                    <?php esc_html_e('Set button font color on hover', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div
                            class="wceazy_one_click_checkout_field_group wceazy_one_click_checkout_buy_now_btn_hover_bg_color">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Hover Background Color', 'wceazy'); ?>
                                <span style="color: #FF521D;">
                                    <?php esc_html_e('(Pro)', 'wceazy'); ?>
                                </span>
                            </label>
                            <div class="field_with_msg_container">
                                <div class="color_picker_area">
                                    <input disabled type="color"
                                        id="wceazy_one_click_checkout_buy_now_btn_hover_bg_color"
                                        value="<?php echo esc_attr($wceazy_occ_buy_now_btn_hover_bg_color); ?>">
                                    <label for="wceazy_one_click_checkout_buy_now_btn_hover_bg_color">
                                        <?php esc_html_e('Select Color', 'wceazy'); ?>
                                    </label>
                                </div>
                                <small>
                                    <?php esc_html_e('Set button background color on hover', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div class="wceazy_one_click_checkout_field_group wceazy_one_click_checkout_buy_now_btn_ptpb">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Padding Top-Bottom', 'wceazy'); ?>
                                <span style="color: #FF521D;">
                                    <?php esc_html_e('(Pro)', 'wceazy'); ?>
                                </span>
                            </label>
                            <div class="field_with_msg_container">
                                <input disabled class="wceazy_one_click_checkout_text_field" type="number"
                                    placeholder="" value="<?php echo esc_attr($wceazy_occ_buy_now_btn_ptpb); ?>">
                                <small>
                                    <?php esc_html_e('Buy now button padding top & bottom (PX)', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div class="wceazy_one_click_checkout_field_group wceazy_one_click_checkout_buy_now_btn_plpr">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Padding Left-Right', 'wceazy'); ?>
                                <span style="color: #FF521D;">
                                    <?php esc_html_e('(Pro)', 'wceazy'); ?>
                                </span>
                            </label>
                            <div class="field_with_msg_container">
                                <input disabled class="wceazy_one_click_checkout_text_field" type="number"
                                    placeholder="" value="<?php echo esc_attr($wceazy_occ_buy_now_btn_plpr); ?>">
                                <small>
                                    <?php esc_html_e('Buy now button padding left & right (PX)', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div
                            class="wceazy_one_click_checkout_field_group wceazy_one_click_checkout_buy_now_btn_border_radius">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Border Radius', 'wceazy'); ?>
                                <span style="color: #FF521D;">
                                    <?php esc_html_e('(Pro)', 'wceazy'); ?>
                                </span>
                            </label>
                            <div class="field_with_msg_container">
                                <input disabled class="wceazy_one_click_checkout_text_field" type="number"
                                    placeholder=""
                                    value="<?php echo esc_attr($wceazy_occ_buy_now_btn_border_radius); ?>">
                                <small>
                                    <?php esc_html_e('Buy now button border radius (PX)', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="coupon_tab_body" data-id="tab_checkout">
                    <div class="tab_body_title">
                        <h1>
                            <?php esc_html_e('Checkout Settings', 'wceazy'); ?>
                        </h1>
                    </div>
                    <div class="tab_body_form">
                        <div
                            class="wceazy_one_click_checkout_field_group wceazy_one_click_checkout_remove_order_comment">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Remove Order comment', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <label class="toggle_switch"><input type="checkbox" <?php echo esc_attr($wceazy_occ_remove_order_comment == "yes" ? "checked" : ""); ?>><span
                                        class="slider round"></span></label>
                                <small>
                                    <?php esc_html_e('Enable to remove “order comment” from the checkout page.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div class="wceazy_one_click_checkout_field_group wceazy_one_click_checkout_remove_coupon_form">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Remove coupon form', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <label class="toggle_switch"><input type="checkbox" <?php echo esc_attr($wceazy_occ_remove_coupon_form == "yes" ? "checked" : ""); ?>><span
                                        class="slider round"></span></label>
                                <small>
                                    <?php esc_html_e('Enable to remove “Coupon Form” from the checkout page', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div class="wceazy_one_click_checkout_field_group wceazy_one_click_checkout_remove_policy_text">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Remove policy text', 'wceazy'); ?>
                                <span style="color: #FF521D;">
                                    <?php esc_html_e('(Pro)', 'wceazy'); ?>
                                </span>
                            </label>
                            <div class="field_with_msg_container">
                                <label class="toggle_switch"><input disabled type="checkbox" <?php echo esc_attr($wceazy_occ_remove_policy_text == "yes" ? "checked" : ""); ?>><span
                                        class="slider round"></span></label>
                                <small>
                                    <?php esc_html_e('Enable to remove “Policy Text” from the checkout page.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div
                            class="wceazy_one_click_checkout_field_group wceazy_one_click_checkout_remove_terms_condition">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Remove terms & conditions', 'wceazy'); ?>
                                <span style="color: #FF521D;">
                                    <?php esc_html_e('(Pro)', 'wceazy'); ?>
                                </span>
                            </label>
                            <div class="field_with_msg_container">
                                <label class="toggle_switch"><input disabled type="checkbox" <?php echo esc_attr($wceazy_occ_remove_terms_condition == "yes" ? "checked" : ""); ?>><span
                                        class="slider round"></span></label>
                                <small>
                                    <?php esc_html_e('Enable to remove “Terms & Conditions” from the checkout page.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>


                        <div
                            class="wceazy_one_click_checkout_field_group wceazy_one_click_checkout_remove_billing_fields">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Remove billing fields ', 'wceazy'); ?><span style="color: #FF521D;">
                                    <?php esc_html_e('(Pro)', 'wceazy'); ?>
                                </span>
                            </label>
                            <div class="field_with_msg_container">
                                <select disabled class="wceazy_one_click_checkout_select_field" multiple="multiple">
                                    <option value="">
                                        <?php esc_html_e('Please select', 'wceazy'); ?>
                                    </option>
                                    <option value="billing_first_name" <?php echo esc_attr(in_array("billing_first_name", $wceazy_occ_remove_billing_fields) ? "selected" : ""); ?>>
                                        <?php esc_html_e(' Billing First Name ', 'wceazy'); ?>
                                    </option>
                                    <option value="billing_last_name" <?php echo esc_attr(in_array("billing_last_name", $wceazy_occ_remove_billing_fields) ? "selected" : ""); ?>>
                                        <?php esc_html_e(' Billing Last Name ', 'wceazy'); ?>
                                    </option>
                                    <option value="billing_address_1" <?php echo esc_attr(in_array("billing_address_1", $wceazy_occ_remove_billing_fields) ? "selected" : ""); ?>>
                                        <?php esc_html_e(' Billing Address 1 ', 'wceazy'); ?>
                                    </option>
                                    <option value="billing_address_2" <?php echo esc_attr(in_array("billing_address_2", $wceazy_occ_remove_billing_fields) ? "selected" : ""); ?>>
                                        <?php esc_html_e(' Billing Address 2 ', 'wceazy'); ?>
                                    </option>
                                    <option value="billing_country" <?php echo esc_attr(in_array("billing_country", $wceazy_occ_remove_billing_fields) ? "selected" : ""); ?>>
                                        <?php esc_html_e(' Billing Country ', 'wceazy'); ?>
                                    </option>
                                    <option value="billing_city" <?php echo esc_attr(in_array("billing_city", $wceazy_occ_remove_billing_fields) ? "selected" : ""); ?>>
                                        <?php esc_html_e(' Billing City ', 'wceazy'); ?>
                                    </option>
                                    <option value="billing_state" <?php echo esc_attr(in_array("billing_state", $wceazy_occ_remove_billing_fields) ? "selected" : ""); ?>>
                                        <?php esc_html_e(' Billing State ', 'wceazy'); ?>
                                    </option>
                                    <option value="billing_postcode" <?php echo esc_attr(in_array("billing_postcode", $wceazy_occ_remove_billing_fields) ? "selected" : ""); ?>>
                                        <?php esc_html_e(' Billing Postcode ', 'wceazy'); ?>
                                    </option>
                                    <option value="billing_company" <?php echo esc_attr(in_array("billing_company", $wceazy_occ_remove_billing_fields) ? "selected" : ""); ?>>
                                        <?php esc_html_e(' Billing Company ', 'wceazy'); ?>
                                    </option>
                                    <option value="billing_phone" <?php echo esc_attr(in_array("billing_phone", $wceazy_occ_remove_billing_fields) ? "selected" : ""); ?>>
                                        <?php esc_html_e(' Billing Phone ', 'wceazy'); ?>
                                    </option>
                                    <option value="billing_email" <?php echo esc_attr(in_array("billing_email", $wceazy_occ_remove_billing_fields) ? "selected" : ""); ?>>
                                        <?php esc_html_e(' Billing Email ', 'wceazy'); ?>
                                    </option>
                                </select>
                                <small>
                                    <?php esc_html_e('Choose the info you want to delete from \'Billing.\'', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div
                            class="wceazy_one_click_checkout_field_group wceazy_one_click_checkout_remove_shipping_fields">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Skip shipping details?', 'wceazy'); ?>
                                <span style="color: #FF521D;">
                                    <?php esc_html_e('(Pro)', 'wceazy'); ?>
                                </span>
                            </label>
                            <div class="field_with_msg_container">
                                <select disabled class="wceazy_one_click_checkout_select_field" multiple="multiple">
                                    <option value="">
                                        <?php esc_html_e('Please select', 'wceazy'); ?>
                                    </option>
                                    <option value="shipping_first_name" <?php echo esc_attr(in_array("shipping_first_name", $wceazy_occ_remove_shipping_fields) ? "selected" : ""); ?>>
                                        <?php esc_html_e('Shipping First Name', 'wceazy'); ?>
                                    </option>
                                    <option value="shipping_last_name" <?php echo esc_attr(in_array("shipping_last_name", $wceazy_occ_remove_shipping_fields) ? "selected" : ""); ?>>
                                        <?php esc_html_e('Shipping Last Name', 'wceazy'); ?>
                                    </option>
                                    <option value="shipping_address_1" <?php echo esc_attr(in_array("shipping_address_1", $wceazy_occ_remove_shipping_fields) ? "selected" : ""); ?>>
                                        <?php esc_html_e('Shipping Address 1', 'wceazy'); ?>
                                    </option>
                                    <option value="shipping_address_2" <?php echo esc_attr(in_array("shipping_address_2", $wceazy_occ_remove_shipping_fields) ? "selected" : ""); ?>>
                                        <?php esc_html_e('Shipping Address 2', 'wceazy'); ?>
                                    </option>
                                    <option value="shipping_country" <?php echo esc_attr(in_array("shipping_country", $wceazy_occ_remove_shipping_fields) ? "selected" : ""); ?>>
                                        <?php esc_html_e('Shipping Country', 'wceazy'); ?>
                                    </option>
                                    <option value="shipping_city" <?php echo esc_attr(in_array("shipping_city", $wceazy_occ_remove_shipping_fields) ? "selected" : ""); ?>>
                                        <?php esc_html_e('Shipping City', 'wceazy'); ?>
                                    </option>
                                    <option value="shipping_state" <?php echo esc_attr(in_array("shipping_state", $wceazy_occ_remove_shipping_fields) ? "selected" : ""); ?>>
                                        <?php esc_html_e('Shipping State', 'wceazy'); ?>
                                    </option>
                                    <option value="shipping_postcode" <?php echo esc_attr(in_array("shipping_postcode", $wceazy_occ_remove_shipping_fields) ? "selected" : ""); ?>>
                                        <?php esc_html_e('Shipping Postcode', 'wceazy'); ?>
                                    </option>
                                    <option value="shipping_company" <?php echo esc_attr(in_array("shipping_company", $wceazy_occ_remove_shipping_fields) ? "selected" : ""); ?>>
                                        <?php esc_html_e('Shipping Company', 'wceazy'); ?>
                                    </option>
                                </select>

                                <small>
                                    <?php esc_html_e('Choose which information you want to delete from the Shipping Section.', 'wceazy'); ?>
                                </small>

                            </div>
                        </div>



                    </div>
                </div>

            </div>
        </div>


        <div class="wceazy_one_click_checkout_bottom_button_section">
            <button onclick="wceazy_one_click_checkout_save();">
                <?php esc_html_e('Save Settings', 'wceazy'); ?>
            </button>
        </div>



    </div>

</div>