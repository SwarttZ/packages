<?php

namespace Swarttz\Test\Model;

use PDO;
use PDOException;
use Swarttz\Test\Base;

class UserModel implements InterfaceUser
{
    private $connection;
    public function __construct()
    {
        $base = new Base();
        $con = $base->run()->getConnection();
        $this->connection = $con;
    }
    public function getAll(): array
    {
        try {
            $query = $this->connection->prepare('select * from users');
            $query->execute();

            $fetch = $query->fetchAll(PDO::FETCH_ASSOC);
            return $fetch;
        } catch (PDOException $e) {
            return 'Error get all users: ' . $e;
        }
    }
    public function findById($id): array
    {
        try {
            $query = $this->connection->prepare('select * from users where id = :id');
            $query->bindParam(':id', $id);
            $query->execute();
            $fetch = $query->fetchAll(PDO::FETCH_ASSOC);

            return $fetch;
        } catch (PDOException $e) {
            return 'Error find by id: ' . $e;
        }
    }
}
