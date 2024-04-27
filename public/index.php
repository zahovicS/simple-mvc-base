<?php
use DI\Container;
use System\App\Application;
use System\App\Config;

require_once dirname(__DIR__) . "/vendor/autoload.php";

$app = new Application(dirname(__DIR__));
$app->init();