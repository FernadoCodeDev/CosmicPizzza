<?php
namespace Model;

class AdminReservation extends ActiveRecord {
    protected static $tabla = 'reservaciones';
    protected static $columnasDB = ['id', 'fecha', 'hora', 'usuarioid', 'mesaid', 'descripcion', 'nombre', 'email'];

    public $id;
    public $fecha;
    public $hora;
    public $usuarioid;
    public $mesaid;
    public $descripcion;
    public $nombre;
    public $email;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->fecha = $args['fecha'] ?? null;
        $this->hora = $args['hora'] ?? null;
        $this->usuarioid = $args['usuarioid'] ?? null;
        $this->mesaid = $args['mesaid'] ?? null;
        $this->descripcion = $args['descripcion'] ?? null;
        $this->nombre = $args['nombre'] ?? null;
        $this->email = $args['email'] ?? null;
    }

    // Método para convertir el objeto a un array asociativo
    public function toArray()
    {
        return [
            'id' => $this->id,
            'fecha' => $this->fecha,
            'hora' => $this->hora,
            'usuarioid' => $this->usuarioid,
            'mesaid' => $this->mesaid,
            'descripcion' => $this->descripcion,
            'nombre' => $this->nombre,
            'email' => $this->email,
        ];
    }
}