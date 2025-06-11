<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('Nosotros', 'Home::Nosotros');
$routes->get('Productos', 'Home::Productos');
$routes->get('Contacto', 'Home::Contacto');
$routes->get('Metodos-de-pagos', 'Home::MetodosPagos');
$routes->get('sucursales', 'Home::sucursales');
$routes->get('login', 'Home::login');
$routes->post('enviarlogin', 'login_controller::auth');
$routes->get('logout', 'login_controller::logout');
$routes->get('register', 'usuario_controller::create');
$routes->post('enviar-form', 'usuario_controller::formValidation');
$routes->get('error', 'Home::error');
$routes->get('altaProducto', 'altaProducto::index', ['filter' => 'auth']);
$routes->get('panel', 'Panel_controller::index', ['filter' => 'auth']);

