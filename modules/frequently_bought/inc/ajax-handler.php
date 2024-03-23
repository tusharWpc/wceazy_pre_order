<?php
if (!defined('WPINC')) {
    die;
}


add_action('wp_ajax_search_products', 'search_products');
add_action('wp_ajax_nopriv_search_products', 'search_products');

function search_products()
{
    check_ajax_referer('search_nonce', 'security');

    $search_term = isset ($_POST['search_term']) ? sanitize_text_field($_POST['search_term']) : '';

    if (empty ($search_term)) {
        wp_send_json_error(__('Search term is empty.', 'fbt'));
    }

    $args = array(
        'post_type' => 'product',
        'post_status' => 'publish',
        's' => $search_term,
    );

    $products_query = new WP_Query($args);

    if ($products_query->have_posts()) {
        while ($products_query->have_posts()) {
            $products_query->the_post();
            // Output your product results here
            echo '<div>';
            echo '<input type="checkbox" class="product-checkbox" value="' . get_the_ID() . '">'; // Add checkbox with product ID as value
            echo '<p>' . get_the_title() . '</p>';
            echo '</div>';
        }
    } else {
        echo '<p>No products found.</p>';
    }

    wp_reset_postdata();

    wp_die();
}




add_action('wp_ajax_add_to_cart_selected_products', 'add_to_cart_selected_products');
add_action('wp_ajax_nopriv_add_to_cart_selected_products', 'add_to_cart_selected_products');

function add_to_cart_selected_products()
{

    check_ajax_referer('add_to_cart_nonce', 'security');

    // Get the selected product IDs
    $selected_products = isset ($_POST['selected_products']) ? $_POST['selected_products'] : array();

    var_dump($selected_products);
    echo "hello";
    // Initialize total price variable
    $total_price = 0;

    // Loop through selected products and add them to the cart
    foreach ($selected_products as $product_id) {
        $product = wc_get_product($product_id);

        if ($product) {
            // Get the product price
            $product_price = (float) $product->get_price();

            // Add product to the cart
            WC()->cart->add_to_cart($product_id);

            // Add product price to the total
            $total_price += $product_price;
        }
    }

    // Redirect to the cart page
    $cart_url = wc_get_cart_url();
    $redirect_url = add_query_arg(array('selected_products_total_price' => $total_price), $cart_url);
    wp_send_json_success(array('redirect_url' => $redirect_url));
}


?>