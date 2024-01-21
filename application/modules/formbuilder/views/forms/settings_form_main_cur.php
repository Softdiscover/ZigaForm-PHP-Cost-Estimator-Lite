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
<div class="uiform-set-field-wrap" >
  <div class="space20"></div>
    <div class="sfdc-row">
        <div class="sfdc-col-md-12">
            <div class="sfdc-form-group">
                    <div class="sfdc-col-sm-4">
                        <label for=""><?php echo __('CURRENCY CODE', 'FRocket_admin'); ?></label>
                    </div>
                    <div class="sfdc-col-sm-8">
                        <input type="text" 
                           class="sfdc-form-control zgfm-form-control" 
                           placeholder="" 
                           name="uifm_frm_main_price_currency"
                           id="uifm_frm_main_price_currency"
                           > <a href="javascript:void(0);"
                       data-toggle="tooltip" data-placement="right" 
                       data-original-title="<?php echo __('it allow you choose currency code', 'FRocket_admin'); ?>"
                       ><span class="fa fa-question-circle"></span></a>
                    </div>
            </div>
        </div>
         <div class="space10 zgfm-opt-divider-stl1"></div>
        <div class="sfdc-col-md-12">
            <div class="sfdc-form-group">
                <div class="sfdc-col-sm-4">
                         <label for=""><?php echo __('CURRENCY SYMBOL', 'FRocket_admin'); ?></label>
                  </div>
                 <div class="sfdc-col-sm-8">
                         <input type="text" 
                           class="sfdc-form-control zgfm-form-control" 
                           placeholder="" 
                           name="uifm_frm_main_price_currency_symbol"
                           id="uifm_frm_main_price_currency_symbol"
                           > <a href="javascript:void(0);"
                            data-toggle="tooltip" data-placement="right" 
                            data-original-title="<?php echo __('it allow you choose currency symbol', 'FRocket_admin'); ?>"
                            ><span class="fa fa-question-circle"></span></a>
                </div>   
                    
                    
                      
            </div>
        </div>
    </div>
    <div class="space10 zgfm-opt-divider-stl1"></div>
    <div class="sfdc-row">
        <div class="sfdc-col-md-12">
            <div class="sfdc-form-group">
                
                <div class="sfdc-col-sm-4">
                 <label for=""><?php echo __('PRICE FORMAT', 'FRocket_admin'); ?></label>
                  </div>
                <div class="sfdc-col-sm-8">
                    <input class="switch-field"
                                   id="uifm_frm_main_price_format_st"
                                   name="uifm_frm_main_price_format_st"
                                   type="checkbox"/> <a href="javascript:void(0);"
                        data-toggle="tooltip" data-placement="right" 
                        data-original-title="<?php echo __('it allows to put decimal and thousand options', 'FRocket_admin'); ?>"
                        ><span class="fa fa-question-circle"></span></a>
                  </div> 
            </div>
        </div>
         <div class="space10 zgfm-opt-divider-stl1"></div>
        <div class="sfdc-col-md-12">
            <div class="sfdc-form-group">
                <div class="sfdc-col-sm-4">
                        <label for=""><?php echo __('PRICE DECIMAL SEPARATOR', 'FRocket_admin'); ?></label>
                  </div>
                <div class="sfdc-col-sm-8">
                       <input type="text" 
                           class="sfdc-form-control zgfm-form-control" 
                           placeholder="" 
                           name="uifm_frm_main_price_decimal"
                           id="uifm_frm_main_price_decimal"
                           > <a href="javascript:void(0);"
                       data-toggle="tooltip" data-placement="right" 
                       data-original-title="<?php echo __('it allow you choose decimal separator', 'FRocket_admin'); ?>"
                       ><span class="fa fa-question-circle"></span></a> 
                  </div>
            </div>
        </div>
          <div class="space10 zgfm-opt-divider-stl1"></div>
        <div class="sfdc-col-md-12">
            <div class="sfdc-form-group">
                    <div class="sfdc-col-sm-4">
                        <label for=""><?php echo __('PRICE THOUSAND SEPARATOR', 'FRocket_admin'); ?></label>
                  </div>
                <div class="sfdc-col-sm-8">
                        <input type="text" 
                           class="sfdc-form-control zgfm-form-control" 
                           placeholder="" 
                           name="uifm_frm_main_price_thousand"
                           id="uifm_frm_main_price_thousand"
                           > <a href="javascript:void(0);"
                       data-toggle="tooltip" data-placement="right" 
                       data-original-title="<?php echo __('it allow you choose decimal thousand', 'FRocket_admin'); ?>"
                       ><span class="fa fa-question-circle"></span></a>
                  </div>
            </div>
        </div>
          <div class="space10 zgfm-opt-divider-stl1"></div>
        <div class="sfdc-col-md-12">
            <div class="sfdc-form-group">
                <div class="sfdc-col-sm-4">
                        <label for=""><?php echo __('PRICE PRECISION FOR DECIMAL PLACES', 'FRocket_admin'); ?> <a href="javascript:void(0);"
                       data-toggle="tooltip" data-placement="right" 
                       data-original-title="<?php echo __('it allow you choose currency precision for decimal places', 'FRocket_admin'); ?>"
                       ><span class="fa fa-question-circle"></span></a></label>
                  </div>
                <div class="sfdc-col-sm-8">
                     <input  
                        class="uifm_main_spinner_1"
                        name="uifm_frm_main_price_precision"
                        id="uifm_frm_main_price_precision"
                        type="text" > 
                  </div>
                    
                
            </div>
        </div>
           <div class="space10 zgfm-opt-divider-stl1"></div>
         <div class="sfdc-col-md-12">
            <div class="sfdc-form-group">
                
                <div class="sfdc-col-sm-4">
                 <label for=""><?php echo __('ENABLE TAX', 'FRocket_admin'); ?></label>
                  </div>
                <div class="sfdc-col-sm-8">
                    <input class="switch-field"
                                   id="uifm_frm_main_price_tax_st"
                                   name="uifm_frm_main_price_tax_st"
                                   type="checkbox"/> <a href="javascript:void(0);"
                        data-toggle="tooltip" data-placement="right" 
                        data-original-title="<?php echo __('Enable tax option', 'FRocket_admin'); ?>"
                        ><span class="fa fa-question-circle"></span></a>
                  </div> 
            </div>
        </div>
           
         <div class="space10 zgfm-opt-divider-stl1"></div>
        <div class="sfdc-col-md-12">
            <div class="sfdc-form-group">
                <div class="sfdc-col-sm-4">
                        <label for=""><?php echo __('TAX %(percentage)', 'FRocket_admin'); ?>  <a href="javascript:void(0);"
                       data-toggle="tooltip" data-placement="right" 
                       data-original-title="<?php echo __('Applied to the total cost', 'FRocket_admin'); ?>"
                       ><span class="fa fa-question-circle"></span></a> </label>
                  </div>
               <div class="sfdc-col-sm-8">
                        
                        
                        <input  
                        name="uifm_frm_main_price_tax_val"
                        id="uifm_frm_main_price_tax_val"
                        type="text" > 
                        
                        
                  </div>
            </div>
        </div>  
           
    </div>
    
</div>
