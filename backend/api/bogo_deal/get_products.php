<?php

$result = array();

/* Check if user has admin capabilities */
if (current_user_can('manage_options')) {


    $q = isset($_REQUEST['q']) ? sanitize_text_field($_REQUEST['q']) : "";

    $valuesList = $this->base_admin->bogo_deal->utils->getWooProducts($q);

    $result = array("status" => 'true', "values" => $valuesList);

} else {
    $result = array("status" => 'false');
}


echo json_encode($result, JSON_UNESCAPED_UNICODE);