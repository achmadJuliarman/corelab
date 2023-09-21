<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// ROUTE UNTUK LOGIN
$routes->get('/login', 'LoginController::index', ['filter' => 'stayPegawai']);
$routes->get('/', 'LoginController::index');
$routes->get('/login', 'LoginController::index');
$routes->post('/', 'LoginController::index');

// ROUTE UNTUK LOGOUT
$routes->get('/login/logout', 'LoginController::logout');


// ROUTE UNTUK USER
$routes->get('/user', 'UserController::index');


//ROUTE UNTUK ERROR
$routes->get('/error-page', 'ErrorController::index');



// ROUTE UNTUK PEGAWAI
$routes->get('/pegawai', 'PegawaiController::index', ['filter' => 'stayLogin']);
$routes->post('/pegawai/tambah', 'PegawaiController::tambah');
$routes->post('/pegawai/ubah', 'PegawaiController::ubah');
$routes->delete('pegawai/hapus/(:num)', 'PegawaiController::hapus/$1');
$routes->get('pegawai/index', 'PegawaiController::index');





// ROUTE UNTUK CORE
$routes->get('/core', 'CoreController::index', ['filter' => 'stayLogin']);
$routes->post('/core/tambah', 'CoreController::tambah');
$routes->post('/core/edit', 'CoreController::edit');
$routes->delete('core/hapus/(:num)', 'CoreController::hapus/$1');
$routes->get('core/old_index', 'CoreController::old_index');


// ROUTE UNTUK DASHBOARD
$routes->get('/dashboard', 'PagesController::index', ['filter' => 'stayDashboard']);







// ROUTE UNTUK EXPORT
$routes->get('pegawai/exportexcel', 'PegawaiController::exportexcel');
$routes->get('pegawai/exportpdf', 'PegawaiController::exportpdf');
$routes->get('core/exportexcel', 'CoreController::exportexcel');
$routes->get('core/exportpdf', 'CoreController::exportpdf');
