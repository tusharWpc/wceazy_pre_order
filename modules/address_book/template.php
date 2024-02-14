<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

$wceazy_address_book_settings = get_option('wceazy_address_book_settings', False);
$wceazy_ab_settings = $wceazy_address_book_settings ? json_decode($wceazy_address_book_settings, true) : array();
$wceazy_ab_enable_billing_address_book = isset($wceazy_ab_settings["enable_billing_address_book"]) ? $wceazy_ab_settings["enable_billing_address_book"] : "yes";
$wceazy_ab_enable_shipping_address_book = isset($wceazy_ab_settings["enable_shipping_address_book"]) ? $wceazy_ab_settings["enable_shipping_address_book"] : "yes";

$wceazy_ab_billing_headline_text = isset($wceazy_ab_settings["billing_headline_text"]) ? $wceazy_ab_settings["billing_headline_text"] : "Billing Address Book";
$wceazy_ab_shipping_headline_text = isset($wceazy_ab_settings["shipping_headline_text"]) ? $wceazy_ab_settings["shipping_headline_text"] : "Shipping Address Book";
$wceazy_ab_billing_add_btn_text = isset($wceazy_ab_settings["billing_add_btn_text"]) ? $wceazy_ab_settings["billing_add_btn_text"] : "Add New";
$wceazy_ab_shipping_add_btn_text = isset($wceazy_ab_settings["shipping_add_btn_text"]) ? $wceazy_ab_settings["shipping_add_btn_text"] : "Add New";
$wceazy_ab_billing_empty_text = isset($wceazy_ab_settings["billing_empty_text"]) ? $wceazy_ab_settings["billing_empty_text"] : "No additional billing address has been created.";
$wceazy_ab_shipping_empty_text = isset($wceazy_ab_settings["shipping_empty_text"]) ? $wceazy_ab_settings["shipping_empty_text"] : "No additional shipping address has been created.";
$wceazy_ab_edit_text = isset($wceazy_ab_settings["edit_text"]) ? $wceazy_ab_settings["edit_text"] : "Edit";
$wceazy_ab_delete_text = isset($wceazy_ab_settings["delete_text"]) ? $wceazy_ab_settings["delete_text"] : "Delete";
$wceazy_ab_make_primary_text = isset($wceazy_ab_settings["make_primary_text"]) ? $wceazy_ab_settings["make_primary_text"] : "Make Primary";

$wceazy_ab_add_btn_bg_color = isset($wceazy_ab_settings["add_btn_bg_color"]) ? $wceazy_ab_settings["add_btn_bg_color"] : "#6E32C9";
$wceazy_ab_add_btn_text_color = isset($wceazy_ab_settings["add_btn_text_color"]) ? $wceazy_ab_settings["add_btn_text_color"] : "#ffffff";
$wceazy_ab_add_btn_bg_hover_color = isset($wceazy_ab_settings["add_btn_bg_hover_color"]) ? $wceazy_ab_settings["add_btn_bg_hover_color"] : "#ffffff";
$wceazy_ab_add_btn_text_hover_color = isset($wceazy_ab_settings["add_btn_text_hover_color"]) ? $wceazy_ab_settings["add_btn_text_hover_color"] : "#6E32C9";
$wceazy_ab_add_btn_border_hover_color = isset($wceazy_ab_settings["add_btn_border_hover_color"]) ? $wceazy_ab_settings["add_btn_border_hover_color"] : "#6E32C9";
$wceazy_ab_card_bg_color = isset($wceazy_ab_settings["card_bg_color"]) ? $wceazy_ab_settings["card_bg_color"] : "#ffffff";
$wceazy_ab_card_border_color = isset($wceazy_ab_settings["card_border_color"]) ? $wceazy_ab_settings["card_border_color"] : "#e2e2ef";
$wceazy_ab_card_text_color = isset($wceazy_ab_settings["card_text_color"]) ? $wceazy_ab_settings["card_text_color"] : "#6d6d6d";
$wceazy_ab_card_footer_color = isset($wceazy_ab_settings["card_footer_color"]) ? $wceazy_ab_settings["card_footer_color"] : "#fafbff";
$wceazy_ab_card_link_text_color = isset($wceazy_ab_settings["card_link_text_color"]) ? $wceazy_ab_settings["card_link_text_color"] : "#6E32C9";


