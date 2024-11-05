<?php

$router->mount('/subjects', function () use ($router) {
    // Show Page
    if (!isset($_GET['search'])) {
        $router->get('/', 'SubjectController@showSubjectsPage');
    }
    else {
        $router->get('/', 'SubjectController@search');
    }

    // Create
    $router->before('GET|POST', '/add', function () {
        isAdmin();
    });
    $router->get('/add','SubjectController@showUpdateSubjectPage');
    $router->post('/add','SubjectController@create');

    // Show Detail Page
    $router->get('/{subject}','SubjectController@showSubjectDetailPage');

    // Edit
    $router->before('GET|POST', '/{subject}/edit', function () {
        isAdmin();
    });
    $router->get('/{subject}/edit','SubjectController@showUpdateSubjectPage');
    $router->post('/{subject}/edit','SubjectController@edit');

    // Delete
    $router->before('GET|POST', '/{subject}/delete', function () {
        isAdmin();
    });
    $router->post('/{subject}/delete','SubjectController@delete');

    $router->post('/{subject}/markImportant','SubjectController@mark');
    $router->post('/{subject}/unmarkImportant','SubjectController@mark');
});

