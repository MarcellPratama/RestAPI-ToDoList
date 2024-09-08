<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
$routes->get('/', 'TodolistController::index');
$routes->get('/login', 'TodolistController::login');
$routes->post('/loginSubmit', 'TodolistController::loginSubmit');
$routes->post('/addTask', 'TodolistController::addTask');
$routes->get('/updateTaskStatus/(:num)', 'TodolistController::updateTaskStatus/$1');
$routes->get('/deleteTask/(:num)', 'TodolistController::deleteTask/$1');
$routes->get('/logout', 'TodolistController::logout');

