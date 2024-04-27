<?php

namespace System\App;

use Exception;
use System\Base\IBase;

class Config implements IBase
{
    protected static $app_path;

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
    private static function importFile($path)
    {
        $path = self::$app_path . $path . ".php";
        if (!file_exists($path)) {
            dd($path);
            throw new Exception('File not exist in ' . $path, 1);
        }
        return include $path;
    }
}
