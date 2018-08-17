<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'inicio';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['usuario'] = 'interfaz/usuario/index';
$route['login'] = "inicio/login";
$route['registro'] = "inicio/registro";
$route['procesoRegistro'] = "inicio/procesoRegistro";
$route['postAnonimo'] = "inicio/postAnonimo";
$route['mostrarPostMuro'] = "inicio/mostrarPostMuro";
$route['meGusta'] = "inicio/meGusta";
$route['mostrarMuroTodos'] = "inicio/mostrarMuroTodos";

$route['postUsuario'] = "usuario/postUsuario";
