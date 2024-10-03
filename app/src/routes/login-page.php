<?php

// $router->mount('/', function() use ($router) {
//     $router->get('/', 'AuthController@showLoginPage');
// });

$router->get('/login', 'AuthController@showLoginPage');

$router->get('/', 'AuthController@showLoginPage');
