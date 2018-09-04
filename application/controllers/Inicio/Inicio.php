<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

    public function __construct(){
		parent::__construct();
        
        $this->load->model("Inicio/InicioModel", "in");
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

    public function cerrarSesion(){
        $this->session->sess_destroy();
    }

    public function procesoLogin(){
        if($this->input->is_ajax_request()){
            $correo=$this->security->xss_clean(strip_tags($this->input->post("correo")));
            $pass=$this->security->xss_clean(strip_tags($this->input->post("pass")));
            $res = $this->in->login($correo, sha1($pass));

            if ($this->form_validation->run("login") == FALSE){
                echo json_encode(array('res'=>"error", 'msg' => strip_tags(validation_errors())));exit;
            }else{	

                if(!$res){
                    echo json_encode(array('res'=>"error", 'msg' => "El usuario o contraseña no existe, intente nuevamente"));exit;
                }
                else{
                    $data = array(
                        'id' => $res->id,
                        'nombre'=>$res->nombre,
                        'apellidos'=>$res->apellidos,
                        'procesoLogin' => TRUE
                    );
                    $dato = $this->session->set_userdata($data);
                    if($this->session->userdata($dato)){
                        echo json_encode(array('res'=>"ok"));exit;
                    }else{
                        echo json_encode(array('res'=>"error", 'msg' => ERROR_MSG));exit;
                    }
                }    
            }
        }
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

                $check = $this->in->verificarCuenta($correo);
                if($check == false){
                    if($this->in->insertarUsuario($data_insert)){
                        echo json_encode(array('res'=>"ok", 'msg' => OK_MSG));exit;
                    }else{
                        echo json_encode(array('res'=>"error", 'msg' => ERROR_MSG));exit;
                    }
                }else{
                    echo json_encode(array('res'=>"error", 'msg' => "el usuario ya existe"));exit;
                }    
            }
        }    
    }


}