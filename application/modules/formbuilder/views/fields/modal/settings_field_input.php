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
<div class="uiform-set-field-wrap" id="uiform-set-field-input-panel">
	 <!--container for text box, textarea ,.. -->    
			<?php include('settings_field_input_1.php');?>
		<!--\end container -->
		<!--container for options ,.. -->    
			<?php include('settings_field_input_2.php');?>
		<!--\end container -->
		<!--container for custom html ,.. -->    
			<?php include('settings_field_input_3.php');?>
		<!--\end container -->
		<!--container for custom html ,.. -->    
			<?php include('settings_field_input_4.php');?>
		<!--\end container -->
		<!--container ,.. -->    
			<?php include('settings_field_input_5.php');?>
		<!--\end container -->
		<!--container  ,.. -->    
			<?php include('settings_field_input_6.php');?>
		<!--\end container -->
		<!--container  ,.. -->    
			<?php include('settings_field_input_7.php');?>
		<!--\end container -->
		<!--container  -->    
			<?php include('settings_field_input_8.php');?>
		<!--\end container -->
		<!--container  -->    
			<?php include('settings_field_input_9.php');?>
		<!--\end container -->
		<!--container  -->    
			<?php include('settings_field_input_11.php');?>
		<!--\end container -->
		<!--container  -->    
			<?php include('settings_field_input_14.php');?>
		<!--\end container -->
		<!--container  -->    
			<?php include('settings_field_input_12.php');?>
		<!--\end container -->
		<!--container  -->    
			<?php include('settings_field_input_13.php');?>
		<!--\end container -->
		<!--container  -->    
			<?php include('settings_field_input_15.php');?>
		<!--\end container -->
		<!--container  -->    
			<?php include('settings_field_input_16.php');?>
		<!--\end container -->
		<!--container  -->    
			<?php include('settings_field_input_17.php');?>
		<!--\end container -->
		<!--container  -->    
			<?php include('settings_field_input_18.php');?>
		<!--\end container -->
		<!--container  -->    
			<?php include('settings_field_input_19.php');?>
		<!--\end container -->
		
		
		<div class="uifm-set-section-inputprice">
		<div class="space20"></div>
		<div class="sfdc-row">
					<div class="sfdc-col-md-12">
						<div class="divider2">
						<div class="mask"></div>
						<span><i><?php echo __('Price','FRocket_admin'); ?></i></span>
						</div>
					</div>
				</div>
		<div class="sfdc-row">
			<div class="sfdc-col-md-6">
			   <div class="sfdc-form-group">
				   <label ><?php echo __('Price','FRocket_admin'); ?></label>
				</div>
			</div>
		 <div class="sfdc-col-sm-6">
				<div class="sfdc-form-group">
					<input  
						id="uifm_fld_price_unitprice"
						data-field-store="price-unit_price"
						class="uifm_fld_inp4_spinner"
						type="text" >

				</div>
			</div>
		</div>
	</div>
		<div class="uifm-set-section-pricesetting">
			  <div class="space20"></div>
			  <div class="sfdc-row">
					<div class="sfdc-col-md-12">
						<div class="divider2">
						<div class="mask"></div>
						<span><i><?php echo __('Price Format','FRocket_admin'); ?></i></span>
						</div>
					</div>
				</div>
			  <div class="sfdc-row">
				<div class="sfdc-col-md-6">
					<div class="sfdc-form-group">
							<label ><?php echo __('Enable Cost estimation','FRocket_admin'); ?></label>
						  
								<div class="sfdc-col-md-12">
									<input 
										class="switch-field"
										data-field-store="price-enable_st"
										id="uifm_fld_price_enable_st"
										type="checkbox"/>
								</div>

						   
						</div>

				</div>
			   <div class="sfdc-col-sm-6">
					<div class="sfdc-form-group">
							<label for=""><?php echo __('show price label','FRocket_admin'); ?></label>
							<div class="sfdc-col-md-12">
							<input class="switch-field"
									data-field-store="price-lbl_show_st"
										id="uifm_frm_price_lbl_show_st"
										name="uifm_frm_price_lbl_show_st"
										type="checkbox"/>
							<a href="javascript:void(0);"
							data-toggle="tooltip" data-placement="right" 
							data-original-title="<?php echo __('it will allow to show price label of the field','FRocket_admin'); ?>"
							><span class="fa fa-question-circle"></span></a>
							</div>
					</div>
				</div>
			</div>
		</div>
		<div class="uifm-set-section-pricesetting2"> 
			<div class="space10"></div>
				<div class="sfdc-row">
					<div class="sfdc-col-sm-12">
						<div class="sfdc-form-group">


						<label class="sfdc-control-label" for="">
							<?php echo __('Price label format','FRocket_admin'); ?>
						</label>
						<div class="space10"></div>
						<div class="sfdc-controls sfdc-form-group">
							<?php
							/*pending add this tinymce*/
							$settings = array( 'media_buttons' => true,'textarea_rows'=>5);
								//wp_editor('', 'uifm_fld_price_lbl_format',$settings );
							?>
							<textarea 
							class="uifm_tinymce_obj"
							name="uifm_fld_price_lbl_format"
							id="uifm_fld_price_lbl_format"></textarea>
						</div>

						</div>
					</div>
				</div>
			  <div class="sfdc-row">
			<div class="sfdc-col-md-4">
			   <div class="sfdc-form-group">
						<label ><?php echo __('Text Color','FRocket_admin'); ?></label>
						<div data-field-store="price-color"
								class="sfdc-input-group uifm-custom-color">
							<span class="sfdc-input-group-addon"><i></i></span>
							<input  placeholder="<?php echo __('Pick the color','FRocket_admin'); ?>"
									id="uifm_fld_price_lbl_color"
									type="text" 
									value="" 
									name="" 
									class="sfdc-form-control" />
						</div>
					</div>
			</div>
		 <div class="sfdc-col-sm-8">
				<div class="sfdc-form-group">
					<label ><?php echo __('Text Font','FRocket_admin'); ?></label>
					<div class="sfdc-input-group uifm-custom-font">
						<input type="hidden" value="" name="uifm_fld_lbl_font">
						<?php 
						$attributes = array(
							'name' => 'uifm_fld_price_lbl_font',
							'id' => 'uifm_fld_price_lbl_font',
							'data-field-store'=>'price-font'
							);
						$default_value = '{"family":"Arial, Helvetica, sans-serif","name":"Arial","classname":"arial"}';
						?>
						<?php $obj_sfm->get_view_menu($attributes,$default_value); ?>
						<span class="sfdc-input-group-addon">
						<input 
							data-field-store="price-font_st"
							id="uifm_fld_price_lbl_font_st"
							name="uifm_fld_price_lbl_font_st"
							class="uifm-f-setoption-st"
							value="1"
							type="checkbox">
						</span>
					</div>

				</div>
			</div>
		</div>
			  <div class="space20"></div>
			  <div class="space20"></div>
			  <div class="space20"></div>
			  <div class="space20"></div>
		</div>
   
</div>