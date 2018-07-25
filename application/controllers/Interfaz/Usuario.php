<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

    public function __construct(){
		parent::__construct();
	
    }
    
	public function index()
	{
        $contenido2 = array(
            'titulo' => "Portal Usuario", 
            'contenido2' => "usuario"
        );
        $this->load->view('plantilla/plantilla2', $contenido2);
    }
}
