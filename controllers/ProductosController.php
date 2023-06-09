<?php

namespace Controllers;

use Model\Categoria;
use Model\Marca;
use Model\Producto;
use Model\UnidadPeso;
use MVC\Router;

class ProductosController {
    public static function index(Router $router) {
        session_start();

        is_auth();

        $productos = Producto::all();

        $categorias = Categoria::all();

        $router->render('dashboard/productos/index', [
            'titulo' => 'Productos',
            'productos' => $productos,
            'categorias' => $categorias,
            'nombre' => $_SESSION['nombre']
        ]);
    }

    public static function crear(Router $router) {
        session_start();

        is_auth();

        $alertas = [];

        $categorias = Categoria::all();
        $marcas = Marca::all();
        $unidadPesos = UnidadPeso::all();

        $producto = new Producto;

        if( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
            $producto->sincronizar($_POST);
            $alertas = $producto->validar();

            if( empty($alertas) ) {
                // debuguear($producto);
                $resultado = $producto->guardar();

                if( $resultado ) {
                    Header('Location: /dashboard/productos');
                }
            }
        }

        $alertas = Producto::getAlertas();

        $router->render('dashboard/productos/crear', [
            'titulo' => 'Crear Producto',
            'alertas' => $alertas,
            'producto' => $producto,
            'categorias' => $categorias,
            'marcas' => $marcas,
            'unidadPesos' => $unidadPesos,
            'nombre' => $_SESSION['nombre']
        ]);
    }

    public static function editar(Router $router) {
        session_start();

        is_auth();

        $id = s($_GET['id']);
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if(!$id) {
            header('Location: /dashboard/productos');
        }

        $producto = Producto::find($id);

        if( !$producto ) {
            header('Location: /dashboard/productos');
        }
        
        $categorias = Categoria::all();
        $marcas = Marca::all();
        $unidadPesos = UnidadPeso::all();

        $alertas = [];

        if( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
            $producto->sincronizar($_POST);

            $alertas = $producto->validar();

            if( empty($alertas) ) {
                $resultado = $producto->guardar();

                if( $resultado ) {
                    Header('Location: /dashboard/productos');
                }
            }
        }       

        $router->render('dashboard/productos/editar', [
            'titulo' => 'Crear Producto',
            'alertas' => $alertas,
            'producto' => $producto,
            'categorias' => $categorias,
            'marcas' => $marcas,
            'unidadPesos' => $unidadPesos,
            'nombre' => $_SESSION['nombre']
        ]);
    }

    public static function eliminar() {
        session_start();

        is_auth();

        $id = s($_POST['id']);
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if(!$id) {
            header('Location: /dashboard/productos');
        }

        $producto = Producto::find($id);

        if( !$producto ) {
            header('Location: /dashboard/productos');
        }

        if( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
            $resultado = $producto->eliminar();

            if( $resultado ) {
                header('Location: /dashboard/productos');
            }
        }
    }
}