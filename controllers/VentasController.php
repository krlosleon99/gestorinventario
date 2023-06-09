<?php 

namespace Controllers;

use Model\Accion;
use MVC\Router;
use Model\Orden;
use Model\Producto;

class VentasController {
    public static function index(Router $router) {
        session_start();

        is_auth();

        $ventas = Orden::all();
        $filtro = function($objeto) {
            return $objeto->accion_id == "2";
        };
        $ventas = array_filter($ventas, $filtro);

        $productos = Producto::all();

        $router->render('dashboard/ventas/index', [
            'nombre' => $_SESSION['nombre'],
            'titulo' => 'Ventas',
            'ventas' => $ventas,
            'productos' => $productos
        ]);
    }

    public static function registrar(Router $router) {
        session_start();

        is_auth();

        $productos = Producto::all();

        $alertas = [];

        $venta = new Orden();

        if( $_SERVER['REQUEST_METHOD'] === 'POST' ) {

            $venta->sincronizar($_POST);

            // debuguear($venta);

            $alertas = $venta->validar();
            
            if( empty($alertas) ) {
                $venta->numero_orden = md5( uniqid( rand(), true ) );

                $accion = Accion::where('nombre', 'venta');

                $url = str_contains($_SERVER['REQUEST_URI'], '/ventas/registrar');

                if( $url ) {
                    $producto = Producto::find($venta->producto_id);

                    if( $producto->stock === '0' || $venta->cantidad > $producto->stock ) {

                        $venta = Orden::setAlerta('error', 'No hay existencias o no hay suficiente stock');
                        $alertas = Orden::getAlertas();

                    } else {
                        $producto->stock = $producto->stock - $venta->cantidad;

                        $venta->accion_id = $accion->id;

                        $producto->guardar();

                        $resultado = $venta->guardar();

                        if( $resultado ) {
                            Header('Location: /dashboard/ventas');
                        }
                    }
                }
            }
        }

        $alertas = Orden::getAlertas();

        $router->render('dashboard/ventas/registrar', [
            'nombre' => $_SESSION['nombre'],
            'titulo' => 'Registrar Venta',
            'productos' => $productos,
            'venta' => $venta,
            'alertas' => $alertas
        ]);
    }

    public static function visualizar(Router $router) {
        session_start();

        is_auth();

        $id = s($_GET['id']);
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if(!$id) {
            header('Location: /dashboard/compras');
        }

        $venta = Orden::find($id);

        if( !$venta ) {
            header('Location: /dashboard/ventas');
        }

        $productos = Producto::all();

        $alertas = [];

        $router->render('dashboard/ventas/visualizar', [
            'nombre' => $_SESSION['nombre'],
            'titulo' => 'Visualizar Venta',
            'productos' => $productos,
            'venta' => $venta,
            'alertas' => $alertas
        ]);
    }

    public static function eliminar() {
        session_start();

        is_auth();

        $id = $_POST['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if(!$id) {
            header('Location: /dashboard/compras');
        }

        $venta = Orden::find($id);

        if( !$venta ) {
            header('Location: /dashboard/ventas');
        }

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $resultado = $venta->eliminar();

            if( $resultado ) {
                header('Location: /dashboard/ventas');
            }
        }

    }
}