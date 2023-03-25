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
?>

<div class="uiform-set-field-wrap" id="uiform-set-form-summbox">
   <div class="space10"></div>
	<div class="sfdc-row">
		<div class="sfdc-col-sm-12">
			<div class="sfdc-form-group">
					<label for="uifm_frm_summbox_st"><?php echo __( 'Enable summary box', 'FRocket_admin' ); ?></label>
					 <input class="uifm_frm_summbox_st_event switch-field"
								   id="uifm_frm_summbox_st"
								   data-form-msec="summbox"
								   data-form-store="setting-enable_st"
								   name="uifm_frm_summbox_st"
								   type="checkbox"/>
			</div>
		</div>
	</div>
	<div class="sfdc-row">
		<div class="sfdc-col-md-12">
			<div class="divider2">
			<div class="mask"></div>
			<span><i><?php echo __( 'Layout', 'FRocket_admin' ); ?></i></span>
			</div>
		</div>
	</div>
	<div class="sfdc-row">
		<div class="sfdc-col-md-3">
			<label  ><?php echo __( 'Select Position', 'FRocket_admin' ); ?></label>
		</div>
		<div class="sfdc-col-sm-9">
				<div class="sfdc-form-group">

						<div class="uifm_tabsb_selecpicker_wrap">
						<select class="uifm_selectpicker"
								id="uifm_frm_summbox_skin_pos"
								data-form-msec="summbox"
								data-form-store="setting-pos" >
							<option value="0"><?php echo __( 'Top', 'FRocket_admin' ); ?></option>
							<option value="1"><?php echo __( 'Right', 'FRocket_admin' ); ?></option>
							<option value="2"><?php echo __( 'Left', 'FRocket_admin' ); ?></option>
							<option value="3"><?php echo __( 'Bottom', 'FRocket_admin' ); ?></option>
							<option value="4"><?php echo __( 'Top out', 'FRocket_admin' ); ?></option>
							<option value="5"><?php echo __( 'Bottom out', 'FRocket_admin' ); ?></option>
						</select>  
						</div>

				</div>
			</div>
	</div>
   <div class="space20"></div>
   <div id="uifm_frm_summbox_skin_wrap_block1">
	<div class="sfdc-row">
		<div class="sfdc-col-md-3">
			<label ><?php echo __( 'Side Box Width', 'FRocket_admin' ); ?></label>
		</div>
		<div class="sfdc-col-sm-9">
				<input type="text"
					data-form-msec="summbox"
					data-form-store="skin_box-box_sd_width" 
					style="width:100%;"
					id="uifm_frm_summbox_skinb_sdwidth"
					name="uifm_frm_summbox_skinb_sdwidth"
					data-slider-step="1"
					data-slider-max="400"
					data-slider-min="200" data-slider-id="" class="uiform-opt-slider">
		 </div>
	</div>
   </div>
   <div id="uifm_frm_summbox_skin_wrap_block2">
   <div class="sfdc-row">
		<div class="sfdc-col-md-12">
			<div class="divider2">
			<div class="mask"></div>
			<span><i><?php echo __( 'Content', 'FRocket_admin' ); ?></i></span>
			</div>
		</div>
	</div>
	<div class="sfdc-row">
				<div class="sfdc-col-sm-12">
					<div class="sfdc-form-group">

					<label class="sfdc-control-label" for=""><?php echo __( 'Variables', 'FRocket_admin' ); ?>: <i>(<?php echo __( 'To be used in text content', 'FRocket_admin' ); ?>)</i> </label>
				   
						<div class="uifm-form-var-box">
							<!-- Nav tabs -->
							<ul class="sfdc-nav sfdc-nav-tabs">
							  <!--  <li ><a href="#uiform-form-summ-vars-tab-1" data-toggle="sfdc-tab"><?php echo __( 'Form', 'FRocket_admin' ); ?></a></li>-->
								<li class="sfdc-active"><a href="#uiform-form-summ-vars-tab-2" data-toggle="sfdc-tab" class="last-child"><?php echo __( 'General', 'FRocket_admin' ); ?></a></li>
							</ul>
							<!-- Tab panes -->
							<div class="sfdc-tab-content">
							   <!-- <div class="sfdc-tab-pane" id="uiform-form-summ-vars-tab-1">
									<div class="uiform-tab-content2">
										<div class="uifm-tab-inner-vars-1">
											<table class="sfdc-table sfdc-table-striped sfdc-table-bordered sfdc-table-condensed uifm-tab-box-vars-1">
												<thead>
													<tr>
														<th rowspan="2"><?php echo __( 'Field', 'FRocket_admin' ); ?></th>
														<th colspan="3"><?php echo __( 'Codes', 'FRocket_admin' ); ?></th>
													</tr>
													<tr>
														<th><?php echo __( 'label', 'FRocket_admin' ); ?></th>
														<th><?php echo __( 'input', 'FRocket_admin' ); ?></th>
														<th><?php echo __( 'quantity', 'FRocket_admin' ); ?></th>
													</tr>
												</thead>
												<tbody>
												   
												</tbody>
											</table>
										</div>
									</div>
								</div>-->
								<div class="sfdc-tab-pane sfdc-in sfdc-active" id="uiform-form-summ-vars-tab-2">
									<div class="uiform-tab-content2">
									   <div class="uifm-tab-inner-vars-2">
											<table class="sfdc-table sfdc-table-striped sfdc-table-bordered sfdc-table-condensed uifm-tab-box-vars-2">
												<thead>
													<tr>
														<th width="150"><?php echo __( 'variables', 'FRocket_admin' ); ?></th>
														<th ><?php echo __( 'Code', 'FRocket_admin' ); ?></th>
													</tr>
													
												</thead>
												<tbody>
													<tr>
														<td><?php echo __( 'Currency symbol', 'FRocket_admin' ); ?></td>
														<td><textarea onclick="this.select();">[zgfm_fvar opt="form_cur_symbol"]</textarea></td>
														
													</tr>
													<tr>
														<td><?php echo __( 'Currency code', 'FRocket_admin' ); ?></td>
													   <td><textarea onclick="this.select();">[zgfm_fvar opt="form_cur_code"]</textarea></td>
														
													</tr>
													<tr>
														<td><?php echo __( 'Sub Total price', 'FRocket_admin' ); ?></td>
														 <td><textarea onclick="this.select();">[zgfm_fvar opt="form_subtotal_amount"]</textarea></td>
													</tr>
													<tr>
														<td><?php echo __( 'Tax', 'FRocket_admin' ); ?></td>
														 <td><textarea onclick="this.select();">[zgfm_fvar opt="form_tax_amount"]</textarea></td>
													</tr>
													<tr>
														<td><?php echo __( 'Total Amount price', 'FRocket_admin' ); ?></td>
														<td><textarea onclick="this.select();">[zgfm_fvar opt="form_total_amount"]</textarea></td>
													</tr>
													<tr>
														<td><?php echo __( 'Summary content', 'FRocket_admin' ); ?></td>
														<td><textarea style="width:298px;" onclick="this.select();">[uifm_summary rows=&#x22;8&#x22; heading=&#x22;summary : &#x22;]</textarea></td>
													</tr>
													<tr>
														<td><?php echo __( 'Summary link', 'FRocket_admin' ); ?></td>
														<td><textarea style="width: 284px;" onclick="this.select();">[uifm_summary_link value=&#x22;Show summary&#x22;]</textarea></td>
													</tr>
												</tbody>
											</table>
										</div>
									</div> 
								</div>
							</div>
						</div>    
					<label class="sfdc-control-label" for="">
						<?php echo __( 'Text content', 'FRocket_admin' ); ?>
					</label>
					<div class="sfdc-controls sfdc-form-group">
						<?php
						/*pending add this tinymce*/
						$settings = array(
							'media_buttons' => true,
							'textarea_rows' => 5,
						);
							// wp_editor('', 'uifm_frm_summbox_skintxt_txt',$settings );
						?>
						<textarea 
							class="uifm_tinymce_obj"
							name="uifm_frm_summbox_skintxt_txt"
							id="uifm_frm_summbox_skintxt_txt"></textarea>
					</div>
				   
					
					</div>
				</div>
			</div>
   </div>  
   
   <div class="sfdc-row">
			<div class="sfdc-col-md-4">
			   <div class="sfdc-form-group">
						<label ><?php echo __( 'Text Color', 'FRocket_admin' ); ?></label>
						<div data-form-store="skin_text-color"
								data-form-msec="summbox"
								class="sfdc-input-group uifm-custom-color">
							<span class="sfdc-input-group-addon"><i></i></span>
							<input  placeholder="<?php echo __( 'Pick the color', 'FRocket_admin' ); ?>"
									id="uifm_frm_summbox_skintxt_color"
									type="text" 
									value="" 
									name="" 
									class="sfdc-form-control" />
						</div>
					</div>
			</div>
		 <div class="sfdc-col-sm-8">
				<div class="sfdc-form-group">
					<label ><?php echo __( 'Text Font', 'FRocket_admin' ); ?></label>
					<div class="sfdc-input-group uifm-custom-font">
						<input type="hidden" value="" name="uifm_fld_lbl_font">
						<?php
						$attributes    = array(
							'name'            => 'uifm_frm_summbox_skintxt_font',
							'id'              => 'uifm_frm_summbox_skintxt_font',
							'data-form-store' => 'skin_text-font',
							'data-form-msec'  => 'summbox',
						);
						$default_value = '{"family":"Arial, Helvetica, sans-serif","name":"Arial","classname":"arial"}';
						?>
						<?php $obj_sfm->get_view_menu( $attributes, $default_value ); ?>
						<span class="sfdc-input-group-addon">
						<input 
							data-form-store="skin_text-font_st"
							data-form-msec="summbox"
							id="uifm_frm_summbox_skintxt_font_st"
							name="uifm_frm_summbox_skintxt_font_st"
							class="uifm-f-setoption-st"
							value="1"
							type="checkbox">
						</span>
					</div>

				</div>
			</div>
		</div>
	<div >
	<div class="sfdc-row">
		<div class="sfdc-col-md-12">
			<div class="divider2">
			<div class="mask"></div>
			<span><i><?php echo __( 'Background', 'FRocket_admin' ); ?></i></span>
			</div>
		</div>
	</div>
	<div class="sfdc-row">
		<div class="sfdc-col-md-12">
			<div class="sfdc-form-group">
					<label ><?php echo __( 'Background color', 'FRocket_admin' ); ?></label>
					<div class="">
						<div class="sfdc-col-md-3">
							<input class="switch-field"
								   data-form-msec="summbox"
								   data-form-store="form_background-show_st"
								   id="uifm_frm_summbox_fmbg_st"
								   type="checkbox"/>
						</div>
						<div class="sfdc-col-md-9">
							 <div class="sfdc-row">
								<div class="sfdc-col-md-3">
								   <label ><?php echo __( 'Type', 'FRocket_admin' ); ?></label>
								</div>
								<div class="sfdc-col-sm-9">
										<div class="sfdc-controls sfdc-form-group">
											<div class="sfdc-btn-group sfdc-btn-group-justified"
												 data-toggle="buttons">
												<label 
													data-form-store="form_background-type"
													data-form-msec="summbox"
													data-toggle-enable="sfdc-btn-warning"
													data-toggle-disable="sfdc-btn-warning"
													data-settings-option="group-radiobutton"
													id="uifm_frm_summbox_fmbg_type_1"
													class="sfdc-btn sfdc-btn-warning uifm-fmsummbox-setoption-btn" >
												<input type="radio"  value="1">  <?php echo __( 'Solid', 'FRocket_admin' ); ?>
												</label>
												<label 
													data-form-store="form_background-type"
													data-form-msec="summbox"
													data-toggle-enable="sfdc-btn-warning"
													data-toggle-disable="sfdc-btn-warning"
													data-settings-option="group-radiobutton"
													id="uifm_frm_summbox_fmbg_type_2"
													class="sfdc-btn sfdc-btn-warning uifm-fmsummbox-setoption-btn" >
												<input type="radio"  value="2" checked> <?php echo __( 'Gradient', 'FRocket_admin' ); ?>
												</label>
											</div>
										</div>
									</div>
							</div>
							<div class="sfdc-row">
								<div class="sfdc-col-md-3">
								   <label ><?php echo __( 'Color', 'FRocket_admin' ); ?></label>
								</div>
								<div class="sfdc-col-sm-9">
										<div class="sfdc-form-group">
											<div data-form-store="form_background-solid_color"
												 data-form-msec="summbox"
												 class="sfdc-input-group uifm-custom-color">
												<span class="sfdc-input-group-addon"><i></i></span>
												<input  placeholder="<?php echo __( 'Pick the color', 'FRocket_admin' ); ?>"
														id="uifm_frm_summbox_fmbg_color_1"
														type="text" 
														value="" 
														name="" 
														class="sfdc-form-control" />
											</div>
										</div>
									</div>
							</div>
							<div class="sfdc-row">
								<div class="sfdc-col-md-3">
								   <label ><?php echo __( 'Start color', 'FRocket_admin' ); ?></label>
								</div>
								<div class="sfdc-col-sm-9">
										<div class="sfdc-form-group">
											<div 
												data-form-store="form_background-start_color"
												data-form-msec="summbox"
												class="sfdc-input-group uifm-custom-color">
												<span class="sfdc-input-group-addon"><i></i></span>
												<input  placeholder="<?php echo __( 'Pick the color', 'FRocket_admin' ); ?>"
														type="text" value=""
														id="uifm_frm_summbox_fmbg_color_2"
														name="" class="sfdc-form-control" />
											</div>
										</div>
									</div>
							</div>
							<div class="sfdc-row">
								<div class="sfdc-col-md-3">
								   <label ><?php echo __( 'End color', 'FRocket_admin' ); ?></label>
								</div>
								<div class="sfdc-col-sm-9">
										<div class="sfdc-form-group">
											<div 
												data-form-store="form_background-end_color"
												data-form-msec="summbox"
												class="sfdc-input-group uifm-custom-color">
												<span class="sfdc-input-group-addon"><i></i></span>
												<input  placeholder="<?php echo __( 'Pick the color', 'FRocket_admin' ); ?>" 
														id="uifm_frm_summbox_fmbg_color_3"
														type="text" value="" name="" class="sfdc-form-control" />
											</div>
										</div>
									</div>
							</div>
							
							 <!--- <div class="sfdc-row">
								<div class="sfdc-col-md-4">
								   <label ><?php echo __( 'Background image', 'FRocket_admin' ); ?></label>
								</div>
								<div class="sfdc-col-sm-8">
										<div class="sfdc-form-group">
											<div class="uifm_frm_summbox_bg_thumbnail" id="uifm_frm_summbox_bg_srcimg_wrap">
												
											</div>
											<input 
												name="uifm_frm_summbox_bg_imgurl" 
												id="uifm_frm_summbox_bg_imgurl" 
												value=""                                                
												type="hidden">
												<input id="uifm_frm_summbox_bg_btnadd" 
													value="<?php echo __( 'Update Image', 'flexy_admin' ); ?>" 
													class="button-secondary" 
													type="button">
												<a href="javascript:void(0);"
												   onclick="javascript:rocketform.loadForm_tab_skin_delbgimg();"
												   class="sfdc-btn sfdc-btn-default"
												   >
													<i class="fa fa-trash-o"></i>
												</a>
	
										</div>
									</div>
							</div>-->
							
							
						</div>
					</div>
				</div>
		   
		</div>
	</div>
	</div>
   <div class="sfdc-row">
		<div class="sfdc-col-md-12">
			<div class="divider2">
			<div class="mask"></div>
			<span><i><?php echo __( 'Border', 'FRocket_admin' ); ?></i></span>
			</div>
		</div>
	</div>
	<div class="sfdc-row">
		<div class="sfdc-col-md-12">
			<div class="sfdc-form-group">
					<label ><?php echo __( 'Border radius', 'FRocket_admin' ); ?></label>
					<div class="">
						<div class="sfdc-col-md-3">
							<input 
								   data-form-store="form_border_radius-show_st"
								   data-form-msec="summbox"
								   class="switch-field"
								   name="uifm_frm_summbox_fmbora_st"
								   id="uifm_frm_summbox_fmbora_st"
								   type="checkbox"/>
						</div>
						<div class="sfdc-col-md-9">
							<input type="text" style="width:100%;"
								   data-form-store="form_border_radius-size"
								   data-form-msec="summbox"
								   data-slider-value="14"
								   data-slider-step="1"
								   data-slider-max="60"
								   data-slider-min="0" 
								   data-slider-id="" 
								   id="uifm_frm_summbox_fmbora_size" 
								   class="uiform-opt-slider">
						</div>
					</div>
				</div>
		</div>
	</div>
	<div class="space10"></div>
	<div class="sfdc-row">
		<div class="sfdc-col-md-12">
			<div class="sfdc-form-group">
					<label ><?php echo __( 'Border', 'FRocket_admin' ); ?></label>
					<div class="">
						<div class="sfdc-col-md-3">
							<input 
								   data-form-store="form_border-show_st"
								   data-form-msec="summbox"
								   class="switch-field"
								   name="uifm_frm_summbox_fmbor_st"
								   id="uifm_frm_summbox_fmbor_st"
								   type="checkbox"/>
						</div>
						<div class="sfdc-col-md-9">
							<div class="sfdc-row">
								<div class="sfdc-col-md-3">
								   <label ><?php echo __( 'Color', 'FRocket_admin' ); ?></label>
								</div>
								<div class="sfdc-col-sm-9">
										<div class="sfdc-form-group">
											<div data-form-store="form_border-color"
												 data-form-msec="summbox"
												 class="sfdc-input-group uifm-custom-color">
												<span class="sfdc-input-group-addon"><i></i></span>
												<input  placeholder="<?php echo __( 'Pick the color', 'FRocket_admin' ); ?>" 
														type="text" 
														value="" 
														name="uifm_frm_summbox_fmbor_color"
														id="uifm_frm_summbox_fmbor_color"
														class="sfdc-form-control" />
											</div>
										</div>
									</div>
							</div>
						   
							<div class="sfdc-row">
								<div class="sfdc-col-md-3">
								   <label ><?php echo __( 'border style', 'FRocket_admin' ); ?></label>
								</div>
								<div class="sfdc-col-sm-9">
										<div class="sfdc-controls sfdc-form-group">
											<div class="sfdc-btn-group sfdc-btn-group-justified" data-toggle="buttons">
												<label 
													data-form-store="form_border-style"
													data-form-msec="summbox"
													data-toggle-enable="sfdc-btn-warning"
													data-toggle-disable="sfdc-btn-warning"
													data-settings-option="group-radiobutton"
													id="uifm_frm_summbox_fmbor_style_1"
													class="sfdc-btn sfdc-btn-warning uifm-fmsummbox-setoption-btn" >
												<input type="radio"  value="1" checked><?php echo __( 'Solid', 'FRocket_admin' ); ?>
												</label>
												<label 
													data-form-store="form_border-style"
													data-form-msec="summbox"
													data-toggle-enable="sfdc-btn-warning"
													data-toggle-disable="sfdc-btn-warning"
													data-settings-option="group-radiobutton"
													id="uifm_frm_summbox_fmbor_style_2"
													class="sfdc-btn sfdc-btn-warning uifm-fmsummbox-setoption-btn" >
												<input type="radio"  value="2">  <?php echo __( 'Dotted', 'FRocket_admin' ); ?>
												</label>
											</div>
										</div>
									</div>
							</div>
							<div class="sfdc-row">
								<div class="sfdc-col-md-3">
								   <label ><?php echo __( 'Border width', 'FRocket_admin' ); ?></label>
								</div>
								<div class="sfdc-col-sm-9">
									  <input 
										data-form-store="form_border-width"
										data-form-msec="summbox"
										type="text" style="width:100%;"
										data-slider-value="14"
										data-slider-step="1"
										data-slider-max="20"
										data-slider-min="0"
										data-slider-id="" 
										id="uifm_frm_summbox_fmbor_width"
										class="uiform-opt-slider">
									</div>
							</div>
						</div>
					</div>
				</div>
		   
		</div>
	</div>
	
	 <div class="sfdc-row">
		<div class="sfdc-col-md-12">
			<div class="sfdc-form-group">
					<label ><?php echo __( 'Box Shadow', 'FRocket_admin' ); ?></label>
					<div class="">
						<div class="sfdc-col-md-3">
							<input class="switch-field"
								   data-form-store="form_shadow-show_st"
								   data-form-msec="summbox"
								   id="uifm_frm_summbox_sha_st"
								   name="uifm_frm_summbox_sha_st"
								   type="checkbox"/>
						</div>
						<div class="sfdc-col-md-9">
							<div class="sfdc-row">
								<div class="sfdc-col-md-3">
								   <label ><?php echo __( 'Color', 'FRocket_admin' ); ?></label>
								</div>
								<div class="sfdc-col-sm-9">
										<div class="sfdc-form-group">
											<div  data-form-store="form_shadow-color"
												  data-form-msec="summbox"
												  class="sfdc-input-group uifm-custom-color">
												<span class="sfdc-input-group-addon"><i></i></span>
												<input  placeholder="<?php echo __( 'Pick the color', 'FRocket_admin' ); ?>"
														type="text"
														value=""
														id="uifm_frm_summbox_sha_co"
														name="uifm_frm_summbox_sha_co"
														class="sfdc-form-control" />
											</div>
											
										</div>
									</div>
							</div>
							<div class="space20"></div>
						   <div class="sfdc-row">
								<div class="sfdc-col-md-3">
								   <label ><?php echo __( 'horizontal', 'FRocket_admin' ); ?></label>
								</div>
								<div class="sfdc-col-sm-9">
									  <input type="text"
											 data-form-store="form_shadow-h_shadow"
											 data-form-msec="summbox"
										id="uifm_frm_summbox_sha_x"
									   name="uifm_frm_summbox_sha_x"      
										data-slider-step="1"
										data-slider-max="30"
										data-slider-min="0"
										data-slider-id="" class="uiform-opt-slider">
									</div>
							</div>
						  <div class="space20"></div>
							<div class="sfdc-row">
								<div class="sfdc-col-md-3">
								   <label ><?php echo __( 'vertical', 'FRocket_admin' ); ?></label>
								</div>
								<div class="sfdc-col-sm-9">
									  <input type="text"
										   data-form-store="form_shadow-v_shadow"
										   data-form-msec="summbox"
											 style="width:100%;"
										id="uifm_frm_summbox_sha_y"
										name="uifm_frm_summbox_sha_y"
										
										data-slider-step="1"
										data-slider-max="30"
										data-slider-min="0" data-slider-id="" class="uiform-opt-slider">
									</div>
							</div>
							<div class="space20"></div>
							<div class="sfdc-row">
								<div class="sfdc-col-md-3">
								   <label ><?php echo __( 'blur', 'FRocket_admin' ); ?></label>
								</div>
								<div class="sfdc-col-sm-9">
									  <input type="text"
										data-form-store="form_shadow-blur"
										data-form-msec="summbox"
											 style="width:100%;"
										id="uifm_frm_summbox_sha_blur"
										name="uifm_frm_summbox_sha_blur"
										
										data-slider-step="1"
										data-slider-max="30"
										data-slider-min="0" data-slider-id="" class="uiform-opt-slider">
									</div>
							</div>
							
						</div>
					</div>
				</div>
		   
		</div>
	</div>
</div>
<script type="text/javascript">
//<![CDATA[
jQuery(document).ready(function ($) {
	//
	
	var selectedValue=$('#uifm_frm_summbox_skin_pos').selectpicker('val');
		 switch(parseInt(selectedValue)){
			 case 1:
			 case 2:
				 $('#uifm_frm_summbox_skin_wrap_block1').show();
				// $('#uifm_frm_summbox_skin_wrap_block2').hide();
				break;
			 case 0:
			 case 3:
			 case 4:
			 case 5:
				// $('#uifm_frm_summbox_skin_wrap_block2').show();
				 $('#uifm_frm_summbox_skin_wrap_block1').hide();
				 break;
		 }
		
});
//]]>
</script>
