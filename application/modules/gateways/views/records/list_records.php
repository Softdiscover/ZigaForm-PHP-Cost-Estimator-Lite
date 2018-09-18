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

<div id="uiform-container" class="uiform-wrap">
    <div class="space20"></div>
    <div class="sfdc-row">
        <div class="sfdc-col-lg-12">
        <div class="widget widget-padding span12">
            <div class="widget-header">
                <i class="fa fa-list-alt"></i>
                <h5>
                <?php echo __('List Invoices.','FRocket_admin')?>
                </h5>
                
            </div>  
            <div class="widget-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered dataTable" id="users">
                    <thead>
                        <tr>
                            <th><?php echo __('Name Form','FRocket_admin');?></th>
                            <th><?php echo __('Created','FRocket_admin');?></th>
                            <th><?php echo __('Payment Status','FRocket_admin');?></th>
                            <th><?php echo __('Amount','FRocket_admin');?></th>
                            <th><?php echo __('Currency','FRocket_admin');?></th>
                            <th><?php echo __('Status','FRocket_admin');?></th>
                            <th><?php echo __('Options','FRocket_admin');?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($query)){?>
<?php foreach ($query as $row): ?>
                        <tr>
                            <td><?php echo $row->fmb_name; ?></td>
                            <td><?php echo $row->created_date; ?></td>
                            <td><?php echo $row->pgr_payment_status; ?></td>
                            <td><?php echo $row->pgr_payment_amount; ?></td>
                            <td><?php echo $row->pgr_currency; ?></td>
                            <td>
    <?php 
    if (intval($row->flag_status)===1) {
        ?>
                                    <span class="label label-success">
                                       <?php echo __('Active','FRocket_admin'); ?> 
                                    </span>
    <?php    
    } else {
        ?>
                                    <span class="label label-warning">

                                        <?php echo __('Inactive','FRocket_admin'); ?>
                                    </span>
    <?php
    }
    ?>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <ul class="unstyled">
                                    <li><a 
                                            class="sfdc-btn sfdc-btn-default"
                                            href="<?php echo site_url().'gateways/records/info_record/?id_rec='.$row->fbh_id;?>">
                                            <i class="fa fa-pencil-square-o"></i> <?php echo __('Show','FRocket_admin')?></a></li>
                                    <li><a href="javascript:void(0);" 
                                           class="sfdc-btn sfdc-btn-danger uiform-confirmation-func-action"
                                           data-dialog-title="<?php echo __('Delete','FRocket_admin')?>"
                                           data-dialog-callback="javascript:rocketform.invoice_delreg(<?php echo $row->pgr_id;?>);"
                                           data-pgrid="<?php echo $row->pgr_id;?>">
                                            <i class="fa fa-trash-o"></i> <?php echo __('Delete','FRocket_admin');?></a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
    <?php 
endforeach; 
    ?>
                        <?php }else{?>
                        <tr>
                            <td colspan="7">
                            <div class="alert alert-info"><i class="fa fa-exclamation-triangle"></i> <?php echo __('there are not invoices.','FRocket_admin');?></div>
                            </td>
                        </tr>
                        <?php } ?>
                </tbody>
                </table>
                </div>
                
                <center>
                    <div  class="pagination-wrap"><?php echo $pagination; ?></div></center>
            </div> 
        </div> 
    </div>
    </div>
</div>
