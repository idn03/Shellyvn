<?php

if (isAdmin()) {
    $router->get('/contact', 'ContactController@showContactAdminPage');
} 
else {
    $router->mount('/contact', function() use ($router) {
        $router->get('/', 'ContactController@showContactPage');
        $router->post('/', 'ContactController@create');
    });
}