<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'UsersController::index');
$routes->post('/login', 'UsersController::login');
$routes->get('/etudiants', 'EtudiantController::list');
