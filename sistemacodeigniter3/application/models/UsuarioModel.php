<?php

class UsuarioModel extends CI_Model {
  
    public function __construct()
    {
        $this->load->database();
    }

    public function validar_ingreso($usuario,$clave) 
    {
        $this->db->where('nombre', $usuario);  
        $this->db->where('clave', $clave);  
        
        $query = $this->db->get('usuarios');  
  
        if ($query->num_rows() == 1) {  
          return true;
        } else {  
          return false;  
        }  
    }

    public function validar_ingreso_admin($usuario,$clave) 
    {
        $this->db->where('nombre', $usuario);  
        $this->db->where('clave', $clave);  
        $this->db->where('id_tipo', 1);
        
        $query = $this->db->get('usuarios');  
  
        if ($query->num_rows() == 1) {  
          return true;
        } else {  
          return false;  
        }  
    }
     
    public function listar()
    {
        $query = $this->db->get('usuarios');
        $query = $this->db->select('us.id, us.nombre, us.clave, us.id_tipo, us.fecha_registro, tu.nombre as tipo')
                  ->from('usuarios us')
                  ->join('tipos_usuarios tu', 'tu.id = us.id_tipo')
                  ->get();
        return $query->result();
    }
     
    public function cargar_por_id($id)
    {
        $query = $this->db->select('us.id, us.nombre, us.clave, us.id_tipo, us.fecha_registro, tu.nombre as tipo')
                  ->from('usuarios us')
                  ->join('tipos_usuarios tu', 'tu.id = us.id_tipo')
                  ->get_where('usuarios', array('us.id' => $id));
        return $query->row();
    }

    public function cargar_por_nombre($nombre)
    {
        $query = $this->db->select('us.id, us.nombre, us.clave, us.id_tipo, us.fecha_registro, tu.nombre as tipo')
                  ->from('usuarios us')
                  ->join('tipos_usuarios tu', 'tu.id = us.id_tipo')
                  ->get_where('usuarios', array('us.nombre' => $nombre));
        return $query->row();
    }
     
    public function insertar()
    {    
        $data = array(
            'nombre' => $this->input->post('nombre'),
            'clave' => md5($this->input->post('clave')),
            'id_tipo' => $this->input->post('id_tipo'),
            'fecha_registro' => $this->funciones->fecha_actual()
        );
        return $this->db->insert('usuarios', $data);
    }

    public function actualizar($id) 
    {
        $data = array(
            'id_tipo' => $this->input->post('id_tipo')
        );
        $this->db->where('id',$id);
        return $this->db->update('usuarios',$data);
    }

    public function cambiar_usuario($id,$nuevo_nombre) 
    {
        $data = array(
            'nombre' => $nuevo_nombre
        );
        $this->db->where('id',$id);
        return $this->db->update('usuarios',$data);
    }

    public function cambiar_clave($id,$nueva_clave) 
    {
        $data = array(
            'clave' => md5($nueva_clave)
        );
        $this->db->where('id',$id);
        return $this->db->update('usuarios',$data);
    }
     
    public function borrar($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('usuarios');
    }

    public function comprobar_existencia_usuario_crear($nombre) {
        $this->db->where('nombre', $nombre);  
        
        $query = $this->db->get('usuarios');  

        if ($query->num_rows() == 1) {  
          return true;
        } else {  
          return false;  
        }  
    }

}