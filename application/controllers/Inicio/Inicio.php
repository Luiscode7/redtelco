<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

    public function __construct(){
		parent::__construct();
        
        $this->load->model("inicio/inicioModel", "in");
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
                        'foto_perfil'=>$res->foto_perfil,
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
                    if($data=$this->in->insertarUsuario($data_insert)){
                        $correo=$this->in->mostrarCorreo($data);
                        $nombre=$this->in->mostrarNombre($data);
                        $this->enviarDatosUsuario($correo,$nombre,$pass);
                        echo json_encode(array('res'=>"ok", 'msg' => "Se han enviado los datos a su correo "));exit;
                    }else{
                        echo json_encode(array('res'=>"error", 'msg' => ERROR_MSG));exit;
                    }
                }else{
                    echo json_encode(array('res'=>"error", 'msg' => "el usuario ya existe"));exit;
                }    
            }
        }    
    }

    public function ReestablecerPass(){
        if($this->input->is_ajax_request()){
            $correo=$this->security->xss_clean(strip_tags($this->input->post("email")));
            $pass=$this->security->xss_clean(strip_tags($this->input->post("pass")));
            $pass2=sha1($pass);

            if ($this->form_validation->run("ReestablecerPass") == FALSE){
                echo json_encode(array('res'=>"error", 'msg' => strip_tags(validation_errors())));exit;
            }else{

                $data_insert=array(
                    "contrasehna"=>$pass2
                );

                $check = $this->in->verificarCorreo($correo);
                if($check != false){
                    if($this->in->actualizarPass($check,$data_insert)){
                        $nombre=$this->in->mostrarNombrePorCorreo($check);
                        $this->enviarNuevaPass($check,$nombre,$pass);
                        echo json_encode(array('res'=>"ok", 'msg' => "Se ha enviado la nueva contraseña a su correo "));
                    }else{
                        echo json_encode(array('res'=>"error", 'msg' => ERROR_MSG));exit;
                    }
                }else{
                    echo json_encode(array('res2'=>"error", 'msg' => "el correo ingresado no existe"));exit;
                }
            }
        }
    }

    public function enviarDatosUsuario($correo,$nombre,$pass){
        $this->load->library("email");
        $mensaje = 'Estimado(a) '.$nombre.'.';
        $mensaje .= ''." ".'';
        $mensaje .= 'Le damos la más cordial bienvenida a RedTelco.';
        $mensaje .= ''." ".'';
        $mensaje .= 'Sus datos son los siguientes:';
        $mensaje .= ''." ".'';
        $mensaje .= 'Nombre usuario: '.$correo.'';
        $mensaje .= ''." ".'';
        $mensaje .= 'Contraseña: '.$pass.'';
        $asunto = 'Bienvenido(a) a RedTelco';
        $this->email->from('luiseduardo.venegas7@gmail.com','RedTelco');
        $this->email->to($correo);
        $this->email->subject($asunto);
        $this->email->message($mensaje);
        $this->email->send();
    }

    public function enviarNuevaPass($correo,$nombre,$pass){
        $this->load->library("email");
        $mensaje = 'Estimado(a) '.$nombre.'.';
        $mensaje .= ''." ".'';
        $mensaje .= 'Su nueva contraseña es la siguiente:';
        $mensaje .= ''." ".'';
        $mensaje .= ''.$pass.'';
        $asunto = 'Reestablecer Contraseña de usuario RedTelco';
        $this->email->from('luiseduardo.venegas7@gmail.com','RedTelco');
        $this->email->to($correo);
        $this->email->subject($asunto);
        $this->email->message($mensaje);
        $this->email->send();
    }


}