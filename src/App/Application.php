<?php

namespace System\App;

use App\Models\User;
use System\Environment\Env;

class Application
{
    private $singletons = [];
    private $app_path;
    function __construct($app_path)
    {
        $this->app_path = $app_path;
    }

    public function initHelpers()
    {
        foreach (glob($this->getSystemPath() . "Helpers/*.php") as $filename) {
            include_once $filename;
        }
    }
    public function initConfigs()
    {
        ConfigSingleton::setPath($this->app_path);
        Env::setPath($this->app_path);
    }
    public function initErrors()
    {
        if (env("APP_DEBUG", true)) {
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);
        }
    }
    public function singleton($key, $value)
    {
        if (!isset($this->singletons[$key])) {
            $this->singletons[$key] = $value;
        }
        return $this->singletons[$key];
    }

    public function get($key)
    {
        return $this->singletons[$key] ?? null;
    }

    public function init()
    {
        $this->initHelpers();
        $this->initConfigs();
        $this->initErrors();
        User::getAllUsers();
    }
    private function getSystemPath()
    {
        return $this->app_path . DIRECTORY_SEPARATOR . "src" . DIRECTORY_SEPARATOR;
    }
}
