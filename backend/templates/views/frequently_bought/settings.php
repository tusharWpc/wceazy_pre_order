<?php

$wceazy_frequently_bought_settings = get_option('wceazy_frequently_bought_settings', false);
$wceazy_po_settings = $wceazy_frequently_bought_settings ? json_decode($wceazy_frequently_bought_settings, true) : array();

$wceazy_po_enable_frequently_bought = isset($wceazy_po_settings["enable_frequently_bought"]) ? $wceazy_po_settings["enable_frequently_bought"] : "yes";

$wceazy_po_frequently_bought_btn_text = isset($wceazy_po_settings["frequently_bought_btn_text"]) ? $wceazy_po_settings["frequently_bought_btn_text"] : "PreOrder Now!";

$wceazy_po_frequently_bought_avl_date_label = isset($wceazy_po_settings["frequently_bought_avl_date_label"]) ? $wceazy_po_settings["frequently_bought_avl_date_label"] : "Default Avl Data";

$wceazy_po_frequently_bought_enable_avl_date_label = isset($wceazy_po_settings["frequently_bought_enable_avl_date_label"]) ? $wceazy_po_settings["frequently_bought_enable_avl_date_label"] : "yes";

$wceazy_po_frequently_bought_enable_avl_date_and_label = isset($wceazy_po_settings["frequently_bought_enable_avl_date_and_label"]) ? $wceazy_po_settings["frequently_bought_enable_avl_date_and_label"] : "yes";




$wceazy_po_frequently_bought_automatically_cancel_frequently_boughts = isset($wceazy_po_settings["frequently_bought_automatically_cancel_frequently_boughts"]) ? $wceazy_po_settings["frequently_bought_automatically_cancel_frequently_boughts"] : "yes";


// echo "<pre>";
// echo "auto:";
// var_dump($wceazy_po_frequently_bought_automatically_cancel_frequently_boughts);
// echo "</pre>";


$wceazy_po_frequently_bought_enable_admin_notifi = isset($wceazy_po_settings["frequently_bought_enable_admin_notifi"]) ? $wceazy_po_settings["frequently_bought_enable_admin_notifi"] : "yes";

$wceazy_po_frequently_bought_enable_customer_notifi = isset($wceazy_po_settings["frequently_bought_enable_customer_notifi"]) ? $wceazy_po_settings["frequently_bought_enable_customer_notifi"] : "yes";

?>


