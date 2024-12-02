<?php

namespace Controllers;

use Clases\Email;
use Model\Menu;
use Model\Usuario;
use MVC\Router;

class LoginController
{

    public static function Register($router)
    {
        SessionStarted();
        $alertas = [];
        $usuario = new Usuario();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Asignar valores del POST al objeto Usuario
            $usuario = new Usuario($_POST);

            // Validar campos
            if (empty($_POST['nombre'])) {
                $alertas['error'][] = "El Nombre es obligatorio.";
            }
            if (empty($_POST['email'])) {
                $alertas['error'][] = "El Email es obligatorio.";
            }
            if (empty($_POST['password'])) {
                $alertas['error'][] = "La contraseña es obligatoria.";
            } elseif (strlen($_POST['password']) < 8) { // Validar longitud de la contraseña
                $alertas['error'][] = "La contraseña debe tener al menos 8 caracteres.";
            }

            if (empty($alertas)) {
                // Verificar si el usuario ya existe
                $resultado = $usuario->existeUsuario();

                if ($resultado->num_rows) {
                    $alertas = Usuario::getAlertas();
                } else {
                    $usuario->hashPassword();

                    $usuario->Token();

                    $email = new Email($usuario->nombre, $usuario->email, $usuario->token);

                    $email->Confirmation();

                    $resultado = $usuario->guardar();
                    if ($resultado) {
                        header('Location: /Message');
                    }
                }
            }
        }

        // Renderizar la vista con las alertas y el usuario
        $router->render('auth/Register', [
            'usuario' => $usuario,
            'alertas' => $alertas
        ]);
    }

    public static function Login(Router $router)
    {
        SessionStarted();
        $alertas = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $auth = new Usuario($_POST);

            $alertas = $auth->ValidarLogin();

            if (empty($alertas)) {
                $usuario = $auth->autenticar();
                if ($usuario) {
                    session_regenerate_id(true);
                    $_SESSION['id'] = $usuario->id;
                    $_SESSION['nombre'] = $usuario->nombre;
                    $_SESSION['email'] = $usuario->email;
                    $_SESSION['login'] = true;

                    if ($usuario->admin === "1") {
                        $_SESSION['admin'] = $usuario->admin ?? null;
                        header('Location: /Admin');
                        exit();
                    } else {
                        header('Location: /');
                        exit(); 
                    }
                }
            }
        }
        $alertas = Usuario::getAlertas();

        $router->render('auth/Login', [
            'alertas' => $alertas
        ]);
    }

    public static function logout()
    {
        //session_start();
        $_SESSION = [];
        header('location: /');
    }

    //CloseSession
    public static function CloseSession(Router $router)
    {
        $router->render('auth/CloseSession');
    }

    public static function Forget(Router $router)
    {
        SessionStarted();
        $alertas = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $auth = new Usuario($_POST);
            $alertas = $auth->ValidateEmail();

            if (empty($alertas)) {
                $usuario = Usuario::where('email', $auth->email);

                if ($usuario && $usuario->confirmado === '1') {
                    $usuario->Token();
                    $usuario->guardar();

                    $email = new Email($usuario->email, $usuario->nombre, $usuario->token);
                    $email->Instructions();


                    Usuario::setAlerta('success', 'Revisa tú Email');
                } else {
                    Usuario::setAlerta('error', 'Usuario inexistente');
                }
            }
        }

        $alertas = Usuario::getAlertas();

        $router->render('auth/Forget', [
            'alertas' => $alertas
        ]);
    }

    public static function Recover(Router $router)
    {
        $alertas = [];
        $error = false;
        $Token = s($_GET['Token']);

        $usuario = Usuario::where('Token', $Token);

        if (empty($usuario)) {
            Usuario::setAlerta('error', 'Token No válido');
            $error = true;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $password = new Usuario($_POST);
            $alertas = $password->ValidatePassword();

            if (empty($alertas)) {

                $usuario->password = null;
                $usuario->password = $password->password;
                $usuario->hashPassword();
                $usuario->Token = null;

                $resultado = $usuario->guardar();
                if ($resultado) {
                    header('Location: /Login');
                    exit();
                }
            }
        }

        $alertas = Usuario::getAlertas();
        $router->render('auth/Recover', [
            'alertas' => $alertas,
            'error' => $error

        ]);
    }

    public static function Message(Router $router)
    {
        $router->render('auth/Message');
    }

    public static function Development(Router $router)
    {
        $router->render('auth/Development');
    }

    //base
    public static function base(Router $router)
    {
        $router->render('auth/base');
    }

    public static function Confirmation(Router $router)
    {
        $alertas = [];
        $Token = s($_GET['Token']);
        $usuario = Usuario::where('Token', $Token);
        if (empty($usuario)) {
            Usuario::setAlerta('error', 'Token No valido');
        } else {
            $usuario->confirmado = "1";
            $usuario->Token = null;
            $usuario->guardar();

            Usuario::setAlerta('success', 'Cuenta Confirmada correctamente');
        }
        $alertas = Usuario::getAlertas();
        $router->render('auth/Confirmation', [
            'alertas' => $alertas
        ]);
    }

    public static function inicio(Router $router)
    {
        // Obtener las variables de sesión de manera segura
        $id = $_SESSION['id'] ?? null;
        $nombre = $_SESSION['nombre'] ?? null;
        $imagen = $_SESSION['imagen'] ?? null;
        $descripcion = $_SESSION['descripcion'] ?? null;
        $precio = $_SESSION['precio'] ?? null;
        $tipo = $_SESSION['tipo'] ?? null;

        // Realizar una consulta SQL para obtener todos los productos
        $consulta = "SELECT id, nombre, descripcion, precio, imagen, tipo FROM menu";
        $product = Menu::consultarSQL($consulta);

        // Si no hay productos
        $NoProduct = empty($product) ? "No hay productos disponibles." : null;

        // Renderizar la vista y pasar los datos
        $router->render('auth/inicio', [
            'product' => $product,
            'id' => $id,
            'nombre' => $nombre,
            'imagen' => $imagen,
            'descripcion' => $descripcion,
            'precio' => $precio,
            'tipo' => $tipo,
            'NoProduct' => $NoProduct
        ]);
    }

    public static function us(Router $router)
    {
        $router->render('auth/us');
    }

    //reservacion
    public static function Reservation(Router $router)
    {
        $router->render('Reservation/Reservation');
    }

    //admin

}
