<?php

class ProductoModel extends CI_Model {
  
    public function __construct()
    {
        $this->load->database();
    }
     
    public function listar()
    {
        $query = $this->db->get('productos');
        $query = $this->db->select('prod.id, prod.nombre, prod.descripcion, prod.precio, prod.id_proveedor, prod.fecha_registro, prov.nombre as proveedor')
                  ->from('productos prod')
                  ->join('proveedores prov', 'prov.id = prod.id_proveedor')
                  ->get();
        return $query->result();
    }
     
    public function cargar_por_id($id)
    {
        $query = $this->db->select('prod.id, prod.nombre, prod.descripcion, prod.precio, prod.id_proveedor, prod.fecha_registro, prov.nombre as proveedor')
                  ->from('productos prod')
                  ->join('proveedores prov', 'prov.id = prod.id_proveedor')
                  ->get_where('productos', array('prod.id' => $id));
        return $query->row();
    }
     
    public function insertar()
    {    
        $data = array(
            'nombre' => $this->input->post('nombre'),
            'descripcion' => $this->input->post('descripcion'),
            'precio' => $this->input->post('precio'),
            'id_proveedor' => $this->input->post('id_proveedor'),
            'fecha_registro' => $this->funciones->fecha_actual()
        );
        return $this->db->insert('productos', $data);
    }

    public function actualizar($id) 
    {
        $data = array(
            'nombre' => $this->input->post('nombre'),
            'descripcion' => $this->input->post('descripcion'),
            'precio' => $this->input->post('precio'),
            'id_proveedor' => $this->input->post('id_proveedor')
        );
        $this->db->where('id',$id);
        return $this->db->update('productos',$data);
    }
     
    public function borrar($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('productos');
    }

    public function comprobar_existencia_producto_crear($nombre) {
        $this->db->where('nombre', $nombre);  
        
        $query = $this->db->get('productos');  

        if ($query->num_rows() == 1) {  
          return true;
        } else {  
          return false;  
        }  
    }

    public function comprobar_existencia_producto_editar($id,$nombre) {
        $this->db->where('nombre', $nombre);  
        $this->db->where('id != ', $id, FALSE);  

        $query = $this->db->get('productos');  

        if ($query->num_rows() == 1) {  
          return true;
        } else {  
          return false;  
        }  
    }

}