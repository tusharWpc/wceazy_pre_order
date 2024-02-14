<?php

$result = array();

/* Check if user has admin capabilities */
if(current_user_can('manage_options')){

    if(isset($_REQUEST['module_slug']) && isset($_REQUEST['module_status'])){


        if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
            $module_slug = sanitize_text_field($_REQUEST['module_slug']);
            $module_status = sanitize_text_field($_REQUEST['module_status']);

            $this->base_admin->settings->updateModuleStatus($module_slug, $module_status);
            $result = array("status" => 'true');
        }else{
            $result = array("status" => 'false', "msg" => 'WooCommerce is not installed.');
        }


    }else{
        $result = array("status" => 'false', "msg" => 'Something went wrong.');
    }
}else{
    $result = array("status" => 'false', "msg" => 'Something went wrong.');
}


echo json_encode($result,  JSON_UNESCAPED_UNICODE);