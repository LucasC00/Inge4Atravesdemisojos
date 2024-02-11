<?php

require 'router.php';
require 'src/Controller/HomeController.php';
require 'src/Controller/LoginController.php';
require 'src/Controller/RegistroController.php';
require 'src/Controller/RecursosController.php';
require 'src/Controller/ConfiguracionController.php';

$router = new Router();

// Rutas - HomeController
$router->addRoute('GET', '/app/home', 'HomeController@showHome');

// Rutas - LoginController
$router->addRoute('GET', '/app/login', 'LoginController@showLogin');
$router->addRoute('POST', '/app/login-autenticar', 'LoginController@autenticarUsuario');

// Rutas - RegistroController
$router->addRoute('GET', '/app/registro-usuario', 'RegistroController@showRegistro');
$router->addRoute('POST', '/app/registro-realizar', 'RegistroController@registrarusuario');

// Rutas - RecursosController
$router->addRoute('GET', '/app/recursos-externos', 'RecursosController@imprimirHTML');

// Rutas - ConfiguracionController
$router->addRoute('GET', '/app/configuracion-usuario', 'ConfiguracionController@showConfiguracion');
$router->addRoute('POST', '/app/configuracion-realizar', 'ConfiguracionController@configurarusuario');

//Manejar solicitud
$router->handleRequest();