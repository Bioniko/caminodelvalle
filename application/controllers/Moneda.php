<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Moneda extends CI_Controller {
	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');

		$this->load->library('grocery_CRUD');
	}

	public function _example_output($output = null)
	{
		$this->load->view('1moneda.php',(array)$output);
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
			session_start();
			date_default_timezone_set('America/Tegucigalpa');
			$fechaHoy = date('Y-m-d');
			//echo $fechaHoy;
			$existe = $this->db->query("SELECT * FROM moneda WHERE DATE(Fecha) = '".$fechaHoy."'");
			if($existe->num_rows() == 1 && $_SESSION['tipo_acceso'] == "Cajero"){
				$crud->unset_add();
			}
			if($_SESSION['tipo_acceso'] == "Cajero"){
			$crud->unset_delete();
			$crud->columns('ID','Fecha','TotalDia','1lemp','2lemp','5lemp','10lemp','20lemp','50lemp','100lemp','200lemp','500lemp',
						   'Total','Bac','Promerica','Banpais','Transferencia','Cheque','Devoluciones','Hugo','Pedidos_Ya','Distegu',
						   'Ocho','Deliverys','HugoBusiness','Speedy','Empleados','FamiliadelValle','Efectivo',
						   'Otro','Caja_Fija','Descripcion','DescripcionInv','DescripcionDep');
			$crud->where('moneda.ID_Sucursal', $_COOKIE['suc_id']);
			$crud->where('moneda.ID_Cajero', $_COOKIE['caj_id']);
			$crud->where('DATE(Fecha)', $fechaHoy);
			}else{
			//COLUMNAS A MOSTRAR
			$crud->columns('ID','ID_Sucursal','ID_Cajero','Fecha','TotalDia','1lemp','2lemp','5lemp','10lemp','20lemp','50lemp','100lemp','200lemp','500lemp',
			'Total','Bac','Promerica','Banpais','Transferencia','Cheque','Devoluciones','Hugo','Pedidos_Ya','Distegu',
			'Ocho','Deliverys','HugoBusiness','Speedy','Empleados','FamiliadelValle','Efectivo',
			'Otro','Caja_Fija','Descripcion','DescripcionInv','DescripcionDep');
			}
			//DISPLAY
			$crud->display_as('ID_Sucursal','Sucursal');
			$crud->display_as('ID_Cajero','Cajero');
			$crud->display_as('1lemp','1 Lps');
			$crud->display_as('2lemp','2 Lps');
			$crud->display_as('5lemp','5 Lps');
			$crud->display_as('10lemp','10 Lps');
			$crud->display_as('20lemp','20 Lps');
			$crud->display_as('50lemp','50 Lps');
			$crud->display_as('100lemp','100 Lps');
			$crud->display_as('200lemp','200 Lps');
			$crud->display_as('500lemp','500 Lps');
			$crud->display_as('Total','Total Caja');
			$crud->display_as('Bac','Bac');
			$crud->display_as('Promerica','Promérica');
			$crud->display_as('Banpais','Banpaís');
			$crud->display_as('Transferencia','Transferencia');
			$crud->display_as('Cheque','Cheque');
			$crud->display_as('Devoluciones','Devoluciones');
			$crud->display_as('Hugo','Hugo');
			$crud->display_as('Pedidos_Ya','Pedidos Ya');
			$crud->display_as('Distegu','Distegu');
			$crud->display_as('Ocho','Ocho');
			$crud->display_as('Deliverys','Deliverys');
			$crud->display_as('HugoBusiness','Hugo Business');
			$crud->display_as('Speedy','Speedy');
			$crud->display_as('Empleados','Empleados');
			$crud->display_as('FamiliadelValle','Familia del Valle');
			$crud->display_as('Otro','Otro');
			$crud->display_as('Descripcion','Observacion');
			$crud->display_as('DescripcionInv','Observacion Inventario');
			$crud->display_as('DescripcionDep','Observacion Deposito');
			$crud->display_as('TotalDia','Total de la Venta');
			$crud->display_as('Caja_Fija','(-)Caja Fija');
			//THEME
			$crud->set_theme('flexigrid');
			//TABLA A LEER
			$crud->set_table('moneda');
			//CAMPOS A VISUALIZAR
			$crud->add_fields('ID_Sucursal','ID_Cajero','1lemp','2lemp','5lemp','10lemp','20lemp','50lemp','100lemp','200lemp','500lemp',
								'Total','Bac','Promerica','Banpais','Transferencia','Cheque','Devoluciones','Hugo','Pedidos_Ya','Distegu',
								'Ocho','Deliverys','HugoBusiness','Speedy','Empleados','FamiliadelValle','Efectivo',
								'Otro','Descripcion','DescripcionInv','DescripcionDep','TotalDia','Caja_Fija');
    		$crud->edit_fields('ID_Sucursal','ID_Cajero','1lemp','2lemp','5lemp','10lemp','20lemp','50lemp','100lemp','200lemp','500lemp',
								'Total','Bac','Promerica','Banpais','Transferencia','Cheque','Devoluciones','Hugo','Pedidos_Ya','Distegu',
								'Ocho','Deliverys','HugoBusiness','Speedy','Empleados','FamiliadelValle','Efectivo',
								'Otro','Descripcion','DescripcionInv','DescripcionDep','TotalDia','Caja_Fija');
			//Set Relation
			$crud->set_relation('ID_Sucursal', 'sucursal', 'Nombre');
			$crud->set_relation('ID_Cajero', 'cajeros', '{Nombre} {Apellido}');
			//AGREGAR BOTONES DE ACCIONES
			$crud->add_action('Factura' ,'', '','fa-solid fa-file-invoice-dollar crud-action" target="_blank',array($this,'Factura'));
			$crud->add_action('Caja' ,'', '','fa-solid fa-money-bills crud-action" target="_blank',array($this,'Caja'));
			$crud->add_action('Inventario' ,'', '','fa-solid fa-carrot crud-action" target="_blank',array($this,'Inventario'));
			$crud->add_action('Deposito' ,'', '','fa-solid fa-sack-dollar crud-action" target="_blank',array($this,'Deposito'));
			$crud->add_action('Whatsapp' ,'', '','fa-brands fa-whatsapp crud-action" target="_blank',array($this,'Whatsapp'));
			//WHERE
			//$crud->where('moneda.ID_Sucursal', $_COOKIE['suc_id'].' ORDER BY FECHA DESC');
			//DESPUES DE INSERTAR CUALQUIER PRODUCTO
			$crud->callback_before_insert(array($this,'insert'));
			$crud->callback_before_update(array($this,'insert'));
			//CAMPOS REQUERIDOS
			//$crud->required_fields('1lemp','2lemp','5lemp','10lemp','20lemp','50lemp','100lemp','200lemp','500lemp');
			$output = $crud->render();
			$this->_example_output($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
	function Factura($primary_key){
		$url = base_url(); 
		return $url.'index.php/Moneda/ImprimirFactura?id='.$primary_key;
	}

	function Caja($primary_key){
		$url = base_url(); 
		return $url.'index.php/Moneda/ImprimirCaja?id='.$primary_key;
	}

	function Inventario($primary_key){
		$url = base_url(); 
		return $url.'index.php/Moneda/ImprimirInventario?id='.$primary_key;
	}

	function Deposito($primary_key){
		$url = base_url(); 
		return $url.'index.php/Moneda/ImprimirDeposito?id='.$primary_key;
	}

	function Whatsapp($primary_key){
		$url = base_url(); 
		return $url.'index.php/Moneda/ImprimirWhatsapp?id='.$primary_key;
	}

	public function ImprimirFactura()
	{
		$moneda = "SELECT * FROM Moneda WHERE ID = ".$_GET['id'];
		$mon = $this->db->query($moneda)->row();
		$fechamon = $mon->Fecha;
		$fecha = (new DateTime($fechamon))->format('Y-m-d');
		$gastos = "SELECT * FROM gasto_venta WHERE DATE(Fecha) = '".$fecha."'";
		$gas = $this->db->query($gastos)->result();
		$inventario = "SELECT * FROM inventario";
		$inv = $this->db->query($inventario)->result();
		$data = (object)array('mon' => $mon,'gas' => $gas,'inv' => $inv);
		$this->load->view('1factura.php',(array)$data);
	}

	public function ImprimirCaja()
	{
		$moneda = "SELECT * FROM Moneda WHERE ID = ".$_GET['id'];
		$mon = $this->db->query($moneda)->row();
		$data = (object)array('mon' => $mon);
		$this->load->view('1caja.php',(array)$data);
	}

	public function ImprimirInventario()
	{
		$moneda = "SELECT * FROM Moneda WHERE ID = ".$_GET['id'];
		$mon = $this->db->query($moneda)->row();
		$inventario = "SELECT * FROM inventario";
		$inv = $this->db->query($inventario)->result();
		$data = (object)array('mon' => $mon,'inv' => $inv);
		$this->load->view('1inventariofac.php',(array)$data);
	}

	public function ImprimirDeposito()
	{
		$moneda = "SELECT * FROM Moneda WHERE ID = ".$_GET['id'];
		$mon = $this->db->query($moneda)->row();
		$cajero = "SELECT * FROM Cajeros WHERE ID = ".$_COOKIE['caj_id'];
		$caj = $this->db->query($cajero)->row();
		$data = (object)array('mon' => $mon,'caj' => $caj);
		$this->load->view('1deposito.php',(array)$data);
	}

	public function ImprimirWhatsapp()
	{
		$admin = "SELECT * FROM Cajeros WHERE ID = 1";
		$adm = $this->db->query($admin)->row();
		$moneda = "SELECT * FROM Moneda WHERE ID = ".$_GET['id'];
		$mon = $this->db->query($moneda)->row();
		$fechamon = $mon->Fecha;
		$fecha = (new DateTime($fechamon))->format('Y-m-d');
		$gastos = "SELECT * FROM gasto_venta WHERE DATE(Fecha) = '".$fecha."'";
		$gas = $this->db->query($gastos)->result();
		$inventario = "SELECT * FROM inventario";
		$inv = $this->db->query($inventario)->result();
		$cajero = "SELECT * FROM Cajeros WHERE ID = ".$_COOKIE['caj_id'];
		$caj = $this->db->query($cajero)->row();
		$data = (object)array('adm' => $adm,'mon' => $mon,'gas' => $gas,'inv' => $inv,'caj' => $caj);
		//header("Location: https://web.whatsapp.com/send?phone=504".$adm->Celular."&text=Hola");
		$this->load->view('1whatsapp.php',(array)$data);
	}

	function insert($post_array)
	{
		$cajaFija = 0.00;
		$cf = $this->db->query("SELECT Valor FROM caja_fija")->row();
		if(isset($cf)){
			$post_array['Caja_Fija'] = $cf->Valor;
			$cajaFija = $cf->Valor;
		}
		$total = (intval($post_array['1lemp']) * 1) +
                 (intval($post_array['2lemp']) * 2) +
                 (intval($post_array['5lemp']) * 5) +
                 (intval($post_array['10lemp']) * 10) +
                 (intval($post_array['20lemp']) * 20) +
                 (intval($post_array['50lemp']) * 50) +
                 (intval($post_array['100lemp']) * 100) +
                 (intval($post_array['200lemp']) * 200) +
                 (intval($post_array['500lemp']) * 500);
		$totaldia = (intval($total)) - $cajaFija;
		$post_array['ID_Sucursal'] = $_COOKIE['suc_id'];
		$post_array['ID_Cajero'] = $_COOKIE['caj_id'];
		$post_array['Total'] = $total;
		$post_array['TotalDia'] = $totaldia;
		print_r($post_array);
		//die();
		return $post_array;
	}
}
