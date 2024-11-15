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

use \Zigaform\Admin\List_data;

/**
 * Controller Settings class
 *
 * @category  PHP
 * @package   Rocket_form
 * @author    Softdiscover <info@softdiscover.com>
 * @copyright 2013 Softdiscover
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1.00
 * @link      https://softdiscover.com/zigaform/wordpress-cost-estimator
 */
class Records extends BackendController
{

    const VERSION = '0.1';
    private $per_page = 50;
    protected $modules;

    /**
     * Constructor
     *
     * @mvc Controller
     */
    public function __construct()
    {

        parent::__construct();
        $this->load->language_alt(model_settings::$db_config['language']);
        $this->template->set('controller', $this);
        $this->load->model('model_gateways');
        $this->load->model('model_gateways_records');
        $this->load->model('model_gateways_logs');
        $this->load->model('formbuilder/model_record');
        // global $wpdb;
        // $this->wpdb = $wpdb;
        // $this->model_gateways_records = self::$_models['gateways']['records'];
        // delete record
        // add_action('wp_ajax_rocket_fbuilder_invoice_delete_records', array(&$this, 'ajax_delete_records'));
        //
    }

    public function ajax_list_invoice_updatest()
    {

        $list_ids = ( isset($_POST['id']) && $_POST['id'] ) ? array_map(array( 'Uiform_Form_Helper', 'sanitizeRecursive' ), $_POST['id']) : array();
        $form_st  = ( isset($_POST['form_st']) && $_POST['form_st'] ) ? Uiform_Form_Helper::sanitizeInput($_POST['form_st']) : '';
        $is_trash  = ( isset($_POST['is_trash']) && $_POST['is_trash'] ) ? Uiform_Form_Helper::sanitizeInput($_POST['is_trash']) : '';
        if ( $list_ids) {
            if ( intval($is_trash) === 0) {
                switch ( intval($form_st)) {
                    case 1:
                    case 2:
                    case 0:
                        foreach ( $list_ids as $value) {
                            $data  = array(
                                'flag_status' => intval($form_st),
                            );

                            $this->db->set($data);
                            $this->db->where('pgr_id', $value);
                            $this->db->update($this->model_gateways_records->table);
                        }
                        break;
                    default:
                        break;
                }
            } else {
                switch ( intval($form_st)) {
                    case 1:
                    case 2:
                        foreach ( $list_ids as $value) {
                            $data  = array(
                                'flag_status' => intval($form_st),
                            );

                            $this->db->set($data);
                            $this->db->where('pgr_id', $value);
                            $this->db->update($this->model_gateways_records->table);
                        }
                        break;
                    case 0:
                        foreach ( $list_ids as $value) {
                            $this->delete_form_process($value);
                        }

                        break;
                    default:
                        # code...
                        break;
                }
            }
        }
    }

    private function delete_form_process($value)
    {

        //remove from records
        $this->db->where('pgr_id', $value);
        $this->db->delete($this->model_gateways_logs->table);

        //remove from records
        $this->db->where('pgr_id', $value);
        $this->db->delete($this->model_gateways_records->table);
    }

    public function ajax_delete_invoice()
    {

        $pgr_id = ( isset($_POST['pgr_id']) && $_POST['pgr_id'] ) ? Uiform_Form_Helper::sanitizeInput($_POST['pgr_id']) : 0;
        $is_trash = ( isset($_POST['is_trash']) && $_POST['is_trash'] ) ? Uiform_Form_Helper::sanitizeInput($_POST['is_trash']) : 0;

        if ( intval($is_trash) === 0) {
            $data   = array(
                'flag_status' => 0,
            );

            $this->db->set($data);
            $this->db->where('pgr_id', $pgr_id);
            $this->db->update($this->model_gateways_records->table);
        } else {
            $this->delete_form_process($pgr_id);
        }
    }

