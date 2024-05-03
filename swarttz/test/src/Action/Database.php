<?php

namespace Swarttz\Test\Action;

use PDO;
use PDOException;

class Database
{
    private $dsn;
    private $user;
    private $password;
    private $connection;
    public function __construct($dsn, $user, $password)
    {
        $this->dsn = $dsn;
        $this->user = $user;
        $this->password = $password;
        $this->connect();
    }

    public function connect()
    {
        try {
            $this->connection = new PDO($this->dsn, $this->user, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            return die('Not connect to database: ' . $e);
        }
    }
    public function getConnection()
    {
        return $this->connection;
    }
}
