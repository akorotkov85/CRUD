<?php

namespace App\Controller;

use App\Handler\HandlerResolver;
use App\Service\Render\Render;
use App\Service\Request\Request;

final class CRUDController
{
    /**
     * @var HandlerResolver
     */
    private $handlersResolver;

    /**
     * @var Render
     */
    private $render;

    public function __construct(HandlerResolver $resolver, Render $render)
    {
        $this->handlersResolver = $resolver;
        $this->render = $render;
    }

    /**
     *
     */
    public function read()
    {
        $this->render->renderArray($this->handlersResolver->getReadHandler()->read());

    }

    /**
     * @param Request $request
     */
    public function create(Request $request)
    {
        $email = $request->getJson()['email'];
        $name = $request->getJson()['name'];

        $this
            ->render
                ->renderArray($this->handlersResolver->getCreateHandler()->create($name, $email))
        ;
    }

    /**
     * @param Request $request
     */
    public function delete(Request $request)
    {
        $id = $request->getJson()['id'];
        $this
            ->render
                ->renderArray($this->handlersResolver->getDeleteHandler()->delete($id));
    }

    /**
     * @param Request $request
     */
    public function update(Request $request)
    {
        $id = $request->getJson()['id'];
        $name = $request->getJson()['name'];
        $email = $request->getJson()['email'];

        $this
            ->render
                ->renderArray($this->handlersResolver->getUpdateHandler()->update($id, $name, $email));
    }
}
