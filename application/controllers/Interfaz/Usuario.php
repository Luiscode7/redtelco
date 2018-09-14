<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

    public function __construct(){
		parent::__construct();
        
        $this->load->model("usuario/usuariomodel", "usu");
        $this->load->model("anonimo/anonimomodel");
    }
    
	public function index()
	{
        if(!$this->session->userdata("procesoLogin")){
            redirect(base_url());
        }
        $id = $this->session->userdata("id");
        //$encuesta = $this->session->userdata("id_encue");
        $contenido2 = array(
            'titulo' => "Portal Usuario", 
            'contenido2' => "usuario",
            'posteos_usu' => $this->usu->mostrarMuroUsuario($id),
            'fotoperfil' => $this->usu->ImagenPerfil($id),
            //'tituloencu' => $this->usu->tituloEncuesta($id)
            'encuesta' => $this->usu->mostrarEncuesta($id),
        );
        $this->load->view('plantilla/plantilla2', $contenido2);
    }

    public function MuroAnonimo(){
        $id = $this->session->userdata("id");
        $contenido3 = array(
            'titulo' => "Portal General", 
            'contenido3' => "anonimo",
            'posteo'=> $this->anonimomodel->mostrarMuroAnonimo(),
            'fotoperfil' => $this->usu->ImagenPerfil($id)
        );
        $this->load->view('plantilla/plantilla3', $contenido3);
    }

    public function postUsuario(){
        if($this->input->is_ajax_request()){
            $id_post_usu=$this->security->xss_clean(strip_tags($this->input->post("id_post_usuario")));
            $usuario=$this->security->xss_clean(strip_tags($this->input->post("id_usuario")));
            $id_usu=$this->encryption->decrypt($usuario);
            $contenido_usuario=$this->security->xss_clean(strip_tags($this->input->post("contenido_usuario")));
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
                "id_usuario"=>$id_usu,
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

    public function imagenUpload(){

    }

    public function ComentariosUsu(){
        if($this->input->is_ajax_request()){
            $id_comment=$this->security->xss_clean(strip_tags($this->input->post("id_commentusu")));
            $id_publicacionusu=$this->security->xss_clean(strip_tags($this->input->post("id_publicacionusu")));
            $id_pusu=$this->encryption->decrypt($id_publicacionusu);
            $comentario=$this->security->xss_clean(strip_tags($this->input->post("comentariousu")));

                $datos_insert = array(
                    "com_id_usu" => $id_pusu,
                    "comentario_usu" => $comentario
                );

                if($this->form_validation->run("ComentariosUsu") == FALSE){
                    echo json_encode(array('res'=>"error", 'msg' => strip_tags(validation_errors())));exit;
                }else{
                    if($data=$this->usu->insertarComentario($datos_insert)){
                        $datos=$this->usu->mostrarComentarioUsuario($data,$id_pusu);
                        echo json_encode(array('res' => "ok", 'datos' => $datos));
                    }else{
                        echo json_encode(array('res'=>"error"));exit;
                    }
                }
            
        }
    }


    public function mostrarComPublicadosUsu(){
        $id_publicacion=$this->security->xss_clean(strip_tags($this->input->post("id_publicacionshowusu")));
        $id_pu=$this->encryption->decrypt($id_publicacion);
        $data=$this->usu->mostrarComPublicadosUsu($id_pu);
        if($data){
            echo json_encode(array('res'=>"ok", 'datos' => $data));exit;
        }else{
            echo json_encode(array('res'=>"error", 'msg' => ERROR_MSG));exit;
        }	

}

    public function meGustaUsu(){
        if($this->input->is_ajax_request()){
            $id_usuario=$this->security->xss_clean(strip_tags($this->input->post("id_usuariomg")));
            $id_usu=$this->encryption->decrypt($id_usuario);
            $ip = $this->input->ip_address();

            $datos_insert = array(
                "mg_id_usu" => $id_usu,
                "mg_ip_usu" => $ip
            );

            if($this->usu->insertarMeGusta($datos_insert)){
                $data=$this->usu->mostrarMgUsu($id_usu);
                echo json_encode(array('datos' => $data));
            }else{
                echo json_encode(array('res'=>"error"));exit;
            }
        }
    }

    public function NomeGustaUsu(){
        if($this->input->is_ajax_request()){
            $id_usuario=$this->security->xss_clean(strip_tags($this->input->post("id_usuarionomg")));
            $id_usu=$this->encryption->decrypt($id_usuario);
            $ip = $this->input->ip_address();

            $datos_insert = array(
                "nmg_id_usu" => $id_usu,
                "nmg_ip" => $ip
            );

            if($this->usu->insertarNoMeGusta($datos_insert)){
                $data=$this->usu->mostrarNoMgUsu($id_usu);
                echo json_encode(array('datos' => $data));
            }else{
                echo json_encode(array('res'=>"error"));exit;
            }
        }
    }

    public function redirectEditarPerfil(){
        $id = $this->session->userdata("id");
        $contenido4 = array(
            'titulo' => "Edición de Perfil",
            'contenido4' => "editarUsuario",
            'fotoperfil' => $this->usu->ImagenPerfil($id)
            //'usuario' => $this->session->userdata("procesoLogin");
        );
        $this->load->view("plantilla/plantilla4", $contenido4);
    }

    public function editarPerfil(){
        if($this->input->is_ajax_request()){
            $id_usuario=$this->security->xss_clean(strip_tags($this->input->post("id_usuario")));
            $nombre=$this->security->xss_clean(strip_tags($this->input->post("nombre")));
            $apellidos=$this->security->xss_clean(strip_tags($this->input->post("apellidos")));

            $config = [
                "upload_path" => "./assest/imagenes/perfil",
                "allowed_types" => "png|jpg|jpeg"
            ];
            $this->load->library("upload", $config);

            $this->upload->do_upload('imagenGrande');

            if(!$config["allowed_types"]){
                echo json_encode(array('res'=>"error", 'msg' => "Solo se aceptan imagenes png, jpg y jpeg"));exit;
            }

            $imagen = array("imagenGrande" => $this->upload->data());

            $data_insert=array(
                "nombre"=>$nombre,
                "apellidos"=>$apellidos,
                "foto_perfil"=>$imagen['imagenGrande']['file_name']
            );

            if($this->form_validation->run("EditarPerfil") == FALSE){
                echo json_encode(array('res'=>"error", 'msg' => ERROR_MSG));exit;
            }else{
                if($this->usu->actualizarUsuario($id_usuario, $data_insert)){
                    $nuevo=$this->usu->mostrarUsuario($id_usuario);
                    echo json_encode(array('res'=>"ok", 'datos' => $nuevo));exit;
                }else{
                    echo json_encode(array('res'=>"error", 'msg' => ERROR_MSG));exit;
                }
                
            }
        }
    }

    public function mostrarUsuarios(){
        $id = $this->session->userdata("id");
        $contenido5 = array(
            'titulo' => "Usuarios",
            'contenido5' => "personas",
            'fotoperfil' => $this->usu->ImagenPerfil($id),
            'usuarios' => $this->usu->mostrarUsuarios()
        );
        $this->load->view("plantilla/plantilla5", $contenido5);
    }

    public function encuesta(){
        if($this->input->is_ajax_request()){
            $titulo=$this->security->xss_clean(strip_tags($this->input->post("titulo")));
            $id_usuario=$this->security->xss_clean(strip_tags($this->input->post("id_usuencuesta")));
            $id_usu=$this->encryption->decrypt($id_usuario);
            $opcion=$this->security->xss_clean($this->input->post("texto1[]"));

            $data_insert = array(
                "id_usu_encu" => $id_usu,
                "titulo" => $titulo,
            );

            if($encu=$this->usu->insertarEncuesta($data_insert)){
               
                $valorop = array();
                foreach($opcion as $op){
                    array_push($valorop, array(
                        "encu_id" => $encu,
                        "opciones" => $op
                    ));
                }

                /*$id_encu = array(
                    "id_encue" => $encu
                );

                $encuesta=$this->session->set_userdata($id_encu);
                $this->session->userdata($encuesta);*/
    
                if($this->usu->insertarOpcionesEncu($valorop)){
                    //echo json_encode(array('res' => "ok", 'datoso' => $valorop));    
                }
                else{
                    echo json_encode(array('res' => "error"));
                }
                $opc=$this->usu->mostrarOpciones($encu);
                echo json_encode(array('res' => "ok", 'datose' => $opc));

            }else{

            }
        }
    }

}
