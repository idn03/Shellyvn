<?php

$router->mount('/employees', function () use ($router) {
    $router->get('/','UserController@showHRPage');
    $router->get('/{username}','UserController@showProfilePage');
});