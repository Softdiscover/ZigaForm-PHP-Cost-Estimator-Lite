<?php
/**
 * settings
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   PHP_Form_Builder
 * @author    Softdiscover <info@softdiscover.com>
 * @copyright 2013 Softdiscover
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   CVS: $Id: settings.php, v2.00 2013-11-30 02:52:40 Softdiscover $
 * @link      https://softdiscover.com/zigaform/php-form-builder/
 */
if ( ! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
?>
<script>var switchTo5x = true;</script>
<script type="text/javascript" src="https://ws.sharethis.com/button/buttons.js"></script>
<script>stLight.options({publisher: "595f29e833add90011bd1dc7"});</script> 
<div id="zgfm-page-about-main">
  
   <div>
        <img src="<?php echo base_url(); ?>assets/backend/image/about/zigaform-header-logo.png"> 
     </div>
      <h1><?php echo __('ABOUT', 'FRocket_admin'); ?></h1>
    <div class="zgfm-page-about-title">
        <?php echo __('Zigaform – PHP Calculator & Cost Estimation Form Builder is a flexible PHP software which allows you to build your estimation forms on few easy steps using a simple yet powerful drag-and-drop form creator. Also it provides amazing form elements and skin live customizer that makes you to build professional forms. Also it provides an administration section where site admins manage tons of form options. It’s really easy to customize and you don’t need programming skills.', 'FRocket_admin'); ?>
    </div>
    <div class="zgfm-page-about-panel-wrap">
        <div class="row">
                <div class="col-md-6">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><?php echo __('Rate Zigaform', 'FRocket_admin'); ?></h3>
                        </div>
                        <div class="panel-body">
                            <form role="form">
                                <fieldset>
                                    
                                    <?php if ( ZIGAFORM_C_LITE == 1) { ?>
                                    <div class="form-group">
                                            <a href="https://codecanyon.net/item/zigaform-php-calculator-cost-estimation-form-builder/reviews/15883447"
                                               target="_blank">
                                                <img id="zgfm-page-about-rate-icon" 
                                               src="<?php echo base_url(); ?>/assets/backend/image/about/zigaform-rate-icon.png">
                                            </a>
                                            <div id="zgfm-page-about-leavestars" >
                                                    <a href="https://codecanyon.net/item/zigaform-php-calculator-cost-estimation-form-builder/reviews/15883447?ref=SoftDiscover"
                                                       target="_blank"><?php echo __('Leave 5 Stars', 'FRocket_admin'); ?></a>
                                            </div>
                                        
                                        
                                        
                                    </div>
                                    <?php } else { ?>
                                    <div class="form-group">
                                            <a href="https://codecanyon.net/item/zigaform-php-calculator-cost-estimation-form-builder/reviews/15883447"
                                               target="_blank">
                                                <img id="zgfm-page-about-rate-icon" 
                                               src="<?php echo base_url(); ?>/assets/backend/image/about/zigaform-rate-icon.png">
                                            </a>
                                            <div id="zgfm-page-about-leavestars" >
                                                    <a href="https://codecanyon.net/item/zigaform-php-calculator-cost-estimation-form-builder/reviews/15883447?ref=SoftDiscover"
                                                       target="_blank"><?php echo __('Leave 5 Stars', 'FRocket_admin'); ?></a>
                                            </div>
                                    </div>
                                    <?php } ?>
                                    
                                     <div class="zgfm-page-about-helpnote">
                                            <?php echo __('Please leave 5 stars if you like the software and I’ll keep rolling new updates and cool features.', 'FRocket_admin'); ?>
                                        </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                     <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><?php echo __('Spread the Word', 'FRocket_admin'); ?></h3>
                        </div>
                        <div class="panel-body">
                            <form role="form">
                                <fieldset>
                                    <div class="form-group">
                                            <?php
                                            $title           = __('Create amazing estimative forms with Zigaform', 'FRocket_admin');
                                            $summary         = __('Ultimate PHP Cost Estimator by zigaform.com', 'FRocket_admin');
                                            $share_this_data = "st_url='https://php-cost-estimator.zigaform.com/' st_title='{$title}' st_summary='{$summary}'";
                                            ?>
                                        <div id="zgfm-page-about-shbuttons" align="center">
                                            <span class='st_facebook_vcount' displayText='Facebook' <?php echo $share_this_data; ?> ></span>
                                            <span class='st_twitter_vcount' displayText='Tweet' <?php echo $share_this_data; ?> ></span>
                                            <span class='st_googleplus_vcount' displayText='Google +' <?php echo $share_this_data; ?> ></span>
                                            <span class='st_linkedin_vcount' displayText='LinkedIn' <?php echo $share_this_data; ?> ></span>
                                            <span class='st_email_vcount' displayText='Email' <?php echo $share_this_data; ?> ></span>
                                        </div><br/>  
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            
        </div>
        
    </div>
</div>
