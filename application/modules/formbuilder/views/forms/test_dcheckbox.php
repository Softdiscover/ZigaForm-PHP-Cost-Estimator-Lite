<?php
if ( ! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
?>
<div class="uiform-wrap dev-preview-fields">
  <div id="asd123412341234"  data-typefield="41" class="uiform-switch uiform-field  uiform-field-childs">
            <div class="uiform-field-wrap">
                <div class="rkfm-row">
                    <div class="rkfm-col-sm-2">
                        <div class="uifm-control-label">
                            <label class="sfdc-control-label">
                                <span 
                                   data-field-option="uifm-help-block"
                                    class="uifm-label-helpblock uifm-f-option">
                                    <span class="fa fa-question-circle"></span>
                                </span> 
                               <span  data-field-store="label-text"
                                      data-field-option="uifm-label"
                                      class="uifm-label uifm-f-option"><?php echo __('Textbox label', 'FRocket_admin'); ?></span>
                               <span data-field-store="sublabel-text"
                                      data-field-option="uifm-sublabel"
                                      class="uifm-sublabel uifm-f-option"><?php echo __('Textbox sublabel', 'FRocket_admin'); ?></span>
                            </label>
                        </div>
                    </div>
                    <div class="rkfm-col-sm-10">
                        <!--<div class="uifm-input-container">
                            <div class="uifm-input15-wrap">
                                <input 
                                   class="uifm-inp15-fld"
                                   type="checkbox"/>
                            </div>
                            <span class="uifm_frm_price_lbl_cont"></span>
                        </div>-->
                        
                        <div class="uifm-input-container">
                            <div class="uifm-input16-wrap">
                                <div class="uiform-opt-din-chkbox uifm-dcheckbox-group" >
                                    
                                    <!--  item --->
                                    <div 
                                        data-backend="0"
                                        data-inp17-opt-index="0"
                                        data-toggle="tooltip" data-placement="bottom" data-html="true" title="1st line of text <br> 2nd line of text"
                                        class="uifm-dcheckbox-item">
                                        <div class="uifm-dcheckbox-item-wrap">
                                            
                                            <div class="uifm-dcheckbox-item-chkst sfdc-btn-default">
                                                <i class="fa fa-square-o"></i>
                                            </div>
                                            <div style="display:none" class="uifm-dcheckbox-item-qty-wrap">
                                                <div class="sfdc-input-group">
                                                    <span class="sfdc-input-group-btn">
                                                        <button type="button" class="sfdc-btn sfdc-btn-default" data-value="decrease">
                                                            <span class="sfdc-glyphicon sfdc-glyphicon-minus"></span>
                                                        </button>
                                                    </span>
                                                    <span class="sfdc-input-group-btn">
                                                        <input type="text" 
                                                               data-max="40"
                                                               data-min="1"
                                                               class="uifm-dcheckbox-item-qty-num" value="1">   
                                                    </span>
                                                    <span class="sfdc-input-group-btn">
                                                        <button type="button" class="sfdc-btn sfdc-btn-default" data-value="increase">
                                                            <span class="sfdc-glyphicon sfdc-glyphicon-plus"></span>
                                                        </button>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="uifm-dcheckbox-item-showgallery  sfdc-btn-primary">
                                              <i class="sfdc-glyphicon sfdc-glyphicon-search"></i>
                                            </div>
                                            <div class="uifm-dcheckbox-item-nextimg sfdc-btn-primary">
                                                <i class="fa fa-chevron-right"></i>
                                            </div>
                                            <div class="uifm-dcheckbox-item-previmg sfdc-btn-primary">
                                                <i class="fa fa-chevron-left"></i>
                                            </div>
                                            <div style="display: none;">
                                                <input class="uifm-dcheckbox-item-chkval" type="checkbox"  value="0">
                                            </div>
                                            <!-- image gallery -->
                                            <div style="display:none;">
                                                <div class="uifm-dcheckbox-item-gal-imgs">
                                                    <a  
                                                        href="https://farm6.static.flickr.com/5648/21424200562_836b8d15bc_b.jpg" 
                                                       title="Aurora Australis" data-gallery="">
                                                        <img src="https://farm6.static.flickr.com/5648/21424200562_836b8d15bc_s.jpg"></a>
                                                    <a href="https://farm1.static.flickr.com/572/20808655253_4d988195ee_b.jpg"
                                                       title="Reflejos en la orilla" data-gallery="">
                                                        <img src="https://farm1.static.flickr.com/572/20808655253_4d988195ee_s.jpg"></a>
                                                    <a href="https://farm6.static.flickr.com/5671/21252761790_0611b9aed8_b.jpg"
                                                       title="Night Photography and Bokeh by Leica M &amp; Noctilux f/0.95" data-gallery="">
                                                        <img src="https://farm6.static.flickr.com/5671/21252761790_0611b9aed8_s.jpg"></a>
                                                    <a href="https://farm1.static.flickr.com/603/21246725640_37c31080ce_b.jpg" 
                                                       title="La Montagne ça vous gagne........" data-gallery="">
                                                        <img src="https://farm1.static.flickr.com/603/21246725640_37c31080ce_s.jpg"></a>
                                                    <a href="https://farm1.static.flickr.com/705/21244703938_76f74ac10e_b.jpg"
                                                       title="A Darkness Follows Me Wherever I Go [EXPLORE #5: 9/15/15]" data-gallery="">
                                                        <img src="https://farm1.static.flickr.com/705/21244703938_76f74ac10e_s.jpg"></a>
                                                    <a href="https://farm6.static.flickr.com/5671/21252761790_0611b9aed8_b.jpg"
                                                       title="Night Photography and Bokeh by Leica M &amp; Noctilux f/0.95" data-gallery="">
                                                        <img src="https://farm6.static.flickr.com/5671/21252761790_0611b9aed8_s.jpg"></a>
                                                    <a href="https://farm1.static.flickr.com/603/21246725640_37c31080ce_b.jpg" 
                                                       title="La Montagne ça vous gagne........" data-gallery="">
                                                        <img src="https://farm1.static.flickr.com/603/21246725640_37c31080ce_s.jpg"></a>
                                                    <a href="https://farm1.static.flickr.com/705/21244703938_76f74ac10e_b.jpg"
                                                       title="A Darkness Follows Me Wherever I Go [EXPLORE #5: 9/15/15]" data-gallery="">
                                                        <img src="https://farm1.static.flickr.com/705/21244703938_76f74ac10e_s.jpg"></a>
                                                    </div>
                                            </div>
                                            <canvas 
                                                data-uifm-nro="0"
                                                width="100" height="100" class="uifm-dcheckbox-item-viewport"></canvas>
                                        </div>
                                    </div>
                                    <!--/ end item --->
                                   <!--  item --->
                                    <div 
                                        data-toggle="tooltip" data-placement="bottom" data-html="true" title="1st line of text <br> 2nd line of text"
                                        class="uifm-dcheckbox-item">
                                        <div class="uifm-dcheckbox-item-wrap">
                                            
                                            <div class="uifm-dcheckbox-item-chkst sfdc-btn-default">
                                                <i class="fa fa-square-o"></i>
                                            </div>
                                            <div style="display:none" class="uifm-dcheckbox-item-qty-wrap">
                                                <div class="sfdc-input-group">
                                                    <span class="sfdc-input-group-btn">
                                                        <button type="button" class="sfdc-btn sfdc-btn-default" data-value="decrease">
                                                            <span class="sfdc-glyphicon sfdc-glyphicon-minus"></span>
                                                        </button>
                                                    </span>
                                                    <span class="sfdc-input-group-btn">
                                                        <input type="text" 
                                                               data-max="40"
                                                               data-min="1"
                                                               class="uifm-dcheckbox-item-qty-num" value="1">   
                                                    </span>
                                                    <span class="sfdc-input-group-btn">
                                                        <button type="button" class="sfdc-btn sfdc-btn-default" data-value="increase">
                                                            <span class="sfdc-glyphicon sfdc-glyphicon-plus"></span>
                                                        </button>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="uifm-dcheckbox-item-showgallery  sfdc-btn-primary">
                                              <i class="sfdc-glyphicon sfdc-glyphicon-search"></i>
                                            </div>
                                            <div class="uifm-dcheckbox-item-nextimg sfdc-btn-primary">
                                                <i class="fa fa-chevron-right"></i>
                                            </div>
                                            <div class="uifm-dcheckbox-item-previmg sfdc-btn-primary">
                                                <i class="fa fa-chevron-left"></i>
                                            </div>
                                            <div style="display: none;">
                                                <input class="uifm-dcheckbox-item-chkval" type="checkbox"  value="0">
                                            </div>
                                            <!-- image gallery -->
                                            <div style="display:none;">
                                                <div class="uifm-dcheckbox-item-gal-imgs">
                                                    <a href="https://farm6.static.flickr.com/5648/21424200562_836b8d15bc_b.jpg" 
                                                       title="Aurora Australis" data-gallery="">
                                                        <img src="https://farm6.static.flickr.com/5648/21424200562_836b8d15bc_s.jpg"></a>
                                                    <a href="https://farm1.static.flickr.com/572/20808655253_4d988195ee_b.jpg"
                                                       title="Reflejos en la orilla" data-gallery="">
                                                        <img src="https://farm1.static.flickr.com/572/20808655253_4d988195ee_s.jpg"></a>
                                                    <a href="https://farm6.static.flickr.com/5671/21252761790_0611b9aed8_b.jpg"
                                                       title="Night Photography and Bokeh by Leica M &amp; Noctilux f/0.95" data-gallery="">
                                                        <img src="https://farm6.static.flickr.com/5671/21252761790_0611b9aed8_s.jpg"></a>
                                                    <a href="https://farm1.static.flickr.com/603/21246725640_37c31080ce_b.jpg" 
                                                       title="La Montagne ça vous gagne........" data-gallery="">
                                                        <img src="https://farm1.static.flickr.com/603/21246725640_37c31080ce_s.jpg"></a>
                                                    <a href="https://farm1.static.flickr.com/705/21244703938_76f74ac10e_b.jpg"
                                                       title="A Darkness Follows Me Wherever I Go [EXPLORE #5: 9/15/15]" data-gallery="">
                                                        <img src="https://farm1.static.flickr.com/705/21244703938_76f74ac10e_s.jpg"></a>
                                                    <a href="https://farm6.static.flickr.com/5671/21252761790_0611b9aed8_b.jpg"
                                                       title="Night Photography and Bokeh by Leica M &amp; Noctilux f/0.95" data-gallery="">
                                                        <img src="https://farm6.static.flickr.com/5671/21252761790_0611b9aed8_s.jpg"></a>
                                                    <a href="https://farm1.static.flickr.com/603/21246725640_37c31080ce_b.jpg" 
                                                       title="La Montagne ça vous gagne........" data-gallery="">
                                                        <img src="https://farm1.static.flickr.com/603/21246725640_37c31080ce_s.jpg"></a>
                                                    <a href="https://farm1.static.flickr.com/705/21244703938_76f74ac10e_b.jpg"
                                                       title="A Darkness Follows Me Wherever I Go [EXPLORE #5: 9/15/15]" data-gallery="">
                                                        <img src="https://farm1.static.flickr.com/705/21244703938_76f74ac10e_s.jpg"></a>
                                                    </div>
                                            </div>
                                            <canvas 
                                                data-uifm-nro="0"
                                                width="100" height="100" class="uifm-dcheckbox-item-viewport"></canvas>
                                        </div>
                                    </div>
                                    <!--/ end item --->
                                </div>
                            </div>
                            <span class="uifm_frm_price_lbl_cont"></span>
                        </div>
                        <div data-field-option="uifm-help-block"  class="uifm-help-block uifm-f-option">
                            <?php echo __('Help block text', 'FRocket_admin'); ?>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    
<!-- The Bootstrap Image Gallery lightbox, should be a child element of the document body -->
<div class="container">
    <h1>Bootstrap Image Gallery Demo</h1>
    <blockquote>
        <p>Bootstrap Image Gallery is an extension to <a href="https://blueimp.github.io/Gallery/">blueimp Gallery</a>, a touch-enabled, responsive and customizable image &amp; video gallery.<br>It displays images and videos in the modal dialog of the <a href="http://getbootstrap.com/">Bootstrap</a> framework, features swipe, mouse and keyboard navigation, transition effects, fullscreen support and on-demand content loading and can be extended to display additional content types.</p>
    </blockquote>
    <form class="sfdc-form-inline">
        <div class="sfdc-form-group">
            <button id="video-gallery-button" type="button" class="sfdc-btn sfdc-btn-success sfdc-btn-lg">
                <i class="sfdc-glyphicon sfdc-glyphicon-film"></i>
                Launch Video Gallery
            </button>
        </div>
        <div class="sfdc-form-group">
            <button id="image-gallery-button" type="button" class="sfdc-btn sfdc-btn-primary sfdc-btn-lg">
                <i class="sfdc-glyphicon sfdc-glyphicon-picture"></i>
                Launch Image Gallery
            </button>
        </div>
        <div class="sfdc-btn-group" data-toggle="buttons">
          <label class="sfdc-btn sfdc-btn-success sfdc-btn-lg">
            <i class="sfdc-glyphicon sfdc-glyphicon-leaf"></i>
            <input id="borderless-checkbox" type="checkbox"> Borderless
          </label>
          <label class="sfdc-btn sfdc-btn-primary sfdc-btn-lg">
            <i class="sfdc-glyphicon sfdc-glyphicon-fullscreen"></i>
            <input id="fullscreen-checkbox" type="checkbox"> Fullscreen
          </label>
        </div>
    </form>
    <br>
    <!-- The container for the list of example images -->
    <div style="display:none;">
        <div class="links">
            <a href="https://farm6.static.flickr.com/5648/21424200562_836b8d15bc_b.jpg" 
                                                       title="Aurora Australis" data-gallery="">
                                                        <img src="https://farm6.static.flickr.com/5648/21424200562_836b8d15bc_s.jpg"></a>
                                                    <a href="https://farm1.static.flickr.com/572/20808655253_4d988195ee_b.jpg"
                                                       title="Reflejos en la orilla" data-gallery="">
                                                        <img src="https://farm1.static.flickr.com/572/20808655253_4d988195ee_s.jpg"></a>
                                                    <a href="https://farm6.static.flickr.com/5671/21252761790_0611b9aed8_b.jpg"
                                                       title="Night Photography and Bokeh by Leica M &amp; Noctilux f/0.95" data-gallery="">
                                                        <img src="https://farm6.static.flickr.com/5671/21252761790_0611b9aed8_s.jpg"></a>
                                                    <a href="https://farm1.static.flickr.com/603/21246725640_37c31080ce_b.jpg" 
                                                       title="La Montagne ça vous gagne........" data-gallery="">
                                                        <img src="https://farm1.static.flickr.com/603/21246725640_37c31080ce_s.jpg"></a>
                                                    <a href="https://farm1.static.flickr.com/705/21244703938_76f74ac10e_b.jpg"
                                                       title="A Darkness Follows Me Wherever I Go [EXPLORE #5: 9/15/15]" data-gallery="">
                                                        <img src="https://farm1.static.flickr.com/705/21244703938_76f74ac10e_s.jpg"></a>
        </div>
        </div>
    <br>
</div>
<!-- The Bootstrap Image Gallery lightbox, should be a child element of the document body -->
<div id="blueimp-gallery" class="blueimp-gallery">
    <!-- The container for the modal slides -->
    <div class="slides"></div>
    <!-- Controls for the borderless lightbox -->
    <h3 class="title"></h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="close">×</a>
    <a class="play-pause"></a>
    <ol class="indicator"></ol>
    <!-- The modal dialog, which will be used to wrap the lightbox content -->
    <div class="sfdc-modal sfdc-fade">
        <div class="sfdc-modal-dialog">
            <div class="sfdc-modal-content">
                <div class="sfdc-modal-header">
                    <button type="button" class="close" aria-hidden="true">&times;</button>
                    <h4 class="sfdc-modal-title"></h4>
                </div>
                <div class="sfdc-modal-body next"></div>
                <div class="sfdc-modal-footer">
                    <button type="button" class="sfdc-btn sfdc-btn-default pull-left prev">
                        <i class="sfdc-glyphicon sfdc-glyphicon-chevron-left"></i>
                        Previous
                    </button>
                    <button type="button" class="sfdc-btn sfdc-btn-primary next">
                        Next
                        <i class="sfdc-glyphicon sfdc-glyphicon-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
    
</div>
