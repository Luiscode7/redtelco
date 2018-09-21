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
        
        ),

      'postAnonimo' => array(
            array(
                  'field'   => 'nombre',
                  'rules'   => 'required'
            ),
            array(
                  'field'   => 'contenido',
                  'rules'   => 'required'
            )
      ),

      'Comentarios' => array(
            array(
                  'field'   => 'comentario',
                  'rules'   => 'required'
            )
      ),

      'ComentariosUsu' => array(
            array(
                  'field'   => 'comentariousu',
                  'rules'   => 'required'
            )
      ),

      'postUsuario' => array(
            array(
                  'field'   => 'contenido_usuario',
                  'rules'   => 'required'
            )
      ),

      'login' => array(
            array(
                  'field'   => 'correo',
                  'rules'   => 'required|valid_email'
            ),

            array(
                  'field'   => 'pass',
                  'rules'   => 'required'
            )
      ),

      'EditarPerfil' => array(
            array(
                  'field'   => 'nombre',
                  'rules'   => 'required'
            ),

            array(
                  'field'   => 'apellidos',
                  'rules'   => 'required'
            )
      ),

      'ReestablecerPass' => array(
            array(
                  'field'   => 'email',
                  'rules'   => 'required|valid_email'
            ),

            array(
                  'field'   => 'pass',
                  'rules'   => 'required'
            ),

            array(
                  'field'   => 'pass2',
                  'rules'   => 'required'
            ),
      )
);