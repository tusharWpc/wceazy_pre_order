<div id="wceazy_coupon_generator">
    <div class="wceazy_coupon_generator_header">
        <div class="wceazy_header_part_left">
            <p><?php esc_html_e('wcEazy', 'wceazy'); ?> <span><?php echo esc_attr(WCEAZY_VERSION); ?></span></p>
        </div>
        <div class="wceazy_header_part_right">
            <a class="wceazy_get_pro" target="_blank" href="<?php echo esc_url(WCEAZY_GET_PRO_URL); ?>"><?php esc_html_e('GET PRO', 'wceazy'); ?></a>
        </div>
    </div>

    <div class="wceazy_coupon_generator_page_title">
        <div class="page_title_part_left">
            <h2><?php esc_html_e('Coupon Generator', 'wceazy'); ?></h2>
            <a target="_blank" href="<?php echo esc_url(WCEAZY_DOCS_PAGE); ?>"><?php esc_html_e('Documentation', 'wceazy'); ?></a>
        </div>
        <div class="page_title_part_right">
            <button class="wceazy_coupon_generator_back_to_dashboard_btn" onclick="wceazy_modules_page_init('<?php echo esc_url(WCEAZY_URL); ?>')"><?php esc_html_e('Back to all Modules', 'wceazy'); ?></button>
        </div>
    </div>

    <div class="wceazy_coupon_generator_container">
        <form class="wceazy_coupon_generator_form_for_reset_purpose">
            <div class="wceazy_coupon_generator_top_action">
                <div class="wceazy_coupon_generator_field_group_flex wceazy_coupon_generator_prefix">
                    <label  ><?php esc_html_e('Prefix', 'wceazy'); ?> <span style="color: #FF521D;" >(Pro)</span></label>
                    <input class="wceazy_coupon_generator_text_field" type="text" placeholder="<?php esc_attr_e('Coupon prefix', 'wceazy'); ?>" disabled>
                </div>

                <div class="wceazy_coupon_generator_field_group_flex wceazy_coupon_generator_number_of_coupon">
                    <label><?php esc_html_e('Number of Coupons', 'wceazy'); ?></label>
                    <input onkeyup="wceazy_coupon_generator_removeChar(this);" class="wceazy_coupon_generator_text_field" type="text" placeholder="<?php esc_attr_e('Total number of coupons', 'wceazy'); ?>">
                </div>

                <div class="wceazy_coupon_generator_field_group_flex wceazy_coupon_generator_coupon_type">
                    <label class="wceazy_coupon_generator_select2_label">
                            <?php esc_html_e('Coupon Type', 'wceazy'); ?> 
                            <span style="color: #FF521D;" ><?php esc_html_e('(Pro)', 'wceazy'); ?> 
                        </span>
                   </label>
                   
                    <select class="wceazy_coupon_generator_select_field">
                        <option value=""><?php esc_html_e('Please select', 'wceazy'); ?></option>
                        <option value="char"><?php esc_html_e('Characters', 'wceazy'); ?></option>
                        <option value="num" disabled><?php esc_html_e('Numbers (Available in Pro)', 'wceazy'); ?></option>
                        <option value="charNum" disabled><?php esc_html_e('Characters & Numbers (Available in Pro)', 'wceazy'); ?></option>
                    </select>
                </div>

                <div class="wceazy_coupon_generator_field_group_flex wceazy_coupon_generator_coupon_length">
                    <label class="wceazy_coupon_generator_select2_label"><?php esc_html_e('Coupons Character Length', 'wceazy'); ?></label>
                    <select class="wceazy_coupon_generator_select_field">
                        <option value=""><?php esc_html_e('Please select', 'wceazy'); ?></option>
                        <?php for ($i = 4; $i <= 20; $i++) { ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="wceazy_coupon_generator_tab">
                <div class="wceazy_coupon_generator_tab_part_left">
                    <div class="coupon_data_tabs">
                        <div class="tab_item tab_item_active" data-target="coupon_tab_general">
                            <h1><?php esc_html_e('General', 'wceazy'); ?></h1>
                        </div>
                        <div class="tab_item" data-target="coupon_tab_usage_restriction">
                            <h1><?php esc_html_e('Usage Restriction', 'wceazy'); ?></h1>
                        </div>
                        <div class="tab_item" data-target="coupon_tab_usage_limits">
                            <h1><?php esc_html_e('Usage Limits', 'wceazy'); ?></h1>
                        </div>
                    </div>
                </div>

                <div class="wceazy_coupon_generator_tab_part_right">
                    <div class="coupon_tab_body" data-id="coupon_tab_general">
                        <div class="tab_body_title">
                            <h1><?php esc_html_e('General', 'wceazy'); ?></h1>
                        </div>
                        <div class="tab_body_form" id="tab_body_form">
                            <div class="wceazy_coupon_generator_field_group wceazy_coupon_generator_discount_type">
                                <label for="coupon_generator_discount_type" style="margin-bottom: 20px;"><?php esc_html_e('Discount type', 'wceazy'); ?></label>
                                <select class="wceazy_coupon_generator_select_field">
                                    <option value=""><?php esc_html_e('Please select', 'wceazy'); ?></option>
                                    <option value="percent"><?php esc_html_e('Percentage discount', 'wceazy'); ?></option>
                                    <option value="fixed_cart"><?php esc_html_e('Fixed cart discount', 'wceazy'); ?></option>
                                    <option value="fixed_product"><?php esc_html_e('Fixed product discount', 'wceazy'); ?></option>
                                </select>
                                <small><?php esc_html_e('Choose the specific discount type.', 'wceazy'); ?></small>
                            </div>

                            <div class="wceazy_coupon_generator_field_group wceazy_coupon_generator_coupon_amount">
                                <label for="coupon_generator_coupon_amount"><?php esc_html_e('Coupon amount', 'wceazy'); ?></label>
                                <input class="wceazy_coupon_generator_text_field" type="text" placeholder="0">
                                <small class="wceazy_coupon_amount_notice d-block"></small>
                            </div>
                            <div class="wceazy_coupon_generator_field_group wceazy_coupon_generator_free_shipping">
                                <label for="coupon_generator_free_shipping"><?php esc_html_e('Allow free shipping', 'wceazy'); ?></label>
                                <div class="wceazy_coupon_checkbox">
                                    <input type="checkbox">
                                    <span class="description"><?php esc_html_e('Check this box if the coupon grants free shipping. A', 'wceazy'); ?>
                                        <a href="https://docs.woocommerce.com/document/free-shipping/" target="_blank"><?php esc_html_e('free shipping method', 'wceazy'); ?></a>
                                        <?php esc_html_e('must be enabled in your shipping zone and be set to require "a valid free shipping coupon" (see the "Free Shipping Requires" setting).', 'wceazy'); ?>
                                    </span>
                                </div>
                            </div>
                            <div class="wceazy_coupon_generator_field_group wceazy_coupon_generator_expiry_date">
                                <label for="coupon_generator_expiry_date"><?php esc_html_e('Coupon expiry date', 'wceazy'); ?></label>
                                <input type="date" class="wceazy_coupon_generator_text_field" placeholder="<?php esc_attr_e('YYY-MM-DD', 'wceazy'); ?>" min="1997-01-01">
                            </div>
                        </div>

                    </div>
                    <div class="coupon_tab_body" data-id="coupon_tab_usage_restriction">
                        <div class="tab_body_title">
                            <h1><?php esc_html_e('Usage restriction', 'wceazy'); ?></h1>
                        </div>
                        <div class="tab_body_form" id="tab_body_form">
                            <div class="wceazy_coupon_generator_field_group wceazy_coupon_generator_minimum_amount">
                                <label for="coupon_generator_minimum_amount"><?php esc_html_e('Minimum spend', 'wceazy'); ?></label>
                                <input class="wceazy_coupon_generator_text_field" type="text" placeholder="<?php esc_attr_e('No minimum', 'wceazy'); ?>">
                            </div>
                            <div class="wceazy_coupon_generator_field_group wceazy_coupon_generator_maximum_amount">
                                <label for="coupon_generator_maximum_amount"><?php esc_html_e('Maximum spend', 'wceazy'); ?></label>
                                <input class="wceazy_coupon_generator_text_field" type="text" placeholder="<?php esc_attr_e('No maximum', 'wceazy'); ?>">
                            </div>
                            <div class="wceazy_coupon_generator_field_group wceazy_coupon_generator_individual_use">
                                <label for="coupon_generator_individual_use"><?php esc_html_e('Individual use only', 'wceazy'); ?></label>
                                <div class="wceazy_coupon_checkbox">
                                    <input type="checkbox">
                                    <span class="description"><?php esc_html_e('If coupon can/t be used with others, mark this box.', 'wceazy'); ?></span>
                                </div>
                            </div>
                            <div class="wceazy_coupon_generator_field_group wceazy_coupon_generator_exclude_sale_items">
                                <label for="coupon_generator_exclude_sale_items"><?php esc_html_e('Exclude sale items', 'wceazy'); ?></label>
                                <div class="wceazy_coupon_checkbox">
                                    <input type="checkbox">
                                    <span class="description"><?php esc_html_e('If it/s on sale, skip the coupon. The coupon only applies to regular-priced items, whether bought alone or in the cart.', 'wceazy'); ?></span>
                                </div>
                            </div>
                            <div class="wceazy_coupon_generator_field_group wceazy_coupon_generator_product_ids">
                                <label for="coupon_generator_product_ids"><?php esc_html_e('Products', 'wceazy'); ?></label>
                                <select class="wceazy_coupon_generator_select_field" multiple="multiple">
                                    <option value=""><?php esc_html_e('Please select', 'wceazy'); ?></option>
                                    <?php
                                    foreach ($this->coupon_generator->utils->getWooProducts() as $product) {
                                        echo '<option value="' . $product["id"] . '">' . $product["text"] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="wceazy_coupon_generator_field_group wceazy_coupon_generator_exclude_product_ids">
                                <label for="coupon_generator_exclude_product_ids"><?php esc_html_e('Leave out items.', 'wceazy'); ?></label>
                                <select class="wceazy_coupon_generator_select_field" multiple="multiple">
                                    <option value=""><?php esc_html_e('Please select', 'wceazy'); ?></option>
                                    <?php
                                    foreach ($this->coupon_generator->utils->getWooProducts() as $product) {
                                        echo '<option value="' . $product["id"] . '">' . $product["text"] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="wceazy_coupon_generator_field_group wceazy_coupon_generator_product_categories">
                                <label for="coupon_generator_product_categories"><?php esc_html_e('Product categories', 'wceazy'); ?></label>
                                <select class="wceazy_coupon_generator_select_field" multiple="multiple">
                                    <option value=""><?php esc_html_e('Please select', 'wceazy'); ?></option>
                                    <?php
                                    foreach ($this->coupon_generator->utils->getWooCategories() as $product) {
                                        echo '<option value="' . $product["id"] . '">' . $product["text"] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="wceazy_coupon_generator_field_group wceazy_coupon_generator_exclude_product_categories">
                                <label for="coupon_generator_exclude_product_categories"><?php esc_html_e('Exclude categories', 'wceazy'); ?></label>
                                <select class="wceazy_coupon_generator_select_field" multiple="multiple">
                                    <option value=""><?php esc_html_e('Please select', 'wceazy'); ?></option>
                                    <?php
                                    foreach ($this->coupon_generator->utils->getWooCategories() as $product) {
                                        echo '<option value="' . $product["id"] . '">' . $product["text"] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="wceazy_coupon_generator_field_group wceazy_coupon_generator_customer_email">
                                <label for="coupon_generator_customer_email"><?php esc_html_e('Allowed emails', 'wceazy'); ?></label>
                                <input class="wceazy_coupon_generator_text_field" type="text" placeholder="<?php esc_attr_e('No restrictions', 'wceazy'); ?>">
                            </div>
                        </div>
                    </div>

                    <div class="coupon_tab_body" data-id="coupon_tab_usage_limits">
                        <div class="tab_body_title">
                            <h1><?php esc_html_e('Usage limits', 'wceazy'); ?></h1>
                        </div>
                        <div class="tab_body_form" id="tab_body_form">
                            <div class="wceazy_coupon_generator_field_group wceazy_coupon_generator_usage_limit">
                                <label for="coupon_generator_usage_limit"><?php esc_html_e('How many times you can use it.', 'wceazy'); ?></label>
                                <input class="wceazy_coupon_generator_text_field" type="number" placeholder="0" step="1" min="0">
                            </div>
                            <div class="wceazy_coupon_generator_field_group wceazy_coupon_generator_limit_usage_to_x_items">
                                <label for="coupon_generator_limit_usage_to_x_items"><?php esc_html_e('Limit usage to X items', 'wceazy'); ?></label>
                                <input class="wceazy_coupon_generator_text_field" type="number" placeholder="0" step="1" min="0">
                            </div>
                            <div class="wceazy_coupon_generator_field_group wceazy_coupon_generator_usage_limit_per_user">
                                <label for="coupon_generator_usage_limit_per_user"><?php esc_html_e('Usage limit per user', 'wceazy'); ?></label>
                                <input class="wceazy_coupon_generator_text_field" type="number" placeholder="0" step="1" min="0">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </form>

        <div class="wceazy_coupon_generator_bottom_button_section">
            <button onclick="wceazy_submit_coupon_generator();"><?php esc_html_e('Save Settings', 'wceazy'); ?></button>
        </div>


    </div>

</div>



<div class="wceazy_coupon_generator_popup">
    <div class="wceazy_coupon_generator_popup_inner">
        <div class="generating_coupon">
            <p><?php esc_html_e('Generating Coupons', 'wceazy'); ?></p>
            <img src="<?php echo WCEAZY_IMG_DIR . 'modules/coupon_generator/popup_spinner.svg' ?>" alt="">
        </div>
        <div class="successes_message">
            <p><span class="coupon_count"></span> <?php esc_html_e('Coupons Generated Successfully!', 'wceazy'); ?></p>
            <button class="wceazy_coupon_generator_popup_export_btn"><?php esc_html_e('Export as CSV', 'wceazy'); ?></button>
            <button class="wceazy_close_popup" onclick="wceazy_coupon_generator_close_popup();"></button>
        </div>

    </div>
</div>