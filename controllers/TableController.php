<?php

namespace Controllers;

use Model\CREATETable;
use Model\DELETETable;
use Model\READTable;
use Model\UpdateTable;
use MVC\Router;

class TableController
{
    
    public static function READTable(Router $router)
    {
        isAdmin();
        // Obtener las variables de sesión de manera segura
        $id = $_SESSION['id'] ?? null;
        $descripcion = $_SESSION['descripcion'] ?? null;
        $imagen = $_SESSION['imagen'] ?? null;

        // Realizar una consulta SQL para obtener todos los productos
        $consulta = "SELECT id, descripcion, imagen FROM mesas";
        $product = READTable::consultarSQL($consulta);

        // Si no hay productos
        $NoProduct = empty($product) ? "No hay productos disponibles." : null;

        // Renderizar la vista y pasar los datos
        $router->render('admin/CRUDTable', [
            'product' => $product,
            'id' => $id,
            'descripcion' => $descripcion,
            'imagen' => $imagen,
            'NoProduct' => $NoProduct
        ]);
    }

   public static function CreateTable(Router $router)
    {
        isAdmin();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            var_dump($_POST); // Verifica que los datos lleguen correctamente
            $Table = new CREATETable($_POST); // DICE QUE ESTA EN LA LINEA 77 QUE ES ESTA
            $resultado = $Table->guardar();

            if ($resultado) {
                echo "Producto creado correctamente";
                header('Location: /CRUDTable');
            } else {
                echo "Error al guardar el producto";
            }
        }

        // Renderizar la vista y pasar los datos
        $router->render('CRUDTable/CreateTable', []);
    }

    public static function UpdateTable(Router $router)
    {
        isAdmin();
        $id = $_GET['id'] ?? null;

        if ($id) {
            $producto = (new UpdateTable())->GetData($id);
            if ($producto) {
                //Mostrar el Array si Existen los datos
                //var_dump($producto);
            } else {
                echo "Producto no encontrado.";
            }
        } else {
            header('Location: /404');
        }

        // Controlador para actualizar el producto
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id']; // Obtener el ID del producto
            $descripcion = $_POST['descripcion'];

            // Crear una instancia del modelo UpdateMenu
            $producto = new \Model\UpdateTable([
                'id' => $id,
                'descripcion' => $descripcion,
            ]);

            // Llamar al método actualizar() para guardar los cambios
            if ($producto->actualizar()) {
                echo "Producto actualizado exitosamente.";
                header('Location: /CRUDTable');
            } else {
                echo "Error al actualizar el producto.";
            }
        }
        // Renderizar la vista
        $router->render('CRUDTable/UpdateTable', [
            'producto' => $producto,
        ]);
    }

    public static function DELETETable(Router $router)
    {
        isAdmin();
        // Llamada a la acción de eliminar desde un controlador
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];  // Obtener el id del menú a eliminar

            // Buscar el registro del menú por el id
            $menu = DELETETable::find($id);

            if ($menu) {
                $menu->eliminar();  // Eliminar el menú y la imagen
                header('Location: /CRUDTable');  // Redirigir a la página de administración después de eliminar
                exit();  // Asegurarse de que no se ejecute más código después de la redirección
            } else {
                // Puedes manejar el caso de error si el menú no existe
                echo "El menú no existe.";
            }
        }

        // Renderizar la vista de administración para mostrar la lista de menús
        $router->render('admin/CRUDTable', [
            // Puedes pasar datos como los menús existentes, si es necesario
        ]);
    }

    
}
