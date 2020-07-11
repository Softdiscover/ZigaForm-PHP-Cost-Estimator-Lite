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
ob_start();
?>
<div class="rockfm-form-container uiform-wrap sfdc-wrap">
<div class="rockfm-alert-container" style="display:none;"></div>
<form class="rockfm-form" 
	  action="" 
	  name="" 
	  method="post" 
	  data-zgfm-type="2"
	  data-zgfm-version="<?php echo UIFORM_VERSION; ?>"
	  data-zgfm-price-tax-st="<?php echo isset( $main['price_tax_st'] ) ? $main['price_tax_st'] : '0'; ?>"
	  data-zgfm-price-tax-val="<?php echo isset( $main['price_tax_val'] ) ? $main['price_tax_val'] : '0'; ?>"
	  enctype="multipart/form-data" 
	  id="rockfm_form_<?php echo $form_id; ?>">
	 
	<input type="hidden" value="<?php echo $form_id; ?>" class="_rockfm_form_id" name="_rockfm_form_id">
	<input type="hidden" value="<?php echo $calculation['enable_st']; ?>" class="_rockfm_form_calc_math_enable" name="_rockfm_form_calc_math_enable">
   
	<?php
	if ( isset( $wizard['enable_st'] )
			&& intval( $wizard['enable_st'] ) === 1
			&& intval( $tab_count ) > 1
			) {
		?>
		<input type="hidden" value="1" class="_rockfm_wizard_st" >
	<?php } else { ?>
		<input type="hidden" value="0" class="_rockfm_wizard_st" >
	<?php } ?>
	  
	<!--- ajax or post --->
	<?php if ( isset( $main['submit_ajax'] ) && intval( $main['submit_ajax'] ) === 1 ) { ?>
		<input type="hidden" value="1" class="_rockfm_type_submit" name="_rockfm_type_submit">
		<input type="hidden" value="rocket_front_submitajaxmode" name="action">
	<?php } else { ?>
		<input type="hidden" value="0" class="_rockfm_type_submit" name="_rockfm_type_submit">
	<?php } ?>
		
	 <!-- sticky content -->
	   <?php
		if ( isset( $summbox['setting']['enable_st'] )
			   && isset( $main['price_st'] ) && intval( $main['price_st'] ) === 1
			   && intval( $summbox['setting']['enable_st'] ) === 1 ) {
			$tmp_sticky_pos = 'top';
			switch ( intval( $summbox['setting']['pos'] ) ) {
				case 1:
					$tmp_sticky_pos = 'right';
					break;
				case 2:
					$tmp_sticky_pos = 'left';
					break;
				case 3:
					$tmp_sticky_pos = 'bottom';
					break;
				case 4:
					  $tmp_sticky_pos = 'topout';
					break;
				case 5:
					  $tmp_sticky_pos = 'bottomout';
					break;
				case 0:
				default:
					  $tmp_sticky_pos = 'top';
					break;
			}

			?>
			 
	<div  data-sticky-height=""
		  data-sticky-pos="<?php echo $tmp_sticky_pos; ?>"
		  data-sticky-resp-pos="1"
		   class="uiform-sticky-sidebar-box"
		   data-sticky-width="<?php echo $summbox['skin_box']['box_sd_width']; ?>"
		   style="display:none;"><?php echo $form_sticky_content; ?></div>
	<div class="uiform-sticky-topout-section"></div>
		<input type="hidden" value="1" 
		   class="_rockfm_sticky_st" name="_rockfm_sticky_st">
	
		<input type="hidden" value="<?php echo __( 'Summary', 'FRocket_admin' ); ?>" 
		   class="_rockfm_sticky_cpt_modal_title" name="_rockfm_sticky_cpt_modal_title">
	<?php } else { ?>
		<input type="hidden" value="0" 
		   class="_rockfm_sticky_st" name="_rockfm_sticky_st">
	<?php } ?>
	  
	<?php if ( isset( $main['price_currency_symbol'] ) ) { ?>
		<input type="hidden" class="_rockfm_form_price_symbol" value="<?php echo urldecode( $main['price_currency_symbol'] ); ?>">
	<?php } ?>
	<?php if ( isset( $main['price_currency'] ) ) { ?>
		<input type="hidden" class="_rockfm_form_price_currency" value="<?php echo $main['price_currency']; ?>">
	<?php } ?>    
		
	<!--/ sticky content -->
	<div class="uiform-main-form">
		<!-- sticky top section -->
		<div class="uiform-sticky-top-section"></div>
			<!--/ sticky top section -->
		<?php
		if ( intval( $tab_count ) > 1 ) {
			echo $form_tab_head;
		}
		?>
			<div class="uiform-step-content" >
				<?php echo $form_content; ?>
				<div class="clear"></div>
			</div>
			<?php
			if ( intval( $tab_count ) > 1 ) {
				?>
				<?php
				echo $form_tab_footer;
			}
			?>
		 <!-- sticky bottom section -->
		<div class="uiform-sticky-bottom-section"></div>
			<!--/ sticky bottom section -->
	</div>
	<!-- sticky bottom out section -->
	<div class="uiform-sticky-bottomout-section"></div>
	<!--/ sticky bottom out section -->
	
	<?php if ( ! empty( $clogic ) ) { ?>
		<input type="hidden" class="rockfm_clogic_data" value="<?php echo htmlentities( Uiform_Form_Helper::raw_json_encode( $clogic ), ENT_QUOTES, 'UTF-8' ); ?>">
	<?php } ?>
		<input type="hidden" class="rockfm_main_data" value="<?php echo htmlentities( Uiform_Form_Helper::raw_json_encode( $main ), ENT_QUOTES, 'UTF-8' ); ?>">
   
	<div class="space10"></div>
	<!-- The Bootstrap Image Gallery lightbox, should be a child element of the document body -->
		<div id="blueimp-gallery<?php echo $form_id; ?>" class="blueimp-gallery">
			<!-- The container for the modal slides -->
			<div class="slides"></div>
			<!-- Controls for the borderless lightbox -->
			<h3 class="title"></h3>
			<a class="prev">‹</a>
			<a class="next">›</a>
			<a class="close">×</a>
			<a class="play-pause"></a>
			<ol class="indicator"></ol>
			<!-- The modal dialog, which will be used to wrap the lightbox content -->
			<div class="sfdc-modal sfdc-fade">
				<div class="sfdc-modal-dialog">
					<div class="sfdc-modal-content">
						<div class="sfdc-modal-header">
							<button type="button" class="close" aria-hidden="true">&times;</button>
							<h4 class="sfdc-modal-title"></h4>
						</div>
						<div class="sfdc-modal-body next"></div>
						<div class="sfdc-modal-footer">
							<button type="button" class="sfdc-btn sfdc-btn-default pull-left prev">
								<i class="sfdc-glyphicon sfdc-glyphicon-chevron-left"></i>
								<?php echo __( 'Previous', 'FRocket_admin' ); ?>
							</button>
							<button type="button" class="sfdc-btn sfdc-btn-primary next">
								<?php echo __( 'Next', 'FRocket_admin' ); ?>
								<i class="sfdc-glyphicon sfdc-glyphicon-chevron-right"></i>
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	<!-- calculation variables -->
	<?php if ( isset( $calculation['enable_st'] ) && intval( $calculation['enable_st'] ) === 1 ) { ?>
		<?php foreach ( $calculation['variables'] as $key => $value ) { ?>  
	<input type="hidden" value="" class="_zgfm_avars_calc_<?php echo $value['id']; ?>" name="zgfm_avars[calc][<?php echo $value['id']; ?>]">
	<?php } ?>
	
	<?php } ?>
	