$unique_id = rand();
?>


    <style>
        #wceazy_frontend_ab_billing_<?php echo esc_attr($unique_id);?>,
        #wceazy_frontend_ab_shipping_<?php echo esc_attr($unique_id);?>{
            --wceazy_ab_add_btn_bg_color: <?php echo $wceazy_ab_add_btn_bg_color; ?>;
            --wceazy_ab_add_btn_text_color: <?php echo $wceazy_ab_add_btn_text_color; ?>;
            --wceazy_ab_add_btn_bg_hover_color: <?php echo $wceazy_ab_add_btn_bg_hover_color; ?>;
            --wceazy_ab_add_btn_text_hover_color: <?php echo $wceazy_ab_add_btn_text_hover_color; ?>;
            --wceazy_ab_add_btn_border_hover_color: <?php echo $wceazy_ab_add_btn_border_hover_color; ?>;
            --wceazy_ab_card_bg_color: <?php echo $wceazy_ab_card_bg_color; ?>;
            --wceazy_ab_card_border_color: <?php echo $wceazy_ab_card_border_color; ?>;
            --wceazy_ab_card_text_color: <?php echo $wceazy_ab_card_text_color; ?>;
            --wceazy_ab_card_footer_color: <?php echo $wceazy_ab_card_footer_color; ?>;
            --wceazy_ab_card_link_text_color: <?php echo $wceazy_ab_card_link_text_color; ?>;
        }
    </style>

<?php
$woo_address_book_billing_address_book  = $this->get_address_book( get_current_user_id(), 'billing' );
$woo_address_book_shipping_address_book = $this->get_address_book( get_current_user_id(), 'shipping' );

