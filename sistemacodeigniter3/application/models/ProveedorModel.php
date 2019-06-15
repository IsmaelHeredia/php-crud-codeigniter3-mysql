<?php

class ProveedorModel extends CI_Model {
  
    public function __construct()
    {
        $this->load->database();
    }
     
    public function listar()
    {
        $query = $this->db->get('proveedores');
        return $query->result();
    }
     
    public function cargar_por_id($id)
    {
        $query = $this->db->get_where('proveedores', array('id' => $id));
        return $query->row();
    }
     
    public function insertar()
    {    
        $data = array(
            'nombre' => $this->input->post('nombre'),
            'direccion' => $this->input->post('direccion'),
            'telefono' => $this->input->post('telefono'),
            'fecha_registro' => $this->funciones->fecha_actual()
        );
        return $this->db->insert('proveedores', $data);
    }

    public function actualizar($id) 
    {
        $data = array(
            'nombre' => $this->input->post('nombre'),
            'direccion' => $this->input->post('direccion'),
            'telefono' => $this->input->post('telefono')
        );
        $this->db->where('id',$id);
        return $this->db->update('proveedores',$data);
    }
     
    public function borrar($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('proveedores');
    }

    public function comprobar_existencia_proveedor_crear($nombre) {
        $this->db->where('nombre', $nombre);  
        
        $query = $this->db->get('proveedores');  

        if ($query->num_rows() == 1) {  
          return true;
        } else {  
          return false;  
        }  
    }

    public function comprobar_existencia_proveedor_editar($id,$nombre) {
        $this->db->where('nombre', $nombre);  
        $this->db->where('id != ', $id, FALSE);  

        $query = $this->db->get('proveedores');  

        if ($query->num_rows() == 1) {  
          return true;
        } else {  
          return false;  
        }  
    }

}