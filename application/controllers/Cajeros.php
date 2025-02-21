<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cajeros extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');

		$this->load->library('grocery_CRUD');
	}

	public function _example_output($output = null)
	{
		$this->load->view('1cajeros.php',(array)$output);
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
			$crud->unset_export();
			$crud->unset_read();
			//DISPLAY
			$crud->display_as('com_nombre','Nombre');
			$crud->display_as('com_icono','Icono');
			//THEME
			$crud->set_theme('flexigrid');
			//TABLA A LEER
			$crud->set_table('cajeros');
			//COLUMNAS A MOSTRAR
			$crud->columns('ID','Nombre','Apellido','Celular','Identidad');
			//CAMPOS A VISUALIZAR
			$crud->add_fields('Nombre','Apellido','Celular','Identidad');
    		$crud->edit_fields('Nombre','Apellido','Celular','Identidad');
			//WHERE
			$crud->required_fields('Nombre','Apellido');
			//$crud->where('comercio.log_id', $_COOKIE['log_id']);
			$output = $crud->render();
			$this->_example_output($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
}
