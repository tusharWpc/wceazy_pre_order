<?php

$wceazy_pre_order_settings = get_option('wceazy_pre_order_settings', False);
$wceazy_po_settings = $wceazy_pre_order_settings ? json_decode($wceazy_pre_order_settings, true) : array();

// echo "<pre>";
// var_dump($wceazy_po_settings);
// echo "</pre>";


$wceazy_po_pre_order_btn_text = isset($wceazy_po_settings["pre_order_btn_text"]) ? $wceazy_po_settings["pre_order_btn_text"] : "PreOrder Now!";

// echo "<pre>";
// var_dump($wceazy_po_pre_order_btn_text);
// echo "</pre>";



// $wceazy_po_product_per_page = isset($wceazy_po_settings["product_per_page"]) ? $wceazy_po_settings["product_per_page"] : "15";
// $wceazy_po_add_to_cart_btn_text = isset($wceazy_po_settings["add_to_cart_btn_text"]) ? $wceazy_po_settings["add_to_cart_btn_text"] : "Add to Cart";


// $wceazy_po_select_options_btn_text = isset($wceazy_po_settings["select_options_btn_text"]) ? $wceazy_po_settings["select_options_btn_text"] : "Select Options";
// $wceazy_po_stock_out_btn_text = isset($wceazy_po_settings["stock_out_btn_text"]) ? $wceazy_po_settings["stock_out_btn_text"] : "Stock Out";
// $wceazy_po_prev_btn_text = isset($wceazy_po_settings["prev_btn_text"]) ? $wceazy_po_settings["prev_btn_text"] : "Previous";
// $wceazy_po_next_btn_text = isset($wceazy_po_settings["next_btn_text"]) ? $wceazy_po_settings["next_btn_text"] : "Next";


$products = array();


if (
    isset($_REQUEST['page']) || isset($_REQUEST['query']) || isset($_REQUEST['price_start']) || isset($_REQUEST['price_end']) || isset($_REQUEST['rating'])
    || isset($_REQUEST['category_query']) || isset($_REQUEST['stock_query'])
) {
    $products_per_page = is_numeric($wceazy_po_product_per_page) ? $wceazy_po_product_per_page : 15;
    $page = sanitize_text_field($_REQUEST['page']);
    $query = sanitize_text_field($_REQUEST['query']);
    $price_start = sanitize_text_field($_REQUEST['price_start']);
    $price_end = sanitize_text_field($_REQUEST['price_end']);
    $rating = sanitize_text_field($_REQUEST['rating']);
    $category_query = sanitize_text_field($_REQUEST['category_query']);
    $stock_query = sanitize_text_field($_REQUEST['stock_query']);



    $arg = array(
        'post_type' => 'product',
        'numberposts' => -1,
        'post_status' => 'publish',
        'fields' => 'ids',
        "s" => $query,
        'meta_query' => array(
            array(
                'key' => '_price',
                'value' => array($price_start, $price_end),
                'compare' => 'BETWEEN',
                'type' => 'NUMERIC'
            ),
            array(
                'key' => '_wc_average_rating',
                'value' => array($rating, 5),
                'compare' => 'BETWEEN',
                'type' => 'NUMERIC'
            )
        ),
        'tax_query' => array('relation' => 'OR'),
    );


    if ($stock_query != "") {
        $stock_arr = explode(",", $stock_query);
        $arg["meta_query"][] = array(
            'key' => '_stock_status',
            'value' => $stock_arr,
            'compare' => 'IN',
        );
    }


    if ($category_query != "") {
        $cat_arr = explode(",", $category_query);
        foreach ($cat_arr as $single_cat) {
            $arg["tax_query"][] = array(
                'taxonomy' => 'product_cat',
                'field' => 'slug',
                'terms' => $single_cat,
                'operator' => 'IN',
            );
        }
    }

    $all_ids = get_posts($arg);
    foreach ($all_ids as $id) {
        $product = wc_get_product($id);
        $products[] = array(
            "product_id" => $product->get_id(),
            "product_title" => $product->get_name(),
            "product_image" => wp_get_attachment_image_url($product->get_image_id()) != false ? wp_get_attachment_image_url($product->get_image_id()) : WCEAZY_IMG_DIR . "modules/product_filter/no_image.jpg",
            "product_url" => get_permalink($product->get_id()),
            "product_price" => $product->get_price_html(),
            "product_is_variable" => $product->is_type('variable') ? "1" : "0",
            "product_is_in_stock" => $product->get_stock_quantity() === 0 || !$product->is_in_stock() ? "0" : "1",
            "add_to_cart_btn_text" => $wceazy_po_add_to_cart_btn_text,
            "out_of_stock_btn_text" => $wceazy_po_stock_out_btn_text,
            "select_options_btn_text" => $wceazy_po_select_options_btn_text,
        );
    }


    if (sizeof($products) > 0) {
        $pagedArray = array_chunk($products, $products_per_page, false);
        $products_in_page = $pagedArray[$page];
    } else {
        $products_in_page = $products;
    }


    $previous_page_number = 0;
    $next_page_number = 0;

    if (sizeof($products) > ($products_per_page * ((int) $page + 1))) {
        $next_page_number = (int) $page + 1;
    }

    $previous_page_number = (int) $page - 1;

    $result = array(
        "status" => 'true',
        "previous_page_number" => $previous_page_number,
        "next_page_number" => $next_page_number,
        "prev_btn_text" => $wceazy_po_prev_btn_text,
        "next_btn_text" => $wceazy_po_next_btn_text,
        "products" => $products_in_page
    );

} else {
    $result = array("status" => 'false');
}

echo json_encode($result, JSON_UNESCAPED_UNICODE);