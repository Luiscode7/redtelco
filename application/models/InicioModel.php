<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class InicioModel extends CI_Model{

    public function __construct(){
		parent::__construct();
    }

    public function insertarUsuario($datos){
      if($this->db->insert('usuario', $datos)){
				$insert_id = $this->db->insert_id();
				return $insert_id;
			}
			return FALSE;
    }
    
    public function insertarPost($datos){
      if($this->db->insert('publicaciones', $datos)){
        $insert = $this->db->insert_id();
        return $insert;
      }
      return FALSE;
    }

    public function mostrarPost(){
      $this->db->select('anonimo, contenido');
      $res=$this->db->get('publicaciones');
      if($res->num_rows()>0){
				return $res->result_array();
			}
      return FALSE;
    }
}