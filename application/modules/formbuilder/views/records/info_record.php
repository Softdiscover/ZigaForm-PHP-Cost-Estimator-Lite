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
<div id="uiform-container" class="uiform-wrap uiform-page_records">
    <input type="hidden" id="rec_id" value="<?php echo $record_id;?>">
    <?php if(isset($fmb_rec_tpl_st) && intval($fmb_rec_tpl_st)===0){?>
    <div id="uiform-inforecord-container">
         <div class="space20"></div>
    <div class="sfdc-row">
        <div class="sfdc-col-md-6">
            <div class="uifm-inforecord-box-info clearfix">
                <h1><?php echo $form_name;?></h1>
                <h4 class="zgfm-no-margin zgfm-margin-bottom-20"><?php echo __('Submitted form data','FRocket_admin');?></h4>
               
                <?php echo  $record_info_str;?>  
                
                  <?php if(isset($form_subtotal_amount) && floatval($form_subtotal_amount)>0){?>
                    <span class="uiform-inforecord-subtotal-amount"><b><?php echo __('Sub total','frocket_front');?></b> : <?php echo Uiform_Form_Helper::cformat_numeric($price_format,$form_subtotal_amount);?></span>
                     <br>
                 <?php } ?>
                   
                <?php if(isset($form_tax) && floatval($form_tax)>0){?>
                    <span class="uiform-inforecord-tax"><b><?php echo __('Tax','frocket_front');?></b> : <?php echo Uiform_Form_Helper::cformat_numeric($price_format,$form_tax);?></span>
                    <br>
                 <?php } ?>
                    
                 <?php if(floatval($form_total_amount)>0){?>
                    <span class="uiform-inforecord-total-amount"><b><?php echo __('Total','frocket_front');?></b> : <?php echo Uiform_Form_Helper::cformat_numeric($price_format,$form_total_amount).' '.$form_currency;?></span>
                 <?php } ?>
            </div>
        </div>
        <div class="sfdc-col-md-6">
            <div class="uifm-inforecord-box-info2">
                <h3><?php echo __('Additional info','FRocket_admin');?></h3>
                <ul >
                    <li>
                        <b><?php echo __('Date','FRocket_admin');?></b>:
                        <span><?php echo $info_date;?></span>
                    </li>
                    <li>
                        <b><?php echo __('IP','FRocket_admin');?></b>:
                        <span><?php echo $info_ip;?></span>
                    </li>
                    <li>
                        <b><?php echo __('Client PC info','FRocket_admin');?></b>:
                        <span ><?php echo $info_useragent;?></span>
                    </li>
                    <li>
                        <b><?php echo __('URL page','FRocket_admin');?></b>:
                        <span><?php echo $info_referer;?></span>
                    </li>
                    <li>
                        <b><?php echo __('Form name','FRocket_admin');?></b>:
                        <span><?php echo $form_name;?></span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    </div>
    
    <?php }else{
        
        echo $custom_template;
        
    }?>
    <div class="space10"></div>
   <div class="sfdc-row">
       <div class="sfdc-col-md-12">
         <?php if(ZIGAFORM_C_LITE == 1){ ?>
       <a 
    onclick="javascript:rocketform.showFeatureLocked(this);"
                  data-blocked-feature="PDF export"
                   href="javascript:void(0);"
    class="sfdc-btn sfdc-btn-warning"><i class="fa fa-file-pdf-o"></i> <?php echo __('Export to PDF','FRocket_admin');?> <span class="rkfm-express-lock-wrap" 
                         ><i class="fa fa-lock"></i></span></a>
        <?php }else{ ?>
           
            <a 
    href="javascript:void(0);"
    onclick="javascript:rocketform.genpdf_inforecord(<?php echo $record_id;?>);"
    class="sfdc-btn sfdc-btn-warning"><i class="fa fa-file-pdf-o"></i> <?php echo __('Export to PDF','FRocket_admin');?></a>
        <?php } ?> 
           

       </div>
   </div>
</div>