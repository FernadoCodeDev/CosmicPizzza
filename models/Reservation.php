<?php 
//En la carpeta Model
namespace Model;

class Reservation extends ActiveRecord {
    protected static $tabla = 'mesas';
    protected static $columnasDB = ['id', 'descripcion', 'imagen'];

    public $id;
    public $descripcion;
    public $imagen;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->descripcion = $args['descripcion'] ?? '';
        $this->imagen = $args['imagen'] ?? null;

    }
}

?>