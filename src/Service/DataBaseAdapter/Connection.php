<?php

namespace App\Service\DataBaseAdapter;

use App\Service\DataBaseAdapter\Adapter\MySqlAdapter;

/**
 * Class Connection
 * @package App\Service\DataBaseAdapter
 */
final class Connection
{
    private $mysql;

    /**
     * Connection constructor.
     * @param MySqlAdapter $adapter
     */
    public function __construct(MySqlAdapter $adapter)
    {
        $this->mysql = $adapter;
    }

    /**
     * @return MySqlAdapter
     */
    public function getConnection(): MySqlAdapter
    {
        return $this->mysql;
    }
}
