<?php
if ( ! defined( 'BASEPATH' ) ) {
	exit( 'No direct script access allowed' );}
ob_start();
?>
   #rockfm_<?php echo $id; ?> .rockfm-inp2-opt-price-lbl,
   #rockfm_<?php echo $id; ?> .rockfm-inp2-opt-price-lbl span{
		<?php if ( ! empty( $price['color'] ) ) { ?>
			color:<?php echo $price['color']; ?>;
		<?php } ?>
		<?php if ( isset( $price['font_st'] ) && intval( $price['font_st'] ) === 1 ) { ?>
			<?php
			$font_temp = json_decode( $price['font'], true );
			if ( isset( $font_temp['family'] ) ) {
				?>
			
			font-family:"<?php echo $font_temp['family']; ?>";
				<?php
				//storing to global fonts
				Uiform_Form_Helper::form_store_fonts( $font_temp );
				//end storing to global fonts
				?>
			<?php } ?>
			
		<?php } ?>
   }
<?php
$cntACmp = ob_get_contents();
 /* remove comments */
$cntACmp = preg_replace( '!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $cntACmp );
 /* remove tabs, spaces, newlines, etc. */
$cntACmp = str_replace( array( "\r\n", "\r", "\n", "\t", '  ', '    ', '    ' ), ' ', $cntACmp );
ob_end_clean();
echo $cntACmp;
?>
