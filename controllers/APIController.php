<?php
namespace Controllers;

use Model\Reservation;
use Model\Table;

class APIcontroller {
    public static function index() {
        try {
            $reservations = Reservation::all();
            echo json_encode($reservations);
        } catch (\Exception $e) {
            http_response_code(500);
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

    public static function ReservationConfirmed() {
        // Verificar que todos los datos estén presentes
        if (!isset($_POST['fecha'], $_POST['hora'], $_POST['usuarioid'], $_POST['mesaid'])) {
            echo json_encode(['error' => 'Datos incompletos']);
            return;
        }
        
        // Depuración: Mostrar los datos recibidos
        error_log("Datos recibidos: " . print_r($_POST, true));

        // Crear instancia de `Table` y guardar los datos
        $table = new Table([
            'id' => $_POST['id'] ?? null,  // Si `id` es null, significa que se creará un nuevo registro
            'fecha' => $_POST['fecha'],
            'hora' => $_POST['hora'],
            'usuarioid' => $_POST['usuarioid'],
            'mesaid' => $_POST['mesaid']
        ]);

        try {
            // Intentar guardar y retornar el resultado
            $result = $table->guardar();
            echo json_encode(['status' => 'success', 'result' => $result]);
        } catch (\Exception $e) {
            // Capturar cualquier error durante el guardado
            http_response_code(500);
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

    public static function Delete() {
       if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $reservation = Table::find($id);
        $reservation->eliminar();
        header('Location: /Admin');
       }
    }
}
?>
