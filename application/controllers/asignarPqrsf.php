<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AsignarPqrsf extends CI_Controller{

	public function __construct() {
        parent::__construct();
        if ($this->session->userdata('COD_FUN') == null) {
            redirect('pqrsfWeb', 'refresh');
        }
        else{
    	    $this->load->Model('pqrsf');
    	    $this->load->Model('funcionario');
            $this->load->Model('pagina_rol');
        }
	}

	public function index(){
		$data['listaPqrsf'] = $this->pqrsf->ListaPqrsfPorAsignar($this->session->userdata('COD_FUN'), 0);
		$data['listaFuncionarios'] = $this->funcionario->ListaFuncionariosXDependencia($this->session->userdata('COD_DEP'));
        $data['menus'] = $this->pagina_rol->SelectPAGINA_ROL($this->session->userdata('COD_ROL'));
		

        /* -----------------------------MANEJO DE PLANTILLA ---------------------------*/
        //Manejo de vistas - carga de datos basicos
        $data['titulo'] = 'Asignar PQRSF';
        $data['css'] = '';
        //El codigo javascript de la pagina se carga en otro documento y se guarda en assets/js/app
        $data['javas'] = '<script src="assets/js/app/asignarPqrsf.js"></script>';
        //Se insertar funcion en el load para transferir el base_url a los scripts de javascript
        $data['load_java'] = 'onload = "base_site(\''. base_url().'\');"';
        
        //Carga de las vistas con plantilla
        $this->load->view('Plantilla/header', $data, array('error' => ' '));
        $this->load->view('AsignacionPqrsf');
        $this->load->view('Plantilla/footer');
    }

    public function AsignarPqrsf(){
    	$codFun =  $this->input->post('cmbFuncionario');
    	$numTick = $this->input->post('txtNumTick');

    	//Verifica la existencia del Pqrsf por tick
    	$pqrsf = $this->pqrsf->SelectPQRSF($numTick);
    	if($pqrsf == null){
    		echo "No existe el Pqrsf por numero de tick proporcionado, por favor contacte el administrador del sistema";
    		exit();
    	}

    	//Verifica la existencia del funcionario
    	$funcio = $this->funcionario->SelectFUNCIONARIO($codFun);
		if($pqrsf == null){
    		echo "No existe el funcionario con código [" . $codFun . "], por favor contacte el administrador del sistema";
    		exit();
    	}

    	//Actualiza el pqrsf
    	$this->pqrsf->AsignarPqrsf($codFun, $numTick);
    	echo "";
    }

}