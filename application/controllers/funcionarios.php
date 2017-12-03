<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Funcionarios extends CI_Controller{

	public function __construct() {
        parent::__construct();
		
        if ($this->session->userdata('COD_FUN') == null) {
            redirect('pqrsfWeb', 'refresh');
        }
        else{
    		$this->load->library('encrypt');
    	    $this->load->helper('security');

    	    $this->load->Model('usuario');
    	    $this->load->Model('rol');
    	    $this->load->Model('funcionario');
    	    $this->load->Model('dependencia');
            $this->load->Model('pagina_rol');
        }
	}

	public function index(){
		$data['roles'] = $this->rol->SelectROLS();
		$data['dependencias'] = $this->dependencia->SelectDEPENDENCIA();
		$data['listaFun'] = $this->funcionario->ListaFuncionarios();
        $data['menus'] = $this->pagina_rol->SelectPAGINA_ROL($this->session->userdata('COD_ROL'));
		
        /* -----------------------------MANEJO DE PLANTILLA ---------------------------*/
        //Manejo de vistas - carga de datos basicos
        $data['titulo'] = 'Gestion funcionarios';
        $data['css'] = '';
        //El codigo javascript de la pagina se carga en otro documento y se guarda en assets/js/app
        $data['javas'] = '<script src="assets/js/app/funcionarios.js"></script>';
        //Se insertar funcion en el load para transferir el base_url a los scripts de javascript
        $data['load_java'] = 'onload = "base_site(\''. base_url().'\');"';
        
        //Carga de las vistas con plantilla
        $this->load->view('Plantilla/header', $data, array('error' => ' '));
        $this->load->view('funcionarios');
        $this->load->view('Plantilla/footer');
    }

    public function AgregarFuncionario(){

    	$codFun = $this->security->xss_clean($this->input->post('txtLogin'));
    	$codDep = $this->input->post('cmbDependencia');
    	$nomFun = $this->security->xss_clean($this->input->post('txtNomFun'));
    	$numDocFun = $this->security->xss_clean($this->input->post('txtnumDoc'));
    	$tipoFun = $this->input->post('tipoFun');
    	$jefeDep = $this->input->post('jefeDep');
    	$codRol = $this->input->post('cmbRolFun');
    	
    	//Clave de encriptacion
    	$pass = md5(sha1($codFun));

    	//Verifica la existencia del funcionario
    	$funcio = $this->funcionario->SelectFUNCIONARIO($codFun);
    	if($funcio != NULL){
    		echo "El funcionario ya existe";
    		exit();
    	}

		//Si selecciono que es jefe de dependencia entonces valida que solo exista uno
    	if(strcmp($jefeDep, "S") == 0){
    		
    		//Consulta si la dependencia ya tiene un jefe
    		$hayJefe = $this->funcionario->HayJefeDependencia($codDep);

    		if($hayJefe != NULL){
    			echo "Ya existe un jefe para esta dependencia";
    			exit();
    		}
    	}

    	//Agrega el funcionario
    	$this->funcionario->InsertFUNCIONARIO($codFun, $codDep, $nomFun, $numDocFun, $tipoFun, $jefeDep);

    	//Agrega el usuario del sistema
    	$this->usuario->InsertUSUARIO($codFun, $codRol, $pass, "A");
    	echo "";
    }

    public function ActEstadoFuncionario(){
    	$codFun  = $this->input->post('codFun');
    	$estado  = $this->input->post('estado');

    	$this->usuario->CambiarEstadoUsuario($codFun, $estado);
    	echo "Se ha cambiado el estado exitosamente";
    }

    public function GetInfoFuncionario(){
    	$codFun = $this->input->post('codFun');

    	//Consulta el funcionario
    	$funcionario = $this->funcionario->GetIfoFullFuncionario($codFun);
    	if($funcionario == null){
    		echo "Funcionario no existe";
    		exit();
    	}
    	else{

	    	//Prepara la informacion a retornar
	    	$infoFun = array('NOM_FUN' => $funcionario['NOM_FUN'], 'NUM_DOC_FUN' => $funcionario['NUM_DOC_FUN'], 
	    				     'COD_FUN' => $funcionario['COD_FUN'], 'COD_DEP' => $funcionario['COD_DEP'], 
	    				     'COD_ROL' => $funcionario['COD_ROL'], 'TIPO_FUN' => $funcionario['TIPO_FUN'], 
	    				     'JEF_FUN' => $funcionario['JEF_FUN']);
			echo json_encode($infoFun);
		}
    }

    public function ActualizarFuncionario(){
		$codFun = $this->security->xss_clean($this->input->post('txtLogin'));
    	$codDep = $this->input->post('cmbDependencia');
    	$nomFun = $this->security->xss_clean($this->input->post('txtNomFun'));
    	$numDocFun = $this->security->xss_clean($this->input->post('txtnumDoc'));
    	$tipoFun = $this->input->post('tipoFun');
    	$jefeDep = $this->input->post('jefeDep');
    	$codRol = $this->input->post('cmbRolFun');
    	
	   	//Verifica la existencia del funcionario
    	$funcio = $this->funcionario->SelectFUNCIONARIO($codFun);
    	if($funcio == NULL){
    		echo "El funcionario con código [" . $codFun . "] NO existe";
    		exit();
    	}

		//Si selecciono que es jefe de dependencia entonces valida que solo exista uno
    	if(strcmp($jefeDep, "S") == 0){
    		
    		//Consulta si la dependencia ya tiene un jefe
    		$hayJefe = $this->funcionario->HayJefeDependencia($codDep);
    		if($hayJefe != NULL){

    			if( strcmp($hayJefe['COD_FUN'], $codFun) != 0){
    				echo "Ya existe un jefe para esta dependencia";
    				exit();
    			}
    		}
    	}

    	//Actualiza el funcionario
    	$this->funcionario->UpdateFUNCIONARIO($codFun, $codDep, $nomFun, $numDocFun, $tipoFun, $jefeDep);

    	//Actualiza el usuario del sistema
    	$this->usuario->UpdateUSUARIO($codFun, $codRol);
    	echo "";

    }

    public function FuncionariosXDependencia(){
        $COD_DEP = $this->input->post('codDep');
        $COD_ROL = $this->input->post('rolFun');
        $funcionarios = $this->funcionario->FuncionariosXDependencia($COD_DEP, $COD_ROL);
        $lista = array();
        if($funcionarios !=  null){
            foreach ($funcionarios as $fila) {
                $infoFun = array('COD_FUN' => $fila['COD_FUN'], 
                                 'NOM_FUN' => $fila['NOM_FUN']);
                array_push($lista, $infoFun);
            }
        }
        echo json_encode($lista);
    }
}