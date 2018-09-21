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
        $this->db->where('correo', $user);
        $this->db->where('contrasehna', $pass);
        $res = $this->db->get('usuarios');

        if($res->num_rows()>0){
			return $res->row();
		}else{
			return FALSE;
		}
    }

    public function verificarCuenta($correo){
        $this->db->where('correo', $correo);
        $res = $this->db->get('usuarios');
        
        if($res->num_rows()>0){
			return $res->row();
		}else{
			return FALSE;
		}
    }

    public function mostrarCorreo($id_usu){
        $this->db->where('id', $id_usu);
        $res=$this->db->get('usuarios');
        $row=$res->row_array();
        return $row["correo"];
    }

    public function mostrarNombre($id_usu){
        $this->db->where('id', $id_usu);
        $res=$this->db->get('usuarios');
        $row=$res->row_array();
        return $row["nombre"]." ".$row["apellidos"];
    }

    public function mostrarPass($id_usu){
        $this->db->where('id', $id_usu);
        $res=$this->db->get('usuarios');
        $row=$res->row_array();
        return $row["contrasehna"];
    }

}