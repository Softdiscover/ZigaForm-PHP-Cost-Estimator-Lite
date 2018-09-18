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
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
ob_start();
?>
     <div class="sfdc-row">
    <div class="sfdc-col-sm-12">
        <div class="uifm_invoice_container">
            <h3><?php echo __('Invoice','frocket_front');?> #<?php echo $invoice_id; ?></h3>
            <span class="invoice_date"><?php echo __('Date','frocket_front');?>:<?php echo $invoice_date; ?></span>
            <br>
            <div class="sfdc-row"  style="margin-top:20px;">
                <div class="sfdc-col-sm-6">
                    <ul class="uifm_invoice_list_from">
                        <li>
                            <b><?php echo __('From','frocket_front');?></b>
                        </li>
                        <?php if(!empty($invoice_from_info1)){?>
                        <li>
                            <?php echo $invoice_from_info1; ?>
                        </li>
                        <?php }?>
                        <?php if(!empty($invoice_from_info2)){?>
                        <li>
                            <?php echo $invoice_from_info2; ?>
                        </li>
                        <?php }?>
                        <?php if(!empty($invoice_from_info3)){?>
                        <li>
                            <?php echo $invoice_from_info3; ?>
                        </li>
                        <?php }?>
                        <?php if(!empty($invoice_from_info4)){?>
                        <li>
                            <?php echo $invoice_from_info4; ?>
                        </li>
                        <?php }?>
                        <?php if(!empty($invoice_from_info5)){?>
                        <li>
                            <?php echo $invoice_from_info5; ?>
                        </li>
                        <?php }?>
                    </ul>
                </div>
                <div class="sfdc-col-sm-6">
                    <ul class="uifm_invoice_list_from">
                        <li>
                            <b><?php echo __('To','frocket_front');?></b>
                        </li>
                         <?php if(!empty($invoice_to_info1)){?>
                        <li>
                            <?php echo $invoice_to_info1; ?>
                        </li>
                        <?php }?>
                        <?php if(!empty($invoice_to_info2)){?>
                        <li>
                            <?php echo $invoice_to_info2; ?>
                        </li>
                        <?php }?>
                        <?php if(!empty($invoice_to_info3)){?>
                        <li>
                            <?php echo $invoice_to_info3; ?>
                        </li>
                        <?php }?>
                        <?php if(!empty($invoice_to_info4)){?>
                        <li>
                            <?php echo $invoice_to_info4; ?>
                        </li>
                        <?php }?>
                        <?php if(!empty($invoice_to_info5)){?>
                        <li>
                            <?php echo $invoice_to_info5; ?>
                        </li>
                        <?php }?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="table-responsive table-bordered  ">
        <table id="table-invoice" class="table table-striped dataTable" style="table-layout : fixed;" width="100%" >
            <tbody>
               
                  <?php if(isset($form_mathcalc_st) && intval($form_mathcalc_st)===1){?>
                 
                     <tr>
                    <th  style="width:10%;"><?php echo __('Item ID','frocket_front');?></th>
                 
                    <th  colspan="2" ><?php echo __('Description','frocket_front');?></th>
                    <th  style="width:15%;"><?php echo __('Amount','frocket_front');?></th>
                </tr>
               <?php }else{?>
                <tr>
                    <th  style="width:10%;"><?php echo __('Item ID','frocket_front');?></th>
                    <th  style="width:15%;" ><?php echo __('Quantity','frocket_front');?></th>
                    <th  style="" ><?php echo __('Description','frocket_front');?></th>
                    <th  style="width:15%;"><?php echo __('Amount','frocket_front');?></th>
                </tr>
                <?php }?>                                        
                
               
             </tbody> 
            <tbody>
                
                <?php if(isset($form_mathcalc_st) && intval($form_mathcalc_st)===1){?>
                
                    <?php if(!empty($record_info)){
                        
                        
                        
                        if(empty($form_subtotal_amount)){
                            $tmp_total=$form_total_amount;
                        }else{
                           $tmp_total= $form_subtotal_amount; 
                        }
                        
                        $tmp_counter=1;
                            foreach ($record_info as $key => $value) {
                                    if($tmp_counter==1){
                                        ?>
                                         <tr>
                                            <td><?php echo $tmp_counter;?></td>
                                            <td colspan="2"><?php echo $value['item_desc'];?></td>
                                            <td rowspan="3" style="border:1px solid #ccc;"><?php echo Uiform_Form_Helper::cformat_numeric($price_format,$tmp_total); ?>  </td>
                                          </tr>
                                       <?php
                                    }else{
                                       ?>
                                       <tr>
                                        <td><?php echo $tmp_counter;?></td>
                                        <td colspan="2"><?php echo $value['item_desc'];?></td>
                                      </tr> 
                                       <?php
                                        
                                    }
                                
                                    ?>
                                       
                                <?php
                                $tmp_counter++;
                            }
                        ?>
                    <?php }?> 
                 
                   
               <?php }else{?>
                        <?php if(!empty($record_info)){
                            foreach ($record_info as $key => $value) {
                                    ?>
                                        <tr>
                                            <td><?php echo $value['item_id'];?></td>
                                            <td><?php echo $value['item_qty'];?></td>
                                            <td><?php echo $value['item_desc'];?></td>
                                            <td><?php if(isset($value['item_amount'])){
                                                echo Uiform_Form_Helper::cformat_numeric($price_format,$value['item_amount']);
                                            }?></td>
                                        </tr> 
                                <?php
                            }
                        ?>
                    <?php }?>                 
               <?php }?>
                    </tbody>    
            <tfoot>
                <?php if(isset($form_tax_enable) && intval($form_tax_enable)===1){?>
                 <tr>
                    <th colspan="3" class="invoice_total_txt">
                        <?php echo __('Sub total','frocket_front');?>
                    </th>
                    <th class="uifm_invoice_amount_total">
                    <?php echo Uiform_Form_Helper::cformat_numeric($price_format,$form_subtotal_amount); ?>  
                    </th>
                </tr>
                <tr>
                    <th colspan="3" class="invoice_total_txt">
                        <?php echo __('Tax','frocket_front');?>
                    </th>
                    <th class="uifm_invoice_amount_total">
                    <?php echo Uiform_Form_Helper::cformat_numeric($price_format,$form_tax); ?>  
                    </th>
                </tr>
                <?php } ?>
                <tr>
                    <th colspan="3" class="invoice_total_txt">
                        <?php echo __('Invoice Total','frocket_front');?>
                    </th>
                    <th class="uifm_invoice_amount_total">
                    <?php echo Uiform_Form_Helper::cformat_numeric($price_format,$form_total_amount); ?> <?php echo $form_currency; ?>
                    </th>
                </tr>
            </tfoot>
        </table>
        </div>
    </div>

</div>

<?php
$cntACmp = ob_get_contents();
$cntACmp = Uiform_Form_Helper::sanitize_output($cntACmp);
ob_end_clean();
echo $cntACmp;
?>