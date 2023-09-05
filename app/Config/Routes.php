<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// ROUTE UNTUK LOGIN
$routes->get('/', 'LoginController::index');
$routes->get('/login', 'LoginController::index');
$routes->post('/', 'LoginController::index');

// ROUTE UNTUK LOGOUT
$routes->get('/login/logout', 'LoginController::logout');


// ROUTE UNTUK USER
$routes->get('/user', 'UserController::index');







// ROUTE UNTUK PEGAWAI
$routes->get('/pegawai', 'PegawaiController::index');






// ROUTE UNTUK CORE
$routes->get('/core', 'CoreController::index');
$routes->get('/core', 'CoreController::index');
