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

<?php if ( isset( $addition_css ) && ! empty( $addition_css ) ) { ?>
	<?php echo stripslashes( urldecode( $addition_css ) ); ?>
<?php } ?>
<?php
if ( isset( $summbox['skin_text'] ) ) {
	?>
	#rockfm_form_<?php echo $idform; ?> .uiform-sticky-sidebar-box-content{
		<?php
		//summbox
		?>
		<?php if ( ! empty( $summbox['skin_text']['color'] ) ) { ?>
			color:<?php echo $summbox['skin_text']['color']; ?>;
		<?php } ?>
		<?php if ( isset( $summbox['skin_text']['font_st'] ) && intval( $summbox['skin_text']['font_st'] ) === 1 ) { ?>
			<?php
			$font_temp = json_decode( $summbox['skin_text']['font'], true );
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
				  
	<?php //end selector ?>       
	}
	<?php
}
?>
	
  #rockfm_form_<?php echo $idform; ?> .uiform-sticky-sidebar-box{
	 <?php
		if ( isset( $summbox['form_background']['show_st'] )
		&& intval( $summbox['form_background']['show_st'] ) === 1 ) {
			?>
					  <?php
						//el_background

						switch ( intval( $summbox['form_background']['type'] ) ) {
							case 1:
								 //solid
								if ( ! empty( $summbox['form_background']['solid_color'] ) ) {
									?>
								background:<?php echo $summbox['form_background']['solid_color']; ?>;
									<?php
								}
								break;
							case 2:
								 //gradient
								if ( ! empty( $summbox['form_background']['start_color'] ) && ! empty( $summbox['form_background']['end_color'] ) ) {
									?>
								background: <?php echo $summbox['form_background']['start_color']; ?>;
								background-image: -webkit-linear-gradient(top, <?php echo $summbox['form_background']['start_color']; ?>, <?php echo $summbox['form_background']['end_color']; ?>);
								background-image: -moz-linear-gradient(top, <?php echo $summbox['form_background']['start_color']; ?>, <?php echo $summbox['form_background']['end_color']; ?>);
								background-image: -ms-linear-gradient(top, <?php echo $summbox['form_background']['start_color']; ?>, <?php echo $summbox['form_background']['end_color']; ?>);
								background-image: -o-linear-gradient(top, <?php echo $summbox['form_background']['start_color']; ?>, <?php echo $summbox['form_background']['end_color']; ?>);
								background-image: linear-gradient(to bottom, <?php echo $summbox['form_background']['start_color']; ?>, <?php echo $summbox['form_background']['end_color']; ?>);
									<?php
								}
								break;
						}
						?>
					  <?php if ( isset( $summbox['form_background']['image'] ) && ! empty( $summbox['form_background']['image'] ) ) { ?>
					background-image:url("<?php echo $summbox['form_background']['image']; ?>");
					background-repeat:repeat;
				<?php } ?>
		  <?php } else { ?>
<?php } ?>   
 <?php
		 //el_border_radius
	if ( isset( $summbox['form_border_radius']['show_st'] ) && intval( $summbox['form_border_radius']['show_st'] ) === 1 ) {
		?>
			 -webkit-border-radius: <?php echo $summbox['form_border_radius']['size']; ?>px;
				-moz-border-radius: <?php echo $summbox['form_border_radius']['size']; ?>px;
				border-radius: <?php echo $summbox['form_border_radius']['size']; ?>px;    
			<?php
	}
	?>
		<?php
		 //el_border
		if ( isset( $summbox['form_border']['show_st'] )
				 && intval( $summbox['form_border']['show_st'] ) === 1
				 && ! empty( $summbox['form_border']['color'] )
				 ) {
			if ( intval( $summbox['form_border']['style'] ) === 2 ) {
				$solid_tmp = 'dotted';
			} else {
				$solid_tmp = 'solid';
			}
			$color_tmp = $summbox['form_border']['color'];
			$size_tmp  = $summbox['form_border']['width'];
			?>
				border: <?php echo $solid_tmp; ?> <?php echo $color_tmp; ?> <?php echo $size_tmp; ?>px;
			<?php

		}
		?>
	<?php
		 //shadow
	if ( isset( $summbox['form_shadow']['show_st'] )
				 && intval( $summbox['form_shadow']['show_st'] ) === 1
				 && ! empty( $summbox['form_shadow']['color'] )
				 ) {
		   $x_tmp     = $summbox['form_shadow']['h_shadow'] . 'px';
		   $y_tmp     = $summbox['form_shadow']['v_shadow'] . 'px';
		   $blur_tmp  = $summbox['form_shadow']['blur'] . 'px';
		   $color_tmp = $summbox['form_shadow']['color'];
		?>
				box-shadow: <?php echo $x_tmp . ' ' . $y_tmp . ' ' . $blur_tmp . ' ' . $color_tmp; ?>;
			<?php

	}
	?>
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
