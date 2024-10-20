<?php

$router->get('/profile', 'UserController@showProfilePage');

$router->post('/profile/edit-info', 'UserController@editInfo');
$router->post('/profile/change-password', 'UserController@changePassword');