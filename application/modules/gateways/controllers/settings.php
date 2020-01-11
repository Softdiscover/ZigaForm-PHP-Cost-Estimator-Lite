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
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
if (class_exists('Uiform_Pg_Controller_Settings')) {
    return;
}

/**
 * Controller Settings class
 *
 * @category  PHP
 * @package   Rocket_form
 * @author    Softdiscover <info@softdiscover.com>
 * @copyright 2013 Softdiscover
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1.00
 * @link      http://wordpress-cost-estimator.zigaform.com
 */
class Settings extends BackendController {

    const VERSION = '0.1';
 
    protected $modules;
    
    /**
     * Constructor
     *
     * @mvc Controller
     */
    function __construct() {
        
        parent::__construct();
        $this->load->language_alt(model_settings::$db_config['language']);
        $this->template->set('controller', $this);
        $this->load->model('model_gateways');
        
        //global $wpdb;
        //$this->wpdb = $wpdb;
       // $this->model_gateways = self::$_models['gateways']['gateways'];
       // save settings options
        //add_action('wp_ajax_rocket_fbuilder_setting_saveGateway', array(&$this, 'ajax_save_options'));
        
        
    }
    
    public function ajax_save_options() {
       
        $pg_id             = ($_POST['pg_id']) ? Uiform_Form_Helper::sanitizeInput($_POST['pg_id']) : 0;
        $pg_name           = ($_POST['pg_name']) ? Uiform_Form_Helper::sanitizeInput($_POST['pg_name']) : '';
        
        $flag_status   = (isset($_POST['flag_status'])) ? Uiform_Form_Helper::sanitizeInput($_POST['flag_status']) : 1;
        $pg_modtest   = (isset($_POST['pg_modtest'])) ? Uiform_Form_Helper::sanitizeInput($_POST['pg_modtest']) : 0;
        $pg_description   = (isset($_POST['pg_description'])) ? Uiform_Form_Helper::sanitizeInput($_POST['pg_description']) : '';
        $pg_order   = (isset($_POST['pg_order'])) ? Uiform_Form_Helper::sanitizeInput($_POST['pg_order']) : 0;
        $pg_id   = ($_POST['pg_id']) ? Uiform_Form_Helper::sanitizeInput($_POST['pg_id']) : '';
        
        $json                    = array();
        switch ($pg_id) {
                case 1:
                    //offline
                    $json['offline_return_url']   = ($_POST['offline_return_url']) ? Uiform_Form_Helper::sanitizeInput($_POST['offline_return_url']) : '';
                    break;
                case 2:
                    //paypal
                    $json['paypal_email']      = ($_POST['paypal_email']) ? Uiform_Form_Helper::sanitizeInput($_POST['paypal_email']) : '';
                    $json['paypal_currency']   = ($_POST['paypal_currency']) ? Uiform_Form_Helper::sanitizeInput($_POST['paypal_currency']) : '';
                    $json['paypal_return_url']   = ($_POST['paypal_return_url']) ? Uiform_Form_Helper::sanitizeInput($_POST['paypal_return_url']) : '';
                    $json['paypal_cancel_url']   = ($_POST['paypal_cancel_url']) ? Uiform_Form_Helper::sanitizeInput($_POST['paypal_cancel_url']) : '';
                    $json['paypal_method']   = ($_POST['paypal_method']) ? Uiform_Form_Helper::sanitizeInput($_POST['paypal_method']) : 0;
                    break;
            }
        $data                    = array();
        $data['pg_name']     = $pg_name;
        $data['pg_data']     = json_encode($json);
        $data['flag_status']  = $flag_status;
        $data['pg_order']  = $pg_order;
        $data['pg_modtest']  = $pg_modtest;
        $data['pg_description']  = $pg_description;
        $where = array(
            'pg_id' => $pg_id
        );
         
        $this->db->set($data);
        $this->db->where('pg_id', $pg_id);
        $this->db->update($this->model_gateways->table);
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE)
        {
            $json2['success'] = 0;
        }else{
            $json2['success'] = 1;
        }
        
