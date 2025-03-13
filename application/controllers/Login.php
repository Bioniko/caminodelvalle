<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');

		$this->load->library('grocery_CRUD');
	}

	public function _example_output($output = null)
	{
		$this->load->view('1login.php',(array)$output);
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
			$crud->display_as('log_user','Usuario');
			$crud->display_as('ID_Sucursal','Sucursal');
			$crud->display_as('ID_Cajero','Cajero');
			$crud->display_as('Usuario','Usuario');
			$crud->display_as('Password','Contraseña');
			$crud->display_as('Tipo','Tipo Acceso');
			//THEME
			$crud->set_theme('flexigrid');
			//TIPO DE CAMPO
			$crud->field_type('Password', 'password');
			//TABLA A LEER
			$crud->set_table('login');
			//COLUMNAS A MOSTRAR
			$crud->columns('ID','ID_Sucursal','ID_Cajero','Usuario','Tipo','Estado');
			//CAMPOS A VISUALIZAR
			$crud->add_fields('ID_Sucursal','ID_Cajero','Usuario','Password','Tipo','Estado');
    		$crud->edit_fields('ID_Sucursal','ID_Cajero','Usuario','Password','Tipo','Estado');
			//Set Relation
			$crud->set_relation('ID_Sucursal', 'sucursal', 'Nombre');
			$crud->set_relation('ID_Cajero', 'cajeros', '{Nombre} {Apellido}');
			//FIELD TYPE
			$crud->field_type(
				'Estado','dropdown', array(
					'Activo' => 'Activo', 
					'Inactivo' => 'Inactivo'
				));
			$crud->field_type(
				'Tipo','dropdown', array(
					'Admin' => 'Admin', 
					'Cajero' => 'Cajero'
				));
			//FUNCION MD5
			$crud->callback_before_insert(array($this, 'InsMD5Password'));
            $crud->callback_before_update(array($this, 'UpdMD5Password'));
			$output = $crud->render();
			$this->_example_output($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}

	function UpdMD5Password($post_array)
	{
		$query = $this->db->query("SELECT Password FROM Login WHERE ID_Cajero = ".$post_array['ID_Cajero']);
		if ($query->num_rows() > 0) { // Si hay filas
			$pw = $query->row(); // Obtener la fila
			if ($pw->Password != $post_array['Password']) {
				$pass = $post_array['Password'];
				$salt = "billeton";
				$post_array['Password'] = MD5($pass.$salt);
			}
			return $post_array;
		}
	}
	function InsMD5Password($post_array)
	{
		$pass = $post_array['Password'];
		$salt = "billeton";
		$post_array['Password'] = MD5($pass.$salt);
		return $post_array;
	}
}
