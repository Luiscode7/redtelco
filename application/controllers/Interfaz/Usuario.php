<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

    public function __construct(){
		parent::__construct();
        
        $this->load->model("Usuario/UsuarioModel", "usu");
        $this->load->model("Anonimo/AnonimoModel");
    }
    
	public function index()
	{
        if(!$this->session->userdata("procesoLogin")){
            redirect(base_url());
        }
        $id = $this->session->userdata("id");
        $contenido2 = array(
            'titulo' => "Portal Usuario", 
            'contenido2' => "usuario",
            'posteos_usu' => $this->usu->mostrarMuroUsuario($id) 
        );
        $this->load->view('plantilla/plantilla2', $contenido2);
    }

    public function MuroAnonimo(){
        $contenido3 = array(
            'titulo' => "Portal General", 
            'contenido3' => "anonimo",
            'posteo'=> $this->AnonimoModel->mostrarMuroAnonimo()
        );
        $this->load->view('plantilla/plantilla3', $contenido3);
    }

    public function postUsuario(){
        if($this->input->is_ajax_request()){
            $id_post_usu=$this->security->xss_clean(strip_tags($this->input->post("id_post_usuario")));
            $usuario=$this->security->xss_clean(strip_tags($this->input->post("id_usuario")));
            $contenido_usuario=$this->security->xss_clean(strip_tags($this->input->post("contenido_usuario")));

            $config = [
                "upload_path" => "./assest/imagenes/subidas",
                "allowed_types" => "png|jpg|jpeg|gif"
            ];
            $this->load->library("upload", $config);

            $this->upload->do_upload('uploadimagen');

            if(!$config["allowed_types"]){
                echo json_encode(array('res'=>"error", 'msg' => "Solo se aceptan imagenes png, jpg, jpeg y gif"));exit;
            }

            $imagen = array("upload_imagen" => $this->upload->data());
            $data_insert=array(
                "id_usuario"=>$usuario,
                "contenido"=>$contenido_usuario,
                "imagen"=>$imagen['upload_imagen']['file_name']
            );

            if($this->form_validation->run("postUsuario") == FALSE){
                echo json_encode(array('res'=>"error", 'msg' => strip_tags(validation_errors())));exit;
            }else{
                if($id_post_usu ==""){
                    if($this->usu->InsertarPostUsuario($data_insert)){
                        echo json_encode(array('res'=>"ok", 'msg' => "publicacion realizada con éxito"));exit;
                    }else{
                        echo json_encode(array('res'=>"error", 'msg' => "No se ha podido publicar"));exit;
                    }
                }
            }

        }
    }

    public function ComentariosUsu(){
        if($this->input->is_ajax_request()){
            $id_comment=$this->security->xss_clean(strip_tags($this->input->post("id_commentusu")));
            $id_publicacionusu=$this->security->xss_clean(strip_tags($this->input->post("id_publicacionusu")));
            $comentario=$this->security->xss_clean(strip_tags($this->input->post("comentariousu")));

                $datos_insert = array(
                    "com_id_usu" => $id_publicacionusu,
                    "comentario_usu" => $comentario
                );

                if($this->form_validation->run("ComentariosUsu") == FALSE){
                    echo json_encode(array('res'=>"error", 'msg' => strip_tags(validation_errors())));exit;
                }else{
                    if($data=$this->usu->insertarComentario($datos_insert)){
                        $datos=$this->usu->mostrarComentarioUsuario($data,$id_publicacionusu);
                        echo json_encode(array('res' => "ok", 'datos' => $datos));
                    }else{
                        echo json_encode(array('res'=>"error"));exit;
                    }
                }
            
        }
    }


    public function mostrarComPublicadosUsu(){
        $id_publicacion=$this->security->xss_clean(strip_tags($this->input->post("id_publicacionshowusu")));
        $data=$this->usu->mostrarComPublicadosUsu($id_publicacion);
        if($data){
            echo json_encode(array('res'=>"ok", 'datos' => $data));exit;
        }else{
            echo json_encode(array('res'=>"error", 'msg' => ERROR_MSG));exit;
        }	

}

    public function meGustaUsu(){
        if($this->input->is_ajax_request()){
            $id_usuario=$this->security->xss_clean(strip_tags($this->input->post("id_usuariomg")));
            $ip = $this->input->ip_address();

            $datos_insert = array(
                "mg_id_usu" => $id_usuario,
                "mg_ip_usu" => $ip
            );

            if($this->usu->insertarMeGusta($datos_insert)){
                $data=$this->usu->mostrarMgUsu($id_usuario);
                echo json_encode(array('datos' => $data));
            }else{
                echo json_encode(array('res'=>"error"));exit;
            }
        }
    }

    public function NomeGustaUsu(){
        if($this->input->is_ajax_request()){
            $id_usuario=$this->security->xss_clean(strip_tags($this->input->post("id_usuarionomg")));
            $ip = $this->input->ip_address();

            $datos_insert = array(
                "nmg_id_usu" => $id_usuario,
                "nmg_ip" => $ip
            );

            if($this->usu->insertarNoMeGusta($datos_insert)){
                $data=$this->usu->mostrarNoMgUsu($id_usuario);
                echo json_encode(array('datos' => $data));
            }else{
                echo json_encode(array('res'=>"error"));exit;
            }
        }
    }

}
