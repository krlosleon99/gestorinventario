<?php

namespace Controllers;

use MVC\Router;

class DashboardController {
    public static function index(Router $router) {
        session_start();
        
        is_auth();

        $router->render('dashboard/index', [
            'titulo' => 'Dashboard',
            'nombre' => $_SESSION['nombre']
        ]);
    }
}