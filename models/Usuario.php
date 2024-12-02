<?php

namespace Model;

class Usuario extends ActiveRecord
{
    protected static $tabla = 'usuarios';
    protected static $columnasDB = [
        'id',
        'nombre',
        'email', 
        'password',
        'admin',
        'confirmado',
        'token'
    ];

    public $id;
    public $nombre;
    public $email;
    public $password;
    public $admin;
    public $confirmado;
    public $token;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->admin = $args['admin'] ?? "0";
        $this->confirmado = $args['confirmado'] ?? "0";
        $this->token = $args['token'] ?? '';
    }

    // Mensaje de validación para la creación de una cuenta
    public function validarCuenta()
    {
        // Lógica de validación puede ir aquí
    }

    public function ValidarLogin()
    {
        if (!$this->email) {
            $this->addError('error', 'El Email es obligatorio');
        } elseif (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $this->addError('error', 'Formato de email inválido');
        }

        if (!$this->password) {
            $this->addError('error', 'El password es obligatorio');
        }

        return self::$alertas;
    }

    private function addError($type, $message)
    {
        self::$alertas[$type][] = $message;
    }

    public function ValidatePassword()
    {
        if (!$this->password) {
            self::$alertas['error'][] = 'El password es obligatorio';
        }
        if (strlen($_POST['password']) < 8) {
            self::$alertas['error'][] = 'La contraseña debe tener al menos 8 caracteres';
        }

        return self::$alertas;
    }

    // Verifica si el usuario ya existe en la base de datos
    public function existeUsuario()
    {
        $query = "SELECT * FROM " . self::$tabla . " WHERE email = ? LIMIT 1";

        // Preparar declaración
        $stmt = self::$db->prepare($query);
        $stmt->bind_param('s', $this->email); // El 's' indica que es un string

        // Ejecutar y obtener resultado
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows) {
            self::$alertas['error'][] = 'El Usuario ya está registrado';
        }

        return $resultado;
    }

    public function ValidateEmail()
    {
        if (!$this->email) {
            $this->addError('error', 'El Email es obligatorio');
        } elseif (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $this->addError('error', 'Formato de email inválido');
        }

        return self::$alertas;
    }

    public function hashPassword()
    {
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
    }

    public function Token()
    {
        $this->token = uniqid();
    }

    public function autenticar()
    {
        // Busca al usuario por su correo electrónico
        $usuario = Usuario::where('email', $this->email);

        // Verifica si el usuario existe y si la contraseña es correcta
        if ($usuario && password_verify($this->password, $usuario->password)) {
            return $usuario; // Retorna el objeto usuario si es válido
        }

        // Si no se encuentra el usuario o la contraseña es incorrecta, añade un error
        $this->addError('error', 'Usuario no encontrado o contraseña incorrecta');
        return false; // Retorna false si no se autentica
    }

}