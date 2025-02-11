<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->add('/', 'BookController::index');
$routes->add('book', 'BookController::index');
$routes->add('book/create', 'BookController::create');
$routes->post('book/store', 'BookController::store');
$routes->add('book/edit/(:any)', 'BookController::edit/$1');
$routes->post('book/update/(:any)', 'BookController::update/$1');
$routes->add('book/delete/(:any)', 'BookController::delete/$1');

$routes->get('/customers', 'CustomerController::user');
$routes->get('/customers/user', 'CustomerController::user');
$routes->post('/customers/store', 'CustomerController::store');
$routes->get('/customers/edit/(:any)', 'CustomerController::edit/$1');
$routes->post('/customers/update/(:any)', 'CustomerController::update/$1');
$routes->get('/customers/delete/(:any)', 'CustomerController::delete/$1');

$routes->get('loans', 'LoanController::index');
$routes->get('loans/create', 'LoanController::create');
$routes->post('loans/store', 'LoanController::store');
$routes->get('loans/edit/(:any)', 'LoanController::edit/$1');
$routes->post('loans/update/(:any)', 'LoanController::update/$1');
$routes->get('loans/delete/(:any)', 'LoanController::delete/$1');



/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
