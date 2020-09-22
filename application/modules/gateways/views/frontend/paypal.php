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
if ( ! defined( 'BASEPATH' ) ) {
	exit( 'No direct script access allowed' );}
?>
<div class="uiform-pg-order-cont uiform-pg-paypal-box">
						<div class="">
							<div class="pull-left uiform-pg-row-cont uiform-pg-radio-btn">
								<input 
									data-type="2"
									type="radio"
									name="typepayment">
							</div>
							<div class=" col-xs-10 col-sm-3 
								 col-md-5 
								 uiform-pg-row-cont uiform-pg-card-number uiform-pg-paypal">
								<span></span> 
								<div class="uiform-pg-lable-wrap">
									<label><?php echo $pg_name; ?></label>
								</div>
							</div>
							<div class="sfdc-col-xs-12 col-sm-7 col-md-6 uiform-pg-row-cont">
								<?php echo $pg_description; ?>
							</div>
						</div>   
	
<?php
if ( intval( $mod_test ) == 1 ) {
	$paypal_url = 'https://www.sandbox.paypal.com/cgi-bin/webscr';
} else {
	$paypal_url = 'https://www.paypal.com/cgi-bin/webscr';
}
?>
<form class="uifm_paypal_form" name="paypal_form" method="post" action="<?php echo $paypal_url; ?>">
	<?php if ( isset( $paypal_method ) && intval( $paypal_method ) === 1 ) { ?>
		<input name="cmd" type="hidden" value="_xclick" />
		<input name="amount" type="hidden" value="<?php echo $amount; ?>">
		<input name="no_note" type="hidden" value="0" />
		<input name="business" type="hidden" value="<?php echo $paypal_email; ?>">
		
		<input name="currency_code" type="hidden" value="<?php echo $paypal_currency; ?>" />
		<input name="item_name" type="hidden" value="<?php echo $pg_name; ?>" >
		<input name="item_number" type="hidden" value="<?php echo $item_number; ?>" />
		<input name="rm" type="hidden"  value="2" />
	<?php } else { ?>
		<input name="business" type="hidden" value="<?php echo $paypal_email; ?>">
		<input name="currency_code" type="hidden" value="<?php echo $paypal_currency; ?>" />
		<input type="hidden" name="cmd" value="_cart">
		<input type="hidden" name="upload" value="1">
		<input type="hidden" name="discounted_cost" value="">
		<input type="hidden" value="IN" name="lc">
		<input type="hidden" name="total_cost" value="<?php echo $amount; ?>"> 
		<?php foreach ( $paypal_individuals as $value ) { ?>
			<input type="hidden" value="<?php echo $value['item_name']; ?>" name="item_name_<?php echo $value['item_num']; ?>">
			<input type="hidden" value="<?php echo isset( $value['item_amount'] ) ? $value['item_amount'] : 0; ?>" name="amount_<?php echo $value['item_num']; ?>">
			<input type="hidden" value="<?php echo $value['item_qty']; ?>" name="quantity_<?php echo $value['item_num']; ?>">
		<?php } ?>
		
	<?php } ?>
	<input name="custom" type="hidden" value="<?php echo $item_number; ?>" />
	<input name="notify_url" type="hidden"  value="<?php echo site_url( 'gateways/paypal/ipn' ); ?>" />
	<input name="return" type="hidden" value="<?php echo $paypal_return_url; ?>" />
	<input name="cancel_return" type="hidden" value="<?php echo $paypal_cancel_url; ?>" />
</form>
<div class="space05"></div>
	
						<div class="sfdc-clearfix"></div>
					</div>
