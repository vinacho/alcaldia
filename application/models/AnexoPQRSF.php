<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AnexoPQRSF extends CI_Model{

	public function InsertANEXO_PQRSF_ENT($NUM_PQR, $ANIO_PQR, $PATH_ANE){
		$sql = "INSERT INTO anexo_pqrsf_ent(num_pqr, anio_pqr, path_ane) " . 
			   "VALUES(" . $NUM_PQR . ", ". $ANIO_PQR . ", '" . $PATH_ANE . "')";
		$query =  $this->db->query($sql);
	}

	public function SelectANEXO_PQRSF_ENT($numPqr){
		$sql = "SELECT * " .
			   "FROM anexo_pqrsf_ent " .
			   "WHERE num_pqr = ". $numPqr . "";
		$query =  $this->db->query($sql);
		
		if ($query->num_rows() > 0){
			return $query->result_array();
		}	
	}

	public function SelectANEXO_PQRSF_SAL($numPqr){
		$sql = "SELECT * " .
			   "FROM anexo_pqrsf_sal " .
			   "WHERE num_pqr_sal = ". $numPqr . "";
		$query =  $this->db->query($sql);
		
		if ($query->num_rows() > 0){
			return $query->result_array();
		}	
	}
}

?>