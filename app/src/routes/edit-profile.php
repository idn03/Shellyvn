<?php

$router->mount('/profile', function () use ($router) {
    $router->get('/', 'UserController@showProfilePage');

    $router->post('/edit-info', 'UserController@editInfo');
    $router->post('/change-password', 'UserController@changePassword');

    $router->post('/addArchivement','UserController@addArchivement');
    $router->post('/deleteArchive','UserController@deleteArchivement');
});