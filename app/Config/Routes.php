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
