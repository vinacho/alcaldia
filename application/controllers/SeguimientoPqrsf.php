<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SeguimientoPqrsf extends CI_Controller{

	public function __construct() {
        parent::__construct();

        if ($this->session->userdata('COD_FUN') == null) {
            redirect('pqrsfWeb', 'refresh');
        }
        else{
            $this->load->helper(array('form', 'url','html'));
            $this->load->Model('anexoPQRSF');
    	    $this->load->Model('anexoPQRSF_SAL');
    	    $this->load->Model('pqrsf');
    	    $this->load->Model('documento');
    	    $this->load->Model('parametro');
    	    $this->load->Model('seguimientosPqrsf');
            $this->load->Model('pagina_rol');
            $this->load->Model('funcionario');
        }
	}

	public function index(){
    	$data['listaPqrsf'] = $this->pqrsf->ListaPqrsfASeguimiento($this->session->userdata('COD_FUN'));
        $data['menus'] = $this->pagina_rol->SelectPAGINA_ROL($this->session->userdata('COD_ROL'));
		
        /* -----------------------------MANEJO DE PLANTILLA ---------------------------*/
        //Manejo de vistas - carga de datos basicos
        $data['titulo'] = 'Seguimiento PQRSF';
        $data['css'] = '';
        //El codigo javascript de la pagina se carga en otro documento y se guarda en assets/js/app
        $data['javas'] = '<script src="' . base_url() . 'assets/js/app/seguimientoPqrsf.js"></script>';
        //Se insertar funcion en el load para transferir el base_url a los scripts de javascript
        $data['load_java'] = 'onload = "base_site(\''. base_url().'\');"';
        
        //Carga de las vistas con plantilla
        $this->load->view('Plantilla/header', $data, array('error' => ' '));
        $this->load->view('seguimientosPqrsf');
        $this->load->view('Plantilla/footer');
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

    public function RegistrarSeguimientoPqrsf(){
    	$numTick = $this->input->post('txtNumTick');
    	$fechaRta = $this->input->post('txtFechaRes');
    	$cantFolios = $this->input->post('txxtCantFol');
    	$asunto = $this->input->post('txtAsuOfi');
    	$descripcion = $this->input->post('txtDescOfi');

    	//Consulta el numero de pqrsf por numero de tick
    	$pqr = $this->pqrsf->SelectPQRSF($numTick);

		if($pqr != null){
			$numPqr = $pqr['NUM_PQR'];
            $anoPqr = $pqr['ANIO_PQR'];
            $codDoc = $pqr['COD_DOC'];
			
			//Graba el seguimiento
            $this->seguimientosPqrsf->InsertPQRSF_SAL($numPqr, $anoPqr, 
            										  $fechaRta, $cantFolios, 
            										  $descripcion, $asunto);

			//consulta el parametro
            $param = $this->parametro->SelectPARAMETRO('NUMPQRSEG');
            $lastPqrsf = $param['VAL_PAR'];
            //Actualiza el parametro de numero de radicado
            $this->parametro->UpdatePARAMETRO(($lastPqrsf + 1), 'NUMPQRSEG', "");
			//Guarda los archivos adjuntos, si los hay
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
                    $ext=pathinfo($files['adjuntos']['name'][$i], PATHINFO_EXTENSION);   

                    $nomArchivo = $numPqr . "_" . $anoPqr  . "_" . $numPqr . "_" . $anoPqr . "_" . ($i+1);

                    $this->upload->initialize($this->set_upload_options($nomArchivo));
                    $this->upload->do_upload();
                    $this->anexoPQRSF_SAL->InsertANEXO_PQRSF_SAL($lastPqrsf, $anoPqr, "uploads/" . $nomArchivo.'.'.$ext);
                }
            }

            /*Valida si hay salida de correspondencia*/
            $fechaSalCor = $this->input->post('txtFecSalCor');
            $cantFolSalCor = $this->input->post('txtCantFolSalCor');
            $asuSalCor = $this->input->post('txtAsuntoSalCor');
            $obsSalCor = $this->input->post('txtObsSalCor');

            if(strcmp($cantFolSalCor, "")  != 0 && strcmp($asuSalCor, "")  != 0 && strcmp($obsSalCor, "") != 0){
                $this->seguimientosPqrsf->InsertPQRSF_SAL_COR($numPqr, $anoPqr, 
                                                              $fechaSalCor, $cantFolSalCor, 
                                                              $obsSalCor, $asuSalCor);

                //consulta el parametro
                $par = $this->parametro->SelectPARAMETRO('NUMPQRSAL');
                $lastSeg = $par['VAL_PAR'];
                //Actualiza el parametro de numero de salida de correspondencia
                $this->parametro->UpdatePARAMETRO(($lastSeg + 1), 'NUMPQRSAL', "");
            }

            //Genera el comando para la impresion del formato de salida
            $this->index();
		}	
    }

    public function GetInfoPqrsf(){
    	
    	$numTick = $this->input->post('numTick');
    	$imp = $this->input->post('imp');
        //Consulta el pqrsf
    	$info = $this->pqrsf->SelectPQRSF($numTick);
        if ($imp==1) {
                $this->pqrsf->setimp($numTick);
            }

    	if($info != null){
    		
    		$anexos = $this->anexoPQRSF->SelectANEXO_PQRSF_ENT($info['NUM_PQR']);
    		$tieneAnexos = "No cuenta con anexos";
    		if($anexos != null){
    			$tieneAnexos = "Si, cuenta con anexos";
    		}

            $registros = $this->seguimientosPqrsf->SelectPQRSF_SAL($info['NUM_PQR'], $info['ANIO_PQR']);
            $html = "";
            if($registros != null){
                $html = "<table id='tbSeguimientos' class='table table-striped table-bordered bootstrap-datatable datatable'> " .
                            "<thead> " .
                                "<tr>".
                                    "<th>Fecha</th>" .
                                    "<th>No Oficios</th>" .
                                    "<th>Asunto</th>" .
                                    "<th>Descripcion</th>" .
                                    "<th>Adjuntos</th>" .
                                    "<th>Opciones</th>" .
                                "</tr>". 
                            "</thead>"  ;

                foreach($registros as $fila){
                    $anexos2 = $this->anexoPQRSF->SelectANEXO_PQRSF_SAL($fila['NUM_PQR_SAL']);
                    $html = $html ."<tr>" .
                                        "<td class='center'>" . $fila['FEC_OFI_SAL'] . "</td>" .
                                        "<td class='center'>" . $fila['CAN_FOL_SAL'] . "</td>" .
                                        "<td class='center'>" . $fila['DES_OFI_SAL'] . "</td>" .
                                        "<td class='center'>" . $fila['ASU_OFI_SAL'] . "</td>" ;
                                        if ($anexos2!=null) {
                                                $html=$html."<td>";
                                                $html=$html."<ul>";
                                                foreach ($anexos2 as $key2 => $value2) {
                                                     $html=$html."<li>";
                                                    $html=$html."<a href='".$value2['PATH_ANE_SAL'] . "'>" . $value2['PATH_ANE_SAL'] . "</a>";
                                                     $html=$html."</li>";
                                                }
                                                $html=$html."</ul>";
                                                $html=$html. "</td> ";
                                        }  else {
                                            $html=$html."<td></td>";

                                        }
                                      $html=$html.  "<td class='center'> " .
                                            "<a class='btn btn-success' href='#' data-toggle='modal' data-target='#infoSeguimiento'> ".
                                                "<i class='icon-edit icon-white'></i> ".
                                                "Visualizar ".
                                            "</a> ";

                                          

                                  $html = $html .  "</td>"."</tr>";
                }
                $html = $html . "</tbody></table>";
            }

            $cod_dep = "";
            $nomFun =  "";
            $pre_dep = "";
            if($info['COD_FUN'] != null){
                $depend = $this->funcionario->SelectFUNCIONARIO($info['COD_FUN']);
                if($depend != null){
                    $cod_dep = $depend['COD_DEP'];
                    $nomFun = $depend['NOM_FUN'];
                    $pre_dep = $depend['PRE_DEP'];
                }
            }
             $anexostable = "<table id='tbSeguimientosx' class='table table-striped table-bordered bootstrap-datatable datatable'> "  ;
if($anexos != null) {
                            foreach ($anexos as $key => $value) {
                              
                            
 $anexostable = $anexostable ."<tr>" .
                                        "<td class='center'><a href='" . $value['PATH_ANE'] . "'>" . $value['PATH_ANE'] . "</a></td>" .
                                    "</tr>";
                              }


}
 $anexostable = $anexostable . "</tbody></table>";

    		//Prepara la informacion a retornar
	    	$infoPqrsf = array('FEC_RAC' => $info['FEC_RAC_PQR'], 'ASU_PQR' => $info['ASU_PQR'], 
	    			           'NOM_DOC' => $info['NOM_DOC'], 'NOM_PER' => $info['NOM_PER'], 
	    				       'NUM_OFI_ENT' => $info['NUM_OFI_ENT'], 'ANEXO' => $tieneAnexos, 
	    				       'COP_PQR' => $info['COP_PQR'], 'TAB_SEG' => $html, 
                               'ASUNTO' => $info['ASU_PQR'], 'COD_DOC' => $info['COD_DOC'], 
                               'OBSERVACIONES' => $info['OBS_PQR'], 'COD_DEP' => $cod_dep, 
                               'COD_FUN' => $info['COD_FUN'], 'HOR_RAC_PQR'=> $info['HOR_RAC_PQR'], 
                               'CAN_FOL_PQR' => $info['CAN_FOL_PQR'], 'NUM_PQR' => $info['NUM_PQR'],
                               'ANIO_PQR' => $info['ANIO_PQR'], 'NOM_FUN' => $nomFun, 
                               'PRE_DEP' => $pre_dep, 'COD_ROL' => $this->session->userdata('COD_ROL'),'anexos' => $anexostable);

            
			echo json_encode($infoPqrsf);
    	}
    	else{
    		echo "No se ha encontrado información del radicado con numero [" . $numTick . "]";
    		exit();
    	} 
    }
 public function email(){
        
        $numTick = $this->input->post('numTick');
        $imp = $this->input->post('imp');
        //Consulta el pqrsf
        $info = $this->pqrsf->SelectPQRSF($numTick);
        if ($imp==1) {
                $this->pqrsf->setimp($numTick);
            }

        if($info != null){
            
            $anexos = $this->anexoPQRSF->SelectANEXO_PQRSF_ENT($info['NUM_PQR']);
            $tieneAnexos = "No cuenta con anexos";
            if($anexos != null){
                $tieneAnexos = "Si, cuenta con anexos";
            }

            $registros = $this->seguimientosPqrsf->SelectPQRSF_SAL($info['NUM_PQR'], $info['ANIO_PQR']);
            $html = "";
            if($registros != null){
                $html = "<table id='tbSeguimientos' class='table table-striped table-bordered bootstrap-datatable datatable'> " .
                            "<thead> " .
                                "<tr>".
                                    "<th>Fecha</th>" .
                                    "<th>No Oficios</th>" .
                                    "<th>Asunto</th>" .
                                    "<th>Descripcion</th>" .
                                    "<th>Adjuntos</th>" .
                                    "<th>Opciones</th>" .
                                "</tr>". 
                            "</thead>"  ;

                foreach($registros as $fila){
                    $anexos2 = $this->anexoPQRSF->SelectANEXO_PQRSF_SAL($fila['NUM_PQR_SAL']);
                    $html = $html ."<tr>" .
                                        "<td class='center'>" . $fila['FEC_OFI_SAL'] . "</td>" .
                                        "<td class='center'>" . $fila['CAN_FOL_SAL'] . "</td>" .
                                        "<td class='center'>" . $fila['DES_OFI_SAL'] . "</td>" .
                                        "<td class='center'>" . $fila['ASU_OFI_SAL'] . "</td>" ;
                                        if ($anexos2!=null) {
                                                $html=$html."<td>";
                                                $html=$html."<ul>";
                                                foreach ($anexos2 as $key2 => $value2) {
                                                     $html=$html."<li>";
                                                    $html=$html."<a href='".$value2['PATH_ANE_SAL'] . "'>" . $value2['PATH_ANE_SAL'] . "</a>";
                                                     $html=$html."</li>";
                                                }
                                                $html=$html."</ul>";
                                                $html=$html. "</td> ";
                                        }  else {
                                            $html=$html."<td></td>";

                                        }
                                      $html=$html.  "<td class='center'> " .
                                            "<a class='btn btn-success' href='#' data-toggle='modal' data-target='#infoSeguimiento'> ".
                                                "<i class='icon-edit icon-white'></i> ".
                                                "Visualizar ".
                                            "</a> ";

                                          

                                  $html = $html .  "</td>"."</tr>";
                }
                $html = $html . "</tbody></table>";
            }

            $cod_dep = "";
            $nomFun =  "";
            $pre_dep = "";
            if($info['COD_FUN'] != null){
                $depend = $this->funcionario->SelectFUNCIONARIO($info['COD_FUN']);
                if($depend != null){
                    $cod_dep = $depend['COD_DEP'];
                    $nomFun = $depend['NOM_FUN'];
                    $pre_dep = $depend['PRE_DEP'];
                }
            }
             $anexostable = "<table id='tbSeguimientosx' class='table table-striped table-bordered bootstrap-datatable datatable'> "  ;
if($anexos != null) {
                            foreach ($anexos as $key => $value) {
                              
                            
 $anexostable = $anexostable ."<tr>" .
                                        "<td class='center'><a href='" . $value['PATH_ANE'] . "'>" . $value['PATH_ANE'] . "</a></td>" .
                                    "</tr>";
                              }


}
 $anexostable = $anexostable . "</tbody></table>";

            //Prepara la informacion a retornar
            $infoPqrsf = array('FEC_RAC' => $info['FEC_RAC_PQR'], 'ASU_PQR' => $info['ASU_PQR'], 
                               'NOM_DOC' => $info['NOM_DOC'], 'NOM_PER' => $info['NOM_PER'], 
                               'NUM_OFI_ENT' => $info['NUM_OFI_ENT'], 'ANEXO' => $tieneAnexos, 
                               'COP_PQR' => $info['COP_PQR'], 'TAB_SEG' => $html, 
                               'ASUNTO' => $info['ASU_PQR'], 'COD_DOC' => $info['COD_DOC'], 
                               'OBSERVACIONES' => $info['OBS_PQR'], 'COD_DEP' => $cod_dep, 
                               'COD_FUN' => $info['COD_FUN'], 'HOR_RAC_PQR'=> $info['HOR_RAC_PQR'], 
                               'CAN_FOL_PQR' => $info['CAN_FOL_PQR'], 'NUM_PQR' => $info['NUM_PQR'],
                               'ANIO_PQR' => $info['ANIO_PQR'], 'NOM_FUN' => $nomFun, 
                               'PRE_DEP' => $pre_dep, 'COD_ROL' => $this->session->userdata('COD_ROL'),'anexos' => $anexostable);

            
          //  echo json_encode($infoPqrsf);

            
                 $email='ivandariovinam@gmail.com';//$info['EMAIL_PER'];
                 $subject ='hola'; //'Información de PQRS';
                 $mensaje='<!DOCTYPE html>
                 <html>
                 <head>
                     <title></title>
                 </head>
                 <body>
                 '.$html.'
                 </body>
                 </html>';
            
                 $subject=utf8_decode($subject);
                 enviarEmail($email, $subject, ($mensaje));


               echo "si";



        }
        else{
            echo "No se ha encontrado información del radicado con numero [" . $numTick . "]";
            exit();
        } 
    }


    public function Getadjuntos()   
    {   
        $numTick = $this->input->post('numTick');
         $anexos = $this->anexoPQRSF->SelectANEXO_PQRSF_SAL($numTick);
         $anexostable = "<table id='tbSeguimientosx' class='table table-striped table-bordered bootstrap-datatable datatable'> "  ;

                            foreach ($anexos as $key => $value) {
                              
                            
 $anexostable = $anexostable ."<tr>" .
                                        "<td class='center'><a href='" . $value['PATH_ANE'] . "'>" . $value['PATH_ANE'] . "</a></td>" .
                                    "</tr>";
                              }



 $anexostable = $anexostable . "</tbody></table>";
 echo $anexostable;
        
    }
}