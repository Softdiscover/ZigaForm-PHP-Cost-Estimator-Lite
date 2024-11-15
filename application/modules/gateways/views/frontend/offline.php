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
if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
?>
<div class="uiform-pg-order-cont uiform-pg-paypal-box">
    <label>
        <div class="uiform-pg-row">
            <div class="uiform-pg-label">
                <div class="uiform-pg-row-cont uiform-pg-radio-btn">
                    <input
                        data-type="1"
                        type="radio"
                        name="typepayment">
                </div>
                <div class="uiform-pg-row-cont uiform-pg-card-number uiform-pg-paypal">
                    <div class="uiform-pg-label-wrap">
                        <?php echo $pg_name; ?>
                    </div>
                </div>
            </div>
            <div class="uiform-pg-description">
                <?php echo $pg_description; ?>
            </div>

        </div>

        <form class="uifm_offline_form" name="offline_form" method="post">
            <input name="form_id" type="hidden" value="<?php echo $form_id; ?>" />
            <input name="item_number" type="hidden" value="<?php echo $item_number; ?>" />
            <input name="offline_return_url" type="hidden" value="<?php echo $offline_return_url; ?>" />
        </form>
    </label>
</div>