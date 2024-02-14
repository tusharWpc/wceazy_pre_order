<?php

$result = array();

/* Check if user has manage option capabilities */
if (current_user_can ('manage_options')) {

    $post_data = array();
    if (isset($_REQUEST) && $_REQUEST['data']) {
        $post_data = $_REQUEST['data'];
        $this->base_admin->one_click_checkout->utils->saveSettings($post_data);
        $result = array("status" => 'true');
    } else {
        $result = array("status" => 'false');
    }
} else {
    $result = array("status" => 'false');
}

echo json_encode ($result, JSON_UNESCAPED_UNICODE);