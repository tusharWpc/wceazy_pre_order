<?php

// If this file is called directly, abort.
if (!defined ('WPINC')) {
    die;
}


if (!class_exists ('WcEazyAddressBookUtils')) {
    class WcEazyAddressBookUtils
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
                update_option( 'wceazy_address_book_settings', json_encode($post_data) );
            }
        }







        public function wc_address_book_add_to_menu( $items ) {

            $wceazy_address_book_settings = get_option('wceazy_address_book_settings', False);
            $wceazy_ab_settings = $wceazy_address_book_settings ? json_decode($wceazy_address_book_settings, true) : array();
            $wceazy_ab_enable_billing_address_book = isset($wceazy_ab_settings["enable_billing_address_book"]) ? $wceazy_ab_settings["enable_billing_address_book"] : "yes";
            $wceazy_ab_enable_shipping_address_book = isset($wceazy_ab_settings["enable_shipping_address_book"]) ? $wceazy_ab_settings["enable_shipping_address_book"] : "yes";

            $wceazy_ab_menu_title = isset($wceazy_ab_settings["menu_title"]) ? $wceazy_ab_settings["menu_title"] : "Address Book";

            if($wceazy_ab_enable_billing_address_book == "yes" || $wceazy_ab_enable_shipping_address_book == "yes"){
                foreach ( $items as $key => $value ) {
                    if ( 'edit-address' === $key ) {
                        $items[$key] = $wceazy_ab_menu_title;
                    }
                }
            }
            return $items;
        }
        public function wc_address_book_page( $type ) {
            include 'template.php';
        }


        public function update_address_names( $user_id, $name ) {
            if ( ! wp_verify_nonce( $this->nonce_value( 'woocommerce-edit-address-nonce' ), 'woocommerce-edit_address' ) ) {
                return;
            }

            $type = $name;
            if ( isset( $_GET['address-book'] ) ) {
                $name = trim( sanitize_text_field( wp_unslash( $_GET['address-book'] ) ), '/' );
            }
            $this->add_address_name( $user_id, $name, $type );
        }



        public function get_address_book( $user_id, $type ) {
            $countries = new WC_Countries();
            if ( ! isset( $country ) ) {
                $country = $countries->get_base_country();
            }
            if ( ! isset( $user_id ) ) {
                $user_id = get_current_user_id();
            }
            $address_names = $this->get_address_names( $user_id, $type );
            $address_fields = WC()->countries->get_address_fields( $country, $type . '_' );
            $address_keys = array_keys( $address_fields );
            $address_book = array();
            if ( ! empty( $address_names ) ) {
                foreach ( $address_names as $name ) {
                    if ( strpos( $name, $type ) === false ) {
                        continue;
                    }
                    $address = array();
                    foreach ( $address_keys as $field ) {
                        $field = str_replace( $type, '', $field );
                        $address[ $name . $field ] = get_user_meta( $user_id, $name . $field, true );
                    }
                    $address_book[ $name ] = $address;
                }
            }
            return $address_book;
        }


        public function get_address_names( $user_id, $type ) {
            if ( ! isset( $user_id ) ) {
                $user_id = get_current_user_id();
            }
            $address_names = get_user_meta( $user_id, 'wceazy_address_book_' . $type, true );
            if ( empty( $address_names ) ) {
                if ( 'shipping' === $type ) {
                    $address_names = get_user_meta( $user_id, 'wceazy_address_book', true );
                    if ( is_array( $address_names ) ) {
                        $this->save_address_names( $user_id, $address_names, 'shipping' );
                        return $address_names;
                    }
                    $shipping_address = get_user_meta( $user_id, 'shipping_address_1', true );
                    if ( ! empty( $shipping_address ) ) {
                        return array( 'shipping' );
                    }
                }
                if ( 'billing' === $type ) {
                    $billing_address = get_user_meta( $user_id, 'billing_address_1', true );
                    if ( ! empty( $billing_address ) ) {
                        return array( 'billing' );
                    }
                }
                return array();
            }
            return $address_names;
        }

        private function add_address_name( $user_id, $name, $type ) {
            $address_names = $this->get_address_names( $user_id, $type );
            if ( ! is_array( $address_names ) || empty( $address_names ) ) {
                $address_names = array();
            }
            if ( ! in_array( $name, $address_names, true ) ) {
                array_push( $address_names, $name );
                $this->save_address_names( $user_id, $address_names, $type );
            }
        }

        public function redirect_on_save( $user_id, $name ) {
            if ( ! is_admin() && ! defined( 'DOING_AJAX' ) ) {
                wp_safe_redirect( wc_get_account_endpoint_url( 'edit-address' ) );
                exit;
            }
        }

        public function save_address_names( $user_id, $new_value, $type ) {
            if ( ! isset( $new_value ) && ! isset( $type ) ) {
                return;
            }
            update_user_meta( $user_id, 'wceazy_address_book_' . $type, $new_value );
        }



        public function get_address_book_endpoint_url( $address_book, $type ) {
            $url = wc_get_endpoint_url( 'edit-address', $type, get_permalink() );
            return add_query_arg( 'address-book', $address_book, $url );
        }

        public function set_new_address_name( $address_names, $type ) {
            if ( ! empty( $address_names ) && is_array( $address_names ) ) {
                $counter = 2;
                do {
                    $name = $type . $counter;
                    $counter++;
                } while ( in_array( $name, $address_names, true ) );
            } else {
                $name = $type;
            }
            return $name;
        }


        public function get_address_type( $name ) {
            $type = preg_replace( '/\d/', '', $name );
            return $type;
        }
        public function replace_address_key( $address_fields ) {
            if ( isset( $_GET['address-book'] ) ) {
                $address_book = sanitize_text_field( wp_unslash( $_GET['address-book'] ) );

                $type = $this->get_address_type( $address_book );

                $user_id       = get_current_user_id();
                $address_names = $this->get_address_names( $user_id, $type );

                if ( in_array( $address_book, $address_names, true ) ) {
                    $name = $address_book;
                } else {
                    $name = trim( $address_book, '/' );
                }
                foreach ( $address_fields as $key => $value ) {
                    $new_key = str_replace( $type, esc_attr( $name ), $key );

                    $address_fields[ $new_key ] = $value;
                    unset( $address_fields[ $key ] );
                }
            }
            return $address_fields;
        }
        private function nonce_value( $name ) {
            if ( ! isset( $_REQUEST[ $name ] ) ) {
                return '';
            }
            return $_REQUEST[ $name ];
        }
        public function before_save_address() {
            if ( ! wp_verify_nonce( $this->nonce_value( 'woocommerce-edit-address-nonce' ), 'woocommerce-edit_address' ) ) {
                return;
            }
            if ( empty( $_POST['action'] ) || 'edit_address' !== $_POST['action'] ) {
                return;
            }
            if ( isset( $_GET['address-book'] ) ) {
                $name = trim( sanitize_text_field( wp_unslash( $_GET['address-book'] ) ), '/' );
                if ( isset( $_POST[ $name . '_country' ] ) ) {
                    $type                        = $this->get_address_type( $name );
                    $_POST[ $type . '_country' ] = sanitize_text_field( wp_unslash( $_POST[ $name . '_country' ] ) );
                }
            }
        }












        public function address_select_label( $address, $name ) {
            $label = '';

            if ( ! empty( $address[ $name . '_first_name' ] ) ) {
                $label .= $address[ $name . '_first_name' ];
            }
            if ( ! empty( $address[ $name . '_last_name' ] ) ) {
                if ( ! empty( $label ) ) {
                    $label .= ' ';
                }
                $label .= $address[ $name . '_last_name' ];
            }
            if ( ! empty( $address[ $name . '_address_1' ] ) ) {
                if ( ! empty( $label ) ) {
                    $label .= ', ';
                }
                $label .= $address[ $name . '_address_1' ];
            }
            if ( ! empty( $address[ $name . '_address_2' ] ) ) {
                if ( ! empty( $label ) ) {
                    $label .= ', ';
                }
                $label .= $address[ $name . '_address_2' ];
            }
            if ( ! empty( $address[ $name . '_city' ] ) ) {
                if ( ! empty( $label ) ) {
                    $label .= ', ';
                }
                $label .= $address[ $name . '_city' ];
            }
            if ( ! empty( $address[ $name . '_state' ] ) ) {
                if ( ! empty( $label ) ) {
                    $label .= ', ';
                }
                $label .= $address[ $name . '_state' ];
            }


            return $label;
        }



        public function checkout_address_select_field( $fields ) {

            $wceazy_address_book_settings = get_option('wceazy_address_book_settings', False);
            $wceazy_ab_settings = $wceazy_address_book_settings ? json_decode($wceazy_address_book_settings, true) : array();
            $wceazy_ab_enable_billing_address_book_checkout = isset($wceazy_ab_settings["enable_billing_address_book_checkout"]) ? $wceazy_ab_settings["enable_billing_address_book_checkout"] : "yes";
            $wceazy_ab_enable_shipping_address_book_checkout = isset($wceazy_ab_settings["enable_shipping_address_book_checkout"]) ? $wceazy_ab_settings["enable_shipping_address_book_checkout"] : "yes";

            $wceazy_ab_checkout_field_label = isset($wceazy_ab_settings["checkout_field_label"]) ? $wceazy_ab_settings["checkout_field_label"] : "Select Address";


            if ( is_user_logged_in() ) {
                foreach ( $fields as $type => $address_fields ) {
                    if (  ('billing' === $type && $wceazy_ab_enable_billing_address_book_checkout == "yes")
                        ||  ('shipping' === $type && $wceazy_ab_enable_shipping_address_book_checkout == "yes") ) {

                        $address_book = $this->get_address_book( get_current_user_id(), $type );

                        $address_selector = array();
                        $address_selector[ $type . '_address_book' ] = array(
                            'type'     => 'select',
                            'class'    => array( 'form-row-wide', 'address_book' ),
                            'label'    => $wceazy_ab_checkout_field_label,
                            'order'    => -1,
                            'priority' => -1,
                        );

                        if ( ! empty( $address_book ) && false !== $address_book ) {
                            foreach ( $address_book as $name => $address ) {
                                if ( ! empty( $address[ $name . '_address_1' ] ) ) {
                                    $address_selector[ $type . '_address_book' ]['options'][ $name ] = $this->address_select_label( $address, $name );
                                }
                            }

                            $address_selector[ $type . '_address_book' ]['options']['add_new'] = 'Add New Address';

                            $address_selector[ $type . '_address_book' ]['default'] = $type;

                            $fields[ $type ] = $address_selector + $fields[ $type ];
                        }
                    }
                }
            }

            return $fields;
        }

    }
}