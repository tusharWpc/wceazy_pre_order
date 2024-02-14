<div id="wceazy_url_coupon">

    <div class="wceazy_url_coupon_header">
        <div class="wceazy_header_part_left">
            <p><?php esc_html_e('wcEazy', 'wceazy'); ?> <span><?php echo esc_attr(WCEAZY_VERSION); ?></span></p>
        </div>
        <div class="wceazy_header_part_right">
            <a class="wceazy_get_pro" target="_blank" href="<?php echo WCEAZY_GET_PRO_URL; ?>"><?php esc_html_e('GET PRO', 'wceazy'); ?></a>
        </div>
    </div>

    <div class="wceazy_url_coupon_page_title">
        <div class="page_title_part_left">
            <h2><?php esc_html_e('URL Coupon', 'wceazy'); ?></h2>
            <a target="_blank" href="<?php echo WCEAZY_DOCS_PAGE; ?>"><?php esc_html_e('Documentation', 'wceazy'); ?></a>
        </div>
        <div class="page_title_part_right">
            <button class="wceazy_url_coupon_back_to_dashboard_btn" onclick="wceazy_modules_page_init(`<?php echo esc_url(WCEAZY_URL); ?>`)"><?php esc_html_e('Back to all Modules', 'wceazy'); ?></button>
        </div>
    </div>

    <div class="wceazy_url_coupon_container">
        <form action="#" id="posts-filter" method="get">

            <div class="wceazy_url_coupon_table_top_actions">
                <div class="wceazy_url_coupon_top_actions_part_left">
                    <p><?php esc_html_e('Per page view', 'wceazy'); ?></p>
                    <select class="wceazy_url_coupon_items_per_page">
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="30">30</option>
                        <option value="40">40</option>
                        <option value="50">50</option>
                        <option value="60">60</option>
                        <option value="70">70</option>
                        <option value="80">80</option>
                        <option value="90">90</option>
                        <option value="100">100</option>
                    </select>

                    <select class="wceazy_url_coupon_filter_discount_type">
                        <option value=""><?php esc_html_e('Show all types', 'wceazy'); ?></option>
                        <option value="percentage discount"><?php esc_html_e('Percentage discount', 'wceazy'); ?></option>
                        <option value="fixed cart discount"><?php esc_html_e('Fixed cart discount', 'wceazy'); ?></option>
                        <option value="fixed product discount"><?php esc_html_e('Fixed product discount', 'wceazy'); ?></option>
                    </select>
                </div>
                <div class="wceazy_url_coupon_top_actions_part_right">
                    <input type="text" placeholder="<?php esc_attr_e('Search', 'wceazy'); ?>">
                </div>
            </div>

        </form>
        <table class="wceazy_url_coupon_table">
            <thead>
                <tr>
                    <th><?php esc_html_e('Code', 'wceazy'); ?></th>
                    <th><?php esc_html_e('Coupon Type', 'wceazy'); ?></th>
                    <th><?php esc_html_e('Coupon Amount', 'wceazy'); ?></th>
                    <th><?php esc_html_e('Description', 'wceazy'); ?></th>
                    <th><?php esc_html_e('Product IDs', 'wceazy'); ?></th>
                    <th><?php esc_html_e('Usage/Limit', 'wceazy'); ?></th>
                    <th><?php esc_html_e('Expiry Date', 'wceazy'); ?></th>
                    <th><?php esc_html_e('Is URL Coupon', 'wceazy'); ?></th>
                    <th><?php esc_html_e('Action', 'wceazy'); ?></th>
                </tr>
            </thead>
            <tbody class="wceazy_url_coupon_table_body"></tbody>
        </table>
    </div>

    <!-- <p style="font-size: 13px;"><?php esc_html_e('Total z', 'wceazy'); ?></p> -->
</div> 