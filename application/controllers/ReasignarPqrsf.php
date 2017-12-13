<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ReasignarPqrsf extends CI_Controller{
    
	public function __construct() {

        parent::__construct();
        if ($this->session->userdata('COD_FUN') == null) {
            redirect('pqrsfWeb', 'refresh');
        }
        else{
            $this->load->helper(array('form', 'url','html'));
            $this->load->Model('pqrsf');
            $this->load->Model('pagina_rol');
            $this->load->Model('documento');
            $this->load->Model('dependencia');
        }
    }

    public function index(){

        $data['listaPqrsf'] = $this->pqrsf->ListaPqrsfPorAsignar($this->session->userdata('COD_FUN'), 1);
        $data['menus'] = $this->pagina_rol->SelectPAGINA_ROL($this->session->userdata('COD_ROL'));
        $data['documentos'] = $this->documento->SelectDocumentos();
        $data['dependencias'] = $this->dependencia->SelectDEPENDENCIA();

        /* -----------------------------MANEJO DE PLANTILLA ---------------------------*/
        //Manejo de vistas - carga de datos basicos
        $data['titulo'] = 'Reasignación de PQRSF';
        $data['css'] = '';
        //El codigo javascript de la pagina se carga en otro documento y se guarda en assets/js/app
        $data['javas'] = '<script src="assets/js/app/reasignarPQRSF.js"></script>';
        //Se insertar funcion en el load para transferir el base_url a los scripts de javascript
        $data['load_java'] = 'onload = "base_site(\''. base_url().'\');"';
        
        //Carga de las vistas con plantilla
        $this->load->view('Plantilla/header', $data, array('error' => ' '));
        $this->load->view('reasignacionPqrsf');
        $this->load->view('Plantilla/footer');      
    }

    public function ReasignarPqrsf(){

        $codDoc = $this->input->post('cmbClaDoc');
        $codFun = $this->input->post('cmbFuncionario');
        $numOficio = $this->input->post('txtOficio');
        $asunto = $this->input->post('txtAsunto');
        $observaciones = $this->input->post('txtObservacion');
        $numTick = $this->input->post('txtNumTick');

        //Verifica que el pqr exista por numero de tick
        $pqr = $this->pqrsf->SelectPQRSF($numTick);

           if($pqr != null){

            $this->pqrsf->CopiaAuditoriaPqrsf($numTick);

            //Modifica la información del pqrsf
            if ($this->session->userdata('COD_ROL')=='JDP') {
                $this->pqrsf->ReasignarPqrsf($codDoc, $codFun, $numOficio, $asunto, $observaciones, $numTick,1);
            } else {
                $this->pqrsf->ReasignarPqrsf($codDoc, $codFun, $numOficio, $asunto, $observaciones, $numTick);
            }
            
            echo "";
        }
        else{
            echo "El caso por código no [" . $numTick . "] no existe.";
        }
    }
 }