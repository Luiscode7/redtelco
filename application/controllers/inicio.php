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
            'posteo' => $this->InicioModel->mostrarMuroAnonimo(),
            'publicaciones' => $this->InicioModel->countPublicaciones(),
            'countMg' => $this->InicioModel->cantidadMg(),
            'countNoMg' => $this->InicioModel->cantidadNoMg(),
            'countComentarios' => $this->InicioModel->cantidadComentarios(),
            //'comentario' => $this->mostrarComPublicados()
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
                    if($dataid=$this->InicioModel->insertarPostAnonimo($data_insert)){
                        $datos=$this->InicioModel->mostrarPostAnonimo($dataid);
                        echo json_encode(array('res'=>"ok", 'msg' => "publicacion realizada con éxito", 'datos' => $datos));exit;
                    }else{
                        echo json_encode(array('res'=>"error", 'msg' => "No se ha podido publicar"));exit;
                    }

                }
            }
        }                            
    }


    public function meGusta(){
        if($this->input->is_ajax_request()){
            $id_publicacion=$this->security->xss_clean(strip_tags($this->input->post("id_publicacionmg")));
            $ip=$this->input->ip_address();

                $datos_insert = array(
                    "mg_id_publicacion" => $id_publicacion,
                    "mg_ip" => $ip
                );
            
                if($this->InicioModel->insertarMeGusta($datos_insert)){
                    $data=$this->InicioModel->mostrarMg($id_publicacion);
                    echo json_encode(array('datos' => $data));
                }else{
                    echo json_encode(array('res'=>"error"));exit;
                }
            
        }
    }

    public function nomeGusta(){
        if($this->input->is_ajax_request()){
            $id_publicacion=$this->security->xss_clean(strip_tags($this->input->post("id_publicacionomg")));
            $ip=$this->input->ip_address();

                $datos_insert = array(
                    "nmg_id_publicacion" => $id_publicacion,
                    "nmg_ip" => $ip
                );
            
                if($this->InicioModel->insertarNoMeGusta($datos_insert)){
                    $data=$this->InicioModel->mostrarNoMg($id_publicacion);
                    echo json_encode(array('datos' => $data));
                }else{
                    echo json_encode(array('res'=>"error"));exit;
                }
            
        }
    }

    public function Comentarios(){
        if($this->input->is_ajax_request()){
            $id_comment=$this->security->xss_clean(strip_tags($this->input->post("id_comment")));
            $id_publicacionc=$this->security->xss_clean(strip_tags($this->input->post("id_publicacionc")));
            $comentario=$this->security->xss_clean(strip_tags($this->input->post("comentario")));

                $datos_insert = array(
                    "com_id_publicacion" => $id_publicacionc,
                    "comentario" => $comentario
                );
            
                if($data=$this->InicioModel->insertarComentario($datos_insert)){
                    $datos=$this->InicioModel->mostrarComentarioAnonimo($data,$id_publicacionc);
                    echo json_encode($datos);
                }else{
                    echo json_encode(array('res'=>"error"));exit;
                }
            
        }
    }

    public function mostrarComPublicados(){
            $id_publicacion=$this->security->xss_clean(strip_tags($this->input->post("id_publicacionshow")));
            $data=$this->InicioModel->mostrarComPublicados($id_publicacion);
            if($data){
                echo json_encode(array('res'=>"ok", 'datos' => $data));exit;
            }else{
                echo json_encode(array('res'=>"error", 'msg' => ERROR_MSG));exit;
            }	
    
    }

    public function agrega_miniatura($width,$height,$nombre){
		$config["source_image"]='./assets/imagenes/noticias/'.$nombre;
		$config['new_image'] = "min_".$nombre;
		$config["width"]=$width;
		$config["height"]=$height;
		$config["quality"]='90%';
		$config["maintain_ratio"]=TRUE;
		$config["maintain_ratio"]=TRUE;
		return $config;
	}

}
