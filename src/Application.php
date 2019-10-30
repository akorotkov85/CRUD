<?php

namespace App;

use App\Controller\CRUDController;
use App\Handler\HandlerResolver;
use App\Service\Render\Render;
use App\Service\Request\Request;

final class Application
{
    /**
     * @param Request $request
     */
    final public function run(Request $request): void
    {
        switch ($request->getServer()['REQUEST_METHOD']) {
            case 'GET':
                $this->getCRUDController()->read();
                break;

            case 'POST':
                $this->getCRUDController()->create($request);
                break;

            case 'UPDATE':
                $this->getCRUDController()->update($request);
                break;

            case 'DELETE':
                $this->getCRUDController()->delete($request);
                break;
        }
    }

    /**
     * @return CRUDController
     */
    private function getCRUDController(): CRUDController
    {
        return
            new CRUDController(
                new HandlerResolver(),
                new Render()
            )
        ;
    }
}
