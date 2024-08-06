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
?>
    <div id="zgfm-calc-tab-header">
                        <div class="sfdc-row ">
                            <div class="sfdc-col-md-6">
                                <div class="sfdc-form-group">
                                    <div class="sfdc-col-md-4">
                                        <label for=""><?php echo __('ENABLE CUSTOM MATH CALCULATION', 'FRocket_admin'); ?></label>
                                    </div>
                                    <div class="sfdc-col-md-8">
                                        <input class="switch-field"
                                                       id="uifm_frm_calc_enable"
                                                       name="uifm_frm_calc_enable"
                                                       type="checkbox"/>
                                         <a href="javascript:void(0);"
                                           data-toggle="tooltip" data-placement="right" 
                                           data-original-title="<?php echo __('this will enable math calculation.', 'FRocket_admin'); ?>"
                                           ><span class="fa fa-question-circle"></span></a>
                                    </div>    

                                </div>
                            </div>
                        </div>
                 </div>
               

                <div class="space10"></div>
                <div class="sfdc-row ">
                    <div class="sfdc-col-md-7">
                        <div class="sfdc-col-md-12">
                               <a href="javascript:void(0);" onclick="javascript:zgfm_back_calc.calc_addNew_CalcVar();" class="sfdc-btn sfdc-btn-warning">
                            <span class="fa fa-plus"></span> <?php echo __('Add New Optional Variable', 'FRocket_admin'); ?> </a> 
                            
                            <a href="javascript:void(0);" data-dialog-callback="javascript:zgfm_back_calc.calc_dev_cleanAll();" class="sfdc-btn sfdc-btn-info uiform-confirmation-func-action">
                             <?php echo __('Regenerate all variables', 'FRocket_admin'); ?> </a>
                        </div>
                        <div class="space20"></div>
                        <div>
                            
                            <div id="zgfm-tab-calc-sourcecode-wrapper">  
                                 <div class="sfdc-col-xs-3">
                                <!-- required for floating -->
                                <!-- Nav tabs -->
                                <ul id="zgfm-tab-calc-list-mathvars" class="sfdc-nav sfdc-nav-tabs tabs-left">
                                    
                                </ul>
                                </div>
                                <div class="sfdc-col-xs-9">
                                    <!-- Tab panes -->
                                    <div class="sfdc-tab-content">
                                          
                                    </div>
                                </div>
                                <div class="sfdc-clearfix"></div>
                            </div>
                           
                        </div>
                    </div>
                    <div class="sfdc-col-md-5">
                       
                        
                        <div id="zgfm-tab-calc-variable-wrapper" class="zgfm-tab-calc-var-wrap">
                          
                             <div class="uiformc-tab-content-inner3">
                                 <fieldset>
                                     <legend><?php echo __('Variables', 'FRocket_admin'); ?></legend>
                                     <div class="zgfm-tab-calc-variable-inner">
                                            <div class="sfdc-row">
                                                <div class="sfdc-form-group">
                                                    <div class="sfdc-col-sm-4">
                                                        <label><?php echo __('CHOOSE FIELD', 'FRocket_admin'); ?></label> 
                                                    </div>
                                                    <div class="sfdc-col-sm-8">
                                                         <select id="uifm_frm_calc_cmbo_field_var"
                                                                 onchange="javascript:zgfm_back_calc.calc_variables_getaction();"
                                                                 name="uifm_frm_calc_cmbo_field_var">
                                                          
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                          
                                          
                                         <div id="uifm_frm_calc_cmbo_field_var2_wrapper" style="display:none">
                                             <div class="space20"></div>
                                                <div class="sfdc-row">
                                                       <div class="sfdc-form-group">
                                                           <div class="sfdc-col-sm-4">
                                                               <label><?php echo __('CHOOSE ACTION', 'FRocket_admin'); ?></label> 
                                                           </div>
                                                           <div class="sfdc-col-sm-8">
                                                                <select id="uifm_frm_calc_cmbo_field_var2"
                                                                        onchange="javascript:zgfm_back_calc.calc_variables_getoption();"
                                                                        name="uifm_frm_calc_cmbo_field_var2">
                                                                    
                                                               </select>
                                                           </div>
                                                       </div>
                                                </div>
                                         </div>
                                         <div id="uifm_frm_calc_cmbo_field_var3_wrapper" style="display:none">
                                             <div class="space20"></div>
                                                <div class="sfdc-row">
                                                       <div class="sfdc-form-group">
                                                           <div class="sfdc-col-sm-4">
                                                               <label><?php echo __('CHOOSE OPTION', 'FRocket_admin'); ?></label> 
                                                           </div>
                                                           <div class="sfdc-col-sm-8">
                                                                <select id="uifm_frm_calc_cmbo_field_var3"
                                                                        onchange="javascript:zgfm_back_calc.calc_variables_chooseOption();"
                                                                        name="uifm_frm_calc_cmbo_field_var3">
                                                                    
                                                               </select>
                                                           </div>
                                                       </div>
                                                </div>
                                         </div>
                                          <div id="uifm_frm_calc_cmbo_field_var7_wrapper" style="display:none">
                                             <div class="space20"></div>
                                                <div class="sfdc-row">
                                                       <div class="sfdc-form-group">
                                                           <div class="sfdc-col-sm-4">
                                                               <label><?php echo __('DATA TYPE', 'FRocket_admin'); ?></label> 
                                                           </div>
                                                           <div class="sfdc-col-sm-8">
                                                                <select id="uifm_frm_calc_cmbo_field_var7" class="chzn-select"
                                                                        onchange="javascript:zgfm_back_calc.calc_variables_dataTypeOption();"
                                                                        name="uifm_frm_calc_cmbo_field_var7">
                                                                   <option value=""><?php echo __('Select an option', 'FRocket_admin'); ?></option>
                                                                   <option value="num"><?php echo __('Numeric', 'FRocket_admin'); ?></option>
                                                                   <option value="char"><?php echo __('Character', 'FRocket_admin'); ?></option>
                                                               </select>
                                                           </div>
                                                       </div>
                                                </div>
                                         </div>
                                         <div id="uifm_frm_calc_cmbo_addvar" style="display:none">
                                            
                                                   <div class="space20"></div>
                                                    <div class="sfdc-row">
                                                              <div class="sfdc-form-group">
                                                                  <div class="sfdc-col-sm-4">
                                                                      <div class="sfdc-col-sm-12">
                                                                           <label><?php echo __('COPY AND PASTE VARIABLE', 'FRocket_admin'); ?></label> 
                                                                       </div>
                                                                       <div class="sfdc-col-sm-12">
                                                                           <textarea onclick="this.select();" 
                                                                                     class="uifm_txtarea_var"></textarea>
                                                                       </div>
                                                                  </div>
                                                                  <div class="sfdc-col-sm-2">
                                                                     or 

                                                                  </div>
                                                                  <div class="sfdc-col-sm-4">
                                                                       <div class="sfdc-col-sm-12">
                                                                           <label><?php echo __('Place the cursor on the source code and press button', 'FRocket_admin'); ?></label> 
                                                                       </div>
                                                                       <div class="sfdc-col-sm-12">
                                                                          <a href="javascript:void(0);" 
                                                                          onclick="javascript:zgfm_back_calc.calc_variables_addVarByButton();"
                                                                          class="sfdc-btn sfdc-btn-primary">
                                                                           <i class="fa fa-plus" aria-hidden="true"></i> <?php echo __('ADD VARIABLE', 'FRocket_admin'); ?>     
                                                                       </a>
                                                                       </div>
                                                                        
                                                                  </div>
                                                              </div>
                                                       </div>
                                            
                                         </div>
                                           
                                          
                                     </div>
                                 </fieldset>
                             </div>
                            
                            
                        </div>
                     <div class="space20"></div>
                      <div id="zgfm-tab-calc-variable4-wrapper" class="zgfm-tab-calc-var-wrap">
                              <div class="uiformc-tab-content-inner3">
                                 <fieldset>
                                     <legend><?php echo __('Optional Variables', 'FRocket_admin'); ?></legend>
                                     <div class="zgfm-tab-calc-variable-inner">
                                            <div class="sfdc-row">
                                                <div class="sfdc-form-group">
                                                    <div class="sfdc-col-sm-4">
                                                        <label><?php echo __('CHOOSE OPTIONAL VARIABLE', 'FRocket_admin'); ?></label> 
                                                    </div>
                                                    <div class="sfdc-col-sm-8">
                                                         <select id="uifm_frm_calc_cmbo_field_var4"
                                                                 onchange="javascript:zgfm_back_calc.calc_variables2_getshortcode();"
                                                                 name="uifm_frm_calc_cmbo_field_var4">
                                                          
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                          
                                         <div id="uifm_frm_calc_cmbo_addvar4" style="display:none">
                                            
                                                   <div class="space20"></div>
                                                    <div class="sfdc-row">
                                                              <div class="sfdc-form-group">
                                                                  <div class="sfdc-col-sm-4">
                                                                      <div class="sfdc-col-sm-12">
                                                                           <label><?php echo __('COPY AND PASTE VARIABLE', 'FRocket_admin'); ?></label> 
                                                                       </div>
                                                                       <div class="sfdc-col-sm-12">
                                                                           <textarea onclick="this.select();" 
                                                                                     class="uifm_txtarea_var"></textarea>
                                                                       </div>
                                                                  </div>
                                                                  <div class="sfdc-col-sm-2">
                                                                     or 

                                                                  </div>
                                                                  <div class="sfdc-col-sm-4">
                                                                       <div class="sfdc-col-sm-12">
                                                                           <label><?php echo __('Place the cursor on the source code and press button', 'FRocket_admin'); ?></label> 
                                                                       </div>
                                                                       <div class="sfdc-col-sm-12">
                                                                          <a href="javascript:void(0);" 
                                                                          onclick="javascript:zgfm_back_calc.calc_variables_addVar2ByButton();"
                                                                          class="sfdc-btn sfdc-btn-primary">
                                                                           <i class="fa fa-plus" aria-hidden="true"></i> <?php echo __('ADD VARIABLE', 'FRocket_admin'); ?>     
                                                                       </a>
                                                                       </div>
                                                                        
                                                                  </div>
                                                              </div>
                                                       </div>
                                            
                                         </div>
                                          
                                         </div>
                                 </fieldset>
                              </div>
                        </div>
                    </div>
                </div>
