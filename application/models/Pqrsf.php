<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pqrsf extends CI_Model{

	public function INSERTPqrsf($COD_DOC, $FEC_RAC_PQR, 
								$ASU_PQR, $CAN_FOL_PQR, 
								$NUM_OFI_ENT, $OBS_PQR,
								$DES_PQR, $NUM_TIC_PQR, 
								$TIPO_COR_ENT, $TIP_PQR_ENT, 
								$COP_PQR, $NUM_PER, 
								$COD_FUN, $COD_FUN_ENT){

		$sql  = "INSERT INTO pqrsf_ent(num_pqr, anio_pqr, cod_doc, fec_rac_pqr, hor_rac_pqr, " .
									  "asu_pqr, can_fol_pqr, num_ofi_ent, obs_pqr, des_pqr, " .
									  "num_tic_pqr, tipo_cor_ent, tip_pqr_ent, fec_max_res, " .
									  "cop_pqr, num_per ";

		if(strcmp($COD_FUN, "") != 0){
			$sql = $sql . ", cod_fun, num_int_pqr ";
		}
		if(strcmp($COD_FUN_ENT, "") != 0){
			$sql = $sql . ", cod_fun_ent";
		}
		$sql = $sql . ")";
		$sql = $sql . "VALUES(CONVERT((SELECT val_par FROM parametro WHERE cod_par = 'NUMPQR'), UNSIGNED INTEGER), " . 
						"CONVERT((SELECT val_par FROM parametro WHERE cod_par = 'ANIOSIS'), UNSIGNED INTEGER), '" . $COD_DOC ."', " .
						"str_to_date('" . $FEC_RAC_PQR . "', '%Y-%m-%d'), " .
						"NOW(), '" . $ASU_PQR . "', " . $CAN_FOL_PQR . ", " .
						"'" . $NUM_OFI_ENT . "', '" . $OBS_PQR . "', '" . $DES_PQR . "', " . 
						"'" . $NUM_TIC_PQR . "', '" . $TIPO_COR_ENT . "', '" . $TIP_PQR_ENT . "', " . 
						"ADDDATE(str_to_date('" . $FEC_RAC_PQR . "', '%Y-%m-%d'), INTERVAL (SELECT num_dias FROM documento WHERE cod_doc = '" . $COD_DOC ."') DAY), " . 
						"'" . $COP_PQR . "', " . $NUM_PER . " ";

		if(strcmp($COD_FUN, "") != 0){
			$sql = $sql . ", '" . $COD_FUN . "', (SELECT de.num_int_ent_dep " .
 												 "FROM funcionario fu " .
												 "INNER JOIN dependencia de ON de.cod_dep = fu.cod_dep " .
												 "WHERE cod_fun =  '" . $COD_FUN . "') ";
		}
		if(strcmp($COD_FUN_ENT, "") != 0){
			$sql = $sql . ", '" . $COD_FUN_ENT . "' ";
		}
		$sql = $sql . ")";
		
		$query = $this->db->query($sql);
	}

	public function CambiarEstadoPQRSF($num_tic_pqr, $estado){
		$sql = "UPDATE pqrsf_ent " . 
			   "SET est_pqr = '" . $estado . "' " . 
			   "WHERE num_tic_pqr = '" . $num_tic_pqr . "'";
		$this->db->query($sql);
	}

	public function setimp($num_tic_pqr){
		$sql = "UPDATE pqrsf_ent " . 
			   "SET imp = 1 " . 
			   "WHERE num_tic_pqr = '" . $num_tic_pqr . "'";
			  // echo $sql; exit();
		$this->db->query($sql);
	}

	public function SelectPQRSF($num_tic_pqr){
		$sql = "SELECT * " . 
			   "FROM pqrsf_ent  p " .
			   "INNER JOIN documento d ON d.cod_doc = p.cod_doc " .
			   "LEFT JOIN persona pe ON pe.num_per = p.num_per " .
			   "WHERE p.num_tic_pqr = '" . $num_tic_pqr . "'";
		$query =  $this->db->query($sql);
		
		if ($query->num_rows() > 0){
			return $query->row_array();
		}
	}

	public function ListaPQRSF_POR_GENERAR_REP($COD_FUN){
		$date = date('Y-m-d 00:00:00');
		$date2 = date('Y-m-d 23:59:59');
		 $sql = "SELECT * " . 
			   "FROM pqrsf_ent  p " .
			   "INNER JOIN documento d ON d.cod_doc = p.cod_doc " .
			   "LEFT JOIN persona pe ON pe.num_per = p.num_per " .
			   "WHERE (p.cod_fun = '" . $COD_FUN . "' OR p.cod_fun_ent = '" . $COD_FUN . "')". 
			   "AND p.gen_rep IS NULL AND hor_rac_pqr >='".$date."' AND hor_rac_pqr <='".$date2."' ORDER BY hor_rac_pqr DESC";
		$query =  $this->db->query($sql);
		
		if ($query->num_rows() > 0){
			return $query->result_array();
		}
	}
	public function ListaPQRSF_MULTICRITERIO($FEC_RAC_INI, $FEC_RAC_FIN, 
											 $FEC_CIE_INI, $FEC_CIE_FIN, 
											 $CANT_FOL, $NUM_OFI, 
											 $COD_FUN, $COD_DOC){
		$sql = "SELECT * " . 
			   "FROM pqrsf_ent  p " .
			   "INNER JOIN documento d ON d.cod_doc = p.cod_doc " .
			   "LEFT JOIN persona pe ON pe.num_per = p.num_per " .
			   "WHERE 1 = 1 ";

		if(strcmp($COD_FUN, "") != 0){
			$sql = $sql . "AND p.cod_fun = '" . $COD_FUN . "' ";
		}
		if(strcmp($FEC_RAC_INI, "") != 0 && strcmp($FEC_RAC_FIN, "") != 0){
			$sql = $sql . "AND p.FEC_RAC_PQR BETWEEN str_to_date('" . $FEC_RAC_INI . "', '%Y-%m-%d') AND str_to_date('" . $FEC_RAC_FIN . "', '%Y-%m-%d') ";
		}
		if(strcmp($FEC_CIE_INI, "") != 0 && strcmp($FEC_CIE_FIN, "") != 0){
			$sql = $sql . "AND p.FEC_MAX_RES BETWEEN str_to_date('" . $FEC_CIE_INI . "', '%Y-%m-%d') AND str_to_date('" . $FEC_CIE_FIN . "', '%Y-%m-%d') ";
		}
		if(strcmp($NUM_OFI, "") != 0){
			$sql = $sql . "AND NUM_OFI_ENT = '" . $NUM_OFI . "' ";
		}
		if(strcmp($CANT_FOL, "") != 0){
			$sql = $sql . "AND CAN_FOL_PQR = " . $CANT_FOL . " ";
		}   
		if(strcmp($COD_DOC, "") != 0){
			$sql = $sql . "AND cod_doc = '" . $COD_DOC . "' ";
		}   
		$query =  $this->db->query($sql);		
		if ($query->num_rows() > 0){
			return $query->result_array();
		}
	}

	/*Carga los PQRSF pertenecientes a la dependencia, para el caso qeu qse quiera re-asignar,
	  los que estan en estado P: pendientes por asignar  */
	public function ListaPqrsfPorAsignar($COD_FUN, $A_REASIGNAR){
	//	print_r($this->session->userdata); exit();
		$sql = "SELECT * " .
			   "FROM pqrsf_ent p " .
			   "INNER JOIN documento d ON d.cod_doc = p.cod_doc " .
			   "LEFT JOIN persona pe ON pe.num_per = p.num_per ";
		if($A_REASIGNAR == 1){
			$sql = $sql . "WHERE est_pqr = 'A' ";
		}
		else{
			$sql = $sql . "WHERE est_pqr IN ('A', 'P') ";
		}
			   
		$sql = $sql ."AND ( cod_fun IN (SELECT cod_fun " .
			   				   		 "FROM funcionario WHERE cod_dep = (" .
                                  		     							"SELECT cod_dep " .
                                  								        "FROM funcionario " .
                                  								        "WHERE cod_fun = '" . $COD_FUN . "'" .
                                  								       ")" .
							  		 ") OR cod_fun_ent='".$COD_FUN."' )" . 
			   "AND fec_rac_pqr BETWEEN date_add(NOW(), INTERVAL -30 DAY) AND NOW() " .
			   "ORDER BY fec_rac_pqr DESC, num_pqr DESC";
		$query =  $this->db->query($sql);
		
		if ($query->num_rows() > 0){
			return $query->result_array();
		}
	}

	public function ListaPqrsfASeguimiento($COD_FUN){
		$sql = "SELECT * " . 
			   "FROM pqrsf_ent p " .
			   "LEFT JOIN documento d ON d.cod_doc = p.cod_doc " .
			   "LEFT JOIN persona pe ON pe.num_per = p.num_per " .
			   "LEFT JOIN funcionario fu ON fu.cod_fun = p.cod_fun " .
			   "WHERE fec_cie_pqr IS NULL " .
			  // "AND cod_fun = '". $COD_FUN . "' " .
			   "AND est_pqr = 'A' " . 
			   "ORDER BY fec_rac_pqr DESC, num_pqr DESC ";
		$query =  $this->db->query($sql);
		//echo $this->db->last_query();
		
		if ($query->num_rows() > 0){
			return $query->result_array();
		}
	}

	public function AsignarPqrsf($COD_FUN, $NUM_TIC_PQR){
		$sql = "UPDATE pqrsf_ent " .
			   "SET cod_fun = '" . $COD_FUN . "', " . 
			   	    "est_pqr = 'A' " .
			   "WHERE num_tic_pqr = '" . $NUM_TIC_PQR . "' ";
		$query =  $this->db->query($sql);
	}

	public function CopiaAuditoriaPqrsf($NUM_TIC_PQR){
		$sql = "INSERT INTO pqrsf_ent_aud(num_pqr, anio_pqr, num_int_pqr, num_per, cod_doc, cod_fun, " .
										 "fec_rac_pqr, hor_rac_pqr, asu_pqr, can_fol_pqr, cod_fun_ent, " .
										 "num_ofi_ent, obs_pqr, des_pqr, num_tic_pqr, tipo_cor_ent, " .
										 "gen_rep, tip_pqr_ent, fec_max_res, fec_ent_dep_pqr, fec_cie_pqr, " .
										 "est_pqr, cop_pqr) " .
			   "SELECT p.num_pqr, p.anio_pqr, p.num_int_pqr, p.num_per, p.cod_doc, p.cod_fun, p.fec_rac_pqr, " .
			   		  "p.hor_rac_pqr, p.asu_pqr, p.can_fol_pqr, p.cod_fun_ent, p.num_ofi_ent, p.obs_pqr, " .
			   		  "p.des_pqr, p.num_tic_pqr, p.tipo_cor_ent, p.gen_rep, p.tip_pqr_ent, p.fec_max_res, " .
			   		  "p.fec_ent_dep_pqr, p.fec_cie_pqr, p.est_pqr, p.cop_pqr " .
			   	"FROM pqrsf_ent p " .
			    "WHERE p.num_tic_pqr = '" . $NUM_TIC_PQR . "'";
		$this->db->query($sql);
	}

	public function ReasignarPqrsf($COD_DOC, $COD_FUN, 
								   $NUM_OFI_ENT, $ASU_PQR, 
								   $OBS_PQR, $NUM_TIC_PQR){
		$sql = "UPDATE pqrsf_ent " .
			   "SET cod_doc = '". $COD_DOC . "', " .
			   	   "cod_fun = '" . $COD_FUN . "', " .
			   	   "num_ofi_ent = '" . $NUM_OFI_ENT . "', " .
			   	   "asu_pqr = '" . $ASU_PQR . "', " .
			   	   "obs_pqr = '" . $OBS_PQR . "' " .
		   	   "WHERE num_tic_pqr = '" . $NUM_TIC_PQR . "' ";
		$this->db->query($sql);
	}

}

?>