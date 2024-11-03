<?php

$router->post('/subjects/{subject}/addStudent', 'StudentController@create');
$router->post('/subjects/{subject}/editStudent', 'StudentController@edit');
$router->post('/subjects/{subject}/deleteStudent', 'StudentController@delete');