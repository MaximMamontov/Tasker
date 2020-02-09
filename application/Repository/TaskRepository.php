<?php

namespace application\Repository;

use PDO;

/**
 * Class TaskRepository
 */
class TaskRepository implements RepositoryInterface
{
    /**
     * @var PDO
     */
    private $pdo;

    /**
     * TaskRepository constructor.
     * @param PDO $pdo
     */
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function save($object)
    {
        // TODO: Implement save() method.
    }

    public function find($id)
    {
        // TODO: Implement find() method.
    }
}