<div id="zgfm-tab-calc-tmpl-helper" style="display:none;">
           
    <div id="zgfm-tab-calc-tmpl-helper-1">
        <div class="sfdc-tab-pane sfdc-active" id="zgfm-menu-calc-tab-0">
                                            <div class="uiformc-tab-content-inner3">
                                              <div class="sfdc-row">
                                                  <div class="sfdc-col-md-12">
        <div class="uifm_frm_calc_options_container">
            <div class="sfdc-row ">
                <div class="sfdc-col-md-6">
                    <div class="sfdc-form-group">
                        <div class="sfdc-col-md-4">
                            <label for=""><?php echo __('Temporal variable title', 'FRocket_admin'); ?></label>
                        </div>
                        <div class="sfdc-col-md-8">
                            <input type="text" 
                                   onkeyup="javascript:zgfm_back_calc.calc_tab_changeTitle(this);"
                                   onfocus="javascript:zgfm_back_calc.calc_tab_changeTitle(this);"
                                   onchange="javascript:zgfm_back_calc.calc_tab_changeTitle(this);"
                                   class="sfdc-form-control uifm_frm_calc_tabtitle" 
                                   placeholder=""  value="">
                        </div>    

                    </div>
                </div>
                <div class="sfdc-col-md-6">
                    <a style="display:none;" class="zgfm-tab-calc-vars-delbtn sfdc-btn sfdc-btn-danger sfdc-pull-right" onclick="javascript:zgfm_back_calc.calc_delete_tab();" href="javascript:void(0);">
                          <?php echo __('Delete', 'FRocket_admin'); ?> </a>
                </div>
            </div>
            <div class="space10"></div>
              
        </div>
    </div>
            <div class="sfdc-col-md-12">
                <textarea class="uifm_frm_calc_content autogrow" 
                          data-num="0"
                 style="width: 100%; height: 534px;" 
                 name="uifm_frm_calc_content0" id="uifm_frm_calc_content0"></textarea>
            </div>
            <div class="sfdc-col-md-12">
                <div class="space10"></div>
                <div class="sfdc-alert sfdc-alert-info">

                    <div id="uifm_frm_calc_content0_showvars" class="uifm_frm_calc_showvars">
                        <h3><?php echo __('Form Variables', 'FRocket_admin'); ?></h3>
                        <ul>

                        </ul>
                    </div>
                </div>

            </div>
        </div>

                                            </div>
                                            
                                        </div>
        
        
      
        
    </div>
                    
</div>
