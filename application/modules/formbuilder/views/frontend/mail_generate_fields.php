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
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
ob_start();
?>
<table class="zgfm-mail-tmp-table" style="width:100%;" cellpadding="0" cellspacing="0">

    <?php
    if (!empty($data)) {
        foreach ($data as $key => $value) {
        
            if( !empty($hide_fields_ids) && in_array($key, $hide_fields_ids, true) ){
                continue;
            }
        
            if (!empty($value['input'])) {
                ?>

                <tr>
                    <td width="50%">
                        <div> <?php echo $value['label']; ?></div>
                    </td>
                    <td width="50%">
                        <?php
                        if (is_array($value['input'])) {
                            ?>
                            <ul>

                                <?php

                                switch (intval($value['type'])) {
                                    case 8:
                                    case 9:
                                    case 10:
                                    case 11:
                                        /*checkbox, radiobutton, select, multiselect*/
                                        $tmp_output_st = '';
                                        foreach ($value['input'] as $key2 => $value2) {
                                            $tmp_output_st_inner  = '';
                                            $tmp_output_st_inner .= $value2['value'];
                                            
                                            if ($show_only_value !== 'yes') {
                                                if (
                                                    $is_custom_calc === 0  && 
                                                    isset($value['price_st'])
                                                    && intval($current_cost_st) === 1
                                                    && intval($value['price_st']) === 1
                                                    && isset($value2['cost'])
                                                ) {
                                                    if (
                                                        isset($form_data_calc_enable)
                                                        && intval($form_data_calc_enable) === 1
                                                    ) {
                                                        $tmp_output_st_inner .= ' - ' . __('amount', 'frocket_front') . ':  ' . Uiform_Form_Helper::cformat_numeric($format_price_conf, $value2['cost']);
                                                    } else {
                                                        $tmp_output_st_inner .= ' - ' . __('amount', 'frocket_front') . ': ' . $current_cost_symbol . ' ' . Uiform_Form_Helper::cformat_numeric($format_price_conf, $value2['cost']) . ' ' . $current_cost_cur;
                                                    }
                                                }
                                            }
                                            
                                            if (!empty($tmp_output_st_inner)) {
                                                $tmp_output_st .= '<li>' . $tmp_output_st_inner . '</li>';
                                            }
                                        }
                                        break;
                                    case 40:
                                        /*switch*/
                                        $tmp_output_st    = '';
                                        $tmp_output_st .= $value['label'];
                                        if ($show_only_value == 'yes') {
                                            $tmp_output_st .=  $value['input']['cost'];
                                        } else {
                                            if (
                                                $is_custom_calc === 0  && 
                                                isset($value['price_st'])
                                                && intval($current_cost_st) === 1
                                                && intval($value['price_st']) === 1
                                                && isset($value['input']['cost'])
                                            ) {
                                                if (
                                                    isset($form_data_calc_enable)
                                                    && intval($form_data_calc_enable) === 1
                                                ) {
                                                    $tmp_output_st .= ' - ' . __('amount', 'frocket_front') . ':  ' . Uiform_Form_Helper::cformat_numeric($format_price_conf, $value['input']['cost']);
                                                } else {
                                                    $tmp_output_st .= ' - ' . __('amount', 'frocket_front') . ': ' . $current_cost_symbol . ' ' . Uiform_Form_Helper::cformat_numeric($format_price_conf, $value['input']['cost']) . ' ' . $current_cost_cur;
                                                }
                                            }
                                        }
                                        
                                        if (!empty($tmp_output_st)) {
                                            $tmp_output_st = '<li>' . $tmp_output_st . '</li>';
                                        }
                                        break;
                                    case 16:
                                    case 17:
                                    case 18:
                                        /*slider, spinner*/
                                        $tmp_output_st = '';
                                        
                                        if ($show_only_value == 'yes') {
                                            $tmp_output_st .=  $value['input_cost_amt'];
                                        } else {
                                            if (intval($value['input']['qty']) > 0) {
                                                $tmp_output_st .= '  ' . __('qty', 'frocket_front') . ':  ' . $value['input']['qty'] . ' ' . __('Units', 'frocket_front');
                                            }
                                            if (
                                                $is_custom_calc === 0  && 
                                                isset($value['price_st'])
                                                && intval($current_cost_st) === 1
                                                && intval($value['price_st']) === 1
    
                                            ) {
                                                if (
                                                    isset($form_data_calc_enable)
                                                    && intval($form_data_calc_enable) === 1
                                                ) {
                                                    $tmp_output_st .= ' - ' . __('amount', 'frocket_front') . ':  ' . Uiform_Form_Helper::cformat_numeric($format_price_conf, $value['input_cost_amt']);
                                                } else {
                                                    $tmp_output_st .= ' - ' . __('amount', 'frocket_front') . ': ' . $current_cost_symbol . ' ' . Uiform_Form_Helper::cformat_numeric($format_price_conf, $value['input_cost_amt']) . ' ' . $current_cost_cur;
                                                }
                                            }
                                        }
                                        
                                        if (!empty($tmp_output_st)) {
                                            $tmp_output_st = '<li>' . $tmp_output_st . '</li>';
                                        }
                                        break;
                                    case 41:
                                    case 42:
                                        /*dyn checkbox and radio button*/
                                        $tmp_output_st = '';
                                        foreach ($value['input'] as $key2 => $value2) {
                                            $tmp_output_st_inner  = '';
                                            $tmp_output_st_inner .= $value2['label'];
                                            
                                            if ($show_only_value == 'yes') {
                                                $tmp_output_st_inner .=  $value2['amount'];
                                            } else {
                                                if (intval($value2['qty']) > 0) {
                                                    $tmp_output_st_inner .= ' - ' . __('qty', 'frocket_front') . ':  ' . $value2['qty'] . ' ' . __('Units', 'frocket_front');
                                                }
                                                if (
                                                    $is_custom_calc === 0  && 
                                                    isset($value['price_st'])
                                                    && intval($current_cost_st) === 1
                                                    && intval($value['price_st']) === 1
    
                                                ) {
                                                    if (
                                                        isset($form_data_calc_enable)
                                                        && intval($form_data_calc_enable) === 1
                                                    ) {
                                                        $tmp_output_st_inner .= ' - ' . __('amount', 'frocket_front') . ':  ' . Uiform_Form_Helper::cformat_numeric($format_price_conf, $value2['amount']);
                                                    } else {
                                                        $tmp_output_st_inner .= ' - ' . __('amount', 'frocket_front') . ': ' . $current_cost_symbol . ' ' . Uiform_Form_Helper::cformat_numeric($format_price_conf, $value2['amount']) . ' ' . $current_cost_cur;
                                                    }
                                                }
                                            }
                                            
                                            if (!empty($tmp_output_st_inner)) {
                                                $tmp_output_st .= '<li>' . $tmp_output_st_inner . '</li>';
                                            }
                                        }
                                        break;
                                    default:
                                        $tmp_output_st  = '';
                                        $tmp_output_st .= $value2['label'];
                                        break;
                                }



                                ?>
                                <?php echo $tmp_output_st; ?>
                            </ul>
                            <?php
                        } else {
                            ?>
                            <ul>

                                <?php

                                switch (intval($value['type'])) {
                                    default:
                                        $tmp_output_st  = '';
                                        $tmp_output_st .= $value['input'];
                                        break;
                                }



                                ?>


                                <li> <?php echo $value['input']; ?></li>
                            </ul>
                            <?php
                        }
                        ?>


                    </td>
                </tr>

                <?php
            }
        }
    }
    ?>