    /**
     * List trash forms
     *
     * @return void
     */
    public function ajax_invoicelist_sendfilter()
    {

        $data_filter = ( isset($_POST['data_filter']) && $_POST['data_filter'] ) ? $_POST['data_filter'] : '';

        $opt_save   = ( isset($_POST['opt_save']) && $_POST['opt_save'] ) ? Uiform_Form_Helper::sanitizeInput($_POST['opt_save']) : 0;
        $opt_offset = ( isset($_POST['opt_offset']) && $_POST['opt_offset'] ) ? Uiform_Form_Helper::sanitizeInput($_POST['opt_offset']) : 0;
        $is_trash = ( isset($_POST['op_is_trash']) && $_POST['op_is_trash'] ) ? Uiform_Form_Helper::sanitizeInput($_POST['op_is_trash']) : 0;

        parse_str($data_filter, $data_filter_arr);

        $per_page   = $data_filter_arr['zgfm-listform-pref-perpage'];
        $orderby    = $data_filter_arr['zgfm-listform-pref-orderby'];

        $data               = array();
        $data['per_page']   = $per_page;
        $data['orderby']    = $orderby;
        $data['is_trash']    = $is_trash;

        update_option('zgfm_listinvoices_searchfilter', $data);

        $data['segment'] = 0;
        $data['offset']  = $opt_offset;

        $result = $this->ajax_invoiceslist_refresh($data);

        $json            = array();
        $json['content'] = $result;

        header('Content-Type: application/json');
        echo json_encode($json);
        die();
    }

    /**
     * get forms in trash
     *
     * @param [type] $data
     * @return void
     */
    public function ajax_invoiceslist_refresh($data)
    {

        $this->load->library('pagination');

        $offset = $data['offset'];

        // list all forms
        $config                         = array();

        $tmp = $this->model_gateways_records->ListTotals();
        if ( intval($data['is_trash']) === 0) {
            $config['base_url']             = site_url() . 'formbuilder/forms/list_records';
            $config['total_rows']           = $tmp->r_all;
        } else {
            $config['base_url']             = site_url() . 'formbuilder/forms/list_trash_records';
            $config['total_rows']           = $tmp->r_trash;
        }

        $config['per_page']             = $data['per_page'];
        $config['first_link']           = 'First';
        $config['last_link']            = 'Last';
        $config['full_tag_open']        = '<ul class="pagination pagination-sm">';
        $config['full_tag_close']       = '</ul>';
        $config['first_tag_open']       = '<li>';
        $config['first_tag_close']      = '</li>';
        $config['last_tag_open']        = '<li>';
        $config['last_tag_close']       = '</li>';
        $config['cur_tag_open']         = '<li class="zgfm-pagination-active"><span>';
        $config['cur_tag_close']        = '</span></li>';
        $config['next_tag_open']        = '<li>';
        $config['next_tag_close']       = '</li>';
        $config['prev_tag_open']        = '<li>';
        $config['prev_tag_close']       = '</li>';
        $config['num_tag_open']         = '<li>';
        $config['num_tag_close']        = '</li>';
        $config['page_query_string']    = true;
        $config['query_string_segment'] = 'offset';

        $this->pagination->initialize($config);
        // If the pagination library doesn't recognize the current page add:
        $this->pagination->cur_page = $offset;

        $data2               = array();
        $data2['per_page']   = $data['per_page'];
        $data2['segment']    = $offset;
        $data2['orderby']    = $data['orderby'];
        $data2['is_trash']  = $data['is_trash'];

        if ( intval($data2['is_trash']) === 0) {
            $data2['query'] = $this->model_gateways_records->getListAllInvoicesFiltered($data2);
        } else {
            $data2['query'] = $this->model_gateways_records->getListTrashInvoicesFiltered($data2);
        }

        $data2['pagination'] = $this->pagination->create_links();
        $data2['obj_list_data'] = List_data::get();

        if ( intval($data2['is_trash']) === 0) {
            return List_data::get()->list_detail_invoices($data2);
        } else {
            return List_data::get()->list_detail_invoicestrash($data2);
        }
    }

    public function info_record()
    {
        $id_rec            = ( isset($_GET['id_rec']) && $_GET['id_rec'] ) ? Uiform_Form_Helper::sanitizeInput($_GET['id_rec']) : 0;
        $data              = array();
        $data['record_id'] = $id_rec;

        $form_rec_data = $this->model_record->getFormDataById($id_rec);

        $data['fmb_inv_tpl_st'] = $form_rec_data->fmb_inv_tpl_st;
        $data['base_url']       = base_url() . '/';
        $data['form_id']        = $form_rec_data->form_fmb_id;
        $data['url_form']       = site_url() . 'formbuilder/frontend/pdf_show_invoice/?uifm_mode=pdf&is_html=1&id=' . $id_rec;
        $data['show_summary']   = $this->load->view('formbuilder/frontend/form_summary_custom', $data, true);

        $this->template->loadPartial('layout', 'gateways/records/info_record', $data);
    }

