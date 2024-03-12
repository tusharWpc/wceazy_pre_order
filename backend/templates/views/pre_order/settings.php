<?php

$wceazy_pre_order_settings = get_option('wceazy_pre_order_settings', false);
$wceazy_po_settings = $wceazy_pre_order_settings ? json_decode($wceazy_pre_order_settings, true) : array();

$wceazy_po_enable_pre_order = isset($wceazy_po_settings["enable_pre_order"]) ? $wceazy_po_settings["enable_pre_order"] : "yes";

$wceazy_po_pre_order_btn_text = isset($wceazy_po_settings["pre_order_btn_text"]) ? $wceazy_po_settings["pre_order_btn_text"] : "PreOrder Now!";

$wceazy_po_pre_order_avl_date_label = isset($wceazy_po_settings["pre_order_avl_date_label"]) ? $wceazy_po_settings["pre_order_avl_date_label"] : "Default Avl Data";

$wceazy_po_pre_order_enable_avl_date_label = isset($wceazy_po_settings["pre_order_enable_avl_date_label"]) ? $wceazy_po_settings["pre_order_enable_avl_date_label"] : "yes";

$wceazy_po_pre_order_enable_avl_date_and_label = isset($wceazy_po_settings["pre_order_enable_avl_date_and_label"]) ? $wceazy_po_settings["pre_order_enable_avl_date_and_label"] : "yes";


// wceazy_po_wceazy_pre_order_enabler_avl_date_label
echo "<pre>";
var_dump($wceazy_po_pre_order_enable_avl_date_and_label);
echo "</pre>";

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
                    <div class="tab_item tab_item" data-target="tab_email">
                        <h1>
                            <?php esc_html_e('Email Templates', 'wceazy'); ?>
                        </h1>
                    </div>
                    <div class="tab_item tab_item" data-target="tab_notification">
                        <h1>
                            <?php esc_html_e('Email Notification', 'wceazy'); ?>
                        </h1>
                    </div>
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

                        <div class="wceazy_pre_order_field_group wceazy_pre_order_avl_date_label">
                            <label for="wceazy_pre_order_admin_emaill">
                                <?php esc_html_e('Available Date Label', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <input class="wceazy_pre_order_text_field" type="text" placeholder=""
                                    value="<?php echo esc_attr($wceazy_po_pre_order_avl_date_label); ?>">
                                <small>
                                    <?php esc_html_e('Set Pre Order Available Date Label', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>

                        <div class="wceazy_pre_order_field_group pre_order_enable_avl_date_label">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Show Availability Lablet', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <label class="toggle_switch">
                                    <input type="checkbox" <?php echo esc_attr($wceazy_po_pre_order_enable_avl_date_label == "yes" ? "checked" : ""); ?>>
                                    <span class="slider round"></span>
                                </label>
                                <small>
                                    <?php esc_html_e('Enable Pre Order Availability Text.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>
                        <div class="wceazy_pre_order_field_group pre_order_enable_avl_date_and_label">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Show Availability Date & Lablet', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <label class="toggle_switch">
                                    <input type="checkbox" <?php echo esc_attr($wceazy_po_pre_order_enable_avl_date_and_label == "yes" ? "checked" : ""); ?>>
                                    <span class="slider round"></span>
                                </label>
                                <small>
                                    <?php esc_html_e('Enable Pre Order Date & Availability Label.', 'wceazy'); ?>
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="coupon_tab_body" data-id="tab_email">
                    <div class="tab_body_title">
                        <h1>
                            <?php esc_html_e('Email Templates', 'wceazy'); ?>
                        </h1>
                    </div>
                    <div class="tab_body_form">
                        <div class="wceazy_pre_order_field_group wceazy_pre_order_btn_text">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Admin', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <a href="<?php echo esc_url(admin_url('admin.php?page=wc-settings&tab=email&section=wc_pre_order')); ?>"
                                    class="button-link">
                                    <button class="wceazy_pre_order_text_field" type="button">
                                        <?php esc_html_e('New Pre-Order Admin', 'wceazy'); ?>
                                    </button>
                                </a>

                                <small>
                                    <?php esc_html_e('Click here for Customize Admin Pre-Order email', 'wceazy'); ?>
                                </small>
                            </div>

                        </div>
                        <div class="wceazy_pre_order_field_group wceazy_pre_order_custom_email">
                            <label for="wceazy_pre_order_custom_email">
                                <?php esc_html_e('Customer', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <a href="<?php echo esc_url(admin_url('admin.php?page=wc-settings&tab=email&section=wc_pre_order_new')); ?>"
                                    class="button-link">
                                    <button class="wceazy_pre_order_text_field" type="button">
                                        <?php esc_html_e(' Pre-Order Customer', 'wceazy'); ?>
                                    </button>
                                </a>
                                <small>
                                    <?php esc_html_e('Click here for Customize Custom Pre-Oeder email', 'wceazy'); ?>
                                </small>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="coupon_tab_body" data-id="tab_notification">
                    <div class="tab_body_title">
                        <h1>
                            <?php esc_html_e('Email Notification', 'wceazy'); ?>
                        </h1>
                    </div>
                    <div class="tab_body_form">
                        <div class="wceazy_pre_order_field_group wceazy_pre_order_btn_text">
                            <label for="coupon_generator_coupon_amount">
                                <?php esc_html_e('Admin', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <a href="<?php echo esc_url(admin_url('admin.php?page=wc-settings&tab=email&section=wc_pre_order')); ?>"
                                    class="button-link">
                                    <input class="wceazy_pre_order_text_field" type="submit" placeholder=""
                                        value="New Pre-Order Admin">
                                </a>

                                <small>
                                    <?php esc_html_e('Click here for Customize Admin Pre-Oeder email', 'wceazy'); ?>

                                </small>
                            </div>
                        </div>
                        <div class="wceazy_pre_order_field_group wceazy_pre_order_custom_email">
                            <label for="wceazy_pre_order_custom_email">
                                <?php esc_html_e('Customer', 'wceazy'); ?>
                            </label>
                            <div class="field_with_msg_container">
                                <a href="<?php echo esc_url(admin_url('admin.php?page=wc-settings&tab=email&section=wc_pre_order_new')); ?>"
                                    class="button-link">
                                    <input class="wceazy_pre_order_text_field" type="submit" placeholder=""
                                        value="Pre-Order Customer"></a>
                                <small>
                                    <?php esc_html_e('Click here for Customize Custom Pre-Oeder email', 'wceazy'); ?>

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