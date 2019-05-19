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
if (class_exists('model_gateways')) {
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
class model_gateways extends CI_Model {

     
    public $table = "";

    function __construct() {
         
        $this->table = $this->db->dbprefix . "cest_uiform_pay_gateways";
    }

    /**
     * formsmodel::getListGateways()
     * List Gateways
     * 
     * @param int $per_page max number of form estimators
     * @param int $segment  Number of pagination
     * 
     * @return array
     */
    function getListGateways() {
        $query = sprintf('
            select c.pg_id,c.pg_name,c.pg_modtest,c.pg_data,c.flag_status,c.pg_order,c.pg_description
            from %s c
            where c.flag_status>=0 
            ', $this->table);
        $query2 = $this->db->query($query);
        return $query2->result();
        
    }
    
    function getAvailableGateways() {
        $query = sprintf('
            select c.pg_id,c.pg_name,c.pg_modtest,c.pg_data,c.flag_status,c.pg_order,c.pg_description
            from %s c
            where c.flag_status=1
            ORDER BY c.pg_order asc
            ', $this->table);
        $query2 = $this->db->query($query);
        return $query2->result();
    }
    
    function getGatewayById($id) {
        $query = sprintf('
            select c.pg_id,c.pg_name,c.pg_modtest,c.pg_data,c.flag_status,c.pg_order,c.pg_description
            from %s uf
            where uf.pg_id=%s
            ', $this->table, $id);
        
        $query2 = $this->db->query($query);
        return $query2->row();
    }
    
}

?>
