<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class GastoVenta extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');

		$this->load->library('grocery_CRUD');
	}

	public function _example_output($output = null)
	{
		$this->load->view('1gasto_venta.php',(array)$output);
	}

	public function offices()
	{
		$output = $this->grocery_crud->render();

		$this->_example_output($output);
	}

	public function index()
	{
		$this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	}

	public function Show()
	{
		try{
			$crud = new grocery_CRUD();
			//UNSET
			$crud->unset_print();
			$crud->unset_clone();
			
			$crud->unset_read();
			session_start();
			date_default_timezone_set("America/Tegucigalpa");
			$fechaHoy = date('Y-m-d');
			$crud->order_by('Fecha','desc');
			if($_SESSION['tipo_acceso'] == "Cajero"){
			$crud->unset_export();
			$crud->unset_delete();
			$crud->columns('ID_Gasto','Valor','Descripcion','Foto','Fecha');
			$crud->where('gasto_venta.ID_Sucursal', $_COOKIE['suc_id']);
			//$crud->where('gasto_venta.ID_Cajero', $_COOKIE['caj_id']);
			$crud->where('DATE(Fecha)', $fechaHoy);
			}else{
			//COLUMNAS A MOSTRAR
			$crud->columns('ID_Sucursal','ID_Cajero','ID_Gasto','Valor','Descripcion','Foto','Fecha');
			}
			$crud->required_fields('ID_Gasto','Valor','Descripcion');
			//DISPLAY
			$crud->display_as('ID','ID');
			$crud->display_as('Valor','Valor');
			$crud->display_as('Descripcion','Concepto de');
			$crud->display_as('Foto','Foto');
			$crud->display_as('Fecha','Fecha');
			$crud->display_as('ID_Sucursal','Sucursal');
			$crud->display_as('ID_Cajero','Cajero');
			$crud->display_as('ID_Gasto','Tipo de Gasto');
			//THEME
			$crud->set_theme('flexigrid');
			//TIPO DE CAMPO
			$crud->field_type('Valor', 'number');
			//TABLA A LEER
			$crud->set_table('gasto_venta');
			
			//CAMPOS A VISUALIZAR
			$crud->add_fields('ID_Sucursal','ID_Cajero','ID_Gasto','Valor','Descripcion','Foto');
    		$crud->edit_fields('ID_Sucursal','ID_Cajero','ID_Gasto','Valor','Descripcion','Foto');
			//Set Relation
			$crud->set_relation('ID_Sucursal', 'sucursal', 'Nombre');
			$crud->set_relation('ID_Cajero', 'cajeros', '{Nombre} {Apellido}');
			$crud->set_relation('ID_Gasto', 'tipo_gasto', 'Nombre');
			//SUBIR FOTO
			$crud->set_field_upload('Foto','Facturas');
			//WHERE
			//$crud->where('comercio.log_id', $_COOKIE['log_id']);
			//DESPUES DE INSERTAR CUALQUIER PRODUCTO
			$crud->callback_before_insert(array($this, 'InsertarID'));
			$output = $crud->render();
			$this->_example_output($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
	function InsertarID($post_array)
	{
		$post_array['ID_Sucursal'] = $_COOKIE['suc_id'];
		$post_array['ID_Cajero'] = $_COOKIE['caj_id'];
		print_r($post_array);
		//die();
		return $post_array;
	}
}
