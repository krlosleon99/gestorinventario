<?php

namespace Model;

class Accion extends ActiveRecord {
    protected static $tabla = 'acciones';
    protected static $columnasDB = ['id', 'nombre'];

    public $id;
    public $nombre;
}