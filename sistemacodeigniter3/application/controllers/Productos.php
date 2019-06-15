<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Productos extends CI_Controller {

   public $productoCRUD;
   public $proveedorCRUD;
   public $usuario_logeado;

   public function __construct() 
   {
      parent::__construct(); 

      $this->load->library('form_validation');
      $this->load->library('session');
      $this->load->library('funciones');

      $this->load->model('ProductoModel');
      $this->load->model('ProveedorModel');

      $this->productoCRUD = new ProductoModel;
      $this->proveedorCRUD = new ProveedorModel;

      $this->usuario_logeado = $this->funciones->cargar_nombre_logeado();
   }

   public function index()
   {
      if($this->funciones->verificar_ingreso()) {
        $data['productos'] = $this->productoCRUD->listar();

        $this->load->view('layouts/header_admin',array('usuario_logeado'=>$this->usuario_logeado));
        $this->load->view('producto/lista',$data);
        $this->load->view('layouts/footer_admin');
      } else {
        redirect(base_url('ingreso'));
      }
   }

   public function agregar()
   {
      if($this->funciones->verificar_ingreso()) {
        $proveedores = $this->proveedorCRUD->listar();

        $this->load->view('layouts/header_admin',array('usuario_logeado'=>$this->usuario_logeado));
        $this->load->view('producto/agregar',array('proveedores'=>$proveedores));
        $this->load->view('layouts/footer_admin');
      } else {
        redirect(base_url('ingreso'));
      }
   }

   public function guardar()
   {
      if($this->funciones->verificar_ingreso()) {
        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('descripcion', 'Descripción', 'required');
        $this->form_validation->set_rules('precio', 'Precio', 'required');
        $this->form_validation->set_rules('id_proveedor', 'Proveedor', 'required');

        if ($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('error', validation_errors());
            redirect(base_url('productos/agregar'));
        } else {
           $nombre = $this->input->post('nombre');
           if($this->productoCRUD->comprobar_existencia_producto_crear($nombre)) {
             $this->session->set_flashdata('error', 'Ya existe un producto con ese mismo nombre');
             redirect(base_url('productos/agregar'));
           } else {
             $this->productoCRUD->insertar();
             $this->session->set_flashdata('success', 'El producto fue creado correctamente');
             redirect(base_url('productos'));
           }
        }
      } else {
        redirect(base_url('ingreso'));
      }
    }

   public function editar($id)
   {
      if($this->funciones->verificar_ingreso()) {
        $producto = $this->productoCRUD->cargar_por_id($id);
        $proveedores = $this->proveedorCRUD->listar();

        $this->load->view('layouts/header_admin',array('usuario_logeado'=>$this->usuario_logeado));
        $this->load->view('producto/editar',array('producto'=>$producto,'proveedores'=>$proveedores));
        $this->load->view('layouts/footer_admin');
      } else {
        redirect(base_url('ingreso'));
      }
   }

   public function actualizar($id)
   {
      if($this->funciones->verificar_ingreso()) {
        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('descripcion', 'Descripción', 'required');
        $this->form_validation->set_rules('precio', 'Precio', 'required');
        $this->form_validation->set_rules('id_proveedor', 'Proveedor', 'required');

        if ($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('error', validation_errors());
            redirect(base_url('productos/editar/'.$id));
        } else { 
          $nombre = $this->input->post('nombre');
          if($this->productoCRUD->comprobar_existencia_producto_editar($id,$nombre)) {
            $this->session->set_flashdata('error', 'Ya existe un producto con ese mismo nombre');
            redirect(base_url('productos/editar/'.$id));
          } else {
            $this->productoCRUD->actualizar($id);
            $this->session->set_flashdata('success', 'El producto fue editado correctamente');
            redirect(base_url('productos'));
          }
        }
      } else {
        redirect(base_url('ingreso'));
      }
   }

   public function borrar($id)
   {
      if($this->funciones->verificar_ingreso()) {
        $producto = $this->productoCRUD->cargar_por_id($id);
        $this->load->view('layouts/header_admin',array('usuario_logeado'=>$this->usuario_logeado));
        $this->load->view('producto/borrar',array('producto'=>$producto));
        $this->load->view('layouts/footer_admin');
      } else {
        redirect(base_url('ingreso'));
      }
   }

   public function confirmar_borrar($id)
   {
      if($this->funciones->verificar_ingreso()) {
        $item = $this->productoCRUD->borrar($id);
        $this->session->set_flashdata('success', 'El producto fue borrado correctamente');
        redirect(base_url('productos'));
      } else {
        redirect(base_url('ingreso'));
      }
   }

}