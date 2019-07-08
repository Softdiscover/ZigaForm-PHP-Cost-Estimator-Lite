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
class Records extends MX_Controller {

    const VERSION = '0.1';
    var $per_page = 50;
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
        $this->load->model('model_gateways_records');
        $this->load->model('formbuilder/model_record');
       // global $wpdb;
        //$this->wpdb = $wpdb;
        //$this->model_gateways_records = self::$_models['gateways']['records'];
       // delete record
       //add_action('wp_ajax_rocket_fbuilder_invoice_delete_records', array(&$this, 'ajax_delete_records'));
       // $this->auth->authenticate(true);
    }
    
    public function ajax_delete_records() {
         $this->auth->authenticate(true);
        
        $pgr_id = (isset($_POST['pgr_id']) && $_POST['pgr_id']) ? Uiform_Form_Helper::sanitizeInput($_POST['pgr_id']) : 0;
        $where = array(
            'pgr_id' => $pgr_id
        );
        $data = array(
            'flag_status' => 0
        );
        
        $this->db->set($data);
            $this->db->where('pgr_id', $pgr_id);
            $this->db->update($this->model_gateways_records->table);
    }
    
    public function info_record() {
         $this->auth->authenticate(true);
        $id_rec = (isset($_GET['id_rec']) && $_GET['id_rec']) ? Uiform_Form_Helper::sanitizeInput($_GET['id_rec']) : 0;
        $data = array();
        $data['record_id']=$id_rec;
        
        $form_rec_data = $this->model_record->getFormDataById($id_rec);
        
        $data['fmb_inv_tpl_st'] = $form_rec_data->fmb_inv_tpl_st;
        $data['base_url']=base_url().'/';
        $data['form_id']=$form_rec_data->form_fmb_id;
        $data['url_form']=site_url().'formbuilder/frontend/pdf_show_invoice/?uifm_mode=pdf&is_html=1&id='.$id_rec;
        $data['show_summary'] = $this->load->view('formbuilder/frontend/form_summary_custom',$data,true);
        
        $this->template->loadPartial('layout', 'gateways/records/info_record', $data);
    }
    
    public function list_records($offset = 0) {
         $this->auth->authenticate(true);
        //list all forms
        $data = $config = array();
        $offset = (isset($_GET['offset'])) ? Uiform_Form_Helper::sanitizeInput($_GET['offset']) : 0;
        //create pagination
        $this->load->library('pagination');
        $config['base_url'] = site_url() . 'gateways/records/list_records';
        $config['total_rows'] = $this->model_gateways_records->CountRecords();
        $config['per_page'] = $this->per_page;
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['full_tag_open'] = '<ul class="pagination pagination-sm">';
        $config['full_tag_close'] = '</ul>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li><span>';
        $config['cur_tag_close'] = '</span></li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        

        $this->pagination->initialize($config);
        // If the pagination library doesn't recognize the current page add:
        $this->pagination->cur_page = $offset;
        $data['query'] = $this->model_gateways_records->getListRecords($config['per_page'], $offset);
        $data['pagination'] = $this->pagination->create_links();
        $this->template->loadPartial('layout', 'gateways/records/list_records', $data);
    }
    
    
    public function action_pdf_show_invoice() {
      
         $rec_id=isset($_GET['id']) ? Uiform_Form_Helper::sanitizeInput($_GET['id']) :'';
          
         if(intval($rec_id)>0){
                 ob_start();
               ?>
        <!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
        <html> 
        <head> 
        <meta	http-equiv="Content-Type"	content="charset=utf-8" />
            <style type="text/css">
                    * {
                        font-family: "DejaVu Sans Mono", monospace;
                        }
                </style>
                <link href="<?php echo base_url(); ?>/assets/common/bootstrap/2.3.2/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" >
               
                <style type="text/css">
                    .uifm_invoice_container h3{
                        margin-left:-20px;
                    }
                    .uifm_invoice_container .invoice_date{
                        margin-left:-20px;
                        margin-bottom: 20px;
                    }
                    .uifm_invoice_container{
                    margin: 10px 20px 20px;
                    }
                </style>
        </head> 
            <body>
                <div style="width:600px;margin: 0 100px;">
                    <!-- if p tag is removed, title will dissapear, idk -->
                    <p>&nbsp;</p>
                   <?php
                echo modules::run('formbuilder/frontend/get_summaryInvoice',$rec_id);
                ?>
                </div>
            </body>
            </html>   
                    
               <?php
                
                $cntACmp = ob_get_contents();
                $cntACmp = preg_replace("/\s+/"," ", $cntACmp);
                    ob_end_clean();
                    $tmp_html=$cntACmp ;

                $tmp_recid=$rec_id;
                
                generate_pdf($tmp_html,'record_'.$tmp_recid, true);
                
                
         }
         //die all
         die();
    }
    
  
}

?>
