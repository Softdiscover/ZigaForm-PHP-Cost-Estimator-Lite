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
if ( class_exists('model_gateways_records')) {
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
 * @link      https://softdiscover.com/zigaform/wordpress-cost-estimator
 */
class model_gateways_records extends CI_Model
{


    public $table         = '';
    public $tbform_record = '';
    public $tbform        = '';

    public function __construct()
    {

        $this->table         = $this->db->dbprefix . 'cest_uiform_pay_records';
        $this->tbform_record = $this->db->dbprefix . 'cest_uiform_form_records';
        $this->tbform        = $this->db->dbprefix . 'cest_uiform_form';
    }

    public function getRecordById($id)
    {
        $query = sprintf(
            '
            select uf.pgr_id,uf.type_pg_id,uf.pgr_payment_status,uf.pgr_payment_amount,uf.pgr_currency,uf.pgr_data,uf.flag_status,uf.created_date,uf.updated_date,uf.fbh_id
            from %s uf
            where uf.pgr_id=%s
            ',
            $this->table,
            $id
        );

        $query2 = $this->db->query($query);

        return $query2->row();
    }

    public function getInvoiceDataByFormRecId($id_rec)
    {
        $query  = sprintf(
            'select  f.fmb_name,f.fmb_id,f.fmb_data,frec.fbh_total_amount,pr.pgr_id,pr.created_date,f.fmb_inv_tpl_html,f.fmb_inv_tpl_st
        from %s frec
        join %s f on f.fmb_id=frec.form_fmb_id
        join %s pr on pr.fbh_id=frec.fbh_id
        where frec.flag_status>=0
        and frec.fbh_id=%s',
            $this->tbform_record,
            $this->tbform,
            $this->table,
            $id_rec
        );
        $query2 = $this->db->query($query);

        return $query2->row();
    }

    public function CountRecords()
    {
        $query = sprintf(
            '
            select COUNT(*) AS counted
            from %s gr
            join %s fr on fr.fbh_id=gr.fbh_id
            join %s f on fr.form_fmb_id=f.fmb_id
            where gr.flag_status>0
            ORDER BY gr.created_date desc
            ',
            $this->table,
            $this->tbform_record,
            $this->tbform
        );

        $query2 = $this->db->query($query);

        $row = $query2->row();

        if ( isset($row->counted)) {
            return $row->counted;
        } else {
            return 0;
        }
    }

    public function getListRecords($per_page = '', $segment = '')
    {
        $query = sprintf(
            '
            select gr.pgr_id,gr.type_pg_id,gr.pgr_payment_status,gr.pgr_payment_amount,gr.pgr_currency,gr.pgr_data,gr.flag_status,gr.created_date,gr.updated_date,gr.fbh_id,f.fmb_name
            from %s gr
            join %s fr on fr.fbh_id=gr.fbh_id
            join %s f on fr.form_fmb_id=f.fmb_id
            where gr.flag_status>0
            ORDER BY gr.created_date desc
            ',
            $this->table,
            $this->tbform_record,
            $this->tbform
        );

        if ( $per_page != '' || $segment != '') {
            $segment = ( ! empty($segment) ) ? $segment : 0;
            $query  .= sprintf(' limit %s,%s', $segment, $per_page);
        }

        $query2 = $this->db->query($query);
        return $query2->result();
    }



    /**
     * Show all records according to filter
     *
     * @param string $per_page
     * @param string $segment
     * @return void
     */
    public function getListAllInvoicesFiltered($data)
    {

        $per_page   = $data['per_page'];
        $segment    = $data['segment'];
        $orderby    = $data['orderby'];

        $query = sprintf(
            '
			select gr.pgr_id,gr.type_pg_id,gr.pgr_payment_status,gr.pgr_payment_amount,gr.pgr_currency,gr.pgr_data,gr.flag_status,gr.created_date,gr.updated_date,gr.fbh_id,f.fmb_name
			from %s gr
            join %s fr on fr.fbh_id=gr.fbh_id
            join %s f on fr.form_fmb_id=f.fmb_id
            where gr.flag_status>0 ',
            $this->table,
            $this->tbform_record,
            $this->tbform
        );

        $orderby = ( $orderby === 'asc' ) ? 'asc' : 'desc';

        $query .= sprintf(' ORDER BY gr.created_date %s ', $orderby);

        if ( $per_page != '' || $segment != '') {
            $segment = ( ! empty($segment) ) ? $segment : 0;
            $query  .= sprintf(' limit %s,%s', (int) $segment, (int) $per_page);
        }
        $query2 = $this->db->query($query);
        return $query2->result();
    }

    /**
     * Show trash records according to filter
     *
     * @param string $per_page
     * @param string $segment
     * @return void
     */
    public function getListTrashInvoicesFiltered($data)
    {

        $per_page   = $data['per_page'];
        $segment    = $data['segment'];
        $orderby    = $data['orderby'];

        $query = sprintf(
            '
			select gr.pgr_id,gr.type_pg_id,gr.pgr_payment_status,gr.pgr_payment_amount,gr.pgr_currency,gr.pgr_data,gr.flag_status,gr.created_date,gr.updated_date,gr.fbh_id,f.fmb_name
			from %s gr
            join %s fr on fr.fbh_id=gr.fbh_id
            join %s f on fr.form_fmb_id=f.fmb_id
            where gr.flag_status=0 ',
            $this->table,
            $this->tbform_record,
            $this->tbform
        );

        $orderby = ( $orderby === 'asc' ) ? 'asc' : 'desc';

        $query .= sprintf(' ORDER BY gr.created_date %s ', $orderby);

        if ( $per_page != '' || $segment != '') {
            $segment = ( ! empty($segment) ) ? $segment : 0;
            $query  .= sprintf(' limit %s,%s', (int) $segment, (int) $per_page);
        }
        $query2 = $this->db->query($query);
        return $query2->result();
    }

    /**
     * delete payment records by form id
     *
     * @param [type] $form_id
     * @return void
     */
    public function deleteRecordbyFormId($form_id)
    {

        $query = sprintf(
            '
            DELETE from %s where pgr_id IN (
				select fbh_id from %s where form_fmb_id=%s
				);
            ',
            $this->table,
            $this->tbform_record,
            $form_id
        );

        $this->db->query($query);
    }

    /*
    * list all and trash forms
    */
    public function ListTotals()
    {
        $query = sprintf(
            '
			SELECT 
			  SUM(CASE WHEN flag_status = 0 THEN 1 ELSE 0 END) AS r_trash,
			  SUM(CASE WHEN flag_status != 0 THEN 1 ELSE 0 END) AS r_all
			FROM %s
			',
            $this->table
        );

        $query2 = $this->db->query($query);
        return $query2->row();
    }
}
