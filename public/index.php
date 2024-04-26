<?php
use System\App\Application;

require_once dirname(__DIR__) . "/vendor/autoload.php";

$app = new Application(dirname(__DIR__));
$container->set("System\App\Application", $app);
$app->init();