// Do not display on address edit pages.
if ( ! $type ) {


    $woo_address_book_billing_address = get_user_meta( get_current_user_id(), 'billing_address_1', true );

    // Only display if primary addresses are set and not on an edit page.
    if ( ! empty( $woo_address_book_billing_address ) && $wceazy_ab_enable_billing_address_book == "yes") {
        ?>

        <div class="wceazy_address_book_address_section" id="wceazy_frontend_ab_billing_<?php echo esc_attr($unique_id);?>">
            <header>
                <h3><?php echo $wceazy_ab_billing_headline_text; ?></h3>
                <a href="<?php echo esc_url( $this->get_address_book_endpoint_url( $this->set_new_address_name( $this->get_address_names( get_current_user_id(), 'billing' ), 'billing' ), 'billing' ) ); ?>"><?php echo $wceazy_ab_billing_add_btn_text; ?></a>
            </header>

            <div class="wceazy_address_book_address_card_container">
                <?php
                $count_billing = 0;
                foreach ( $woo_address_book_billing_address_book as $woo_address_book_name => $woo_address_book_fields ) {
                    if ( 'billing' === $woo_address_book_name ) { continue; }

                    $woo_address_book_address = apply_filters('woocommerce_my_account_my_address_formatted_address',
                        array(
                            'first_name' => get_user_meta( get_current_user_id(), $woo_address_book_name . '_first_name', true ),
                            'last_name'  => get_user_meta( get_current_user_id(), $woo_address_book_name . '_last_name', true ),
                            'company'    => get_user_meta( get_current_user_id(), $woo_address_book_name . '_company', true ),
                            'address_1'  => get_user_meta( get_current_user_id(), $woo_address_book_name . '_address_1', true ),
                            'address_2'  => get_user_meta( get_current_user_id(), $woo_address_book_name . '_address_2', true ),
                            'city'       => get_user_meta( get_current_user_id(), $woo_address_book_name . '_city', true ),
                            'state'      => get_user_meta( get_current_user_id(), $woo_address_book_name . '_state', true ),
                            'postcode'   => get_user_meta( get_current_user_id(), $woo_address_book_name . '_postcode', true ),
                            'country'    => get_user_meta( get_current_user_id(), $woo_address_book_name . '_country', true ),
                        ),
                        get_current_user_id(), $woo_address_book_name);

                    $woo_address_book_formatted_address = WC()->countries->get_formatted_address( $woo_address_book_address );

                    if ( $woo_address_book_formatted_address ) { ?>

                        <div class="wceazy_address_book_address_card">
                            <div class="wceazy_address_book_address_card_body">
                                <?php echo wp_kses( $woo_address_book_formatted_address, array( 'br' => array() ) ); ?>
                            </div>
                            <div class="wceazy_address_book_address_card_footer">
                                <a href="<?php echo esc_url( $this->get_address_book_endpoint_url( $woo_address_book_name, 'billing' ) ); ?>" class="wceazy_address_book_address_edit"><?php echo $wceazy_ab_edit_text; ?></a>
                                <a onclick="wceazy_frontend_address_book_delete(this, `<?php echo esc_attr( $woo_address_book_name ); ?>`)" class="wceazy_address_book_address_delete"><?php echo $wceazy_ab_delete_text; ?></a>
                                <a onclick="wceazy_frontend_address_book_make_primary(this, `<?php echo esc_attr( $woo_address_book_name ); ?>`)" class="wceazy_address_book_address_make_primary"><?php echo $wceazy_ab_make_primary_text; ?></a>
                            </div>
                        </div>

                    <?php $count_billing++; }
                }


                if($count_billing == 0){ ?>
                    <p><?php echo $wceazy_ab_billing_empty_text; ?></p>
                <?php } ?>
            </div>
        </div>
        <?php
    }




    $woo_address_book_shipping_address = get_user_meta( get_current_user_id(), 'shipping_address_1', true );

    // Only display if primary addresses are set and not on an edit page.
    if ( !empty( $woo_address_book_shipping_address ) && $wceazy_ab_enable_shipping_address_book == "yes" ) { ?>

        <div class="wceazy_address_book_address_section" id="wceazy_frontend_ab_shipping_<?php echo esc_attr($unique_id);?>">

            <header>
                <h3><?php echo $wceazy_ab_shipping_headline_text; ?></h3>
                <a href="<?php echo esc_url( $this->get_address_book_endpoint_url( $this->set_new_address_name( $this->get_address_names( get_current_user_id(), 'shipping' ), 'shipping' ), 'shipping' ) ); ?>"><?php echo $wceazy_ab_shipping_add_btn_text; ?></a>
            </header>


            <div class="wceazy_address_book_address_card_container">
                <?php
                $count_shipping = 0;
                foreach ( $woo_address_book_shipping_address_book as $woo_address_book_name => $woo_address_book_fields ) {

                    if ( 'shipping' === $woo_address_book_name ) { continue; }

                    $woo_address_book_address = apply_filters('woocommerce_my_account_my_address_formatted_address',
                        array(
                            'first_name' => get_user_meta( get_current_user_id(), $woo_address_book_name . '_first_name', true ),
                            'last_name'  => get_user_meta( get_current_user_id(), $woo_address_book_name . '_last_name', true ),
                            'company'    => get_user_meta( get_current_user_id(), $woo_address_book_name . '_company', true ),
                            'address_1'  => get_user_meta( get_current_user_id(), $woo_address_book_name . '_address_1', true ),
                            'address_2'  => get_user_meta( get_current_user_id(), $woo_address_book_name . '_address_2', true ),
                            'city'       => get_user_meta( get_current_user_id(), $woo_address_book_name . '_city', true ),
                            'state'      => get_user_meta( get_current_user_id(), $woo_address_book_name . '_state', true ),
                            'postcode'   => get_user_meta( get_current_user_id(), $woo_address_book_name . '_postcode', true ),
                            'country'    => get_user_meta( get_current_user_id(), $woo_address_book_name . '_country', true ),
                        ),
                        get_current_user_id(), $woo_address_book_name);

                    $woo_address_book_formatted_address = WC()->countries->get_formatted_address( $woo_address_book_address );

                    if ( $woo_address_book_formatted_address ) {
                        ?>
                        <div class="wceazy_address_book_address_card">
                            <div class="wceazy_address_book_address_card_body">
                                <?php echo wp_kses( $woo_address_book_formatted_address, array( 'br' => array() ) ); ?>
                            </div>
                            <div class="wceazy_address_book_address_card_footer">
                                <a href="<?php echo esc_url( $this->get_address_book_endpoint_url( $woo_address_book_name, 'shipping' ) ); ?>" class="wceazy_address_book_address_edit"><?php echo $wceazy_ab_edit_text; ?></a>
                                <a onclick="wceazy_frontend_address_book_delete(this, `<?php echo esc_attr( $woo_address_book_name ); ?>`)" class="wceazy_address_book_address_delete"><?php echo $wceazy_ab_delete_text; ?></a>
                                <a onclick="wceazy_frontend_address_book_make_primary(this, `<?php echo esc_attr( $woo_address_book_name ); ?>`)" class="wceazy_address_book_address_make_primary"><?php echo $wceazy_ab_make_primary_text; ?></a>
                            </div>
                        </div>
                    <?php $count_shipping++; }
                }

                if($count_shipping == 0){ ?>
                    <p><?php echo $wceazy_ab_shipping_empty_text; ?></p>
                <?php } ?>

            </div>
        </div>
        <?php
    }

}
