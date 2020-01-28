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
ob_start();
?>
 <?php $defaul_class='sfdc-form-control uifm-input2-opt-main ';
if(intval($input2['style_type'])===1){
    $defaul_class='rockfm-input2-sel-styl1';
}
?>
<div data-uifm-tabnum="<?php echo $tab_num;?>"
     data-theme-type="<?php echo $input2['style_type'];?>"
     data-theme-stl1-txtnosel="<?php echo isset($input2['stl1']['txt_noselected'])?$input2['stl1']['txt_noselected']:'';?>"
     data-theme-stl1-txtnomatch="<?php echo isset($input2['stl1']['txt_noresult'])?$input2['stl1']['txt_noresult']:'';?>"
     data-theme-stl1-txtcountsel="<?php echo isset($input2['stl1']['txt_countsel'])?$input2['stl1']['txt_countsel']:'';?>"
     class="rockfm-input2-wrap"> 
    <select class="<?php echo $defaul_class;?>"
            name="uiform_fields[<?php echo $id;?>][]"
             multiple
            >
<?php

foreach ($input2['options'] as $key => $value) {
    $checked='';
    if(isset($value['checked']) && intval($value['checked'])===1){
    $checked='selected';    
    }
    ?>
    <option <?php echo $checked;?>
        value="<?php if(!empty($value['value'])){
         echo $key;   
        }?>"
        data-uifm-inp-val="<?php if(isset($value['value'])){
         echo Uiform_Form_Helper::sanitizeInput($value['value']);   
        }?>"
        data-uifm-inp-price="<?php echo (isset($value['price']))?$value['price']:'';?>"
        data-opt-index="<?php echo $key;?>" ><?php echo $value['label'];?></option>
<?php
}
?>
    </select>
    <?php
    if(isset($price['lbl_show_st']) && intval($price['lbl_show_st'])===1){
        $tmp_price_label=urldecode($price['lbl_show_format']);
            if(!empty($tmp_price_label)){
        ?>
   <span class="rockfm-inp2-opt-price-lbl"><?php echo $tmp_price_label;?></span>
    <?php
            }
    }
    ?>
</div>
<?php
$cntACmp = ob_get_contents();
$cntACmp = Uiform_Form_Helper::sanitize_output($cntACmp);
ob_end_clean();

echo $cntACmp;
?>