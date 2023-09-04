<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/login', 'LoginController::index');
$routes->get('/pegawai', 'PegawaiController::index');
$routes->get('/user', 'UserController::index');
$routes->get('/core', 'CoreController::index');
