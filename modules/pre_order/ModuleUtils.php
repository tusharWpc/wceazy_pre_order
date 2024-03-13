<?php
// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

if (!isset($_SESSION)) {
    session_start();
}

$wceazy_pre_order_settings = get_option('wceazy_pre_order_settings', false);
$wceazy_po_settings = $wceazy_pre_order_settings ? json_decode($wceazy_pre_order_settings, true) : array();

// Correct the array key to access the pre_order_avl_date_label
$wceazy_po_pre_order_avl_date_label = isset($wceazy_po_settings["pre_order_avl_date_label"]) ? $wceazy_po_settings["pre_order_avl_date_label"] : "Default Avl Data";

$wceazy_po_pre_order_enable_avl_date_label = isset($wceazy_po_settings["pre_order_enable_avl_date_label"]) ? $wceazy_po_settings["pre_order_enable_avl_date_label"] : "on";



$wceazy_po_pre_order_enable_avl_date_and_label = isset($wceazy_po_settings["pre_order_enable_avl_date_and_label"]) ? $wceazy_po_settings["pre_order_enable_avl_date_and_label"] : "yes";

// echo "<pre>";
// echo "avl:";
// var_dump($wceazy_po_pre_order_enable_avl_date_and_label);
// echo "</pre>";



if (!class_exists('WcEazyPreOrderUtils')) {
    class WcEazyPreOrderUtils
    {
        public $base_admin;
        public $module_admin;
        public $wceazy_po_pre_order_btn_text; // Define the variable within the class
        public $wceazy_po_enable_pre_order; // Define the variable within the class
        public $wceazy_po_pre_order_avl_date_label;
        public $wceazy_po_pre_order_enable_avl_date_label;




        // Constructor to initialize class properties
        public function __construct($base_admin, $module_admin)
        {
            $this->base_admin = $base_admin;
            $this->module_admin = $module_admin;

            // new
            $this->wcz_pre_order_mail();

            // Initialize session if not already started
            // Removed session_start() here as it's already started at the beginning of the file
        }

        // Function to save settings data
        public function saveSettings($post_data)
        {
            if (!empty($post_data)) {
                update_option('wceazy_pre_order_settings', json_encode($post_data));
            }
        }

        // `````new satrt

        public function wcz_pre_order_mail()
        {
            add_filter('woocommerce_email_classes', array($this, 'manage_email_class'));
            $emails = get_option('woocommerce_pre_order_settings');
            // $r = __DIR__ . '/inc/wc-pre-order.php';
            // var_dump($r);
            // var_dump($emails);
        }
        public function manage_email_class($emails)
        {
            $emails['WC_Pre_Order_New'] = include __DIR__ . '/inc/wc-new-pre-order.php';
            $emails['WC_Pre_Order'] = include __DIR__ . '/inc/wc-pre-order.php';
            return $emails;
        }

        public function manage_email()
        {
            $pre_emails = include __DIR__ . '/inc/wc-new-pre-order.php';

            // Check if $pre_emails is an object
            if (is_object($pre_emails) && isset($pre_emails->settings)) {
                // Access the settings array
                $settings = $pre_emails->settings;
                // Access the 'subject' element
                $subject = $settings['subject'];
                $pre_emails = $settings['heading'];
                $additional_content = $settings['additional_content'];

                echo "Subject: $subject <br>";

                echo "heading: $pre_emails <br>";
                echo "additional_content: $additional_content <br>";
                echo "Subject: $pre_emails <br>";
            }

        }


        public function preorderCustomColumn($columns)
        {
            $newColumns = [];
            foreach ($columns as $columnName => $columnInfo) {
                $newColumns[$columnName] = $columnInfo;
                if ('order_total' === $columnName) {
                    $newColumns['order_preorder_date'] = __('Preorder Date', 'pre-orders-for-woocommerce');
                }
            }

            return $newColumns;
        }


        // `````new end 
        // Add custom fields to the product editor for pre-order options
        public function add_preorder_fields()
        {
            global $post;
            // Retrieve pre-order settings
            $wceazy_pre_order_settings = get_option('wceazy_pre_order_settings', false);
            $wceazy_po_settings = $wceazy_pre_order_settings ? json_decode($wceazy_pre_order_settings, true) : array();

            // Determine if pre-order is enabled
            $wceazy_po_enable_pre_order = isset($wceazy_po_settings["enable_pre_order"]) ? $wceazy_po_settings["enable_pre_order"] : "Pre Order enable";

            // Determine if the product is marked as a pre-order
            $is_pre_order = get_post_meta($post->ID, '_is_pre_order', true);

            // Determine if the product is out of stock
            $is_out_of_stock = false;

            // Determine if the product belongs to specific pre-order categories
            $is_in_preorder_category = false; // Placeholder logic, implement your actual logic here
            // Example:
            // $is_in_preorder_category = $this->is_pre_order_category($product);

            // Automatically enable the pre-order mode only for specific out-of-stock products or categories
            if ($is_out_of_stock || $is_in_preorder_category) {
                $wceazy_po_enable_pre_order = 'yes';
            } else {
                $wceazy_po_enable_pre_order = 'no';
            }

            echo '<div class="options_group">';
            // Checkbox for marking a product as a pre-order
            woocommerce_wp_checkbox(
                array(
                    'id' => '_is_pre_order',
                    'label' => __('Set as Pre-order', 'wceazy'),
                    'description' => __('Check this if you want to offer this product as a pre-order.', 'wceazy'),
                    'desc_tip' => true,
                    'value' => $is_pre_order === 'yes' ? 'yes' : 'no', // Set the checkbox value dynamically
                )
            );

            // Other fields/buttons hidden by default
            $style = $is_pre_order === 'yes' ? '' : 'style="display: none;"';

            // Date selection for pre-order products
            echo '<div class="pre-order-fields" ' . $style . '>';

            woocommerce_wp_text_input(
                array(
                    'id' => '_pre_order_date_time',
                    'label' => __('Pre-order Date & Time', 'wceazy'),
                    'placeholder' => __('YYYY-MM-DD HH:MM', 'wceazy'),
                    'description' => __('Select the date and time when this pre-order will be available.', 'wceazy'),
                    'desc_tip' => true,
                    'type' => 'datetime-local',
                )
            ); 

         // Text input for pre-order price
            woocommerce_wp_text_input(
                array(
                    'id' => '_pre_order_price',
                    'label' => __('Pre-order Price', 'wceazy'),
                    'placeholder' => __('Enter pre-order price', 'wceazy'),
                    'description' => __('Enter the price for this product when it is in pre-order mode.', 'wceazy'),
                    'desc_tip' => true,
                    'type' => 'number',
                    'custom_attributes' => array(
                        'step' => 'any',
                    ),
                )
            );

            echo '</div>'; // End .pre-order-fields

            echo '</div>'; // End .options_group
        }

        // Enqueue JavaScript to show/hide fields/buttons based on checkbox state
        public function show_hide_preorder_fields()
        {
            ?>

            <script>
                jQuery(document).ready(function ($) {
                    var checkbox = $('#_is_pre_order');
                    var preorderFields = $('.pre-order-fields');

                    // Show/hide fields on checkbox change
                    checkbox.change(function () {
                        if (checkbox.is(':checked')) {
                            preorderFields.slideDown();
                        } else {
                            preorderFields.slideUp();
                        }
                    });

                    // Trigger change event on page load if checkbox is checked
                    if (checkbox.is(':checked')) {
                        preorderFields.show();
                    }
                });
            </script>
            <?php

        }

        // Save custom fields data when the product is saved
        public function save_preorder_fields($post_id)
        {
            // Validate and sanitize input
            $is_pre_order = isset($_POST['_is_pre_order']) ? 'yes' : 'no';
            update_post_meta($post_id, '_is_pre_order', sanitize_text_field($is_pre_order));

            $pre_order_date = isset($_POST['_pre_order_date_time']) ? sanitize_text_field($_POST['_pre_order_date_time']) : '';
            update_post_meta($post_id, '_pre_order_date_time', $pre_order_date);

            $dynamic_inventory = isset($_POST['_dynamic_inventory']) ? 'yes' : 'no';
            update_post_meta($post_id, '_dynamic_inventory', sanitize_text_field($dynamic_inventory));

            $pre_order_price = isset($_POST['_pre_order_price']) ? wc_format_decimal($_POST['_pre_order_price']) : '';
            update_post_meta($post_id, '_pre_order_price', $pre_order_price);

            // Remove pre-order discount
            delete_post_meta($post_id, '_pre_order_discount');
        }

        // new Save custom fields data when the product is saved

        // Hook into WooCommerce to modify the Add to Cart button text and handle pre-order price 
        public function custom_preorder_button_text($text)
        {
            global $product;

            $wceazy_pre_order_settings = get_option('wceazy_pre_order_settings', false);
            $wceazy_po_settings = $wceazy_pre_order_settings ? json_decode($wceazy_pre_order_settings, true) : array();

            // Define $wceazy_po_pre_order_btn_text as a class property
            $this->wceazy_po_pre_order_btn_text = isset($wceazy_po_settings["pre_order_btn_text"]) ? $wceazy_po_settings["pre_order_btn_text"] : "PreOrder Now!";

            if ($product && is_a($product, 'WC_Product') && $product->is_type('simple')) {
                $product_id = $product->get_id();

                if ($product_id) {
                    $is_pre_order = get_post_meta($product_id, '_is_pre_order', true);

                    if ($is_pre_order === 'yes') {
                        // Access the class property for the button text
                        return $this->wceazy_po_pre_order_btn_text;
                    } else {
                        return "Add To Cart";
                    }
                }
            }

            // Return default text if conditions are not met
            return $text;
        }


        public function display_preorder_date_and_time()
        {
            global $product;

            $wceazy_pre_order_settings = get_option('wceazy_pre_order_settings', false);
            $wceazy_po_settings = $wceazy_pre_order_settings ? json_decode($wceazy_pre_order_settings, true) : array();

            // Correct the array key to access the pre_order_avl_date_label
            $wceazy_po_pre_order_avl_date_label = isset($wceazy_po_settings["pre_order_avl_date_label"]) ? $wceazy_po_settings["pre_order_avl_date_label"] : "Default Avl Data";

            $wceazy_po_pre_order_enable_avl_date_label = isset($wceazy_po_settings["pre_order_enable_avl_date_label"]) ? $wceazy_po_settings["pre_order_enable_avl_date_label"] : "on";

            $wceazy_po_pre_order_enable_avl_date_and_label = isset($wceazy_po_settings["pre_order_enable_avl_date_and_label"]) ? $wceazy_po_settings["pre_order_enable_avl_date_and_label"] : "yes";

            if ($product && $product->is_type('simple') && 'yes' === get_post_meta($product->get_id(), '_is_pre_order', true)) {
                $pre_order_date_time = get_post_meta($product->get_id(), '_pre_order_date_time', true);

                if ($pre_order_date_time) {
                    $pre_order_date_time_obj = new DateTime($pre_order_date_time);
                    $formatted_date_time = $pre_order_date_time_obj->format(get_option('date_format') . ' ' . get_option('time_format'));

                    echo '<div class="preorder-availability">';

                    if ($wceazy_po_pre_order_enable_avl_date_and_label == "yes") {
                        // Use a variable to hold the content
                        if ($wceazy_po_pre_order_enable_avl_date_label == "yes") {
                            $label_content = '<strong class="preorder-label">' . $wceazy_po_pre_order_avl_date_label . '</strong>';
                            echo $label_content;
                        } else {
                            // Placeholder comment for handling the case where $wceazy_po_pre_order_enable_avl_date_label is not "yes"
                        }

                        // Echo the content
                        echo '<span class="preorder-date-time">' . $formatted_date_time . '</span>';
                    }

                    echo '</div>';
                }
            }
        }
        // Modify the product price for pre-order products

        public function custom_preorder_price($price, $product)
        {
            // Check if the product is marked as a pre-order
            // echo "PreOrder Price:"; 
            if ('yes' === get_post_meta($product->get_id(), '_is_pre_order', true)) {
                $pre_order_price = get_post_meta($product->get_id(), '_pre_order_price', true);


                // If a pre-order price is set, use it
                if (!empty($pre_order_price)) {

                    return $pre_order_price;
                }
            }

            return $price;
        }

        public function custom_preorder_price_html($price_html, $product)
        {
            $product_id = $product->get_id();

            // Initialize $price_html
            $price_html = '';

            // Check if the product is marked as a pre-order
            if ('yes' === get_post_meta($product_id, '_is_pre_order', true)) {
                $pre_order_price = get_post_meta($product_id, '_pre_order_price', true);
                $regular_price = get_post_meta($product_id, '_regular_price', true); // Get the regular price directly from post meta

                // Format regular price
                $regular_price_html = wc_price($regular_price);

                if (!empty($pre_order_price)) {
                    // Format pre-order price
                    $pre_order_price_html = wc_price($pre_order_price);

                    // Display all prices
                    $price_html .= sprintf(__('Regular Price: %s', 'wceazy'), $regular_price_html) . '<br>';
                    $price_html .= sprintf(__('Pre-order Price: %s', 'wceazy'), $pre_order_price_html) . '<br>';

                    // Add small text indicating pre-order price
                    $price_html .= '<small class="preorder-text">' . __('(Pre-order Price)', 'wceazy') . '</small>';
                } else {
                    // If there's no pre-order price, only display the regular price
                    $price_html .= sprintf(__('Regular Price: %s', 'wceazy'), $regular_price_html) . '<br>';
                }
            } else {
                // If the product is not marked as a pre-order, only display the regular price
                $regular_price = get_post_meta($product_id, '_regular_price', true); // Get the regular price directly from post meta
                $regular_price_html = wc_price($regular_price);
                $price_html .= sprintf(__('Regular Price: %s', 'wceazy'), $regular_price_html) . '<br>';
            }

            return $price_html;
        }

        ///////////////////////////////
        // Callback function to display pre-order information in the order details pagepublic function

        // Schedule a task to update product availability and send email notifications when pre-order period ends
        public function schedule_preorder_availability_update()
        {
            if (!wp_next_scheduled('update_preorder_availability_and_notify')) {
                wp_schedule_event(time(), 'daily', 'update_preorder_availability_and_notify');
            }
        }

        // Callback function to update product availability and send email notifications
        public function update_preorder_availability_and_notify()
        {
            $preorder_products = new WP_Query(
                array(
                    'post_type' => 'product',
                    'posts_per_page' => -1,
                    'meta_query' => array(
                        array(
                            'key' => '_is_pre_order',
                            'value' => 'yes',
                            'compare' => '=',
                        ),
                    ),
                )
            );

            if ($preorder_products->have_posts()) {
                while ($preorder_products->have_posts()) {
                    $preorder_products->the_post();
                    $product_id = get_the_ID();
                    $pre_order_date = get_post_meta($product_id, '_pre_order_date_time', true);

                    if (strtotime($pre_order_date) < time()) {
                        // Update product availability
                        update_post_meta($product_id, '_is_pre_order', 'no');

                        // Send email notification to customers
                        $product = wc_get_product($product_id);
                        $subject = __('Product Available for Purchase', 'your-text-domain');
                        $message = sprintf(__('The product "%s" is now available for purchase. Visit our website to place your order.', 'your-text-domain'), $product->get_name());
                        $recipients = $this->get_customers_to_notify($product_id); // You need to implement this function to get the list of customers to notify
                        foreach ($recipients as $recipient) {
                            wp_mail($recipient->user_email, $subject, $message);
                        }
                    }
                }
                wp_reset_postdata();
            }
        }


        // Send pre-order confirmation email to customer
        public function send_preorder_confirmation_email($order_id, $order)
        {
            // Check if the order contains pre-order products
            $preorder_products = false;
            foreach ($order->get_items() as $item) {
                if ('yes' === get_post_meta($item->get_product_id(), '_is_pre_order', true)) {
                    $preorder_products = true;
                    break;
                }
            }

            if ($preorder_products) {
                // Get customer email
                $email = $order->get_billing_email();

                // Email subject
                $subject = __('Pre-order Confirmation', 'wceazy');

                // Email body
                $message = __('Thank you for placing a pre-order.
                Your order will be processed as soon as the product becomes
                available.', 'wceazy');

                // Send email
                wp_mail($email, $subject, $message);
            }
        }

        // Schedule a task to check pre-order availability periodically
        public function schedule_preorder_availability_check()
        {
            if (!wp_next_scheduled('check_preorder_availability')) {
                wp_schedule_event(time(), 'daily', 'check_preorder_availability');
            }
        }

        // Callback function to check pre-order availability
        public function check_preorder_availability()
        {
            $preorder_products = new WP_Query(
                array(
                    'post_type' => 'product',
                    'posts_per_page' => -1,
                    'meta_query' => array(
                        array(
                            'key' => '_is_pre_order',
                            'value' => 'yes',
                            'compare' => '=',
                        ),
                    ),
                )
            );

            if ($preorder_products->have_posts()) {
                while ($preorder_products->have_posts()) {
                    $preorder_products->the_post();
                    $product_id = get_the_ID();
                    $pre_order_date = get_post_meta($product_id, '_pre_order_date_time', true);

                    if (strtotime($pre_order_date) < time()) {
                        // Product is no longer in pre-order period
                        $this->send_preorder_availability_notification($product_id);
                        update_post_meta($product_id, '_is_pre_order', 'no');
                    }
                }
                wp_reset_postdata();
            }
        }

        // pre-order Pro feature 
        // Send email notification for product availability
        public function send_preorder_availability_notification($product_id)
        {
            $product = wc_get_product($product_id);
            $users = $this->get_preorder_customers($product_id);

            if ($users) {
                $subject = __('Product Availability Notification', 'wceazy');
                $message = sprintf(__('The pre-order period for "%s" has ended. The product is now available for purchase.', 'wceazy'), $product->get_name());

                foreach ($users as $user_email) {
                    wp_mail($user_email, $subject, $message);
                }
            }
        }

        // Send pre-order purchase notification email to admin
        public function send_preorder_purchase_notification($order_id, $order)
        {
            $pre_emails = include __DIR__ . '/inc/wc-new-pre-order.php';

            // Check if $pre_emails is an object
            if (is_object($pre_emails) && isset($pre_emails->settings)) {
                // Access the settings array
                $settings = $pre_emails->settings;

                // Access the 'subject' element
                $subject = $settings['subject'];
                $pre_heading = $settings['heading'];
                $additional_content = $settings['additional_content'];
                // echo"$subject";
                // Check if the order contains pre-order products
                $preorder_products = false;
                foreach ($order->get_items() as $item) {
                    if ('yes' === get_post_meta($item->get_product_id(), '_is_pre_order', true)) {
                        $preorder_products = true;
                        break;
                    }
                }

                if ($preorder_products) {
                    // Email body
                    $message = '<html>';
                    $message .= '<head>';
                    $message .= '<style>';
                    $message .= 'h1 {color: #007bff; font-size: 28px; margin-bottom: 20px;}';
                    $message .= 'p {color: #555; font-size: 18px; margin-bottom: 10px;}';
                    $message .= '</style>';
                    $message .= '</head>';
                    $message .= '<body>';
                    $message .= sprintf('<h1>%s</h1>', $pre_heading);
                    $message .= '<p>';
                    $message .= __($subject, 'wceazy') . '<br>';
                    $message .= __('Details of the order are as follows:', 'wceazy') . '<br>';
                    $message .= __('Order ID:', 'wceazy') . ' ' . $order_id . '<br>';
                    $message .= __($additional_content, 'wceazy') . '<br>';
                    $message .= '</p>';
                    $message .= '</body>';
                    $message .= '</html>';

                    // Send email to admin
                    add_filter('wp_mail_content_type', function () {
                        return 'text/html';
                    });
                    wp_mail(get_option('admin_email'), $subject, $message);
                }
            }
        }


        // Get customers who pre-ordered the product
        public function get_preorder_customers($product_id)
        {
            $users = array();

            // Query orders containing the product
            $orders = wc_get_orders(
                array(
                    'status' => array('processing', 'completed'),
                    'limit' => -1,
                    'return' => 'ids',
                    'meta_query' => array(
                        array(
                            'key' => '_customer_user',
                            'compare' => 'EXISTS',
                        ),
                    ),
                    'date_created' => '>' . (time() - 60 * 60 * 24 * 30), // Check orders created in the last 30 days
                )
            );

            // Check each order for the product
            foreach ($orders as $order_id) {
                $order = wc_get_order($order_id);
                foreach ($order->get_items() as $item) {
                    if ($item->get_product_id() == $product_id) {
                        $user_id = $order->get_customer_id();
                        $user_email = get_userdata($user_id)->user_email;
                        $users[] = $user_email;
                    }
                }
            }

            return array_unique($users);
        }

        public function add_preorder_status_to_product()
        {
            // Get all products
            $products = get_posts(
                array(
                    'post_type' => 'product',
                    'numberposts' => -1,
                )
            );

            // Loop through each product
            foreach ($products as $product) {
                // Add the _is_pre_order meta field to the product
                add_post_meta($product->ID, '_is_pre_order', 'yes', true);
            }
        }

        // Function to filter orders by pre-order products
        public function filter_orders_by_preorder_products($args)
        {
            echo "<pre>";
            printf($args);
            echo "</pre>";
            // Check if the 'orders' property exists and is not null
            if (isset($args['orders'])) {
                // Convert the 'orders' property to an array if it's an object
                $orders = is_array($args['orders']) ? $args['orders'] : (array) $args['orders'];

                // Iterate through the orders
                foreach ($orders as $order) {
                    // Access the 'meta_data' array of each order
                    $meta_data = $order->get_meta_data();

                    // Iterate through the meta data of each order
                    foreach ($meta_data as $meta) {
                        // Check if the meta key matches '_order_has_preorder'
                        if ($meta->key === '_order_has_preorder') {
                            // Access the value of '_order_has_preorder'
                            $order_has_preorder_value = $meta->value;

                            // Perform any necessary actions with the value
                            echo "Value of _order_has_preorder: " . $order_has_preorder_value;

                            // If you want to update the post meta based on this value, you can use:
                            // $order_id = $order->get_id();
                            // if ($order_id && $order_has_preorder_value === 'yes') {
                            //     update_post_meta($order_id, '_order_has_preorder', 'yes');
                            // }

                            // Break the loop after finding the relevant meta data
                            break 2;
                        }
                    }
                }
            } else {
                // Handle case where 'orders' property is missing
                echo "No orders found.";
            }

            // Return the modified $args object
            return $args;
        }

        // Callback function to set pre-order date when the order is placed
        public function set_preorder_date_on_order_placement($order_id, $posted_data, $order)
        {
            foreach ($order->get_items() as $item_id => $item) {
                $product_id = $item->get_product_id();

                // Check if the product is marked as a pre-order
                if ('yes' === get_post_meta($product_id, '_is_pre_order', true)) {
                    // Retrieve pre-order date from posted data (you may need to adjust this based on your form fields)
                    $pre_order_date = isset($posted_data['_pre_order_date_time']) ? $posted_data['_pre_order_date_time'] : '';

                    // Set pre-order date for the product
                    update_post_meta($product_id, '_pre_order_date_time', $pre_order_date);
                }
            }
        }

        // Automatically cancel pre-orders if the product is no longer available
        // public function auto_cancel_pre_orders()
        // {
        //     // Query pre-order products
        //     $preorder_products = new WP_Query(
        //         array(
        //             'post_type' => 'product',
        //             'posts_per_page' => -1,
        //             'meta_query' => array(
        //                 array(
        //                     'key' => '_is_pre_order',
        //                     'value' => 'yes',
        //                     'compare' => '=',
        //                 ),
        //             ),
        //         )
        //     );

        //     if ($preorder_products->have_posts()) {
        //         while ($preorder_products->have_posts()) {
        //             $preorder_products->the_post();
        //             $product_id = get_the_ID();
        //             $pre_order_date = get_post_meta($product_id, '_pre_order_date_time', true);

        //             // Check if pre-order date/time has passed
        //             if (strtotime($pre_order_date) < time()) {
        //                 // Get pre-order customers
        //                 $preorder_customers = $this->get_preorder_customers($product_id);

        //                 // Cancel pre-orders for each customer
        //                 foreach ($preorder_customers as $customer_email) {
        //                     $customer_orders = wc_get_orders(
        //                         array(
        //                             'status' => array('pending', 'processing'),
        //                             'customer_email' => $customer_email,
        //                             'meta_query' => array(
        //                                 array(
        //                                     'key' => '_customer_user',
        //                                     'compare' => 'EXISTS',
        //                                 ),
        //                                 array(
        //                                     'key' => '_pre_ordered_product_id',
        //                                     'value' => $product_id,
        //                                     'compare' => '=',
        //                                 ),
        //                             ),
        //                         )
        //                     );

        //                     // Cancel each order
        //                     foreach ($customer_orders as $order) {
        //                         $order->update_status('cancelled', __('Pre-order canceled: Product no longer available', 'wceazy'));
        //                     }
        //                 }

        //                 // Update product meta to mark it as not a pre-order
        //                 update_post_meta($product_id, '_is_pre_order', 'no');
        //             }
        //         }
        //         wp_reset_postdata();
        //     }
        // }

        // Define the schedule_auto_cancel_task method
        // public function schedule_auto_cancel_task()
        // {
        //     // Implement your logic here for scheduling the auto-cancel task
        //     if (!wp_next_scheduled('auto_cancel_pre_orders')) {
        //         wp_schedule_event(time(), 'daily', 'auto_cancel_pre_orders');
        //     }
        // }



    }
}