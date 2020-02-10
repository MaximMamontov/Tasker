<?php

namespace application\models;

use application\core\Model;

class Main extends Model
{

    public function getNews()
    {
        $result = $this->db->row('SELECT `name`, `description`, status, id FROM tasks');
        return $result;
    }

    public function getComments()
    {
        $result = $this->db->row('SELECT `text`, `task_id` FROM comments');
        return $result;
    }

    public function changeStatus($id)
    {
        $this->db->updateStatus('UPDATE tasks SET status = :newStatus, `name` = :newName, description = :newDesc WHERE id = ' . $id);

    }

    public function deleteTasks($id)
    {
        $this->db->deleteTask('DELETE FROM tasks WHERE id =' . $id);
    }

    public function addTask()
    {
        $this->db->saveTask("INSERT INTO tasks (`name`, description, status) VALUES (:tName, :tDesc, :tStatus)");
    }

    public function addComment()
    {
        $this->db->saveComment("INSERT INTO comments (`text`, `task_id`) VALUES (:cText, :taskID)");
    }

}