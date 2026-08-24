<?php

if ( ! defined('BASEPATH')) {
    exit('No direct script access allowed');
}
if ( class_exists('zfad_cost_estimation_front')) {
    return;
}

class zfad_cost_estimation_front extends MX_Controller
{
    const VERSION = '0.1';

    private static $instance = null;

    public $local_controllers = array();
    public $local_actions = array();
    public $js_actions = array();

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
