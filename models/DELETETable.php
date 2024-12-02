<?php

namespace Model;

class DELETETable extends ActiveRecord
{
    public static $tabla = 'mesas'; // Nombre de la tabla en la base de datos
    public static $columnasDB = ['id', 'descripcion', 'imagen'];

    public $id;
    public $descripcion;
    public $imagen;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;

        $this->descripcion = $args['descripcion'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
    }

    // Método para eliminar el registro y la imagen
    public function eliminar()
    {

        //ESTE SI LO HACE
        // Eliminar la imagen de la carpeta si existe
        if ($this->imagen) {
            $imagenPath = 'ImagenBD/' . $this->imagen;
            if (file_exists($imagenPath)) {
                unlink($imagenPath); // Eliminar el archivo de imagen
            }
        }

        // Eliminar el registro de la base de datos usando MySQLi
        $query = "DELETE FROM " . self::$tabla . " WHERE id = ? LIMIT 1";  // Cambié :id por ?
        $stmt = self::$db->prepare($query);  // Asegúrate de usar una conexión MySQLi

        // Usamos bind_param de MySQLi en lugar de bindParam de PDO
        $stmt->bind_param('i', $this->id); // 'i' para indicar que es un entero

        return $stmt->execute(); // Ejecutar la eliminación
    }
}
?>