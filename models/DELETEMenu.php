<?php

namespace Model;

class DELETEMenu extends ActiveRecord
{
    public static $tabla = 'menu'; 
    public static $columnasDB = ['id', 'nombre', 'imagen', 'descripcion', 'precio', 'tipo'];

    public $id;
    public $nombre;
    public $imagen;
    public $descripcion;
    public $precio;
    public $tipo;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->precio = $args['precio'] ?? 0.0;
        $this->tipo = $args['tipo'] ?? 'complemento'; // Valor predeterminado para tipo
    }

    // Método para eliminar el registro y la imagen
    public function eliminar()
    {

        // Eliminar la imagen de la carpeta si existe
        if ($this->imagen) {
            $imagenPath = 'ImagenBD/' . $this->imagen;
            if (file_exists($imagenPath)) {
                unlink($imagenPath); // Eliminar el archivo de imagen
            }
        }

        // Eliminar el registro de la base de datos usando MySQLi
        $query = "DELETE FROM " . self::$tabla . " WHERE id = ? LIMIT 1";  
        $stmt = self::$db->prepare($query);  

        $stmt->bind_param('i', $this->id); // 'i' para indicar que es un entero

        return $stmt->execute(); // Ejecutar la eliminación
    }
}
?>