<?php

class TipoUsuarioModel extends CI_Model {
  
    public function __construct()
    {
        $this->load->database();
    }
     
    public function listar()
    {
        $query = $this->db->get('tipos_usuarios');
        return $query->result();
    }
     
    public function cargar_por_id($id)
    {
        $query = $this->db->get_where('tipos_usuarios', array('id' => $id));
        return $query->row();
    }
     
}