<?php

$result = array();

if(isset($_REQUEST['name'])) {

    $address_name = sanitize_text_field($_REQUEST['name']);
    $type          = $this->base_client->address_book->utils->get_address_type( $address_name );
    $customer_id   = get_current_user_id();
    $address_book  = $this->base_client->address_book->utils->get_address_book( $customer_id, $type );
    $address_names = $this->base_client->address_book->utils->get_address_names( $customer_id, $type );

    foreach ( $address_book as $name => $address ) {
        if ( $address_name === $name ) {
            // Remove address from address book.
            $key = array_search( $name, $address_names, true );
            if ( ( $key ) !== false ) {
                unset( $address_names[ $key ] );
            }
            $this->base_client->address_book->utils->save_address_names( $customer_id, $address_names, $type );
            // Remove specific address values.
            foreach ( $address as $field => $value ) {
                delete_user_meta( $customer_id, $field );
            }
            break;
        }
    }

    $result = array("status" => 'true');
}else {
    $result = array("status" => 'false');
}


echo json_encode ($result, JSON_UNESCAPED_UNICODE);