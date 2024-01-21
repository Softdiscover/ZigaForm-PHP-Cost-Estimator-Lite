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
$default_template = '';
ob_start();
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Aloha!</title>

<style type="text/css">
    * {
        font-family: Verdana, Arial, sans-serif;
    }
    table{
        font-size: x-small;
    }
    tfoot tr td{
        font-weight: bold;
        font-size: x-small;
    }
    .gray {
        background-color: lightgray
    }
</style>

</head>
<body>

  <table width="100%">
    <tr>
        <td valign="top">image here</td>
        <td align="right">
            <h3>Your Name Company</h3>
            <pre>
                Company representative name
                Company address
                Tax ID
                phone
                fax
            </pre>
        </td>
    </tr>

  </table>

  <table width="100%">
    <tr>
        <td><strong>From:</strong> XYZ company</td>
        <td><strong>To:</strong> ABC company</td>
    </tr>

  </table>

  <br/>

  <table width="100%">
    <thead style="background-color: lightgray;">
      <tr>
        <th>#</th>
        <th>Description</th>
        <th>Quantity</th>
        <th>Unit Price $</th>
        <th>Total $</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>Playstation IV - Black</td>
        <td align="right">1</td>
        <td align="right">1400.00</td>
        <td align="right">1400.00</td>
      </tr>
      <tr>
          <th scope="row">1</th>
          <td>Metal Gear Solid - Phantom</td>
          <td align="right">1</td>
          <td align="right">105.00</td>
          <td align="right">105.00</td>
      </tr>
      <tr>
          <th scope="row">1</th>
          <td>Final Fantasy XV - Game</td>
          <td align="right">1</td>
          <td align="right">130.00</td>
          <td align="right">130.00</td>
      </tr>
    </tbody>

    <tfoot>
        <tr>
            <td colspan="3"></td>
            <td align="right">Subtotal $</td>
            <td align="right">1635.00</td>
        </tr>
        <tr>
            <td colspan="3"></td>
            <td align="right">Tax $</td>
            <td align="right">294.3</td>
        </tr>
        <tr>
            <td colspan="3"></td>
            <td align="right">Total $</td>
            <td align="right" class="gray">$ 1929.3</td>
        </tr>
    </tfoot>
  </table>

</body>
</html>
<?php
$default_template = ob_get_clean();
?>

<div class="uiform-set-field-wrap" id="uiform-set-form-invoice">

