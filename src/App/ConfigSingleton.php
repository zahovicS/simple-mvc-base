<?php

namespace System\App;

use Exception;

class ConfigSingleton
{
    private static $instance = null;
    private static $app_path;
    private function __construct()
    {
        // Constructor privado para evitar creación externa
    }
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new ConfigSingleton();
        }
        return self::$instance;
    }
    public static function setPath($app_path)
    {

        self::$app_path = $app_path;
    }
    public static function get($key, $default = null)
    {
        if (empty(self::$app_path)) {
            throw new Exception('Error self::$app_path is not denifed', 1);
        }
        $content = self::getContentFile($key, $default);
        return $content;
    }
    private static function getContentFile($key, $default = null)
    {
        $stringArr = explode(".", $key);
        if (count($stringArr) == 0) {
            throw new Exception('$key is not defined', 1);
        }
        if (count($stringArr) > 2) {
            throw new Exception('Many arguments for configuration:' . $key, 1);
        }
        $content = self::importFile($stringArr[0]);
        if (empty($content)) {
            return $default;
        }
        if (isset($stringArr[1])) {
            return $content[$stringArr[1]];
        }
        return $content;
    }
    private static function getFullConfigPath()
    {
        return self::$app_path . DIRECTORY_SEPARATOR . "config" . DIRECTORY_SEPARATOR;
    }
    private static function importFile($path)
    {
        $path = self::getFullConfigPath() . $path . ".php";
        if (!file_exists($path)) {
            throw new Exception('File not exist in ' . $path, 1);
        }
        return include $path;
    }
}
