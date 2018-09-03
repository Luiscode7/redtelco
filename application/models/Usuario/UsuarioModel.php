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

    public function mostrarMuroUsuario2(){
      $query=$this->db->query("SELECT p.id as id, p.id_usuario as usuario, p.contenido as contenido,
       p.imagen as imagen, CONCAT(usu.nombre, ' ' ,usu.apellidos) as 'nombre',
       (SELECT COUNT(*) FROM me_gusta_usuarios mg WHERE mg.mg_id_usu = p.id) as mgustas,
       (SELECT COUNT(*) FROM no_me_gusta_usuarios ng WHERE ng.nmg_id_usu = p.id) as nmgustas
       FROM publicaciones_usuarios as p JOIN usuarios usu ON p.id_usuario=usu.id ORDER BY id DESC");
      return $query->result_array();
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

    public function mostrarMgUsu($id){
      $this->db->select('id_mg_usu');
      $this->db->where('mg_id_usu', $id);
      $res=$this->db->count_all_results('me_gusta_usuarios');
      return $res;
      
    }

    public function mostrarNoMgUsu($id){
      $this->db->select('id_nmg_usu');
      $this->db->from('no_me_gusta_usuarios');
      $this->db->where('nmg_id_usu', $id);
      $res=$this->db->count_all_results();
      return $res;
      
    }

    
}