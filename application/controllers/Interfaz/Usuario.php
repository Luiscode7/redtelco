<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

    public function __construct(){
		parent::__construct();
        
        $this->load->model("Usuario/UsuarioModel", "usu");
    }
    
	public function index()
	{
        $contenido2 = array(
            'titulo' => "Portal Usuario", 
            'contenido2' => "usuario",
            'posteos_usu' => $this->usu->mostrarPostUsuario() 
        );
        $this->load->view('plantilla/plantilla2', $contenido2);
    }

    public function loginProceso(){
        
    }

    public function postUsuario(){
        if($this->input->is_ajax_request()){
            $id_post_usuario=$this->security->xss_clean(strip_tags($this->input->post("id_post_usuario")));
            $contenido_usuario=$this->security->xss_clean(strip_tags($this->input->post("contenido_usuario")));
            $imagen=$this->security->xss_clean(strip_tags($this->input->post("imagen")));

            $data_insert=array(
                "contenido"=>$contenido_usuario,
                "imagen"=>$imagen
            );

            if($this->form_validation->run("postUsuario") == FALSE){
                echo json_encode(array('res'=>"error", 'msg' => strip_tags(validation_errors())));exit;
            }else{
                if($id_post_usuario ==""){
                    if($this->usu->InsertarPostUsuario($data_insert)){
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

}
