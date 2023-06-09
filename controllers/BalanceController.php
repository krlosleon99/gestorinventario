<?php 

namespace Controllers;

use Model\Accion;
use Model\Orden;
use Model\Producto;
use Model\UnidadPeso;
use MVC\Router;

class BalanceController {
    public static function index(Router $router) {
        session_start();

        is_auth();

        $ordenes = Orden::all();
        $productos = Producto::all();
        $unidades = UnidadPeso::all();
        $acciones = Accion::all();

        $router->render('dashboard/balance/index', [
            'nombre' => $_SESSION['nombre'],
            'titulo' => 'Balance de Compras y Ventas',
            'ordenes' => $ordenes,
            'productos' => $productos,
            'unidades' => $unidades,
            'acciones' => $acciones

        ]);
    }
}