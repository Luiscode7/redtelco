<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UsuarioModel extends CI_Model{

    public function __construct(){
		parent::__construct();
    }
    
    public function login($usuario,$pass){
        $this->db->select("id");
        $this->db->where("correo", $usuario);
        $this->db->get("usuario");

        if($res->num_rows()==0){
			return 2;//usuario no existe
		}else{
			$row=$res->row_array();
			$id_usuario=$row["id"];
		}
    }
}