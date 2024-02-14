<table width="100%" border="0" cellspacing="0" cellpadding="30">
    <tr>
        <td>

            <table width="100%" border="0" cellspacing="6" cellpadding="4">
                <tr class="wceazy_pi_emulator_invoice_title">
                    <td style="color: #6E32C9; font-size: 25px; font-weight: bold;"><?php esc_html_e('INVOICE', 'wceazy'); ?> </td>
                </tr>
                <tr>
                    <td width="50%" valign="top">
                        <img class="wceazy_pi_emulator_shop_logo" width="90px" src="<?php echo WCEAZY_IMG_DIR . "modules/pdf_invoice/no-image.jpg"; ?>" />
                    </td>
                    <td width="50%" valign="top" align="right">
                        <p class="wceazy_pi_emulator_invoice_number" style="font-size: 12px;"><?php esc_html_e('INVOICE', 'wceazy'); ?> <b>#1001</b></p>
                        <p class="wceazy_pi_emulator_invoice_date" style="font-size: 10px;"><?php esc_html_e('Invoice Date:', 'wceazy'); ?> <b>####/##/##</b></p>
                        <p class="wceazy_pi_emulator_order_number" style="font-size: 10px;"><?php esc_html_e('Order No.:', 'wceazy'); ?> <b>########</b></p>
                        <p class="wceazy_pi_emulator_order_date" style="font-size: 10px;"><?php esc_html_e('Order Date:', 'wceazy'); ?> <b>####/##/##</b></p>
                        <p class="wceazy_pi_emulator_ssn_id" style="font-size: 10px;"><?php esc_html_e('SSN:', 'wceazy'); ?> <b>########</b></p>
                        <p class="wceazy_pi_emulator_vat_id" style="font-size: 10px;"><?php esc_html_e('VAT:', 'wceazy'); ?> <b>########</b></p>
                    </td>
                </tr>
            </table>

            <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-bottom: 1px solid #cccccc;">
                <tr>
                    <td></td>
                </tr>
            </table>
            <table width="100%" border="0" cellspacing="0" cellpadding="5">
                <tr>
                    <td></td>
                </tr>
            </table>
            <table width="100%" border="0" cellspacing="0" cellpadding="4">
                <tr>
                    <td class="wceazy_pi_emulator_from_address" width="33.33%" valign="top">
                        <table width="100%" border="0" cellspacing="0" cellpadding="10" style="background-color: #F6F5FA;">
                            <tr>
                                <td style="font-size: 10px;"><b><?php esc_html_e('From Address', 'wceazy'); ?> </b></td>
                            </tr>
                        </table>

                        <table width="100%" border="0" cellspacing="0" cellpadding="5">
                            <tr>
                                <td>
                                    <p style="font-size: 10px;"><?php esc_html_e('Name of the shop', 'wceazy'); ?></p>
                                    <p style="font-size: 10px;"><?php esc_html_e('Shop Address', 'wceazy'); ?></p>
                                    <p style="font-size: 10px;"><?php esc_html_e('City', 'wceazy'); ?></p>
                                    <p style="font-size: 10px;"><?php esc_html_e('Country', 'wceazy'); ?></p>
                                    <p style="font-size: 10px;"><?php esc_html_e('Zip Code', 'wceazy'); ?></p>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td class="wceazy_pi_emulator_billing_address" width="33.33%" valign="top">
                        <table width="100%" border="0" cellspacing="0" cellpadding="10" style="background-color: #F6F5FA;">
                            <tr>
                                <td style="font-size: 10px;"><b><?php esc_html_e('Billing Address', 'wceazy'); ?></b>
                                </td>
                            </tr>
                        </table>

                        <table width="100%" border="0" cellspacing="0" cellpadding="5">
                            <tr>
                                <td>
                                    <p style="font-size: 10px;"><?php esc_html_e('Billing to Name', 'wceazy'); ?></p>
                                    <p style="font-size: 10px;"><?php esc_html_e('Billing Address', 'wceazy'); ?></p>
                                    <p style="font-size: 10px;"><?php esc_html_e('City', 'wceazy'); ?></p>
                                    <p style="font-size: 10px;"><?php esc_html_e('Country', 'wceazy'); ?></p>
                                    <p style="font-size: 10px;"><?php esc_html_e('Zip Code', 'wceazy'); ?></p>

                                    <p class="wceazy_pi_emulator_email" style="font-size: 10px;">
                                        <?php esc_html_e('Biller Email Address', 'wceazy'); ?>
                                    </p>
                                    <p class="wceazy_pi_emulator_phone" style="font-size: 10px;">
                                        <?php esc_html_e('Biller Phone Number ', 'wceazy'); ?> </p>
                                </td>
                            </tr>
                        </table>

                    </td>
                    <td class="wceazy_pi_emulator_shipping_address" width="33.33%" valign="top">
                        <table width="100%" border="0" cellspacing="0" cellpadding="10" style="background-color: #F6F5FA;">
                            <tr>
                                <td style="font-size: 10px;"><b><?php esc_html_e('Shipping Address', 'wceazy'); ?></b></td>
                            </tr>
                        </table>

                        <table width="100%" border="0" cellspacing="0" cellpadding="5">
                            <tr>
                                <td>
                                    <p style="font-size: 10px;"><?php esc_html__('Shipping to Name', 'wceazy'); ?></p>
                                    <p style="font-size: 10px;"><?php esc_html_e('Shipping Address', 'wceazy'); ?></p>
                                    <p style="font-size: 10px;"><?php esc_html_e('City', 'wceazy'); ?></p>
                                    <p style="font-size: 10px;"><?php esc_html_e('Country', 'wceazy'); ?></p>
                                    <p style="font-size: 10px;"><?php esc_html_e('Zip Code', 'wceazy'); ?></p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>


            <table width="100%" border="0" cellspacing="0" cellpadding="5">
                <tr>
                    <td></td>
                </tr>
            </table>


            <table width="100%" border="0" cellspacing="0" cellpadding="10">
                <tr>
                    <td style="background-color: #F6F5FA; border-bottom: 1px solid #cccccc; border-top: 1px solid #cccccc; font-size: 10px;"><b><?php esc_html_e('SKU', 'wceazy'); ?></b></td>
                    <td style="background-color: #F6F5FA; border-bottom: 1px solid #cccccc; border-top: 1px solid #cccccc; font-size: 10px;"><b><?php esc_html_e('PRODUCT', 'wceazy'); ?></b></td>
                    <td style="background-color: #F6F5FA; border-bottom: 1px solid #cccccc; border-top: 1px solid #cccccc; font-size: 10px;"><b><?php esc_html_e('QUANTITY', 'wceazy'); ?></b></td>
                    <td style="background-color: #F6F5FA; border-bottom: 1px solid #cccccc; border-top: 1px solid #cccccc; font-size: 10px;"><b><?php esc_html_e('PRICE', 'wceazy'); ?></b></td>
                    <td style="background-color: #F6F5FA; border-bottom: 1px solid #cccccc; border-top: 1px solid #cccccc; font-size: 10px;"><b><?php esc_html_e('TOTAL PRICE', 'wceazy'); ?></b></td>
                </tr>
                <tr>
                    <td style="border-bottom: 1px solid #cccccc; font-size: 10px;" valign="middle"><?php esc_html_e('001', 'wceazy'); ?></td>
                    <td style="border-bottom: 1px solid #cccccc; font-size: 10px;" valign="middle"><?php esc_html_e('Name of the product', 'wceazy'); ?></td>
                    <td style="border-bottom: 1px solid #cccccc; font-size: 10px;" valign="middle"><?php esc_html_e('1', 'wceazy'); ?></td>
                    <td style="border-bottom: 1px solid #cccccc; font-size: 10px;" valign="middle"><?php esc_html_e('$0.00', 'wceazy'); ?></td>
                    <td style="border-bottom: 1px solid #cccccc; font-size: 10px;" valign="middle"><?php esc_html_e('$0.00', 'wceazy'); ?></td>
                </tr>
                <tr>
                    <td style="border-bottom: 1px solid #cccccc; font-size: 10px;" valign="middle">001</td>
                    <td style="border-bottom: 1px solid #cccccc; font-size: 10px;" valign="middle"><?php esc_html_e('Name of the product', 'wceazy'); ?></td>
                    <td style="border-bottom: 1px solid #cccccc; font-size: 10px;" valign="middle">1</td>
                    <td style="border-bottom: 1px solid #cccccc; font-size: 10px;" valign="middle">$0.00</td>
                    <td style="border-bottom: 1px solid #cccccc; font-size: 10px;" valign="middle">$0.00</td>
                </tr>

                <tr>
                    <td style="border-bottom: 1px solid #cccccc;" valign="middle">&nbsp;</td>
                    <td style="border-bottom: 1px solid #cccccc;" valign="middle">&nbsp;</td>
                    <td style="border-bottom: 1px solid #cccccc;" valign="middle">&nbsp;</td>
                    <td style="border-bottom: 1px solid #cccccc;" valign="middle" align="right">
                        <p style="font-size: 11px;"><?php esc_html_e('Subtotal', 'wceazy'); ?></p>
                        <p style="font-size: 11px;"><?php esc_html_e('Shipping', 'wceazy'); ?></p>
                        <p style="font-size: 11px;"><?php esc_html_e('Discount', 'wceazy'); ?></p>
                        <p style="font-size: 11px;"><?php esc_html_e('Fee', 'wceazy'); ?></p>
                    </td>
                    <td style="border-bottom: 1px solid #cccccc;" valign="middle">
                        <p style="font-size: 11px;">$0.00</p>
                        <p style="font-size: 11px;">$0.00</p>
                        <p style="font-size: 11px;">$0.00</p>
                        <p style="font-size: 11px;">$0.00</p>
                    </td>
                </tr>

                <tr>
                    <td style="border-bottom: 1px solid #cccccc;" valign="middle">&nbsp;</td>
                    <td style="border-bottom: 1px solid #cccccc;" valign="middle">&nbsp;</td>
                    <td style="border-bottom: 1px solid #cccccc;" valign="middle">&nbsp;</td>
                    <td style="border-bottom: 1px solid #cccccc;" valign="middle" align="right">
                        <p style="font-size: 13px;"><?php esc_html_e('Total', 'wceazy'); ?></p>
                    </td>
                    <td style="border-bottom: 1px solid #cccccc;" valign="middle">
                        <p style="font-size: 13px;">$0.00</p>
                    </td>
                </tr>
            </table>

            <table width="100%" border="0" cellspacing="5" cellpadding="0">
                <tr>
                    <td></td>
                </tr>
            </table>
            <table class="wceazy_pi_emulator_payment_method" width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td><?php esc_html_e('Payment Method: COD', 'wceazy'); ?></td>
                </tr>
            </table>
            <table class="wceazy_pi_emulator_customer_note" width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td><?php esc_html_e('Customer Note:', 'wceazy'); ?></td>
                </tr>
            </table>

            <table width="100%" border="0" cellspacing="10" cellpadding="0">
                <tr>
                    <td></td>
                </tr>
            </table>
            <table class="wceazy_pi_emulator_footer" width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td align="center"><?php esc_html_e('Custom Footer Text', 'wceazy'); ?></td>
                </tr>
            </table>


        </td>
    </tr>
</table>