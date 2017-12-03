<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Parametros extends CI_Controller{

	public function __construct() {
        parent::__construct();
        if ($this->session->userdata('COD_FUN') == null) {
            redirect('pqrsfWeb', 'refresh');
        }
        else{
	       $this->load->Model('parametro');
           $this->load->Model('pagina_rol');
        }
	}

	public function index(){
		$data['parametros'] = $this->parametro->SelectPARAMETROS();
        $data['menus'] = $this->pagina_rol->SelectPAGINA_ROL($this->session->userdata('COD_ROL'));
		
        /* -----------------------------MANEJO DE PLANTILLA ---------------------------*/
        //Manejo de vistas - carga de datos basicos
        $data['titulo'] = 'Gestion parametros';
        $data['css'] = '';
        //El codigo javascript de la pagina se carga en otro documento y se guarda en assets/js/app
        $data['javas'] = '<script src="assets/js/app/parametros.js"></script>';
        //Se insertar funcion en el load para transferir el base_url a los scripts de javascript
        $data['load_java'] = 'onload = "base_site(\''. base_url().'\');"';
        
        //Carga de las vistas con plantilla
        $this->load->view('Plantilla/header', $data, array('error' => ' '));
        $this->load->view('parametros');
        $this->load->view('Plantilla/footer');
    }

    public function AgregarParametro(){
    	$codPar =  $this->input->post('txtCodPar');
    	$nomPar =  $this->input->post('txtNomPar');
    	$valPar =  $this->input->post('txtValPar');

    	//Valida que no exista
    	$param = $this->parametro->SelectPARAMETRO($codPar);

    	if($param != null){
			echo "0";    		
    	}
    	else{
    		$this->parametro->InsertPARAMETRO($valPar, $codPar, $nomPar);
			echo "1";    		
    	}
    }

    public function ActualizarParametro(){
    	$codPar =  $this->input->post('txtCodPar');
    	$nomPar =  $this->input->post('txtNomPar');
    	$valPar =  $this->input->post('txtValPar');

    	//Valida que no exista
    	$param = $this->parametro->SelectPARAMETRO($codPar);

    	if($param == null){
			echo "0";    		
    	}
    	else{
    		$this->parametro->UpdatePARAMETRO($valPar, $codPar, $nomPar);
			echo "1";    		
    	}
    }
}