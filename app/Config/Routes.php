<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('home', 'Home::index');
$routes->get('principal','Home::principal');
$routes->get('users', 'UserController::index'); // Listar usuarios
$routes->get('users/save', 'UserController::saveUser'); // Mostrar formulario para crear usuario
$routes->get('users/save/(:num)', 'UserController::saveUser/$1'); // Mostrar formulario para editar usuario
$routes->post('users/save', 'UserController::saveUser'); // Crear usuario (POST)
$routes->post('users/save/(:num)', 'UserController::saveUser/$1'); // Editar usuario (POST)
$routes->get('users/delete/(:num)', 'UserController::delete/$1'); // Eliminar usuario

$routes->get('/login', 'AuthController::login');
$routes->post('/process-login', 'AuthController::login');
$routes->get('/register', 'AuthController::register');
$routes->post('/process-register', 'AuthController::register');
$routes->get('/logout', 'AuthController::logout');


$routes->get('artistas', 'ArtistaController::index'); // Listar artistas
$routes->get('artistas/save', 'ArtistaController::saveArtista'); // Mostrar formulario vacio para meter un artista nuevo
$routes->get('artistas/save/(:num)', 'ArtistaController::saveArtista/$1'); // Mostrar formulario relleno como un artista para cambiar sus datos
$routes->post('artistas/save', 'ArtistaController::saveArtista'); // Crear usuario en la base de datos (POST)
$routes->post('artistas/save/(:num)', 'ArtistaController::saveArtista/$1'); // Editar usuario en la base de datos (POST)
$routes->get('artistas/delete/(:num)', 'ArtistaController::delete/$1'); // Eliminar artista

$routes->get('patrocinadores', 'PatrocinadorController::index'); // Listar patrocinador
$routes->get('patrocinadores/save', 'PatrocinadorController::savePatrocinador'); // Mostrar formulario vacio para meter un patrocinador nuevo
$routes->get('patrocinadores/save/(:num)', 'PatrocinadorController::savePatrocinador/$1'); // Mostrar formulario relleno como un patrocinador para cambiar sus datos
$routes->post('patrocinadores/save', 'PatrocinadorController::savePatrocinador'); // Crear usuario en la base de datos (POST)
$routes->post('patrocinadores/save/(:num)', 'PatrocinadorController::savePatrocinador/$1'); // Editar usuario en la base de datos (POST)
$routes->get('patrocinadores/delete/(:num)', 'PatrocinadorController::delete/$1'); // Eliminar patrocinadores

$routes->get('festivales', 'FestivalController::index'); // Listar patrocinador
$routes->get('festivales/save', 'FestivalController::saveFestival'); // Mostrar formulario vacio para meter un patrocinador nuevo
$routes->get('festivales/save/(:num)', 'FestivalController::saveFestival/$1'); // Mostrar formulario relleno como un patrocinador para cambiar sus datos
$routes->post('festivales/save', 'FestivalController::saveFestival'); // Crear usuario en la base de datos (POST)
$routes->post('festivales/save/(:num)', 'FestivalController::saveFestival/$1'); // Editar usuario en la base de datos (POST)
$routes->get('festivales/delete/(:num)', 'FestivalController::delete/$1'); // Eliminar patrocinadores

$routes->group('entradas', function($routes) {
    $routes->get('/', 'EntradaController::index');
    $routes->get('save/(:segment)', 'EntradaController::saveEntrada/$1');
    $routes->get('save', 'EntradaController::saveEntrada');
    $routes->post('save/(:segment)', 'EntradaController::saveEntrada/$1');
    $routes->post('save', 'EntradaController::saveEntrada');
    $routes->get('delete/(:segment)', 'EntradaController::delete/$1');
});

$routes->group('roles', function($routes) {
    $routes->get('/', 'RolController::index');
    $routes->get('save/(:segment)', 'RolController::saveRol/$1');
    $routes->get('save', 'RolController::saveRol');
    $routes->post('save/(:segment)', 'RolController::saveRol/$1');
    $routes->post('save', 'RolController::saveRol');
    $routes->get('delete/(:segment)', 'RolController::delete/$1');
});
