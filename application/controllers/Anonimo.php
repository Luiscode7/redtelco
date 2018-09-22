<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anonimo extends CI_Controller {

    public function __construct(){
		parent::__construct();
        
        $this->load->model("anonimo/anonimomodel", "an");
        $this->load->model("usuario/usuariomodel", "usu");
    }
    
	public function index()
	{
        $contenido = array(
            'titulo' => "Portal", 
            'contenido' => "Anonimo",
            'posteo' => $this->an->mostrarMuroAnonimo(),
            'publicaciones' => $this->an->countPublicaciones(),
            'countMg' => $this->an->cantidadMg(),
            'countNoMg' => $this->an->cantidadNoMg(),
            'countComentarios' => $this->an->cantidadComentarios()
        );
        $this->load->view('plantilla/plantilla', $contenido);
    }

    public function mostrarUsuariosAno(){
        $contenido8 = array(
            'titulo' => "Usuarios",
            'contenido8' => "personas",
            'publicaciones' => $this->an->countPublicaciones(),
            'countMg' => $this->an->cantidadMg(),
            'countNoMg' => $this->an->cantidadNoMg(),
            'countComentarios' => $this->an->cantidadComentarios(),
            'usuarios' => $this->usu->mostrarUsuarios()
        );
        $this->load->view("plantilla/plantilla8", $contenido8);
    }


    public function postAnonimo(){
        if($this->input->is_ajax_request()){
            $id_post=$this->security->xss_clean(strip_tags($this->input->post("id_post")));
            $nombre=$this->security->xss_clean(strip_tags($this->input->post("nombre")));
            $contenido=$this->security->xss_clean(strip_tags($this->input->post("contenido")));
            date_default_timezone_set("America/Santiago");

            $config = [
                "upload_path" => "./assets/imagenes/subidas",
                "allowed_types" => "png|jpg|jpeg|gif"
            ];
            $this->load->library("upload", $config);

            $this->upload->do_upload('uploadimagenan');

            if(!$config["allowed_types"]){
                echo json_encode(array('res'=>"error", 'msg' => "Solo se aceptan imagenes png, jpg, jpeg y gif"));exit;
            }

            $imagen = array("upload_imagenan" => $this->upload->data());
            $data_insert=array(
                "nombre"=>$nombre,
                "contenido"=>$contenido,
                "imagenAnonimo"=>$imagen['upload_imagenan']['file_name'],
                "fecha" => date("Y-m-d G:i:s")
            );

            if($this->form_validation->run("postAnonimo") == FALSE){
                echo json_encode(array('res'=>"error", 'msg' => strip_tags(validation_errors())));exit;
            }else{
                if($id_post ==""){
                    if($dataid=$this->an->insertarPostAnonimo($data_insert)){
                        $datos=$this->an->mostrarPostAnonimo($dataid);
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
            $id_pu=$this->encryption->decrypt($id_publicacion);
            $ip=$this->input->ip_address();

                $datos_insert = array(
                    "mg_id_publicacion" => $id_pu,
                    "mg_ip" => $ip
                );
                
                $veripmg = $this->an->verificarIpmg($ip,$id_pu);
                $veripnmg = $this->an->verificarIpnmg($ip,$id_pu);
                if($veripmg == false && $veripnmg == false){
                    if($this->an->insertarMeGusta($datos_insert)){
                        $data=$this->an->mostrarMg($id_pu);
                        echo json_encode(array('res' => "ok", 'datos' => $data));
                    }else{
                        echo json_encode(array('res'=>"error"));exit;
                    }
                }
                else{
                    echo json_encode(array('res2'=>"error"));
                }
            
        }
    }

    public function nomeGusta(){
        if($this->input->is_ajax_request()){
            $id_publicacion=$this->security->xss_clean(strip_tags($this->input->post("id_publicacionomg")));
            $id_pu=$this->encryption->decrypt($id_publicacion);
            $ip=$this->input->ip_address();

                $datos_insert = array(
                    "nmg_id_publicacion" => $id_pu,
                    "nmg_ip" => $ip
                );
            
                $veripmg = $this->an->verificarIpmg($ip,$id_pu);
                $veripnmg = $this->an->verificarIpnmg($ip,$id_pu);
                if($veripnmg == false && $veripmg == false){
                    if($this->an->insertarNoMeGusta($datos_insert)){
                        $data=$this->an->mostrarNoMg($id_pu);
                        echo json_encode(array('res' => "ok", 'datos' => $data));
                    }else{
                        echo json_encode(array('res'=>"error"));exit;
                    }
                }
                else{
                    echo json_encode(array('res2'=>"error"));
                }
            
        }
    }

    public function Comentarios(){
        if($this->input->is_ajax_request()){
            $id_comment=$this->security->xss_clean(strip_tags($this->input->post("id_comment")));
            $id_publicacionc=$this->security->xss_clean(strip_tags($this->input->post("id_publicacionc")));
            $id_pu=$this->encryption->decrypt($id_publicacionc);
            $comentario=$this->security->xss_clean(strip_tags($this->input->post("comentario")));

                $datos_insert = array(
                    "com_id_publicacion" => $id_pu,
                    "comentario" => $comentario
                );

                if($this->form_validation->run("Comentarios") == FALSE){
                    echo json_encode(array('res'=>"error", 'msg' => strip_tags(validation_errors())));exit;
                }else{
                    if($data=$this->an->insertarComentario($datos_insert)){
                        $datos=$this->an->mostrarComentarioAnonimo($data,$id_pu);
                        echo json_encode(array('res' => "ok", 'datos' => $datos));
                    }else{
                        echo json_encode(array('res'=>"error"));exit;
                    }
                }
            
        }
    }

    public function mostrarComPublicados(){
            $id_publicacion=$this->security->xss_clean(strip_tags($this->input->post("id_publicacionshow")));
            $id_pu=$this->encryption->decrypt($id_publicacion);
            $data=$this->an->mostrarComPublicados($id_pu);
            if($data){
                echo json_encode(array('res'=>"ok", 'datos' => $data));exit;
            }else{
                echo json_encode(array('res'=>"error", 'msg' => ERROR_MSG));exit;
            }	
    
    }

}
