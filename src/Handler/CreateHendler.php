<?php

namespace App\Handler;

use App\Service\DataBaseAdapter\Connection;
use PDO;

/**
 * Class CreateHendler
 * @package App\Handler
 */
final class CreateHendler
{
    private $connection;

    /**
     * ReadHandler constructor.
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
    public function create(string $name, string $email): array
    {
        $id = time();

        $query = "INSERT INTO groups(id, name, email) VALUES('{$id}', '{$name}', '{$email}')";
        $this->connection->getConnection()->getConnection()->exec($query);

        $query = "SELECT * FROM groups WHERE id = '{$id}'";

        return $this->connection->getConnection()->getConnection()->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }
}
