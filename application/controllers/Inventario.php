<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inventario extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');

		$this->load->library('grocery_CRUD');
	}

	public function _example_output($output = null)
	{
		$this->load->view('1inventario.php',(array)$output);
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
			session_start();
			if($_SESSION['tipo_acceso'] == "Cajero"){
				$crud->unset_delete();
				$crud->unset_add();
				$crud->columns('Producto','Cantidad');
				$crud->edit_fields('ID_Sucursal','ID_Cajero','Cantidad');
				}else{
				//COLUMNAS A MOSTRAR
				$crud->columns('ID','ID_Sucursal','ID_Cajero','Producto','Cantidad');
				//CAMPOS A VISUALIZAR
				$crud->add_fields('ID_Sucursal','ID_Cajero','Producto','Cantidad');
				$crud->edit_fields('ID_Sucursal','ID_Cajero','Producto','Cantidad');
				}
			//DISPLAY
			$crud->display_as('ID_Sucursal','Sucursal');
			$crud->display_as('ID_Cajero','Cajero');
			$crud->display_as('Producto','Producto');
			//THEME
			$crud->set_theme('flexigrid');
			//TABLA A LEER
			$crud->set_table('inventario');
			//Set Relation
			$crud->set_relation('ID_Sucursal', 'sucursal', 'Nombre');
			$crud->set_relation('ID_Cajero', 'cajeros', '{Nombre} {Apellido}');
			//WHERE
			//$crud->where('comercio.log_id', $_COOKIE['log_id']);
			//DESPUES DE INSERTAR CUALQUIER PRODUCTO
			$crud->callback_before_insert(array($this, 'InsertarID'));
			$crud->callback_before_UPDATE(array($this, 'InsertarID'));
			$output = $crud->render();
			$this->_example_output($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
	public function InsertarID($post_array) {
		$post_array['ID_Sucursal'] = $_COOKIE['suc_id'];
		$post_array['ID_Cajero'] = $_COOKIE['caj_id'];
		return $post_array;
    }
	public function InventarioNuevo() {
		$Inventario = "SELECT * FROM inventario WHERE ID_Sucursal = ".$_COOKIE['suc_id'];
		$inv = $this->db->query($Inventario)->result();
		$data = (object)array('inv' => $inv);
		$this->load->view('1inventarionuevo.php',(array)$data);
    }

	public function InventarioActualizar() {
		$Inventario = "UPDATE inventario SET Cantidad = '" . $_GET['Cantidad'] . "' WHERE ID = '" . $_GET['ID'] . "'";
		try {
			$inv = $this->db->query($Inventario);
			if ($this->db->affected_rows() > 0) {
				echo "<script>alert('Actualización realizada correctamente.');</script>";
			} else {
				echo "<script>alert('No se realizaron cambios. Verifica los datos proporcionados.');</script>";
			}
		} catch (Exception $e) {
			echo "<script>alert('Ocurrió un error al actualizar: " . $e->getMessage() . "');</script>";
		}
		$Inventario = "SELECT * FROM inventario";
		$inv = $this->db->query($Inventario)->result();
		$data = (object)array('inv' => $inv);
		$this->load->view('1inventarionuevo.php',(array)$data);
	}	
}
