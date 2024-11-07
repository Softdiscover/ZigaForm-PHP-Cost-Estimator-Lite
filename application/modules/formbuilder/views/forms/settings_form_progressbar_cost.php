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
 * @link      https://wordpress-form-builder.zigaform.com/
 */
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
?>
<div class="uiform-set-field-wrap" id="zgfm-set-cost-progress-bar">
    <div class="sfdc-row">
        <div class="sfdc-col-sm-12">
            <div class="sfdc-form-group">

                <label for="uifm_frm_pbar_st"><?php echo __('Enable progressbar', 'FRocket_admin'); ?></label>
                <input class="uifm_frm_pbar_cost_st_event switch-field" id="uifm_frm_pbar_cost_st" name="uifm_frm_pbar_st" type="checkbox" />
            </div>
        </div>
    </div>
    <div class="uiform_frm_pbar_cost_main_content" style="display:none;">
         
        <div class="space20"></div>
        <div class="sfdc-row">
            <div class="sfdc-col-md-12">
                <div class="divider2">
                    <div class="mask"></div>
                    <span><i><?php echo __('theme', 'FRocket_admin'); ?></i></span>
                </div>
            </div>
        </div>
        <div class="sfdc-row">
            <div class="sfdc-col-md-12">
                <div class="sfdc-form-group">
                    <select id="uifm_frm_pbar_cost_theme_type" class="sfdc-form-control">
                        <option value="default"><?php echo __('Theme 1', 'FRocket_admin'); ?></option>
                    </select>
                </div>
            </div>
        </div>

        <div class="sfdc-row">
            <div class="sfdc-col-sm-3 ">
            <label><?php echo __('Position', 'FRocket_admin'); ?></label>
            </div>
            <div class="sfdc-col-sm-9">
                <div class="sfdc-btn-group  ">
                    <select id="uifm_frm_pbar_cost_theme_position" class="sfdc-form-control">
                        <option value="outertop"><?php echo __('Outer Top', 'FRocket_admin'); ?></option>
                        <option value="innertop"><?php echo __('Inner Top', 'FRocket_admin'); ?></option>
                    </select>
                </div>
            </div>
        </div>
        <div class="space20"></div>
        <div class="sfdc-row">
            <div class="sfdc-col-md-12">
                <div class="divider2">
                    <div class="mask"></div>
                    <span><i><?php echo __('Settings', 'FRocket_admin'); ?></i></span>
                </div>
            </div>
        </div>
        <div class="space20"></div>
        <div class="sfdc-row" >
            <div class="sfdc-col-md-12">
                <div class="sfdc-form-group">
                <div class="sfdc-col-md-3">
                <label><?php echo __('Cost at ', 'FRocket_admin'); ?>100% </label>
                        </div>
                        <div class="sfdc-col-md-9">
                        <input  
                                                    id="uifm_frm_pbar_cost_topref"
                                                class="uifm_frm_form_progressbarcost_spinner"
                                               
                                                data-form-store="avg_top_cost"
                                                type="text" >
                        </div>
                    
                    
                </div>

            </div>
        </div>
        <div class="space20"></div>
        <div class="sfdc-row">
            <div class="sfdc-col-md-12">
                <div class="divider2">
                    <div class="mask"></div>
                    <span><i><?php echo __('Skin', 'FRocket_admin'); ?></i></span>
                </div>
            </div>
        </div>
        <div class="space20"></div>
        
        
        
        <div class="sfdc-row" >
            <div class="sfdc-col-md-12">
                <div class="sfdc-form-group">
                    <label><?php echo __('Global', 'FRocket_admin'); ?></label>
                    <div class="">
                        <div class="sfdc-col-md-1">

                        </div>
                        <div class="sfdc-col-md-11">
                            <div class="sfdc-row" >
                                <div class="sfdc-col-md-5">
                                    <label><?php echo __('Background', 'FRocket_admin'); ?></label>
                                </div>
                                <div class="sfdc-col-sm-7">
                                    <div data-form-store="skin_tab_default_bgcolor" class="sfdc-input-group uifm-evt-progressbarcost-color">
                                        <span class="sfdc-input-group-addon"><i></i></span>
                                        <input type="text" value="" id="uifm_frm_pbar_cost_theme1_bg"  class="sfdc-form-control" />
                                    </div>
                                </div>
                            </div>
                            <div class="space20"></div>
                            <div class="sfdc-row" >
                                <div class="sfdc-col-md-5">
                                    <label><?php echo __('Shadow color', 'FRocket_admin'); ?></label>
                                </div>
                                <div class="sfdc-col-sm-7">
                                    <div data-form-store="skin_tab_default_shadowcolor" class="sfdc-input-group uifm-evt-progressbarcost-color">
                                        <span class="sfdc-input-group-addon"><i></i></span>
                                        <input type="text" value="" id="uifm_frm_pbar_cost_theme1_shadowcolor"  class="sfdc-form-control" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="sfdc-row" >
            <div class="sfdc-col-md-12">
                <div class="sfdc-form-group">
                    <label><?php echo __('Active Mode', 'FRocket_admin'); ?></label>
                    <div class="">
                        <div class="sfdc-col-md-1">

                        </div>
                        <div class="sfdc-col-md-11">
                            <div class="sfdc-row" >
                                <div class="sfdc-col-md-5">
                                    <label><?php echo __('Background color', 'FRocket_admin'); ?></label>
                                </div>
                                <div class="sfdc-col-sm-7">
                                    <div data-form-store="skin_tab_default_active_bg" class="sfdc-input-group uifm-evt-progressbarcost-color">
                                        <span class="sfdc-input-group-addon"><i></i></span>
                                        <input type="text" value="" id="uifm_frm_pbar_cost_theme1_active_bg"  class="sfdc-form-control" />
                                    </div>
                                </div>
                            </div>
                            <div class="space20"></div>
                            <div class="sfdc-row" >
                               
                                <div class="sfdc-col-md-5">
                                    <label><?php echo __('Number text color', 'FRocket_admin'); ?></label>
                                </div>
                                <div class="sfdc-col-sm-7">
                                    <div data-form-store="skin_tab_default_active_txt" class="sfdc-input-group uifm-evt-progressbarcost-color">
                                        <span class="sfdc-input-group-addon"><i></i></span>
                                        <input type="text" value="" id="uifm_frm_pbar_cost_theme1_active_txt"  class="sfdc-form-control" />

                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>

            </div>
        </div>
        
    </div>
</div>
 