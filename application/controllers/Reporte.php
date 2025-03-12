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
		$sucursal = "SELECT * FROM sucursal";
		$suc = $this->db->query($sucursal)->result();
		$data = (object)array('suc' => $suc);
		$this->load->view('1reporte.php',(array)$data);
	}
	public function Ver()
	{
		if(isset($_GET['Desde']) && !Empty($_GET['Desde']) && isset($_GET['Hasta']) && !Empty($_GET['Hasta'])){	
			if($_GET['rest'] == "0"){
				$admin = "SELECT * FROM Cajeros WHERE ID = 1";
				$adm = $this->db->query($admin)->row();
				$moneda = "SELECT * FROM Moneda WHERE DATE(Fecha) BETWEEN '".$_GET['Desde']."' AND '".$_GET['Hasta']."'";
				$mon = $this->db->query($moneda)->result();
				$gastos = "SELECT * FROM gasto_venta WHERE DATE(Fecha) BETWEEN '".$_GET['Desde']."' AND '".$_GET['Hasta']."'";
				$gas = $this->db->query($gastos)->result();
				$data = (object)array('adm' => $adm,'mon' => $mon,'gas' => $gas);
			}else{
				$admin = "SELECT * FROM Cajeros WHERE ID = 1";
				$adm = $this->db->query($admin)->row();
				$moneda = "SELECT * FROM Moneda WHERE DATE(Fecha) BETWEEN '".$_GET['Desde']."' AND '".$_GET['Hasta']."' AND ID_Sucursal = ".$_GET['rest'];
				$mon = $this->db->query($moneda)->result();
				$gastos = "SELECT * FROM gasto_venta WHERE DATE(Fecha) BETWEEN '".$_GET['Desde']."' AND '".$_GET['Hasta']."' AND ID_Sucursal = ".$_GET['rest'];
				$gas = $this->db->query($gastos)->result();
				$sucursal = "SELECT * FROM sucursal WHERE ID = ".$_GET['rest'];
				$suc = $this->db->query($sucursal)->row();
				$data = (object)array('adm' => $adm,'mon' => $mon,'gas' => $gas,'suc' => $suc);
			}	
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
