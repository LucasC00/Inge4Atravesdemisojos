<?php

require 'router.php';
require 'src/Controller/HomeController.php';
require 'src/Controller/LoginController.php';
require 'src/Controller/RegistroController.php';
require 'src/Controller/RecursosController.php';
require 'src/Controller/ConfiguracionController.php';

$router = new Router();

// Rutas - HomeController
$router->addRoute('GET', '/home', 'HomeController@showHome');

// Rutas - LoginController
$router->addRoute('GET', '/login', 'LoginController@showLogin');
$router->addRoute('POST', '/login-autenticar', 'LoginController@autenticarUsuario');

// Rutas - RegistroController
$router->addRoute('GET', '/registro-usuario', 'RegistroController@showRegistro');
$router->addRoute('POST', '/registro-realizar', 'RegistroController@registrarusuario');

// Rutas - RecursosController
$router->addRoute('GET', '/recursos-externos', 'RecursosController@imprimirHTML');

// Rutas - ConfiguracionController
$router->addRoute('GET', '/configuracion-usuario', 'ConfiguracionController@showConfiguracion');
$router->addRoute('POST', '/configuracion-realizar', 'ConfiguracionController@configurarusuario');

//Manejar solicitud
$router->handleRequest();