<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Funciones {

   protected $CI;

   public function __construct() 
   {
      $CI =& get_instance();
      $CI->load->helper('url');
      $CI->load->library('session');
      $CI->load->database();

      $CI->load->model('UsuarioModel');

      $CI->usuarioCRUD = new UsuarioModel;
   }

   public function verificar_ingreso() {
    $CI =& get_instance();
    $contenido = $CI->session->userdata('ingreso');
    $contenido = base64_decode($contenido);
    $partes = explode("@",$contenido);
    if(count($partes) == 2) {
 	    $nombre = $partes[0];
 	    $clave = $partes[1]; 
      if($CI->usuarioCRUD->validar_ingreso($nombre,$clave)) {
        return true;
      } else {
        return false;
      }
    }
   }

   public function verificar_ingreso_admin() {
    $CI =& get_instance();
    $contenido = $CI->session->userdata('ingreso');
    $contenido = base64_decode($contenido);
    $partes = explode("@",$contenido);
    if(count($partes) == 2) {
      $nombre = $partes[0];
      $clave = $partes[1]; 
      if($CI->usuarioCRUD->validar_ingreso_admin($nombre,$clave)) {
        return true;
      } else {
        return false;
      }
    }
   }

   public function cargar_nombre_logeado() {
    $nombre = "";
    $CI =& get_instance();
    $contenido = $CI->session->userdata('ingreso');
    $contenido = base64_decode($contenido);
    $partes = explode("@",$contenido);
    if(count($partes) == 2) {
      $nombre = $partes[0];
    }
    return $nombre;
   }

   public function fecha_actual() {
		date_default_timezone_set("America/Argentina/Cordoba");
		$fecha = date("d/m/Y", time());
		return $fecha;
   }

}