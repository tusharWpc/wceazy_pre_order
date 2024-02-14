<?php

$result = array();
//$this->base_client->address_book->utils->
if(isset($_REQUEST['name'])) {

    $address_name = sanitize_text_field($_REQUEST['name']);
    $type          = $this->base_client->address_book->utils->get_address_type( $address_name );
    $customer_id   = get_current_user_id();
    $address_book  = $this->base_client->address_book->utils->get_address_book( $customer_id, $type );

    $primary_address_name = $type;

    // Loop through and swap values between names.
    foreach ( $address_book[ $primary_address_name ] as $field => $value ) {
        $alt_field = preg_replace( '/^[^_]*_\s*/', $address_name . '_', $field );
        update_user_meta( $customer_id, $field, $address_book[ $address_name ][ $alt_field ] );
    }

    foreach ( $address_book[ $address_name ] as $field => $value ) {
        $primary_field = preg_replace( '/^[^_]*_\s*/', $primary_address_name . '_', $field );
        update_user_meta( $customer_id, $field, $address_book[ $primary_address_name ][ $primary_field ] );
    }

    $result = array("status" => 'true');
}else {
    $result = array("status" => 'false');
}


echo json_encode ($result, JSON_UNESCAPED_UNICODE);