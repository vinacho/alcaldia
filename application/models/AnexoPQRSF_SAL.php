<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AnexoPQRSF_SAL extends CI_Model{

	public function InsertANEXO_PQRSF_SAL($NUM_PQR_SAL, $ANIO_PQR_SAL, $PATH_ANE_SAL){
		$sql = "INSERT INTO anexo_pqrsf_sal(num_pqr_sal, anio_pqr_sal, path_ane_sal) " . 
			   "VALUES(" . $NUM_PQR_SAL . ", ". $ANIO_PQR_SAL . ", '" . $PATH_ANE_SAL . "')";
		$query =  $this->db->query($sql);
	}
	
}

?>