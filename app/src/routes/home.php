<?php
if (isset($_SESSION['user']['taikhoan'])) {
    $router->get('/', 'HomeController@showHomePage');
}
else $router->get('/', 'AuthController@showLoginPage');

$router->get('/home', 'HomeController@showHomePage');