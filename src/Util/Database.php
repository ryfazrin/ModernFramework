<?php
// filename: src/Util/Database.php

namespace ModernFramework\Util;

use Pixie\Connection;
use Pixie\QueryBuilder\QueryBuilderHandler;

class Database
{
    private static $connection;

    private static $pdo;

    public function __construct($host, $database, $driver = 'mysql', $username = 'root', $password = null, $port = 3306, $charset = 'utf8')
    {
        $config = [
            'driver' => $driver,
            'host' => $host,
            'database' => $database,
            'password' => $password,
            'charset' => $charset,
            'port' => $post,
        ];

        static::$connection = new Connection($driver, $config);

        static::$pdo = static::$connection->getPdoInstance();
    }

    public static function connect($host, $database, $driver = 'mysql', $username = 'root', $password = null, $port = 3306, $charset = 'utf8')
    {
        return new static($host, $database, $driver, $username, $password, $port, $charset);
    }

    public function execute(string $query, array $parameters)
    {
        $statement = static::$pdo->prepare($query);

        foreach ($parameters as $parameter => $value) {
            $statement->bindValue(sprintf(':s', $parameter), $value);
        }

        $statement->execute();
    }

    public function createQueryBuilder()
    {
        return new QueryBuilderHandler(static::$connection);
    }
}
