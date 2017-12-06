<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Roles extends CI_Controller{

	public function __construct() {
        parent::__construct();
        if ($this->session->userdata('COD_FUN') == null) {
            redirect('pqrsfWeb', 'refresh');
        }
        else{
	    	$this->load->Model('rol');
            $this->load->Model('pagina_rol');
	    }
	}

	public function index(){
		$data['roles'] = $this->rol->SelectROLS();
        $data['menus'] = $this->pagina_rol->SelectPAGINA_ROL($this->session->userdata('COD_ROL'));
		
        /* -----------------------------MANEJO DE PLANTILLA ---------------------------*/
        //Manejo de vistas - carga de datos basicos
        $data['titulo'] = 'Gestion roles de usuario';
        $data['css'] = '';
        //El codigo javascript de la pagina se carga en otro documento y se guarda en assets/js/app
        $data['javas'] = '<script src="assets/js/app/roles.js"></script>';
        //Se insertar funcion en el load para transferir el base_url a los scripts de javascript
        $data['load_java'] = 'onload = "base_site(\''. base_url().'\');"';
        
        //Carga de las vistas con plantilla
        $this->load->view('Plantilla/header', $data, array('error' => ' '));
        $this->load->view('roles');
        $this->load->view('Plantilla/footer');
    }

    public function AgregarRol(){
    	$codRol = $this->input->post("txtCodRol");
    	$nomRol = $this->input->post("txtNomRol");
    	$estRol = $this->input->post("estado");

    	//Busca el rol
    	$rol = $this->rol->SelectROL($codRol);

    	if($rol != null){
    		echo "0";
    	}
    	else{
    		$this->rol->InsertROL($codRol, $nomRol, $estRol);
    		echo "1";
    	}
    }

    public function ActualizarRol(){
		$codRol = $this->input->post("txtCodRol");
		$nomRol = $this->input->post("txtNomRol");
		$estRol = $this->input->post("estado");

		//Busca el rol
		$rol = $this->rol->SelectROL($codRol);

		if($rol == null){
			echo "0";
		}
		else{
			$this->rol->UpdateRol($codRol, $nomRol, $estRol);
			echo "1";
		}
    }

 }