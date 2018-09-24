<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$active_group = 'default';
$query_builder = TRUE;


/*if($_SERVER["HTTP_HOST"]=="localhost"){
	$hostname='localhost';
	$username='root';
	$password='asdf1212';
	//$password='';
	$database='redtelco';
 }else{
 	$hostname='localhost';
	$username='ceningen_redtelc';
	$password='@*WMbKD{^Mkz';
	$database='ceningen_redtelco';
 }*/

 if($_SERVER["HTTP_HOST"]=="localhost"){
	$hostname='localhost';
	$username='root';
	$password='asdf1212';
	//$password='';
	$database='redtelco';
 }else{
 	$hostname='sql206.epizy.com';
	$username='epiz_22741452';
	$password='VnbfUdsCqFR8ylQ';
	$database='epiz_22741452_redtelco';
 }
 

$db['default'] = array(
	'dsn'	=> '',
	'hostname' => $hostname,
	'username' => $username,
	'password' => $password,
	'database' => $database,
	/*'hostname' => 'localhost',
	'username' => 'root',
	'password' => 'asdf1212',
	'password' => '',
	'database' => 'redtelco',*/
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);
