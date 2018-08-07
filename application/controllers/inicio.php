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
            'contenido' => "Inicio",
            'posteo' => $this->InicioModel->mostrarPostAnonimo()
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
        if($this->input->is_ajax_request()){
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


    public function postAnonimo(){
        if($this->input->is_ajax_request()){
            $id_post=$this->security->xss_clean(strip_tags($this->input->post("id_post")));
            $nombre=$this->security->xss_clean(strip_tags($this->input->post("nombre")));
            $contenido=$this->security->xss_clean(strip_tags($this->input->post("contenido")));

            $data_insert=array(
                "nombre"=>$nombre,
                "contenido"=>$contenido
            );

            if($this->form_validation->run("postAnonimo") == FALSE){
                echo json_encode(array('res'=>"error", 'msg' => strip_tags(validation_errors())));exit;
            }else{
                if($id_post ==""){
                    if($this->InicioModel->insertarPostAnonimo($data_insert)){
                        echo json_encode(array('res'=>"ok", 'msg' => "publicacion realizada con éxito"));exit;
    
                        //$this->mostrarPostMuro();
                        /*$data=$this->InicioModel->mostrarPost($anonimo,$contenido);
                            if($data!=FALSE){
                                echo json_encode(array("res" => "ok" ,"dato" => $data));
                            }else{
                                echo json_encode(array("res" => "error" , "msg" => "Problemas procesando su solicitud, intente nuevamente."));
                            }*/
                    }else{
                        echo json_encode(array('res'=>"error", 'msg' => "No se ha podido publicar"));exit;
                    }
                }
            }

        }                            
    }

    /*public function mostrarPostMuro(){
            $anonimo=$this->security->xss_clean(strip_tags($this->input->post("anonimo")));
            $contenido=$this->security->xss_clean(strip_tags($this->input->post("contenido")));
            //$imagen=$this->security->xss_clean(strip_tags($this->input->post("imagen")));

            $data_mostrar=array(
                "anonimo"=>$anonimo,
                "contenido"=>$contenido
            );
            $data=$this->InicioModel->mostrarPost($data_mostrar);
            if($data!=FALSE){
                echo json_encode(array("res" => "ok" ,"dato" => $data));
            }else{
                echo json_encode(array("res" => "error" , "msg" => "Problemas procesando su solicitud, intente nuevamente."));
            }
    }*/
}
