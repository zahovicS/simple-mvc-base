<?php

namespace System\App;

use System\Base\IBase;

class Url implements IBase
{
    protected static $asset_path;
    protected static $app_path;

    public static function setPath($app_path)
    {
        self::$app_path = $app_path;
    }

    public static function setAssetPath($asset_path)
    {
        self::$asset_path = $asset_path;
    }
    public static function assets($asset_path = "")
    {
        return self::$app_path . self::$asset_path . self::resolveAssetPath($asset_path);
    }
    public static function base_url($url = "")
    {
        return self::$app_path . self::resolveFullPath($url);
    }
    private static function resolveAssetPath($asset_path)
    {
        if (substr($asset_path, 0, 1) == "/") {
            return $asset_path;
        }
        return "/" . $asset_path;
    }
    private static function resolveFullPath($asset_path)
    {
        if (substr($asset_path, 0, 1) == "/") {
            return substr($asset_path, 1);
        }
        return $asset_path;
    }
}
