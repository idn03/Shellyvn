<?php

$router->mount('/subjects', function () use ($router) {
    $router->get('/', 'SubjectController@showSubjectsPage');

    $router->get('/{subject}','SubjectController@showSubjectDetailPage');

    $router->before('GET|POST', '/add', function () {
        isAdmin();
    });
    $router->post('/add','SubjectController@create');

    $router->before('GET|POST', '/{subject}/edit', function () {
        isAdmin();
    });
    $router->post('/{subject}/edit','SubjectController@edit');

    $router->before('GET|POST', '/{subject}/delete', function () {
        isAdmin();
    });
    $router->get('/{subject}/delete','SubjectController@showCudPage');
    $router->post('/{subject}/delete','SubjectController@delete');

    $router->post('/{subject}/markImportant','SubjectController@mark');
    $router->post('/{subject}/unmarkImportant','SubjectController@mark');
});

