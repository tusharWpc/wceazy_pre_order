<?php

$result = array();

/* Check if user has admin capabilities */
if (current_user_can('manage_options')) {

    $result = array("status" => 'true',
        "rules" => $this->base_admin->bogo_deal->utils->listAllRules()
    );

} else {
    $result = array("status" => 'false');
}


echo json_encode($result, JSON_UNESCAPED_UNICODE);