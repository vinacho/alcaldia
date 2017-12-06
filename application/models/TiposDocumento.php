<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TiposDocumento extends CI_Model{

	public function SelectTIPO_DOCUMENTO(){
		$sql = "SELECT * FROM tipo_documento";
		$query =  $this->db->query($sql);
		
		if ($query->num_rows() > 0){
			return $query->result_array();
		}
		//return  $this->db->get('documento')->row();
	}

	public function GetTIPO_DOCUMENTO($COD_TIP_DOC){
		$sql = "SELECT * " .
			   "FROM tipo_documento " . 
			   "WHERE cod_tip_doc = '" . $COD_TIP_DOC . "' ";
		$query =  $this->db->query($sql);
		
		if ($query->num_rows() > 0){
			return $query->row_array();
		}
		//return  $this->db->get('documento')->row();
	}
	public function InsertTIPO_DOCUMENTO($COD_TIP_DOC, $NOM_TIP_DOC){
		$sql = "INSERT INTO tipo_documento(cod_tip_doc, nom_tip_doc) " .
			   "VALUES('". $COD_TIP_DOC . "', '" . $NOM_TIP_DOC . "')";
		$query =  $this->db->query($sql);
	}

	public function UpdateTIPO_DOCUMENTO($COD_TIP_DOC, $NOM_TIP_DOC){
		$sql = "UPDATE tipo_documento " .
			   "SET nom_tip_doc = '" . $NOM_TIP_DOC . "' " .
			   "WHERE cod_tip_doc = '" . $COD_TIP_DOC . "' ";
		$query =  $this->db->query($sql);
	}
}