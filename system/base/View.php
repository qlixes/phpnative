<?php

namespace system\base;

use system\base\Common;

class View
{
    function view($template, $data = array(), $string =false)
    {
        if(!file_exists(VIEWPATH . $template . '.php'))
            die('Failed load view pages');

        $this->config = array_merge($this->config, $data);
        unset($data);

        foreach($this->config as $key => $value)
            $$key = $value;

        ob_start();
        require VIEWPATH . $template . '.php';
        $template = ob_get_contents();
        ob_end_clean();

        if($string)
            echo $template;
        else
            return $template;
    }
}