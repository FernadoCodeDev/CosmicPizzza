<?php

namespace Model;

class UpdateTable extends ActiveRecord
{
    public static $tabla = 'mesas'; // Nombre correcto de la tabla en la base de datos
    public static $columnasDB = ['id', 'descripcion', 'imagen']; // tipo es un enum('promocion','pizza','complemento','postre')
    public $id;
    public $descripcion;
    public $imagen;
    public function __construct($args = [])
    {          //Linea 16
        $this->id = $args['id'] ?? null;
        $this->descripcion = $args['descripcion'] ?? '';
        $this->imagen = $args['imagen'] ?? '';

    }
    // Método para obtener los datos de un producto por ID
    // Si GetData() retorna un array, crea el objeto UpdateMenu explícitamente
    public function GetData($id)
    {
        $query = "SELECT * FROM " . self::$tabla . " WHERE id = ?";
        $stmt = self::$db->prepare($query); // Preparamos la consulta
        if (!$stmt) {
            throw new \Exception("Error al preparar la consulta: " . self::$db->error);
        }
        $stmt->bind_param("i", $id); // Vinculamos el parámetro
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc(); // Array

        // Si el resultado no es vacío, creamos un objeto UpdateMenu
        if ($data) {
            $producto = new UpdateTable();
            $producto->id = $data['id'];
            $producto->descripcion = $data['descripcion'];
            $producto->imagen = $data['imagen'];


            return $producto; // Retorna el objeto
        }
        header('Location: /404');
    }


    public function actualizar()
    {
        // Verificar si se sube una nueva imagen
        if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === 0) {
            // Primero, obtener el nombre de la imagen anterior desde la base de datos
            $imagenAnterior = $this->imagen; // Esto debería ser el valor actual en la base de datos
        
            // Eliminar la imagen anterior si existe
            if (!empty($imagenAnterior)) {
                $rutaImagenAnterior = 'ImagenBD/' . $imagenAnterior;
                if (file_exists($rutaImagenAnterior)) {
                    unlink($rutaImagenAnterior); // Eliminar la imagen vieja
                    echo "Imagen ANTERIOR ELIMINADA"; // Debugging
                } else {
                    echo "No se encontró la imagen anterior.";
                }
            }
        
            // Procesar la nueva imagen
            $imagenTmp = $_FILES['imagen']['tmp_name'];
            $imagenNombre = $_FILES['imagen']['name'];
            $directorioDestino = 'ImagenBD/';
        
            // Crear la carpeta si no existe
            if (!is_dir($directorioDestino)) {
                mkdir($directorioDestino, 0777, true);
            }
        
            // Crear un nombre único para la nueva imagen
            $imagenNombreUnico = time() . '-' . rand(1000, 9999) . '.' . pathinfo($imagenNombre, PATHINFO_EXTENSION);
            $imagenRuta = $directorioDestino . $imagenNombreUnico;
        
            // Mover la imagen al directorio destino
            if (move_uploaded_file($imagenTmp, $imagenRuta)) {
                // Actualizar la propiedad imagen con el nuevo nombre de archivo
                $this->imagen = $imagenNombreUnico; // Actualizar el nombre de la imagen
                echo "Imagen nueva movida a: " . $imagenRuta; // Debugging
            } else {
                echo "Error al mover la imagen al directorio.";
                return false;
            }
        
            // Actualizar la propiedad imagen con el nuevo nombre de archivo
            $this->imagen = $imagenNombreUnico; // Actualizar el nombre de la imagen
        }

        // Actualizar otros datos
        $atributos = $this->sanitizarAtributos();
        $columnas = "";
        $valores = [];

        // Crear la consulta de actualización, por cada campo que se modifica
        foreach ($atributos as $columna => $valor) {
            if ($columna != 'id') { // No modificamos el ID
                $columnas .= $columna . " = ?, ";
                $valores[] = $valor;
            }
        }

        // Quitar la última coma y espacio extra
        $columnas = rtrim($columnas, ", ");

        // Consulta SQL de actualización
        $query = "UPDATE " . static::$tabla . " SET $columnas WHERE id = ?";

        // Preparar la consulta
        $stmt = self::$db->prepare($query);
        if (!$stmt) {
            throw new \Exception("Error al preparar la consulta de actualización: " . self::$db->error);
        }

        // Vincular los valores a la consulta
        $valores[] = $this->id; // Añadir el ID al final
        $types = str_repeat('s', count($valores) - 1) . 'i'; // El tipo para los parámetros, 'i' para el ID
        $stmt->bind_param($types, ...$valores);

        // Ejecutar la consulta
        $resultado = $stmt->execute();
        return $resultado;
    }


    // Sanitizar datos para evitar inyección SQL
    public function sanitizarAtributos()
    {
        $atributos = [];
        foreach (static::$columnasDB as $columna) {
            if ($columna === 'id') continue; // Ignorar el ID (autoincremental)
            $atributos[$columna] = self::$db->escape_string($this->$columna);
        }
        return $atributos;
    }
}
