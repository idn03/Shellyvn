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

        // Profile Page Router
        require_once __DIR__ . '/../src/routes/edit-profile.php';

        // Note Operations Router
        require_once __DIR__ . '/../src/routes/note.php';

        // Student Operations Router
        require_once __DIR__ . '/../src/routes/student.php';

        // Human Resource Router
        require_once __DIR__ . '/../src/routes/employees.php';

        $router->get('/logout', 'AuthController@logout');
    }
    
    $router->run();