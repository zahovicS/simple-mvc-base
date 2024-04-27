<?php

// configurable variables for the database
return [
    'default' => [
        // 'url' => env('DATABASE_URL'), //future ...
        'host' => env('DB_HOST', '127.0.0.1'),
        'port' => env('DB_PORT', '3306'),
        'database' => env('DB_DATABASE', 'db'),
        'username' => env('DB_USERNAME', 'user'),
        'password' => env('DB_PASSWORD', ''),
        // 'unix_socket' => env('DB_SOCKET', ''), //future ...
        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_general_ci',
        // 'prefix' => '', //future ...
        // 'prefix_indexes' => true, //future ...
        // 'strict' => true, //future ...
        // 'engine' => null, //future ...
    ],
];
