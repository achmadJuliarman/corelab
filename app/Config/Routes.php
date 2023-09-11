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
$routes->post('/pegawai/tambah', 'PegawaiController::tambah');
$routes->post('/pegawai/ubah', 'PegawaiController::ubah');
$routes->delete('/pegawai/hapus', 'PegawaiController::hapus');




// ROUTE UNTUK CORE
$routes->get('/core', 'CoreController::index');
$routes->post('/core/tambah', 'CoreController::tambah');
$routes->delete('/core/hapus', 'CoreController::hapus');










// ROUTE UNTUK EXPORT
$routes->get('pegawai/exportexcel', 'PegawaiController::exportexcel');
$routes->get('pegawai/exportpdf' , 'PegawaiController::exportpdf');