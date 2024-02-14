<style>
    .wceazy-url-coupon-admin-tab .wceazy-tab-info h3{
        padding: 0 10px;
    }

    #wceazy_url_coupon .wceazy-url-coupon-options-group p.disabled {
        opacity: 0.5 !important;
    }
    .wceazy-url-coupon-options-group .wceazy_url_coupon_url_field  {
        position: relative;
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
    }
    
    .wceazy-copy-url-coupon-url {
        cursor: pointer;
        font-size: 14px;
        display: block;
        padding: 2px 5px 2px 5px;
        position: absolute;
        top: 5px;
        left: 627px;
        border: 1px solid #ddd;
        border-radius: 5px;
        background: #ddd;
        font-weight: 500;
        right: auto;
    }
    .woocommerce_options_panel .wceazy_url_coupon_url_field .description {
        margin: 5px 0 0 0px;
    }
    .wceazy_url_coupon_url_field .description .text-success {
        color: green;
    }
    .woocommerce_options_panel .wceazy_url_coupon_url_field .description {
    width: 100%;
    }

</style>

<div id="wceazy_url_coupon" class="panel woocommerce_options_panel hidden wceazy-url-coupon-admin-tab">
    <div class="wceazy-tab-info">
        <h3><?php _e ('wcEazy URL Coupon', 'wceazy'); ?></h3>
        <p><?php _e ('Let your customers apply this coupon by visiting a URL. This coupon generates a unique coupon URL that can be used in all kind of scenarios (eg. email marketing, live chat support, blog links).', 'wceazy'); ?></p>
    </div>

    <div class="wceazy-url-coupon-options-group">
        <?php
        global $post;
        $coupon_id = $post->ID;

        $url_coupon_enable = get_post_meta ($coupon_id, 'wceazy_url_coupon_enable', true) ? get_post_meta ($coupon_id, 'wceazy_url_coupon_enable', true) : 'no';
        $url_coupon_force_apply = get_post_meta ($coupon_id, 'wceazy_force_apply_url_coupon', true) ? get_post_meta ($coupon_id, 'wceazy_force_apply_url_coupon', true) : 'no';

        // create custom fields for url coupon
        woocommerce_wp_checkbox (
            array(
                'id' => 'wceazy_url_coupon_enable',
                'label' => "Active Coupon URL",
                'class' => 'wceazy-url-coupon-toggle',
                'description' => 'When checked, enable coupon URL functionality for this coupon.',
                'value' => $url_coupon_enable
            )
        );

        woocommerce_wp_checkbox (
            array(
                'id' => 'wceazy_force_apply_url_coupon',
                'label' => 'Force Apply',
                'class' => 'wceazy-url-coupon-force-apply',
                'description' => 'When checked, remove all the other coupons and apply the current coupon on cart items.',
                'value' => $url_coupon_force_apply
            )
        );

        woocommerce_wp_text_input (
            array(
                'id' => 'wceazy_url_coupon_url',
                'label' => 'Coupon URL',
                'class' => 'wceazy-url-coupon-url',
                'description' => '<span class="wceazy-desc-url-coupon-url">When visited, the coupon code will be applied to the visitor’s cart automatically.</span> <span class="wceazy-copy-url-coupon-url">Copy URL</span>',
                'type' => 'text',
                'data_type' => 'text',
                'value' => $this->wceazy_get_coupon_url($coupon_id),
                'custom_attributes' => array('readonly' => true)
            )
        );

        woocommerce_wp_text_input (
            array(
                'id' => 'wceazy_url_coupon_override_code',
                'label' => 'Override URL Code (Pro)',
                'class' => 'wceazy-url-coupon-override',
                'custom_attributes' => array("disabled"=>"disabled"),
                'description' => 'Customize the coupon code on the coupon url. Leave blank to disable feature.',
                'type' => 'text',
                'data_type' => 'text',
                'desc_tip' => true,
                'value' => get_post_meta ($coupon_id, 'wceazy_url_coupon_override_code', true) ? get_post_meta ($coupon_id, 'wceazy_url_coupon_override_code', true) : '',
            )
        );

        woocommerce_wp_text_input (
            array(
                'id' => 'wceazy_url_coupon_redirect_url',
                'label' => 'Redirect To URL',
                'description' => "This will redirect the user to the provided URL after it has been attempted to be applied. You can also pass query args to the URL for the following variables: {test}, {yes} or {errormessage} and they will be replaced with proper data. Eg. ?foo={error_message}, then test the 'foo' query arg to get the message if there is one.",
                'desc_tip' => true,
                'type' => 'text',
                'data_type' => 'text',
                'value' => get_post_meta ($coupon_id, 'wceazy_url_coupon_redirect_url', true) ? get_post_meta ($coupon_id, 'wceazy_url_coupon_redirect_url', true) : '',
                'placeholder' => wc_get_cart_url (),
            )
        );

        woocommerce_wp_textarea_input (
            array(
                'id' => 'wceazy_url_coupon_success_message',
                'label' => 'Success Message (Pro)',
                'custom_attributes' => array("disabled"=>"disabled"),
                'description' => 'Message that will be displayed when a coupon has been applied successfully. Leave blank to use the default message.',
                'desc_tip' => true,
                'type' => 'textarea',
                'data_type' => 'text',
                'placeholder' => 'Coupon applied successfully',
                'value' => get_post_meta ($coupon_id, 'wceazy_url_coupon_success_message', true) ? get_post_meta ($coupon_id, 'wceazy_url_coupon_success_message', true) : '',
            )
        );
        ?>
    </div>

