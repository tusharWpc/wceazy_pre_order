<?php

// If this file is called directly, abort.
if (!defined ('WPINC')) {
    die;
}

if (!class_exists ('WcEazyPdfInvoiceUtils')) {
    class WcEazyPdfInvoiceUtils
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
                update_option( 'wceazy_pdf_invoice_settings', json_encode($post_data) );
            }
        }



        public function wceazy_add_custom_order_status_actions_button_css() {
            echo '<style>.wc-action-button-wceazy_pdf_invoice_btn::after { font-family: woocommerce !important; content: "\e02e" !important; }</style>';
            echo '<style>.wc-action-button-wceazy_pdf_invoice_pslip_btn::after { font-family: woocommerce !important; content: "\e01a" !important; }</style>';
        }

        public function wceazy_edit_shop_order_action_column($actions, $order){

            $wceazy_pdf_invoice_settings = get_option('wceazy_pdf_invoice_settings', False);
            $wceazy_pi_settings = $wceazy_pdf_invoice_settings ? json_decode($wceazy_pdf_invoice_settings, true) : array();

            $wceazy_pi_deactivate_invoice = isset($wceazy_pi_settings["deactivate_invoice"]) ? $wceazy_pi_settings["deactivate_invoice"] : "yes";
            $wceazy_pi_deactivate_shipping_label = isset($wceazy_pi_settings["deactivate_shipping_label"]) ? $wceazy_pi_settings["deactivate_shipping_label"] : "yes";

            $wceazy_pi_disabled_status = isset($wceazy_pi_settings["disabled_status"]) ? explode(",",$wceazy_pi_settings["disabled_status"]) : array();
            $disabled_status = str_replace ('wc-', '', $wceazy_pi_disabled_status);

            $disabled_statuses = array_map( function($status){
                $status = 'wc-' === substr( $status, 0, 3 ) ? substr( $status, 3 ) : $status;
                return $status;
            }, $disabled_status );

            if ( !$order->has_status( $disabled_statuses ) ) {
                if($wceazy_pi_deactivate_invoice == "yes"){
                    $actions["wceazy_pdf_invoice_btn"] = array(
                        'url'       => wp_nonce_url( admin_url( 'admin-ajax.php?action=wceazy_pdf_invoice_generate_invoice&order_id=' . $order->get_id() )),
                        'name'      => "Print Invoice",
                        'action'    => 'wceazy_pdf_invoice_btn',
                    );
                }
                if($wceazy_pi_deactivate_shipping_label == "yes"){
                    $actions["wceazy_pdf_invoice_pslip_btn"] = array(
                        'url'       => wp_nonce_url( admin_url( 'admin-ajax.php?action=wceazy_pdf_invoice_generate_shipping_label&order_id=' . $order->get_id() )),
                        'name'      => "Download Shipping Slip",
                        'action'    => 'wceazy_pdf_invoice_pslip_btn',
                    );
                }

            }
            return $actions;
        }


        public function wceazy_generate_pdf_file($html_content){
            include_once WCEAZY_PATH . "modules/pdf_invoice/library/tcpdf.php";
            $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, "A4", true, 'UTF-8', false);
            $pdf->setCreator("wcEazy");
            $pdf->setAuthor("wcEazy");
            $pdf->setTitle("wcEazy");
            $pdf->setSubject("wcEazy");
            $pdf->setLeftMargin(0);
            $pdf->setRightMargin(0);
            $pdf->setTopMargin(0);
            $pdf->setCellPaddings(15, 15, 15, 15);
            $pdf->setHeaderData('', 0, '', '', array(0,0,0), array(255,255,255));
            $pdf->setFooterData(array(0,0,0), array(255,255,255));
            $pdf->AddPage();
            $pdf->setAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
            $tagvs = array(
                'p' => array(
                    0 => array('h' => 0, 'n' => 0),
                    1 => array('h' => 0, 'n' => 0)
                )
            );
            $pdf->setHtmlVSpace($tagvs);
            $pdf->writeHTML($html_content, true, false, true, false, '');
            return $pdf;
        }

        public function generate_invoice_number($order_number = null){

            $wceazy_pdf_invoice_settings = get_option('wceazy_pdf_invoice_settings', False);
            $wceazy_pi_settings = $wceazy_pdf_invoice_settings ? json_decode($wceazy_pdf_invoice_settings, true) : array();

            $wceazy_pi_ordernumber_as_invoice_number = isset($wceazy_pi_settings["ordernumber_as_invoice_number"]) ? $wceazy_pi_settings["ordernumber_as_invoice_number"] : "no";
            $wceazy_pi_invoice_start_number = isset($wceazy_pi_settings["invoice_start_number"]) ? $wceazy_pi_settings["invoice_start_number"] : "1001";
            $wceazy_pi_invoice_prefix = isset($wceazy_pi_settings["invoice_prefix"]) ? $wceazy_pi_settings["invoice_prefix"] : "";
            $wceazy_pi_invoice_suffix = isset($wceazy_pi_settings["invoice_suffix"]) ? $wceazy_pi_settings["invoice_suffix"] : "";

            $invoice_number = "";

            if($wceazy_pi_ordernumber_as_invoice_number == "yes"){
                $invoice_number = $order_number;
            }else{
                $invoice_number = $wceazy_pi_invoice_start_number.$order_number;
            }

            $invoice_number = $wceazy_pi_invoice_prefix.$invoice_number.$wceazy_pi_invoice_suffix;

            return $invoice_number;
        }

        public function wceazy_add_ssn_vat_fields($checkout){
            $wceazy_pdf_invoice_settings = get_option('wceazy_pdf_invoice_settings', False);
            $wceazy_pi_settings = $wceazy_pdf_invoice_settings ? json_decode($wceazy_pdf_invoice_settings, true) : array();

            $wceazy_pi_enable_vat_ssn = isset($wceazy_pi_settings["enable_vat_ssn"]) ? $wceazy_pi_settings["enable_vat_ssn"] : "no";

            if($wceazy_pi_enable_vat_ssn == "yes"){
                woocommerce_form_field('wceazy_pdf_invoice_ssn_id', array(
                        'type'          => 'text',
                        'required'	=> false,
                        'label'         => 'Enter SSN Number'
                    ), $checkout->get_value( 'wceazy_pdf_invoice_ssn_id' ));

                woocommerce_form_field('wceazy_pdf_invoice_vat_id', array(
                    'type'          => 'text',
                    'required'	=> false,
                    'label'         => 'Enter VAT ID'
                ), $checkout->get_value( 'wceazy_pdf_invoice_vat_id' ));
            }
        }
        public function wceazy_save_ssn_vat_fields($order_id){
            $wceazy_pdf_invoice_settings = get_option('wceazy_pdf_invoice_settings', False);
            $wceazy_pi_settings = $wceazy_pdf_invoice_settings ? json_decode($wceazy_pdf_invoice_settings, true) : array();

            $wceazy_pi_enable_vat_ssn = isset($wceazy_pi_settings["enable_vat_ssn"]) ? $wceazy_pi_settings["enable_vat_ssn"] : "no";

            if($wceazy_pi_enable_vat_ssn == "yes"){
                if( ! empty( $_POST[ 'wceazy_pdf_invoice_ssn_id' ] )) {
                    update_post_meta( $order_id, 'wceazy_pdf_invoice_ssn_id', wc_clean( $_POST[ 'wceazy_pdf_invoice_ssn_id' ] ) );
                }
                if( ! empty( $_POST[ 'wceazy_pdf_invoice_vat_id' ] )) {
                    update_post_meta( $order_id, 'wceazy_pdf_invoice_vat_id',  wc_clean( $_POST[ 'wceazy_pdf_invoice_vat_id' ] ) );
                }
            }
        }

        public function wceazy_generate_invoice_html($order_id){
            $wceazy_pdf_invoice_settings = get_option('wceazy_pdf_invoice_settings', False);
            $wceazy_pi_settings = $wceazy_pdf_invoice_settings ? json_decode($wceazy_pdf_invoice_settings, true) : array();

            $wceazy_pi_shop_logo = isset($wceazy_pi_settings["shop_logo"]) ? $wceazy_pi_settings["shop_logo"] : WCEAZY_IMG_DIR."modules/pdf_invoice/no-image.jpg";
            $wceazy_pi_footer_info = isset($wceazy_pi_settings["footer_info"]) ? $wceazy_pi_settings["footer_info"] : "";
            $wceazy_pi_sender_name = isset($wceazy_pi_settings["sender_name"]) ? $wceazy_pi_settings["sender_name"] : get_option( 'blogname' );
            $wceazy_pi_address_line_one = isset($wceazy_pi_settings["address_line_one"]) ? $wceazy_pi_settings["address_line_one"] : get_option('woocommerce_store_address');
            $wceazy_pi_address_city = isset($wceazy_pi_settings["address_city"]) ? $wceazy_pi_settings["address_city"] : get_option('woocommerce_store_city');
            $wceazy_pi_postal_code = isset($wceazy_pi_settings["postal_code"]) ? $wceazy_pi_settings["postal_code"] : get_option('woocommerce_store_postcode');
            $wceazy_pi_country_state = isset($wceazy_pi_settings["country_state"]) ? explode(":", $wceazy_pi_settings["country_state"]) : "";
            $country = isset($wceazy_pi_country_state[0]) ? $wceazy_pi_country_state[0] : array_search(WC()->countries->countries[WC()->countries->get_base_country()], WC()->countries->countries);
            $state = isset($wceazy_pi_country_state[1]) ? $wceazy_pi_country_state[1] : WC()->countries->get_base_state();

            $wceazy_pi_enable_invoice_title = isset($wceazy_pi_settings["enable_invoice_title"]) ? $wceazy_pi_settings["enable_invoice_title"] : "yes";
            $wceazy_pi_enable_shop_logo = isset($wceazy_pi_settings["enable_shop_logo"]) ? $wceazy_pi_settings["enable_shop_logo"] : "yes";
            $wceazy_pi_enable_invoice_number = isset($wceazy_pi_settings["enable_invoice_number"]) ? $wceazy_pi_settings["enable_invoice_number"] : "yes";
            $wceazy_pi_enable_order_number = isset($wceazy_pi_settings["enable_order_number"]) ? $wceazy_pi_settings["enable_order_number"] : "yes";
            $wceazy_pi_enable_invoice_date = isset($wceazy_pi_settings["enable_invoice_date"]) ? $wceazy_pi_settings["enable_invoice_date"] : "yes";
            $wceazy_pi_enable_order_date = isset($wceazy_pi_settings["enable_order_date"]) ? $wceazy_pi_settings["enable_order_date"] : "yes";
            $wceazy_pi_enable_ssn_id = isset($wceazy_pi_settings["enable_ssn_id"]) ? $wceazy_pi_settings["enable_ssn_id"] : "no";
            $wceazy_pi_enable_vat_id = isset($wceazy_pi_settings["enable_vat_id"]) ? $wceazy_pi_settings["enable_vat_id"] : "no";
            $wceazy_pi_enable_from_address = isset($wceazy_pi_settings["enable_from_address"]) ? $wceazy_pi_settings["enable_from_address"] : "yes";
            $wceazy_pi_enable_billing_address = isset($wceazy_pi_settings["enable_billing_address"]) ? $wceazy_pi_settings["enable_billing_address"] : "yes";
            $wceazy_pi_enable_shipping_address = isset($wceazy_pi_settings["enable_shipping_address"]) ? $wceazy_pi_settings["enable_shipping_address"] : "yes";
            $wceazy_pi_enable_email = isset($wceazy_pi_settings["enable_email"]) ? $wceazy_pi_settings["enable_email"] : "yes";
            $wceazy_pi_enable_phone = isset($wceazy_pi_settings["enable_phone"]) ? $wceazy_pi_settings["enable_phone"] : "yes";
            $wceazy_pi_enable_payment_method = isset($wceazy_pi_settings["enable_payment_method"]) ? $wceazy_pi_settings["enable_payment_method"] : "yes";
            $wceazy_pi_enable_customer_note = isset($wceazy_pi_settings["enable_customer_note"]) ? $wceazy_pi_settings["enable_customer_note"] : "yes";
            $wceazy_pi_enable_footer = isset($wceazy_pi_settings["enable_footer"]) ? $wceazy_pi_settings["enable_footer"] : "yes";


            $order = wc_get_order( $order_id );
            $billing_aadress = $order->get_address ('billing');
            $shipping_aadress = $order->get_address ('shipping');

            $fee_total = 0;
            $fee_total_tax = 0;
            foreach ($order->get_items ('fee') as $item_id => $item_fee) {
                $fee_name = $item_fee->get_name ();
                $fee_total = $item_fee->get_total ();
                $fee_total_tax = $item_fee->get_total_tax ();
            }

            ob_start (); ?>


            <table width="100%" border="0" cellspacing="0" cellpadding="30"><tr><td>

                        <table width="100%" border="0" cellspacing="6" cellpadding="4">
                            <?php if($wceazy_pi_enable_invoice_title == "yes") { ?>
                            <tr class="wceazy_pi_emulator_invoice_title"><td style="color: #6E32C9; font-size: 25px; font-weight: bold;">INVOICE</td></tr>
                            <?php } ?>
                            <tr>
                                <td width="50%" valign="top">
                                    <?php if($wceazy_pi_enable_shop_logo == "yes") { ?>
                                    <img class="wceazy_pi_emulator_shop_logo" width="90px" src="<?php echo $wceazy_pi_shop_logo; ?>" />
                                    <?php } ?>
                                </td>
                                <td width="50%" valign="top" align="right">
                                <?php if($wceazy_pi_enable_invoice_number == "yes") { ?><p class="wceazy_pi_emulator_invoice_number" style="font-size: 12px;">INVOICE <b>#<?php echo $this->generate_invoice_number($order->get_order_number ());?></b></p><?php } ?>
                                <?php if($wceazy_pi_enable_invoice_date == "yes") { ?><p class="wceazy_pi_emulator_invoice_date" style="font-size: 10px;">Invoice Date: <b><?php echo date ('Y/m/d'); ?></b></p><?php } ?>
                                <?php if($wceazy_pi_enable_order_number == "yes") { ?><p class="wceazy_pi_emulator_order_number" style="font-size: 10px;">Order No.: <b><?php echo $order->get_order_number(); ?></b></p><?php } ?>
                                <?php if($wceazy_pi_enable_order_date == "yes") { ?><p class="wceazy_pi_emulator_order_date" style="font-size: 10px;">Order Date: <b><?php echo date ('Y/m/d', strtotime ($order->get_date_created ())); ?></b></p><?php } ?>
                                <?php if($wceazy_pi_enable_ssn_id == "yes") { ?><p class="wceazy_pi_emulator_ssn_id" style="font-size: 10px;">SSN: <b><?php echo get_post_meta($order->get_id(), 'wceazy_pdf_invoice_ssn_id', true);?></b></p><?php } ?>
                                <?php if($wceazy_pi_enable_vat_id == "yes") { ?><p class="wceazy_pi_emulator_vat_id" style="font-size: 10px;">VAT: <b><?php echo get_post_meta($order->get_id(), 'wceazy_pdf_invoice_vat_id', true);?></b></p><?php } ?>
                                </td>
                            </tr>
                        </table>

                        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-bottom: 1px solid #cccccc;"><tr><td></td></tr></table>
                        <table width="100%" border="0" cellspacing="0" cellpadding="5"><tr><td></td></tr></table>


                        <table width="100%" border="0" cellspacing="0" cellpadding="4">
                            <tr>
                                <?php if($wceazy_pi_enable_from_address == "yes") { ?>
                                <td class="wceazy_pi_emulator_from_address" width="33.33%" valign="top">
                                    <table width="100%" border="0" cellspacing="0" cellpadding="10" style="background-color: #F6F5FA;"><tr><td style="font-size: 10px;"><b>From Address</b></td></tr></table>

                                    <table width="100%" border="0" cellspacing="0" cellpadding="5"><tr><td>
                                        <p style="font-size: 10px;"><?php echo $wceazy_pi_sender_name; ?></p>
                                        <p style="font-size: 10px;"><?php echo $wceazy_pi_address_line_one; ?></p>
                                        <p style="font-size: 10px;"><?php echo $wceazy_pi_address_city; ?></p>
                                        <p style="font-size: 10px;"><?php echo WC ()->countries->states[$country][$state]; ?></p>
                                        <p style="font-size: 10px;"><?php echo WC ()->countries->countries[$country]; ?></p>
                                        <p style="font-size: 10px;"><?php echo $wceazy_pi_postal_code; ?></p>
                                    </td></tr></table>

                                </td>
                                <?php } ?>
                                <?php if($wceazy_pi_enable_billing_address == "yes" && !empty($billing_aadress)) { ?>
                                <td class="wceazy_pi_emulator_billing_address" width="33.33%" valign="top">
                                    <table width="100%" border="0" cellspacing="0" cellpadding="10" style="background-color: #F6F5FA;"><tr><td style="font-size: 10px;"><b>Billing Address</b></td></tr></table>

                                    <table width="100%" border="0" cellspacing="0" cellpadding="5"><tr><td>
                                                <p style="font-size: 10px;"><?php echo $billing_aadress['first_name']; ?></p>
                                                <p style="font-size: 10px;"><?php echo $billing_aadress['address_1']; ?></p>
                                                <p style="font-size: 10px;"><?php echo $billing_aadress['city']; ?></p>
                                                <p style="font-size: 10px;"><?php echo !empty($billing_aadress['country']) && !empty($billing_aadress['state']) ? WC ()->countries->states[$billing_aadress['country']][$billing_aadress['state']] : ''; ?></p>
                                                <p style="font-size: 10px;"><?php echo !empty($billing_aadress['country']) ? WC ()->countries->countries[$billing_aadress['country']] : ''; ?></p>
                                                <p style="font-size: 10px;"><?php echo $billing_aadress['postcode']; ?></p>

                                                <?php if($wceazy_pi_enable_email == "yes") { ?>
                                                <p class="wceazy_pi_emulator_email" style="font-size: 10px;"><?php echo $billing_aadress['email']; ?></p>
                                                <?php } ?>
                                                <?php if($wceazy_pi_enable_phone == "yes") { ?>
                                                <p class="wceazy_pi_emulator_phone" style="font-size: 10px;"><?php echo $billing_aadress['phone']; ?></p>
                                                <?php } ?>
                                            </td></tr></table>

                                </td>
                                <?php } ?>
                                <?php if($wceazy_pi_enable_shipping_address == "yes" && !empty($shipping_aadress)) { ?>
                                <td class="wceazy_pi_emulator_shipping_address" width="33.33%" valign="top">
                                    <table width="100%" border="0" cellspacing="0" cellpadding="10" style="background-color: #F6F5FA;"><tr><td style="font-size: 10px;"><b>Shipping Address</b></td></tr></table>

                                    <table width="100%" border="0" cellspacing="0" cellpadding="5"><tr><td>
                                                <p style="font-size: 10px;"><?php echo $shipping_aadress['first_name']; ?></p>
                                                <p style="font-size: 10px;"><?php echo $shipping_aadress['address_1']; ?></p>
                                                <p style="font-size: 10px;"><?php echo $shipping_aadress['city']; ?></p>
                                                <p style="font-size: 10px;"><?php echo !empty($shipping_aadress['country']) && !empty($shipping_aadress['state']) ? WC ()->countries->states[$shipping_aadress['country']][$shipping_aadress['state']] : ''; ?></p>
                                                <p style="font-size: 10px;"><?php echo !empty($shipping_aadress['country']) ? WC ()->countries->countries[$shipping_aadress['country']] : ''; ?></p>
                                                <p style="font-size: 10px;"><?php echo $shipping_aadress['postcode']; ?></p>
                                            </td></tr></table>
                                </td>
                                <?php } ?>
                            </tr>
                        </table>


                        <table width="100%" border="0" cellspacing="0" cellpadding="5"><tr><td></td></tr></table>


                        <table width="100%" border="0" cellspacing="0" cellpadding="10">
                            <tr>
                                <td style="background-color: #F6F5FA; border-bottom: 1px solid #cccccc; border-top: 1px solid #cccccc; font-size: 10px;"><b>SKU</b></td>
                                <td style="background-color: #F6F5FA; border-bottom: 1px solid #cccccc; border-top: 1px solid #cccccc; font-size: 10px;"><b>PRODUCT</b></td>
                                <td style="background-color: #F6F5FA; border-bottom: 1px solid #cccccc; border-top: 1px solid #cccccc; font-size: 10px;"><b>QUANTITY</b></td>
                                <td style="background-color: #F6F5FA; border-bottom: 1px solid #cccccc; border-top: 1px solid #cccccc; font-size: 10px;"><b>PRICE</b></td>
                                <td style="background-color: #F6F5FA; border-bottom: 1px solid #cccccc; border-top: 1px solid #cccccc; font-size: 10px;"><b>TOTAL PRICE</b></td>
                            </tr>

                            <?php
                            $order_items = $order->get_items ();
                            if (!empty($order_items)) {
                                foreach ($order_items as $key => $item) {
                                    $item_data = $item->get_data ();
                                    $product = $item->get_product ();
                                    ?>

                                    <tr>
                                        <td style="border-bottom: 1px solid #cccccc; font-size: 10px;" valign="middle"><?php echo $product->get_sku (); ?></td>
                                        <td style="border-bottom: 1px solid #cccccc; font-size: 10px;" valign="middle"><?php echo $item_data['name']; ?></td>
                                        <td style="border-bottom: 1px solid #cccccc; font-size: 10px;" valign="middle"><?php echo $item_data['quantity']; ?></td>
                                        <td style="border-bottom: 1px solid #cccccc; font-size: 10px;" valign="middle"><?php echo wc_price($product->get_price ()); ?></td>
                                        <td style="border-bottom: 1px solid #cccccc; font-size: 10px;" valign="middle"><?php echo wc_price($item_data['subtotal']); ?></td>
                                    </tr>
                                <?php }
                            } else { ?>
                                <tr><td colspan="5" style="text-align: center;">No item found!</td></tr>
                            <?php } ?>


                            <tr>
                                <td style="border-bottom: 1px solid #cccccc;" valign="middle">&nbsp;</td>
                                <td style="border-bottom: 1px solid #cccccc;" valign="middle">&nbsp;</td>
                                <td style="border-bottom: 1px solid #cccccc;" valign="middle">&nbsp;</td>
                                <td style="border-bottom: 1px solid #cccccc;" valign="middle" align="right">
                                    <p style="font-size: 11px;">Subtotal</p>
                                    <p style="font-size: 11px;">Shipping</p>
                                    <p style="font-size: 11px;">Discount</p>
                                    <p style="font-size: 11px;">Fee</p>
                                </td>
                                <td style="border-bottom: 1px solid #cccccc;" valign="middle">
                                    <p style="font-size: 11px;"><?php echo wc_price($order->get_subtotal ()); ?></p>
                                    <p style="font-size: 11px;"><?php echo wc_price($order->get_shipping_total ()); ?></p>
                                    <p style="font-size: 11px;"><?php echo wc_price($order->get_discount_total ()); ?></p>
                                    <p style="font-size: 11px;"><?php echo wc_price($fee_total + $fee_total_tax); ?></p>
                                </td>
                            </tr>

                            <tr>
                                <td style="border-bottom: 1px solid #cccccc;" valign="middle">&nbsp;</td>
                                <td style="border-bottom: 1px solid #cccccc;" valign="middle">&nbsp;</td>
                                <td style="border-bottom: 1px solid #cccccc;" valign="middle">&nbsp;</td>
                                <td style="border-bottom: 1px solid #cccccc;" valign="middle" align="right">
                                    <p style="font-size: 13px;">Total</p>
                                </td>
                                <td style="border-bottom: 1px solid #cccccc;" valign="middle">
                                    <p style="font-size: 13px;"><?php echo wc_price($order->get_total ()); ?></p>
                                </td>
                            </tr>
                        </table>

                        <table width="100%" border="0" cellspacing="5" cellpadding="0"><tr><td></td></tr></table>
                        <?php if($wceazy_pi_enable_payment_method == "yes") { ?>
                        <table class="wceazy_pi_emulator_payment_method" width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td>Payment Method: <?php echo $order->get_payment_method (); ?></td></tr></table>
                        <?php } ?>
                        <?php if($wceazy_pi_enable_customer_note == "yes") { ?>
                        <table class="wceazy_pi_emulator_customer_note" width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td>Customer Note:<br><?php echo $order->get_customer_note (); ?></td></tr></table>
                        <?php } ?>
                        <table width="100%" border="0" cellspacing="10" cellpadding="0"><tr><td></td></tr></table>
                        <?php if($wceazy_pi_enable_footer == "yes") { ?>
                        <table class="wceazy_pi_emulator_footer" width="100%" border="0" cellspacing="0" cellpadding="0"><tr><td align="center"><?php echo $wceazy_pi_footer_info; ?></td></tr></table>
                        <?php } ?>

                    </td></tr></table>


            <?php
            $pdf_content = ob_get_clean ();
            return $pdf_content;
        }

        public function wceazy_generate_shipping_label_html($order_id){
            $wceazy_pdf_invoice_settings = get_option('wceazy_pdf_invoice_settings', False);
            $wceazy_pi_settings = $wceazy_pdf_invoice_settings ? json_decode($wceazy_pdf_invoice_settings, true) : array();

            $wceazy_pi_shop_logo = isset($wceazy_pi_settings["shop_logo"]) ? $wceazy_pi_settings["shop_logo"] : WCEAZY_IMG_DIR."modules/pdf_invoice/no-image.jpg";
            $wceazy_pi_sender_name = isset($wceazy_pi_settings["sender_name"]) ? $wceazy_pi_settings["sender_name"] : get_option( 'blogname' );
            $wceazy_pi_address_line_one = isset($wceazy_pi_settings["address_line_one"]) ? $wceazy_pi_settings["address_line_one"] : get_option('woocommerce_store_address');
            $wceazy_pi_address_city = isset($wceazy_pi_settings["address_city"]) ? $wceazy_pi_settings["address_city"] : get_option('woocommerce_store_city');
            $wceazy_pi_postal_code = isset($wceazy_pi_settings["postal_code"]) ? $wceazy_pi_settings["postal_code"] : get_option('woocommerce_store_postcode');
            $wceazy_pi_country_state = isset($wceazy_pi_settings["country_state"]) ? explode(":", $wceazy_pi_settings["country_state"]) : "";
            $country = isset($wceazy_pi_country_state[0]) ? $wceazy_pi_country_state[0] : array_search(WC()->countries->countries[WC()->countries->get_base_country()], WC()->countries->countries);
            $state = isset($wceazy_pi_country_state[1]) ? $wceazy_pi_country_state[1] : WC()->countries->get_base_state();

            $wceazy_pi_enable_shipping_shop_logo = isset($wceazy_pi_settings["enable_shipping_shop_logo"]) ? $wceazy_pi_settings["enable_shipping_shop_logo"] : "yes";
            $wceazy_pi_enable_shipping_from_address = isset($wceazy_pi_settings["enable_shipping_from_address"]) ? $wceazy_pi_settings["enable_shipping_from_address"] : "yes";
            $wceazy_pi_enable_shipping_to_address = isset($wceazy_pi_settings["enable_shipping_to_address"]) ? $wceazy_pi_settings["enable_shipping_to_address"] : "yes";
            $wceazy_pi_enable_shipping_order_number = isset($wceazy_pi_settings["enable_shipping_order_number"]) ? $wceazy_pi_settings["enable_shipping_order_number"] : "yes";
            $wceazy_pi_enable_shipping_weight = isset($wceazy_pi_settings["enable_shipping_weight"]) ? $wceazy_pi_settings["enable_shipping_weight"] : "yes";
            $wceazy_pi_enable_shipping_date = isset($wceazy_pi_settings["enable_shipping_date"]) ? $wceazy_pi_settings["enable_shipping_date"] : "yes";
            $wceazy_pi_enable_shipping_email = isset($wceazy_pi_settings["enable_shipping_email"]) ? $wceazy_pi_settings["enable_shipping_email"] : "yes";
            $wceazy_pi_enable_shipping_phone = isset($wceazy_pi_settings["enable_shipping_phone"]) ? $wceazy_pi_settings["enable_shipping_phone"] : "yes";

            $order = wc_get_order( $order_id );
            $billing_aadress = $order->get_address ('billing');
            $shipping_aadress = $order->get_address ('shipping');

            $total_weight = 0;
            foreach ($order->get_items () as $item_id => $product_item) {
                $quantity = $product_item->get_quantity ();
                $product = $product_item->get_product ();
                $product_weight = $product->get_weight () ? $product->get_weight () : 0;
                $total_weight += $product_weight * $quantity;
            }

            ob_start (); ?>


            <table width="100%" border="0" cellspacing="0" cellpadding="30"><tr><td>

                        <table width="100%" border="0" cellspacing="6" cellpadding="4">
                            <tr>
                                <td width="50%" valign="top">
                                    <?php if($wceazy_pi_enable_shipping_shop_logo == "yes") { ?>
                                        <img class="wceazy_pi_emulator_shop_logo" width="90px" src="<?php echo $wceazy_pi_shop_logo; ?>" />
                                    <?php } ?>
                                </td>
                                <td width="50%" valign="top" align="right">
                                    <?php if($wceazy_pi_enable_shipping_order_number == "yes") { ?><p class="wceazy_pi_emulator_shipping_order_number" style="font-size: 10px;">Order No.: <b><?php echo $order->get_order_number(); ?></b></p><?php } ?>
                                    <?php if($wceazy_pi_enable_shipping_weight == "yes") { ?><p class="wceazy_pi_emulator_shipping_weight" style="font-size: 10px;">Weight: <b><?php echo $total_weight." ".get_option ('woocommerce_weight_unit'); ?></b></p><?php } ?>
                                    <?php if($wceazy_pi_enable_shipping_date == "yes") { ?><p class="wceazy_pi_emulator_shipping_date" style="font-size: 10px;">Shipping Date: <b><?php echo date ('Y/m/d') ?></b></p><?php } ?>
                                </td>
                            </tr>
                        </table>

                        <table width="100%" border="0" cellspacing="0" cellpadding="5"><tr><td></td></tr></table>


                        <table width="100%" border="0" cellspacing="0" cellpadding="4">
                            <tr>
                                <?php if($wceazy_pi_enable_shipping_from_address == "yes") { ?>
                                <td class="wceazy_pi_emulator_shipping_from_address" width="50%" valign="top">
                                    <table width="100%" border="0" cellspacing="0" cellpadding="10" style="background-color: #F6F5FA;"><tr><td style="font-size: 10px;"><b>From</b></td></tr></table>

                                    <table width="100%" border="0" cellspacing="0" cellpadding="5"><tr><td>
                                                <p style="font-size: 10px;"><?php echo $wceazy_pi_sender_name; ?></p>
                                                <p style="font-size: 10px;"><?php echo $wceazy_pi_address_line_one; ?></p>
                                                <p style="font-size: 10px;"><?php echo $wceazy_pi_address_city; ?></p>
                                                <p style="font-size: 10px;"><?php echo WC ()->countries->states[$country][$state]; ?></p>
                                                <p style="font-size: 10px;"><?php echo WC ()->countries->countries[$country]; ?></p>
                                                <p style="font-size: 10px;"><?php echo $wceazy_pi_postal_code; ?></p>
                                            </td></tr></table>

                                </td>
                                <?php } ?>
                                <?php if($wceazy_pi_enable_shipping_to_address == "yes") { ?>
                                <td class="wceazy_pi_emulator_shipping_to_address" width="50%" valign="top">
                                    <table width="100%" border="0" cellspacing="0" cellpadding="10" style="background-color: #F6F5FA;"><tr><td style="font-size: 10px;"><b>To</b></td></tr></table>

                                    <table width="100%" border="0" cellspacing="0" cellpadding="5"><tr><td>
                                                <p style="font-size: 10px;"><?php echo $shipping_aadress['first_name']; ?></p>
                                                <p style="font-size: 10px;"><?php echo $shipping_aadress['address_1']; ?></p>
                                                <p style="font-size: 10px;"><?php echo $shipping_aadress['city']; ?></p>
                                                <p style="font-size: 10px;"><?php echo !empty($shipping_aadress['country']) && !empty($shipping_aadress['state']) ? WC ()->countries->states[$shipping_aadress['country']][$shipping_aadress['state']] : ''; ?></p>
                                                <p style="font-size: 10px;"><?php echo !empty($shipping_aadress['country']) ? WC ()->countries->countries[$shipping_aadress['country']] : ''; ?></p>
                                                <p style="font-size: 10px;"><?php echo $shipping_aadress['postcode']; ?></p>

                                                <?php if($wceazy_pi_enable_shipping_email == "yes") { ?>
                                                    <p class="wceazy_pi_emulator_shipping_email" style="font-size: 10px;"><?php echo $billing_aadress['email']; ?></p>
                                                <?php } ?>
                                                <?php if($wceazy_pi_enable_shipping_phone == "yes") { ?>
                                                    <p class="wceazy_pi_emulator_shipping_phone" style="font-size: 10px;"><?php echo $billing_aadress['phone']; ?></p>
                                                <?php } ?>


                                            </td></tr></table>

                                </td>
                                <?php } ?>
                            </tr>
                        </table>

                    </td></tr></table>




            <?php
            $pdf_content = ob_get_clean ();
            return $pdf_content;
        }

        public function wceazy_attach_pdf_to_emails( $attachments, $email_id, $order ) {

            $wceazy_pdf_invoice_settings = get_option('wceazy_pdf_invoice_settings', False);
            $wceazy_pi_settings = $wceazy_pdf_invoice_settings ? json_decode($wceazy_pdf_invoice_settings, true) : array();

            $wceazy_pi_attach_to_email = isset($wceazy_pi_settings["attach_to_email"]) ? explode(",",$wceazy_pi_settings["attach_to_email"]) : array();

            if ( in_array ( $email_id, $wceazy_pi_attach_to_email ) ) {
                $pdfFileLink = $this->wceazy_generate_email_pdf_invoice($order);
                $attachments[] = $pdfFileLink;
            }

            return $attachments;

        }

        public function wceazy_generate_email_pdf_invoice($order){


            $order_id = $order->get_id();

            $html_content = $this->wceazy_generate_invoice_html($order_id);
            $pdf = $this->wceazy_generate_pdf_file($html_content);
            $output = $pdf->Output('order-invoice-'.$order_id.'.pdf', 'S');


            $upload_dir = wp_upload_dir();
            $wcEazy_cache_dir = $upload_dir['basedir'] . '/wcEazy_caches';
            if (! is_dir($wcEazy_cache_dir)) {
                wp_mkdir_p($wcEazy_cache_dir);
            }
            file_put_contents($wcEazy_cache_dir.'/order-invoice-'.$order_id.".pdf", $output);

            return $wcEazy_cache_dir.'/order-invoice-'.$order->get_id().".pdf";
        }

    }
}