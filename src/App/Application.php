<?php

namespace System\App;

/*
 ________  ________  ________  ___       ___  ________  ________  _________  ___  ________  ________
|\   __  \|\   __  \|\   __  \|\  \     |\  \|\   ____\|\   __  \|\___   ___\\  \|\   __  \|\   ___  \
\ \  \|\  \ \  \|\  \ \  \|\  \ \  \    \ \  \ \  \___|\ \  \|\  \|___ \  \_\ \  \ \  \|\  \ \  \\ \  \
 \ \   __  \ \   ____\ \   ____\ \  \    \ \  \ \  \    \ \   __  \   \ \  \ \ \  \ \  \\\  \ \  \\ \  \
  \ \  \ \  \ \  \___|\ \  \___|\ \  \____\ \  \ \  \____\ \  \ \  \   \ \  \ \ \  \ \  \\\  \ \  \\ \  \
   \ \__\ \__\ \__\    \ \__\    \ \_______\ \__\ \_______\ \__\ \__\   \ \__\ \ \__\ \_______\ \__\\ \__\
    \|__|\|__|\|__|     \|__|     \|_______|\|__|\|_______|\|__|\|__|    \|__|  \|__|\|_______|\|__| \|__|

*/

use Bramus\Router\Router;
use System\Environment\Env;
use System\Views\View;

/**
 * 
 * This class initializes the entire application, routes, helpers, configs, etc.
 * Maybe we should implement more things ... :p
 * 
 */

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
        Env::setPath($this->getMainPath());
        Config::setPath($this->getConfigPath());
        View::setPath($this->getViewsPath());
        Url::setPath($this->getUrl());
        Url::setAssetPath($this->getAssetsPath());
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
    private function getViewsPath()
    {
        return $this->getMainPath() . config("app.views_path", "app/Views");
    }
    private function getAssetsPath()
    {
        return config("app.assets_path", "public/assets");
    }
    private function getUrl()
    {
        return (isset($_SERVER["HTTPS"]) ? "https" : "http") . "://{$_SERVER["HTTP_HOST"]}{$_SERVER["REQUEST_URI"]}";
    }
    private function getConfigPath()
    {
        return $this->getMainPath() . "config" . DIRECTORY_SEPARATOR;
    }
    private function getMainPath()
    {
        return $this->app_path . DIRECTORY_SEPARATOR;
    }
}
