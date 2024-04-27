<?php

namespace System\Database;

use PDO;
use PDOException;

class Connection
{
    private $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES   => false,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ];

    public function getConnection($connection = "default")
    {
        $config = config("database");
        $database = $config[$connection];
        $options = $this->options;
        $connection = new PDO("mysql:host=" . $database["host"] . ";dbname=" . $database["database"] . ";port=" .  $database["port"] . ";charset=" .  $database["charset"], $database["username"], $database["password"], $options);
        $connection->exec("SET CHARACTER SET " .  $database["charset"]);
        $connection->exec("SET NAMES " . $database["charset"] . " COLLATE " . $database["collation"]);
        return $connection;
    }
}
