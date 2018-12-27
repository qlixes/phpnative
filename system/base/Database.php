<?php

namespace system\base

use system\base\Common;

// using PDO
class Database extends Common
{
    var $pdo;
    
    function __construct()
    {
        try
        {
            $this->pdo = new PDO(
                $this->load_item('class', 'mysql') . ":"
                . "host=" . $this->load_item('host','localhost') . ";"
                . "port=" . $this->load_item('port', '3306') .  ";"
                . "charset=" . $this->load_item('charset', 'utf8') . ";" 
                . "database=" . $this->load_item('database', 'database'),
                $this->load_item('username', 'root'),
                $this->load_item('password', '')
            );   
        } catch (PDOException $e)
        {
            die($e->getMessage());
        }
    }
}