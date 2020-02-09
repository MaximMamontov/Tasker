<?php

namespace application\Repository;

/**
 * Interface RepositoryInterface
 */
interface RepositoryInterface
{
    public function save($object);

    public function find($id);
}