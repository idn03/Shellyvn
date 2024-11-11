<?php

$router->mount('/employees', function () use ($router) {
    $router->before('GET|POST', '/', function () {
        isAdmin();
    });
    $router->get('/','EmployeesController@showHRPage');

    $router->post('/add', 'UserController@create');

    $router->before('POST', '/{username}/delete', function () {
        isAdmin();
    });
    $router->post('/{username}/delete', 'UserController@delete');

    $router->before('GET|POST', '/{username}', function () {
        isAdmin();
    });
    $router->get('/{username}','EmployeesController@showUpdateProfilePage');
    $router->post('/{username}', 'EmployeesController@edit');
});