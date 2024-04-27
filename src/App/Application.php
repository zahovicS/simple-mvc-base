<?php

namespace System\App;

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
    public function initConfigs(){
        ConfigSingleton::setPath($this->app_path);
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
    }
    private function getSystemPath()
    {
        return $this->app_path . DIRECTORY_SEPARATOR . "src" . DIRECTORY_SEPARATOR;
    }
}
