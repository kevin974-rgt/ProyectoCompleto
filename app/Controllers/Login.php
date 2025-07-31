<?php

// Define que esta clase pertenece al espacio de nombres App\Controllers
namespace App\Controllers;

// Importa el modelo de usuarios para acceder a la base de datos
use App\Models\UsuarioModel;

class Login extends BaseController
{
    // Paso 2: Definimos una propiedad protegida para usar el modelo en toda la clase
    protected $usuarioModel;

    // Paso 3: Constructor donde se instancia el modelo una vez para evitar repetir código
    public function __construct()
    {
        $this->usuarioModel = new UsuarioModel();
    }

    // Método que muestra la vista del formulario de login
    public function index()
    {
        return view('loginVista');
    }

    // Método que se ejecuta al enviar el formulario de login
    public function autenticar()
    {
        // Recoge los datos enviados por el formulario vía POST
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // Busca al usuario en la base de datos por su email
        $usuario = $this->usuarioModel->where('email', $email)->first();

        // Verifica si el usuario existe y si la contraseña coincide
        if ($usuario && password_verify($password, $usuario['password'])) {
            // Si las credenciales son correctas, se inicia sesión
            session()->set('usuario', $usuario['nombre']);
            return redirect()->to('/usuarios'); // Redirige a la lista de usuarios
        } else {
            // Si falla, regresa al login con un mensaje de error
            return redirect()->back()->with('error', 'Credenciales incorrectas');
        }
    }

    // Muestra el formulario de registro de nuevo usuario
    public function registro()
    {
        return view('registroVista');
    }

    // Guarda un nuevo usuario en la base de datos
    public function guardarUsuario()
    {
        // Obtiene los datos del formulario
        $nombre = $this->request->getPost('nombre');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // Verifica que los campos no estén vacíos
        if (empty($nombre) || empty($email) || empty($password)) {
            return redirect()->back()->with('error', 'Todos los campos son obligatorios');
        }

        // Verifica si el correo ya está registrado
        if ($this->usuarioModel->where('email', $email)->first()) {
            return redirect()->back()->with('error', 'El email ya está registrado');
        }

        // Encripta la contraseña con el algoritmo por defecto (bcrypt)
        $hash = password_hash($password, PASSWORD_DEFAULT);

        // Inserta el nuevo usuario en la base de datos
        $this->usuarioModel->insert([
            'nombre'   => $nombre,
            'email'    => $email,
            'password' => $hash
        ]);

        // Redirige al login con un mensaje de éxito
        return redirect()->to('/')->with('success', 'Registro exitoso. Ya puedes iniciar sesión.');
    }

    // Método para redirigir al dashboard (verifica si hay sesión activa)
    public function dashboard()
    {
        // Si no hay sesión activa, redirige al login
        if (!session()->get('usuario')) {
            return redirect()->to('/');
        }

        // Si hay sesión, redirige a la vista de usuarios
        return redirect()->to('/usuarios');
    }

    // Método para cerrar sesión
    public function logout()
    {
        // Elimina todos los datos de sesión
        session()->destroy();

        // Redirige al inicio (login)
        return redirect()->to('/');
    }
}
