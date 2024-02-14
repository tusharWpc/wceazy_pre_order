<?php



/* Check if user has manage option capabilities */
if (current_user_can ('manage_options')) {
    $post_data = array();
    if (isset($_REQUEST) && $_REQUEST['order_id']) {
        $order_id = sanitize_text_field($_REQUEST['order_id']);

        $html_content = $this->base_admin->pdf_invoice->utils->wceazy_generate_invoice_html($order_id);
        $pdf = $this->base_admin->pdf_invoice->utils->wceazy_generate_pdf_file($html_content);

        $wceazy_pdf_invoice_settings = get_option('wceazy_pdf_invoice_settings', False);
        $wceazy_pi_settings = $wceazy_pdf_invoice_settings ? json_decode($wceazy_pdf_invoice_settings, true) : array();
        $wceazy_pi_display_download = isset($wceazy_pi_settings["display_download"]) ? $wceazy_pi_settings["display_download"] : "display_new_window";


        if($wceazy_pi_display_download == "display_new_window"){
            $pdf->output('invoice_'.$order_id.'.pdf', 'I', '_blank');
        }else{
            $pdf->Output('invoice_'.$order_id.'.pdf', 'D');
        }

    }
}
