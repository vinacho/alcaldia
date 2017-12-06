<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SeguimientosPqrsf extends CI_Model{

	public function InsertPQRSF_SAL($NUM_PQR, $ANIO_PQR, 
									$FEC_OFI_SAL, $CAN_FOL_SAL,
									$DES_OFI_SAL, $ASU_OFI_SAL){
		$sql = "INSERT INTO pqrsf_sal(num_pqr_sal, anio_pqr_sal, num_pqr, anio_pqr, fec_ofi_sal, " .
									 "hor_ofi_sal, can_fol_sal, des_ofi_sal, asu_ofi_sal) " .
			   "VALUES(CONVERT((SELECT val_par FROM parametro WHERE cod_par = 'NUMPQRSEG'), UNSIGNED INTEGER), " .
	   				  "YEAR(NOW()), " . $NUM_PQR . ", CONVERT((SELECT val_par FROM parametro WHERE cod_par = 'ANIOSIS'), UNSIGNED INTEGER), " .
			   		  "str_to_date('" . $FEC_OFI_SAL . "', '%Y-%m-%d'), NOW(), ". $CAN_FOL_SAL . ", '" . $DES_OFI_SAL . "', '" . $ASU_OFI_SAL . "')";
		$this->db->query($sql);
	}

	public function InsertPQRSF_SAL_COR($NUM_PQR, $ANIO_PQR, 
										$FEC_OFI_SAL, $CAN_FOL_SAL,
										$DES_OFI_SAL, $ASU_OFI_SAL){
		$sql = "INSERT INTO pqrsf_sal_cor(num_pqr_sal, anio_pqr_sal, num_pqr, anio_pqr, fec_ofi_sal, " .
									 	 "hor_ofi_sal, can_fol_sal, des_ofi_sal, asu_ofi_sal) " .
			   "VALUES(CONVERT((SELECT val_par FROM parametro WHERE cod_par = 'NUMPQRSAL'), UNSIGNED INTEGER), " .
	   				  "YEAR(NOW()), " . $NUM_PQR . ", CONVERT((SELECT val_par FROM parametro WHERE cod_par = 'ANIOSIS'), UNSIGNED INTEGER), " .
			   		  "str_to_date('" . $FEC_OFI_SAL . "', '%Y-%m-%d'), NOW(), ". $CAN_FOL_SAL . ", '" . $DES_OFI_SAL . "', '" . $ASU_OFI_SAL . "')";
		$this->db->query($sql);
	}

	public function SelectPQRSF_SAL($NUM_PQR, $ANIO_PQR){
		$sql = "SELECT * " . 
			   "FROM pqrsf_sal " . 
			   "WHERE num_pqr = " . $NUM_PQR . " " .
			   "AND anio_pqr = " . $ANIO_PQR . "  ";
		$query =  $this->db->query($sql);
		
		if ($query->num_rows() > 0){
			return $query->result_array();
		}
	}
}