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
        <div class="widget widget-padding span12">
            <div class="widget-header">
                <i class="fa fa-list-alt"></i>
                <h5>
                <?php echo __('List payments gateways.', 'FRocket_admin'); ?>
                </h5>
                <div class="widget-buttons">
                    
                    
                </div>
            </div>  
            <div class="widget-body">
                
                <div class="table-responsive">
                    <form id="uiform-form-listgateway"
                          name="uiform-form-listform"
                          enctype="multipart/form-data"
                          method="post"
                          >
                        
                    <table class="table table-striped table-bordered dataTable" id="form_list">
                    <thead>
                        <tr>
                            <th><?php echo __('Gateway payment', 'FRocket_admin'); ?></th>
                            <th><?php echo __('Status', 'FRocket_admin'); ?></th>
                            <th><?php echo __('Options', 'FRocket_admin'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ( ! empty($query)) { ?>
                            <?php foreach ( $query as $row) : ?>
                        <tr>
                            
                            <td><?php echo $row->pg_name; ?></td>
                            
                            
                            <td>
                                <?php
                                if ( intval($row->flag_status) === 1) {
                                    ?>
                                    <span class="label label-success">
                                       <?php echo __('Active', 'FRocket_admin'); ?> 
                                    </span>
                                    <?php
                                } else {
                                    ?>
                                    <span class="label label-warning">

                                        <?php echo __('Inactive', 'FRocket_admin'); ?>
                                    </span>
                                    <?php
                                }
                                ?>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <ul class="unstyled">
                                    <li>
                                                <?php
                                                if ( intval($row->pg_id) === 2) {
                                                    ?>
                                                    <?php if ( ZIGAFORM_C_LITE == 1) { ?>
                                            <a class=" sfdc-btn sfdc-btn-sm sfdc-btn-info"
                                                onclick="javascript:rocketform.showFeatureLocked(this);"
                                               data-blocked-feature="Paypal Payment"
                                                href="javascript:void(0);">
                                               <i class="fa fa-pencil-square-o"></i> <?php echo __('Edit', 'FRocket_admin'); ?> <span class="rkfm-express-lock-wrap" 
                         ><i class="fa fa-lock"></i></span></a>
                                            
                                                    <?php } else { ?>
                                            <a 
                                            class="guidetour-flist-edit btn sfdc-btn-sm sfdc-btn-info"
                                            data-intro="<?php echo __('Edit and load your custom form', 'FRocket_admin'); ?>"
                                            href="<?php echo site_url() . 'gateways/settings/edit_gateway/?id=' . $row->pg_id; ?>">
                                            <i class="fa fa-pencil-square-o"></i> <?php echo __('Edit', 'FRocket_admin'); ?></a>

                                                    <?php } ?>
                                        
                                        
                                          
                                                <?php } else { ?>
                                         <a 
                                            class="guidetour-flist-edit btn sfdc-btn-sm sfdc-btn-info"
                                            data-intro="<?php echo __('Edit and load your custom form', 'FRocket_admin'); ?>"
                                            href="<?php echo site_url() . 'gateways/settings/edit_gateway/?id=' . $row->pg_id; ?>">
                                            <i class="fa fa-pencil-square-o"></i> <?php echo __('Edit', 'FRocket_admin'); ?></a>
                                        
                                                <?php } ?>   
                                        
                                        
                                            
                                            
                                    </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                                <?php
                            endforeach;
                            ?>
                        <?php } else { ?>
                        <tr>
                            <td colspan="6">
                            <div class="alert alert-info"><i class="fa fa-exclamation-triangle"></i> <?php echo __('there is not payment gateways.', 'FRocket_admin'); ?></div>
                            </td>
                        </tr>
                        <?php } ?>
                </tbody>
                </table> 
                    </form>
                </div>
                
            </div> 
        </div> 
    </div>
    </div>
</div>
