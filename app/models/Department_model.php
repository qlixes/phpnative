<?php
namespace app\models;

use system\base\Model;

class Department_model extends Model
{
    function filter_dept($params = array())
    {
        $sql = 'SELECT * FROM master_department';

        if(!empty($params['dept_id']))
            $where[] = 'dept_id = :dept_id';
        if(!empty($params['dept_name']))
            $where[] = 'dept_name = :dept_name';

        if(!empty($where))
            $sql .= ' WHERE ' . implode($where, ' AND ');

        $sql .= ';';

        $query = $this->read($sql, $params);

        return array($query->status(), $query->results());
    }
}