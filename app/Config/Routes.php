<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'dashboard::index');
$routes->get('/supplier/hapus/(:segment)', 'Supplier::hapus/$1');
$routes->get('/supplier/edit/(:segment)', 'Supplier::edit/$1');
$routes->put('/supplier/ubah/(:segment)', 'Supplier::ubah/$1');
$routes->get('/bobot/hapus/(:segment)', 'bobot::hapus/$1');
$routes->get('/bobot/edit/(:segment)', 'bobot::edit/$1');
$routes->put('/bobot/ubah/(:segment)', 'bobot::ubah/$1');
$routes->get('/kriteria/edit/(:segment)', 'kriteria::edit/$1');
$routes->put('/kriteria/ubah/(:segment)', 'kriteria::ubah/$1');
$routes->put('/parameter/edit/(:segment)', 'parameter::edit/$1');
$routes->put('/parameter/ubah/(:segment)', 'parameter::ubah/$1');
$routes->put('/penilaian/edit/(:segment)', 'penilaian::edit/$1');
$routes->put('/penilaian/ubah/(:segment)', 'penilaian::ubah/$1');
$routes->get('/utility/hitung', 'Utility::hitung');  
$routes->post('utility/hapussemua', 'Utility::hapussemua');
$routes->put('/user/edit/(:segment)', 'user::edit/$1');
$routes->put('/user/ubah/(:segment)', 'user::ubah/$1');
$routes->post('auth/kirimreset', 'Auth::kirimReset');
$routes->get('auth/resetPassword/(:any)', 'Auth::resetPassword/$1'); 
$routes->post('auth/simpanPassword', 'Auth::simpanPassword'); 
$routes->setAutoRoute(true); 


