<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Alerta extends CI_Model{

	public function InsertALERTA($COD_ALE, $DIA_ALE, $ORD_ALE, $COL_ALE){
		$sql = "INSERT INTO alerta(cod_doc, dia_ale, ord_ale, col_ale) " .
			   "VALUES('" . $COD_ALE . "', " . $DIA_ALE . ", " . $ORD_ALE . ", '" . $COL_ALE . "')";
		
		$this->db->query($sql);
	}

	public function UpdateALERTA($COD_ALE, $DIA_ALE, $ORD_ALE, $COL_ALE){
		$sql = "UPDATE alerta " .
			   "SET dia_ale = " . $DIA_ALE . ", " .
			   	   "ord_ale = " . $ORD_ALE . ", " .
			   	   "col_ale = '" . $COL_ALE . "' " .
			   "WHERE cod_doc = '" . $COD_ALE . "' ";
		$this->db->query($sql);
	}

	public function SelectALERTA($COD_DOC){
		$sql = "SELECT * " .
			   "FROM alerta " .
			   "WHERE cod_doc = '" . $COD_DOC . "'";
		$query =  $this->db->query($sql);
		
		if ($query->num_rows() > 0){
			return $query->row_array();
		}
	}
}