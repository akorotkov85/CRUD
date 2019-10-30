<?php

namespace App\Handler;

use App\Service\DataBaseAdapter\Connection;
use PDO;

final class DeleteHandler
{
    /**
     * @var Connection
     */
    private $connection;

    /**
     * DeleteHandler constructor.
     * @param Connection $adapter
     */
    public function __construct(Connection $adapter)
    {
        $this->connection = $adapter;
    }

    /**
     * @param int $id
     * @return array
     */
    public function delete(int $id): array
    {
        $query = "DELETE FROM groups WHERE id = '{$id}'";
        $sql = 'SELECT * FROM groups';

        $this->connection->getConnection()->getConnection()->exec($query);

        return $this->connection->getConnection()->getConnection()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
}
