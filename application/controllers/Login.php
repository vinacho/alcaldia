<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller{

	public function __construct() {
        parent::__construct();
        if ($this->session->userdata('COD_FUN') != null) {
            redirect('radicarPqrsfNor', 'refresh');
        }
        else{
            $this->load->Model('funcionario');
            $this->load->Model('usuario');
            
            //$this->load->view('login');

            /* -----------------------------MANEJO DE PLANTILLA ---------------------------*/
            //Manejo de vistas - carga de datos basicos
            $data['titulo'] = 'Login de usuarios PQRSF';
            $data['css'] = '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">';
            $data['css'] = $data['css'] . '<link rel="stylesheet" type="text/css" href="' . base_url() .'assets/css/login.css">';
            //El codigo javascript de la pagina se carga en otro documento y se guarda en assets/js/app
            $data['javas'] = '<script type="text/javascript" src="' . base_url() . 'assets/js/app/login.js"></script>';
            //Se insertar funcion en el load para transferir el base_url a los scripts de javascript
            $data['load_java'] = 'onload = "base_site(\''. base_url().'\');"';
            
            //Carga de las vistas con plantilla
            $this->load->view('Plantilla/header', $data, array('error' => ' '));
            $this->load->view('login');
            $this->load->view('Plantilla/footer');

        }
	}

	public function index(){
        $this->load->helper(array('form'));
    }

    function ValidarUsuario($codigoUsuario, $clave){
    	$funcionario = $this->funcionario->ValidarFuncionario($codigoUsuario, $clave);
    	if($funcionario != NULL){
    		return TRUE;
    	}
    	else{
    		return FALSE;
    	}
    }

    public function ExisteUsuario(){
        $this->load->library('encrypt');
    	$codUsuario = $this->security->xss_clean(strip_tags($this->input->post("txtuser")));
    	$pwd = $this->security->xss_clean(strip_tags($this->input->post("txtpwd")));
    	$pwdEnct =  md5(sha1($pwd));
    	
    	$existe = $this->ValidarUsuario($codUsuario, $pwdEnct);

        if($existe == TRUE){
            //Valida que el usuario este activo
            $activo = $this->usuario->UsuarioActivo($codUsuario);

            if($activo == NULL){
                echo "El usuario se enuentra inactivo en el sistema.";
            }
            else{
                echo "";
            }
            exit();
        }
        else{
            echo "Usuario o contraseña no son validos";
            exit();
        }
    }

    public function IniciarSesion(){
    	
    	$codUsuario = $this->input->post("txtuser");
    	$pwd = $this->input->post("txtpwd");
    	$pwdEnct = md5(sha1($pwd));
    	

    	$existe = $this->ValidarUsuario($codUsuario, $pwdEnct);
    	if($existe == TRUE){

            //Valida que el usuario este activo
            $activo = $this->usuario->UsuarioActivo($codUsuario);

            if($activo != null){
                $user = $this->funcionario->GetIfoFullFuncionario($codUsuario);
                //Crea las sesiones
                $newdata = array(
                       'COD_FUN'    => $user['COD_FUN'],
                       'NOM_FUN'    => $user['NOM_FUN'],
                       'COD_ROL'    => $user['COD_ROL'],
                       'COD_DEP'    => $user['COD_DEP']);
                $this->session->set_userdata($newdata);

                //redirige a la pagina principal
                redirect('radicarPqrsf', 'refresh');    
            }
            else{
                echo "El usuario se enuentra inactivo en el sistema.";
            }
    	}
    	else{
    		echo "Usuario o contraseña no son validos";
    	}
    }

}