<div id="zgfm-invoice-section-customtxts">  
   <div class="sfdc-row">
        <div class="sfdc-col-sm-6">
            <div class="sfdc-form-group">
                    <label for=""><?php echo __('From - text 1', 'FRocket_admin'); ?>
                    <a href="javascript:void(0);"
                       data-toggle="tooltip" data-placement="right" data-original-title="<?php echo __('this field will be located in the FROM zone', 'FRocket_admin'); ?>"
                       ><span class="fa fa-question-circle"></span></a>
                    </label>
                     <input type="text" 
                            id="uifm_frm_inv_from_text1"
                            value=""
                            name="uifm_frm_inv_from_text1" 
                            placeholder="<?php echo __('Here goes your text', 'FRocket_admin'); ?>"  class="sfdc-form-control">   
            </div>
        </div>
       <div class="sfdc-col-sm-6">
            <div class="sfdc-form-group">
                    <label for=""><?php echo __('To - text 1', 'FRocket_admin'); ?>
                    <a href="javascript:void(0);"
                       data-toggle="tooltip" data-placement="right" data-original-title="<?php echo __('this field will be located in the TO zone', 'FRocket_admin'); ?>"
                       ><span class="fa fa-question-circle"></span></a>
                    </label>
                <select 
                        class="sfdc-form-control uifm_frm_inv_to_text_src"
                        data-uifm-nro="1"
                        data-uifm-firstoption="<?php echo __('Select Field', 'FRocket_admin'); ?>"
                        id="uifm_frm_inv_to_text1"
                            name="uifm_frm_inv_to_text1" >
                                <option value="" selected><?php echo __('Select Field', 'FRocket_admin'); ?></option>
                    </select>
                       
            </div>
        </div>
    </div>
   <div class="sfdc-row">
        <div class="sfdc-col-sm-6">
            <div class="sfdc-form-group">
                    <label for=""><?php echo __('From - text 2', 'FRocket_admin'); ?>
                    <a href="javascript:void(0);"
                       data-toggle="tooltip" data-placement="right" data-original-title="<?php echo __('this field will be located in the FROM zone', 'FRocket_admin'); ?>"
                       ><span class="fa fa-question-circle"></span></a>
                    </label>
                     <input type="text" 
                            id="uifm_frm_inv_from_text2"
                            value=""
                            name="uifm_frm_inv_from_text2" 
                            placeholder="<?php echo __('Here goes your text', 'FRocket_admin'); ?>"  class="sfdc-form-control">   
            </div>
        </div>
       <div class="sfdc-col-sm-6">
            <div class="sfdc-form-group">
                    <label for=""><?php echo __('To - text 2', 'FRocket_admin'); ?>
                    <a href="javascript:void(0);"
                       data-toggle="tooltip" data-placement="right" data-original-title="<?php echo __('this field will be located in the TO zone', 'FRocket_admin'); ?>"
                       ><span class="fa fa-question-circle"></span></a>
                    </label>
                <select 
                        class="sfdc-form-control uifm_frm_inv_to_text_src"
                        data-uifm-nro="2"
                        data-uifm-firstoption="<?php echo __('Select Field', 'FRocket_admin'); ?>"
                        id="uifm_frm_inv_to_text2"
                            name="uifm_frm_inv_to_text2" >
                                <option value="" selected><?php echo __('Select Field', 'FRocket_admin'); ?></option>
                    </select>
                      
            </div>
        </div>
    </div>
    <div class="sfdc-row">
        <div class="sfdc-col-sm-6">
            <div class="sfdc-form-group">
                    <label for=""><?php echo __('From - text 3', 'FRocket_admin'); ?>
                    <a href="javascript:void(0);"
                       data-toggle="tooltip" data-placement="right" data-original-title="<?php echo __('this field will be located in the FROM zone', 'FRocket_admin'); ?>"
                       ><span class="fa fa-question-circle"></span></a>
                    </label>
                     <input type="text" 
                            id="uifm_frm_inv_from_text3"
                            value=""
                            name="uifm_frm_inv_from_text3" 
                            placeholder="<?php echo __('Here goes your text', 'FRocket_admin'); ?>"  class="sfdc-form-control">   
            </div>
        </div>
       <div class="sfdc-col-sm-6">
            <div class="sfdc-form-group">
                    <label for=""><?php echo __('To - text 3', 'FRocket_admin'); ?>
                    <a href="javascript:void(0);"
                       data-toggle="tooltip" data-placement="right" data-original-title="<?php echo __('this field will be located in the TO zone', 'FRocket_admin'); ?>"
                       ><span class="fa fa-question-circle"></span></a>
                    </label>
                <select 
                        class="sfdc-form-control uifm_frm_inv_to_text_src"
                        data-uifm-nro="3"
                        data-uifm-firstoption="<?php echo __('Select Field', 'FRocket_admin'); ?>"
                        id="uifm_frm_inv_to_text3"
                            name="uifm_frm_inv_to_text3" >
                                <option value="" selected><?php echo __('Select Field', 'FRocket_admin'); ?></option>
                    </select>
                      
            </div>
        </div>
    </div>
    <div class="sfdc-row">
        <div class="sfdc-col-sm-6">
            <div class="sfdc-form-group">
                    <label for=""><?php echo __('From - text 4', 'FRocket_admin'); ?>
                    <a href="javascript:void(0);"
                       data-toggle="tooltip" data-placement="right" data-original-title="<?php echo __('this field will be located in the FROM zone', 'FRocket_admin'); ?>"
                       ><span class="fa fa-question-circle"></span></a>
                    </label>
                
                     <input type="text" 
                            id="uifm_frm_inv_from_text4"
                            value=""
                            name="uifm_frm_inv_from_text4" 
                            placeholder="<?php echo __('Here goes your text', 'FRocket_admin'); ?>"  class="sfdc-form-control">   
            </div>
        </div>
       <div class="sfdc-col-sm-6">
            <div class="sfdc-form-group">
                    <label for=""><?php echo __('To - text 4', 'FRocket_admin'); ?>
                    <a href="javascript:void(0);"
                       data-toggle="tooltip" data-placement="right" data-original-title="<?php echo __('this field will be located in the TO zone', 'FRocket_admin'); ?>"
                       ><span class="fa fa-question-circle"></span></a>
                    </label>
                 <select 
                        class="sfdc-form-control uifm_frm_inv_to_text_src"
                        data-uifm-nro="4"
                        data-uifm-firstoption="<?php echo __('Select Field', 'FRocket_admin'); ?>"
                        id="uifm_frm_inv_to_text4"
                            name="uifm_frm_inv_to_text4" >
                                <option value="" selected><?php echo __('Select Field', 'FRocket_admin'); ?></option>
                    </select>
            </div>
        </div>
    </div>
      <div class="sfdc-row">
        <div class="sfdc-col-sm-6">
            <div class="sfdc-form-group">
                    <label for=""><?php echo __('From - text 5', 'FRocket_admin'); ?>
                    <a href="javascript:void(0);"
                       data-toggle="tooltip" data-placement="right" data-original-title="<?php echo __('this field will be located in the FROM zone', 'FRocket_admin'); ?>"
                       ><span class="fa fa-question-circle"></span></a>
                    </label>
                     <input type="text" 
                            id="uifm_frm_inv_from_text5"
                            value=""
                            name="uifm_frm_inv_from_text5" 
                            placeholder="<?php echo __('Here goes your text', 'FRocket_admin'); ?>"  class="sfdc-form-control">   
            </div>
        </div>
       <div class="sfdc-col-sm-6">
            <div class="sfdc-form-group">
                    <label for=""><?php echo __('To - text 5', 'FRocket_admin'); ?>
                    <a href="javascript:void(0);"
                       data-toggle="tooltip" data-placement="right" data-original-title="<?php echo __('this field will be located in the TO zone', 'FRocket_admin'); ?>"
                       ><span class="fa fa-question-circle"></span></a>
                    </label>
                     <input type="text" 
                            id="uifm_frm_inv_to_text5"
                            value=""
                            name="uifm_frm_inv_to_text5" 
                            placeholder="<?php echo __('Here goes your text', 'FRocket_admin'); ?>"  class="sfdc-form-control">   
            </div>
        </div>
    </div>
    
