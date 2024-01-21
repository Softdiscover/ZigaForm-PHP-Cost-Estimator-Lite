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
ob_start();
?>
  <html lang="en">
  <head>
    <meta charset="utf-8">
    <title> </title>
    <meta name="viewport" content="width=device-width, user-scalable=0">
    <meta name="author" content="Softdiscover Company">
    <meta http-equiv="X-UA-Compatible" content="IE=9">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" >
    <meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate, post-check=0, pre-check=0, private" >
    <meta http-equiv="Pragma" content="no-cache" >
    <meta http-equiv="Expires" content="0" >
    <?php
    if ( ! empty($head_files)) {
        foreach ( $head_files['files'] as $value) {
            echo $value;
        }
    }
    ?>
    <script>
    window.iFrameResizer = {
        readyCallback: function(){
            /*var iframe_Id = window.parentIFrame.getId();*/
        }
    }
    </script>
    <script type="text/javascript" src="<?php echo base_url(); ?>/assets/frontend/js/iframe/4.1.1/iframeResizer.contentWindow.min.js"></script>
      
      <?php
        if ( ! empty($script_head)) {
            echo $script_head;
        }
        ?>
          
    <script type="text/javascript">
   
    
    $uifm(document).ready(function ($) {
       
       /* 
        * removed because it conflict with global.js. delete if this has not other conflict
        rocketfm();
        rocketfm.initialize();
        rocketfm.setExternalVars();
       //  $('#uifm_container_<?php echo $form_id; ?>').append('<img src="<?php echo $imagesurl; ?>/loader-form.gif"/></div>');
        rocketfm.loadform_init();*/
        
     });                
   
    </script>
    <style type="text/css">
        .space10 {
        height: 10px;
        border: none;
        display: block;
        padding: 0;
        clear: both;
        }
    </style>
  </head>
  <body>
         <?php
            if ( ! empty($form_html)) {
                echo $form_html;
            }
            ?>
             
      <div class="space10"></div>
  </body>
</html>
<?php
$cntACmp = ob_get_contents();
// $cntACmp = str_replace("\n", '', $cntACmp);
// $cntACmp = str_replace("\t", '', $cntACmp);
// $cntACmp = str_replace("\r", '', $cntACmp);
$cntACmp = str_replace('//-->', ' ', $cntACmp);
$cntACmp = str_replace('//<!--', ' ', $cntACmp);
$cntACmp = Uiform_Form_Helper::sanitize_output($cntACmp);
ob_end_clean();
echo $cntACmp;
?>
