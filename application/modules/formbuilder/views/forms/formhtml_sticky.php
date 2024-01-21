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
<div class="uiform-sticky-sidebar-box-content">
    <?php
    if ( isset($summbox['skin_text']['text'])) {
        echo urldecode($summbox['skin_text']['text']);
    }
    ?>
</div>
<?php
$cntACmp = ob_get_contents();

// $cntACmp = Uiform_Form_Helper::remove_non_tag_space($cntACmp);
ob_end_clean();
echo $cntACmp;
?>
