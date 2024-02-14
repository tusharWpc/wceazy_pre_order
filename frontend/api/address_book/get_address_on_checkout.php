<?php

$result = array();
//$this->base_client->address_book->utils->
if(isset($_REQUEST['name'])) {

    $field_data = array();
    $address_name = sanitize_text_field($_REQUEST['name']);
    $type          = $this->base_client->address_book->utils->get_address_type( $address_name );
    $customer_id   = get_current_user_id();
    $address_book  = $this->base_client->address_book->utils->get_address_book( $customer_id, $type );


    global $woocommerce;
    if ( 'billing' === $type ) {
        $countries = $woocommerce->countries->get_allowed_countries();
    } elseif ( 'shipping' === $type ) {
        $countries = $woocommerce->countries->get_shipping_countries();
    }


    if ( 'add_new' !== $address_name ) {
        foreach ( $address_book[ $address_name ] as $field => $value ) {
            $field = preg_replace( '/^[^_]*_\s*/', $type . '_', $field );
            $field_data[] = array("key" => $field, "value" => $value);
        }
    } else {
        // If only one country is available, include it in the blank form.
        if ( 1 === count( $countries ) ) {
            $field_data[] = array("key" => $type . '_country', "value" => key( $countries ));
        }
    }

    $result = array("status" => 'true', "field_data" => $field_data);
}else {
    $result = array("status" => 'false');
}


echo json_encode ($result, JSON_UNESCAPED_UNICODE);