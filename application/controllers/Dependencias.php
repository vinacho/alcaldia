<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dependencias extends CI_Controller{

	public function __construct() {
        parent::__construct();
        if ($this->session->userdata('COD_FUN') == null) {
            redirect('pqrsfWeb', 'refresh');
        }
        else{
           $this->load->Model('pagina_rol');
           $this->load->Model('dependencia');
       }
	}

	public function index(){
		$data['dependencias'] = $this->dependencia->SelectDEPENDENCIA();
        $data['menus'] = $this->pagina_rol->SelectPAGINA_ROL($this->session->userdata('COD_ROL'));
		
         /* -----------------------------MANEJO DE PLANTILLA ---------------------------*/
        //Manejo de vistas - carga de datos basicos
        $data['titulo'] = 'Gestion dependencias';
        $data['css'] = '';
        //El codigo javascript de la pagina se carga en otro documento y se guarda en assets/js/app
        $data['javas'] = '<script src="assets/js/app/dependencias.js"></script>';
        //Se insertar funcion en el load para transferir el base_url a los scripts de javascript
        $data['load_java'] = 'onload = "base_site(\''. base_url().'\');"';
        
        //Carga de las vistas con plantilla
        $this->load->view('Plantilla/header', $data, array('error' => ' '));
        $this->load->view('dependencias');
        $this->load->view('Plantilla/footer');
    }

    public function AgregarDependencia(){
    	$codDep = $this->input->post("txtCodDep");
    	$nomDep = $this->input->post("txtNombreDep");
    	$preDep = $this->input->post("txtPrefijoDep");
    	$numIntEntDep = $this->input->post("txtnumIntEntDep");
    	$numIntSalDep = $this->input->post("txtnumIntSalDep");

    	//Verifica la existencia
    	$dependencia = $this->dependencia->SelectDEPENDENCIAS($codDep);

    	if($dependencia != null){
    		echo "0";
    	}
    	else{
    		$this->dependencia->InsertDEPENDENCIA($codDep, $nomDep, $preDep, $numIntEntDep, $numIntSalDep);
    		echo "1";
    	}
    }
	
	public function ActualizarDependencia(){
		$codDep = $this->input->post("txtCodDep");
    	$nomDep = $this->input->post("txtNombreDep");
    	$preDep = $this->input->post("txtPrefijoDep");
    	$numIntEntDep = $this->input->post("txtnumIntEntDep");
    	$numIntSalDep = $this->input->post("txtnumIntSalDep");

    	//Verifica la existencia
    	$dependencia = $this->dependencia->SelectDEPENDENCIAS($codDep);

    	if($dependencia == null){
    		echo "0";
    	}
    	else{
    		$this->dependencia->UpdateDEPENDENCIA($codDep, $nomDep, $preDep, $numIntEntDep, $numIntSalDep);
    		echo "1";
    	}
    }
}