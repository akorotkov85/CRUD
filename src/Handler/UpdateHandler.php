<?php

namespace App\Handler;

use App\Service\DataBaseAdapter\Connection;
use PDO;

final class UpdateHandler
{
    /**
     * @var Connection
     */
    private $connection;

    /**
     * UpdateHandler constructor.
     * @param Connection $adapter
     */
    public function __construct(Connection $adapter)
    {
        $this->connection = $adapter;
    }

    /**
     * @param int $id
     * @param string $name
     * @param string $email
     * @return array
     */
    public function update(int $id, string $name, string $email):array
    {
        $query = "UPDATE groups SET `name` = '{$name}',`email` = '{$email}' WHERE id = '{$id}'";
        $sql = 'SELECT * FROM groups';

        $this->connection->getConnection()->getConnection()->exec($query);

        return $this->connection->getConnection()->getConnection()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
}