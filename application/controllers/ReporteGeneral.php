<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ReporteGeneral extends CI_Controller{
    
	public function __construct() {

        parent::__construct();
        if ($this->session->userdata('COD_FUN') == null) {
            redirect('pqrsfWeb', 'refresh');
        }
        else{
           $this->load->Model('pagina_rol');
           $this->load->Model('Pqrsf');
           $this->load->Model('documento');
           $this->load->Model('funcionario');
        }
    }

    public function index(){

        $data['menus'] = $this->pagina_rol->SelectPAGINA_ROL($this->session->userdata('COD_ROL'));
        $data['documentos'] = $this->documento->SelectDocumentos();
        $data['listaFun'] = $this->funcionario->ListaFuncionarios();

    	/* -----------------------------MANEJO DE PLANTILLA ---------------------------*/
        //Manejo de vistas - carga de datos basicos
        $data['titulo'] = 'Reporte ';
        $data['css'] = '';
        //El codigo javascript de la pagina se carga en otro documento y se guarda en assets/js/app
        $data['javas'] = '<script src="assets/js/app/funcionarios.js"></script>';
        //Se insertar funcion en el load para transferir el base_url a los scripts de javascript
        $data['load_java'] = 'onload = "base_site(\''. base_url().'\');"';
        
        //Carga de las vistas con plantilla
        $this->load->view('Plantilla/header', $data, array('error' => ' '));
        $this->load->view('reporteMultCr');
        $this->load->view('Plantilla/footer');
    }

    public function Reporte(){
        //Configuracion de la vista
        $datos['titulo'] = 'REPORTE DE MULTICRITERIO DE RADICADOS PQRSF';
        $datos['cabecera'] = array('Num','Anno','No. Tick','Fecha', 'Asunto', 'Folios', 'Documento', 'Persona');

        $codFun = $this->input->post('cmbFuncionario');
        $feccRacIni = ((strcmp($this->input->post('fechaRadica'), "") == 0) ? "" : $this->input->post('txtFecRacIni'));
        $fecRacFin = ((strcmp($this->input->post('fechaRadica'), "") == 0) ? "" : $this->input->post('txtFecRacFin'));
        $fecCieIni = ((strcmp($this->input->post('fechaCieRadica'), "") == 0) ? "" : $this->input->post('txtFecCieIni'));
        $fecCieFin = ((strcmp($this->input->post('fechaCieRadica'), "") == 0) ? "" : $this->input->post('txtFecCieFin'));
        $canFol = $this->input->post('txtCantFolios') ;
        $numOfi = $this->input->post('txtNumOfi');
        $codDoc = $this->input->post('cmbClaDoc');

        $listado = $this->Pqrsf->ListaPQRSF_MULTICRITERIO($feccRacIni, $fecRacFin, 
                                                          $fecCieIni, $fecCieFin,
                                                          $canFol, $numOfi, 
                                                          $codFun, $codDoc);
        $datos['info'] = $listado;

        //Cargar la vista del reporte
        $this->load->view('reportePdf', $datos);
    }
}