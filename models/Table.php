<?php 
namespace Model;
class Table extends ActiveRecord {
    //Base de datos
    protected static $tabla = 'reservaciones';
    protected static $columnasDB = ['id', 'fecha', 'hora', 'usuarioid', 'mesaid' ];
    public $id;
    public $fecha;
    public $hora;
    public $usuarioid;
    public $mesaid;
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->fecha = $args['fecha'] ?? null;
        $this->hora = $args['hora'] ?? null;
        $this->usuarioid = $args['usuarioid'] ?? null;
        $this->mesaid = $args['mesaid'] ?? null;
    }
}
?>