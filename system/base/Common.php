<?php
defined('BASEPATH') OR exit('No direct script access allowed');

namespace system\base;



class Common
{
    var $config = array();
    var $class = array();

    function load_config($config)
    {
        $config = require(APPPATH . $config . '.php');
        $this->config = array_merge($this->config, $config);
    }

    function load_item($item, $default)
    {
        return (!empty($this->config[$item])) ? $this->config[$item] : $default;
    }

    function _singleton_class($class, $type)
    {
        $class = ($class && file_exist(APPPATH . $type . DIRECTORY_SEPARATOR . $class . '.php')) ? 
    }

    function load_controller($controller)
    function load_model($model)
    function load_view()
}