<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'inicio';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['usuario'] = 'interfaz/usuario/index';
$route['login'] = "inicio/login";
$route['registro'] = "inicio/registro";
$route['procesoRegistro'] = "inicio/procesoRegistro";
