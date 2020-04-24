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
if (!defined('BASEPATH')) {exit('No direct script access allowed');}
?>

<div class="uifm-set-section-input3">
   <div class="sfdc-row">
			<div class="sfdc-col-sm-12">
				<div class="sfdc-form-group">
				<label class="sfdc-control-label" for="">
					<?php echo __('Custom html content','FRocket_admin'); ?>
				</label>
				<div class="sfdc-controls sfdc-form-group">
					<?php
					/*pending add this tinymce*/
					$settings = array( 'media_buttons' => true,'textarea_rows'=>5,'wpautop'=> true);
			//wp_editor('', 'uifm_fld_inp3_html',$settings );
					?>
<textarea 
							class="uifm_tinymce_obj"
							name="uifm_fld_inp3_html"
							id="uifm_fld_inp3_html"></textarea>
				</div>
								  
				</div>
			</div>
	</div>
	<div class="sfdc-row">
			<div class="sfdc-col-sm-12">
				<div class="sfdc-form-group">
					<label for="uifm_fld_lbl_txt"><?php echo __('Text','FRocket_admin'); ?></label>
					<div class="sfdc-input-group">
						<div class="uifm-set-section-input1-txtvalue">
							 <input type="text"
							   data-field-store="input3-value"
							   id="uifm_fld_input3_value"
							   name="uifm_fld_inp3_value"
							   class="sfdc-form-control uifm-f-setoption">   
						</div>
							<div class="sfdc-input-group-btn">
							<select data-field-store="input3-size"
									id="uifm_fld_inp3_size"
									name="uifm_fld_inp3_size"
									data-live-search="true"
									data-style="sfdc-btn-primary"
									data-width="80px"
									class="uifm_field_font_selectpicker uifm-f-setoption-font">
								<optgroup label="Font size" data-max-options="2">
									<?php 
								for ($i = 8; $i <= 48; $i++) {
								?>
								<option value="<?php echo $i;?>"><?php echo $i.' px';?></option>
								<?php    
								}
								?>
								</optgroup>
							</select>
						</div>
						<div class="sfdc-input-group-btn">
							<button data-field-store="input3-bold"
								class="sfdc-btn sfdc-btn-warning uifm-f-setoption-btn"
								type="button">
								<i class="fa fa-bold"></i>
								<input type="hidden" id="uifm_fld_inp3_bold" name="uifm_fld_inp3_bold" value="0">
							</button>
							<button  data-field-store="input3-italic"
								class="sfdc-btn sfdc-btn-warning uifm-f-setoption-btn"
									type="button"><i class="fa fa-italic"></i>
								<input type="hidden" id="uifm_fld_inp3_italic" name="uifm_fld_inp3_italic"  value="0">
							</button>
							<button  data-field-store="input3-underline"
								class="sfdc-btn sfdc-btn-warning uifm-f-setoption-btn"
									type="button"><i class="fa fa-underline"></i>
								<input type="hidden" id="uifm_fld_inp3_u" name="uifm_fld_inp3_u" value="0">
							</button>
						</div>
						
						
						
					</div>

				</div>
			</div>
		</div>
	 <div class="sfdc-row">
			<div class="sfdc-col-md-4">
			   <div class="sfdc-form-group">
					<label ><?php echo __('Color','FRocket_admin'); ?></label>
					<div 
						data-field-store="input3-color"
						class="sfdc-input-group uifm-custom-color">
						<input type="text" value="" 
							   id="uifm_fld_inp3_color" 
							   name="uifm_fld_inp3_color" class="sfdc-form-control" />
						<span class="sfdc-input-group-addon"><i></i></span>
					</div>

				</div>
			</div>
		 <div class="sfdc-col-sm-8">
				<div class="sfdc-form-group">
					<label ><?php echo __('Font family','FRocket_admin'); ?></label>
					<div class="sfdc-input-group uifm-custom-font">
						<?php 
						$attributes = array(
							'name' => 'uifm_fld_inp3_font',
							'id' => 'uifm_fld_inp3_font',
							'data-field-store'=>'input3-font'
							);
						$default_value = '{"family":"Arial, Helvetica, sans-serif","name":"Arial","classname":"arial"}';
						?>
						<?php $obj_sfm->get_view_menu($attributes,$default_value); ?>
						<span class="sfdc-input-group-addon">
						<input 
							data-field-store="input3-font_st"
							id="uifm_fld_inp3_font_st"
							name="uifm_fld_inp3_font_st"
							class="uifm-f-setoption-st"
							value="1"
							type="checkbox">
						</span>
						
					</div>

				</div>
			</div>
		</div>
	<div class="sfdc-row">
					<div class="sfdc-col-md-12">
						<label ><?php echo __('Input value alignment','FRocket_admin'); ?></label>
						<div class="sfdc-controls sfdc-form-group">
							<div class="sfdc-btn-group sfdc-btn-group-justified" data-toggle="buttons">
								<label 
									data-field-store="input3-val_align"
									data-toggle-enable="sfdc-btn-success"
									data-toggle-disable="sfdc-btn-success"
									data-settings-option="group-radiobutton"
									class="sfdc-btn sfdc-btn-success uifm-f-setoption-btn" >
								<input type="radio" 
									id="uifm_fld_inp3_align_1"
									name="uifm_fld_inp3_align_1" value="0"> <i class="fa fa-align-left"></i> <?php echo __('Left','FRocket_admin'); ?>
								</label>
								<label 
									data-field-store="input3-val_align"
									data-toggle-enable="sfdc-btn-success"
									data-toggle-disable="sfdc-btn-success"
									data-settings-option="group-radiobutton"
									class="sfdc-btn sfdc-btn-success uifm-f-setoption-btn" >
								<input type="radio" 
									id="uifm_fld_inp3_align_2"
									name="uifm_fld_inp3_align_2" value="1"> <i class="fa fa-align-center"></i> <?php echo __('Center','FRocket_admin'); ?>
								</label>
								<label 
									data-field-store="input3-val_align"
									data-toggle-enable="sfdc-btn-success"
									data-toggle-disable="sfdc-btn-success"
									data-settings-option="group-radiobutton"
									class="sfdc-btn sfdc-btn-success uifm-f-setoption-btn" >
								<input type="radio" 
									id="uifm_fld_inp3_align_3" 
									name="uifm_fld_inp3_align_3" value="2"> <i class="fa fa-align-right"></i> <?php echo __('Right','FRocket_admin'); ?>
								</label>
							</div>
						</div>
					</div>
			</div>
</div>
