<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('todolist', 'TodolistControllerAPI::index');
$routes->post('todolist', 'TodolistControllerAPI::create');
$routes->put('todolist/(:num)', 'TodolistControllerAPI::update/$1');
$routes->delete('todolist/(:num)', 'TodolistControllerAPI::delete/$1');

// User login routes
$routes->get('login', 'UserController::loginView');
$routes->post('loginSubmit', 'UserController::login');
$routes->get('logout', 'UserController::logout');

