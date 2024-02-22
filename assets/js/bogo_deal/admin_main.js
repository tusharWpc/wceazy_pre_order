function wceazy_bogo_deal_init(host) {
    wceazy_hide_all()
    jQuery("#wceazy_bogo_deal").show();

    wceazy_bogo_deal_fetch_rules();
}



function wceazy_bogo_deal_generate_unique_rule_id() {
    'use strict';

    var unique_rule_id = []
    jQuery(".wceazy_bogo_deal_rules .wceazy_bogo_deal_single_rule").each(function (i, object) {
        unique_rule_id.push(jQuery(object).attr("data-rule_id"))
    });
    var id = Math.random().toString(36).substr(2, 9);
    while (jQuery.inArray(id, unique_rule_id) !== -1) {
        id = Math.random().toString(36).substr(2, 9);
    }
    unique_rule_id.push(id);
    return id;
}
function wceazy_bogo_deal_generate_unique_product_id() {
    'use strict';

    var unique_product_id = []
    jQuery(".wceazy_bogo_deal_rules .wceazy_bogo_deal_product_selection_row").each(function (i, object) {
        unique_product_id.push(jQuery(object).attr("data-product_id"))
    });
    var id = Math.random().toString(36).substr(2, 9);
    while (jQuery.inArray(id, unique_product_id) !== -1) {
        id = Math.random().toString(36).substr(2, 9);
    }
    unique_product_id.push(id);
    return id;
}

function wceazy_bogo_deal_fetch_rules() {

    jQuery(".wceazy_bogo_deal_rules").empty()
    jQuery(".wceazy_bogo_deal_no_rule").hide();
    jQuery(".wceazy_bogo_deal_loading").show();

    var post_data = {
        'action': 'wceazy_bogo_deal_get_rules'
    };


    jQuery.ajax({
        url: ajaxurl,
        type: "POST",
        data: post_data,
        success: function (data) {
            var obj = JSON.parse(data);
            if (obj.status === "true") {

                try {
                    var rules = JSON.parse(obj.rules)
                    jQuery.each(rules, function (i, item) {
                        var rule_id = wceazy_bogo_deal_generate_unique_rule_id();
                        var single_rule = jQuery("#wceazy_bogo_deal_block_single_rule").children(0).clone()
                        jQuery(single_rule).attr("data-rule_id", rule_id)
                        jQuery(single_rule).find(".wceazy_bogo_deal_intro h2").text(item.rule_name)
                        jQuery(single_rule).find(".wceazy_bogo_deal_top_form select").val(item.discount_type)
                        jQuery(single_rule).find(".wceazy_bogo_deal_top_form input").val(item.discount_amount)


                        jQuery(".wceazy_bogo_deal_rules").append(single_rule)

                        /* ReInit Select2 on Discount Type */
                        jQuery(".wceazy_bogo_deal_rules").find(".wceazy_bogo_deal_top_form select").each(function (i, object) {
                            if (jQuery(object).hasClass("wceazy_bogo_deal_top_form_select2")) {
                            } else {
                                jQuery(object).addClass("wceazy_bogo_deal_top_form_select2")
                            }
                        })
                        wceazy_bogo_deal_init_top_form_select2()
                        /* ReInit Select2 on Discount Type */


                        jQuery.each(item.buy_data, function (j, product) {
                            var product_id = wceazy_bogo_deal_generate_unique_product_id();
                            var single_product = jQuery("#wceazy_bogo_deal_block_product_buy_row").children(0).clone()
                            jQuery(single_product).attr("data-product_id", product_id)
                            jQuery(single_product).find("select").each(function (i, object) {
                                if (jQuery(object).hasClass("wceazy_bogo_deal_product_select2")) {
                                } else {
                                    jQuery(object).addClass("wceazy_bogo_deal_product_select2")
                                }
                            })
                            jQuery(".wceazy_bogo_deal_single_rule[data-rule_id='" + rule_id + "']").find(".wceazy_bogo_deal_data_buy_row_container").append(single_product)
                            var default_option = jQuery("<option selected></option>").val(product.id).text(product.text);
                            jQuery(".wceazy_bogo_deal_product_selection_row[data-product_id='" + product_id + "'] select").append(default_option).trigger('change');
                            jQuery(".wceazy_bogo_deal_product_selection_row[data-product_id='" + product_id + "'] input").val(product.quantity)
                            wceazy_bogo_deal_init_product_select2()

                        })


                        jQuery.each(item.get_data, function (j, product) {
                            var product_id = wceazy_bogo_deal_generate_unique_product_id();
                            var single_product = jQuery("#wceazy_bogo_deal_block_product_get_row").children(0).clone()
                            jQuery(single_product).attr("data-product_id", product_id)
                            jQuery(single_product).find("select").each(function (i, object) {
                                if (jQuery(object).hasClass("wceazy_bogo_deal_product_select2")) {
                                } else {
                                    jQuery(object).addClass("wceazy_bogo_deal_product_select2")
                                }
                            })
                            jQuery(".wceazy_bogo_deal_single_rule[data-rule_id='" + rule_id + "']").find(".wceazy_bogo_deal_data_get_row_container").append(single_product)
                            var default_option = jQuery("<option selected></option>").val(product.id).text(product.text);
                            jQuery(".wceazy_bogo_deal_product_selection_row[data-product_id='" + product_id + "'] select").append(default_option).trigger('change');
                            jQuery(".wceazy_bogo_deal_product_selection_row[data-product_id='" + product_id + "'] input").val(product.quantity)
                            wceazy_bogo_deal_init_product_select2()

                        })

                    })

                    if (rules.length == 0) {
                        jQuery(".wceazy_bogo_deal_no_rule").show();
                        jQuery(".wceazy_bogo_deal_loading").hide();
                    } else {
                        jQuery(".wceazy_bogo_deal_no_rule").hide();
                        jQuery(".wceazy_bogo_deal_loading").hide();
                    }
                }
                catch (err) {
                    jQuery(".wceazy_bogo_deal_no_rule").show();
                    jQuery(".wceazy_bogo_deal_loading").hide();
                }


            }
        }
    })
}