</div>
    
         <div class="sfdc-row">
                                        <div class="sfdc-col-md-12">
                                            <div class="divider2">
                                                <div class="mask"></div>
                                                <span><i><?php echo __('Custom Template for PDF ', 'FRocket_admin'); ?></i></span>
                                            </div>
                                        </div>
                                    </div>
                                <div class="sfdc-row">
                                        <div class="sfdc-col-md-12">
                                            <div class="sfdc-form-group">
                                                <label ><?php echo __('Enable custom template for Invoice', 'FRocket_admin'); ?></label>
                                                <div class="sfdc-col-md-12">
                                                    <input 
                                                        class="switch-field"
                                                        id="uifm_frm_invoice_tpl_enable" 
                                                        <?php
                                                        if ( isset($uifm_frm_invoice_tpl_enable)) {
                                                            echo ( intval($uifm_frm_invoice_tpl_enable) === 1 ) ? 'checked' : '';
                                                        }
                                                        ?>
                                                        type="checkbox"/>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div id="uifm-tab-inner-inv-tpl-3" >
                                         <div class="space10 zgfm-opt-divider-stl1"></div>
                                          
                                         <div class="sfdc-help-block">
                           <div class="sfdc-alert sfdc-alert-info">
                               <?php echo __('Options above will not be used. so you have to add your shortcodes of your fields in the content of the invoice', 'FRocket_admin'); ?>
                    </div>
                            
                            
                         </div> 
                                          
                                        <div class="sfdc-row">
                                       
                                            <div class="sfdc-col-sm-6">
                                                    <label><?php echo __('Sample ', 'FRocket_admin'); ?></label>
                                                    <div class="sfdc-controls sfdc-form-group">
                                                        <a href="javascript:void(0);" onclick="javascript:zgfm_back_tools.pdf_showsample('pdf_invoice_gen');" class="sfdc-btn sfdc-btn-primary">
                                                        <?php echo __('Show PDF sample', 'FRocket_admin'); ?>
                                                        </a>
                                                    </div>
                                            </div>
                                        </div> 
                                        <div class="sfdc-row">
                                            <div class="sfdc-col-sm-12">
                                                <div class="sfdc-form-group">

                                                    <label class="sfdc-control-label" for="">
                                                        <?php echo __('Custom template ', 'FRocket_admin'); ?>
                                                    </label>
                                                    <div class="sfdc-controls sfdc-form-group">
                                                        <?php
                                                        /* pending add this tinymce */
                                                        $settings = array(
                                                            'media_buttons' => true,
                                                            'editor_height' => 900,
                                                            'textarea_rows' => 20,
                                                        );
                                                        if ( isset($uifm_frm_invoice_tpl_content)) {
                                                            $default_template = urldecode($uifm_frm_invoice_tpl_content);
                                                        }

                                                        // wp_editor($default_template, 'uifm_frm_invoice_tpl_content',$settings );
                                                        ?>
                                                        <textarea 
                                                                class="uifm_tinymce_obj"
                                                                name="uifm_frm_invoice_tpl_content"
                                                                id="uifm_frm_invoice_tpl_content"><?php echo $default_template; ?></textarea>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>    
    
    
     <?php if ( ZIGAFORM_C_LITE == 1) { ?>
        <div id="zgfm-blocked-feature-pdf-box">
            <?php $message = __('Invoice', 'FRocket_admin'); ?>
                <?php include APPPATH . '/modules/formbuilder/views/settings/blocked_getmessage.php'; ?>
            </div>
     <?php } else { ?>
     <?php } ?>
</div>
<script type="text/javascript">
//<![CDATA[

 
jQuery(document).ready(function ($) {
    
 
  /* attach custom pdf to client*/
        $('#uifm_frm_invoice_tpl_enable').on('switchChange.bootstrapSwitchZgpb', function (event, state) {
            var f_val = (state) ? 1 : 0;
            if (f_val === 1) {
                $('#uifm-tab-inner-inv-tpl-3').show();
                $('#zgfm-invoice-section-customtxts').hide();
            } else {
                $('#uifm-tab-inner-inv-tpl-3').hide();
                $('#zgfm-invoice-section-customtxts').show();
            }
        });

        var selectedValue = $('#uifm_frm_invoice_tpl_enable').bootstrapSwitchZgpb('state');
        if (selectedValue) {
            $('#uifm-tab-inner-inv-tpl-3').show();
        } else {
            $('#uifm-tab-inner-inv-tpl-3').hide();
        }
   
      
});


//]]>
</script>
