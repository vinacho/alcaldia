<?php
class Parametro extends CI_Model{

	/*
	Registra un nuevo parametro en el sistema
	*/
	public function InsertPARAMETRO($val_par, $cod_par, $nom_par){
		$sql = "INSERT INTO parametro(cod_par, nom_par, val_par) " .
			   "VALUES('" . $cod_par . "', '" . $nom_par . "', '" . $val_par . "')";
		$query =  $this->db->query($sql);
	}

	/*
	Actualiza un parametro segun el codigo proporcionado
	*/
	public function UpdatePARAMETRO($val_par, $cod_par, $nom_par){
		$sql = "UPDATE parametro " .
			   "SET val_par	= '" . $val_par . "' ";
			   	   
		if(strcmp($nom_par, "") != 0){
			$sql = $sql . ", nom_par = '". $nom_par . "' ";
		}
		
		$sql = $sql . "WHERE cod_par = '" . $cod_par . "'";
		$query =  $this->db->query($sql);
	}
	
	/*Devuelve la información completa de un parametro según el 
	codigo proporcionado
	*/
	public function SelectPARAMETRO($cod_par){
		$sql = "SELECT * " .
			   "FROM parametro " .
			   "WHERE cod_par = '". $cod_par ."'";
		$query =  $this->db->query($sql);
		
		if ($query->num_rows() > 0){
			return $query->row_array();
		}
	}

	public function SelectPARAMETROS(){
		$sql = "SELECT * " .
			   "FROM parametro ";
		$query =  $this->db->query($sql);
		
		if ($query->num_rows() > 0){
			return $query->result_array();
		}
	}
}

?>