<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

   public $usuarioCRUD;
   public $usuario_logeado;
   public $tipos_usuario;

   public function __construct() 
   {
      parent::__construct(); 

      $this->load->library('form_validation');
      $this->load->library('session');
      $this->load->library('funciones');

      $this->load->model('UsuarioModel');
      $this->load->model('TipoUsuarioModel');

      $this->usuarioCRUD = new UsuarioModel;
      $this->tipoUsuarioCRUD = new TipoUsuarioModel;

      $this->usuario_logeado = $this->funciones->cargar_nombre_logeado();

      $this->tipos_usuario = $this->tipoUsuarioCRUD->listar();
   }

   public function index()
   {
      if($this->funciones->verificar_ingreso()) {
        if($this->funciones->verificar_ingreso_admin()) {
          $data['usuarios'] = $this->usuarioCRUD->listar();

          $this->load->view('layouts/header_admin',array('usuario_logeado'=>$this->usuario_logeado));
          $this->load->view('usuario/lista',$data);
          $this->load->view('layouts/footer_admin');
        } else {
          $this->session->set_flashdata('error', 'Necesita iniciar sesion con un administrador');
          redirect(base_url('productos'));
        }
      } else {
        redirect(base_url('ingreso'));
      }
   }

   public function agregar()
   {
      if($this->funciones->verificar_ingreso()) {
        if($this->funciones->verificar_ingreso_admin()) {
          $this->load->view('layouts/header_admin',array('usuario_logeado'=>$this->usuario_logeado));
          $this->load->view('usuario/agregar',array('tipos_usuario'=>$this->tipos_usuario));
          $this->load->view('layouts/footer_admin');
        } else {
          $this->session->set_flashdata('error', 'Necesita iniciar sesion con un administrador');
          redirect(base_url('productos'));
        }
      } else {
        redirect(base_url('ingreso'));
      }
   }

   public function guardar()
   {
      if($this->funciones->verificar_ingreso()) {
        if($this->funciones->verificar_ingreso_admin()) {
          $this->form_validation->set_rules('nombre', 'Nombre', 'required');
          $this->form_validation->set_rules('clave', 'Clave', 'required');
          $this->form_validation->set_rules('id_tipo', 'Tipo', 'required');

          if ($this->form_validation->run() == FALSE){
              $this->session->set_flashdata('error', validation_errors());
              redirect(base_url('usuarios/agregar'));
          } else {
             $nombre = $this->input->post('nombre');
             if($this->usuarioCRUD->comprobar_existencia_usuario_crear($nombre)) {
               $this->session->set_flashdata('error', 'Ya existe un usuario con ese mismo nombre');
               redirect(base_url('usuarios/agregar'));
             } else {
               $this->usuarioCRUD->insertar();
               $this->session->set_flashdata('success', 'El usuario fue creado correctamente');
               redirect(base_url('usuarios'));
             }
          }
        } else {
          $this->session->set_flashdata('error', 'Necesita iniciar sesion con un administrador');
          redirect(base_url('productos'));
        }
      } else {
        redirect(base_url('ingreso'));
      }
    }

   public function editar($id)
   {
      if($this->funciones->verificar_ingreso()) {
        if($this->funciones->verificar_ingreso_admin()) {
          $usuario = $this->usuarioCRUD->cargar_por_id($id);

          $this->load->view('layouts/header_admin',array('usuario_logeado'=>$this->usuario_logeado));
          $this->load->view('usuario/editar',array('usuario'=>$usuario,'tipos_usuario'=>$this->tipos_usuario));
          $this->load->view('layouts/footer_admin');
        } else {
          $this->session->set_flashdata('error', 'Necesita iniciar sesion con un administrador');
          redirect(base_url('productos'));
        }
      } else {
        redirect(base_url('ingreso'));
      }
   }

   public function actualizar($id)
   {
      if($this->funciones->verificar_ingreso()) {
        if($this->funciones->verificar_ingreso_admin()) {
          $this->form_validation->set_rules('id_tipo', 'Tipo', 'required');

          if ($this->form_validation->run() == FALSE){
              $this->session->set_flashdata('error', validation_errors());
              redirect(base_url('usuarios/editar/'.$id));
          } else { 
            $this->usuarioCRUD->actualizar($id);
            $this->session->set_flashdata('success', 'El usuario fue editado correctamente');
            redirect(base_url('usuarios'));
          }
        } else {
          $this->session->set_flashdata('error', 'Necesita iniciar sesion con un administrador');
          redirect(base_url('productos'));
        }
      } else {
        redirect(base_url('ingreso'));
      }
   }

   public function borrar($id)
   {
      if($this->funciones->verificar_ingreso()) {
        if($this->funciones->verificar_ingreso_admin()) {
          $usuario = $this->usuarioCRUD->cargar_por_id($id);
          $this->load->view('layouts/header_admin',array('usuario_logeado'=>$this->usuario_logeado));
          $this->load->view('usuario/borrar',array('usuario'=>$usuario));
          $this->load->view('layouts/footer_admin');
        } else {
          $this->session->set_flashdata('error', 'Necesita iniciar sesion con un administrador');
          redirect(base_url('productos'));
        }
      } else {
        redirect(base_url('ingreso'));
      }
   }

   public function confirmar_borrar($id)
   {
      if($this->funciones->verificar_ingreso()) {
        if($this->funciones->verificar_ingreso_admin()) {
          $item = $this->usuarioCRUD->borrar($id);
          $this->session->set_flashdata('success', 'El usuario fue borrado correctamente');
          redirect(base_url('usuarios'));
        } else {
          $this->session->set_flashdata('error', 'Necesita iniciar sesion con un administrador');
          redirect(base_url('productos'));
        }
      } else {
        redirect(base_url('ingreso'));
      }
   }

}