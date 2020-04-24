<?php
if ( ! defined( 'BASEPATH' ) ) {
	exit( 'No direct script access allowed' );
}
ob_start();
?>
<iframe src="<?php echo $url_form; ?>" 
		scrolling="no" 
		id="zgfm-iframe-<?php echo $form_id; ?>"
		frameborder="0" 
		style="border:none;width:100%;" 
		allowTransparency="true"></iframe>
<script type="text/javascript">
   var UIFORM_SRC = "<?php echo $base_url; ?>";
   var _uifmvar = _uifmvar || {};
	_uifmvar.fm_ids = _uifmvar.fm_ids || [];
	_uifmvar.fm_ids.push(['<?php echo $form_id; ?>']);
  (function() {
		var uiform = document.createElement('script');
		uiform.type = 'text/javascript';
		uiform.async = true;
		uiform.src = ('https:' == document.location.protocol ? UIFORM_SRC : UIFORM_SRC) + 'assets/frontend/js/iframe.php';
		var s = document.getElementsByTagName('script')[0];
			   s.parentNode.insertBefore(uiform, s);
		   })();</script>   
<?php
$cntACmp = ob_get_contents();
$cntACmp = Uiform_Form_Helper::sanitize_output( $cntACmp );
ob_end_clean();
echo $cntACmp;
?>
