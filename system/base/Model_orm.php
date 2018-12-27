<?php

namespace system\base;

use system\base\Database;

class Model extends Database
{
    const SELECT_FORMAT = "SELECT %s FROM %s WHERE %s GROUP BY %s ORDER BY %s";
    const INSERT_FORMAT = "INSERT INTO %s(%s) VALUES (%s)";
    const DELETE_FORMAT = "DELETE FROM %s";
    const UPDATE_FORMAT = "UPDATE FROM ";

    var $field;
    var $table;
    var $join = array();
    var $where;
    var $group;
    var $order;

    function field($field = array())
    {
        $this->field = implode($field);
    }

    function from($table)
    {
        $this->table = $table;
    }

    // format condition will be : array('a >= 1')
    function join($table, $condition = array(), $type = 'INNER')
    {
        $this->join[] = $type . ' JOIN ' . $table . ' ON ' . implode($condition, ' AND ');
    }
    // separator will use AND
    function where($where = array(), $with_or = false)
    {
        $with = ($with_or) ? ' OR ' : ' AND ';
        $this->where[] = implode($where, $with);
    }

    function where_in($field, $value = array(), $use_not = false)
    {
        $where = $field . ($use_not) ? ' NOT IN ' : ' IN ';
        $where .= '(' . implode($value, ',') . ')';
        $this->where[] = $where;
    }

    function group_by($group = array())
    {
        $this->group[] = implode($group,',');
    }

    function order_by($field = array(), $order = 'ASC')
    {
        $this->order = implode($field, ',') . " $order ";
    }


    // if success will commit transaction
    // failed will rollback
    // function start_transaction();
    // function end_transaction();

    // function show()
    // {
    // }

    // function insert($params = array())
    // {
    //     $sql = (!empty($params['id'])) ? UPDATE_FORMAT : INSERT_FORMAT;
    //     $this->run()
    // }

    // function delete()
}