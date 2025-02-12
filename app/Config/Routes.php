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


