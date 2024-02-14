<div id="wceazy_bogo_deal">


    <div class="wceazy_bogo_deal_header">
        <div class="wceazy_header_part_left">
            <p>wcEazy <span><?php echo esc_attr(WCEAZY_VERSION); ?></span></p>
        </div>
        <div class="wceazy_header_part_right">
            <a class="wceazy_get_pro" target="_blank" href="<?php echo WCEAZY_GET_PRO_URL; ?>"><?php esc_html_e('GET PRO', 'wceazy'); ?></a>
        </div>
    </div>



    <div class="wceazy_bogo_deal_page_title">
        <div class="page_title_part_left">
            <h2><?php esc_html_e('BOGO Deal', 'wceazy'); ?></h2>
            
            <a target="_blank" href="<?php echo WCEAZY_DOCS_PAGE; ?>"> <?php esc_html_e('Documentation', 'wceazy'); ?></a>
        </div>
        <div class="page_title_part_right">
            <button class="wceazy_bogo_deal_back_to_dashboard_btn" onclick="wceazy_modules_page_init(`<?php echo esc_url(WCEAZY_URL); ?>`)"><?php esc_html_e('Back to all Modules', 'wceazy'); ?></button>
            <button class="wceazy_bogo_deal_add_btn" onclick="wceazy_bogo_deal_rule_adder()"><?php esc_html_e('Add Rule', 'wceazy'); ?></button>
            <button class="wceazy_bogo_deal_save_btn" onclick="wceazy_bogo_deal_save_rules(this)"><?php esc_html_e('Save Changes', 'wceazy'); ?></button>
        </div>
    </div>



    <div class="wceazy_bogo_deal_container">



        <div class="wceazy_bogo_deal_no_rule" style="display: none;">
            <h3><?php esc_html_e('No pricing rule has been created', 'wceazy'); ?></h3>
            <button onclick="wceazy_bogo_deal_rule_adder()"><?php esc_html_e('Create First Rule', 'wceazy'); ?></button>
        </div>

        <div class="wceazy_bogo_deal_loading" style="display: none;">
            <div class="wceazy_bogo_deal_loader"></div>
        </div>

        <div class="wceazy_bogo_deal_rules"></div>

    </div>

</div>



<!-- Copyable Blocks -->

<div id="wceazy_bogo_deal_block_single_rule" style="display: none;">
    <div class="wceazy_bogo_deal_single_rule">
        <div class="wceazy_bogo_deal_intro">
            <h2 contenteditable="true"><?php esc_html_e('Untitled Rule', 'wceazy'); ?></h2>
            <div class="wceazy_bogo_deal_actions">
                <div class="wceazy_bogo_deal_action_minimize" onclick="wceazy_bogo_deal_rule_minimize(this)">
                    <img src="<?php echo WCEAZY_IMG_DIR . "/modules/bogo_deal/bogo_deal_minimize.svg"  ?>">
                </div>
                <div class="wceazy_bogo_deal_action_maximize" onclick="wceazy_bogo_deal_rule_maximize(this)">
                    <img src="<?php echo WCEAZY_IMG_DIR . "/modules/bogo_deal/bogo_deal_maximize.svg"  ?>">
                </div>
                <div class="wceazy_bogo_deal_action_del" onclick="wceazy_bogo_deal_rule_remover(this)">
                    <img src="<?php echo WCEAZY_IMG_DIR . "/modules/bogo_deal/bogo_deal_rule_del.svg"  ?>">
                    <?php esc_html_e('Delete Rule', 'wceazy'); ?>
                </div>
            </div>
        </div>
        <div class="wceazy_bogo_deal_top_form">
            <div class="wceazy_form_group">
                <label><?php esc_html_e('Discount Type', 'wceazy'); ?></label>
                <select class="">
                    <option value=""> <?php esc_html_e('Please select', 'wceazy'); ?></option>
                    <option value="percent"><?php esc_html_e('Percentage discount', 'wceazy'); ?></option>
                    <option value="fixed"><?php esc_html_e('Fixed discount', 'wceazy'); ?></option>
                </select>
            </div>
            <div class="wceazy_form_group">
                <label><?php esc_html_e('Discount Amount', 'wceazy'); ?></label>
                <input placeholder="Discount Amount" type="number">
            </div>
        </div>
        <div class="wceazy_bogo_deal_data_picker">
            <h3><?php esc_html_e('Products to Buy', 'wceazy'); ?></h3>
            <div class="wceazy_bogo_deal_data_contents">
                <div class="wceazy_bogo_deal_data_buy_row_container"></div>
                <div class="wceazy_bogo_deal_data_add_more">
                    <img onclick="wceazy_bogo_deal_product_buy_adder(this)" src="<?php echo WCEAZY_IMG_DIR . "/modules/bogo_deal/add_icon.svg"  ?>">
                </div>
            </div>
        </div>
        <div class="wceazy_bogo_deal_data_picker">
            <h3><?php esc_html_e('Products to Gift', 'wceazy'); ?></h3>
            <div class="wceazy_bogo_deal_data_contents">
                <div class="wceazy_bogo_deal_data_get_row_container"></div>
                <div class="wceazy_bogo_deal_data_add_more">
                    <img onclick="wceazy_bogo_deal_product_get_adder(this)" src="<?php echo WCEAZY_IMG_DIR . "/modules/bogo_deal/add_icon.svg"  ?>">
                </div>
            </div>
        </div>
    </div>
</div>

<div id="wceazy_bogo_deal_block_product_buy_row" style="display: none;">
    <div class="wceazy_bogo_deal_product_selection_row">
        <div class="wceazy_form_group">
            <label><?php esc_html_e('Productv', 'wceazy'); ?></label>
            <select class="">
                <option value=""> <?php esc_html_e('Please select', 'wceazy'); ?></option>
            </select>
        </div>
        <div class="wceazy_form_group">
            <label><?php esc_html_e('Required Quantity', 'wceazy'); ?></label>
            <input placeholder="Quantity Required" type="number">
        </div>
        <div class="wceazy_remove_field">
            <img onclick="wceazy_bogo_deal_product_removal(this)" src="<?php echo WCEAZY_IMG_DIR . "/modules/bogo_deal/remove_product.svg"  ?>">
        </div>
    </div>
</div>

<div id="wceazy_bogo_deal_block_product_get_row" style="display: none;">
    <div class="wceazy_bogo_deal_product_selection_row">
        <div class="wceazy_form_group">
            <label><?php esc_html_e('Product', 'wceazy'); ?></label>
            <select class="">
                <option value=""> <?php esc_html_e('Please select', 'wceazy'); ?></option>
            </select>
        </div>
        <div class="wceazy_form_group">
            <label><?php esc_html_e('Required Quantity', 'wceazy'); ?></label>
            <input placeholder="Quantity Required" type="number">
        </div>
        <div class="wceazy_remove_field">
            <img onclick="wceazy_bogo_deal_product_removal(this)" src="<?php echo WCEAZY_IMG_DIR . "/modules/bogo_deal/remove_product.svg"  ?>">
        </div>
    </div>
</div>