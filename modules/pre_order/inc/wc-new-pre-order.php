<?php

if (!class_exists('WC_Pre_Order_New')) {
    class WC_Pre_Order_New extends WC_Email
    {
        public function __construct()
        {
            $this->id = 'new_pre_order';
            $this->title = __('New Pre order', 'woocommerce');
            $this->description = __('New pre emails are sent to chosen recipient(s) when a new order is received.', 'woocommerce');
            $this->template_html = 'template/admin-preorder.php';
            $this->template_plain = 'template/plain/admin-preorder.php';
            $this->placeholders = array(
                '{order_date}' => '',
                '{order_number}' => '',
            );

            //Triggers for this mail
            add_action('woocommerce_order_status_pending_to_pre-ordered_notification', array($this, 'trigger'), 10, 2);
            add_action('woocommerce_order_status_failed_to_pre-ordered_notification', array($this, 'trigger'), 10, 2);
            add_action('woocommerce_order_status_cancelled_to_pre-ordered_notification', array($this, 'trigger'), 10, 2);

            // Call parent constructor.
            parent::__construct();

            // $this->template_base = WCEAZY_TEMPLATE_PATH;
        }

        public function get_default_subject()
        {
            return __('Your {site_title} Pre-Order has been received!', 'pre-orders-for-woocommerce');
        }

        /**
         * Get email heading.
         *
         * @since  3.1.0
         * @return string
         */
        public function get_default_heading()
        {
            return __('Thank you for your pre-order', 'pre-orders-for-woocommerce');
        }

        public function trigger($order_id, $order = false)
        {
            $this->setup_locale();

            if ($order_id && !is_a($order, 'WC_Order')) {
                $order = wc_get_order($order_id);
            }

            if (is_a($order, 'WC_Order')) {
                $this->object = $order;
                $this->recipient = $this->object->get_billing_email();
                $this->placeholders['{order_date}'] = wc_format_datetime($this->object->get_date_created());
                $this->placeholders['{order_number}'] = $this->object->get_order_number();
            }

            if ($this->is_enabled() && $this->get_recipient()) {
                $this->send($this->get_recipient(), $this->get_subject(), $this->get_content(), $this->get_headers(), $this->get_attachments());
            }

            $this->restore_locale();
        }
        /**
         * Get content html.
         *
         * @return string
         */
        public function get_content_html()
        {
            return wc_get_template_html(
                $this->template_html,
                array(
                    'order' => $this->object,
                    'email_heading' => $this->get_heading(),
                    'additional_content' => $this->get_additional_content(),
                    'sent_to_admin' => false,
                    'plain_text' => false,
                    'email' => $this,
                ),
                '',
                $this->template_base
            );
        }

        /**
         * Get content plain.
         *
         * @return string
         */
        public function get_content_plain()
        {
            return wc_get_template_html(
                $this->template_plain,
                array(
                    'order' => $this->object,
                    'email_heading' => $this->get_heading(),
                    'additional_content' => $this->get_additional_content(),
                    'sent_to_admin' => false,
                    'plain_text' => true,
                    'email' => $this,
                ),
                '',
                $this->template_base
            );
        }

        /**
         * Default content to show below main email content.
         *
         * @since 3.7.0
         * @return string
         */
        public function get_default_additional_content()
        {
            return __('We look forward to fulfilling your pre-order soon.', 'pre-orders-for-woocommerce');
        }

    }

}
return new WC_Pre_Order_New();
