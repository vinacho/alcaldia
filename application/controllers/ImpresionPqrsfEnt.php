<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ImpresionPqrsfEnt extends CI_Controller{
    
	public function __construct() {

        parent::__construct();
        if ($this->session->userdata('COD_FUN') == null) {
            redirect('pqrsfWeb', 'refresh');
        }
        else{
            $this->load->helper(array('form', 'url','html'));
            $this->load->Model('pqrsf');
            $this->load->Model('pagina_rol');
        }
    }

    public function index(){
        $data['menus'] = $this->pagina_rol->SelectPAGINA_ROL($this->session->userdata('COD_ROL'));
        $data['listaPqrsf'] = $this->pqrsf->ListaPqrsfPorAsignar($this->session->userdata('COD_FUN'), 1);

        /* -----------------------------MANEJO DE PLANTILLA ---------------------------*/
        //Manejo de vistas - carga de datos basicos
        $data['titulo'] = 'Impresión PQRSF de Entrada';
        $data['css'] = '';
        //El codigo javascript de la pagina se carga en otro documento y se guarda en assets/js/app
        $data['javas'] = '<script src="assets/js/app/imprimirPqrsfEnt.js"></script>';
        //Se insertar funcion en el load para transferir el base_url a los scripts de javascript
        $data['load_java'] = 'onload = "base_site(\''. base_url().'\');"';
        
        //Carga de las vistas con plantilla
        $this->load->view('Plantilla/header', $data, array('error' => ' '));
        $this->load->view('imprimirPqrsfEnt');
        $this->load->view('Plantilla/footer');      
    }
}