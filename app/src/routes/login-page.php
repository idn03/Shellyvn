<?php

$router->mount('/login', function() use ($router) {
    $router->get('/', 'AuthController@showLoginPage');
    $router->post('/','AuthController@login');
});
