<?php

namespace Controllers;

use Model\Accion;
use Model\Orden;
use Model\Producto;
use MVC\Router;

class ComprasController {
    public static function index(Router $router) {
        session_start();

        is_auth();

        $compras = Orden::all();
        $filtro = function($objeto) {
            return $objeto->accion_id == "1";
        };
        $compras = array_filter($compras, $filtro);

        $productos = Producto::all();

        $router->render('dashboard/compras/index', [
            'nombre' => $_SESSION['nombre'],
            'titulo' => 'Compras',
            'compras' => $compras,
            'productos' => $productos
        ]);
    }

    public static function registrar(Router $router) {
        session_start();

        is_auth();

        $productos = Producto::all();

        $alertas = [];

        $compra = new Orden();

        if( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
            $compra->sincronizar($_POST);
            $alertas = $compra->validar();
            
            if( empty($alertas) ) {
                $compra->numero_orden = md5( uniqid( rand(), true ) );

                $accion = Accion::where('nombre', 'compra');

                $url = str_contains($_SERVER['REQUEST_URI'], '/compras/registrar');

                if( $url ) {
                    $producto = Producto::find($compra->producto_id);

                    $producto->stock = $producto->stock + $compra->cantidad;

                    $compra->accion_id = $accion->id;

                    $producto->guardar();

                    $resultado = $compra->guardar();

                    if( $resultado ) {
                        Header('Location: /dashboard/compras');
                    }
                }
            }
        }

        $alertas = Orden::getAlertas();

        $router->render('dashboard/compras/registrar', [
            'nombre' => $_SESSION['nombre'],
            'titulo' => 'Registrar Compra',
            'productos' => $productos,
            'compra' => $compra,
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

        $compra = Orden::find($id);

        if( !$compra ) {
            header('Location: /dashboard/compras');
        }

        $productos = Producto::all();

        $alertas = [];

        $router->render('dashboard/compras/visualizar', [
            'nombre' => $_SESSION['nombre'],
            'titulo' => 'Visualizar Compra',
            'productos' => $productos,
            'compra' => $compra,
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

        $compra = Orden::find($id);

        if( !$compra ) {
            header('Location: /dashboard/compras');
        }

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $resultado = $compra->eliminar();

            if( $resultado ) {
                header('Location: /dashboard/compras');
            }
        }

    }

}