        $json2 = array();
        /*if ($result > 0) {
            $json2['success'] = 1;
        } else {
            $json2['success'] = 0;
        }*/
         
        header('Content-Type: application/json');
        echo json_encode($json2);
        die();
    }
    
    
    public function view_settings() {
        $data = array();
        $data['query'] = $this->model_gateways->getListGateways();
        $this->template->loadPartial('layout', 'gateways/settings/view_settings', $data);
    }
    
    public function edit_gateway() {
        $data = array();
        $id = (isset($_GET['id'])) ? Uiform_Form_Helper::sanitizeInput($_GET['id']) : 0;
        $rdata = $this->model_gateways->getGatewayById($id);
         
        $data['pg_id']          = $rdata->pg_id;
        $data['pg_name']        = $rdata->pg_name;
        $data['pg_description'] = $rdata->pg_description;
        $data['pg_modtest']     = (isset($rdata->pg_modtest) && $rdata->pg_modtest==1)?1:0;
        $data['flag_status']    = $rdata->flag_status;
        $data['pg_order']    = $rdata->pg_order;
        
        switch (intval($id)) {
            case 1:
                /*offline*/
                $other_options          = json_decode($rdata->pg_data, true);
                    
                    $data['offline_return_url'] = (isset($other_options['offline_return_url'])) ? $other_options['offline_return_url'] : '';
                    $this->template->loadPartial('layout', 'gateways/settings/editoffline', $data);

                break;
            case 2:
                /*paypal*/
                    $other_options          = json_decode($rdata->pg_data, true);
                    $data['paypal_email'] = (isset($other_options['paypal_email'])) ? $other_options['paypal_email'] : '';
                    $data['paypal_return_url'] = (isset($other_options['paypal_return_url'])) ? $other_options['paypal_return_url'] : '';
                    $data['paypal_cancel_url'] = (isset($other_options['paypal_cancel_url'])) ? $other_options['paypal_cancel_url'] : '';
                    $data['paypal_currency'] = (isset($other_options['paypal_currency'])) ? $other_options['paypal_currency'] : '';
                    $data['paypal_method'] = (isset($other_options['paypal_method'])) ? $other_options['paypal_method'] : 0;
                    $list_cur=array();
                    $currencies = Uiform_Form_Helper::getCurrency();
                    foreach ($currencies as $key=>$value) {
                      $list_cur[]=$key;
                    }
                    $data['currency_list']=$list_cur;
                    $this->template->loadPartial('layout', 'gateways/settings/editpaypal', $data);
                break;
            default:
                    $data['query'] = $this->model_gateways->getListGateways();
                    $this->template->loadPartial('layout', 'gateways/settings/view_settings', $data);
                break;
        }
        
    }
    
    /**
     * Register callbacks for actions and filters
     *
     * @mvc Controller
     */
    public function register_hook_callbacks() {
        
    }

    /**
     * Initializes variables
     *
     * @mvc Controller
     */
    public function init() {

        try {
            //$instance_example = new WPPS_Instance_Class( 'Instance example', '42' );
            //add_notice('ba');
        } catch (Exception $exception) {
            add_notice(__METHOD__ . ' error: ' . $exception->getMessage(), 'error');
        }
    }

    /*
     * Instance methods
     */

    /**
     * Prepares sites to use the plugin during single or network-wide activation
     *
     * @mvc Controller
     *
     * @param bool $network_wide
     */
    public function activate($network_wide) {

        return true;
    }

    /**
     * Rolls back activation procedures when de-activating the plugin
     *
     * @mvc Controller
     */
    public function deactivate() {
        return true;
    }

    /**
     * Checks if the plugin was recently updated and upgrades if necessary
     *
     * @mvc Controller
     *
     * @param string $db_version
     */
    public function upgrade($db_version = 0) {
        return true;
    }

    /**
     * Checks that the object is in a correct state
     *
     * @mvc Model
     *
     * @param string $property An individual property to check, or 'all' to check all of them
     * @return bool
     */
    protected function is_valid($property = 'all') {
        return true;
    }

}

?>
