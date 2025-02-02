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

