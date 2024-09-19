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
$nameField =  do_filter('uifm_ms_render_field_front', "uiform_fields[".$id."]", $id, $type);
?>
 <div class="rockfm-input4-wrap">
    
        <input class="rockfm-input4-slider" 
                type="text"
                data-uifm-inp-price="<?php echo ( isset($price['unit_price']) ) ? floatval($price['unit_price']) : ''; ?>"
                data-uifm-tabnum="<?php echo $tab_num; ?>"
                data-slider-min="<?php echo floatval($input4['set_min']); ?>" 
                data-slider-max="<?php echo floatval($input4['set_max']); ?>"
                data-slider-step="<?php echo floatval($input4['set_step']); ?>"
                data-slider-value="<?php echo floatval($input4['set_default']); ?>"
                data-slider-ticks="[<?php echo floatval($input4['set_min']); ?>, <?php echo floatval($input4['set_max']); ?>]"
                data-slider-ticks-labels='["<?php echo floatval($input4['set_min']); ?>", "<?php echo floatval($input4['set_max']); ?>"]'
                value="<?php echo floatval($input4['set_default']); ?>"
                name="<?php echo $nameField; ?>"
                />
        <div class="rockfm-input4-output">
<?php
if ( isset($price['lbl_show_st']) && intval($price['lbl_show_st']) === 1) {
    $tmp_price_label = urldecode($price['lbl_show_format']);
    if ( ! empty($tmp_price_label)) {
        ?>
            <span class="rockfm-inp4-opt-price-lbl"><?php echo $tmp_price_label; ?></span>
            <?php
    }
}
?>
            
     </div>
    </div>            
<?php
$cntACmp = ob_get_contents();
$cntACmp = Uiform_Form_Helper::sanitize_output($cntACmp);
ob_end_clean();

echo $cntACmp;
?>
