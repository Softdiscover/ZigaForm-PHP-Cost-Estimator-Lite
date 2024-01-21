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
<textarea placeholder="<?php echo htmlentities($input['placeholder'], ENT_QUOTES, 'UTF-8'); ?>"
                            class="rockfm-txtbox-inp-val sfdc-form-control"
                            data-uifm-tabnum="<?php echo $tab_num; ?>"
                            name="uiform_fields[<?php echo $id; ?>]"
                            ><?php echo $input['value']; ?></textarea>
<?php
$cntACmp = ob_get_contents();
$cntACmp = Uiform_Form_Helper::sanitize_output($cntACmp);
ob_end_clean();

echo $cntACmp;
?>
