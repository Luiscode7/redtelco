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

    public function actualizarUsuario($id,$datos){
      $this->db->select('nombre, apellidos, foto_perfil');
      $this->db->where('id', $id);
      $this->db->update('usuarios', $datos);
      if($this->db->affected_rows()){
        return true;
      }else{
        return false;
      }
    }

    public function mostrarMuroUsuario($id){
      $query=$this->db->query("SELECT p.id as id, p.id_usuario as usuario, p.contenido as contenido,
       p.imagen as imagen, CONCAT(usu.nombre, ' ' ,usu.apellidos) as 'nombre', usu.foto_perfil as foto,
       (SELECT COUNT(*) FROM me_gusta_usuarios mg WHERE mg.mg_id_usu = p.id) as mgustas,
       (SELECT COUNT(*) FROM no_me_gusta_usuarios ng WHERE ng.nmg_id_usu = p.id) as nmgustas
       FROM publicaciones_usuarios as p JOIN usuarios usu ON p.id_usuario=usu.id WHERE p.id_usuario = $id ORDER BY id DESC");
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

    public function mostrarComentarioUsuario($id, $idpubli){
      $this->db->select('comentario_usu');
      $this->db->where('id_com_usu', $id);
      $this->db->where('com_id_usu', $idpubli);
      $res = $this->db->get('comentarios_usuarios');
      if($res->num_rows()>0){
        return $res->result_array();
			}
      return FALSE;
    }


    public function mostrarComPublicadosUsu($id){
      $this->db->select('com.comentario_usu as comments');
      $this->db->from('comentarios_usuarios as com');
      $this->db->join('publicaciones_usuarios as p', 'p.id = com.com_id_usu', 'left');
      $this->db->where('p.id', $id);
      $this->db->order_by('comments', 'DESC');
      $res=$this->db->get();
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

    public function mostrarUsuario($id){
      $this->db->where('id', $id);
      $res=$this->db->get('usuarios');
      if($res->num_rows()>0){
        return $res->result_array();
			}
      return FALSE;
    }

    public function ImagenPerfil($id){
      $this->db->where('id', $id);
      $res=$this->db->get('usuarios');
      $row=$res->row_array();
      return $row["foto_perfil"];
		
    }
    
}