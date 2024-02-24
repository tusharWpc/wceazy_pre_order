<?php
// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

if (!isset($_SESSION)) {
    session_start();
}

if (!class_exists('WcEazyPreOrderUtils')) {
    class WcEazyPreOrderUtils
    {
        public $base_admin;
        public $module_admin;
        public $wceazy_po_pre_order_btn_text; // Define the variable within the class
        public $wceazy_po_enable_pre_order; // Define the variable within the class
        
        // Constructor to initialize class properties
        public function __construct($base_admin, $module_admin)
        {
            $this->base_admin = $base_admin;
            $this->module_admin = $module_admin;

            // Initialize session if not already started
            if (!isset($_SESSION)) {
                session_start();
            }

            // Assign session value or fallback
            $this->pre_order_btn_text = isset($_SESSION['wceazy_po_pre_order_btn_text']) ? $_SESSION['wceazy_po_pre_order_btn_text'] : 'Default Button Text';
        }

        // Function to save settings data
        public function saveSettings($post_data)
        {
            if (!empty($post_data)) {
                update_option('wceazy_pre_order_settings', json_encode($post_data));
            }
        }


        // Add custom fields to the product editor for pre-order options
        public function add_preorder_fields()
        {
            global $woocommerce, $post;

            echo '<div class="options_group">'; 
            // Checkbox for marking a product as a pre-order
            woocommerce_wp_checkbox(
                array(
                    'id' => '_is_pre_order',
                    'label' => __('Set as Pre-order', 'wceazy'),
                    'description' => __('Check this if you want to offer this product as a pre-order.', 'wceazy'),
                    'desc_tip' => true,
                )
            );

            // Other fields/buttons hidden by default
            $style = 'style="display: none;"';

            // Check if the product is out of stock
            $product_id = $post->ID;
            $product = wc_get_product($product_id);
            $is_out_of_stock = !$product->is_in_stock();

            // Check if the product belongs to specified categories
            $is_pre_order_category = $this->is_pre_order_category($product);

            // Automatically enable pre-order mode based on conditions
            if ($is_out_of_stock && $is_pre_order_category) {
                update_post_meta($product_id, '_is_pre_order', 'yes');
                $style = ''; // Show fields/buttons if the product is set as a pre-order
            }

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

            // Dynamic checkbox for dynamic inventory
            woocommerce_wp_checkbox(
                array(
                    'id' => '_dynamic_inventory',
                    'label' => __('Dynamic Inventory', 'wceazy'),
                    'description' => __('Check this if you want to enable dynamic inventory for this product.', 'wceazy'),
                    'desc_tip' => true,
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


        // Custom method to check if a product belongs to a pre-order category
        public function is_pre_order_category($product)
        {
            // Define your logic here to check if the product belongs to a pre-order category

            // Get the category IDs associated with the product
            $categories = $product->get_category_ids();

            // Example logic:
            // Check if the product belongs to a category with a specific ID
            // Replace 'your_preorder_category_id' with the actual ID of your pre-order category
            if (in_array('your_preorder_category_id', $categories)) {
                return true;
            }

            // If the product doesn't belong to the pre-order category, return false
            return false;
        }
 

        // Hook into WooCommerce to modify the Add to Cart button text and handle pre-order price 

        public function custom_preorder_button_text($text)
        {
            global $product;

            if ($product && $product->is_type('simple') && 'yes' === get_post_meta($product->get_id(), '_is_pre_order', true)) {
                $pre_order_price = get_post_meta($product->get_id(), '_pre_order_price', true);

                if ($pre_order_price !== '') {
                    $product->set_price($pre_order_price);
                    // No need to call custom_preorder_price_html here
                }

                // Access the dynamic button text here
                $dynamic_button_text = $this->wceazy_po_pre_order_btn_text;

                $text = __('Pre-order Now', 'wceazy');

                // Replace the static text with the dynamic button text
                if (!empty($dynamic_button_text)) {
                    $text = $dynamic_button_text;
                }

                // var_dump($text); // Debugging

                // Add action to send email when pre-order is placed
                // add_action('woocommerce_order_status_pending_to_processing_notification', array($this, 'send_preorder_confirmation_email'), 10, 2);
            }

            $wceazy_pre_order_settings = get_option('wceazy_pre_order_settings', False);
            $wceazy_po_settings = $wceazy_pre_order_settings ? json_decode($wceazy_pre_order_settings, true) : array();

            // echo "<pre>";
            // var_dump($wceazy_po_settings);
            // echo "</pre>";


            $wceazy_po_pre_order_btn_text = isset($wceazy_po_settings["pre_order_btn_text"]) ? $wceazy_po_settings["pre_order_btn_text"] : "PreOrder Now!";

            return $wceazy_po_pre_order_btn_text;
        }


        public function display_preorder_date_and_time()
        {
            global $product;

            if ($product && $product->is_type('simple') && 'yes' === get_post_meta($product->get_id(), '_is_pre_order', true)) {
                $pre_order_date_time = get_post_meta($product->get_id(), '_pre_order_date_time', true);

                if ($pre_order_date_time) {
                    $pre_order_date_time_obj = new DateTime($pre_order_date_time);
                    $formatted_date_time = $pre_order_date_time_obj->format(get_option('date_format') . ' ' . get_option('time_format'));

                    echo '<div class="preorder-availability">';
                    echo '<strong class="preorder-label">Pre-order Available on:</strong>';
                    echo '<span class="preorder-date-time">' . $formatted_date_time . '</span>';
                    echo '</div>';
                }

            }
        }

        // Modify the product price for pre-order products
        public function custom_preorder_price($price, $product)
        {
            // Check if the product is marked as a pre-order
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


        // Modify the product prices in the cart for pre-order products
        public function apply_preorder_discount_to_cart($cart)
        {
            if (is_admin() && !defined('DOING_AJAX')) {
                return;
            }

            if (did_action('woocommerce_before_calculate_totals') >= 2) {
                return;
            }

            // Initialize discount total
            $discount_total = 0;

            foreach ($cart->get_cart() as $cart_item_key => $cart_item) {
                $product = $cart_item['data'];
                $pre_order_price = get_post_meta($product->get_id(), '_pre_order_price', true);

                // Calculate discount amount for this product
                $discount_amount = ($product->get_price() - $pre_order_price) * $cart_item['quantity'];

                // Accumulate discount total
                $discount_total += $discount_amount;

                // Set the pre-order price as product price in the cart
                $cart_item['data']->set_price($pre_order_price);
            }

            // Apply discount total to cart subtotal
            // if ($discount_total > 0) {
            //     $cart->add_fee(__('Pre-order Discount', 'wceazy'), -$discount_total);
            // }

            // Recalculate cart totals
            $cart->calculate_totals();
        }


        // Schedule a task to update product availability when pre-order period ends
        public function schedule_preorder_availability_update()
        {
            if (!wp_next_scheduled('update_preorder_availability')) {
                wp_schedule_event(time(), 'daily', 'update_preorder_availability');
            }
        }

        // Callback function to update product availability
        public function update_preorder_availability()
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
                        update_post_meta($product_id, '_is_pre_order', 'no');
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
                $message = __('Thank you for placing a pre-order. Your order will be processed as soon as the product becomes available.', 'wceazy');

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
                $subject = __('Product Availability Notification', 'your-plugin-textdomain');
                $message = sprintf(__('The pre-order period for "%s" has ended. The product is now available for purchase.', 'your-plugin-textdomain'), $product->get_name());

                foreach ($users as $user_email) {
                    wp_mail($user_email, $subject, $message);
                }
            }
        }

        // Send pre-order purchase notification email to admin
        public function send_preorder_purchase_notification($order_id, $order)
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
                // Get admin email
                $admin_email = get_option('admin_email');

                // Email subject
                $subject = __('Pre-order Product Purchase Notification', 'your-plugin-textdomain');

                // Email body
                $message = sprintf(__('A user has purchased a pre-order product. Order ID: %s', 'your-plugin-textdomain'), $order_id);

                // Send email to admin
                wp_mail($admin_email, $subject, $message);
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


        function filter_orders_by_preorder_products($args)
        {
            // Get all products that were ordered during the pre-order phase
            $preorder_product_ids = array();
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
                    $preorder_product_ids[] = get_the_ID();
                }
                wp_reset_postdata();
            }

            // If there are products ordered during the pre-order phase, modify the order query
            if (!empty($preorder_product_ids)) {
                $args['meta_query'][] = array(
                    'key' => '_product_id',
                    'value' => $preorder_product_ids,
                    'compare' => 'IN',
                );
            }

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
        //                         $order->update_status('cancelled', __('Pre-order canceled: Product no longer available', 'your-plugin-textdomain'));
        //                     }
        //                 }

        //                 // Update product meta to mark it as not a pre-order
        //                 update_post_meta($product_id, '_is_pre_order', 'no');
        //             }
        //         }
        //         wp_reset_postdata();
        //     }
        // }

        // // Define the schedule_auto_cancel_task method
        // public function schedule_auto_cancel_task() {
        //     // Implement your logic here for scheduling the auto-cancel task
        //     if (!wp_next_scheduled('auto_cancel_pre_orders')) {
        //         wp_schedule_event(time(), 'daily', 'auto_cancel_pre_orders');
        //     }
        // }
    


    }
}
