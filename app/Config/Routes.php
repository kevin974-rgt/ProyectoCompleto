<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 * Se define que la variable $routes es una instancia de RouteCollection.
 */

// Página de inicio
$routes->get('/', 'Login::index');
$routes->post('login/autenticar', 'Login::autenticar');
$routes->get('login/registro', 'Login::registro');
$routes->post('login/guardar', 'Login::guardarUsuario');
$routes->get('dashboard', 'Login::dashboard');
$routes->get('login/logout', 'Login::logout');

// Usuarios
$routes->group('usuarios', function($routes){
    $routes->get('', 'Usuarios::index');
    $routes->post('registrar', 'Usuarios::registrar');
    $routes->post('eliminar/(:num)', 'Usuarios::eliminar/$1');
});

// Productos
$routes->group('productos', function($routes){
    $routes->get('', 'Productos::index');
    $routes->get('crear', 'Productos::crear');
    $routes->post('guardar', 'Productos::guardar');
    $routes->get('editar/(:num)', 'Productos::editar/$1');
    $routes->post('actualizar/(:num)', 'Productos::actualizar/$1');
});

// Compras
$routes->group('compras', function($routes){
    $routes->get('registrar', 'Compras::registrar');
    $routes->post('guardar', 'Compras::guardar');
    $routes->get('listar', 'Compras::listar');
});

// Ventas
$routes->group('ventas', function($routes){
    $routes->get('crear', 'Ventas::crear');
    $routes->post('guardar', 'Ventas::guardar');
});

// ✅ API fuera del grupo ventas
$routes->group('api', function($routes) {
    $routes->get('productos', 'Api\ProductoApi::index');
    $routes->post('productos', 'Api\ProductoApi::create');
    $routes->put('productos/(:num)', 'Api\ProductoApi::update/$1');
    $routes->delete('productos/(:num)', 'Api\ProductoApi::delete/$1');
});











