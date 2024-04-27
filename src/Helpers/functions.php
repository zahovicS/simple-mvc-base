<?php

use System\App\Config;
use System\App\Url;
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
        return Config::get($key, $default);
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
// method custom
if (!function_exists('string_starts_with')) {
    function string_starts_with(string $haystack, string $needle): bool
    {
        return 0 === strncmp($haystack, $needle, \strlen($needle));
    }
}

// assets
if (!function_exists('assets')) {
    function assets(string $asset_path = ""): string
    {
        return Url::assets($asset_path);
    }
}
