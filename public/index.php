<?php 
require_once __DIR__ . '/../Router.php'; // Incluir Router.php
require_once __DIR__ . '/../controllers/LoginController.php';
require_once __DIR__ . '/../includes/app.php';

use Controllers\AdminController;
use Controllers\APIcontroller;
use Controllers\LoginController;
use Controllers\MenuController;
use Controllers\ReservationController;
use Controllers\SectionController;
use Controllers\TableController;

use MVC\Router;

$router = new Router(); 
//// Registro
$router->get('/Register', [LoginController::class, 'Register']);
$router->post('/Register', [LoginController::class, 'Register']);

// Acceso
$router->get('/Login', [LoginController::class, 'Login']);
$router->post('/Login', [LoginController::class, 'Login']);

// Cerrar sesión
$router->get('/logout', [LoginController::class, 'logout']);
$router->post('/logout', [LoginController::class, 'logout']);

//Delete 
$router->get('/CloseSession', [SectionController::class, 'DeleteAccount']);
$router->post('/CloseSession', [SectionController::class, 'DeleteAccount']);

//Olvide Password
$router->get('/Forget', [LoginController::class, 'Forget']);
$router->post('/Forget', [LoginController::class, 'Forget']);

//Recuperar
$router->get('/Recover', [LoginController::class, 'Recover']);
$router->post('/Recover', [LoginController::class, 'Recover']);

//Confirmation Password
$router->get('/Confirmation', [LoginController::class, 'Confirmation']);
$router->get('/Message', [LoginController::class, 'Message']);


//Inicio
$router->get('/', [LoginController::class, 'inicio']);//Pagina de inicio
$router->post('/', [LoginController::class, 'inicio']);//Pagina de inicio

$router->get('/us', [LoginController::class, 'us']);
$router->post('/us', [LoginController::class, 'us']);


$router->get('/base', [LoginController::class, 'base']);
$router->post('/base', [LoginController::class, 'base']);

$router->get('/Development', [LoginController::class, 'Development']);
$router->post('/Development', [LoginController::class, 'Development']);


//AREA PRIVADA

//reservacion
$router->get('/Reservation', [ReservationController::class, 'index']);
$router->post('/Reservation', [ReservationController::class, 'index']);

//API DE RESERVACIONES
$router->get('/api/Reservation', [APIcontroller::class, 'index']);
$router->post('/api/ReservationConfirmed', [APIcontroller::class, 'ReservationConfirmed']);
$router->post('/api/Delete', [APIcontroller::class, 'Delete']);

//Administrador

$router->get('/Admin', [AdminController::class, 'admin']);
$router->post('/Admin', [AdminController::class, 'admin']);

//CRUDMenu
$router->get('/CRUDMenu', [MenuController::class, 'CRUDMenu']);
$router->post('/CRUDMenu', [MenuController::class, 'CRUDMenu']);

$router->get('/CreateMenu', [MenuController::class, 'CreateMenu']);
$router->post('/CreateMenu', [MenuController::class, 'CreateMenu']);


$router->get('/UpdateMenu', [MenuController::class, 'UpdateMenu']);
$router->post('/UpdateMenu', [MenuController::class, 'UpdateMenu']);

$router->post('/CRUDMenu', [MenuController::class, 'DELETEMenu']);


$router->get('/CRUDTable', [TableController::class, 'READTable']);
$router->post('/CRUDTable', [TableController::class, 'READTable']);

$router->get('/CreateTable', [TableController::class, 'CreateTable']);
$router->post('/CreateTable', [TableController::class, 'CreateTable']);

$router->get('/UpdateTable', [TableController::class, 'UpdateTable']);
$router->post('/UpdateTable', [TableController::class, 'UpdateTable']);

$router->post('/CRUDTable', [TableController::class, 'DELETETable']);



// Comprueba y valida las ruta
$router->comprobarRutas();
