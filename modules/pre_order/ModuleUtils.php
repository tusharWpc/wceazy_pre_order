<?php

// If this file is called directly, abort.
if (!defined ('WPINC')) {
    die;
}

if(!isset($_SESSION)){session_start();}

if (!class_exists ('WcEazyPreOrderUtils')) {
    class WcEazyPreOrderUtils{ 

        public $base_admin;

// var_dump($base_admin);  

        public $module_admin;

        public function __construct ($base_admin, $module_admin)
        {
            $this->base_admin = $base_admin;
            $this->module_admin = $module_admin;
        }

        public function saveSettings($post_data){
            if(!empty($post_data)){
                update_option( 'wceazy_pre_order_settings', json_encode($post_data) );
            }
        }
 
public function wceazy_customVariationsFields( $loop, $variation_data, $variation ) {
    echo '<div class="options_group form-row form-row-full">';
    woocommerce_wp_text_input(
        [
            'id'          => '_pre_order_date_' . $variation->ID,
            'label'       => __( 'My Pre Order Date', 'pre-orders-for-woocommerce' ),
            'placeholder' => date( 'Y-m-d h:i:s' ),
            'class'       => 'datepicker',
            'desc_tip'    => true,
            'description' => __( 'Choose when the product will be available.', 'pre-orders-for-woocommerce' ),
            'value'       => get_post_meta( $variation->ID, '_pre_order_date', true ),
        ]
    );
    echo '</div>';
} 

public function wceazy_customSimpleFields() {
    echo '<div class="options_group form-row form-row-full hide_if_variable">';
    woocommerce_wp_checkbox(
        [
            'id'          => '_is_pre_order',
            'label'       => __( 'My Pre Order Product', 'pre-orders-for-woocommerce' ),
            'description' => __( 'Check this if you want to offer this product as pre-order', 'pre-orders-for-woocommerce' ),
            'value'       => get_post_meta( get_the_ID(), '_is_pre_order', true ),
        ]
    );
    woocommerce_wp_text_input(
        [
            'id'          => '_pre_order_date',
            'label'       => __( 'Pre Order Date', 'pre-orders-for-woocommerce' ),
            'placeholder' => date( 'Y-m-d h:i:s' ),
            'class'       => 'datepicker',
            'desc_tip'    => true,
            'description' => __( 'Choose when the product will be available.', 'pre-orders-for-woocommerce' ),
            'value'       => get_post_meta( get_the_ID(), '_pre_order_date', true ),
        ]
    );
    echo '</div>';
    echo '<div class="options_group form-row form-row-full hide_if_simple"></div>';
}

public function wceazy_customVariationsFieldsSave( $post_id ) {
    $product = wc_get_product( $post_id );
    $is_pre_order_variation = isset( $_POST['_is_pre_order_' . $post_id] ) ? 'yes' : 'no';
    $product->update_meta_data( '_is_pre_order', $is_pre_order_variation );
    if ( $is_pre_order_variation == 'yes' ) {
        $pre_order_date_value = isset( $_POST['_pre_order_date_' . $post_id] ) ? esc_html( $_POST['_pre_order_date_' . $post_id] ) : '';
        $product->update_meta_data( '_pre_order_date', esc_attr( $pre_order_date_value ) );
    } else {
        $product->update_meta_data( '_pre_order_date', '' );
    }
    $product->save();
} 

public function wceazy_customSimpleFieldsSave( $post_id ) {
    $product = wc_get_product( $post_id );
    $is_pre_order = isset( $_POST['_is_pre_order'] ) ? 'yes' : 'no';
    $product->update_meta_data( '_is_pre_order', $is_pre_order );
    if ( $is_pre_order == 'yes' ) {
        $pre_order_date_value = isset( $_POST['_pre_order_date'] ) ? esc_html( $_POST['_pre_order_date'] ) : '';
        $product->update_meta_data( '_pre_order_date', esc_attr( $pre_order_date_value ) );
    } else {
        $product->update_meta_data( '_pre_order_date', '' );
    }
    $product->save();
  }  

 }
}
?>



<style>
#wceazy_pre_order_sb_<?php echo esc_attr($unique_id) ?> {
    --wceazy_pre_order_sb_bar_bg: <?php echo $wceazy_sb_pre_order_progress_bar_bg;
    ?>;
    --wceazy_pre_order_sb_bar_progress_bg: <?php echo $wceazy_sb_pre_order_progress_color;
    ?>;
    --wceazy_pre_order_sb_bar_text_color: <?php echo $wceazy_sb_pre_order_progress_text_color;
    ?>;
}
</style>

  <tr class="cart-total-wceazy-sb"> 
    <td data-title="total-volume">
        <div id="wceazy_pre_order_sb_<?php echo esc_attr($unique_id);?>"
            class="wceazy_pre_order_sb_progress_container">
            <div class="bar-holder">
                
            </div>
        </div>
    </td>
</tr>  