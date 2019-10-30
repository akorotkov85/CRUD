<?php

namespace App\Service\DataBaseAdapter\Adapter;

use PDO;

final class MySqlAdapter
{
    public function getConnection(): PDO
    {
        $pdo = new PDO('mysql:host=localhost;dbname=new2','root','root');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $pdo;
    }
}
