<?php

namespace System\App;

use App\Models\User;
use Bramus\Router\Router;
use System\Environment\Env;

class Application
{
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
    public function initRouter()
    {
        $router = new Router();
        $router->setNamespace('\App\Controllers');
        foreach (glob($this->getRoutesPath() . "*.php") as $filename) {
            include $filename;
        }
        $router->run();
    }

    public function init()
    {
        $this->initHelpers();
        $this->initConfigs();
        $this->initErrors();
        $this->initRouter();
    }
    private function getSystemPath()
    {
        return $this->getMainPath() . "src" . DIRECTORY_SEPARATOR;
    }
    private function getRoutesPath()
    {
        return $this->getMainPath() . "routes" . DIRECTORY_SEPARATOR;
    }
    private function getMainPath()
    {
        return $this->app_path . DIRECTORY_SEPARATOR;
    }
}
