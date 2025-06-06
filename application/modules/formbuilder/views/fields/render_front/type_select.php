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
$nameField =  apply_filters('uifm_ms_render_field_front', "uiform_fields[".$id."]", $id, $type);
?>
 <?php
    $defaul_class = 'sfdc-form-control uifm-input2-opt-main ';
    if ( intval($input2['style_type']) === 1) {
        $defaul_class = 'rockfm-input2-sel-styl1';
    }
    if ( intval($input2['style_type']) === 2) {
        $defaul_class = 'rockfm-input2-sel-styl2';
    }
    ?>
<div data-uifm-tabnum="<?php echo $tab_num; ?>"
     data-theme-type="<?php echo $input2['style_type']; ?>"
     data-theme-stl1-txtnosel="<?php echo isset($input2['stl1']['txt_noselected']) ? $input2['stl1']['txt_noselected'] : ''; ?>"
     data-theme-stl1-txtnomatch="<?php echo isset($input2['stl1']['txt_noresult']) ? $input2['stl1']['txt_noresult'] : ''; ?>"
     data-theme-stl1-txtcountsel="<?php echo isset($input2['stl1']['txt_countsel']) ? $input2['stl1']['txt_countsel'] : ''; ?>"
     class="rockfm-input2-wrap"> 
    <select class="<?php echo $defaul_class; ?>"
            name="<?php echo $nameField; ?>"
            >
<?php
usort($input2['options'], ['Uiform_Form_Helper', 'compareByOrder']);
foreach ( $input2['options'] as $key => $value) {
    if ( ! empty($value['label'])) {
        $checked = '';
        if ( isset($value['checked']) && intval($value['checked']) === 1) {
            $checked = 'selected';
        }
        ?>
    <option <?php echo $checked; ?>
        value="<?php
        if ( isset($value['id'])) {
            echo $value['id'];
        }
        ?>"
        data-uifm-inp-val="<?php
        if ( isset($value['value'])) {
            echo esc_attr(Uiform_Form_Helper::sanitizeInput($value['value']));
        }
        ?>"
        data-uifm-inp-price="<?php echo ( isset($value['price']) ) ? $value['price'] : ''; ?>"
        data-opt-index="<?php echo $value['id']; ?>" ><?php echo $value['label']; ?></option>
        <?php
    }
}
?>
    </select>
    <?php
    if ( isset($price['lbl_show_st']) && intval($price['lbl_show_st']) === 1) {
        $tmp_price_label = urldecode($price['lbl_show_format']);
        if ( ! empty($tmp_price_label)) {
            ?>
            <span class="rockfm-inp2-opt-price-lbl"><?php echo $tmp_price_label; ?></span>
            <?php
        }
    }
    ?>
</div>
<?php
$cntACmp = ob_get_contents();
$cntACmp = Uiform_Form_Helper::sanitize_output($cntACmp);
ob_end_clean();

echo $cntACmp;
?>
