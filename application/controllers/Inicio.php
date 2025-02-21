<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inicio extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');

		$this->load->library('grocery_CRUD');
	}

	public function _example_output($output = null)
	{
		$this->load->view('inicio.php',(array)$output);
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

	public function show()
	{
		try{
			if(isset($_POST['txt_user']) 
			&& !empty($_POST['txt_user']) 
			&& isset($_POST['txt_pass']) 
			&& !empty($_POST['txt_pass'])){
				$usuario = str_replace("'", "", $_POST['txt_user']);
				$password = $_POST['txt_pass'];
				$salt = "billeton";
				$MD5Password = MD5($password.$salt);
				$fila = $this->db->query("SELECT * FROM login WHERE Usuario = '".$usuario."' AND Password = '".$MD5Password."' AND Estado = 'Activo'")->row();
				if(isset($fila)){
					setcookie("log_id", $fila->ID, time()+365 * 24 * 60 * 60, "/");
					setcookie("caj_id", $fila->ID_Cajero, time()+365 * 24 * 60 * 60, "/");
					session_start();
					$_SESSION['log_id'] = $fila->ID;
					$_SESSION['Usuario'] = $usuario;
					$_SESSION['tipo_acceso'] = $fila->Tipo;
					$Suc = $this->db->query("SELECT * FROM sucursal WHERE ID = '".$fila->ID_Sucursal."'")->row();
					if(isset($Suc)){
						setcookie("suc_id", $Suc->ID, time()+365 * 24 * 60 * 60, "/");
						setcookie("Nombre", $Suc->Nombre, time()+365 * 24 * 60 * 60, "/");
						setcookie("Celular", $Suc->Celular, time()+365 * 24 * 60 * 60, "/");
						setcookie("Celular2", $Suc->Celular2, time()+365 * 24 * 60 * 60, "/");
					}
					$Caj = $this->db->query("SELECT * FROM Cajeros WHERE ID = '".$fila->ID_Cajero."'")->row();
					if(isset($Suc)){
						setcookie("Nombre_Cajero", $Caj->Nombre, time()+365 * 24 * 60 * 60, "/");
						setcookie("Apellido_Cajero", $Caj->Apellido, time()+365 * 24 * 60 * 60, "/");
					}
					//echo "1\n";
					//echo "log_id: ".$_SESSION['log_id']."\n";
					//echo "Usuario: ".$_SESSION['Usuario']."\n";
					//echo "tipo_acceso: ".$_SESSION['tipo_acceso']."\n";
					header("Location: ".base_url()."index.php/Moneda/Show");
				}else{
					//echo "2";
					header("Location: ".base_url()."index.php/Inicio?p=0");
				}
			}else{
				//echo "3";
				header("Location: ".base_url()."index.php/Inicio?e=1");
			}
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
}
