<?php 

require_once __DIR__ . '/../includes/app.php';

use Controllers\AuthController;
use Controllers\BalanceController;
use Controllers\CategoriasController;
use Controllers\ComprasController;
use Controllers\DashboardController;
use Controllers\ProductosController;
use Controllers\VentasController;
use MVC\Router;

$router = new Router();

// Login
$router->get('/login', [AuthController::class, 'login']);
$router->post('/login', [AuthController::class, 'login']);
$router->post('/logout', [AuthController::class, 'logout']);

// Crear Cuenta
$router->get('/registro', [AuthController::class, 'registro']);
$router->post('/registro', [AuthController::class, 'registro']);

// Formulario de olvide mi password
$router->get('/olvide', [AuthController::class, 'olvide']);
$router->post('/olvide', [AuthController::class, 'olvide']);

// Colocar el nuevo password
$router->get('/reestablecer', [AuthController::class, 'reestablecer']);
$router->post('/reestablecer', [AuthController::class, 'reestablecer']);

// Confirmación de Cuenta
$router->get('/mensaje', [AuthController::class, 'mensaje']);
$router->get('/confirmar-cuenta', [AuthController::class, 'confirmar']);


// Parte privada, Dashboard
$router->get('/dashboard/home', [DashboardController::class, 'index']);

// CRUD de Categorías
$router->get('/dashboard/categorias', [CategoriasController::class, 'index']);
$router->get('/dashboard/categorias/crear', [CategoriasController::class, 'crear']);
$router->post('/dashboard/categorias/crear', [CategoriasController::class, 'crear']);
$router->get('/dashboard/categorias/editar', [CategoriasController::class, 'editar']);
$router->post('/dashboard/categorias/editar', [CategoriasController::class, 'editar']);
$router->post('/dashboard/categorias/eliminar', [CategoriasController::class, 'eliminar']);

// CRUD de Productos
$router->get('/dashboard/productos', [ProductosController::class, 'index']);
$router->get('/dashboard/productos/crear', [ProductosController::class, 'crear']);
$router->post('/dashboard/productos/crear', [ProductosController::class, 'crear']);
$router->get('/dashboard/productos/editar', [ProductosController::class, 'editar']);
$router->post('/dashboard/productos/editar', [ProductosController::class, 'editar']);
$router->post('/dashboard/productos/eliminar', [ProductosController::class, 'eliminar']);

// CRUD de Compras
$router->get('/dashboard/compras', [ComprasController::class, 'index']);
$router->get('/dashboard/compras/registrar', [ComprasController::class, 'registrar']);
$router->post('/dashboard/compras/registrar', [ComprasController::class, 'registrar']);
$router->get('/dashboard/compras/visualizar', [ComprasController::class, 'visualizar']);
$router->post('/dashboard/compras/eliminar', [ComprasController::class, 'eliminar']);

// CRUD de ventas
$router->get('/dashboard/ventas', [VentasController::class, 'index']);
$router->get('/dashboard/ventas/registrar', [VentasController::class, 'registrar']);
$router->post('/dashboard/ventas/registrar', [VentasController::class, 'registrar']);
$router->get('/dashboard/ventas/visualizar', [VentasController::class, 'visualizar']);
$router->post('/dashboard/ventas/eliminar', [VentasController::class, 'eliminar']);


$router->get('/dashboard/balance', [BalanceController::class, 'index']);

$router->comprobarRutas();