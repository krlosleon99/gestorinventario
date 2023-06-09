<?php 

namespace Controllers;

use MVC\Router;
use Model\Categoria;

class CategoriasController {
    public static function index(Router $router) {
        session_start();

        is_auth();

        $categorias = Categoria::all();

        $router->render('dashboard/categorias/index', [
            'titulo' => 'Categorías',
            'nombre' => $_SESSION['nombre'],
            'categorias' => $categorias
        ]);
    }

    public static function crear(Router $router) {
        session_start();

        is_auth();

        $alertas = [];

        if( $_SERVER['REQUEST_METHOD'] === 'POST' ) {

            $categoria = new Categoria($_POST);

            $alertas = $categoria->validar();

            if( empty($alertas) ) {
                $categoriaDB = Categoria::where('nombre', $categoria->nombre);
                
                if( $categoriaDB->nombre === $categoria->nombre || strtolower($categoriaDB->nombre) === strtolower($categoria->nombre) ) {
                    Categoria::setAlerta('error','Ya existe la categoria');
                    Categoria::getAlertas();
                } else {
                    
                    $resultado = $categoria->guardar();

                    if( $resultado ) {
                        Header('Location: /dashboard/categorias');
                    }
                }
            }
        }

        $alertas = Categoria::getAlertas();

        $router->render('dashboard/categorias/crear', [
            'titulo' => 'Crear Categoría',
            'nombre' => $_SESSION['nombre'],
            'alertas' => $alertas
        ]);
    }

    public static function editar(Router $router) {
        session_start();

        is_auth();

        $id = s($_GET['id']);
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if( !$id ) {
            header('Location: /dashboard/categorias');
        }
        
        $categoria = Categoria::find($id);
        
        if( !$categoria ) {
            header('Location: /dashboard/categorias');
        }

        $alertas = [];

        if( $_SERVER['REQUEST_METHOD'] === 'POST' ) {

            $categoria->sincronizar($_POST);

            $alertas = $categoria->validar();
            
            if( empty($alertas) ) {
                $categoriaDB = Categoria::where('nombre', $categoria->nombre);
                
                if( strtolower($categoriaDB->nombre) === strtolower($categoria->nombre) && $categoriaDB->id !== $categoria->id ) {
                    Categoria::setAlerta('error','Ya existe la categoria');
                    Categoria::getAlertas();
                } else {
                    $resultado = $categoria->guardar();

                    if( $resultado ) {
                        Header('Location: /dashboard/categorias');
                    }
                }
            }

        }

        $alertas = Categoria::getAlertas();

        $router->render('dashboard/categorias/editar', [
            'titulo' => 'Editar Categoria',
            'alertas' => $alertas,
            'categoria' => $categoria
        ]);

    }

    public static function eliminar(Router $router) {

        if( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
            $id = s($_POST['id']);
            $id = filter_var($id, FILTER_VALIDATE_INT);

            if( !$id ) {
                header('Location: /dashboard/categorias');
            }
            
            $categoria = Categoria::find($id);
            
            if( !$categoria ) {
                header('Location: /dashboard/categorias');
            } else {
                $resultado = $categoria->eliminar();

                if( $resultado ) {
                    header('Location: /dashboard/categorias');
                }
            }
        }

    }
}