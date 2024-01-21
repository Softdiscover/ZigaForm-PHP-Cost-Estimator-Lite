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
if ( class_exists('model_gateways_logs')) {
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
class model_gateways_logs extends CI_Model
{


    public $table = '';
    public $tbpay_record = '';
    public $tbform_record = '';
    public $tbform = '';

    public function __construct()
    {

        $this->table = $this->db->dbprefix . 'cest_uiform_pay_logs';
        $this->tbpay_record  = $this->db->dbprefix . 'cest_uiform_pay_records';
        $this->tbform_record = $this->db->dbprefix . 'cest_uiform_form_records';
        $this->tbform        = $this->db->dbprefix . 'cest_uiform_form';
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
				select pgr_id from %s where pgr_id IN (
				select fbh_id from %s where form_fmb_id=%s
				)
				);
            ',
            $this->table,
            $this->tbpay_record,
            $this->tbform_record,
            $form_id
        );

        $this->db->query($query);
    }
}
