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

$routes->get('stock_in', 'StockInController::index');
$routes->get('stock_in/create', 'StockInController::create');
$routes->post('stock_in/store', 'StockInController::store');
$routes->get('stock_in/edit/(:num)', 'StockInController::edit/$1');  
$routes->post('stock_in/update/(:num)', 'StockInController::update/$1');
$routes->get('stock_in/delete/(:num)', 'StockInController::delete/$1');

$routes->get('/sales', 'SaleController::index');
$routes->get('/sales/create', 'SaleController::create');
$routes->post('/sales/store', 'SaleController::store');
$routes->get('/sales/edit/(:segment)', 'SaleController::edit/$1');
$routes->post('/sales/update/(:segment)', 'SaleController::update/$1');
$routes->get('/sales/delete/(:segment)', 'SaleController::delete/$1');

$routes->get('/sales', 'SaleController::index');
$routes->get('/sales/create', 'SaleController::create');
$routes->post('/sales/store', 'SaleController::store');
$routes->get('/sales/edit/(:segment)', 'SaleController::edit/$1');
$routes->post('/sales/update/(:segment)', 'SaleController::update/$1');
$routes->get('/sales/delete/(:segment)', 'SaleController::delete/$1');

$routes->get('/sales-details', 'SalesDetailsController::index');
$routes->get('/sales-details/create', 'SalesDetailsController::create');
$routes->post('/sales-details/store', 'SalesDetailsController::store');
$routes->get('/sales-details/edit/(:num)', 'SalesDetailsController::edit/$1');
$routes->post('/sales-details/update/(:num)', 'SalesDetailsController::update/$1');
$routes->get('/sales-details/delete/(:num)', 'SalesDetailsController::delete/$1');

$routes->get('inventory-dashboard', 'InventoryDashboardController::index');
$routes->get('inventory-dashboard/view/(:num)', 'InventoryDashboardController::view/$1');
$routes->match(['get', 'post'], 'inventory-dashboard/edit/(:num)', 'InventoryDashboardController::edit/$1');
$routes->get('inventory-dashboard/delete/(:num)', 'InventoryDashboardController::delete/$1');

$routes->get('inventory-dashboard', 'InventoryDashboardController::index');
