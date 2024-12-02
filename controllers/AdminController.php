<?php
namespace Controllers;
use Model\AdminReservation;
use MVC\Router;

class AdminController
{
    public static function Admin(Router $router)
    {
        isAdmin();
        
        // Asegurarse de que la fecha es válida antes de usarla
        $date = $_GET['date'] ?? date('Y-m-d'); // Correcto uso de $_GET
        // Dividir la fecha y verificar formato
        $DateSelect = explode('-', $date);
        if (count($DateSelect) === 3 && checkdate((int)$DateSelect[1], (int)$DateSelect[2], (int)$DateSelect[0])) {
            // Fecha válida, continúa con la consulta
            $consulta = "SELECT reservaciones.id, reservaciones.fecha, reservaciones.hora, ";
            $consulta .= "usuarios.id AS usuarioid, usuarios.nombre, usuarios.email, ";
            $consulta .= "mesas.id AS mesaid, mesas.descripcion ";
            $consulta .= "FROM reservaciones ";
            $consulta .= "LEFT OUTER JOIN usuarios ON reservaciones.usuarioid = usuarios.id ";
            $consulta .= "LEFT OUTER JOIN mesas ON reservaciones.mesaid = mesas.id ";
            $consulta .= "WHERE fecha = '{$date}' ";
            // Ejecuta la consulta SQL usando el modelo AdminReservation
            $reservaciones = AdminReservation::SQL($consulta);
            if (empty($reservaciones)) {
                $NoDate = "No hay reservaciones en la fecha seleccionada.";
            }
        } else{
            // Fecha no válida, redirigir a una página de error
            header('Location: /404');
            exit();
        }
        // Asegúrate de que estás pasando el resultado correcto a la vista
        $router->render('admin/Admin', [
            'nombre' => $_SESSION['nombre'],
            'reservaciones' => $reservaciones,
            'date' => $date,
            'NoDate' => $NoDate
        ]);
    }
}
