<?php

namespace Models;

use Opis\Database\Database;
use Opis\Database\Connection;

class DB
{

    private function __construct()
    {
    }
    private function __clone()
    {
    }
    private function __sleep()
    {
    }
    private function __wakeup()
    {
    }

    /**
     * singleton db connection
     *
     * @return Database
     */
    public static function getConnection(): Database
    {
        static $instance = false;
        if ($instance === false) {

            $dbName     = getenv('MYSQL_DATABASE');
            $dbUser     = getenv('MYSQL_USER');
            $dbPassword = getenv('MYSQL_PASSWORD');

            $connection = new Connection(
                'mysql:host=db;port=3306;dbname=' . $dbName,
                $dbUser,
                $dbPassword
            );
            $connection->options([
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ,
                \PDO::ATTR_STRINGIFY_FETCHES => false
            ]);
            $connection->persistent();


            $instance = new Database($connection);
        }

        return $instance;
    }
}
