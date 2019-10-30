<?php

namespace App\Service\Render;

final class Render
{
    /**
     * @param array $result
     */
    public function renderArray(array $result): void
    {
        header("Content-type: application/json");
        //var_dump($result);exit();
        echo json_encode($result);
    }
}