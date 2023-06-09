<?php 

namespace Model;

class UnidadPeso extends ActiveRecord {
    protected static $tabla = 'unidad_peso';
    protected static $columnasDB = ['id', 'nombre'];

    public $id;
    public $nombre;
}