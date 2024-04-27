<?php

namespace System\Environment;

use Dotenv\Dotenv;
use System\Base\IBase;

class Env implements IBase
{
    protected static $load = false;
    protected static $app_path;

    public static function setPath($app_path)
    {
        self::$app_path = $app_path;
    }
    public static function loadEnv()
    {
        if (static::$load === false) {
            // dd(self::$app_path);
            $dotenv = Dotenv::createImmutable(self::$app_path);
            $dotenv->load();
            static::$load = true;
        }
    }
    public static function get($key, $default = null)
    {
        self::loadEnv();
        return $_ENV[$key] ?? $default;
    }
}
