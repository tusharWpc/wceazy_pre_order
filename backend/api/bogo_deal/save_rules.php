<?php

$result = array();

/* Check if user has admin capabilities */
if (current_user_can('manage_options')) {

    if(isset($_REQUEST['data'])){
        $rules = sanitize_text_field($_REQUEST['data']);
        $rules = empty($rules) ? " " : $rules;
        $this->base_admin->bogo_deal->utils->saveAllRules($rules);
        $result = array("status" => 'true');
    }else {
        $result = array("status" => 'false');
    }

} else {
    $result = array("status" => 'false');
}


echo json_encode($result, JSON_UNESCAPED_UNICODE);