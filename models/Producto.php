<?php

namespace Model;

class Producto extends ActiveRecord {
    protected static $tabla = 'productos';
    protected static $columnasDB = ['id', 'nombre', 'precio_compra', 'precio_venta', 'descripcion', 'stock', 'categoria_id', 'marca_id', 'cantidad_peso' , 'unidad_peso_id', 'creado'];

    public $id;
    public $nombre;
    public $precio_compra;
    public $precio_venta;
    public $descripcion;
    public $stock;
    public $categoria_id;
    public $marca_id;
    public $cantidad_peso;
    public $unidad_peso_id;
    public $creado;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->precio_compra = $args['precio_compra'] ?? '';
        $this->precio_venta = $args['precio_venta'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->stock = $args['stock'] ?? '0';
        $this->categoria_id = $args['categoria_id'] ?? null;
        $this->marca_id = $args['marca_id'] ?? null;
        $this->cantidad_peso = $args['cantidad_peso'] ?? '';
        $this->unidad_peso_id = $args['unidad_peso_id'] ?? null;
        $this->creado = Date('Y-m-d');
    }

    public function validar() {
        if( !$this->nombre ) {
            self::$alertas['error'][] = 'El nombre es obligatorio';
        }
        if( !$this->precio_compra ) {
            self::$alertas['error'][] = 'El precio de la compra es obligatorio';
        }
        if( !$this->precio_venta ) {
            self::$alertas['error'][] = 'El precio de venta es obligatorio';
        }
        if( !$this->descripcion ) {
            self::$alertas['error'][] = 'La descripcion es obligatoria';
        }
        if( !$this->marca_id ) {
            self::$alertas['error'][] = 'La marca es obligatoria';
        }
        // if( !$this->stock ) {
        //     self::$alertas['error'][] = 'El stock es obligatorio';
        // }
        if( !$this->categoria_id ) {
            self::$alertas['error'][] = 'La categoría es obligatoria';
        }
        if( !$this->cantidad_peso ) {
            self::$alertas['error'][] = 'La cantidad del peso es obligatoria';
        }
        if( !$this->unidad_peso_id ) {
            self::$alertas['error'][] = 'La unidad del peso es obligatoria';
        }
        return self::$alertas;
    }
    
}
