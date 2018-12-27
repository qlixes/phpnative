<?php

namespace system\base;

use system\base\Database;

class Model extends Database
{
    function read($sql, $params = array())
    {
        $stmt = $this->pdo->prepare($sql);
        $result = $stmt->execute($params);

        $this->status = ($result);

        $this->result = ($stmt->rowCount() > 1) ? $stmt->fetchAll(PDO::FETCH_ASSOC) : $stmt->fetch(PDO::FETCH_ASSOC);

        return $this;
    }

    function edit($sql, $params = array())
    {
        $stmt = $this->pdo->prepare($sql);
        $result = $stmt->execute($params);

        $this->status = ($result);

        return $this;
    }

    function status()
    {
        return $this->status;
    }

    function results()
    {
        return $this->result;
    }

    function insertId()
    {
        return $this->pdo->lastInsertId();
    }
}