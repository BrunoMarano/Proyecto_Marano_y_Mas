<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('nosotros', 'Home::nosotros');
$routes->get('productos', 'Home::productos');
$routes->get('contacto', 'Home::contacto');
$routes->get('metodos-de-pagos', 'Home::metodosPagos');
$routes->get('sucursales', 'Home::sucursales');
$routes->get('login', 'Home::login');
$routes->post('enviarlogin', 'login_controller::auth');
$routes->get('logout', 'login_controller::logout');
$routes->get('register', 'usuario_controller::create');
$routes->post('enviar-form', 'usuario_controller::formValidation');
$routes->get('error', 'Home::error');
$routes->get('dashboard', 'Dashboard::index', ['filter' => 'auth']);
$routes->get('panel', 'Panel_controller::index', ['filter' => 'auth']);