function wceazy_bogo_deal_save_rules(view) {
    jQuery(view).text("Saving...")
    jQuery(view).prop("disabled", true);

    var wceazy_bogo_deal_rules = []
    jQuery(".wceazy_bogo_deal_rules .wceazy_bogo_deal_single_rule").each(function (i, object) {
        var wceazy_bogo_deal_single_rule = {}
        wceazy_bogo_deal_single_rule["rule_name"] = jQuery(object).find(".wceazy_bogo_deal_intro h2").text()
        wceazy_bogo_deal_single_rule["discount_type"] = jQuery(object).find(".wceazy_bogo_deal_top_form select").val()
        wceazy_bogo_deal_single_rule["discount_amount"] = jQuery(object).find(".wceazy_bogo_deal_top_form input").val()

        var wceazy_bogo_deal_buy_data = []
        jQuery(object).find(".wceazy_bogo_deal_data_buy_row_container .wceazy_bogo_deal_product_selection_row").each(function (i, product) {
            var wceazy_bogo_deal_product_single = {}
            wceazy_bogo_deal_product_single["id"] = jQuery(product).find("select").val()
            wceazy_bogo_deal_product_single["text"] = jQuery(product).find("select").select2('data')[0].text
            wceazy_bogo_deal_product_single["quantity"] = jQuery(product).find("input").val()
            wceazy_bogo_deal_buy_data.push(wceazy_bogo_deal_product_single)
        })

        var wceazy_bogo_deal_get_data = []
        jQuery(object).find(".wceazy_bogo_deal_data_get_row_container .wceazy_bogo_deal_product_selection_row").each(function (i, product) {
            var wceazy_bogo_deal_product_single = {}
            wceazy_bogo_deal_product_single["id"] = jQuery(product).find("select").val()
            wceazy_bogo_deal_product_single["text"] = jQuery(product).find("select").select2('data')[0].text
            wceazy_bogo_deal_product_single["quantity"] = jQuery(product).find("input").val()
            wceazy_bogo_deal_get_data.push(wceazy_bogo_deal_product_single)
        })

        wceazy_bogo_deal_single_rule["buy_data"] = wceazy_bogo_deal_buy_data
        wceazy_bogo_deal_single_rule["get_data"] = wceazy_bogo_deal_get_data
        wceazy_bogo_deal_rules.push(wceazy_bogo_deal_single_rule)
    });

    var post_data = {
        'action': 'wceazy_bogo_deal_save_rules',
        'data': JSON.stringify(wceazy_bogo_deal_rules)
    };


    jQuery.ajax({
        url: ajaxurl,
        type: "POST",
        data: post_data,
        success: function (data) {
            var obj = JSON.parse(data);
            if (obj.status === "true") {
                jQuery(view).text("Save Changes")
                jQuery(view).prop("disabled", false);
            }
        }
    })



}


function wceazy_bogo_deal_rule_remover(view) {
    jQuery(view).parent().parent().parent().remove()

    var num_of_rules = 0
    jQuery(".wceazy_bogo_deal_rules").find(".wceazy_bogo_deal_single_rule").each(function (i, object) {
        num_of_rules = num_of_rules + 1;
    })
    if (num_of_rules == 0) {
        jQuery(".wceazy_bogo_deal_loading").hide();
        jQuery(".wceazy_bogo_deal_no_rule").show();
    }
}



