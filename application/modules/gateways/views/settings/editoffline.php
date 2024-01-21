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
<div id="uiform-container" data-uiform-page="gateway_list" class="uiform-wrap">
<div class="space20"></div>
<div class="sfdc-row">
<div class="sfdc-col-lg-12">
          <div class="widget widget-padding">
            <div class="widget-header">
              <i class="fa fa-list-alt"></i><h5><?php echo __('Payment gateway', 'FRocket_admin'); ?></h5>
            </div>
            <div class="widget-body">
              <div class="widget-forms sfdc-clearfix">
                  <form id="uiform-form-editgateway"
                          name="uiform-form-editgateway"
                          enctype="multipart/form-data"
                          method="post"
                          >
                  <div class="sfdc-form-group sfdc-clearfix">
                    <label class="sfdc-col-md-2 sfdc-control-label"><?php echo __('Name', 'FRocket_admin'); ?></label>
                    <div class="sfdc-col-md-10">
                      <input name="pg_name" 
                             id="pg_name" type="text" 
                             placeholder="<?php echo __('Type name payment gateway', 'FRocket_admin'); ?>" 
                             class="sfdc-form-control col-md-7" value="<?php echo ( isset($pg_name) ) ? $pg_name : ''; ?>">
                    </div>
                  </div>
                   
                  <div class="sfdc-form-group sfdc-clearfix">
                    <label class="sfdc-col-md-2 sfdc-control-label"><?php echo __('Return URL', 'FRocket_admin'); ?></label>
                    <div class="sfdc-col-md-10">
                      <input name="offline_return_url" id="offline_return_url" 
                             type="text" 
                             placeholder="<?php echo __('Type return URL', 'FRocket_admin'); ?>" 
                             class="sfdc-form-control col-md-7" 
                             value="<?php echo ( isset($offline_return_url) ) ? $offline_return_url : ''; ?>">
                    </div>
                  </div>
                       
                 <div class="sfdc-form-group sfdc-clearfix">
                    <label class="sfdc-col-md-2 sfdc-control-label"><?php echo __('Status', 'FRocket_admin'); ?></label>
                    <div class="sfdc-col-md-10">
                      <label class="sfdc-radio-inline">
                        <input name="flag_status" id="optionsRadios1" value="1" type="radio" <?php Uiform_Form_Helper::getChecked($flag_status, 1); ?>>
                        <?php echo __('Enabled', 'FRocket_admin'); ?>
                      </label> 
                      <label class="sfdc-radio-inline">
                        <input name="flag_status" id="optionsRadios2" value="0" type="radio" <?php Uiform_Form_Helper::getChecked($flag_status, 0); ?> >
                        <?php echo __('Disabled', 'FRocket_admin'); ?>
                      </label>
                    </div>
                  </div>
                    
                  <div class="sfdc-form-group sfdc-clearfix">
                    <label class="sfdc-col-md-2 sfdc-control-label"><?php echo __('Description', 'FRocket_admin'); ?></label>
                      <div class="sfdc-col-md-10">
                        <textarea name="pg_description" 
                                  id="pg_description" 
                                  style="height:100px;" rows="5"  
                                  placeholder="" 
                                  class="sfdc-form-control col-md-7"><?php echo $pg_description; ?></textarea>
                      </div>
                  </div>
                  <div class="sfdc-form-group sfdc-clearfix">
                    <label class="sfdc-col-md-2 sfdc-control-label"><?php echo __('Payment order', 'FRocket_admin'); ?></label>
                    <div class="sfdc-col-md-4">
                        <input name="pg_order" id="pg_order" value="<?php echo ( isset($pg_order) ) ? $pg_order : ''; ?>">
                    </div>
                  </div>
                   
                  <input type="hidden" name="pg_id" id="uiform_current_pgid" value="<?php echo $pg_id; ?>">
                </form>
              </div>
            </div>
            <div class="widget-footer">
               <button type="submit" class="sfdc-btn sfdc-btn-primary" onclick="javascript:rocketform.gateway_saveoffline();"><?php echo __('Save', 'FRocket_admin'); ?></button>
               <button type="button" class="sfdc-btn sfdc-btn-default"  onclick="javascript:rocketform.gateway_gotoList();return false;" ><?php echo __('Cancel', 'FRocket_admin'); ?></button>
            </div>
          </div>
</div>
</div>
</div>

<script type="text/javascript">
//<![CDATA[
jQuery(document).ready(function ($) {
    
    $("#pg_order").TouchSpin({
        verticalbuttons: true,
        min: 0,
        max: 10,
        stepinterval: 1,
        verticalupclass: 'glyphicon glyphicon-plus',
        verticaldownclass: 'glyphicon glyphicon-minus'
    }); 
});
//]]>
</script>
