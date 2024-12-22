<?php

namespace Model;

class READTable extends ActiveRecord
{
    public static $tabla = 'mesas'; 
   
    // Columnas de la tabla
    public static $columnasDB = ['id', 'descripcion', 'imagen'];

    // Propiedades
    public $id;
    public $descripcion;
    public $imagen;

    // Constructor
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->descripcion = $args['descripcion'] ?? null;
        $this->imagen = $args['imagen'] ?? null;
    }
}