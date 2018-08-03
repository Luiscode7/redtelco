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
    
}