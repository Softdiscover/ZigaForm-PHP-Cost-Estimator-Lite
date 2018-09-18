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
 <div class="uiform-pg-order-cont uiform-pg-paypal-box">
                        <div class="">
                            <div class="pull-left uiform-pg-row-cont uiform-pg-radio-btn">
                                <input 
                                    data-type="1"
                                    type="radio" name="typepayment"></div>
                            <div class=" col-xs-10 col-sm-3 
                                 col-md-5 
                                 uiform-pg-row-cont uiform-pg-card-number uiform-pg-paypal">
                                <span></span> 
                                <div class="uiform-pg-lable-wrap">
                                    <label><?php echo $pg_name;?></label>
                                </div>
                            </div>
                            <div class="sfdc-col-xs-12 col-sm-7 col-md-6 uiform-pg-row-cont">
                                <?php echo $pg_description;?>
                            </div>
                        </div> 
     <form class="uifm_offline_form" name="offline_form" method="post">
         <input name="form_id" type="hidden" value="<?php echo $form_id; ?>" />
         <input name="item_number" type="hidden" value="<?php echo $item_number; ?>" />
    <input name="offline_return_url" type="hidden" value="<?php echo $offline_return_url; ?>" />
</form>
                        <div class="clearfix"></div>
                    </div>