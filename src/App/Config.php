<?php

namespace System\App;

use Src\App\Exceptions\ConfigFileNotExistsException;
use Src\App\Exceptions\ConfigNameNotExistsException;
use Src\App\Exceptions\ConfigPathNotDefinedException;
use Src\App\Exceptions\ManyArgumentsForConfigException;
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
            throw new ConfigPathNotDefinedException('Error self::$app_path is not denifed');
        }
        $content = self::getContentFile($key, $default);
        return $content;
    }
    private static function getContentFile($key, $default = null)
    {
        $stringArr = explode(".", $key);
        if (count($stringArr) == 0) {
            throw new ConfigNameNotExistsException("Config: {$key} not exists", 1);
        }
        if (count($stringArr) > 2) {
            throw new ManyArgumentsForConfigException("Many arguments for configuration: {$key}, only 2 are accepted.", 1);
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
            throw new ConfigFileNotExistsException('File not exist in ' . $path, 1);
        }
        return include $path;
    }
}
