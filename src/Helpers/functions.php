<?php

use DI\Container;
use System\App\ConfigSingleton;
use System\Environment\Env;

//helpers for DotEnv
if (!function_exists('env')) {
    function env($key, $default = null)
    {
        return Env::get($key, $default);
    }
}

//helpers for config path
if (!function_exists('config')) {
    function config($key, $default = null)
    {
        return ConfigSingleton::get($key, $default);
    }
}

// helpers for debug and die
if (!function_exists('dd')) {
    function dd(...$vars)
    {
        foreach ($vars as $var) {
            dump($var);
        }
        die;
    }
}

// print the debug
if (!function_exists('dump')) {
    function dump(...$vars)
    {
        foreach ($vars as $var) {
            echo "<pre style='background-color: black; color:white;padding:15px'>";
            var_dump($var);
            echo "</pre>";
        }
    }
}