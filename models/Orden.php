<?php

namespace Model;

class Orden extends ActiveRecord {
    protected static $tabla = 'ordenes';
    protected static $columnasDB = ['id', 'nombre', 'numero_orden', 'accion_id', 'producto_id', 'cantidad', 'fecha_orden'];

    public $id;
    public $nombre;
    public $numero_orden;
    public $accion_id;
    public $producto_id;
    public $cantidad;
    public $fecha_orden;
    
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->numero_orden = $args['numero_orden'] ?? '';
        $this->accion_id = $args['accion_id'] ?? '';
        $this->producto_id = $args['producto_id'] ?? '';
        $this->cantidad = $args['cantidad'] ?? '';
        $this->fecha_orden = Date('Y-m-d');
    }

    public function validar() {
        if( !$this->nombre ) {
            self::$alertas['error'][] = 'El nombre es obligatorio';
        }
        if( !$this->producto_id ) {
            self::$alertas['error'][] = 'El producto es obligatorio';
        }
        if( !$this->cantidad ) {
            self::$alertas['error'][] = 'La cantidad es obligatoria';
        }
        return self::$alertas;
    }
}