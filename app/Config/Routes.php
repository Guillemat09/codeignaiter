<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('home', 'Home::index');
$routes->get('users', 'UserController::index'); // Listar usuarios
$routes->get('users/save', 'UserController::saveUser'); // Mostrar formulario para crear usuario
$routes->get('users/save/(:num)', 'UserController::saveUser/$1'); // Mostrar formulario para editar usuario
$routes->post('users/save', 'UserController::saveUser'); // Crear usuario (POST)
$routes->post('users/save/(:num)', 'UserController::saveUser/$1'); // Editar usuario (POST)
$routes->get('users/delete/(:num)', 'UserController::delete/$1'); // Eliminar usuario

$routes->get('/register', 'AuthController::register');//
$routes->post('register/process', 'AuthController::registerProcess');//
$routes->get('/login', 'AuthController::login'); //
$routes->post('login/process', 'AuthController::loginProcess');//
$routes->get('/logout', 'AuthController::logout');//
$routes->get('/dashboard', 'AuthController::dashboard', ['filter' => 'auth']);



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