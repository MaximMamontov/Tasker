<?php

namespace application\lib;

use PDO;

class Db
{

    protected $db;

    public function __construct()
    {
        $config = require 'application/config/db.php';
        $this->db = new PDO('mysql: host=' . $config['host'] . ';dbname=' . $config['db'] . '; charset=' . $config['charset'] . '', $config['user'], $config['pass']);

    }

    public function query($sql, $params = [])
    {
        $stmt = $this->db->prepare($sql);
        if (!empty($params)) {
            foreach ($params as $key => $val) {
                $stmt->bindValue(':' . $key, $val);
            }
        }

        $stmt->execute();
        return $stmt;
    }

    public function row($sql, $params = [])
    {
        $result = $this->query($sql, $params);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function saveTask($sql)
    {
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':tName', $_POST['name'], PDO::PARAM_STR);
        $stmt->bindParam(':tDesc', $_POST['description'], PDO::PARAM_STR);
        $stmt->bindParam(':tStatus', $_POST['status'], PDO::PARAM_STR);
        $stmt->execute();

    }

    public function updateStatus($sql)
    {
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam('newStatus', $_POST['changeStatus'], PDO::PARAM_STR);
        $stmt->bindParam('newName', $_POST['changeName'], PDO::PARAM_STR);
        $stmt->bindParam('newDesc', $_POST['changeDescription'], PDO::PARAM_STR);
        $stmt->execute();
    }

    public function deleteTask($sql)
    {
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
    }

    public function saveComment($sql)
    {
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam('cText', $_POST['comment'], PDO::PARAM_STR);
        $stmt->bindParam('taskID', $_POST['addCommentTaskID'], PDO::PARAM_STR);
        $stmt->execute();
    }
}


