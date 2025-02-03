<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->setAutoRoute(true);

$routes->set404Override('App\Controllers\Errors::error404');
$routes->setDefaultNamespace('App\Controllers');

// Set default controller and method.
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->get('/', 'Home::index');

// Set routes for auth.
$routes->get('/login', 'Auth::login');
$routes->get('/register', 'Auth::register');
$routes->get('/logout', 'Auth::logout');
