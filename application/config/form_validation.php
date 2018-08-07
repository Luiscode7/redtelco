<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config = array(
    'registro' => array(
        array(
              'field'   => 'nombre',
              'rules'   => 'trim|required'
             ),
        array(
              'field'   => 'apellidos',
              'rules'   => 'required'
             ),
        array(
              'field'   => 'correo',
              'rules'   => 'required|valid_email'
             ),

        array(
              'field'   => 'pass',
              'rules'   => 'trim|required'
        ),

        array(
            'field'   => 'pass2',
            'rules'   => 'trim|required'
           )
        
     )
);