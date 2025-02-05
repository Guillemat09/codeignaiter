<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('users' , 'UserController'::index); //Listar usuarios 
$routes->get('users/save', '  UserController'::saveUser);
$routes->get('users/save/(:num)', '  UserController'::saveUser/$1);
$routes->post('users/save', '  UserController'::saveUser);
$routes->post('users/save/(:num)', '  UserController'::saveUser/$1);
$routes->get('users/delete/(:num)', '  UserController'::delete/$1);