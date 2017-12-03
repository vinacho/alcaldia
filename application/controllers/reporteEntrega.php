<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ReporteEntrega extends CI_Controller{
    
	public function __construct() {

        parent::__construct();
        if ($this->session->userdata('COD_FUN') == null) {
            redirect('pqrsfWeb', 'refresh');
        }
        else{
           $this->load->Model('pagina_rol');
           $this->load->Model('Pqrsf');
        }
    }

    public function index(){
    	$this->generarReporte();
    }

    public function generarReporte(){
		//Configuracion de la vista
		$datos['titulo'] = 'REPORTE DE ENTREGA';
		$datos['cabecera'] = array('Num','Anno','No. Tick','Fecha', 'Asunto', 'Folios', 'Documento', 'Persona');

		$listado = $this->Pqrsf->ListaPQRSF_POR_GENERAR_REP($this->session->userdata('COD_FUN'));
		$datos['info'] = $listado;

		//Cargar la vista del reporte
		$this->load->view('reportePdf', $datos);
	}
}