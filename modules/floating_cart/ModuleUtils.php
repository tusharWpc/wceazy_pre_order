<?php

// If this file is called directly, abort.
if (!defined ('WPINC')) {
    die;
}

if(!isset($_SESSION)){session_start();}

if (!class_exists ('WcEazyFloatingCartUtils')) {
    class WcEazyFloatingCartUtils
    {
        public $base_admin;
        public $module_admin;

        public function __construct ($base_admin, $module_admin)
        {
            $this->base_admin = $base_admin;
            $this->module_admin = $module_admin;
        }

        public function saveSettings($post_data){
            if(!empty($post_data)){
                update_option( 'wceazy_floating_cart_settings', json_encode($post_data) );
            }
        }

        public function wceazy_ajaxify_basket_item_count () { ?>
            <div class="wceazy_fc_basket_item_count"><?php echo is_object( WC()->cart ) ? WC()->cart->get_cart_contents_count() : '0'; ?></div>
            <script>wceazy_frontend_fc_init();</script>
            <?php $fragments['div.wceazy_fc_basket_item_count'] = ob_get_clean();
            return $fragments;
        }

    }
}