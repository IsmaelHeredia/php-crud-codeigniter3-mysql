<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Estadisticas extends CI_Controller {

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

      $this->load->database();

      $this->usuario_logeado = $this->funciones->cargar_nombre_logeado();
   }

   public function index()
   {
      if($this->funciones->verificar_ingreso()) {
        
        $array_textos_grafico1 = array();
        $array_series_grafico1 = array();

        $array_textos_grafico2 = array();
        $array_series_grafico2 = array();

        $productos = $this->productoCRUD->listar();
        $cantidad_productos = count($productos);

        $proveedores = $this->proveedorCRUD->listar();

        foreach($productos as $producto) {
            $nombreProducto = $producto->nombre;
            $precio = $producto->precio;
            $serie  = array(
                'name' => $nombreProducto,
                'y' => (int) $precio
            );
            array_push($array_textos_grafico1,$nombreProducto);
            array_push($array_series_grafico1,$serie);
        }

        $textos_grafico1 = json_encode($array_textos_grafico1);
        $series_grafico1 =  json_encode($array_series_grafico1);

        $query = $this->db->get('productos');
        $query = $this->db->select('prov.nombre, COUNT(prod.id_proveedor) as cantidad')
                  ->from('productos prod')
                  ->join('proveedores prov', 'prov.id = prod.id_proveedor')
                  ->group_by('nombre')
                  ->get();
        $resultados = $query->result();

        foreach($resultados as $resultado) {
            $nombreEmpresa = $resultado->nombre;
            $cantidad = $resultado->cantidad;
            $serie  = array(
                'name' => $nombreEmpresa,
                'y' => (int) $cantidad
            );
            array_push($array_textos_grafico2,$nombreEmpresa);
            array_push($array_series_grafico2,$serie);
        }

        $textos_grafico2 = json_encode($array_textos_grafico2);
        $series_grafico2 =  json_encode($array_series_grafico2);

        $data['productos'] = $productos;
        $data['cantidad_productos'] = $cantidad_productos;
        $data['textos_grafico1'] = $textos_grafico1;
        $data['series_grafico1'] = $series_grafico1;
        $data['textos_grafico2'] = $textos_grafico2;
        $data['series_grafico2'] = $series_grafico2;

        #print_r($data);exit;

        $this->load->view('layouts/header_admin',array('usuario_logeado'=>$this->usuario_logeado));
        $this->load->view('estadisticas/index',$data);
        $this->load->view('layouts/footer_admin');
       } else {
        redirect(base_url('ingreso'));
      }
   }

}