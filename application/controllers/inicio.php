<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

    public function __construct(){
		parent::__construct();
        
        $this->load->model("InicioModel");
    }
    
	public function index()
	{
        $contenido = array(
            'titulo' => "Portal", 
            'contenido' => "inicio"
        );
        $this->load->view('plantilla/plantilla', $contenido);
    }

    public function login(){
        $datos = array(
            'titulo' => "Login"
        );
        $this->load->view('login', $datos);
    }

    public function registro(){
        $datos = array(
            'titulo' => "Registro"
        );
        $this->load->view('registro', $datos);
    }

    public function procesoRegistro(){
        $id_usuario=$this->security->xss_clean(strip_tags($this->input->post("id_usuario")));
        $nombre=$this->security->xss_clean(strip_tags($this->input->post("nombre")));
        $apellidos=$this->security->xss_clean(strip_tags($this->input->post("apellidos")));
        $correo=$this->security->xss_clean(strip_tags($this->input->post("correo")));
        $pass=$this->security->xss_clean(strip_tags($this->input->post("pass")));
        $pass2=sha1($pass);

        if ($this->form_validation->run("registro") == FALSE){
            echo json_encode(array('res'=>"error", 'msg' => strip_tags(validation_errors())));exit;
        }else{	

            $data_insert=array(
                "nombre"=>$nombre,
                "apellidos"=>$apellidos,
                "correo"=>$correo,
                "contrasehna"=>$pass2
            );

            if($id_usuario==""){
                if($this->InicioModel->insertarUsuario($data_insert)){
                    echo json_encode(array('res'=>"ok", 'msg' => OK_MSG));exit;
                }else{
                    echo json_encode(array('res'=>"error", 'msg' => ERROR_MSG));exit;
                }
            }
        }    
        
    }

}
