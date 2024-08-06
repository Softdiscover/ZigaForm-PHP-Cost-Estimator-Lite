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
ob_start();
?>
<?php

if (isset($progress['theme_type'])) {
    $theme_type = ( strval($progress['theme_type']) ) ? strval($progress['theme_type']) : 'default';
    ?>
    #rockfm_form_<?php echo $idform; ?> .zgfm-progress-bar-cost {
        margin-left: 40px;
	    margin-right: 40px;
	    margin-top: 20px;
    margin-bottom: 40px;
    }
    
    <?php
    switch ($theme_type) {
        case 'default':
            ?>
        #rockfm_form_<?php echo $idform; ?>  .zgfm-progress-container {
        
			<?php if (! empty($progress['theme'][ $theme_type ]['skin_tab_default_shadowcolor'])) { ?>
				box-shadow: 0 4px 5px <?php echo $progress['theme'][ $theme_type ]['skin_tab_default_shadowcolor']; ?>;
                <?php } ?>
        
		
	}

	#rockfm_form_<?php echo $idform; ?> .zgfm-progress-container,
	#rockfm_form_<?php echo $idform; ?> .zgfm-progress {
		 
		<?php if (! empty($progress['theme'][ $theme_type ]['skin_tab_default_bgcolor'])) { ?>
			background-color: <?php echo $progress['theme'][ $theme_type ]['skin_tab_default_bgcolor']; ?>;
                <?php } ?>
		border-radius: 5px;
		position: relative;
		height: 28px;
		width: 100%;
		
	}

	#rockfm_form_<?php echo $idform; ?> .zgfm-progress {
		 
		<?php if (! empty($progress['theme'][ $theme_type ]['skin_tab_default_active_bg'])) { ?>
			background-color: <?php echo $progress['theme'][ $theme_type ]['skin_tab_default_active_bg']; ?>;
                <?php } ?>
	  width: 0;
	  transition: width 0.4s linear;
	  display: flex;
	  align-items: center;
	  justify-content: flex-end;
	}

	#rockfm_form_<?php echo $idform; ?> .zgfm-percentage {
		<?php if (! empty($progress['theme'][ $theme_type ]['skin_tab_default_active_bg'])) { ?>
			background-color: <?php echo $progress['theme'][ $theme_type ]['skin_tab_default_active_bg']; ?>;
                <?php } ?>
	  border-radius: 50%;
	  <?php if (! empty($progress['theme'][ $theme_type ]['skin_tab_default_shadowcolor'])) { ?>
			box-shadow: 0 4px 5px <?php echo $progress['theme'][ $theme_type ]['skin_tab_default_shadowcolor']; ?>;
      <?php } ?>
	  <?php if (! empty($progress['theme'][ $theme_type ]['skin_tab_default_active_txt'])) { ?>
		color:<?php echo $progress['theme'][ $theme_type ]['skin_tab_default_active_txt']; ?>;
      <?php } ?>
	  
	  font-size: 100%;
	  width: 78px;
	  height: 78px;
	  display: flex;
	  align-items: center;
	  justify-content: center;
	  position: absolute;
	  top: 50%;
	  transform: translate(-50%, -50%);
	  left: 0%;
	  transition: left 0.4s linear;
	}

	 
        
        
            <?php
            break;
        case 'theme2':
            ?>
        
        
        
            <?php
            break;
        case 'theme3':
            ?>
             
            
             
                <?php
        
            break;
            
            
        ?>
        <?php
    }
}
?>
 
<?php
$cntACmp = ob_get_contents();

 /* remove comments */
$cntACmp = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $cntACmp);
 /* remove tabs, spaces, newlines, etc. */
$cntACmp = str_replace(array( "\r\n", "\r", "\n", "\t", '  ', '    ', '    ' ), ' ', $cntACmp);
ob_end_clean();
echo $cntACmp;
?>
