<?php
if (!defined('WPINC')) {
    die;
}

class WcEazyFrequentlyBoughtUtils
{
    public function __construct()
    {
        include_once (plugin_dir_path(__FILE__) . 'inc/ajax-handler.php'); // Include ajax-handler.php here

        add_action('wp_enqueue_scripts', array($this, 'enqueue_bought_together_scripts'));

        // add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');
        add_action('admin_enqueue_scripts', array($this, 'enque_search_admin'));


        add_action('wp_ajax_search_products', array($this, 'search_products'));
        add_action('wp_ajax_nopriv_search_products', array($this, 'search_products'));
        add_action('wp_ajax_save_selected_products', array($this, 'save_selected_products'));
        add_action('wp_ajax_add_selected_products_to_cart', array($this, 'add_selected_products_to_cart')); // Corrected action name
        add_action('wp_ajax_nopriv_add_selected_products_to_cart', array($this, 'add_selected_products_to_cart')); // Corrected action name
        add_filter('woocommerce_product_data_tabs', array($this, 'add_bought_together_tab'), 10, 1);
        add_action('woocommerce_product_data_panels', array($this, 'add_bought_together_panel'));

        // Hook the function to display selected products before add to cart button
        add_action('woocommerce_before_add_to_cart_form', array($this, 'show_items_in_single_page'));
    }





    public function enque_search_admin()
    {
        wp_enqueue_script('fbt-ajax', plugin_dir_url(__FILE__) . 'inc/ajax-search.js', array('jquery'), '1.0', true);
        wp_localize_script(
            'fbt-ajax',
            'ajax_params',
            array(
                'ajax_url' => admin_url('admin-ajax.php'),
                'search_nonce' => wp_create_nonce('search_nonce'),
                'add_to_cart_nonce' => wp_create_nonce('add_to_cart_nonce'), // Add nonce for adding to cart
                'current_product_id' => get_the_ID(), // Set the current product ID
            )
        );
    }
 
    public function enqueue_bought_together_scripts()
    {
        // Enqueue the script for the user side
        wp_enqueue_script('fbt-ajax', plugin_dir_url(__FILE__) . 'inc/ajax-search.js', array('jquery'), '1.0', true);
        wp_localize_script(
            'fbt-ajax',
            'ajax_params',
            array(
                'ajax_url' => admin_url('admin-ajax.php'),
                'search_nonce' => wp_create_nonce('search_nonce'),
                'add_to_cart_nonce' => wp_create_nonce('add_to_cart_nonce'), // Add nonce for adding to cart
                'current_product_id' => get_the_ID(), // Set the current product ID
            )
        );

        // Enqueue the script for the admin side 
        wp_enqueue_script('ajax-add-to-cart', plugin_dir_url(__FILE__) . 'inc/ajax-add-to-cart.js', array('jquery'), '1.0', true);

    }


    public function search_products()
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

        ob_start();
        if ($products_query->have_posts()) {
            while ($products_query->have_posts()) {
                $products_query->the_post();
                // Output your product results here with checkboxes
                echo '<div>';
                echo '<input type="checkbox" class="product-checkbox" value="' . get_the_ID() . '">'; // Add checkbox with product ID as value
                echo '<label>' . get_the_title() . '</label>';
                echo '</div>';
            }
        } else {
            echo '<p>' . __('No products found.', 'fbt') . '</p>';
        }

        $response = ob_get_clean();

        wp_reset_postdata();

