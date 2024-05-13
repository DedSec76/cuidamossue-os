<?php

require_once __DIR__ . '/../includes/app.php';

use Controllers\LoginController;
use MVC\Router;
use Controllers\ArticuloController;
use Controllers\BlogController;
use Controllers\VendedorController;
use Controllers\PaginasController;

$router = new Router();

// Zona privada
$router->get('/admin', [ArticuloController::class, 'index']);
$router->get('/articulos/crear', [ArticuloController::class, 'crear']);
$router->post('/articulos/crear', [ArticuloController::class, 'crear']);
$router->get('/articulos/actualizar', [ArticuloController::class, 'actualizar']);
$router->post('/articulos/actualizar', [ArticuloController::class, 'actualizar']);
$router->post('/articulos/eliminar', [ArticuloController::class, 'eliminar']);

$router->get('/index', [BlogController::class, 'index']);
$router->get('/blogs/crear', [BlogController::class, 'crear']);
$router->post('/blogs/crear', [BlogController::class, 'crear']);
$router->get('/blogs/actualizar', [BlogController::class, 'actualizar']);
$router->post('/blogs/actualizar', [BlogController::class, 'actualizar']);
$router->post('/blogs/eliminar', [BlogController::class, 'eliminar']);

$router->get('/vendedores/crear', [VendedorController::class, 'crear']);
$router->post('/vendedores/crear', [VendedorController::class, 'crear']);
$router->get('/vendedores/actualizar', [VendedorController::class, 'actualizar']);
$router->post('/vendedores/actualizar', [VendedorController::class, 'actualizar']);
$router->post('/vendedores/eliminar', [VendedorController::class, 'eliminar']);

// Zona Publica
$router->get('/', [PaginasController::class, 'index']);
//$router->get('/', [PaginasController::class, 'indexblog']);
$router->get('/nosotros', [PaginasController::class, 'nosotros']);
$router->get('/articulos', [PaginasController::class, 'articulos']);
$router->get('/articulo', [PaginasController::class, 'articulo']);
$router->get('/blogs', [PaginasController::class, 'blogs']);
$router->get('/blog', [PaginasController::class, 'blog']);
$router->get('/contacto', [PaginasController::class, 'contacto']);
$router->post('/contacto', [PaginasController::class, 'contacto']);

// Login y Autenticacion
$router->get('/login', [LoginController::class, 'login']);
$router->post('/login', [LoginController::class, 'login']);
$router->get('/logout', [LoginController::class, 'logout']);

$router->comprobarRutas();

