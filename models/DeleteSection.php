<?php

namespace Model;

class DeleteSection extends ActiveRecord
{
    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id', 'nombre', 'email', 'password', 'admin', 'confirmado', 'token'];

    public $id; //ID del usaurio
    public $nombre;
    public $email;
    public $password;
    public $admin;
    public $confirmado;
    public $token;
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;  // Asegúrate de que 'id' se pase correctamente
    }

    public function DeleteAccount()
    {
        if (!$this->id) {
            return ['error' => 'No se proporcionó un ID de usuario.']; // Error al no tener ID
        }

        // Eliminar el usuario de la base de datos
        $query = "DELETE FROM " . self::$tabla . " WHERE id = ?";
        $stmt = self::$db->prepare($query);
        $stmt->bind_param('i', $this->id);

        if ($stmt->execute()) {
            $stmt->close();
            return ['success' => 'El usuario ha sido eliminado exitosamente.']; // Mensaje de éxito
        }

        $stmt->close();
        return ['error' => 'Hubo un problema al intentar eliminar la cuenta.']; // Error en la eliminación
    }
}
