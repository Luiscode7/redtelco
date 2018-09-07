<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'anonimo';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/* ------- INICIO ---------- */

$route['registro'] = "inicio/inicio/registro";
$route['procesoRegistro'] = "inicio/inicio/procesoRegistro";
$route['login'] = "inicio/inicio/login";
$route['procesoLogin'] = "inicio/inicio/procesoLogin";
$route['cerrarSesion'] = "inicio/inicio/cerrarSesion";

/* ------- PORTAL ANONIMO ---------- */

$route['postAnonimo'] = "anonimo/postAnonimo";
$route['mostrarPostMuro'] = "anonimo/mostrarPostMuro";
$route['meGusta'] = "anonimo/meGusta";
$route['mostrarMuroTodos'] = "anonimo/mostrarMuroTodos";
$route['nomeGusta'] = "anonimo/nomeGusta";
$route['Comentarios'] = "anonimo/Comentarios";
$route['mostrarComPublicados'] = "anonimo/mostrarComPublicados";

/* ------- PORTAL USUARIO ---------- */

$route['usuario'] = 'interfaz/usuario/index';
$route['postUsuario'] = "interfaz/usuario/postUsuario";
$route['meGustaUsu'] = "interfaz/usuario/meGustaUsu";
$route['NomeGustaUsu'] = "interfaz/usuario/NomeGustaUsu";
$route['mostrarComPublicadosUsu'] = "interfaz/usuario/mostrarComPublicadosUsu";
$route['ComentariosUsu'] = "interfaz/usuario/ComentariosUsu";
$route['MuroAnonimo'] = "interfaz/usuario/MuroAnonimo";
$route['redirectEditarPerfil'] = "interfaz/usuario/redirectEditarPerfil";
$route['editarPerfil'] = "interfaz/usuario/editarPerfil";
$route['mostrarUsuarios'] = "interfaz/usuario/mostrarUsuarios";
