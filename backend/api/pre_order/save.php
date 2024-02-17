<?php

$result = array();

/* Check if user has manage option capabilities */
if (current_user_can('manage_options')) {

    $post_data = array();
    if (isset($_REQUEST['data'])) {
        $post_data = $_REQUEST['data'];
        // Assuming saveSettings method is defined in WcEazyPreOrderAdmin class
        if (method_exists($this->base_admin->pre_order, 'saveSettings')) {
            $this->base_admin->pre_order->saveSettings($post_data);
            $result = array("status" => 'true');
        } else {
            $result = array("status" => 'false', "message" => 'saveSettings method not found');
        }
    } else {
        $result = array("status" => 'false', "message" => 'Data not provided');
    }
} else {
    $result = array("status" => 'false', "message" => 'User does not have permission');
}

echo json_encode($result, JSON_UNESCAPED_UNICODE);
