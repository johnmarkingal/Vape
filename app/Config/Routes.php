<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/auth/login', 'Auth::login');
$routes->post('/auth/loginProcess', 'Auth::loginProcess');
$routes->get('/auth/logout', 'Auth::logout');

$routes->get('/auth/register', 'Auth::register');
$routes->post('/auth/registerProcess', 'Auth::registerProcess');

$routes->get('/dashboard', 'Dashboard::index');
$routes->get('/dashboard/profile', 'Dashboard::profile');
$routes->get('/dashboard/settings', 'Dashboard::settings');
$routes->post('/dashboard/changePassword', 'Dashboard::changePassword');

$routes->get('/dashboard/profile', 'Dashboard::profile');
$routes->get('/dashboard/edit-profile', 'Dashboard::editProfile');
$routes->post('/dashboard/updateProfile', 'Dashboard::updateProfile');

$routes->get('/products', 'ProductController::index');
$routes->get('/products/create', 'ProductController::create');
$routes->post('/products/store', 'ProductController::store');
$routes->get('/products/edit/(:num)', 'ProductController::edit/$1');
$routes->post('/products/update/(:num)', 'ProductController::update/$1');
$routes->get('/products/delete/(:num)', 'ProductController::delete/$1');

$routes->get('/suppliers', 'SupplierController::index');
$routes->get('/suppliers/create', 'SupplierController::create');
$routes->post('/suppliers/store', 'SupplierController::store');
$routes->get('/suppliers/edit/(:num)', 'SupplierController::edit/$1');
$routes->post('/suppliers/update/(:num)', 'SupplierController::update/$1');
$routes->get('/suppliers/delete/(:num)', 'SupplierController::delete/$1');