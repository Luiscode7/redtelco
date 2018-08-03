<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config = array(
    'registro' => array(
        array(
              'field'   => 'nombre',
              'label'   => 'nombre',
              'rules'   => 'trim|required'
             ),
        array(
              'field'   => 'apellidos',
              'label'   => 'apellidos',
              'rules'   => 'required'
             ),
        array(
              'field'   => 'correo',
              'label'   => 'correo',
              'rules'   => 'required|valid_email'
             ),

        array(
              'field'   => 'pass',
              'label'   => 'pass',
              'rules'   => 'trim|required'
        ),

        array(
            'field'   => 'pass',
            'label'   => 'pass',
            'rules'   => 'trim|required'
           )
        
     )
);