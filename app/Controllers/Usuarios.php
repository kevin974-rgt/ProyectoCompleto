<?php

// Define que esta clase está en el espacio de nombres de los controladores
namespace App\Controllers;

// Importa el modelo UsuarioModel, que representa la tabla de usuarios
use App\Models\UsuarioModel;

class Usuarios extends BaseController
{
    // Propiedad protegida para el modelo de usuarios
    protected $usuarioModel;

    // Constructor: se instancia el modelo una vez para usarlo en todo el controlador
    public function __construct()
    {
        $this->usuarioModel = new UsuarioModel();
    }

    // Método que muestra la vista principal con la lista de usuarios
    public function index()
    {
        // Se obtienen todos los usuarios de la base de datos
        $data['usuarios'] = $this->usuarioModel->findAll();

        // Se carga la vista 'usuariosVista' y se le pasa el arreglo con los usuarios
        return view('usuariosVista', $data);
    }

    // Método para registrar un nuevo usuario usando el procedimiento almacenado SP_INSERT_USUARIOS
    public function registrar()
    {
        // Recoge los datos del formulario enviados por POST
        $nombre = $this->request->getPost('nombre');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // Valida que los campos no estén vacíos
        if (!$nombre || !$email || !$password) {
            return redirect()->back()->with('error', 'Todos los campos son obligatorios.');
        }

        // Verifica si ya existe un usuario con el mismo correo
        $existe = $this->usuarioModel->where('email', $email)->first();
        if ($existe) {
            return redirect()->back()->with('error', 'El email ya está registrado.');
        }

        // Encripta la contraseña
        $hash = password_hash($password, PASSWORD_DEFAULT);

        // Llama al procedimiento almacenado SP_INSERT_USUARIOS con los parámetros nombre, email y contraseña
        $sql = "CALL SP_INSERT_USUARIOS(?, ?, ?)";
        $this->usuarioModel->db->query($sql, [$nombre, $email, $hash]);

        // Redirige con mensaje de éxito
        return redirect()->to('/usuarios')->with('success', 'Usuario registrado correctamente.');
    }

    // Método para eliminar un usuario usando SP_DELETE_USUARIOS
    public function eliminar($id = null)
    {
        // Verifica si el ID fue recibido
        if (!$id) {
            return redirect()->to('/usuarios')->with('error', 'ID inválido.');
        }

        // Cuenta los usuarios existentes, para evitar eliminar el último
        $totalUsuarios = $this->usuarioModel->countAllResults(false);

        if ($totalUsuarios <= 1) {
            return redirect()->to('/usuarios')->with('error', 'No se puede eliminar el último usuario.');
        }

        // Busca el usuario en la base de datos
        $usuario = $this->usuarioModel->find($id);
        if (!$usuario) {
            return redirect()->to('/usuarios')->with('error', 'Usuario no encontrado.');
        }

        // Llama al procedimiento almacenado SP_DELETE_USUARIOS con el ID del usuario
        $sql = "CALL SP_DELETE_USUARIOS(?)";
        $this->usuarioModel->db->query($sql, [$id]);

        // Redirige con mensaje de éxito
        return redirect()->to('/usuarios')->with('success', 'Usuario eliminado correctamente.');
    }
}