    public function list_records()
    {
        $filter_data = get_option('zgfm_listinvoices_searchfilter', true);
        $data2       = array();
        if ( empty($filter_data)) {
            $data2['per_page']   = intval($this->per_page);
            $data2['orderby']    = 'asc';
        } else {
            $data2['per_page']   = intval($filter_data['per_page']??'');
            $data2['orderby']    = $filter_data['orderby']??'';
        }

        $offset          = ( isset($_GET['offset']) ) ? Uiform_Form_Helper::sanitizeInput($_GET['offset']) : 0;
        $data2['offset'] = $offset;

        $form_data = $this->model_gateways_records->ListTotals();
        $data2['title'] = __('Invoices list', 'FRocket_admin');
        $data2['all'] = $form_data->r_all;
        $data2['trash'] = $form_data->r_trash;
        $data2['header_buttons'] = List_data::get()->list_detail_invoice_headerbuttons();
        $data2['script_trigger'] = 'zgfm_back_general.invoiceslist_search_process();';
        $data2['subcurrent'] = 1;
        $data2['subsubsub'] = List_data::get()->subsubsub_invoices($data2);
        $data2['is_trash'] = 0;

        $content = List_data::get()->show_list($data2);
        //echo self::loadPartial2( 'layout.php', $content);
        echo $this->template->loadPartial2('layout', $content);
    }

    /**
     * list trash records
     *
     * @return void
     */
    public function list_trash_records()
    {
        $filter_data = get_option('zgfm_listinvoices_searchfilter', true);
        $data2       = array();
        if ( empty($filter_data)) {
            $data2['per_page']   = intval($this->per_page);
            $data2['orderby']    = 'asc';
        } else {
            $data2['per_page']   = intval($filter_data['per_page']??'');
            $data2['orderby']    = $filter_data['orderby']??'';
        }

        $offset          = ( isset($_GET['offset']) ) ? Uiform_Form_Helper::sanitizeInput($_GET['offset']) : 0;
        $data2['offset'] = $offset;

        $form_data = $this->model_gateways_records->ListTotals();
        $data2['title'] = __('Invoices in trash', 'FRocket_admin');
        $data2['all'] = $form_data->r_all;
        $data2['trash'] = $form_data->r_trash;
        $data2['header_buttons'] = List_data::get()->list_detail_invoicetrash_headerbuttons();
        $data2['script_trigger'] = 'zgfm_back_general.invoiceslist_search_process();';
        $data2['subcurrent'] = 2;
        $data2['subsubsub'] = List_data::get()->subsubsub_invoices($data2);
        $data2['is_trash'] = 1;

        $content = List_data::get()->show_list($data2);
        //echo self::loadPartial2( 'layout.php', $content);
        echo $this->template->loadPartial2('layout', $content);
    }


    public function action_pdf_show_invoice()
    {
         $rec_id = isset($_GET['id']) ? Uiform_Form_Helper::sanitizeInput($_GET['id']) : '';

        if ( intval($rec_id) > 0) {
                ob_start();
            ?>
        <!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
        <html> 
        <head> 
        <meta   http-equiv="Content-Type"   content="charset=utf-8" />
            <style type="text/css">
                    * {
                        font-family: "DejaVu Sans Mono", monospace;
                        }
                </style>
                <link href="<?php echo base_url(); ?>assets/common/css/invoice.css" rel="stylesheet" type="text/css" media="all" >
                
        </head> 
            <body>
                <div style="width:600px;margin: 0 100px;">
                    <!-- if p tag is removed, title will dissapear, idk -->
                    <p>&nbsp;</p>
                  <?php
                    echo modules::run('formbuilder/frontend/get_summaryInvoice', $rec_id);
                    ?>
                </div>
            </body>
            </html>   
                    
               <?php

                $cntACmp = ob_get_contents();
                $cntACmp = preg_replace('/\s+/', ' ', $cntACmp);
                   ob_end_clean();
                   $tmp_html = $cntACmp;

                $tmp_recid = $rec_id;

                generate_pdf($tmp_html, 'record_' . $tmp_recid, true);
        }
         // die all
         die();
    }
}

?>
