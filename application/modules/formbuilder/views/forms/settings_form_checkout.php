<?php

/**
 * Intranet
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   Rocket_form
 * @author    Softdiscover <info@softdiscover.com>
 * @copyright 2015 Softdiscover
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link      https://softdiscover.com/zigaform/wordpress-cost-estimator
 */
if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
?>
<div class="uiformc-tab-content-inner">
    <div id="zgfm-checkout-tab-container">
        <div class="sfdc-row ">
            <div class="sfdc-form-group">
                <div class="sfdc-col-md-4">
                    <label for=""><?php echo __('Enable Payment', 'FRocket_admin'); ?></label>
                </div>
                <div class="sfdc-col-md-8">
                    <input class="switch-field"
                        id="uifm_frm_main_paymentst"
                        name="uifm_frm_main_paymentst"
                        type="checkbox" />
                    <a href="javascript:void(0);"
                        data-toggle="tooltip" data-placement="right"
                        data-original-title="<?php echo __('it will allow to show a payment page after submitting form', 'FRocket_admin'); ?>"><span class="fa fa-question-circle"></span></a>
                </div>
            </div>
        </div>
        <div class="space10 zgfm-opt-divider-stl1"></div>

        <div class="sfdc-row ">

            <div class="sfdc-form-group">
                <div class="sfdc-col-md-4">
                    <label for=""><?php echo __('Allow users to download PDFs (Invoice and Record)', 'FRocket_admin'); ?></label>
                </div>
                <div class="sfdc-col-md-8">

                    <input class="switch-field"
                        id="uifm_frm_main_pdf_show_onpage"
                        name="uifm_frm_main_pdf_show_onpage"
                        type="checkbox" />
                    <a href="javascript:void(0);"
                        data-toggle="tooltip" data-placement="right"
                        data-original-title="<?php echo __('this will be shown in the payment page', 'FRocket_admin'); ?>"><span class="fa fa-question-circle"></span></a>
                </div>
            </div>
        </div>
        <div class="space10 zgfm-opt-divider-stl1"></div>
        <div class="uiform-set-field-wrap">
            <div class="sfdc-row">
                <div class="sfdc-form-group">
                    <div class="sfdc-col-md-4">
                        <label><?php echo __('Enable Payment Method Management', 'FRocket_admin'); ?></label>
                    </div>
                    <div class="sfdc-col-md-8">
                        <input
                            class="switch-field"
                            id="uifm_frm_payment_method_enable"

                            <?php
                            if (isset($uifm_frm_payment_method_enable)) {
                                echo (intval($uifm_frm_payment_method_enable) === 1) ? 'checked' : '';
                            }
                            ?>
                            type="checkbox" />
                    </div>
                </div>
            </div>
            <div id="uifm-tab-inner-payment-method-3">
                <div class="space10 zgfm-opt-divider-stl1"></div>
                <div class="sfdc-form-group">
                    <label class="sfdc-control-label" for="">
                        <?php echo __('Select payment methods ', 'FRocket_admin'); ?>
                    </label>
            
                    <?php foreach ($payment_methods_available as $key => $value) { ?>
                        <div class="sfdc-checkbox">
                            <label>
                                <input type="checkbox" class="zgfm_main_payment_methods" value="<?php echo esc_attr($value->pg_id); ?>">
                                <?php echo esc_html($value->pg_name); ?>
                                
                            </label>
                            <?php if(intval($value->pg_id) !== 1){?>
                            <i class="toggle-icon fa fa-chevron-down fa-chevron-up"></i>
                            <?php } ?>
                        </div>
                        
                        <?php
                        switch (intval($value->pg_id)) {
                            case 2:
                                ?>
                                <!-- Accordion section for additional options (initially hidden) -->
                                <div class="payment-options" id="payment-options-<?php echo esc_attr($value->pg_id); ?>" style="display: none; margin-left: 20px;">
                                    <label><?php echo __('Return URL', 'FRocket_admin'); ?>:</label>
                                    <input type="text" id="zgfm_payment_paypal_return_url" class="sfdc-form-control" placeholder="<?php echo __('Enter Return URL', 'FRocket_admin'); ?>">
                    
                                    <label><?php echo __('Cancel URL', 'FRocket_admin'); ?>:</label>
                                    <input type="text" id="zgfm_payment_paypal_cancel_url" class="sfdc-form-control" placeholder="<?php echo __('Enter Cancel URL', 'FRocket_admin'); ?>">
                                </div>
                                <?php
                                break;
                            default:
                                # code...
                                break;
                        }
                        
                        ?>
                        
                    <?php } ?>
                </div>
            </div>


        </div>
    </div>
</div>
<script>
jQuery(document).ready(function ($) {
    
    // Event handler for change event
    $('.zgfm_main_payment_methods').change(function () {
        rocketform.togglePaymentOption($(this), this.checked);
    });
     
     $('#uifm_frm_payment_method_enable').on('switchChange.bootstrapSwitchZgpb', function (event, state) {
            var f_val = (state) ? 1 : 0;
            if (f_val === 1) {
                $('#uifm-tab-inner-payment-method-3').show();
            } else {
                $('#uifm-tab-inner-payment-method-3').hide();
            }
        });

        var selectedValue = $('#uifm_frm_payment_method_enable').bootstrapSwitchZgpb('state');
        if (selectedValue) {
            $('#uifm-tab-inner-payment-method-3').show();
        } else {
            $('#uifm-tab-inner-payment-method-3').hide();
        }
});



</script>