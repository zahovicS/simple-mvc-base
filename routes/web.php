<?php

/**
 * 
 * @var \Bramus\Router\Router $router
 * 
 */

$router->get('/', "HomeController@index");
$router->get('/ventas', "HomeController@ventas");
$router->get('/users', "HomeController@users");
$router->get('/user/{username}', "HomeController@user");
$router->get('/dummy', "HomeController@dummy");
