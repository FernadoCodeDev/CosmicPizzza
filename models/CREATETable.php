<?php

namespace Model;

class CREATETable extends ActiveRecord
{
    public static $tabla = 'mesas';
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

    // Método para guardar datos en la base
    public function guardar()
{
    // Manejar la imagen antes de construir la consulta
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === 0) {
        $imagenTmp = $_FILES['imagen']['tmp_name'];
        $imagenNombre = $_FILES['imagen']['name'];
        $directorioDestino = 'ImagenBD/';

        // Crear el directorio si no existe
        if (!is_dir($directorioDestino)) {
            mkdir($directorioDestino, 0777, true);
        }

        // Generar un nombre único para la imagen
        $imagenNombreUnico = time() . '-' . rand(1000, 9999) . '.' . pathinfo($imagenNombre, PATHINFO_EXTENSION);
        $imagenRuta = $directorioDestino . $imagenNombreUnico;

        if (!move_uploaded_file($imagenTmp, $imagenRuta)) {
            echo "Error al mover la imagen al directorio de destino.";
            return false;
        }

        $this->imagen = $imagenNombreUnico; // Solo el nombre
    } else {
        $this->imagen = ''; // Si no hay imagen
    }

    // Crear un nuevo registro
    $atributos = $this->sanitizarAtributos();
    $columnas = join(', ', array_keys($atributos));
    $valores = join("', '", array_values($atributos));

    // Validar la tabla antes de construir la consulta
    if (!isset(static::$tabla) || empty(static::$tabla)) {
        echo "Error: Nombre de la tabla no definido.";
        return false;
    }

    // Consulta SQL
    $query = "INSERT INTO " . static::$tabla . " ($columnas) VALUES ('$valores')";

    // Depuración
    echo "Consulta SQL generada: $query";

    // Ejecutar la consulta
    $resultado = self::$db->query($query);

    if ($resultado) {
        return true;
    } else {
        echo "Error al guardar los datos en la base de datos.";
        return false;
    }
}


    // Sanitizar datos para evitar inyección SQL
    public function sanitizarAtributos()
    {
        $atributos = [];
        foreach (static::$columnasDB as $columna) {
            if ($columna === 'id') continue; // Ignorar el ID (autoincremental)
            $atributos[$columna] = self::$db->escape_string($this->$columna);
        }
        var_dump($atributos); // Verifica que los atributos sean correctos
        return $atributos;
    }
}
