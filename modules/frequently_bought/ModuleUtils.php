<?php
if (!defined('WPINC')) {
    die;
}

class WcEazyFrequentlyBoughtUtils
{
    public function __construct()
    {
        include_once (plugin_dir_path(__FILE__) . 'inc/ajax-handler.php'); // Include ajax-handler.php here

        add_action('admin_enqueue_scripts', array($this, 'enqueue_bought_together_scripts'));
        add_action('wp_ajax_search_products', array($this, 'search_products'));
        add_action('wp_ajax_nopriv_search_products', array($this, 'search_products'));
        add_action('wp_ajax_save_selected_products', array($this, 'save_selected_products'));
        add_filter('woocommerce_product_data_tabs', array($this, 'add_bought_together_tab'), 10, 1);
        add_action('woocommerce_product_data_panels', array($this, 'add_bought_together_panel'));

    }

    public function enqueue_bought_together_scripts()
    {
        wp_enqueue_script('fbt-ajax', plugin_dir_url(__FILE__) . 'inc/ajax-search.js', array('jquery'), '1.0', true);
        wp_localize_script(
            'fbt-ajax',
            'ajax_params',
            array(
                'ajax_url' => admin_url('admin-ajax.php'),
                'search_nonce' => wp_create_nonce('search_nonce'),
                'current_product_id' => get_the_ID(), // Set the current product ID
            )
        );
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

        // Initialize an array to store product data
        $selected_products_data = array();

        // Loop through selected products to get their data
        foreach ($selected_products as $product_id) {
            // Replace with actual logic to fetch product data from your database
            $product = wc_get_product($product_id);

            if ($product) { // Check if product exists
                $product_title = $product->get_name();
                $product_price = $product->get_price(); // Get the product price without formatting

                // Add product data to the array
                $selected_products_data[] = array(
                    'id' => $product_id,
                    'title' => $product_title,
                    'price' => $product_price
                );
            }
        }

        // Save the selected products data in session or user meta
        WC()->session->set('selected_products_data', $selected_products_data);

        // Debugging information
        error_log('Current Product ID: ' . $currentProductId);
        error_log('Selected Product IDs: ' . implode(',', $selected_products));

        wp_send_json_success();
        wp_die(); // Terminate the script execution
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
        // var_dump($selected_product_ids);
        // Display saved products if any
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
                            echo '<li>' . $product_title . ' - ' . $product_price . '</li>';
                        }
                        echo '</ul>';
                    }
                    ?>

                </p>
                <div id="bought_together_search_results"></div>

            </div>
        </div>

        <?php
    }



    /**
     * Function for `woocommerce_before_add_to_cart_form` action-hook.
     * 
     * @return void
     */
    function show_items_before_sdsc()
    {
        global $post;
        $currentProductId = $post->ID;
        // Get the saved selected product IDs for the current product
        $selected_product_ids = get_post_meta($currentProductId, 'selected_product', true);

        ?>
        <style>
            /* Internal CSS styles */
            .selected-products-list {
                border-collapse: collapse;
                width: 100%;
            }

            .freq-product-item {
                padding: 10px 0;
                border-bottom: 1px dotted #e5e5e5;
            }

            .product-thumbnail img {
                max-width: 100px;
                /* Adjust as needed */
                height: auto;
            }

            .product-details {
                padding-left: 10px;
            }

            .product-title {
                font-weight: bold;
            }

            .product-price {
                color: #555;
            }

            .product-checkbox {
                /* Customize checkbox appearance */
                width: 20px;
                height: 20px;
            }

            /* Responsive adjustments */
            @media (max-width: 768px) {
                .selected-products-list {
                    font-size: 14px;
                }

                .product-thumbnail img {
                    max-width: 80px;
                }
            }

            @media (max-width: 576px) {
                .product-thumbnail img {
                    max-width: 60px;
                }
            }
        </style>


        <?php


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
                    echo '<td><input type="checkbox" id="' . $checkbox_id . '" class="product-checkbox"></td>';
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
        }

    }

    // Function to add selected products to the cart
    public function add_to_cart_selected_products()
    {
        check_ajax_referer('add_to_cart_nonce', 'security');

        // Get the selected product IDs
        $selected_products = isset ($_POST['selected_products']) ? $_POST['selected_products'] : array();

        // var_dump($)

        // Loop through selected products and add them to the cart
        foreach ($selected_products as $product_id) {
            WC()->cart->add_to_cart($product_id);
        }

        wp_send_json_success();
    }


}

$WcEazyFrequentlyBoughtUtils = new WcEazyFrequentlyBoughtUtils();

// New function to show selected products before add to cart button
function show_items_before_sdsc()
{
    global $WcEazyFrequentlyBoughtUtils;
    $WcEazyFrequentlyBoughtUtils->show_items_before_sdsc();
}
 


// if (!empty ($selected_product_ids)) {
//     // Initialize an array to store product data
//     $selected_products_data = array();

//     foreach ($selected_product_ids as $product_id) {
//         // Replace with actual logic to fetch product data from your database
//         $product = wc_get_product($product_id);

//         if ($product) { // Check if product exists
//             $product_title = $product->get_name();
//             $product_image = get_the_post_thumbnail_url($product_id, 'thumbnail'); // Change 'thumbnail' to the desired image size
//             $product_price = $product->get_price(); // Get the product price without formatting

//             // Add product data to the array
//             $selected_products_data[] = array(
//                 'id' => $product_id,
//                 'title' => $product_title,
//                 'image' => $product_image,
//                 'price' => $product_price
//             );
//         }
//     }

//     // Check if there are selected products data
//     if (!empty ($selected_products_data)) {
//         // Encode the selected products data as JSON and store it in a hidden input field
//         echo '<input type="hidden" id="selected_products_data" value="' . htmlspecialchars(json_encode($selected_products_data)) . '">';

//         // Output the selected products table
//         echo '<table class="selected-products-list">';
//         foreach ($selected_products_data as $product_data) {
//             echo '<tr class="freq-product-item">';
//             echo '<td class="product-thumbnail"><img src="' . $product_data['image'] . '" alt="' . $product_data['title'] . '"></td>';
//             echo '<td class="product-details">';
//             echo '<span class="product-title">' . $product_data['title'] . '</span><br>';
//             echo '<span class="product-price">' . wc_price($product_data['price']) . '</span>';
//             echo '</td>';
//             echo '</tr>';
//         }
//         echo '</table>';
//         echo '<br>';
//     }
// }


add_action('woocommerce_before_add_to_cart_form', array($WcEazyFrequentlyBoughtUtils, 'show_items_before_sdsc'));





?>