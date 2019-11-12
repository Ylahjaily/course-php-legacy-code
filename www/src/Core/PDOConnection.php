<?php


namespace App\Core;


class PDOConnection
{
    private $connection;

    public function __construct()
    {
        $this->connection = new \PDO(DBDRIVER.':host='.DBHOST.';dbname'.DBNAME, DBUSER, DBPWD);
    }

    public function getConnection()
    {
        return $this->connection;
    }
}