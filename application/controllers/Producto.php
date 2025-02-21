<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Producto extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');

		$this->load->library('grocery_CRUD');
	}

	public function _example_output($output = null)
	{
		$this->load->view('1producto.php',(array)$output);
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
			$crud->set_table('producto');
			//COLUMNAS A MOSTRAR
			$crud->columns('ID','Nombre');
			//CAMPOS A VISUALIZAR
			$crud->add_fields('Nombre');
    		$crud->edit_fields('Nombre');
			//WHERE
			//$crud->where('comercio.log_id', $_COOKIE['log_id']);
			//DESPUES DE INSERTAR CUALQUIER PRODUCTO
			//$crud->callback_after_insert(array($this, 'InsertarID'));
			$output = $crud->render();
			$this->_example_output($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
	public function InsertarID($post_array, $primary_key) {
		$query = "UPDATE comercio SET log_id = ".$_COOKIE['log_id']." WHERE com_id = ".$primary_key;
		$this->db->query($query);
    }
}
