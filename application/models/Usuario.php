<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario extends CI_Model{

	public function InsertUSUARIO($COD_FUN, $COD_ROL, $PAS_USU, $EST_USU){
		$sql = "INSERT INTO usuario(cod_fun, cod_rol, pas_usu, est_usu) " . 
			   "VALUES('" . $COD_FUN . "', '" . $COD_ROL  . "', '" . $PAS_USU . "', '" . $EST_USU . "') ";
		$this->db->query($sql);
	}

	public function UpdateUSUARIO($COD_FUN, $COD_ROL){
		$sql = "UPDATE usuario " .
			   "SET cod_rol = '" . $COD_ROL  . "' " .
			   "WHERE cod_fun = '" . $COD_FUN . "' ";
		$this->db->query($sql);
	}

	public function UsuarioActivo($COD_FUN){
		$sql = "SELECT * " .
			   "FROM usuario " . 
			   "WHERE cod_fun = '" . $COD_FUN . "' " . 
			   "AND est_usu = 'A' ";
		$query =  $this->db->query($sql);
		
		if ($query->num_rows() > 0){
			return $query->row_array();
		}
	}

	public function CambiarEstadoUsuario($COD_FUN, $EST_USU){
		$sql = "UPDATE usuario " .
			   "SET est_usu = '" . $EST_USU  . "' " .
			   "WHERE cod_fun = '" . $COD_FUN . "' ";
		$this->db->query($sql);
	}

}