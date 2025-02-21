<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reporte extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');

		$this->load->library('grocery_CRUD');
	}

	public function _example_output($output = null)
	{
		$this->load->view('1reporte.php',(array)$output);
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
			$crud->unset_add();
			//DISPLAY
			$crud->display_as('com_nombre','Nombre');
			$crud->display_as('com_icono','Icono');
			//THEME
			$crud->set_theme('flexigrid');
			//TABLA A LEER
			$crud->set_table('bitacora');
			//COLUMNAS A MOSTRAR
			$crud->columns('ID_Sucursal','ID_Cajero','Accion','Fecha');
			//Set Relation
			$crud->set_relation('ID_Sucursal', 'sucursal', 'Nombre');
			$crud->set_relation('ID_Cajero', 'cajeros', '{Nombre} {Apellido}');
			//CAMPOS A VISUALIZAR
			$crud->add_fields('com_nombre', 'com_icono');
    		$crud->edit_fields('com_nombre', 'com_icono');
			//WHERE
			//$crud->where('comercio.log_id', $_COOKIE['log_id']);
			//DESPUES DE INSERTAR CUALQUIER PRODUCTO
			$output = $crud->render();
			$this->_example_output($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
	public function Ver()
	{
		if(isset($_GET['Desde']) && !Empty($_GET['Desde']) && isset($_GET['Hasta']) && !Empty($_GET['Hasta'])){		
			$admin = "SELECT * FROM Cajeros WHERE ID = 1";
			$adm = $this->db->query($admin)->row();
			$moneda = "SELECT * FROM Moneda WHERE DATE(Fecha) BETWEEN '".$_GET['Desde']."' AND '".$_GET['Hasta']."'";
			$mon = $this->db->query($moneda)->result();
			$gastos = "SELECT * FROM gasto_venta WHERE DATE(Fecha) BETWEEN '".$_GET['Desde']."' AND '".$_GET['Hasta']."'";
			$gas = $this->db->query($gastos)->result();
			$data = (object)array('adm' => $adm,'mon' => $mon,'gas' => $gas);
		}
		$this->load->view('1resultado.php',(array)$data);
	}

	public function WhatsappReporte()
	{
		if(isset($_GET['Desde']) && !Empty($_GET['Desde']) && isset($_GET['Hasta']) && !Empty($_GET['Hasta'])){		
			$admin = "SELECT * FROM Cajeros WHERE ID = 1";
			$adm = $this->db->query($admin)->row();
			$moneda = "SELECT * FROM Moneda WHERE DATE(Fecha) BETWEEN '".$_GET['Desde']."' AND '".$_GET['Hasta']."'";
			$mon = $this->db->query($moneda)->result();
			$gastos = "SELECT * FROM gasto_venta gv LEFT JOIN tipo_gasto tg ON gv.ID_Gasto = tg.ID WHERE DATE(Fecha) BETWEEN '".$_GET['Desde']."' AND '".$_GET['Hasta']."' ORDER BY ID_Gasto";
			$gas = $this->db->query($gastos)->result();
			$data = (object)array('adm' => $adm,'mon' => $mon,'gas' => $gas);
		}
		$this->load->view('1whatsappReporte.php',(array)$data);
	}
}
