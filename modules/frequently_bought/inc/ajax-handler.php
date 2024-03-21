<?php
add_action('wp_ajax_search_products', 'search_products');
add_action('wp_ajax_nopriv_search_products', 'search_products');

function search_products()
{
    check_ajax_referer('search_nonce', 'security');

    $search_term = isset($_POST['search_term']) ? sanitize_text_field($_POST['search_term']) : '';

    if (empty($search_term)) {
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
?>