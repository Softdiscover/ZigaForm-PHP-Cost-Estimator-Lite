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
<?php
ob_start();
?>
<div class='sfdc-wrap'>
    
    <div id="zgfm-modal-calc-container">
            <div class="sfdc-alert sfdc-alert-info">
                <strong><?php echo __('Info!', 'FRocket_admin'); ?></strong> <?php echo __('Choose your variable. Under Frontend tab, you will find variables to be used on frontend and Under Backend tab, you will find variables to be used in mail notification or Submission message', 'FRocket_admin'); ?>
              </div>
    <ul role="tablist" class="sfdc-nav sfdc-nav-tabs">
                      <li class="sfdc-active"><a data-toggle="sfdc-tab" role="tab" href="#zgfm-modal-calc-tab-1" aria-expanded="true"><?php echo __('Backend', 'FRocket_admin'); ?></a></li>
                      <li><a data-toggle="sfdc-tab" role="tab" href="#zgfm-modal-calc-tab-2" aria-expanded="true"><?php echo __('Frontend', 'FRocket_admin'); ?></a></li>
                    </ul>
                    <div class="sfdc-tab-content">
                        <div id="zgfm-modal-calc-tab-1" class="sfdc-tab-pane sfdc-in sfdc-active">
                            <h3><?php echo __('Fields', 'FRocket_admin'); ?></h3>
                            <?php require 'ajax_variables_emailpage.php'; ?>
                            
                             <h3><?php echo __('Others', 'FRocket_admin'); ?></h3>
                             <div class="zgfm-modal-calc-wrap-table">
                               <table class="sfdc-table sfdc-table-striped sfdc-table-bordered sfdc-table-condensed uifm-tab-box-vars-2">
                                    <thead>
                                        <tr>
                                            <th width="150"><?php echo __('variables', 'FRocket_admin'); ?></th>
                                            <th><?php echo __('Code', 'FRocket_admin'); ?></th>
                                        </tr>

                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?php echo __('Currency symbol', 'FRocket_admin'); ?></td>
                                            <td><textarea onclick="this.select();">[uifm_var opt="form_cur_symbol"]</textarea></td>

                                        </tr>
                                        <tr>
                                            <td><?php echo __('Currency code', 'FRocket_admin'); ?></td>
                                            <td><textarea onclick="this.select();">[uifm_var opt="form_cur_code"]</textarea></td>

                                        </tr>
                                        <tr>
                                            <td><?php echo __('Sub total Amount price', 'FRocket_admin'); ?></td>
                                            <td><textarea onclick="this.select();">[uifm_var opt="form_subtotal_amount"]</textarea></td>
                                        </tr>
                                        <tr>
                                            <td><?php echo __('Tax', 'FRocket_admin'); ?></td>
                                            <td><textarea onclick="this.select();">[uifm_var opt="form_tax_amount"]</textarea></td>
                                        </tr>
                                        <tr>
                                            <td><?php echo __('Total Amount price', 'FRocket_admin'); ?></td>
                                            <td><textarea onclick="this.select();">[uifm_var opt="form_total_amount"]</textarea></td>
                                        </tr>
                                        <tr>
                                            <td><?php echo __('Summary of submitted data', 'FRocket_admin'); ?></td>
                                            <td>
                                                            <p><?php echo __('Default, it shows units and total price', 'FRocket_admin'); ?></p>
                                                            <textarea style="width:298px;" onclick="this.select();">[uifm_var opt="rec_summ"]</textarea>
                                                            
                                                            <p><?php echo __('it shows without units', 'FRocket_admin'); ?></p>
                                                            <textarea style="width:298px;" onclick="this.select();">[uifm_var opt="rec_summ" atr2="show_only_value" ]</textarea>
                                                            
                                                            <p><?php echo __('it shows without units and total', 'FRocket_admin'); ?></p>
                                                            <textarea style="width:100%;" onclick="this.select();">[uifm_var opt="rec_summ" atr2="show_only_value" atr3="hide_total" ]</textarea>
                                                            
                                                        </td>
                                        </tr>
                                        <tr>
                                            <td><?php echo __('Form Url', 'FRocket_admin'); ?></td>
                                            <td><textarea onclick="this.select();" style="width:298px;">[uifm_var opt="rec_url_fm"]</textarea></td>
                                        </tr>
                                        <tr>
                                            <td><?php echo __('Form name', 'FRocket_admin'); ?></td>
                                            <td><textarea onclick="this.select();" style="width: 284px;">[uifm_var opt="form_name"]</textarea></td>
                                        </tr>

                                        <tr>
                                            <td><?php echo __('Form record id', 'FRocket_admin'); ?></td>
                                            <td><textarea onclick="this.select();" style="width: 284px;">[uifm_var opt="rec_id"]</textarea></td>
                                        </tr>
                                        <tr>
                                            <td><?php echo __('User IP', 'FRocket_admin'); ?></td>
                                            <td><textarea onclick="this.select();">[uifm_var opt="user_ip"]</textarea></td>
                                        </tr>
                                    </tbody>
                                </table>  
                             </div>
                          <h3><?php echo __('Invoice', 'FRocket_admin'); ?></h3>
                           <div class="zgfm-modal-calc-wrap-table">
                               <table class="sfdc-table sfdc-table-striped sfdc-table-bordered sfdc-table-condensed uifm-tab-box-vars-2">
                                                <thead>
                                                    <tr>
                                                        <th width="150"><?php echo __('variables', 'FRocket_admin'); ?></th>
                                                        <th ><?php echo __('Code', 'FRocket_admin'); ?></th>
                                                    </tr>
                                                    
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><?php echo __('Invoice Number', 'FRocket_admin'); ?></td>
                                                        <td><textarea onclick="this.select();">[uifm_var opt="form_inv_number"]</textarea></td>
                                                        
                                                    </tr>
                                                    <tr>
                                                        <td><?php echo __('Invoice date', 'FRocket_admin'); ?></td>
                                                        <td><textarea onclick="this.select();">[uifm_var opt="form_inv_date"]</textarea></td>
                                                        
                                                    </tr>

                                                </tbody>
                                            </table>
                           </div>
                            <h3><?php echo __('Calculation', 'FRocket_admin'); ?></h3>
                            <div class="zgfm-modal-calc-wrap-table">
                                <table class="sfdc-table sfdc-table-striped sfdc-table-bordered sfdc-table-condensed uifm-tab-box-vars-2" id="zgfm-tbl-calc-variables">
                                <thead>
                                    <tr>
                                        <th width="150"><?php echo __('Calculation variables', 'FRocket_admin'); ?></th>
                                        <th><?php echo __('Code', 'FRocket_admin'); ?></th>
                                        <th><?php echo __('Wrapper', 'FRocket_admin'); ?> <a data-original-title="<?php echo __('you can use this to show content depending if the calculation variable has a value. if it does not have a value, the content inside this shortcode will not appear. ', 'FRocket_admin'); ?>" data-placement="right" data-toggle="tooltip" href="javascript:void(0);"><span class="fa fa-question-circle"></span></a></th>
                                    </tr>

                                </thead>
                                <tbody>
                                    <?php
                                    if ( ! empty($fmb_data['calculation']['variables'])) {
                                        foreach ( $fmb_data['calculation']['variables'] as $key => $value) {
                                            ?>
                                    <tr>
                                        <td> <?php echo $value['tab_title']; ?></td>
                                        <td><textarea onclick="this.select();" style="width: 284px;">[uifm_var opt="calc" atr1="<?php echo $value['id']; ?>"]</textarea></td>
                                        <td><textarea onclick="this.select();" style="width: 284px;">[uifm_wrap opt="calc" atr1="<?php echo $value['id']; ?>"]here goes your content if calc variable have some value. if no value, this will not appear.[/uifm_wrap]</textarea></td>
                                    </tr>
                                            <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                            </div>
                        </div>
                        <div id="zgfm-modal-calc-tab-2" class="sfdc-tab-pane">
                            
                           <h3><?php echo __('Fields', 'FRocket_admin'); ?></h3>
                            <div class="zgfm-modal-calc-wrap-table">
                                <table class="sfdc-table sfdc-table-striped sfdc-table-bordered sfdc-table-condensed uifm-tab-box-vars-1">
                                    <thead>
                                        <tr>
                                            <th rowspan="2"><?php echo __('Field', 'FRocket_admin'); ?></th>
                                            <th colspan="4"><?php echo __('Codes', 'FRocket_admin'); ?></th>
                                        </tr>
                                        <tr>
                                            <th><?php echo __('label', 'FRocket_admin'); ?></th>
                                            <th><?php echo __('input', 'FRocket_admin'); ?></th>
                                            <th><?php echo __('Cost', 'FRocket_admin'); ?></th>
                                            <th><?php echo __('quantity', 'FRocket_admin'); ?></th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        if ( ! empty($fmb_data)) {
                                            foreach ( $fmb_data['steps_src'] as $key => $value) {
                                                foreach ( $value as $key2 => $value2) {
                                                    switch ( intval($value2['type'])) {
                                                        case 6:
                                                        case 7:
                                                        case 12:
                                                        case 13:
                                                        case 15:
                                                        case 17:
                                                        case 22:
                                                        case 23:
                                                        case 24:
                                                        case 25:
                                                        case 26:
                                                        case 28:
                                                        case 29:
                                                        case 30:
                                                            ?>
                                       <!-- <tr>
                                            <td><?php echo $value2['field_name']; ?></td>
                                            <td><textarea onclick="this.select();" class="uifm_txtarea_var">[zgfm_rfvar id="<?php echo $value2['id']; ?>" atr1="label"]</textarea></td>
                                            <td><textarea onclick="this.select();" class="uifm_txtarea_var">[zgfm_rfvar id="<?php echo $value2['id']; ?>" atr1="input"]</textarea></td>
                                            <td></td>
                                            <td></td>
                                            
                                        </tr>-->
                                                                             <?php

                                                            break;

                                                        case 8:
                                                        case 9:
                                                        case 10:
                                                        case 11:
                                                        case 16:
                                                        case 18:
                                                        case 40:
                                                            ?>
                                        <tr>
                                            <td><?php echo $value2['field_name']; ?></td>
                                            <td><textarea onclick="this.select();" class="uifm_txtarea_var">[zgfm_rfvar id="<?php echo $value2['id']; ?>" atr1="label"]</textarea></td>
                                            <td><textarea onclick="this.select();" class="uifm_txtarea_var">[zgfm_rfvar id="<?php echo $value2['id']; ?>" atr1="input"]</textarea></td>
                                            <td><textarea onclick="this.select();" class="uifm_txtarea_var">[zgfm_rfvar id="<?php echo $value2['id']; ?>" atr1="amount"]</textarea></td>
                                            <td></td>
                                            
                                        </tr>
                                                                                    <?php
                                                            break;
                                                        case 41:
                                                        case 42:
                                                            ?>
                                        <!--<tr>
                                            <td><?php echo $value2['field_name']; ?></td>
                                            <td><textarea onclick="this.select();" class="uifm_txtarea_var">[zgfm_rfvar id="<?php echo $value2['id']; ?>" atr1="label"]</textarea></td>
                                            <td><textarea onclick="this.select();" class="uifm_txtarea_var">[zgfm_rfvar id="<?php echo $value2['id']; ?>" atr1="input"]</textarea></td>
                                            <td><textarea onclick="this.select();" class="uifm_txtarea_var">[zgfm_rfvar id="<?php echo $value2['id']; ?>" atr1="amount"]</textarea></td>
                                            <td><textarea onclick="this.select();" class="uifm_txtarea_var">[zgfm_rfvar id="<?php echo $value2['id']; ?>" atr1="qty"]</textarea></td>
                                            
                                        </tr>-->
                                                                <?php
                                                            break;
                                                        case 21:
                                                            ?>
                                        <tr>
                                            <td><?php echo $value2['field_name']; ?></td>
                                            <td></td>
                                            <td><textarea onclick="this.select();" class="uifm_txtarea_var">[uifm_recvar id="<?php echo $value2['id']; ?>" atr1="input"]</textarea></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                                            <?php
                                                            break;
                                                    }
                                                }
                                            }
                                        }

                                        ?>
                                        
                                        
                                       
                                    </tbody>
                                </table>
                            </div>
                              
                            
                           <h3><?php echo __('Others', 'FRocket_admin'); ?></h3>
                           <div class="zgfm-modal-calc-wrap-table">
                               <table class="sfdc-table sfdc-table-striped sfdc-table-bordered sfdc-table-condensed uifm-tab-box-vars-2">
                                                <thead>
                                                    <tr>
                                                        <th width="150"><?php echo __('variables', 'FRocket_admin'); ?></th>
                                                        <th ><?php echo __('Code', 'FRocket_admin'); ?></th>
                                                    </tr>
                                                    
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><?php echo __('Currency symbol', 'FRocket_admin'); ?></td>
                                                        <td><textarea onclick="this.select();">[zgfm_fvar opt="form_cur_symbol"]</textarea></td>
                                                        
                                                    </tr>
                                                    <tr>
                                                        <td><?php echo __('Currency code', 'FRocket_admin'); ?></td>
                                                        <td><textarea onclick="this.select();">[zgfm_fvar opt="form_cur_code"]</textarea></td>
                                                        
                                                    </tr>
                                                    <tr>
                                                        <td><?php echo __('Sub Total price', 'FRocket_admin'); ?></td>
                                                        <td><textarea onclick="this.select();">[zgfm_fvar opt="form_subtotal_amount"]</textarea></td>
                                                    </tr>
                                                    <tr>
                                                        <td><?php echo __('Tax', 'FRocket_admin'); ?></td>
                                                        <td><textarea onclick="this.select();">[zgfm_fvar opt="form_tax_amount"]</textarea></td>
                                                    </tr>
                                                    <tr>
                                                        <td><?php echo __('Total Amount price', 'FRocket_admin'); ?></td>
                                                        <td><textarea onclick="this.select();">[zgfm_fvar opt="form_total_amount"]</textarea></td>
                                                    </tr>
                                                    <tr>
                                                        <td><?php echo __('Summary content', 'FRocket_admin'); ?></td>
                                                        <td><textarea style="width:298px;" onclick="this.select();">[uifm_summary rows=&#x22;8&#x22; heading=&#x22;summary : &#x22;]</textarea></td>
                                                    </tr>
                                                    <tr>
                                                        <td><?php echo __('Summary link', 'FRocket_admin'); ?></td>
                                                        <td><textarea style="width: 284px;" onclick="this.select();">[uifm_summary_link value=&#x22;Show summary&#x22;]</textarea></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                           </div>
                           <h3><?php echo __('Calculation', 'FRocket_admin'); ?></h3>
                            <div class="zgfm-modal-calc-wrap-table">
                                <table class="sfdc-table sfdc-table-striped sfdc-table-bordered sfdc-table-condensed uifm-tab-box-vars-2" id="zgfm-tbl-calc-variables">
                                <thead>
                                    <tr>
                                        <th width="150"><?php echo __('Calculation variables', 'FRocket_admin'); ?></th>
                                        <th><?php echo __('Code', 'FRocket_admin'); ?></th>
                                    </tr>

                                </thead>
                                <tbody>
                                    <?php
                                    if ( ! empty($fmb_data['calculation']['variables'])) {
                                        foreach ( $fmb_data['calculation']['variables'] as $key => $value) {
                                            ?>
                                    <tr>
                                        <td> <?php echo $value['tab_title']; ?></td>
                                        <td><textarea onclick="this.select();" style="width: 284px;">[zgfm_fvar opt="calc" atr1="<?php echo $value['id']; ?>"]</textarea></td>
                                    </tr>
                                            <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div> 
    
    </div>
    

    
    
</div>
<script type="text/javascript">
//<![CDATA[
$uifm(document).ready(function ($) {
    // Select first tab
$('#zgfm-modal-calc-container .sfdc-nav-tabs a[data-toggle="sfdc-tab"]').sfdc_tab('show');


$('#zgpb-modal1').find('.sfdc-modal-dialog').css({
                'max-height':'100%',
                width:'1200px'
            });

});


//]]>
</script>
<?php
$cntACmp = ob_get_contents();
$cntACmp = Uiform_Form_Helper::sanitize_output($cntACmp);
ob_end_clean();
echo $cntACmp;
?>
