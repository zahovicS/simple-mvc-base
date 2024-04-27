<?php
namespace App\Models;

use System\Database\DB;

class User extends DB
{
    public static function getUserByUsername($username)
    {
        $data = self::statement("SELECT * FROM users WHERE username = :username", [
            "username" => $username
        ])->one();
        return $data;
    }
    public static function getAllUsers()
    {
        $data = self::statement("SELECT * FROM users")->all();
        return $data;
    }

    public static function getBlogs()
    {
        $data = self::connection("dummy")->statement("SELECT * FROM posts")->all();
        return $data;
    }
}