        wp_send_json_success(array('data' => $response));
    }

    public function save_selected_products()
    {
        check_ajax_referer('search_nonce', 'security');

        // Get the current product ID
        $currentProductId = isset ($_POST['current_product_id']) ? $_POST['current_product_id'] : '';

        // Get the selected product IDs
        $selected_products = isset ($_POST['selected_products']) ? $_POST['selected_products'] : array();

        // Update post meta with selected product IDs for the current product
        update_post_meta($currentProductId, 'selected_product', $selected_products);

        wp_send_json_success();
        wp_die(); // Terminate the script execution
    }

    public function add_selected_products_to_cart()
    {
        check_ajax_referer('add_to_cart_nonce', 'security');

        // Get the selected product IDs
        $selected_products = isset ($_POST['selected_products']) ? $_POST['selected_products'] : array();

        // Loop through selected products and add them to the cart
        foreach ($selected_products as $product_id) {
            WC()->cart->add_to_cart($product_id);
        }

        wp_send_json_success();
        wp_die();
    }

    public function add_bought_together_tab($tabs)
    {
        $tabs['bought_together'] = array(
            'label' => __('wcz Bought Together', 'fbt'),
            'target' => 'bought_together_data_option',
            'class' => array('hide_if_grouped', 'hide_if_external', 'hide_if_bundle'),
        );
        return $tabs;
    }

    public function add_bought_together_panel()
    {
        global $post;
        $currentProductId = $post->ID;

        // Get the saved selected product IDs for the current product
        $selected_product_ids = get_post_meta($currentProductId, 'selected_product', true);

        ?>
        <div id="bought_together_data_option" class="panel woocommerce_options_panel">
            <div class="options_group">
                <p class="form-field">
                    <input type="text" id="bought_together_search" class="short" name="bought_together_search">
                    <button id="clear_search" class="button">
                        <?php _e('Clear', 'fbt'); ?>
                    </button>
                    <?php
                    if (!empty ($selected_product_ids)) {
                        echo '<ul id="selected_products_list">';
                        foreach ($selected_product_ids as $product_id) {
                            $product = wc_get_product($product_id);
                            $product_title = $product->get_name();
                            $product_price = $product->get_price_html(); // This will get the formatted price including currency symbol
                            echo '<li>';
                            echo '<input type="checkbox" class="selected-product-checkbox" value="' . $product_id . '" />';
                            echo $product_title . ' - ' . $product_price;
                            echo '</li>';
                        }
                        echo '</ul>';
                    }
                    ?>
                </p>
                <button id="add-selected-to-cart-btn" class="button">
                    <?php _e('Wrong Add Selected Products to Cart', 'fbt'); ?>
                </button>
                <div id="bought_together_search_results"></div>
            </div>
        </div>
        <?php

        // Hook the function to display selected products before add to cart button
        // add_action('woocommerce_before_add_to_cart_form', array($this, 'show_items_in_single_page'));
    }


    // Function to show selected products before add to cart button
    public function show_items_in_single_page()
    {
        global $post;
        $currentProductId = $post->ID;

        // Get the saved selected product IDs for the current product
        $selected_product_ids = get_post_meta($currentProductId, 'selected_product', true);

        if (!empty ($selected_product_ids)) {
            echo '<table class="selected-products-list">';
            foreach ($selected_product_ids as $product_id) {
                // Replace with actual logic to fetch product data from your database
                $product = wc_get_product($product_id);

                if ($product) { // Check if product exists
                    $product_title = $product->get_name();
                    $product_image = get_the_post_thumbnail_url($product_id, 'thumbnail'); // Change 'thumbnail' to the desired image size
                    $product_price = $product->get_price_html(); // Get the formatted price
                    // Generate a dynamic ID for the checkbox
                    $checkbox_id = 'product_checkbox_' . $product_id;
                    echo '<tr class="freq-product-item">';
                    echo '<td><input type="checkbox" id="' . $checkbox_id . '" class="product-checkbox" value="' . $product_id . '"></td>';
                    echo '<td class="product-thumbnail"><img src="' . $product_image . '" alt="' . $product_title . '"></td>';
                    echo '<td class="product-details">';
                    echo '<span class="product-title">' . $product_title . '</span><br>';
                    echo '<span class="product-price">' . $product_price . '</span>';
                    echo '</td>';
                    echo '</tr>';
                }
            }
            echo '</table>';
            echo '<br>';
            echo '<button id="add-selected-to-cart-btn" class="button">' . __('Add Selected Products to Cart', 'fbt') . '</button>'; // Correct button label
        }
    }

}

$WcEazyFrequentlyBoughtUtils = new WcEazyFrequentlyBoughtUtils();