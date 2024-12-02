<?php

namespace Controllers;

use Model\DeleteSection;
use MVC\Router;

class SectionController
{
    public static function DeleteAccount(Router $router)
    {
        $alertas = [];

        // Verificar que el usuario está logueado y obtener el ID de la sesión
        $id = $_SESSION['id'] ?? null;
        if (!$id) {
            $alertas['error'][] = "No estás logueado.";
            $router->render('auth/CloseSession', [
                'alertas' => $alertas,
                'id' => $id // Pasar el ID del usuario a la vista
            ]);
            exit();
        }

        // Crear la instancia del modelo DeleteSection con el ID del usuario
        $deleteSection = new DeleteSection(['id' => $id]);

        // Verificar si es una solicitud POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Intentar eliminar la cuenta
            $result = $deleteSection->DeleteAccount();
            // Eliminar la sesión del usuario
            session_destroy();
            header('Location: /'); // Redirigir al inicio después de eliminar la cuenta
            exit();

            // Si no se pudo eliminar la cuenta, mostrar el mensaje de error
            $alertas['error'][] = $result['error'];
            $router->render('auth/CloseSession', [
                'alertas' => $alertas,
                'id' => $id // Pasar el ID del usuario a la vista
            ]);
            exit();
        }

        // Si es una solicitud GET, mostrar el formulario para eliminar la cuenta
        $router->render('auth/CloseSession', [
            'id' => $id // Pasar el ID del usuario a la vista
        ]);
    }
}
