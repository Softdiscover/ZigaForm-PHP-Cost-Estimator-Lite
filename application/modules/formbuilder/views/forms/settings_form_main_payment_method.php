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
if ( ! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
 
?>
<div class="uiform-set-field-wrap">
    
    
                                <div class="sfdc-row">
                                        <div class="sfdc-col-md-12">
                                            <div class="sfdc-form-group">
                                                <label ><?php echo __('Enable Payment Method management', 'FRocket_admin'); ?></label>
                                                <div class="sfdc-col-md-12">
                                                    <input 
                                                        class="switch-field"
                                                        id="uifm_frm_payment_method_enable" 
                                                        
                                                        <?php
                                                        if ( isset($uifm_frm_payment_method_enable)) {
                                                            echo ( intval($uifm_frm_payment_method_enable) === 1 ) ? 'checked' : '';
                                                        }
                                                        ?>
                                                        
                                                        type="checkbox"/>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
    
    
    
                                    <div id="uifm-tab-inner-payment-method-3" >
                                         <div class="space10 zgfm-opt-divider-stl1"></div>
                                    
                                          
                                                <div class="sfdc-form-group">

                                                    <label class="sfdc-control-label" for="">
                                                        <?php echo __('Select payment methods ', 'FRocket_admin'); ?>
                                                    </label>
                                                    
                                                        <?php foreach ( $payment_methods_available as $key => $value) { ?>
                                                            <div class="sfdc-checkbox">
                                                                <label>
                                                                    <input type="checkbox" class="zgfm_main_payment_methods" value="<?php echo esc_attr($value->pg_id); ?>">
                                                                    <?php echo esc_html($value->pg_name); ?>
                                                                </label>
                                                            </div>
                                                        <?php } ?>
                                                    
                                                </div>
                                           
                                    </div>    
</div>
<script type="text/javascript">
//<![CDATA[

 
jQuery(document).ready(function ($) {
    
 
  /* attach custom pdf to client*/
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


//]]>
</script>
