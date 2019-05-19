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
if (class_exists('model_gateways_records')) {
    return;
}

/**
 * Model Setting class
 *
 * @category  PHP
 * @package   Rocket_form
 * @author    Softdiscover <info@softdiscover.com>
 * @copyright 2013 Softdiscover
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1.00
 * @link      http://wordpress-cost-estimator.zigaform.com
 */
class model_gateways_records extends CI_Model {

    
    public $table = "";
    public $tbform_record = "";
    public $tbform = "";

    function __construct() {
        
        $this->table = $this->db->dbprefix . "cest_uiform_pay_records";
        $this->tbform_record = $this->db->dbprefix . "cest_uiform_form_records";
        $this->tbform = $this->db->dbprefix . "cest_uiform_form";
    }
    
    function getRecordById($id) {
        $query = sprintf('
            select uf.pgr_id,uf.type_pg_id,uf.pgr_payment_status,uf.pgr_payment_amount,uf.pgr_currency,uf.pgr_data,uf.flag_status,uf.created_date,uf.updated_date,uf.fbh_id
            from %s uf
            where uf.pgr_id=%s
            ', $this->table, $id);

        $query2 = $this->db->query($query);
        
        return $query2->row();
    }
    
    function getInvoiceDataByFormRecId($id_rec){
        $query = sprintf('select  f.fmb_name,f.fmb_id,f.fmb_data,frec.fbh_total_amount,pr.pgr_id,pr.created_date
        from %s frec
        join %s f on f.fmb_id=frec.form_fmb_id
        join %s pr on pr.fbh_id=frec.fbh_id
        where frec.flag_status>0
        and frec.fbh_id=%s', $this->tbform_record,$this->tbform,$this->table,$id_rec);
        $query2 = $this->db->query($query);
        
        return $query2->row();
    }
    
    function CountRecords() {
        $query = sprintf('
            select COUNT(*) AS counted
            from %s gr
            join %s fr on fr.fbh_id=gr.fbh_id
            join %s f on fr.form_fmb_id=f.fmb_id
            where gr.flag_status>0
            ORDER BY gr.created_date desc
            ',  $this->table, $this->tbform_record, $this->tbform);
        
        $query2 = $this->db->query($query);
        
        $row = $query2->row();
        
        if (isset($row->counted)) {
            return $row->counted;
        } else {
            return 0;
        }
    }
    
    function getListRecords($per_page = '', $segment = '') {
        $query = sprintf('
            select gr.pgr_id,gr.type_pg_id,gr.pgr_payment_status,gr.pgr_payment_amount,gr.pgr_currency,gr.pgr_data,gr.flag_status,gr.created_date,gr.updated_date,gr.fbh_id,f.fmb_name
            from %s gr
            join %s fr on fr.fbh_id=gr.fbh_id
            join %s f on fr.form_fmb_id=f.fmb_id
            where gr.flag_status>0
            ORDER BY gr.created_date desc
            ', $this->table, $this->tbform_record, $this->tbform);

        
        if ($per_page != '' || $segment != '') {
            $segment=(!empty($segment))?$segment:0;
            $query.=sprintf(' limit %s,%s', $segment, $per_page);
        }
        
        $query2 = $this->db->query($query);
        return $query2->result();
    }
    
}

?>
