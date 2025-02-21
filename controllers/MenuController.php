<?php

namespace Controllers;

use Model\CreateMenu;
use Model\DELETEMenu;
use Model\ReadMenu;
use Model\UpdateMenu;
use MVC\Router;

class MenuController
{
    
    public static function CRUDMenu(Router $router)
    {
        isAdmin();

        $id = $_SESSION['id'] ?? null;
        $nombre = $_SESSION['nombre'] ?? null;
        $imagen = $_SESSION['imagen'] ?? null;
        $descripcion = $_SESSION['descripcion'] ?? null;
        $precio = $_SESSION['precio'] ?? null;
        $tipo = $_SESSION['tipo'] ?? null;

        // Realizar una consulta SQL para obtener todos los productos
        $consulta = "SELECT id, nombre, descripcion, precio, imagen, tipo FROM menu";
        $product = ReadMenu::consultarSQL($consulta);

        // Si no hay productos
        $NoProduct = empty($product) ? "No hay productos disponibles." : null;

        $alertas = []; // Inicializa las alertas

        // Renderizar la vista y pasar los datos
        $router->render('admin/CRUDMenu', [
            'product' => $product,
            'id' => $id,
            'nombre' => $nombre,
            'imagen' => $imagen,
            'descripcion' => $descripcion,
            'precio' => $precio,
            'tipo' => $tipo,
            'alertas' => $alertas,
            'NoProduct' => $NoProduct,
        ]);
    }

    //Crear Nuevo producto
    public static function CreateMenu(Router $router)
    {
        isAdmin();
        $alertas = []; 
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $menu = new CreateMenu($_POST);
            $resultado = $menu->guardar();

            // Generar las alertas
            if ($resultado) {
                $alertas['success'][] = "Producto Creado Correctamente";
                header('Location: /CRUDMenu');
                exit;
            } else {
                $alertas['error'][] = "Error al Crear nuevo producto";
            }
        }

        // Renderizar la vista pasando las alertas
        $router->render('CRUDMenu/CreateMenu', [
            'alertas' => $alertas
        ]);
    }


    public static function UpdateMenu(Router $router)
    {
        isAdmin();
        $id = $_GET['id'] ?? null;

        if ($id) {
            $producto = (new UpdateMenu())->GetData($id);
            if ($producto) {
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
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $precio = $_POST['precio'];
            $tipo = $_POST['tipo'];

            // Crear una instancia del modelo UpdateMenu
            $producto = new \Model\UpdateMenu([
                'id' => $id,
                'nombre' => $nombre,
                'descripcion' => $descripcion,
                'precio' => $precio,
                'tipo' => $tipo,
            ]);

            // Llamar al método actualizar() para guardar los cambios
            if ($producto->actualizar()) {
                echo "Producto actualizado exitosamente.";
                header('Location: /CRUDMenu');
            } else {
                echo "Error al actualizar el producto.";
            }
        }

        // Renderizar la vista
        $router->render('CRUDMenu/UpdateMenu', [
            'producto' => $producto
        ]);
    }

    public static function DELETEMenu(Router $router)
    {
        isAdmin();
        // Llamada a la acción de eliminar desde un controlador
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];  // Obtener el id del menú a eliminar

            // Buscar el registro del menú por el id
            $menu = DELETEMenu::find($id);

            if ($menu) {
                $menu->eliminar();  // Eliminar el menú y la imagen
                header('Location: /CRUDMenu');  // Redirigir a la página de administración después de eliminar
                exit();  // Asegurarse de que no se ejecute más código después de la redirección
            } else {
                echo "El menú no existe.";
            }
        }

        // Renderizar la vista de administración para mostrar la lista de menús
        $router->render('admin/CRUDMenu', [
            
        ]);
    }
}
