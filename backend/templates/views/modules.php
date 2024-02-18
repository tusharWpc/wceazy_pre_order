<div id="wceazy_modules">


    <div class="wceazy_modules_header">
        <div class="wceazy_header_part_left">
            <p>wcEazy <span><?php echo esc_attr(WCEAZY_VERSION); ?></span></p>
        </div>
        <div class="wceazy_header_part_right">
            <div class="wceazy_header_part_right">
                <a class="wceazy_get_pro" target="_blank"
                    href="<?php echo WCEAZY_GET_PRO_URL; ?>"><?php esc_html_e('GET PRO', 'wceazy'); ?></a>
            </div>
        </div>
    </div>



    <div class="wceazy_modules_page_title">
        <h2><?php esc_html_e('Modules', 'wceazy'); ?></h2>
    </div>


    <div class="wceazy_modules_breadcrumb">
        <div class="wceazy_modules_breadcrumb_filter">
            <ul>
                <li class="active" onclick="wceazy_module_show_all(this)"><?php esc_html_e('All', 'wceazy'); ?></li>
                <li onclick="wceazy_module_show_active(this)"><?php esc_html_e('Active', 'wceazy'); ?></li>
                <li onclick="wceazy_module_show_inactive(this)"><?php esc_html_e('Inactive', 'wceazy'); ?></li>
            </ul>
        </div>
        <div class="wceazy_modules_breadcrumb_search">
            <div class="search_bar">
                <input type="text" class="module_search" onkeyup="wceazy_module_search(this)"
                    placeholder="Search module, please type 3 or more characters">
            </div>
        </div>
    </div>



    <div class="wceazy_modules_list_items">
        <div class="wceazy_module_item" data-slug="auto_apply_coupon">
            <div class="wceazy_module_logo">
                <img src="<?php echo esc_url(WCEAZY_IMG_DIR . 'modules/auto_apply_coupon/icon.svg'); ?>" height="100" />
            </div>
            <div class="wceazy_module_details">
                <h3><?php esc_html_e('Auto Apply Coupon', 'wceazy'); ?></h3>
                <div class="wceazy_module_action">
                    <label class="toggle_switch">
                        <input type="checkbox" onchange="wceazy_update_module_status(this)"
                            <?php echo ($this->settings->getModuleStatus("auto_apply_coupon") == 1 ? "checked" : ""); ?>>
                        <span class="slider round"></span>
                    </label>
                    <div class="settings_btn <?php echo ($this->settings->getModuleStatus("auto_apply_coupon") == 1 ? "active" : ""); ?>"
                        onclick="wceazy_start_module_settings(`<?php echo esc_url(WCEAZY_URL); ?>`, this)">
                        <?php esc_html_e('Settings', 'wceazy'); ?>
                    </div>
                    <a class="wceazy_module_docs" target="_blank"
                        href="<?php echo WCEAZY_DOCS_PAGE; ?>"><?php esc_html_e('Documentation', 'wceazy'); ?></a>
                </div>
            </div>
        </div>


        <div class="wceazy_module_item" data-slug="bogo_deal">
            <div class="wceazy_module_logo">
                <img src="<?php echo esc_url(WCEAZY_IMG_DIR . 'modules/bogo_deal/icon.svg'); ?>" height="100" />
            </div>
            <div class="wceazy_module_details">
                <h3><?php esc_html_e('BOGO Deal', 'wceazy'); ?></h3>
                <div class="wceazy_module_action">
                    <label class="toggle_switch">
                        <input type="checkbox" onchange="wceazy_update_module_status(this)"
                            <?php echo ($this->settings->getModuleStatus("bogo_deal") == 1 ? "checked" : ""); ?>>
                        <span class="slider round"></span>
                    </label>
                    <div class="settings_btn <?php echo ($this->settings->getModuleStatus("bogo_deal") == 1 ? "active" : ""); ?>"
                        onclick="wceazy_start_module_settings(`<?php echo esc_url(WCEAZY_URL); ?>`, this)">
                        <?php esc_html_e('Settings', 'wceazy'); ?>
                    </div>
                    <a class="wceazy_module_docs" target="_blank"
                        href="<?php echo WCEAZY_DOCS_PAGE; ?>"><?php esc_html_e('Documentation', 'wceazy'); ?></a>
                </div>
            </div>
        </div>


        <div class="wceazy_module_item" data-slug="coupon_generator">
            <div class="wceazy_module_logo">
                <img src="<?php echo esc_url(WCEAZY_IMG_DIR . 'modules/coupon_generator/icon.svg'); ?>" height="100" />
            </div>
            <div class="wceazy_module_details">
                <h3><?php esc_html_e('Coupon Generator', 'wceazy'); ?></h3>
                <div class="wceazy_module_action">
                    <label class="toggle_switch">
                        <input type="checkbox" onchange="wceazy_update_module_status(this)"
                            <?php echo ($this->settings->getModuleStatus("coupon_generator") == 1 ? "checked" : ""); ?>>
                        <span class="slider round"></span>
                    </label>
                    <div class="settings_btn <?php echo ($this->settings->getModuleStatus("coupon_generator") == 1 ? "active" : ""); ?>"
                        onclick="wceazy_start_module_settings(`<?php echo esc_url(WCEAZY_URL); ?>`, this)">
                        <?php esc_html_e(' Settings', 'wceazy'); ?>
                    </div>
                    <a class="wceazy_module_docs" target="_blank"
                        href="<?php echo WCEAZY_DOCS_PAGE; ?>"><?php esc_html_e('Documentation', 'wceazy'); ?></a>
                </div>
            </div>
        </div>


        <div class="wceazy_module_item" data-slug="url_coupon">
            <div class="wceazy_module_logo">
                <img src="<?php echo esc_url(WCEAZY_IMG_DIR . 'modules/url_coupon/icon.svg'); ?>" height="100" />
            </div>
            <div class="wceazy_module_details">
                <h3><?php esc_html_e('URL Coupon', 'wceazy'); ?></h3>
                <div class="wceazy_module_action">
                    <label class="toggle_switch">
                        <input type="checkbox" onchange="wceazy_update_module_status(this)"
                            <?php echo ($this->settings->getModuleStatus("url_coupon") == 1 ? "checked" : ""); ?>>
                        <span class="slider round"></span>
                    </label>
                    <div class="settings_btn <?php echo ($this->settings->getModuleStatus("url_coupon") == 1 ? "active" : ""); ?>"
                        onclick="wceazy_start_module_settings(`<?php echo esc_url(WCEAZY_URL); ?>`, this)">
                        <?php esc_html_e('Settings', 'wceazy'); ?>
                    </div>
                    <a class="wceazy_module_docs" target="_blank"
                        href="<?php echo WCEAZY_DOCS_PAGE; ?>"><?php esc_html_e('Documentation', 'wceazy'); ?></a>
                </div>
            </div>
        </div>


        <div class="wceazy_module_item" data-slug="product_sticky_bar">
            <div class="wceazy_module_logo">
                <img src="<?php echo esc_url(WCEAZY_IMG_DIR . 'modules/product_sticky_bar/icon.svg'); ?>"
                    height="100" />
            </div>
            <div class="wceazy_module_details">
                <h3><?php esc_html_e('Product Sticky Bar', 'wceazy'); ?></h3>
                <div class="wceazy_module_action">
                    <label class="toggle_switch">
                        <input type="checkbox" onchange="wceazy_update_module_status(this)"
                            <?php echo ($this->settings->getModuleStatus("product_sticky_bar") == 1 ? "checked" : ""); ?>>
                        <span class="slider round"></span>
                    </label>
                    <div class="settings_btn <?php echo ($this->settings->getModuleStatus("product_sticky_bar") == 1 ? "active" : ""); ?>"
                        onclick="wceazy_start_module_settings(`<?php echo esc_url(WCEAZY_URL); ?>`, this)">
                        <?php esc_html_e(' Settings', 'wceazy'); ?>
                    </div>
                    <a class="wceazy_module_docs" target="_blank"
                        href="<?php echo WCEAZY_DOCS_PAGE; ?>"><?php esc_html_e('Documentation', 'wceazy'); ?>'</a>
                </div>
            </div>
        </div>


        <div class="wceazy_module_item" data-slug="one_click_checkout">
            <div class="wceazy_module_logo">
                <img src="<?php echo esc_url(WCEAZY_IMG_DIR . 'modules/one_click_checkout/icon.svg'); ?>"
                    height="100" />
            </div>
            <div class="wceazy_module_details">
                <h3><?php esc_html_e('One Click Checkout', 'wceazy'); ?></h3>
                <div class="wceazy_module_action">
                    <label class="toggle_switch">
                        <input type="checkbox" onchange="wceazy_update_module_status(this)"
                            <?php echo ($this->settings->getModuleStatus("one_click_checkout") == 1 ? "checked" : ""); ?>>
                        <span class="slider round"></span>
                    </label>
                    <div class="settings_btn <?php echo ($this->settings->getModuleStatus("one_click_checkout") == 1 ? "active" : ""); ?>"
                        onclick="wceazy_start_module_settings(`<?php echo esc_url(WCEAZY_URL); ?>`, this)">
                        <?php esc_html_e('Settings', 'wceazy'); ?>
                    </div>
                    <a class="wceazy_module_docs" target="_blank"
                        href="<?php echo WCEAZY_DOCS_PAGE; ?>"><?php esc_html_e('Documentation', 'wceazy'); ?></a>
                </div>
            </div>
        </div>


        <div class="wceazy_module_item" data-slug="floating_cart">
            <div class="wceazy_module_logo">
                <img src="<?php echo esc_url(WCEAZY_IMG_DIR . 'modules/floating_cart/icon.svg'); ?>" height="100" />
            </div>
            <div class="wceazy_module_details">
                <h3><?php esc_html_e('Floating Cart', 'wceazy'); ?></h3>
                <div class="wceazy_module_action">
                    <label class="toggle_switch">
                        <input type="checkbox" onchange="wceazy_update_module_status(this)"
                            <?php echo ($this->settings->getModuleStatus("floating_cart") == 1 ? "checked" : ""); ?>>
                        <span class="slider round"></span>
                    </label>
                    <div class="settings_btn <?php echo ($this->settings->getModuleStatus("floating_cart") == 1 ? "active" : ""); ?>"
                        onclick="wceazy_start_module_settings(`<?php echo esc_url(WCEAZY_URL); ?>`, this)">
                        <?php esc_html_e(' Settings', 'wceazy'); ?>
                    </div>
                    <a class="wceazy_module_docs" target="_blank"
                        href="<?php echo WCEAZY_DOCS_PAGE; ?>"><?php esc_html_e('Documentation', 'wceazy'); ?></a>
                </div>
            </div>
        </div>


        <div class="wceazy_module_item" data-slug="pdf_invoice">
            <div class="wceazy_module_logo">
                <img src="<?php echo esc_url(WCEAZY_IMG_DIR . 'modules/pdf_invoice/icon.svg'); ?>" height="100" />
            </div>
            <div class="wceazy_module_details">
                <h3><?php esc_html_e('PDF Invoice & Packing Slips', 'wceazy'); ?></h3>
                <div class="wceazy_module_action">
                    <label class="toggle_switch">
                        <input type="checkbox" onchange="wceazy_update_module_status(this)"
                            <?php echo ($this->settings->getModuleStatus("pdf_invoice") == 1 ? "checked" : ""); ?>>
                        <span class="slider round"></span>
                    </label>
                    <div class="settings_btn <?php echo ($this->settings->getModuleStatus("pdf_invoice") == 1 ? "active" : ""); ?>"
                        onclick="wceazy_start_module_settings(`<?php echo esc_url(WCEAZY_URL); ?>`, this)">
                        <?php esc_html_e(' Settings', 'wceazy'); ?>
                    </div>
                    <a class="wceazy_module_docs" target="_blank"
                        href="<?php echo WCEAZY_DOCS_PAGE; ?>"><?php esc_html_e('Documentation', 'wceazy'); ?></a>
                </div>
            </div>
        </div>

        <div class="wceazy_module_item" data-slug="shipping_bar">
            <div class="wceazy_module_logo">
                <img src="<?php echo esc_url(WCEAZY_IMG_DIR . 'modules/shipping_bar/icon.svg'); ?>" height="100" />
            </div>
            <div class="wceazy_module_details">
                <h3><?php esc_html_e('Free Shipping Bar', 'wceazy'); ?></h3>
                <div class="wceazy_module_action">
                    <label class="toggle_switch">
                        <input type="checkbox" onchange="wceazy_update_module_status(this)"
                            <?php echo ($this->settings->getModuleStatus("shipping_bar") == 1 ? "checked" : ""); ?>>
                        <span class="slider round"></span>
                    </label>
                    <div class="settings_btn <?php echo ($this->settings->getModuleStatus("shipping_bar") == 1 ? "active" : ""); ?>"
                        onclick="wceazy_start_module_settings(`<?php echo esc_url(WCEAZY_URL); ?>`, this)">
                        <?php esc_html_e('Settings', 'wceazy'); ?>
                    </div>
                    <a class="wceazy_module_dpocs" target="_blank"
                        href="<?php echo WCEAZY_DOCS_PAGE; ?>"><?php esc_html_e('Documentation', 'wceazy'); ?></a>
                </div>
            </div>
        </div>

        <div class="wceazy_module_item" data-slug="pre_order">
            <div class="wceazy_module_logo">
                <img src="<?php echo esc_url(WCEAZY_IMG_DIR . 'modules/pre_order/icon.svg'); ?>" height="100" />
            </div>
            <div class="wceazy_module_details">
                <h3><?php esc_html_e('Pre Order', 'wceazy'); ?></h3>
                <div class="wceazy_module_action">
                    <label class="toggle_switch">
                        <input type="checkbox" onchange="wceazy_update_module_status(this)"
                            <?php echo ($this->settings->getModuleStatus("pre_order") == 1 ? "checked" : ""); ?>>
                        <span class="slider round"></span>
                    </label>

                    <div class="settings_btn <?php echo ($this->settings->getModuleStatus("pre_order") == 1 ? "active" : ""); ?>"
                        onclick="wceazy_start_module_settings(`<?php echo esc_url(WCEAZY_URL); ?>`, this)">
                        <?php esc_html_e('Settings', 'wceazy'); ?>
                    </div>
                    <a class="wceazy_module_docs" target="_blank"
                        href="<?php echo WCEAZY_DOCS_PAGE; ?>"><?php esc_html_e('Documentation', 'wceazy'); ?></a>
                </div>
            </div>
        </div>


        <div class="wceazy_module_item" data-slug="address_book">
            <div class="wceazy_module_logo">
                <img src="<?php echo esc_url(WCEAZY_IMG_DIR . 'modules/address_book/icon.svg'); ?>" height="100" />
            </div>
            <div class="wceazy_module_details">
                <h3><?php esc_html_e('Address Book', 'wceazy'); ?></h3>
                <div class="wceazy_module_action">
                    <label class="toggle_switch">
                        <input type="checkbox" onchange="wceazy_update_module_status(this)"
                            <?php echo ($this->settings->getModuleStatus("address_book") == 1 ? "checked" : ""); ?>>
                        <span class="slider round"></span>
                    </label>
                    <div class="settings_btn <?php echo ($this->settings->getModuleStatus("address_book") == 1 ? "active" : ""); ?>"
                        onclick="wceazy_start_module_settings(`<?php echo esc_url(WCEAZY_URL); ?>`, this)">
                        <?php esc_html_e('Settings', 'wceazy'); ?>
                    </div>
                    <a class="wceazy_module_docs" target="_blank"
                        href="<?php echo WCEAZY_DOCS_PAGE; ?>"><?php esc_html_e('Documentation', 'wceazy'); ?></a>
                </div>
            </div>
        </div>


        <div class="wceazy_module_item" data-slug="product_filter">
            <div class="wceazy_module_logo">
                <img src="<?php echo esc_url(WCEAZY_IMG_DIR . 'modules/product_filter/icon.svg'); ?>" height="100" />
            </div>
            <div class="wceazy_module_details">
                <h3><?php esc_html_e('Product Filter', 'wceazy'); ?></h3>
                <div class="wceazy_module_action">
                    <label class="toggle_switch">
                        <input type="checkbox" onchange="wceazy_update_module_status(this)"
                            <?php echo ($this->settings->getModuleStatus("product_filter") == 1 ? "checked" : ""); ?>>
                        <span class="slider round"></span>
                    </label>
                    <div class="settings_btn <?php echo ($this->settings->getModuleStatus("product_filter") == 1 ? "active" : ""); ?>"
                        onclick="wceazy_start_module_settings(`<?php echo esc_url(WCEAZY_URL); ?>`, this)">
                        <?php esc_html_e('Settings', 'wceazy'); ?>
                    </div>
                    <a class="wceazy_module_docs" target="_blank"
                        href="<?php echo WCEAZY_DOCS_PAGE; ?>"><?php esc_html_e('Documentation', 'wceazy'); ?></a>
                </div>
            </div>
        </div>

        <div class="wceazy_module_item" data-slug="order_cancel">
            <div class="wceazy-pro-module">
                <span class="pro-tag"><?php esc_html_e('Pro', 'wceazy'); ?></span>
            </div>
            <div class="wceazy_module_logo">
                <img src="<?php echo esc_url(WCEAZY_IMG_DIR . 'modules/floating_cart/icon.svg'); ?>" height="100" />
            </div>
            <div class="wceazy_module_details">
                <h3><?php esc_html_e('Order Cancel', 'wceazy'); ?></h3>
                <div class="wceazy_module_action">
                    <label class="toggle_switch">
                        <input type="checkbox" onchange="wceazy_update_module_status(this)"
                            <?php echo ($this->settings->getModuleStatus("order_cancel") == 1 ? "" : ""); ?> disabled>
                        <span class="slider round"></span>
                    </label>
                    <div class="settings_btn <?php echo ($this->settings->getModuleStatus("order_cancel") == 1 ? "active" : ""); ?>"
                        onclick="wceazy_start_module_settings(`<?php echo esc_url(WCEAZY_URL); ?>`, this)">
                        <?php esc_html_e('Settings', 'wceazy'); ?>
                    </div>
                    <a class="wceazy_module_docs" target="_blank"
                        href="<?php echo WCEAZY_DOCS_PAGE; ?>"><?php esc_html_e('Documentation', 'wceazy'); ?></a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="wceazy_modules_popup">
    <div class="wceazy_modules_popup_inner">
        <img src="<?php echo WCEAZY_IMG_DIR . 'popup_spinner.svg' ?>" alt="">
    </div>
</div>