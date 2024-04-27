<?php

namespace System\Database;

use PDOException;

class DB
{
    // protected static $table = null;
    /**
     * 
     * Name of the connection to consider.
     * @var string
     * 
     */
    private static $connection = "default";
    /**
     * 
     * Result of a prepared PDO statement.
     * Used to store the result of the last query. 
     * @var \PDOStatement
     * 
     */
    private static $result;
    private static $errors;

    // public static function table($table)
    // {
    //     self::$table = $table;
    //     return new static();
    // }
    private static function connection($connection)
    {
        self::$connection = $connection;
        return new static();
    }
    public static function statement($sql, $params = [])
    {
        $connection = (new Connection)->getConnection(self::$connection);
        $stmt = $connection->prepare($sql);
        $stmt->execute($params);
        self::$result = $stmt;
        return new static();
    }
    public function one()
    {
        return self::$result->fetch() ?? [];
    }
    public function all()
    {
        return self::$result->fetchAll() ?? [];
    }
}
