<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TipoDocumento extends CI_Controller{

	public function __construct() {
        parent::__construct();
        if ($this->session->userdata('COD_FUN') == null) {
            redirect('pqrsfWeb', 'refresh');
        }
        else{
	    	$this->load->Model('tiposDocumento');
            $this->load->Model('pagina_rol');
	    }
	}

	public function index(){
		$data['tiposDocumento'] = $this->tiposDocumento->SelectTIPO_DOCUMENTO();
        $data['menus'] = $this->pagina_rol->SelectPAGINA_ROL($this->session->userdata('COD_ROL'));
		
        /* -----------------------------MANEJO DE PLANTILLA ---------------------------*/
        //Manejo de vistas - carga de datos basicos
        $data['titulo'] = 'Gestion tipos documento';
        $data['css'] = '';
        //El codigo javascript de la pagina se carga en otro documento y se guarda en assets/js/app
        $data['javas'] = '<script src="assets/js/app/tiposDocumento.js"></script>';
        //Se insertar funcion en el load para transferir el base_url a los scripts de javascript
        $data['load_java'] = 'onload = "base_site(\''. base_url().'\');"';
        
        //Carga de las vistas con plantilla
        $this->load->view('Plantilla/header', $data, array('error' => ' '));
        $this->load->view('tiposDocumento');
        $this->load->view('Plantilla/footer');
    }

    public function AgregarTipoDocumento(){
    	$codDoc = $this->input->post('txtCodDoc');
    	$nomDoc = $this->input->post('txtNomDoc');

    	//Verifica si ya existe
    	$doc = $this->tiposDocumento->GetTIPO_DOCUMENTO($codDoc);

    	if($doc != null){
    		echo "0";
    	}
    	else{
    		$this->tiposDocumento->InsertTIPO_DOCUMENTO($codDoc, $nomDoc);
    		echo "1";
    	}
    }

	public function ActualizarTipoDocumento(){
		$codDoc = $this->input->post('txtCodDoc');
		$nomDoc = $this->input->post('txtNomDoc');

		//Verifica si ya existe
		$doc = $this->tiposDocumento->GetTIPO_DOCUMENTO($codDoc);

		if($doc == null){
			echo "0";
		}
		else{
			$this->tiposDocumento->UpdateTIPO_DOCUMENTO($codDoc, $nomDoc);
			echo "1";
		}
	}
}