<?php

namespace Model;

class ReadMenu extends ActiveRecord
{
    public static $tabla = 'menu'; // Nombre de la tabla en la base de datos
    // Columnas de la tabla
    public static $columnasDB = ['id', 'nombre', 'imagen', 'descripcion', 'precio', 'tipo'];

    // Propiedades
    public $id;
    public $nombre;
    public $imagen;
    public $descripcion;
    public $precio;
    public $tipo;

    // Constructor
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? null;
        $this->imagen = $args['imagen'] ?? null;
        $this->descripcion = $args['descripcion'] ?? null;
        $this->precio = $args['precio'] ?? null;
        $this->tipo = $args['tipo'] ?? null;
    }
}