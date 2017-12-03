<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Documento extends CI_Model{

	public function SelectDocumentos(){
		$sql = "SELECT * FROM documento";
		$query =  $this->db->query($sql);
		
		if ($query->num_rows() > 0){
			return $query->result_array();
		}
		//return  $this->db->get('documento')->row();
	}

	public function SelectDocumento($COD_DOC){
		$sql = "SELECT * " . 
			   "FROM documento " . 
			   "WHERE cod_doc = '" . $COD_DOC ."' ";
		$query =  $this->db->query($sql);
		
		if ($query->num_rows() > 0){
			return $query->row_array();
		}
		//return  $this->db->get('documento')->row();
	}

	public function InsertDOCUMENTO($COD_DOC, $NOM_DOC, $ORD_DOC, $NUM_DIAS){
		$sql = "INSERT INTO documento(cod_doc, nom_doc, ord_doc, num_dias) " . 
			   "VALUES('" . $COD_DOC . "', '". $NOM_DOC . "', " . $ORD_DOC . ", " . $NUM_DIAS . ")";
		$query =  $this->db->query($sql);
	}

	public function UpdateDOCUMENTO($COD_DOC, $NOM_DOC, $ORD_DOC, $NUM_DIAS){
		$sql = "UPDATE documento " . 
			   "SET nom_doc = '" . $NOM_DOC . "', " . 
			   		"ord_doc = " . $ORD_DOC . ", " .
			   		"num_dias = " . $NUM_DIAS . " " .
			   "WHERE cod_doc = '" . $COD_DOC ."' ";
		$query =  $this->db->query($sql);
	}
}

?>