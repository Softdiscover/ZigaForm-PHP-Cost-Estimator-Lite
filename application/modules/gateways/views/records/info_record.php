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
<div id="uiform-container" class="uiform-wrap uiform-page_records uifm-gateway-inv-info">
	<input type="hidden" id="rec_id" value="<?php echo $record_id; ?>">
	
	<div id="uiform-inforecord-container">
		 <div class="space20"></div>
		  
			 <?php echo $show_summary; ?>
		  
	</div>
	<div class="space10"></div>
   <div class="sfdc-row">
	   <div class="sfdc-col-md-12">
<a 
	href="javascript:void(0);"
	onclick="javascript:rocketform.genpdf_infoinvoice(<?php echo $record_id; ?>);"
	class="sfdc-btn sfdc-btn-warning"><i class="fa fa-file-pdf-o"></i> <?php echo __( 'Export to PDF', 'FRocket_admin' ); ?></a>
	   </div>
   </div>
</div>
