<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DocumentoRadicacion extends CI_Controller{
	
	public function __construct() {
        parent::__construct();
         if ($this->session->userdata('COD_FUN') == null) {
            redirect('pqrsfWeb', 'refresh');
        }
        else{
            $this->load->Model('alerta');
    	    $this->load->Model('documento');
            $this->load->Model('pagina_rol');
        }
	}

	public function index(){
		$data['documentos'] = $this->documento->SelectDocumentos();
        $data['menus'] = $this->pagina_rol->SelectPAGINA_ROL($this->session->userdata('COD_ROL'));
		

        /* -----------------------------MANEJO DE PLANTILLA ---------------------------*/
        //Manejo de vistas - carga de datos basicos
        $data['titulo'] = 'Gestion Clase de documentos';
        $data['css'] = '';
        //El codigo javascript de la pagina se carga en otro documento y se guarda en assets/js/app
        $data['javas'] = '<script src="assets/js/app/documentos.js"></script>';
        //Se insertar funcion en el load para transferir el base_url a los scripts de javascript
        $data['load_java'] = 'onload = "base_site(\''. base_url().'\');"';
        
        //Carga de las vistas con plantilla
        $this->load->view('Plantilla/header', $data, array('error' => ' '));
        $this->load->view('documentos');
        $this->load->view('Plantilla/footer');
    }

    public function RegistrarAlerta(){
        $codDoc = $this->input->post('codDoc');
        $diaAle = $this->input->post('diaAle');
        $ordAle = $this->input->post('ordAle');
        $colAle = $this->input->post('colAle');

        $this->alerta->InsertALERTA($codDoc, $diaAle, $ordAle, $colAle);
        echo "Se ha registrado la alerta con éxito";
    }
    
    public function ActualizarAlerta(){
        $codDoc = $this->input->post('codDoc');
        $diaAle = $this->input->post('diaAle');
        $ordAle = $this->input->post('ordAle');
        $colAle = $this->input->post('colAle');

        $this->alerta->UpdateALERTA($codDoc, $diaAle, $ordAle, $colAle);
        echo "Se ha actualizado la alerta con éxito";
    }

    public function GetInfoAlerta(){
        $codDoc = $this->input->post('codDoc');

        $alerta = $this->alerta->SelectALERTA($codDoc);
        if($alerta  != null){
            //Prepara la informacion a retornar
            $infoAle = array('COD_DOC' => $alerta['COD_DOC'], 'DIA_ALE' => $alerta['DIA_ALE'], 
                             'ORD_ALE' => $alerta['ORD_ALE'], 'COL_ALE' => $alerta['COL_ALE']);
            echo json_encode($infoAle);
        }
        else{
            echo "";
        }
    }

    public function RegistrarDocumento(){
    	$codDoc = $this->input->post("txtCodDoc");
    	$nomDoc = $this->input->post("txtNomDoc");
    	$orden = $this->input->post("txtOrden");
    	$dias = $this->input->post("txtDias");

    	//Valida el documento
    	$doc = $this->documento->SelectDocumento($codDoc);
    	if($doc != NULL){
    		echo "0";
    	}
    	else{
	    	echo $this->documento->InsertDOCUMENTO($codDoc, $nomDoc, $orden, $dias);
    		echo "1";
    	}
    }

    public function ActualizarDocumento(){
		$codDoc = $this->input->post("txtCodDoc");
    	$nomDoc = $this->input->post("txtNomDoc");
    	$orden = $this->input->post("txtOrden");
    	$dias = $this->input->post("txtDias");

    	//Valida el documento
    	$doc = $this->documento->SelectDocumento($codDoc);
    	if($doc == NULL){
    		echo "0";
    	}
    	else{
	    	echo $this->documento->UpdateDOCUMENTO($codDoc, $nomDoc, $orden, $dias);
    		echo "1";
    	}
    }

}