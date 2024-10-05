<?php

if (isAdmin()) {
    $router->get('/contact', 'ContactController@showContactAdminPage');
} 
else $router->get('/contact', 'ContactController@showContactPage');