</div>

<script>
    jQuery(document).ready(function ($) {
        // copy url
        $( ".wceazy-copy-url-coupon-url" ).on('click', function () {
            var temp = jQuery("#wceazy_url_coupon_url");
            temp.select();
            document.execCommand("copy");
            var $el = $('.description').find('.wceazy-copy-url-coupon-url').eq(0).text("Copied.");
            $el.addClass('text-success');
            setTimeout(function() {
                $(".description").find('.wceazy-copy-url-coupon-url').eq(0).text("Copy URL");
                $el.removeClass('text-success');
            }, 2000);
        });

        let $url_coupon_enable = "<?php echo $url_coupon_enable; ?>";
        if( $url_coupon_enable == '' || $url_coupon_enable == 'no' ){
            $('.wceazy-url-coupon-options-group p').addClass('disabled');
            $('.wceazy-url-coupon-options-group p input').prop('disabled', true);
            $('.wceazy-url-coupon-options-group p textarea').prop('disabled', true);
            $('.wceazy_url_coupon_enable_field').removeClass('disabled');
            $('.wceazy-url-coupon-toggle').prop('disabled', false);
        }

        $('.wceazy-url-coupon-toggle').on('change', function () {
            let $this = this;
            if( $this.checked ){
                $('.wceazy-url-coupon-options-group p').removeClass('disabled');
                $('.wceazy-url-coupon-options-group p input:not(.wceazy-url-coupon-override)').prop('disabled', false);
                //$('.wceazy-url-coupon-options-group p textarea').prop('disabled', false);
            }else{
                $('.wceazy-url-coupon-options-group p').addClass('disabled');
                $('.wceazy-url-coupon-options-group p input').prop('disabled', true);
                $('.wceazy-url-coupon-options-group p textarea').prop('disabled', true);
                $('.wceazy_url_coupon_enable_field').removeClass('disabled');
                $('.wceazy-url-coupon-toggle').prop('disabled', false);
            }
        });

        // for replace url by override code
        $( '.wceazy-url-coupon-override' ).on( 'keyup', function () {

            const $lastIndex = $('.post-type-shop_coupon #title').val();
                  // $splitText = $prev_url.split("/"),
                  // $lastIndex = $splitText[$splitText.length - 1];

            let $this = this,
                $override_code = $($this).val(),
                $coupoon_url = $(' .wceazy-url-coupon-url ').val(),
                $override_url = '';

            if( $override_code.length > 0 ){
                $override_url = $coupoon_url.replace(/\w+[.!?]?$/, $override_code);
            }else{
                $override_url = $coupoon_url.replace(/\w+[.!?]?$/, $lastIndex);
            }
            // set url
            $(' .wceazy-url-coupon-url ').val($override_url);

        } );

    });
</script>
