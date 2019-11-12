<?php

namespace App\Core;

use App\Core\PDOConnection;
class UserRepository
{
    private $connection;

    public function __construct(PDOConnection $databaseConnection)
    {
        $this->connection = $databaseConnection->getConnection();
    }

    public function find(string $id)
    {
        var_dump($id);
        die;
    }
}