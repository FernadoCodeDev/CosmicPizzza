<?php

namespace Model;

class CreateMenu extends ActiveRecord
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

    public function addError($type, $message)
    {
        self::$alertas[$type][] = $message;
    }

    // Método para guardar datos en la base
    public function guardar()
    {
        // Manejar la imagen antes de construir la consulta
        if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === 0) {
            // Obtiene el archivo temporal y el nombre de la imagen
            $imagenTmp = $_FILES['imagen']['tmp_name'];
            $imagenNombre = $_FILES['imagen']['name'];

            // Define la ruta completa donde se guardará la imagen
            $directorioDestino = 'ImagenBD/';

            // Verifica si la carpeta existe, si no, la crea
            if (!is_dir($directorioDestino)) {
                if (!mkdir($directorioDestino, 0777, true)) {
                    echo "Error al crear la carpeta para guardar las imágenes.";
                    return false; // Si no se pudo crear la carpeta, retorna un error
                }
            }

            // Genera un nombre único para la imagen usando solo números
            $imagenNombreUnico = time() . '-' . rand(1000, 9999) . '.' . pathinfo($imagenNombre, PATHINFO_EXTENSION); // Usa la extensión original
            $imagenRuta = $directorioDestino . $imagenNombreUnico;

            // Mueve la imagen al directorio de destino
            if (!move_uploaded_file($imagenTmp, $imagenRuta)) {
                echo "Error al mover la imagen al directorio de destino.";
                return false; // Si no se puede mover el archivo, retorna un error
            }

            // Guarda solo el nombre de la imagen en el atributo
            $this->imagen = $imagenNombreUnico; // Solo el nombre, sin la ruta
        } else {
            $this->imagen = ''; // Asigna un valor vacío si no hay imagen
        }

        // Crear un nuevo registro
        $atributos = $this->sanitizarAtributos();
        $columnas = join(', ', array_keys($atributos));
        $valores = join("', '", array_values($atributos));

        // Consulta SQL para insertar
        $query = "INSERT INTO " . static::$tabla . " ($columnas) VALUES ('$valores')";

        // Mostrar la consulta para depuración (puedes comentarla en producción)
        echo $query;

        // Ejecutar la consulta
        $resultado = self::$db->query($query);


        //ALERTAS
        if ($resultado) {
            self::$alertas['success'][] = 'Nuevo Producto Creado';
            return true;
        } else {
            self::$alertas['error'][] = 'Error al crear Nuevo Producto';
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
        //var_dump($atributos); // Verifica que los atributos sean correctos
        return $atributos;
    }
}
