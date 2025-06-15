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
$routes->get('altaProducto', 'Home::altaProducto', ['filter' => 'auth']);
$routes->get('panel', 'Panel_controller::index', ['filter' => 'auth']);

$routes->get('/crear', 'producto_controller::index', ['filter' => 'auth']);
$routes->get('/agregar', 'producto_controller::index', ['filter' => 'auth']);
$routes->get('/produ-form', 'producto_controller::creaproducto', ['filter' => 'auth']);
$routes->post('/enviar-prod', 'producto_controller::store', ['filter' => 'auth']);
$routes->get('/editar/(:num)', 'producto_controller::singleproducto/$1', ['filter' => 'auth']);
$routes->post('modifica/(:num)', 'producto_controller::modifica/$1', ['filter' => 'auth']);
$routes->get('borrar/(:num)', 'producto_controller::deleteproducto/$1');
$routes->get('/eliminados', 'producto_controllerr:eliminados', ['filter' => 'auth']);
$routes->get('activar_pro/(:num)', 'producto_controllerr:activarproducto/$1', ['filter' => 'auth']);



