<div id="wceazy_auto_apply_coupon">


    <div class="wceazy_auto_apply_coupon_header">
        <div class="wceazy_header_part_left">
            <p><?php esc_html_e('wcEazy', 'wceazy'); ?> <span><?php echo esc_attr(WCEAZY_VERSION); ?></span></p>
        </div>
        <div class="wceazy_header_part_right">
            <a class="wceazy_get_pro" target="_blank" href="<?php echo WCEAZY_GET_PRO_URL; ?>"><?php esc_html_e('GET PRO', 'wceazy'); ?></a>
        </div>
    </div>



    <div class="wceazy_auto_apply_coupon_page_title">
        <div class="page_title_part_left">
            <h2><?php esc_html_e('Auto Apply Coupon', 'wceazy'); ?></h2>
            <a target="_blank" href="<?php echo WCEAZY_DOCS_PAGE; ?>"><?php esc_html_e('Documentation', 'wceazy'); ?></a>
        </div>
        <div class="page_title_part_right">
            <button class="wceazy_auto_apply_coupon_back_to_dashboard_btn" onclick="wceazy_modules_page_init(`<?php echo esc_url(WCEAZY_URL); ?>`)"><?php esc_html_e('Back to all Modules', 'wceazy'); ?></button>
        </div>
    </div>



    <div class="wceazy_auto_apply_coupon_container">
        <form action="#" id="posts-filter" method="get">


            <div class="wceazy_auto_apply_coupon_table_top_actions">
                <div class="wceazy_auto_apply_coupon_top_actions_part_left">
                    <p><?php esc_html_e('Per page view', 'wceazy'); ?></p>
                    <select class="wceazy_auto_apply_coupon_items_per_page">
                        <option value="10"><?php esc_html_e('10', 'wceazy'); ?></option>
                        <option value="20"><?php esc_html_e('20', 'wceazy'); ?></option>
                        <option value="30"><?php esc_html_e('30', 'wceazy'); ?></option>
                        <option value="40"><?php esc_html_e('40', 'wceazy'); ?></option>
                        <option value="50"><?php esc_html_e('50', 'wceazy'); ?></option>
                        <option value="60"><?php esc_html_e('60', 'wceazy'); ?></option>
                        <option value="70"><?php esc_html_e('70', 'wceazy'); ?></option>
                        <option value="80"><?php esc_html_e('80', 'wceazy'); ?></option>
                        <option value="90"><?php esc_html_e('90', 'wceazy'); ?></option>
                        <option value="100"><?php esc_html_e('100', 'wceazy'); ?></option>
                    </select>
                    <select class="wceazy_auto_apply_coupon_bulk_action_type" onchange="wceazy_auto_apply_coupon_bulk_edit_check_ability()">
                        <option value=""><?php esc_html_e('Bulk actions', 'wceazy'); ?></option>
                        <option value="add"><?php esc_html_e('Add to auto apply', 'wceazy'); ?></option>
                        <option value="remove"><?php esc_html_e('Remove from auto apply', 'wceazy'); ?></option>
                    </select>
                    <input type="button" class="wceazy_auto_apply_coupon_bulk_edit_btn" value="Apply (PRO)" onclick="wceazy_auto_apply_coupon_bulk_edit()" disabled>
                    <select class="wceazy_auto_apply_coupon_filter_discount_type">
                        <option value=""><?php esc_html_e('Show all types', 'wceazy'); ?></option>
                        <option value="percentage discount"><?php esc_html_e('Percentage discount', 'wceazy'); ?></option>
                        <option value="fixed cart discount"><?php esc_html_e('Fixed cart discount', 'wceazy'); ?></option>
                        <option value="fixed product discount"><?php esc_html_e('Fixed product discount', 'wceazy'); ?></option>
                    </select>
                </div>
                <div class="wceazy_auto_apply_coupon_top_actions_part_right">
                    <input type="text" placeholder="Search">
                </div>
            </div>



        </form>
        <table class="wceazy_auto_apply_coupon_table">
            <thead>
                <tr>
                    <td class="no-sort">
                        <input type="checkbox" onchange="wceazy_auto_apply_coupon_checkbox_select_all(this)">
                    </td>
                    <th><?php esc_html_e('Code', 'wceazy'); ?></th>
                    <th><?php esc_html_e('Coupon Type', 'wceazy'); ?></th>
                    <th><?php esc_html_e('Coupon Amount', 'wceazy'); ?></th>
                    <th><?php esc_html_e('Description', 'wceazy'); ?></th>
                    <th><?php esc_html_e('Product IDs', 'wceazy'); ?></th>
                    <th><?php esc_html_e('Usage/Limit', 'wceazy'); ?></th>
                    <th><?php esc_html_e('Expiry Date', 'wceazy'); ?></th>
                    <th><?php esc_html_e('Is Auto Coupon', 'wceazy'); ?></th>
                    <th><?php esc_html_e('Action', 'wceazy'); ?></th>
                </tr>
            </thead>
            <tbody class="wceazy_auto_apply_coupon_table_body"></tbody>
        </table>
    </div>

</div>



<div class="wceazy_auto_apply_coupon_popup">
    <div class="wceazy_popup_inar">
        <div class="successes_message">
            <p class="wceazy-popup-content"><?php esc_html_e('Are you sure?', 'wceazy'); ?> </p>
            <div class="wceazy-btn-wrapper">
                <button type="button" class="wceazy-btn-danger" onclick="wceazy_auto_apply_coupon_close_popup();"><?php esc_html_e('No', 'wceazy'); ?></button>
                <button type="button" class="wceazy-btn-success"><?php esc_html_e('Yes', 'wceazy'); ?></button>
            </div>
            <button class="wceazy_close_popup" onclick="wceazy_auto_apply_coupon_close_popup();"></button>
        </div>
    </div>
</div>