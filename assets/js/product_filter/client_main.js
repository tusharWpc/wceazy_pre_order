function wceazy_frontend_pf_rating_changed(view){
    if(jQuery(view).hasClass("active")){
        jQuery(view).parent().find(".wceazy_pf_rating_filter_item").removeClass("active")
    }else{
        jQuery(view).parent().find(".wceazy_pf_rating_filter_item").removeClass("active")
        jQuery(view).addClass("active")
    }
    wceazy_frontend_pf_search()
}




function wceazy_pf_add_to_cart(view, product_id){

    jQuery(view).prop('disabled', true);

    var post_data = {
        'action': 'wceazy_product_filter_add_to_cart',
        'product_id': product_id
    };

    jQuery.ajax({
        url: wceazy_client_product_filter_object.ajaxurl,
        type: "POST",
        data: post_data,
        success: function (data) {
            jQuery(document.body).trigger('wc_fragment_refresh');
            jQuery(view).prop('disabled', false);
        }
    })

}




function wceazy_frontend_pf_search(page = "0"){


    if(jQuery('.wceazy_pf_product').length == 0){
        if(jQuery('.wceazy_pf_product_loader').length == 0){
            jQuery(".wceazy_pf_product_container").append("<div class=\"wceazy_pf_product_loader\">\n" +
                "                                               <div class=\"wceazy_pf_loader\"></div>\n" +
                "                                           </div>")
        }
    }


    jQuery(".wceazy_pf_product_container").addClass("shimmer")
    var search_query = "";
    var price_start = "0";
    var price_end = "999999999999";
    var rating = "0";
    var category_query = "";
    var stock_query = "";

    if(jQuery(".wceazy_pf_search_filter input").length > 0){
        search_query = jQuery(".wceazy_pf_search_filter input").val();
    }

    if(jQuery(".wceazy_pf_price_filter_1 input").length > 0){
        price_start = jQuery.isNumeric(jQuery(".wceazy_pf_price_filter_1 input").eq(0).val()) ? jQuery(".wceazy_pf_price_filter_1 input").eq(0).val() : price_start;
        price_end = jQuery.isNumeric(jQuery(".wceazy_pf_price_filter_1 input").eq(1).val()) ? jQuery(".wceazy_pf_price_filter_1 input").eq(1).val() : price_end;
    }

    if(jQuery(".wceazy_pf_rating_filter").length > 0){
        rating = jQuery.isNumeric(jQuery(".wceazy_pf_rating_filter .wceazy_pf_rating_filter_item.active").attr("data-rating")) ? jQuery(".wceazy_pf_rating_filter .wceazy_pf_rating_filter_item.active").attr("data-rating") : rating;
    }

    if(jQuery(".wceazy_pf_category_filter").length > 0){
        var categories = []
        jQuery(".wceazy_pf_category_filter_checkbox_item").each(function (i, object) {
            if(jQuery(object).find("input[type='checkbox']:checked").length > 0){
                categories.push(jQuery(object).attr("data-slug"))
            }
        })
        category_query = categories.join(",")
    }


    if(jQuery(".wceazy_pf_stock_filter").length > 0){
        var stocks = []
        jQuery(".wceazy_pf_stock_filter_checkbox_item").each(function (i, object) {
            if(jQuery(object).find("input[type='checkbox']:checked").length > 0){
                stocks.push(jQuery(object).attr("data-slug"))
            }
        })
        stock_query = stocks.join(",")
    }

    let post_data = {'action': 'wceazy_product_filter_search',
        'page': page,
        'query': search_query,
        'price_start': price_start,
        'price_end': price_end,
        'rating': rating,
        'category_query': category_query,
        'stock_query': stock_query,
    };
    jQuery.ajax({
        type: 'post',
        url: wceazy_client_product_filter_object.ajaxurl,
        data: post_data,
        success: function (data) {
            jQuery(".wceazy_pf_product_container .wceazy_pf_product_loader").remove()
            jQuery(".wceazy_pf_product_container").removeClass("shimmer")
            jQuery(".wceazy_pf_product_container").empty()
            var obj = JSON.parse(data);
            if(obj.status === "true"){
                var products = obj.products;
                for (var i = 0; i < products.length; i++) {

                    var action_btn = "<button class=\"wceazy_pf_product_add_to_cart\" onclick=\"wceazy_pf_add_to_cart(this, `"+products[i].product_id+"`)\">"+products[i].add_to_cart_btn_text+"</button>"
                    if(products[i].product_is_in_stock === "0"){
                        action_btn = "<button class=\"wceazy_pf_product_out_of_stock\">"+products[i].out_of_stock_btn_text+"</button>"
                    }
                    if(products[i].product_is_variable === "1"){
                        action_btn = "<a class=\"wceazy_pf_product_manage_variation\" href=\""+products[i].product_url+"\">"+products[i].select_options_btn_text+"</a>"
                    }

                    var itemHTML = "<div class=\"wceazy_pf_product\">\n" +
                        "               <img src=\""+products[i].product_image+"\">\n" +
                        "               <a class=\"wceazy_pf_product_title\" href=\""+products[i].product_url+"\">"+products[i].product_title+"</a>\n" +
                        "               <span class=\"wceazy_pf_product_price\">"+products[i].product_price+"</span>\n" +
                        "               "+action_btn+"\n" +
                        "           </div>";


                    jQuery(".wceazy_pf_product_container").append(itemHTML)
                }

                /* Pagination */
                jQuery(".wceazy_pf_product_pagination").empty()
                var pagination = ""
                if(obj.previous_page_number > -1){
                    pagination += "<button class=\"wceazy_pf_product_pagination_prev\" onclick=\"wceazy_frontend_pf_search(`"+obj.previous_page_number+"`)\">"+obj.prev_btn_text+"</button>"
                }
                if(obj.next_page_number > 0){
                    pagination += "<button class=\"wceazy_pf_product_pagination_next\" onclick=\"wceazy_frontend_pf_search(`"+obj.next_page_number+"`)\">"+obj.next_btn_text+"</button>"
                }

                jQuery(".wceazy_pf_product_container").append("<div class=\"wceazy_pf_product_pagination\">\n" +
                    "                                               "+pagination+"\n" +
                    "                                           </div>")
                /* Pagination */
            }
        },
    });
}
