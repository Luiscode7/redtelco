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

    public function insertarComentario($datos){
      if($this->db->insert('comentarios_usuarios', $datos)){
        $insert_id = $this->db->insert_id();
				return $insert_id;
			}
			return FALSE;
    }

    public function insertarMeGusta($datos){
      if($this->db->insert('me_gusta_usuarios',$datos)){
        $insert_id = $this->db->insert_id();
				return $insert_id;
			}
			return FALSE;
    }
    
    public function insertarNoMeGusta($datos){
      if($this->db->insert('no_me_gusta_usuarios',$datos)){
        $insert_id = $this->db->insert_id();
				return $insert_id;
			}
			return FALSE;
    }


    public function mostrarMuroUsuario(){
      $this->db->select("pu.id as id, pu.id_usuario as usuario,
       pu.contenido as contenido, pu.imagen as imagen, CONCAT(usu.nombre, ' ' ,usu.apellidos) as 'nombre'");
      $this->db->from('publicaciones_usuarios as pu');
      $this->db->join('usuarios as usu', 'usu.id = pu.id_usuario', 'left');
      $this->db->order_by('id', 'DESC');
      $res=$this->db->get();
      if($res->num_rows()>0){
				return $res->result_array();
			}
      return FALSE;
    }

    public function mostrarPostUsuario($id){
      $this->db->select('id, id_usuario, contenido, imagen');
      $this->db->where('id_usuario', $id);
      $res = $this->db->get('publicaciones_usuarios');
      if($res->num_rows()>0){
        return $res->result_array();
			}
      return FALSE;
    }
    
}