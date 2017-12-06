<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rol extends CI_Model{

	public function SelectROL($cod_rol){
		$sql = "SELECT * " . 
			   "FROM rol " . 
			   "WHERE cod_rol = '" . $cod_rol . "'";
		$query =  $this->db->query($sql);
		
		if ($query->num_rows() > 0){
			return $query->row_array();
		}
	}

	public function SelectROLS(){
		$sql = "SELECT * " . 
			   "FROM rol ";
		$query =  $this->db->query($sql);
		
		if ($query->num_rows() > 0){
			return $query->result_array();
		}
	}

	public function InsertROL($cod_rol, $nom_rol, $est_rol){
		$sql = "INSERT INTO rol(cod_rol, nom_rol, est_rol) " . 
			   "VALUES('" . $cod_rol . "', '" . $nom_rol . "', '" . $est_rol . "')";
		$query =  $this->db->query($sql);
	}

	public function UpdateRol($cod_rol, $nom_rol, $est_rol){
		$sql = "UPDATE rol " . 
			   "SET nom_rol = '" . $nom_rol . "', " .
			   	   "est_rol = '" . $est_rol . "' " .
		   	   "WHERE cod_rol = '" . $cod_rol . "' ";
		$query =  $this->db->query($sql);
	}
}

?>