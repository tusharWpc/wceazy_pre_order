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

        public function __construct($base_admin, $module_admin)
        {
            $this->base_admin = $base_admin;
            $this->module_admin = $module_admin;

            if (!get_option("wceazy_pre_order_rules")) {
                update_option('wceazy_pre_order_rules', "");
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
                    'label' => __('Offer as Pre-order', 'pre-order'),
                    'description' => __('Check this if you want to offer this product as a pre-order.', 'pre-order'),
                    'desc_tip' => true,
                )
            );

            // Other fields/buttons hidden by default
            $style = 'style="display: none;"';

            if (get_post_meta($post->ID, '_is_pre_order', true) === 'yes') {
                $style = ''; // Show fields/buttons if the product is set as a pre-order
            }

            // Date selection for pre-order products
            echo '<div class="pre-order-fields" ' . $style . '>';
            woocommerce_wp_text_input(
                array(
                    'id' => '_pre_order_date_time',
                    'label' => __('Pre-order Date & Time', 'pre-order'),
                    'placeholder' => __('YYYY-MM-DD HH:MM', 'pre-order'),
                    'description' => __('Select the date and time when this pre-order will be available.', 'pre-order'),
                    'desc_tip' => true,
                    'type' => 'datetime-local',
                )
            );

            // Dynamic checkbox for dynamic inventory
            woocommerce_wp_checkbox(
                array(
                    'id' => '_dynamic_inventory',
                    'label' => __('Dynamic Inventory', 'pre-order'),
                    'description' => __('Check this if you want to enable dynamic inventory for this product.', 'pre-order'),
                    'desc_tip' => true,
                )
            );

            // Text input for pre-order price
            woocommerce_wp_text_input(
                array(
                    'id' => '_pre_order_price',
                    'label' => __('Pre-order Price', 'pre-order'),
                    'placeholder' => __('Enter pre-order price', 'pre-order'),
                    'description' => __('Enter the price for this product when it is in pre-order mode.', 'pre-order'),
                    'desc_tip' => true,
                    'type' => 'number',
                    'custom_attributes' => array(
                        'step' => 'any',
                    ),
                )
            );

            // Text input for pre-order discount
            woocommerce_wp_text_input(
                array(
                    'id' => '_pre_order_discount',
                    'label' => __('Pre-order Discount ( % )', 'pre-order'),
                    'placeholder' => __('Enter pre-order discount', 'pre-order'),
                    'description' => __('Enter the discount for this product during the pre-order period.', 'pre-order'),
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
        jQuery(document).ready(function($) {
            var checkbox = $('#_is_pre_order');
            var preorderFields = $('.pre-order-fields');

            // Show/hide fields on checkbox change
            checkbox.change(function() {
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

            // $pre_order_time = isset($_POST['_pre_order_time']) ? sanitize_text_field($_POST['_pre_order_time']) : '';
            // update_post_meta($post_id, '_pre_order_time', $pre_order_time);

            $dynamic_inventory = isset($_POST['_dynamic_inventory']) ? 'yes' : 'no';
            update_post_meta($post_id, '_dynamic_inventory', sanitize_text_field($dynamic_inventory));

            $pre_order_price = isset($_POST['_pre_order_price']) ? wc_format_decimal($_POST['_pre_order_price']) : '';
            update_post_meta($post_id, '_pre_order_price', $pre_order_price);

            $pre_order_discount = isset($_POST['_pre_order_discount']) ? wc_format_decimal($_POST['_pre_order_discount']) : '';
            update_post_meta($post_id, '_pre_order_discount', $pre_order_discount);
        }


        // Hook into WooCommerce to modify the Add to Cart button text and handle pre-order price
        public function custom_preorder_button_text($text)
        {
            global $product;

            if ($product && $product->is_type('simple') && 'yes' === get_post_meta($product->get_id(), '_is_pre_order', true)) {
                $pre_order_price = get_post_meta($product->get_id(), '_pre_order_price', true);
                $pre_order_discount = get_post_meta($product->get_id(), '_pre_order_discount', true);

                if ($pre_order_price !== '') {
                    $product->set_price($pre_order_price);
                    // No need to call custom_preorder_price_html here
                }

                if ($pre_order_discount !== '') {
                    $discounted_price = $product->get_regular_price() - ($product->get_regular_price() * $pre_order_discount / 100);
                    $product->set_sale_price($discounted_price);
                }

                $text = __('Pre-order Now', 'pre-order');

                // Add action to send email when pre-order is placed
                add_action('woocommerce_order_status_pending_to_processing_notification', array($this, 'send_preorder_confirmation_email'), 10, 2);
            }

            return $text;
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
            $pre_order_price = get_post_meta($product->get_id(), '_pre_order_price', true);
            $pre_order_discount = get_post_meta($product->get_id(), '_pre_order_discount', true);
            $regular_price = $product->get_regular_price();
        
            if (!empty($pre_order_price)) {
                // Format pre-order price
                $pre_order_price_html = wc_price($pre_order_price);
        
                // Display pre-order price
                $price_html = sprintf(__('Pre-order Price: %s', 'pre-order'), $pre_order_price_html) . '<br>';
        
                // Check if a discount is set
                if (!empty($pre_order_discount)) {
                    // Calculate discounted price
                    $discounted_price = $pre_order_price - ($pre_order_price * $pre_order_discount / 100);
                    // Format discounted price
                    $discounted_price_html = wc_price($discounted_price);
        
                    // Display discounted price
                    $price_html .= sprintf(__('Discounted Price: %s', 'pre-order'), $discounted_price_html) . '<br>';
                }
        
                // Add small text indicating pre-order price
                $price_html .= '<small class="preorder-text">' . __('(Pre-order Price)', 'pre-order') . '</small>';
            }
        
            return $price_html;
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
                $subject = __('Pre-order Confirmation', 'pre-order');

                // Email body
                $message = __('Thank you for placing a pre-order. Your order will be processed as soon as the product becomes available.', 'pre-order');

                // Send email
                wp_mail($email, $subject, $message);
            }
        }

    }
}
?>
