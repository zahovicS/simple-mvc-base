<?php

namespace System\Environment;

use Dotenv\Dotenv;

class Env
{
    protected static $load = false;
    private static $app_path;
    public static function loadEnv()
    {
        if (static::$load === false) {
            $dotenv = Dotenv::createImmutable(self::$app_path);
            $dotenv->load();
            static::$load = true;
        }
    }
    public static function setPath($app_path)
    {
        self::$app_path = $app_path;
    }
    public static function get($key, $default = null)
    {
        self::loadEnv();
        return $_ENV[$key] ?? $default;
    }
}
