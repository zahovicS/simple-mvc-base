<?php

namespace System\App;

use DI\Container;

class Application
{
    public $contianer;
    public $app_path;
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

    public function getContainer()
    {
        if ($this->contianer === null) {
            $builder = new Container();
            $this->contianer = $builder;
        }
        return $this->contianer;
    }

    public function initContainer()
    {
        $container = $this->getContainer();
        // $container->set("config" , $this->getConfig());
    }

    public function init()
    {
        $this->initHelpers();
        $this->initContainer();
        config("app");
    }
    public function getConfig($key){

    }
    private function getSystemPath()
    {
        return $this->app_path . DIRECTORY_SEPARATOR . "src" . DIRECTORY_SEPARATOR;
    }
}