<?php

namespace App\Handler;

use App\Service\DataBaseAdapter\Adapter\MySqlAdapter;
use App\Service\DataBaseAdapter\Connection;

/**
 * Обработчик
 * Class HandlerResolver
 * @package App\Handler
 */
final class HandlerResolver
{
    /**
     * @return Connection
     */
    private function getDataBaseAdapter(): Connection
    {
        return new Connection(new MySqlAdapter());
    }

    /**
     * @return ReadHandler
     */
    public function getReadHandler(): ReadHandler
    {
        return new ReadHandler($this->getDataBaseAdapter());
    }

    /**
     * @return CreateHendler
     */
    public function getCreateHandler(): CreateHendler
    {
        return new CreateHendler($this->getDataBaseAdapter());
    }

    /**
     * @return DeleteHandler
     */
    public function getDeleteHandler(): DeleteHandler
    {
        return new DeleteHandler($this->getDataBaseAdapter());
    }

    /**
     * @return UpdateHandler
     */
    public function getUpdateHandler(): UpdateHandler
    {
        return new UpdateHandler($this->getDataBaseAdapter());
    }
}
