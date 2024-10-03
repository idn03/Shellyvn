<?php
require_once __DIR__ . '/../../vendor/autoload.php';

use Bramus\Router\Router;
    $router = new Router();
    $router->setNamespace('\App\controllers');

    // Login Page Router
    require_once __DIR__ . '/../src/routes/login-page.php';

    // Home Page Router
    require_once __DIR__ . '/../src/routes/home.php';

    // Contact Page Router
    require_once __DIR__ . '/../src/routes/contact.php';

    $router->get('/logout', 'AuthController@logout');
    
    $router->run();