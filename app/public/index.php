<?php
require_once __DIR__ . '/../../vendor/autoload.php';

use Bramus\Router\Router;
    $router = new Router();
    $router->setNamespace('\App\controllers');

    // Login Page Router
    require_once __DIR__ . '/../src/routes/login-page.php';

    // Home Page Router
    require_once __DIR__ . '/../src/routes/home.php';
    if (isLogged()) {
        // Contact Page Router
        require_once __DIR__ . '/../src/routes/contact.php';

        // Subjects Page Router
        require_once __DIR__ . '/../src/routes/subjects.php';

        $router->get('/logout', 'AuthController@logout');
    }
    
    $router->run();