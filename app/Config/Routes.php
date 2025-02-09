<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Rutas para UserController
$routes->get('/users', 'UserController::index'); // Listar usuarios
$routes->get('/users/save', 'UserController::saveUser');
$routes->get('/users/save/(:num)', 'UserController::saveUser/$1');
$routes->post('/users/save', 'UserController::saveUser');
$routes->post('/users/save/(:num)', 'UserController::saveUser/$1');
$routes->get('/users/delete/(:num)', 'UserController::delete/$1');

// Rutas para Festivales
$routes->get('/festivales', 'FestivalController::index');
$routes->get('/festivales/create', 'FestivalController::create');
$routes->post('/festivales/store', 'FestivalController::store');
$routes->get('/festivales/edit/(:num)', 'FestivalController::edit/$1');
$routes->post('/festivales/update/(:num)', 'FestivalController::update/$1');
$routes->get('/festivales/delete/(:num)', 'FestivalController::delete/$1');

// Rutas para Artistas
$routes->get('/artistas', 'ArtistaController::index');
$routes->get('/artistas/create', 'ArtistaController::create');
$routes->post('/artistas/store', 'ArtistaController::store');
$routes->get('/artistas/edit/(:num)', 'ArtistaController::edit/$1');
$routes->post('/artistas/update/(:num)', 'ArtistaController::update/$1');
$routes->get('/artistas/delete/(:num)', 'ArtistaController::delete/$1');

// Rutas para Usuarios y Entradas
$routes->get('/usuarios', 'UsuarioController::index');
$routes->get('/entradas', 'EntradaController::index');
