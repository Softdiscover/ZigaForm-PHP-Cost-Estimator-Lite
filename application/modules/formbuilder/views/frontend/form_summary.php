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
ob_start();
?>
 <div class="sfdc-row">
        <div class="sfdc-col-md-12">
            <div class="uifm-inforecord-box-info">
                <ul>
                    
              <?php

                foreach ( $record_info as $value) {
                    ?>
                    <?php if ( is_array($value['value'])) { ?>   
                 <li><b><?php echo $value['field']; ?></b> 
                     <ul>
                         <?php
                            foreach ( $value['value'] as $key2 => $value2) {
                                ?>
                         <li>
                                <?php

                                echo isset($value2['label']) ? $value2['label'] : '';

                                /*
                                if(isset($value2['qty']) && floatval($value2['qty'])>0){
                                echo ' &#8594 '.$value2['qty'].' '.__('Units','FRocket_admin').' &#8594 ';
                                }*/

                                if ( isset($value2['qty']) && floatval($value2['qty']) > 0 && ! empty($value2['label']) && floatval($value2['amount']) > 0) {
                                } elseif ( ! empty($value2['label']) && floatval($value2['amount']) > 0) {
                                    echo ' : ';
                                } else {
                                }
                                ?>
                                <?php
                                if ( isset($value2['amount']) && isset($value['price_lbl_show_st']) && intval($value['price_lbl_show_st']) === 1

                                     && floatval($value2['amount']) > 0) {
                                    ?>
                                    <?php echo Uiform_Form_Helper::cformat_numeric($price_format, $value2['amount']) . ' ' . $form_currency; ?>
                                <?php } ?>
                         </li>
                          
                            <?php } ?>
                     </ul>
                 </li>
                    <?php } else { ?>
                 <li><b><?php echo $value['field']; ?></b> : <?php echo $value['value']; ?></li>
                    <?php } ?>
                    <?php
                }
                ?>
                
                </ul> 
                
                <?php if ( isset($form_subtotal_amount) && floatval($form_subtotal_amount) > 0) { ?>
                    <span class="uiform-inforecord-subtotal-amount"><b><?php echo __('Sub total', 'frocket_front'); ?></b> : <?php echo Uiform_Form_Helper::cformat_numeric($price_format, $form_subtotal_amount); ?></span>
                      <br>
                <?php } ?>
                   
                <?php if ( isset($form_tax) && floatval($form_tax) > 0) { ?>
                    <span class="uiform-inforecord-tax"><b><?php echo __('Tax', 'frocket_front'); ?></b> : <?php echo Uiform_Form_Helper::cformat_numeric($price_format, $form_tax); ?></span>
                     <br>
                <?php } ?>
                    
                 <?php if ( floatval($form_total_amount) > 0) { ?>
                    <span class="uiform-inforecord-total-amount"><b><?php echo __('Total', 'frocket_front'); ?></b> : <?php echo Uiform_Form_Helper::cformat_numeric($price_format, $form_total_amount) . ' ' . $form_currency; ?></span>
                 <?php } ?>
                    
            </div>
        </div>
        
</div>
<?php
$cntACmp = ob_get_contents();
$cntACmp = Uiform_Form_Helper::sanitize_output($cntACmp);
ob_end_clean();
echo $cntACmp;
?>
