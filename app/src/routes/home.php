<?php
// if (isset($_SESSION['username'])) {
//     $router->get('/', 'HomeController@index');
    
//     if (isAdmin())
//         $router->get('/admin', 'AdminController@index');
// }
// else $router->get('/', 'AuthController@showLoginPage');

$router->get('/home', 'HomeController@showHomePage');