<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ingreso extends CI_Controller {

   public $usuarioCRUD;

   public function __construct() 
   {
      parent::__construct(); 

      $this->load->library('form_validation');
      $this->load->library('session');
      $this->load->library('funciones');

      $this->load->model('UsuarioModel');

      $this->usuarioCRUD = new UsuarioModel;
   }

   public function index()
   {
      if($this->funciones->verificar_ingreso()) {
        redirect(base_url('productos'));
       } else {
        $this->load->view('layouts/header');
        $this->load->view('ingreso/index');
        $this->load->view('layouts/footer');
      }
   }

   public function ingresar()
   {
      if($this->funciones->verificar_ingreso()) {
        redirect(base_url('productos'));
      } else {
        $this->form_validation->set_rules('usuario', 'Usuario', 'required');
        $this->form_validation->set_rules('clave', 'Clave', 'required');

        if ($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('error', validation_errors());
            redirect(base_url('ingreso/index'));
        } else {
            $usuario = $this->input->post('usuario');
            $clave = md5($this->input->post('clave'));
            if($this->usuarioCRUD->validar_ingreso($usuario,$clave)) {
              $contenido = base64_encode($this->input->post('usuario')."@".md5($this->input->post('clave')));
              $this->session->set_userdata('ingreso', $contenido);
              redirect(base_url('productos'));
            } else {
              $this->session->set_flashdata('error', 'El usuario o la clave son inválidos');
              redirect(base_url('ingreso/index'));
            }
        }
      }
    }

    public function salir()
    {
      unset($_SESSION['ingreso']);
      $this->session->set_flashdata('success', 'La sesion ha sido cerrada correctamente');
      redirect(base_url('ingreso/index'));
    }
}