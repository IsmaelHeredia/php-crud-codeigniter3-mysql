<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Proveedores extends CI_Controller {

   public $proveedorCRUD;
   public $usuario_logeado;

   public function __construct() 
   {
      parent::__construct(); 

      $this->load->library('form_validation');
      $this->load->library('session');
      $this->load->library('funciones');

      $this->load->model('ProveedorModel');

      $this->proveedorCRUD = new ProveedorModel;

      $this->usuario_logeado = $this->funciones->cargar_nombre_logeado();
   }

   public function index()
   {
      if($this->funciones->verificar_ingreso()) {
        $data['proveedores'] = $this->proveedorCRUD->listar();

        $this->load->view('layouts/header_admin',array('usuario_logeado'=>$this->usuario_logeado));
        $this->load->view('proveedor/lista',$data);
        $this->load->view('layouts/footer_admin');
      } else {
        redirect(base_url('ingreso'));
      }
   }

   public function agregar()
   {
      if($this->funciones->verificar_ingreso()) {
        $this->load->view('layouts/header_admin',array('usuario_logeado'=>$this->usuario_logeado));
        $this->load->view('proveedor/agregar');
        $this->load->view('layouts/footer_admin');
      } else {
        redirect(base_url('ingreso'));
      }
   }

   public function guardar()
   {
      if($this->funciones->verificar_ingreso()) {
        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('direccion', 'Dirección', 'required');
        $this->form_validation->set_rules('telefono', 'Teléfono', 'required');

        if ($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('error', validation_errors());
            redirect(base_url('proveedores/agregar'));
        } else {
           $nombre = $this->input->post('nombre');
           if($this->proveedorCRUD->comprobar_existencia_proveedor_crear($nombre)) {
             $this->session->set_flashdata('error', 'Ya existe un proveedor con ese mismo nombre');
             redirect(base_url('proveedores/agregar'));
           } else {
             $this->proveedorCRUD->insertar();
             $this->session->set_flashdata('success', 'El proveedor fue creado correctamente');
             redirect(base_url('proveedores'));
           }
        }
      } else {
        redirect(base_url('ingreso'));
      }
    }

   public function editar($id)
   {
      if($this->funciones->verificar_ingreso()) {
        $proveedor = $this->proveedorCRUD->cargar_por_id($id);

        $this->load->view('layouts/header_admin',array('usuario_logeado'=>$this->usuario_logeado));
        $this->load->view('proveedor/editar',array('proveedor'=>$proveedor));
        $this->load->view('layouts/footer_admin');
      } else {
        redirect(base_url('ingreso'));
      }
   }

   public function actualizar($id)
   {
      if($this->funciones->verificar_ingreso()) {
        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('direccion', 'Dirección', 'required');
        $this->form_validation->set_rules('telefono', 'Teléfono', 'required');

        if ($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('error', validation_errors());
            redirect(base_url('proveedores/editar/'.$id));
        } else { 
           $nombre = $this->input->post('nombre');
           if($this->proveedorCRUD->comprobar_existencia_proveedor_editar($id,$nombre)) {
             $this->session->set_flashdata('error', 'Ya existe un proveedor con ese mismo nombre');
             redirect(base_url('proveedores/editar/'.$id));
           } else {
             $this->proveedorCRUD->actualizar($id);
             $this->session->set_flashdata('success', 'El proveedor fue editado correctamente');
             redirect(base_url('proveedores'));
           }
        }
      } else {
        redirect(base_url('ingreso'));
      }
   }

   public function borrar($id)
   {
      if($this->funciones->verificar_ingreso()) {
        $proveedor = $this->proveedorCRUD->cargar_por_id($id);
        $this->load->view('layouts/header_admin',array('usuario_logeado'=>$this->usuario_logeado));
        $this->load->view('proveedor/borrar',array('proveedor'=>$proveedor));
        $this->load->view('layouts/footer_admin');
      } else {
        redirect(base_url('ingreso'));
      }
   }

   public function confirmar_borrar($id)
   {
      if($this->funciones->verificar_ingreso()) {
        $item = $this->proveedorCRUD->borrar($id);
        $this->session->set_flashdata('success', 'El proveedor fue borrado correctamente');
        redirect(base_url('proveedores'));
      } else {
        redirect(base_url('ingreso'));
      }
   }

}