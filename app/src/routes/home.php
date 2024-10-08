<?php
if (isLogged()) {
    $router->get('/', 'HomeController@showHomePage');
}
else $router->get('/', 'AuthController@showLoginPage');

$router->get('/home', 'HomeController@showHomePage');