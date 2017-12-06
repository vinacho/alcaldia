<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PqrsfWeb extends CI_Controller{

    public function __construct() {
        parent::__construct();

        if ($this->session->userdata('COD_ROL') != 'VEN') {
            if ($this->session->userdata('COD_FUN') == null) {
              redirect('login', 'refresh'); exit();
            }
            if ($this->session->userdata('COD_ROL') == 'ADM') {
                redirect('dependencias', 'refresh'); exit();
            } else {
                redirect('seguimientoPqrsf', 'refresh'); exit();
            }
            
        }
        $this->load->helper(array('form', 'url','html'));
        $this->load->Model('Pqrsf');
        $this->load->Model('persona');
        $this->load->Model('parametro');
        $this->load->Model('documento');
        $this->load->Model('tipoPersona');
        $this->load->Model('documentoIdentificacion');
        $this->load->Model('anexoPQRSF');
        $this->load->Model('dependencia');
    }

    public function index()
    {
        $data['documentos'] = $this->documento->SelectDocumentos();
        $data['tiposPersona'] = $this->tipoPersona->SelectTIPO_PERSONA();
        $data['tiposDocumento'] = $this->documentoIdentificacion->SelectTIPO_DOCUMENTO();
        $data['dependencias'] = $this->dependencia->ListaJefesXDependencia();
        
        /* -----------------------------MANEJO DE PLANTILLA ---------------------------*/
        //Manejo de vistas - carga de datos basicos
        $data['titulo'] = 'Radicacion PQRSF WEB';
        $data['css'] = '';
        //El codigo javascript de la pagina se carga en otro documento y se guarda en assets/js/app
        $data['javas'] = '<script src="' . base_url() . 'assets/js/app/radicarPQRSFWeb.js"></script>';
        //Se insertar funcion en el load para transferir el base_url a los scripts de javascript
        $data['load_java'] = 'onload = "base_site(\''. base_url().'\');"';
        
        //Carga de las vistas con plantilla
        $this->load->view('Plantilla/header', $data, array('error' => ' '));
        $this->load->view('radicarPqrsfWeb');
        $this->load->view('Plantilla/footer');
    }

    function RegistrarPqrsf(){

        try {

            $codDoc =  $this->security->xss_clean(strip_tags($this->input->post('cmbClaDocumento')));
            $fechaRadica =  $this->security->xss_clean(strip_tags($this->input->post('txtFecha')));
            $asuntoPqr =  $this->security->xss_clean(strip_tags(trim($this->input->post('txtAsunto'))));
            $cantFolios =  $this->security->xss_clean(strip_tags(trim($this->input->post('txtCantidadFolios'))));
            $numOficio =  $this->security->xss_clean(strip_tags(trim($this->input->post('txtNumOficio'))));
            $observaciones =  $this->security->xss_clean(trim($this->input->post('txtObservacion')));
            $descripcion =  $this->security->xss_clean(strip_tags(trim($this->input->post('txtDescripcion'))));
            $tipCorrespondencia = $this->input->post("tipoCorrespondencia");
            $tipPqr = "W";
            $copia = "N";
            $numPersona = "NULL";

            //Primero registra la persona, en caso de que se haya seleccionado la opción radicación normal
            $opcion = $this->input->post('tiporadica');
            if (strcmp($opcion, "anonima") != 0) {
                $tipoPersona =  $this->security->xss_clean(strip_tags($this->input->post('cmbTipPersona')));
                $tipDoc =  $this->security->xss_clean(strip_tags($this->input->post('cmbTipoDocumento')));
                $numDoc =  $this->security->xss_clean(strip_tags(trim($this->input->post('txtNumDoc'))));
                $nombre =  $this->security->xss_clean(strip_tags(trim($this->input->post('txtNombres'))));
                $apellido =  $this->security->xss_clean(strip_tags(trim($this->input->post('txtApellidos'))));
                $genero = $this->input->post('genero');
                $direccion  =  $this->security->xss_clean(strip_tags(trim($this->input->post('txtDireccion'))));
                $email  =  $this->security->xss_clean(strip_tags(trim($this->input->post('txtCorreo'))));
                $aQuienDirigido =  $this->security->xss_clean(strip_tags(trim($this->input->post('cmbAquienDirigido'))));

                //Verifica la existencia de la persona con documento
                $personaExiste = $this->persona->SelectPERSONA($numDoc);
                if($personaExiste == NULL){
                    $this->persona->InsertPERSONA($tipoPersona, $tipDoc, $numDoc, $nombre, $apellido, $genero, $direccion, $email);
                }

                //Consulta el numero de persona
                $personaX = $this->persona->SelectPERSONA($numDoc);
                $numPersona = $personaX['NUM_PER'];
            }

            //Registra el pqrsf
            //1. Genera el alfanumerico corespondiente al numero de tick
            $var = TRUE;
            do{
                $numtick = $this->getRandomCode();
                if($this->Pqrsf->SelectPQRSF($numtick) == NULL ){
                  $var = FALSE;      
                }
            } while($var == TRUE);

            $this->Pqrsf->INSERTPqrsf($codDoc, $fechaRadica, $asuntoPqr, $cantFolios, $numOficio, 
                                      $observaciones, $descripcion, $numtick, $tipCorrespondencia, 
                                      $tipPqr, $copia, $numPersona, $aQuienDirigido, "");

            //Obtiene el nro interno y codigo de la dependencia por usuario
            $dependenciax = $this->dependencia->DependenciaPorUsuario($aQuienDirigido);
            
            if($dependenciax != NULL){
                //Actualiza el numero interno de entrada
                $this->dependencia->ActualizarNumIntDepenencia($dependenciax['NUM_INT'], $dependenciax['COD_FUN']);
            }

            //Si no se asigno a nadie cambia el estado a Pendiente
            if(strcmp($aQuienDirigido, "") == 0){
                $this->Pqrsf->CambiarEstadoPQRSF($numtick, "P");
            }

            $param = $this->parametro->SelectPARAMETRO('NUMPQR');
            $lastPqrsf = $param['VAL_PAR'];
            //Actualiza el parametro de numero de radicado
            $this->parametro->UpdatePARAMETRO(($lastPqrsf + 1), 'NUMPQR', "");

            //----------------------------------------------------------------------------------------
            //Carga los adjuntos
            //----------------------------------------------------------------------------------------
            //Establece el nombre para el adjunto

            $radicado = $this->Pqrsf->SelectPQRSF($numtick);
            if($radicado != NULL){


                $numPqr = $radicado['NUM_PQR'];
                $anoPqr = $radicado['ANIO_PQR'];

                $claseDocumento = $this->documento->SelectDocumento($codDoc);
                $nomDocumento = $claseDocumento['NOM_DOC'];             


                $this->load->library('upload');

                $files = $_FILES;

                if($files != null){
                    $cpt = count($_FILES['adjuntos']['name']);
                    for($i = 0; $i < $cpt; $i++)
                    {           
                        $_FILES['userfile']['name'] = $files['adjuntos']['name'][$i];
                        $_FILES['userfile']['type'] = $files['adjuntos']['type'][$i];
                        $_FILES['userfile']['tmp_name'] = $files['adjuntos']['tmp_name'][$i];
                        $_FILES['userfile']['error'] = $files['adjuntos']['error'][$i];
                        $_FILES['userfile']['size'] = $files['adjuntos']['size'][$i];    

                        $nomArchivo = $numPqr . "_" . $anoPqr . "_" . $nomDocumento . ", " . $numPqr . "_" . $anoPqr . "_" . ($i+1);

                        $this->upload->initialize($this->set_upload_options($nomArchivo));
                        $this->upload->do_upload();
                        $this->anexoPQRSF->InsertANEXO_PQRSF_ENT($numPqr, $anoPqr, "uploads/" . $nomArchivo);
                    }
                }

                redirect("pqrsfWeb", "refresh");
            }
        }
        catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    private function set_upload_options($nombre)   
    {   
        //upload an image options
        $config = array();
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png|pdf';
        $config['max_size']      = '3072';
        $config['file_name'] = $nombre;
        $config['overwrite']     = FALSE;

        return $config;
    }

    function getRandomCode(){
        $an = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $su = strlen($an) - 1;
        $alfaNumerico = "";

        for($i = 0; $i < 20; $i ++ ){
            $alfaNumerico = $alfaNumerico . substr($an, rand(0, $su), 1) ;
        }
        return $alfaNumerico;
    }

}

?>