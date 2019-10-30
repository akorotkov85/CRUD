<?php

namespace App\Handler;

use App\Service\DataBaseAdapter\Connection;
use PDO;

/**
 * Class ReadHandler
 * @package App\Handler
 */
final class ReadHandler
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
     * @return array
     */
    public function read(): array
    {
        $query = "SELECT * FROM groups";

        return $this->connection->getConnection()->getConnection()->query($query)->fetchAll(PDO::FETCH_ASSOC);
    }
}
