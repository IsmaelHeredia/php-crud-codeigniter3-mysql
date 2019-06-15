<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cuenta extends CI_Controller {

   public $usuarioCRUD;
   public $usuario_logeado;
   public $usuario;

   public function __construct() 
   {
      parent::__construct(); 

      $this->load->library('form_validation');
      $this->load->library('session');
      $this->load->library('funciones');

      $this->load->model('UsuarioModel');

      $this->usuarioCRUD = new UsuarioModel;

      $this->usuario_logeado = $this->funciones->cargar_nombre_logeado();

      $this->usuario = $this->usuarioCRUD->cargar_por_nombre($this->usuario_logeado);
   }

   public function cambiarUsuario()
   {
      if($this->funciones->verificar_ingreso()) {
        $this->load->view('layouts/header_admin',array('usuario_logeado'=>$this->usuario_logeado));
        $this->load->view('cuenta/cambiar_usuario',array('usuario'=>$this->usuario));
        $this->load->view('layouts/footer_admin');
       } else {
        redirect(base_url('ingreso'));
      }
   }

   public function actualizarUsuario($id_usuario) {
      if($this->funciones->verificar_ingreso()) {
        $usuario = $this->input->post('usuario');
        $nuevo_usuario = $this->input->post('nuevo_usuario');
        $clave = md5($this->input->post('clave'));
        if($this->usuarioCRUD->validar_ingreso($usuario,$clave)) {
          if($this->usuarioCRUD->comprobar_existencia_usuario_crear($nuevo_usuario)) {
            $this->session->set_flashdata('error', 'Ya existe un usuario con ese mismo nombre');
            redirect(base_url('cuenta/cambiarUsuario'));
          } else {
            $this->usuarioCRUD->cambiar_usuario($id_usuario,$nuevo_usuario);
            unset($_SESSION['ingreso']);
            $this->session->set_flashdata('success', 'El nombre de usuario ha sido cambiado correctamente');
            redirect(base_url('ingreso/index'));
          }
        } else {
          $this->session->set_flashdata('error', 'El usuario o la contraseña son incorrectas');
          redirect(base_url('cuenta/cambiarUsuario'));
        }
      } else {
        redirect(base_url('ingreso'));
      }
   }

   public function cambiarClave()
   {
      if($this->funciones->verificar_ingreso()) {
        $this->load->view('layouts/header_admin',array('usuario_logeado'=>$this->usuario_logeado));
        $this->load->view('cuenta/cambiar_clave',array('usuario'=>$this->usuario));
        $this->load->view('layouts/footer_admin');
       } else {
        redirect(base_url('ingreso'));
      }
   }

   public function actualizarClave($id_usuario) {
      if($this->funciones->verificar_ingreso()) {
        $usuario = $this->input->post('usuario');
        $nueva_clave = $this->input->post('nueva_clave');
        $clave = md5($this->input->post('clave'));
        if($this->usuarioCRUD->validar_ingreso($usuario,$clave)) {
          $this->usuarioCRUD->cambiar_clave($id_usuario,$nueva_clave);
          unset($_SESSION['ingreso']);
          $this->session->set_flashdata('success', 'La clave ha sido cambiada correctamente');
          redirect(base_url('ingreso/index'));
        } else {
          $this->session->set_flashdata('error', 'El usuario o la contraseña son incorrectas');
          redirect(base_url('cuenta/cambiarClave'));
        }
      } else {
        redirect(base_url('ingreso'));
      }
   }

}