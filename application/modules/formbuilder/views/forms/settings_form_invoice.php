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
 * @link      http://wordpress-cost-estimator.zigaform.com
 */
if (!defined('BASEPATH')) {exit('No direct script access allowed');}
?>

<div class="uiform-set-field-wrap" id="uiform-set-form-invoice">
   <div class="sfdc-row">
        <div class="sfdc-col-sm-6">
            <div class="sfdc-form-group">
                    <label for=""><?php echo __('From - text 1','FRocket_admin'); ?>
                    <a href="javascript:void(0);"
                       data-toggle="tooltip" data-placement="right" data-original-title="<?php echo __('this field will be located in the FROM zone','FRocket_admin'); ?>"
                       ><span class="fa fa-question-circle"></span></a>
                    </label>
                     <input type="text" 
                            id="uifm_frm_inv_from_text1"
                            value=""
                            name="uifm_frm_inv_from_text1" 
                            placeholder="<?php echo __('Here goes your text','FRocket_admin'); ?>"  class="sfdc-form-control">   
            </div>
        </div>
       <div class="sfdc-col-sm-6">
            <div class="sfdc-form-group">
                    <label for=""><?php echo __('To - text 1','FRocket_admin'); ?>
                    <a href="javascript:void(0);"
                       data-toggle="tooltip" data-placement="right" data-original-title="<?php echo __('this field will be located in the TO zone','FRocket_admin'); ?>"
                       ><span class="fa fa-question-circle"></span></a>
                    </label>
                <select 
                        class="sfdc-form-control uifm_frm_inv_to_text_src"
                        data-uifm-nro="1"
                        data-uifm-firstoption="<?php echo __('Select Field','FRocket_admin'); ?>"
                        id="uifm_frm_inv_to_text1"
                            name="uifm_frm_inv_to_text1" >
                                <option value="" selected><?php echo __('Select Field','FRocket_admin'); ?></option>
                    </select>
                      
            </div>
        </div>
    </div>
   <div class="sfdc-row">
        <div class="sfdc-col-sm-6">
            <div class="sfdc-form-group">
                    <label for=""><?php echo __('From - text 2','FRocket_admin'); ?>
                    <a href="javascript:void(0);"
                       data-toggle="tooltip" data-placement="right" data-original-title="<?php echo __('this field will be located in the FROM zone','FRocket_admin'); ?>"
                       ><span class="fa fa-question-circle"></span></a>
                    </label>
                     <input type="text" 
                            id="uifm_frm_inv_from_text2"
                            value=""
                            name="uifm_frm_inv_from_text2" 
                            placeholder="<?php echo __('Here goes your text','FRocket_admin'); ?>"  class="sfdc-form-control">   
            </div>
        </div>
       <div class="sfdc-col-sm-6">
            <div class="sfdc-form-group">
                    <label for=""><?php echo __('To - text 2','FRocket_admin'); ?>
                    <a href="javascript:void(0);"
                       data-toggle="tooltip" data-placement="right" data-original-title="<?php echo __('this field will be located in the TO zone','FRocket_admin'); ?>"
                       ><span class="fa fa-question-circle"></span></a>
                    </label>
                <select 
                        class="sfdc-form-control uifm_frm_inv_to_text_src"
                        data-uifm-nro="2"
                        data-uifm-firstoption="<?php echo __('Select Field','FRocket_admin'); ?>"
                        id="uifm_frm_inv_to_text2"
                            name="uifm_frm_inv_to_text2" >
                                <option value="" selected><?php echo __('Select Field','FRocket_admin'); ?></option>
                    </select>
                     
            </div>
        </div>
    </div>
    <div class="sfdc-row">
        <div class="sfdc-col-sm-6">
            <div class="sfdc-form-group">
                    <label for=""><?php echo __('From - text 3','FRocket_admin'); ?>
                    <a href="javascript:void(0);"
                       data-toggle="tooltip" data-placement="right" data-original-title="<?php echo __('this field will be located in the FROM zone','FRocket_admin'); ?>"
                       ><span class="fa fa-question-circle"></span></a>
                    </label>
                     <input type="text" 
                            id="uifm_frm_inv_from_text3"
                            value=""
                            name="uifm_frm_inv_from_text3" 
                            placeholder="<?php echo __('Here goes your text','FRocket_admin'); ?>"  class="sfdc-form-control">   
            </div>
        </div>
       <div class="sfdc-col-sm-6">
            <div class="sfdc-form-group">
                    <label for=""><?php echo __('To - text 3','FRocket_admin'); ?>
                    <a href="javascript:void(0);"
                       data-toggle="tooltip" data-placement="right" data-original-title="<?php echo __('this field will be located in the TO zone','FRocket_admin'); ?>"
                       ><span class="fa fa-question-circle"></span></a>
                    </label>
                <select 
                        class="sfdc-form-control uifm_frm_inv_to_text_src"
                        data-uifm-nro="3"
                        data-uifm-firstoption="<?php echo __('Select Field','FRocket_admin'); ?>"
                        id="uifm_frm_inv_to_text3"
                            name="uifm_frm_inv_to_text3" >
                                <option value="" selected><?php echo __('Select Field','FRocket_admin'); ?></option>
                    </select>
                     
            </div>
        </div>
    </div>
    <div class="sfdc-row">
        <div class="sfdc-col-sm-6">
            <div class="sfdc-form-group">
                    <label for=""><?php echo __('From - text 4','FRocket_admin'); ?>
                    <a href="javascript:void(0);"
                       data-toggle="tooltip" data-placement="right" data-original-title="<?php echo __('this field will be located in the FROM zone','FRocket_admin'); ?>"
                       ><span class="fa fa-question-circle"></span></a>
                    </label>
                
                     <input type="text" 
                            id="uifm_frm_inv_from_text4"
                            value=""
                            name="uifm_frm_inv_from_text4" 
                            placeholder="<?php echo __('Here goes your text','FRocket_admin'); ?>"  class="sfdc-form-control">   
            </div>
        </div>
       <div class="sfdc-col-sm-6">
            <div class="sfdc-form-group">
                    <label for=""><?php echo __('To - text 4','FRocket_admin'); ?>
                    <a href="javascript:void(0);"
                       data-toggle="tooltip" data-placement="right" data-original-title="<?php echo __('this field will be located in the TO zone','FRocket_admin'); ?>"
                       ><span class="fa fa-question-circle"></span></a>
                    </label>
                 <select 
                        class="sfdc-form-control uifm_frm_inv_to_text_src"
                        data-uifm-nro="4"
                        data-uifm-firstoption="<?php echo __('Select Field','FRocket_admin'); ?>"
                        id="uifm_frm_inv_to_text4"
                            name="uifm_frm_inv_to_text4" >
                                <option value="" selected><?php echo __('Select Field','FRocket_admin'); ?></option>
                    </select>
            </div>
        </div>
    </div>
      <div class="sfdc-row">
        <div class="sfdc-col-sm-6">
            <div class="sfdc-form-group">
                    <label for=""><?php echo __('From - text 5','FRocket_admin'); ?>
                    <a href="javascript:void(0);"
                       data-toggle="tooltip" data-placement="right" data-original-title="<?php echo __('this field will be located in the FROM zone','FRocket_admin'); ?>"
                       ><span class="fa fa-question-circle"></span></a>
                    </label>
                     <input type="text" 
                            id="uifm_frm_inv_from_text5"
                            value=""
                            name="uifm_frm_inv_from_text5" 
                            placeholder="<?php echo __('Here goes your text','FRocket_admin'); ?>"  class="sfdc-form-control">   
            </div>
        </div>
       <div class="sfdc-col-sm-6">
            <div class="sfdc-form-group">
                    <label for=""><?php echo __('To - text 5','FRocket_admin'); ?>
                    <a href="javascript:void(0);"
                       data-toggle="tooltip" data-placement="right" data-original-title="<?php echo __('this field will be located in the TO zone','FRocket_admin'); ?>"
                       ><span class="fa fa-question-circle"></span></a>
                    </label>
                     <input type="text" 
                            id="uifm_frm_inv_to_text5"
                            value=""
                            name="uifm_frm_inv_to_text5" 
                            placeholder="<?php echo __('Here goes your text','FRocket_admin'); ?>"  class="sfdc-form-control">   
            </div>
        </div>
    </div>
    
     <?php if(ZIGAFORM_C_LITE == 1){ ?>
        <div id="zgfm-blocked-feature-pdf-box">
        <?php $message= __('Invoice','FRocket_admin');?>
                <?php include(APPPATH . '/modules/formbuilder/views/settings/blocked_getmessage.php');?>
            </div>
        <?php }else{ ?>
           
            
        <?php } ?>
</div>

