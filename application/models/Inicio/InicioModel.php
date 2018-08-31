<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class InicioModel extends CI_Model{

    public function __construct(){
		parent::__construct();
    }

    /* ------ INSERCION DE DATOS -------*/

    public function insertarUsuario($datos){
        if($this->db->insert('usuarios', $datos)){
            $insert_id = $this->db->insert_id();
                return $insert_id;
            }
            return FALSE;
    }

    public function login($user, $pass){
        $this->db->select('id, nombre, apellidos, correo, contrasehna, foto_perfil');
        $this->db->where('correo', $user);
        $this->db->where('contrasehna', $pass);
        $res = $this->db->get('usuarios');

        if($res->num_rows()==0){
			return 2;//usuario no existe
		}else{
			$row=$res->row_array();
			$id_usuario=$row["id_usuario"];
		}
    }
}