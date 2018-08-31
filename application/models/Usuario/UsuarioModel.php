<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UsuarioModel extends CI_Model{

    public function __construct(){
		parent::__construct();
    }

    public function InsertarPostUsuario($datos){
      if($this->db->insert('publicaciones_usuarios', $datos)){
        $insert_id = $this->db->insert_id();
        return $insert_id;
      }
      return FALSE;
    }

    public function mostrarPostUsuario(){
      $this->db->select('id, id_usuario, contenido, imagen');
      $this->db->order_by('id', 'DESC');
      $res=$this->db->get('publicaciones_usuarios');
      if($res->num_rows()>0){
				return $res->result_array();
			}
      return FALSE;
    }
    
}