<?php

namespace Swarttz\Test;

//define base path to use vlucas env
define('BASE_PATH', realpath(__DIR__ . '../../'));

use Dotenv\Dotenv as Dotenv;
use Swarttz\Test\Action\Database;

class Base
{
    public function run()
    {
        $dotenv = Dotenv::createUnsafeImmutable(BASE_PATH);
        $dotenv->safeLoad();

        $host = getenv('DB_HOST');
        $name = getenv('DB_NAME');
        $port = getenv('DB_PORT');
        $user = getenv('DB_USER');
        $password = getenv('DB_PASSWORD');


        $db = new Database("mysql:host=$host;port=$port;dbname=$name", $user, $password);
        return $db;
    }
}