</form>
 <?php if ( isset( $main['add_js'] ) && ! empty( $main['add_js'] ) ) { ?>

  <!-- Additional javascript -->
  <script type="text/javascript">
		<?php echo stripslashes( urldecode( $main['add_js'] ) ); ?>
  </script>    
	<!-- adittional javascript -->
  
<?php } ?>
	
<?php if ( isset( $calculation['enable_st'] ) && intval( $calculation['enable_st'] ) === 1 ) { ?>

<script type="text/javascript">
	var _zgfm_front_vars = _zgfm_front_vars || {};
	_zgfm_front_vars.form = _zgfm_front_vars.form || {};
	_zgfm_front_vars.form[<?php echo $form_id; ?>] = {};
	_zgfm_front_vars.form[<?php echo $form_id; ?>]['calc'] = {};
	_zgfm_front_vars.form[<?php echo $form_id; ?>]['calc']['vars_str'] = "<?php echo $calculation['vars_str']; ?>";
	_zgfm_front_vars.form[<?php echo $form_id; ?>]['calc']['vars_num'] = <?php echo count( $calculation['variables'] ); ?>;
	<?php foreach ( $calculation['variables'] as $key => $value ) { ?>
var zgfm_<?php echo $form_id; ?>_calculation_cont<?php echo $calculation['variables'][ $key ]['id']; ?> = function(){
		<?php
		echo str_replace( '[%formid%]', $form_id, stripslashes( urldecode( $calculation['variables'][ $key ]['content_front'] ) ) );
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
						data-dismiss="modal"><?php echo __( 'Close', 'FRocket_admin' ); ?></button>
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
$cntACmp = Uiform_Form_Helper::sanitize_output( $cntACmp );
// $cntACmp = Uiform_Form_Helper::remove_non_tag_space($cntACmp);
ob_end_clean();
echo $cntACmp;
?>