</table>
<?php if ($hide_total !== 'yes') {?>
<table cellspacing="0" cellpadding="0">
    <?php if (isset($price_tax_st) && intval($price_tax_st) === 1) { ?>
        <tr>
            <td align="center" valign="top"> <?php echo __('Sub total', 'frocket_front'); ?></td>
            <td width="20" align="center" valign="top">:</td>
            <td width="200" align="left" valign="top"><?php echo ($show_only_value == 'yes')?$form_cost_subtotal:Uiform_Form_Helper::cformat_numeric($format_price_conf, $form_cost_subtotal); ?></td>
        </tr>
        <tr>
            <td align="center" valign="top"> <?php echo __('Tax', 'frocket_front'); ?></td>
            <td width="20" align="center" valign="top">:</td>
            <td width="200" align="left" valign="top"><?php echo ($show_only_value == 'yes')?$form_cost_tax:Uiform_Form_Helper::cformat_numeric($format_price_conf, $form_cost_tax); ?></td>
        </tr>
    <?php } ?>
    <tr>
        <td align="center" valign="top"> <?php echo __('Total', 'frocket_front'); ?></td>
        <td width="20" align="center" valign="top">:</td>
        <td width="200" align="left" valign="top"><?php echo ($show_only_value == 'yes')?$form_cost_total:Uiform_Form_Helper::cformat_numeric($format_price_conf, $form_cost_total) . ' ' . $current_cost_cur; ?></td>
    </tr>
</table>
<?php }?>
<?php
$cntACmp = ob_get_contents();
ob_end_clean();
echo $cntACmp;
?>