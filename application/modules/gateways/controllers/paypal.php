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
if (class_exists('Paypal')) {
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
class Paypal extends MX_Controller  {

    const VERSION = '0.1';
 
    protected $modules;
 
    
    /**
     *  If true, the paypal sandbox URI www.sandbox.paypal.com is used for the
     *  post back. If false, the live URI www.paypal.com is used. Default false.
     *
     *  @var boolean
     */
    public $use_sandbox = false;
    public $force_ssl_v3 = false;

    const PAYPAL_HOST = 'www.paypal.com';
    const SANDBOX_HOST = 'www.sandbox.paypal.com';
    
    /**
     * Constructor
     *
     * @mvc Controller
     */
    function __construct() {
        parent::__construct();
        $this->load->language_alt(model_settings::$db_config['language']);
        $this->template->set('controller', $this);
        $this->load->model('visitor/model_visitor');
        $this->load->model('model_gateways');
        $this->load->model('model_gateways_records');
        $this->load->model('model_gateways_logs');
 
    }
    /**
     * Paypal::index()
     * List all payment gateways
     * 
     * @return array
     */
    public function ipn() 
    {
        try{
        ob_start();
        $this->_requirePostMethod();
         
        //visitor data
        $agent = isset($_SERVER["HTTP_USER_AGENT"]) ? $_SERVER["HTTP_USER_AGENT"] : '';
        $referer = isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : '';
        $ip = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '';
   
        //get paypal data
        $paypal_data = $this->model_gateways->getGatewayById(2);
        $pg_data = json_decode($paypal_data->pg_data, true);
        // STEP 1: read POST data
        $this->use_sandbox = ($paypal_data->pg_modtest == '1') ? true : false;
        // Reading POSTed data directly from $_POST causes serialization issues with array data in the POST.
        // Instead, read raw POST data from the input stream. 
        $raw_post_data = file_get_contents('php://input');
        $raw_post_array = explode('&', $raw_post_data);
        $myPost = array();
        foreach ($raw_post_array as $keyval) {
            $keyval = explode('=', $keyval);
            if (count($keyval) == 2)
                $myPost[$keyval[0]] = urldecode($keyval[1]);
        }
        // read the IPN message sent from PayPal and prepend 'cmd=_notify-validate'
        $req = 'cmd=_notify-validate';
        if (function_exists('get_magic_quotes_gpc')) {
            $get_magic_quotes_exists = true;
        }
        foreach ($myPost as $key => $value) {
            if ($get_magic_quotes_exists == true && get_magic_quotes_gpc() == 1) {
                $value = urlencode(stripslashes($value));
            } else {
                $value = urlencode($value);
            }
            $req .= "&$key=$value";
        }
        
        // STEP 2: POST IPN data back to PayPal to validate

        $ch = curl_init('https://' . $this->_getPaypalHost() . '/cgi-bin/webscr');
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close'));
        if ($this->force_ssl_v3) {
            curl_setopt($ch, CURLOPT_SSLVERSION, 3);
        }
        // In wamp-like environments that do not come bundled with root authority certificates,
        // please download 'cacert.pem' from "http://curl.haxx.se/docs/caextract.html" and set 
        // the directory path of the certificate as shown below:
        // curl_setopt($ch, CURLOPT_CAINFO, dirname(__FILE__) . '/cacert.pem');
        if (!($res = curl_exec($ch))) {
            // error_log("Got " . curl_error($ch) . " when processing IPN data");
            curl_close($ch);
            throw new Exception(curl_error($ch));
              die();
        }else{
            curl_close($ch);
        }
        
       
        // STEP 3: Inspect IPN validation result and act accordingly

        if (strcmp($res, "VERIFIED") == 0) {
       
        
            // The IPN is verified, process it:
            // check whether the payment_status is Completed
            // check that txn_id has not been previously processed
            // check that receiver_email is your Primary PayPal email
            // check that payment_amount/payment_currency are correct
            // process the notification
            // assign posted variables to local variables
            $item_name = isset($_POST['item_name'])?$_POST['item_name']:'';
            $item_number = isset($_POST['item_number'])?$_POST['item_number']:'';
            $custom = isset($_POST['custom'])?$_POST['custom']:'';
            $payment_status = $_POST['payment_status'];
            $payment_amount = $_POST['mc_gross'];
            $payment_currency = $_POST['mc_currency'];
            $txn_id = $_POST['txn_id'];
            $receiver_email = $_POST['receiver_email'];
            $payer_email = $_POST['payer_email'];
            
            //log data
                    $data3 = array();
                    $data3['vis_uniqueid'] = '';
                    $data3['vis_user_agent'] = $agent;
                    $data3['vis_page'] = $_SERVER['REQUEST_URI'];
                    $data3['vis_referer'] = $referer;
                    $data3['vis_ip'] = $ip;
                $data4 = array();    
                $data4['type_pg_id']=2;
                $data4['pgr_id']=$item_number;
                $data4['pgl_data'] = json_encode($_POST);
                $data4['pgl_data2'] = Uiform_Form_Helper::array2xml($data3);
                $data4['pgl_message'] ='paypal ipn verified';
                 
            $this->db->set($data4);
            $this->db->insert($this->model_gateways_logs->table);
            
            // IPN message values depend upon the type of notification sent.
            // To loop through the &_POST array and print the NV pairs to the screen:
            $data_invoice = $this->model_gateways_records->getRecordById($custom);
            if (($payment_status == 'Completed' || $payment_status == 'Processed' || $payment_status == 'Pending') &&
                ($receiver_email == $pg_data['paypal_email']) && !empty($data_invoice)) {
                $data = array();
                $data['type_pg_id'] = 2;
                $data['pgr_payment_status'] = $payment_status;
                $data['pgr_data'] = json_encode($_POST);
                
                $where = array(
                    'pgr_id' => $custom
                );
                 
                $this->db->set($data);
                $this->db->where('pgr_id', $custom);
                $this->db->update($this->model_gateways_records->table);
                //sending email
                $data = array();
                $subject = 'Paypal order completed successfully - ' . $txn_id . ' - ' . $custom;
                $data['message'] = 'Hi, paypal order completed sucessfully. ';
                
                  /*getting admin mail*/
                $mail_from = model_settings::$db_config['admin_mail'];
                // get domain
                $sitename = strtolower( $_SERVER['SERVER_NAME'] );
                if ( substr( $sitename, 0, 4 ) == 'www.' )
                $sitename = substr( $sitename, 4 );
                // get domain part
                list( $user, $domain ) = explode( '@', $mail_from );
                //verify if mail is allowed
                $mail_from = ( $sitename == $domain ) ? $mail_from : "wordpress@$sitename";
                $from_name  = empty($mail_from) ? $mail_from : model_settings::$db_config['admin_mail'];
               
                $message=$data['message'];
                
                $headers = array();
                $message_format='html';
                $content_type = $message_format == "html" ? "text/html" : "text/plain";
                $headers[] = "MIME-Version: 1.0";
                $headers[] = "Content-type: {$content_type}";
                
                $headers[] = "From: \"{$from_name}\" <{$mail_from}>";
                $to=model_settings::$db_config['admin_mail'];
                
                $this->load->library('email', emailConfiguration(intval(model_settings::$db_config['type_email'])));
                $this->email->set_newline("\r\n");
                $this->email->from(model_settings::$db_config['admin_mail'], model_settings::$db_config['site_title']);
                $this->email->to($to);
                $this->email->subject($subject);
                $this->email->set_mailtype("html");
                $template_message = $message;
                $this->email->message($template_message);
                $this->email->send();
                 
                
               
            } else {
                //sending email
                $message = 'Paypal order not completed - ' . $txn_id . ' - ' . $custom;
                //log data
                    $data3 = array();
                    $data3['vis_uniqueid'] = '';
                    $data3['vis_user_agent'] = $agent;
                    $data3['vis_page'] = $_SERVER['REQUEST_URI'];
                    $data3['vis_referer'] = $referer;
                    $data3['vis_ip'] = $ip;
                $data4 = array();    
                $data4['type_pg_id']=2;
                $data4['pgr_id']=$custom;
                $data4['pgl_data'] = json_encode($_POST);
                $data4['pgl_data2'] = Uiform_Form_Helper::array2xml($data3);
                $data4['pgl_message'] = $message;
                $this->db->set($data4);
                $this->db->insert($this->model_gateways_logs->table);
            }
        } else if (strcmp($res, "INVALID") == 0) {
            // IPN invalid, log for manual investigation
            $payer_email = $_POST['payer_email'];
            $item_name = isset($_POST['item_name'])?$_POST['item_name']:'';
            $item_number = isset($_POST['item_number'])?$_POST['item_number']:'';
            $txn_id = $_POST['txn_id'];

            $message = "The response from IPN was: <b>" . $res . "</b>";
            //log data
                    $data3 = array();
                    $data3['vis_uniqueid'] = '';
                    $data3['vis_user_agent'] = $agent;
                    $data3['vis_page'] = $_SERVER['REQUEST_URI'];
                    $data3['vis_referer'] = $referer;
                    $data3['vis_ip'] = $ip;
                $data4 = array();    
                $data4['type_pg_id']=2;
                $data4['pgr_id']=$custom;
                $data4['pgl_data'] = json_encode($_POST);
                $data4['pgl_data2'] = Uiform_Form_Helper::array2xml($data3);
                $data4['pgl_message'] = $message;
                
                $this->db->set($data4);
                $this->db->insert($this->model_gateways_logs->table);
        }else{
            //log data
                    $data3 = array();
                    $data3['vis_uniqueid'] = '';
                    $data3['vis_user_agent'] = $agent;
                    $data3['vis_page'] = $_SERVER['REQUEST_URI'];
                    $data3['vis_referer'] = $referer;
                    $data3['vis_ip'] = $ip;
                $data4 = array();    
                $data4['type_pg_id']=2;
                $data4['pgr_id']='';
                $data4['pgl_data'] = json_encode($_POST);
                $data4['pgl_data2'] = Uiform_Form_Helper::array2xml($data3);
                $data4['pgl_message'] = 'paypal ipn connection';
                $this->db->set($data4);
                $this->db->insert($this->model_gateways_logs->table);
        }

        //checking errors
          $previousOutput = ob_get_contents();
              //putting at the of script
        /*
            if ($previousOutput) {
                $previousOutput = "[" . date('d-m-Y H:i:s', time()) . "] invoice \n" . $previousOutput . "\n";
                $req_dump = print_r($previousOutput, true);
                $fp = fopen('ipnlog.log', 'a');
                fwrite($fp, $req_dump);
                fclose($fp);
            }*/
            
            ob_end_clean();
            if(!empty($previousOutput)){
                throw new Exception($previousOutput);
            }
        
        
        } catch (Exception $e) {
            $error = array();
            $error['Message'] = $e->getMessage();
           // $error['Trace'] = $e->getTrace();
            $ip = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '';
            $user_agent = isset($_SERVER["HTTP_USER_AGENT"]) ? $_SERVER["HTTP_USER_AGENT"] : '';
            $hash = hash('crc32', md5($ip . $user_agent));   
            $referer = isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : '';
                      
            
            //log data
                $data3 = array();
                $data3['vis_uniqueid'] = $hash;
                $data3['vis_user_agent'] = $user_agent;
                $data3['vis_page'] = $_SERVER['REQUEST_URI'];
                $data3['vis_referer'] = $referer;
                $data3['vis_ip'] = $ip;
            $data4 = array();    
            $data4['type_pg_id']=2;
            $data4['pgr_id']=!empty($custom)?$custom:'';
            $data4['pgl_data'] = json_encode($_POST);
            $data4['pgl_data2'] = json_encode($data3);
            $data4['pgl_error'] = Uiform_Form_Helper::array2xml($error);
            $data4['pgl_message'] = "Error - [" . date('d-m-Y H:i:s', time()) . "]";
            $this->db->set($data4);
            $this->db->insert($this->model_gateways_logs->table);
            
        }
        
        
    }
    
    /**
     * Paypal::_getPaypalHost()
     * Get paypal host
     * 
     * @return void
     */
    private function _getPaypalHost() 
    {
        if ($this->use_sandbox)
            return self::SANDBOX_HOST;
        else
            return self::PAYPAL_HOST;
    }
    
    /**
     * Paypal::requirePostMethod()
     * Verify post method
     * 
     * @return void
     */
    private function _requirePostMethod() 
    {
        // require POST requests
        if ($_SERVER['REQUEST_METHOD'] && $_SERVER['REQUEST_METHOD'] != 'POST') {
            header('Allow: POST', true, 405);
            throw new Exception("Invalid HTTP request method.");
        }
    }
    
    

}

?>
