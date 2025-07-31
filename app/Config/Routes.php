<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 * Se define que la variable $routes es una instancia de RouteCollection.
 */

// Página de inicio: redirige a Login::index
$routes->get('/', 'Login::index');

// Ruta para enviar los datos del formulario de login (POST)
$routes->post('login/autenticar', 'Login::autenticar');

// Ruta para mostrar el formulario de registro
$routes->get('login/registro', 'Login::registro');

// Ruta para guardar los datos del usuario registrado (POST)
$routes->post('login/guardar', 'Login::guardarUsuario');

// Ruta para mostrar el dashboard luego del login
$routes->get('dashboard', 'Login::dashboard');

// Ruta para cerrar sesión
$routes->get('login/logout', 'Login::logout');

// Ruta para mostrar todos los usuarios registrados
$routes->get('usuarios', 'Usuarios::index');

// Ruta para registrar un nuevo usuario (POST)
$routes->post('usuarios/registrar', 'Usuarios::registrar');

// Ruta para eliminar un usuario según su ID (POST con parámetro numérico)
$routes->post('usuarios/eliminar/(:num)', 'Usuarios::eliminar/$1');


