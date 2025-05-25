<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('Nosotros', 'Home::nosotros');
$routes->get('Productos', 'Home::productos');
$routes->get('Contacto', 'Home::contacto');
$routes->get('Metodos de Pagos', 'Home::metodosPagos');
$routes->get('Sucursales', 'Home::sucursales');
$routes->get('Login', 'Home::login');
$routes->get('register', 'usuario_controller::create');
$routes->post('/enviar-form', 'usuario_controller::formValidation');
$routes->get('Error', 'Home::error');
$routes->get('/dashboard', 'Dashboard:Index',['filter'=>'auth']);
$routes->post('/enviarlogin', 'login_controller::auth');
$routes->get('/panel', 'Panel_controller::index', ['filter' => 'auth']);
$routes->get('/logout', 'login_controller::logout');
$routes->post('usuario/login', 'login_controller::auth');
