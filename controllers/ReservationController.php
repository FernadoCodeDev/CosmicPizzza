<?php 
namespace Controllers;
use MVC\Router;
class ReservationController {
    public static function index (Router $router) {
        $router ->render( 'Reservation/Reservation', [
            'nombre' => $_SESSION['nombre'],
            'id' => $_SESSION['id']

        ]);
    }
}
?>