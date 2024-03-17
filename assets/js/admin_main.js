

function wceazy_hide_all() {
    'use strict';
    jQuery("#wceazy_modules").hide();
    jQuery("#wceazy_auto_apply_coupon").hide();
    jQuery("#wceazy_bogo_deal").hide();
    jQuery("#wceazy_coupon_generator").hide();
    jQuery("#wceazy_url_coupon").hide();
    jQuery("#wceazy_product_sticky_bar").hide();
    jQuery("#wceazy_one_click_checkout").hide();
    jQuery("#wceazy_floating_cart").hide();
    jQuery("#wceazy_pdf_invoice").hide();
    jQuery("#wceazy_shipping_bar").hide();
    jQuery("#wceazy_pre_order").hide();
    jQuery("#wceazy_frequently_bought").hide();
    jQuery("#wceazy_address_book").hide();
    jQuery("#wceazy_product_filter").hide();
}


function wceazy_modules_page_init(host) {
    wceazy_hide_all()
    jQuery("#wceazy_modules").show();
}


function wceazy_start_module_settings(host, view) {
    var module_slug = jQuery(view).parent().parent().parent().attr("data-slug");
    switch (module_slug) {
        case "auto_apply_coupon":
            if (typeof wceazy_auto_apply_coupon_init !== "undefined") {
                wceazy_auto_apply_coupon_init(host)
            }
            break;
        case "bogo_deal":
            if (typeof wceazy_bogo_deal_init !== "undefined") {
                wceazy_bogo_deal_init(host)
            }
            break;
        case "coupon_generator":
            if (typeof wceazy_coupon_generator_init !== "undefined") {
                wceazy_coupon_generator_init(host)
            }
            break;
        case "url_coupon":
            if (typeof wceazy_url_coupon_init !== "undefined") {
                wceazy_url_coupon_init(host)
            }
            break;
        case "product_sticky_bar":
            if (typeof wceazy_product_sticky_bar_init !== "undefined") {
                wceazy_product_sticky_bar_init(host)
            }
            break;
        case "one_click_checkout":
            if (typeof wceazy_one_click_checkout_init !== "undefined") {
                wceazy_one_click_checkout_init(host)
            }
            break;
        case "floating_cart":
            if (typeof wceazy_floating_cart_init !== "undefined") {
                wceazy_floating_cart_init(host)
            }
            break;
        case "pdf_invoice":
            if (typeof wceazy_pdf_invoice_init !== "undefined") {
                wceazy_pdf_invoice_init(host)
            }
            break;
        case "shipping_bar":
            if (typeof wceazy_shipping_bar_init !== "undefined") {
                wceazy_shipping_bar_init(host)
            }
            break;
        case "pre_order":
            if (typeof wceazy_pre_order_init !== "undefined") {
                wceazy_pre_order_init(host)
            }
            break;
        case "address_book":
            if (typeof wceazy_address_book_init !== "undefined") {
                wceazy_address_book_init(host)
            }
            break;
        case "product_filter":
            if (typeof wceazy_product_filter_init !== "undefined") {
                wceazy_product_filter_init(host)
            }
            break;
            case "frequently_bought":
            if (typeof wceazy_frequently_bought_init !== "undefined") {
                wceazy_frequently_bought_init(host)
            }
            break;
    }
}


function wceazy_update_module_status(view) {
    jQuery(view).parent().parent().find(".settings_btn").text('Loading..')
    jQuery(view).parent().parent().find(".settings_btn").addClass("loading")

    var module_slug = jQuery(view).parent().parent().parent().parent().attr("data-slug");
    var module_status = jQuery(view).is(':checked') ? 1 : 0
    var post_data = {
        'action': 'wceazy_update_module_status',
        'module_slug': module_slug,
        'module_status': module_status,
    };
    jQuery('.wceazy_modules_popup').addClass('wceazy_modules_popup_opened');
    jQuery.ajax({
        url: ajaxurl, type: "POST", data: post_data,
        success: function (data) {
            var obj = JSON.parse(data);
            if (obj.status == "true") {

                jQuery(function () {
                    setTimeout(wceazy_start_refresh_body, 0);
                });
            } else {
                alert(obj.msg)
                jQuery(function () {
                    setTimeout(wceazy_start_refresh_body, 0);
                });
            }
        }
    })
}

function wceazy_start_refresh_body() {
    jQuery.get('', function (data) {
        jQuery(document.body).html(data);
    });
}




function wceazy_module_search(view) {
    wceazy_module_show_all(jQuery(".wceazy_modules_breadcrumb_filter ul").find("li").eq(0))
    var search = jQuery(view).parent().find("input").val().toLowerCase();
    jQuery(".wceazy_module_item").each(function (index, module) {
        var module_title = jQuery(module).find("h3").text().toLowerCase()
        if (module_title.includes(search)) {
            jQuery(module).show();
        } else {
            jQuery(module).hide();
        }
    });
}
function wceazy_module_show_active(view) {
    jQuery(".wceazy_modules_breadcrumb_filter li").each(function (index, menu_item) {
        jQuery(menu_item).removeClass("active");
    });
    jQuery(view).addClass("active");
    jQuery(".wceazy_module_item").each(function (index, module) {
        if (jQuery(module).find("input[type='checkbox']:checked").length > 0) {
            jQuery(module).show();
        } else {
            jQuery(module).hide();
        }
    });
}
function wceazy_module_show_inactive(view) {
    jQuery(".wceazy_modules_breadcrumb_filter li").each(function (index, menu_item) {
        jQuery(menu_item).removeClass("active");
    });
    jQuery(view).addClass("active");
    jQuery(".wceazy_module_item").each(function (index, module) {
        if (jQuery(module).find("input[type='checkbox']:checked").length > 0) {
            jQuery(module).hide();
        } else {
            jQuery(module).show();
        }
    });
}
function wceazy_module_show_all(view) {
    jQuery(".wceazy_modules_breadcrumb_filter li").each(function (index, menu_item) {
        jQuery(menu_item).removeClass("active");
    });
    jQuery(view).addClass("active");
    jQuery(".wceazy_module_item").each(function (index, module) {
        jQuery(module).show();
    });
}





function wceazy_get_pro_open_popup(msg) {
    if (msg === "") {
        jQuery('.wceazy_get_pro_popup .wceazy-popup-content').text("This feature is only available in the premium version of wcEazy")
    } else {
        jQuery('.wceazy_get_pro_popup .wceazy-popup-content').text(msg)
    }
    jQuery('.wceazy_get_pro_popup').addClass('opened');
}

function wceazy_get_pro_close_popup() {
    jQuery('.wceazy_get_pro_popup').removeClass('opened');
}