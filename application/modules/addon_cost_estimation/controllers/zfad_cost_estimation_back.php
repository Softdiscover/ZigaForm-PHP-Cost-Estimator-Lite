<?php

if ( ! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
if ( class_exists('zfad_cost_estimation_back')) {
    return;
}

class zfad_cost_estimation_back extends MX_Controller
{
    const VERSION = '0.1';

    private static $instance = null;

    public $local_controllers = array();
    public $local_back_actions = array();
    public $js_back_actions = array();

    public function __construct()
    {
        parent::__construct();
    }

    public function get_instance()
    {
        return self::$instance ? self::$instance : $this;
    }

    public function set_instance($obj)
    {
        if ( ! self::$instance) {
            self::$instance = $obj;
        }
    }

    public function add_controllers()
    {
        return array();
    }
}
