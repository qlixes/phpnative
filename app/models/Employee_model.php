<?php

namespace app\models;

use system\base\Model;

class Employee extends Model
{
    function filter_employee($params = array())
    {
        $sql = 'SELECT * FROM master_employee';

        if(!empty($params['user_id']))
            $where[] = 'user_id like "%:user_id%"'; //pasti buggy

        if(!empty($params['name']))
            $where[] = 'name = :name';

        if(!empty($params['dept_id']))
            $where[] = 'default_deptid = :dept_id';

        if(!empty($params))
            $sql .= ' WHERE ' . implode($where, ' AND ');

        $sql .= ';';

        $query = $this->read($sql, $params);

        return array($query->status(), $query->results());
    }
}