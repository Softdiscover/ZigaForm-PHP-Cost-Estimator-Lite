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
 * @link      https://wordpress-form-builder.zigaform.com/
 */
if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
ob_start();
?>
<div class="rockfm-form-container rockfm-form-container-ms uiform-wrap sfdc-wrap">
<div class="rockfm-alert-container" style="display:none;"></div>
<form class="rockfm-form" 
      action="javascript:void(0);" 
      name="" 
      method="post" 
      data-zgfm-type="1"
      data-zgfm-version="<?php echo UIFORM_VERSION; ?>" 
      data-zgfm-recaptchav3-active="<?php echo $main['recaptchav3_enable'] ?? 0; ?>"
      data-zgfm-recaptchav3-sitekey="<?php echo $main['recaptchav3_sitekey'] ?? ''; ?>"
      data-zgfm-recaptchav3-errmsg="<?php echo esc_attr(__('Recaptcha failed, refresh page and try again', 'FRocket_admin')); ?>"
      data-zgfm-is-ms="1"
      enctype="multipart/form-data" 
      id="rockfm_form_<?php echo $form_id; ?>">
 
    <input type="hidden" value="<?php echo esc_attr($form_id); ?>" class="_rockfm_form_parent_id" name="_rockfm_form_parent_id">
    <input type="hidden" value="<?php echo esc_attr($calculation['enable_st']); ?>" class="_rockfm_form_calc_math_enable" name="_rockfm_form_calc_math_enable">
    <input type="hidden" value="<?php echo esc_attr(Uiform_Form_Helper::base64url_encode(urldecode($onsubm['sm_successtext']))); ?>" name="_rockfm_onsubm_smsg" class="_rockfm_onsubm_smsg" >
    <!--- ajax  --->
     
        <input type="hidden" value="1" class="_rockfm_type_submit" name="_rockfm_type_submit">
        <input type="hidden" value="rocket_ms_front_submitajaxmode" name="action">
        <?php if ( isset($main['price_currency_symbol'])) { ?>
        <input type="hidden" class="_rockfm_form_price_symbol" value="<?php echo esc_attr(urldecode($main['price_currency_symbol'])); ?>">
    <?php } ?>
    <?php if ( isset($main['price_currency'])) { ?>
        <input type="hidden" class="_rockfm_form_price_currency" value="<?php echo esc_attr($main['price_currency']); ?>">
    <?php } ?>  
    <div class="rockfm_form_hook_outertop"><?php echo $outertop; ?></div>
    <div class="uiform-main-form">
        <div class="rockfm_form_hook_innertop"><?php echo $innertop; ?></div>
           <?php echo $formInitHtml; ?>
    </div>
     
    <textarea hidden="hidden" class="rockfm_main_data" style="display:none"><?php echo esc_html(htmlentities(Uiform_Form_Helper::raw_json_encode($main), ENT_QUOTES, 'UTF-8')); ?></textarea>
        <textarea hidden="hidden" class="rockfm_connection_data" style="display:none"><?php echo esc_html(htmlentities(Uiform_Form_Helper::raw_json_encode($connections), ENT_QUOTES, 'UTF-8')); ?></textarea>
        <textarea hidden="hidden" class="rockfm_connection_extra" style="display:none"><?php echo esc_html(htmlentities(Uiform_Form_Helper::raw_json_encode(apply_filters('zgfm_front_ms_aditional_js', [])), ENT_QUOTES, 'UTF-8')); ?></textarea>
        <textarea hidden="hidden" class="rockfm_data_initform" style="display:none"><?php echo esc_html($formInit); ?></textarea>
        
        <?php if ( isset($progresscost['enable_st']) && intval($progresscost['enable_st']) === 1) { ?>
        
        <input type="hidden" class="rockfm_data_pgc_top_cost" value="<?php echo esc_attr($progresscost['avg_top_cost']); ?>">
    <?php } ?>
    
     <!-- calculation variables -->
<?php if ( isset($calculation['enable_st']) && intval($calculation['enable_st']) === 1) { ?>
    <?php foreach ( $calculation['variables'] as $key => $value) { ?>  
<input type="hidden" value="" class="_zgfm_avars_calc_<?php echo $value['id']; ?>" name="zgfm_avars[calc][<?php echo $value['id']; ?>]">
    <?php } ?>

<?php } ?>
    <div class="space10"></div>
    <!-- The Bootstrap Image Gallery lightbox, should be a child element of the document body -->
        
</form>
<script type="text/html" id="rockfm_form_children_<?php echo $form_id; ?>"></script>
 

 <?php if (isset($main['add_js']) && ! empty($main['add_js'])) { ?>
  <!-- Additional javascript -->
  <script type="text/javascript">
        <?php echo urldecode($main['add_js']); ?>
     </script>  
    <!-- adittional javascript -->
 <?php } ?>
 
 <?php if ( isset($calculation['enable_st']) && intval($calculation['enable_st']) === 1) { ?>
<script type="text/javascript">

    var _zgfm_front_vars = _zgfm_front_vars || {};
    _zgfm_front_vars.form = _zgfm_front_vars.form || {};
    _zgfm_front_vars.form[<?php echo $form_id; ?>] = {};
    _zgfm_front_vars.form[<?php echo $form_id; ?>]['calc'] = {};
    _zgfm_front_vars.form[<?php echo $form_id; ?>]['calc']['vars_str'] = "<?php echo $calculation['vars_str']; ?>";
    _zgfm_front_vars.form[<?php echo $form_id; ?>]['calc']['vars_num'] = <?php echo count($calculation['variables']); ?>;
    <?php foreach ( $calculation['variables'] as $key => $value) { ?>
var zgfm_<?php echo $form_id; ?>_calculation_cont<?php echo $calculation['variables'][ $key ]['id']; ?> = function(){
        <?php
         
        echo str_replace('[%formid%]', $form_id, urldecode($calculation['variables'][ $key ]['content_front']));
        ?>
       
};
    <?php } ?>
</script>
<?php } ?>
 
 
  <!-- Modal -->
<div class="sfdc-modal sfdc-fade uiform_modal_general"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="sfdc-modal-dialog">
        <div class="sfdc-modal-content">
            <div class="sfdc-modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 <h4 class="sfdc-modal-title"></h4>

            </div>
            <div class="sfdc-modal-body"><div class="te"></div></div>
            <div class="sfdc-modal-footer">
                <button type="button" 
                        class="sfdc-btn sfdc-btn-default"
                        data-dismiss="modal"><?php echo __('Close', 'FRocket_admin'); ?></button>
            </div>
        </div>
        <!-- /.sfdc-modal-content -->
    </div>
    <!-- /.sfdc-modal-dialog -->
</div>
<!-- /.modal -->  
</div>
<?php
$cntACmp = ob_get_contents();
$cntACmp = Uiform_Form_Helper::sanitize_output($cntACmp);
ob_end_clean();
echo $cntACmp;
?>
