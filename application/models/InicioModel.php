<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class InicioModel extends CI_Model{

    public function __construct(){
		parent::__construct();
    }

    public function insertarUsuario($datos){
      if($this->db->insert('usuarios', $datos)){
				$insert_id = $this->db->insert_id();
				return $insert_id;
			}
			return FALSE;
    }
    
    public function insertarPostAnonimo($datos){
      if($this->db->insert('publicaciones_anonimos', $datos)){
        $insert_id = $this->db->insert_id();
        return $insert_id;
      }
      return FALSE;
    }

    public function mostrarMuroAnonimo(){
      $this->db->select('id, nombre, contenido');
      $this->db->order_by('id', 'DESC');
      $res=$this->db->get('publicaciones_anonimos');
      if($res->num_rows()>0){
				return $res->result_array();
			}
      return FALSE;
    }

    /*public function mostrarPostAnonimo($id){
      $this->db->select('id, nombre, contenido');
      $this->db->where('id', $id);
      $res=$this->db->get('publicaciones_anonimos');
      if($res->num_rows()>0){
				return $res->result_array();
			}
      return FALSE;
      
    }*/
}