<div id="wceazy_frequently_bought">
    <div class="wceazy_frequently_bought_header">
        <div class="wceazy_header_part_left">
            <p>wcEazy <span>
                    <?php echo esc_attr(WCEAZY_VERSION); ?>
                </span></p>
        </div>
        <div class="wceazy_header_part_right">
            <a class="wceazy_get_pro" target="_blank" href="<?php echo WCEAZY_GET_PRO_URL; ?>">
                <?php esc_html_e('GET PRO', 'wceazy');?>
            </a>
        </div>
    </div>

    <div class="wceazy_frequently_bought_page_title">
        <div class="page_title_part_left">
            <h2>
                <?php esc_html_e('Frequently Bought', 'wceazy');?>
            </h2>
            <a target="_blank" href="<?php echo WCEAZY_DOCS_PAGE; ?>">
                <?php esc_html_e('Documentation', 'wceazy');?>
            </a>
        </div>
        <div class="page_title_part_right">
            <button class="wceazy_frequently_bought_back_to_dashboard_btn"
                onclick="wceazy_modules_page_init(`<?php echo esc_url(WCEAZY_URL); ?>`)">
                <?php esc_html_e('Back to all Modules', 'wceazy');?>
            </button>
        </div>
    </div>

    <div class="wceazy_frequently_bought_container">
        <div class="wceazy_frequently_bought_tab">
            <div class="wceazy_frequently_bought_tab_part_left">
                <div class="coupon_data_tabs">
                    <div class="tab_item tab_item_active" data-target="tab_general">
                        <h1>
                            <?php esc_html_e('General', 'wceazy');?>
                        </h1>
                    </div>
                    <div class="tab_item tab_item" data-target="tab_email">
                        <h1>
                            <?php esc_html_e('Email Templates', 'wceazy');?>
                        </h1>
                    </div>
                    <div class="tab_item tab_item" data-target="tab_notification">
                        <h1>
                            <?php esc_html_e('Email Notification', 'wceazy');?>
                        </h1>
                    </div>
                </div>
            </div>

            <div class="wceazy_frequently_bought_tab_part_right">
                <div class="coupon_tab_body" data-id="tab_general">
                    <div class="tab_body_title">
                        <h1>
                            <?php esc_html_e('General Settings', 'wceazy');?>
                        </h1>
                    </div>
                    <div class="tab_body_form">
                        <div class="wceazy_frequently_bought_field_group wceazy_frequently_bought_btn_text">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Button Text', 'wceazy');?>
                            </label>
                            <div class="field_with_msg_container">
                                <input class="wceazy_frequently_bought_text_field" type="text" placeholder=""
                                    value="<?php echo esc_attr($wceazy_po_frequently_bought_btn_text); ?>">
                                <small>
                                    <?php esc_html_e('Set your PreOrder button Label', 'wceazy');?>
                                </small>
                            </div>
                        </div>

                        <div class="wceazy_frequently_bought_field_group wceazy_frequently_bought_avl_date_label">
                            <label for="wceazy_frequently_bought_admin_emaill">
                                <?php esc_html_e('Available Date Label', 'wceazy');?>
                            </label>
                            <div class="field_with_msg_container">
                                <input class="wceazy_frequently_bought_text_field" type="text" placeholder=""
                                    value="<?php echo esc_attr($wceazy_po_frequently_bought_avl_date_label); ?>">
                                <small>
                                    <?php esc_html_e('Set PreOrder Available Date Label', 'wceazy');?>
                                </small>
                            </div>
                        </div>

                        <div class="wceazy_frequently_bought_field_group frequently_bought_enable_avl_date_label">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Show Availability Lablet', 'wceazy');?>
                            </label>
                            <div class="field_with_msg_container">
                                <label class="toggle_switch">
                                    <input type="checkbox"
                                        <?php echo esc_attr($wceazy_po_frequently_bought_enable_avl_date_label == "yes" ? "checked" : ""); ?>>
                                    <span class="slider round"></span>
                                </label>
                                <small>
                                    <?php esc_html_e('Enable PreOrder Availability Label.', 'wceazy');?>
                                </small>
                            </div>
                        </div>
                        <div class="wceazy_frequently_bought_field_group frequently_bought_enable_avl_date_and_label">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Show Availability Date & Lablet', 'wceazy');?>
                            </label>
                            <div class="field_with_msg_container">
                                <label class="toggle_switch">
                                    <input type="checkbox"
                                        <?php echo esc_attr($wceazy_po_frequently_bought_enable_avl_date_and_label == "yes" ? "checked" : ""); ?>>
                                    <span class="slider round"></span>
                                </label>
                                <small>
                                    <?php esc_html_e('Enable PreOrder Date & Availability Label.', 'wceazy');?>
                                </small>
                            </div>
                        </div>
                        <div class="wceazy_frequently_bought_field_group frequently_bought_automatically_cancel_frequently_boughts">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Automatically cancel pre-orders', 'wceazy');?>
                            </label>
                            <div class="field_with_msg_container">
                                <label class="toggle_switch">
                                    <input type="checkbox"
                                        <?php echo esc_attr($wceazy_po_frequently_bought_automatically_cancel_frequently_boughts == "yes" ? "checked" : ""); ?>>
                                    <span class="slider round"></span>
                                </label>
                                <small>
                                    <?php esc_html_e('Automatically cancel pre-orders.', 'wceazy');?>
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="coupon_tab_body" data-id="tab_email">
                    <div class="tab_body_title">
                        <h1>
                            <?php esc_html_e('Email Templates', 'wceazy');?>
                        </h1>
                    </div>
                    <div class="tab_body_form">
                        <div class="wceazy_frequently_bought_field_group wceazy_frequently_bought_btn_text">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Set Admin', 'wceazy');?>
                            </label>
                            <div class="field_with_msg_container">
                                <a href="<?php echo esc_url(admin_url('admin.php?page=wc-settings&tab=email&section=wc_frequently_bought')); ?>"
                                    class="button-link">
                                    <button class="wceazy_frequently_bought_text_field" type="button">
                                        <?php esc_html_e('New Pre-Order Admin', 'wceazy');?>
                                    </button>
                                </a>
                                <small>
                                    <?php esc_html_e('Click here for Customize Admin Pre-Order email', 'wceazy');?>
                                </small>
                            </div>
                        </div>
                        <div class="wceazy_frequently_bought_field_group wceazy_frequently_bought_custom_email">
                            <label for="wceazy_frequently_bought_custom_email">
                                <?php esc_html_e('Set Customer', 'wceazy');?>
                            </label>
                            <div class="field_with_msg_container">
                                <a href="<?php echo esc_url(admin_url('admin.php?page=wc-settings&tab=email&section=wc_frequently_bought_new')); ?>"
                                    class="button-link">
                                    <button class="wceazy_frequently_bought_text_field pointer" type="button">
                                        <?php esc_html_e('Pre-Order Customer', 'wceazy');?>
                                    </button>
                                </a>
                                <small>
                                    <?php esc_html_e('Click here for Customize Custom Pre-Order email', 'wceazy');?>
                                </small>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="coupon_tab_body" data-id="tab_notification">
                    <div class="tab_body_title">
                        <h1>
                            <?php esc_html_e('Email Notification', 'wceazy');?>
                        </h1>
                    </div>
                    <div class="tab_body_form">
                        <div class="wceazy_frequently_bought_field_group frequently_bought_enable_admin_notifi">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Admin Notification', 'wceazy');?>
                            </label>
                            <div class="field_with_msg_container">
                                <label class="toggle_switch">
                                    <input type="checkbox"
                                        <?php echo esc_attr($wceazy_po_frequently_bought_enable_admin_notifi == "yes" ? "checked" : ""); ?>>
                                    <span class="slider round"></span>
                                </label>
                                <small>
                                    <?php esc_html_e('Enable PreOrder Admin Notification', 'wceazy');?>
                                </small>
                            </div>
                        </div>
                        <div class="wceazy_frequently_bought_field_group frequently_bought_enable_customer_notifi">
                            <label for="wceazy_frequently_bought_custom_email">
                                <?php esc_html_e('Customer Notification', 'wceazy');?>
                            </label>
                            <div class="field_with_msg_container">
                                <label class="toggle_switch">
                                    <input type="checkbox"
                                        <?php echo esc_attr($wceazy_po_frequently_bought_enable_customer_notifi == "yes" ? "checked" : ""); ?>>
                                    <span class="slider round"></span>
                                </label>
                                <small>
                                    <?php esc_html_e('Enable PreOrder Admin Notification.', 'wceazy');?>
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="wceazy_frequently_bought_bottom_button_section">
            <button onclick="wceazy_frequently_bought_save();">
                <?php esc_html_e('Save Settings', 'wceazy');?>
            </button>
        </div>
    </div>
</div>