function wceazy_bogo_deal_init_top_form_select2() {
    if (jQuery('.wceazy_bogo_deal_top_form_select2').data('select2-id')) {
        jQuery('.wceazy_bogo_deal_top_form_select2').off('select2:select')
    }

    jQuery('.wceazy_bogo_deal_top_form_select2').select2();
}
function wceazy_bogo_deal_init_product_select2() {
    if (jQuery('.wceazy_bogo_deal_product_select2').data('select2-id')) {
        jQuery('.wceazy_bogo_deal_product_select2').off('select2:select')
    }

    jQuery('.wceazy_bogo_deal_product_select2').select2({
        placeholder: "Select", closeOnSelect: true,
        ajax: {
            url: ajaxurl,
            type: "GET",
            data: function (params) {
                return {
                    action: 'wceazy_bogo_deal_get_products',
                    q: params.term
                };
            },
            delay: 250, dataType: 'json',
            processResults: function (response) {
                return { results: response.values };
            }
        }
    });
}

function wceazy_bogo_deal_product_removal(view) {
    jQuery(view).parent().parent().remove()
}




function wceazy_bogo_deal_rule_adder() {
    /* Limitation on Free Version */
    var count_rules = 0
    jQuery(".wceazy_bogo_deal_rules").find(".wceazy_bogo_deal_single_rule").each(function (i, object) {
        count_rules = count_rules + 1;
    })
    if (count_rules >= 2) {
        wceazy_get_pro_open_popup("Get the premium version of wcEazy to add more then 2 rules");
        return;
    }


    jQuery(".wceazy_bogo_deal_single_rule").removeClass("maximized")

    jQuery(".wceazy_bogo_deal_rules").append(
        jQuery("#wceazy_bogo_deal_block_single_rule").children(0).clone().addClass("maximized")
    )

    jQuery(".wceazy_bogo_deal_rules").find(".wceazy_bogo_deal_top_form select").each(function (i, object) {
        if (jQuery(object).hasClass("wceazy_bogo_deal_top_form_select2")) {
        } else {
            jQuery(object).addClass("wceazy_bogo_deal_top_form_select2")
        }
    })

    wceazy_bogo_deal_init_top_form_select2()
    jQuery(".wceazy_bogo_deal_no_rule").hide();
    jQuery(".wceazy_bogo_deal_loading").hide();
}

function wceazy_bogo_deal_product_buy_adder(view) {
    /* Limitation on Free Version */
    var count_products_buy = 0
    jQuery(view).parent().parent().find(".wceazy_bogo_deal_data_buy_row_container .wceazy_bogo_deal_product_selection_row").each(function (i, object) {
        count_products_buy = count_products_buy + 1;
    })
    if (count_products_buy >= 2) {
        wceazy_get_pro_open_popup("Get the premium version of wcEazy to add more then 2 products");
        return;
    }

    jQuery(view).parent().parent().find(".wceazy_bogo_deal_data_buy_row_container").append(
        jQuery("#wceazy_bogo_deal_block_product_buy_row").children(0).clone()
    )
    jQuery(view).parent().parent().find(".wceazy_bogo_deal_data_buy_row_container select").each(function (i, object) {
        if (jQuery(object).hasClass("wceazy_bogo_deal_product_select2")) {
        } else {
            jQuery(object).addClass("wceazy_bogo_deal_product_select2")
        }
    })
    wceazy_bogo_deal_init_product_select2();
}


function wceazy_bogo_deal_product_get_adder(view) {
    /* Limitation on Free Version */
    var count_products_get = 0
    jQuery(view).parent().parent().find(".wceazy_bogo_deal_data_get_row_container .wceazy_bogo_deal_product_selection_row").each(function (i, object) {
        count_products_get = count_products_get + 1;
    })
    if (count_products_get >= 2) {
        wceazy_get_pro_open_popup("Get the premium version of wcEazy to add more then 2 products");
        return;
    }


    jQuery(view).parent().parent().find(".wceazy_bogo_deal_data_get_row_container").append(
        jQuery("#wceazy_bogo_deal_block_product_get_row").children(0).clone()
    )
    jQuery(view).parent().parent().find(".wceazy_bogo_deal_data_get_row_container select").each(function (i, object) {
        if (jQuery(object).hasClass("wceazy_bogo_deal_product_select2")) {
        } else {
            jQuery(object).addClass("wceazy_bogo_deal_product_select2")
        }
    })
    wceazy_bogo_deal_init_product_select2();
}



function wceazy_bogo_deal_rule_maximize(view) {
    jQuery(".wceazy_bogo_deal_single_rule").removeClass("maximized")
    jQuery(view).parent().parent().parent().addClass("maximized")
}
function wceazy_bogo_deal_rule_minimize(view) {
    jQuery(view).parent().parent().parent().removeClass("maximized")
}