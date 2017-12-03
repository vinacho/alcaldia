<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dependencia extends CI_Model{
	
	public function SelectDEPENDENCIA(){
		$sql = "SELECT * FROM dependencia";
		$query =  $this->db->query($sql);
		
		if ($query->num_rows() > 0){
			return $query->result_array();
		}
	}

	public function DependenciaPorUsuario($COD_FUN){
		$sql = "SELECT (dependencia.num_int_ent_dep + 1) AS NUM_INT, fu.cod_dep AS COD_FUN " .
			   "FROM dependencia " .
			   "INNER JOIN funcionario fu ON fu.cod_dep = dependencia.cod_dep " .
			   "WHERE fu.cod_fun =  '" . $COD_FUN . "'";
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0){
			return $query->row_array();
		}
	}

	public function ActualizarNumIntDepenencia($NUM_INT_EMT_DEP, $COD_DEP){
		$sql = "UPDATE dependencia " .
			   "SET num_int_ent_dep = " . $NUM_INT_EMT_DEP . " " .
			   "WHERE cod_dep = '" . $COD_DEP . "' " ;
		$this->db->query($sql);
	}	

	public function InsertDEPENDENCIA($COD_DEP, $NOM_DEP, $PRE_DEP, $NUM_INT_ENT_DEP, $NUM_INT_SAL_DEP){
		$sql = "INSERT INTO dependencia(cod_dep, nom_dep, pre_dep, num_int_ent_dep, num_int_sal_dep) " .
			   "VALUES('" . $COD_DEP . "', '" . $NOM_DEP . "',  " . $PRE_DEP . ", " . $NUM_INT_ENT_DEP . ", " . $NUM_INT_SAL_DEP . ")";
		$this->db->query($sql);
	}

	public function UpdateDEPENDENCIA($COD_DEP, $NOM_DEP, $PRE_DEP, $NUM_INT_ENT_DEP, $NUM_INT_SAL_DEP){
		$sql = "UPDATE dependencia " . 
			   "SET nom_dep = '" . $NOM_DEP . "', " .
			   	   "pre_dep = " . $PRE_DEP . ", " .
			   	   "num_int_ent_dep = " . $NUM_INT_ENT_DEP . ", " .
			   	   "num_int_sal_dep = " . $NUM_INT_SAL_DEP . " " .
			   	"WHERE cod_dep = '" . $COD_DEP . "' " ;
		$query =  $this->db->query($sql);
	}

	public function SelectDEPENDENCIAS($cod_dep){
		$sql = "SELECT * " .
			   "FROM dependencia " .
			   "WHERE cod_dep = '" . $cod_dep . "'";
		$query =  $this->db->query($sql);
		
		if ($query->num_rows() > 0){
			return $query->row_array();
		}
	}

	public function ListaJefesXDependencia(){
		$sql = "SELECT d.COD_DEP, f.COD_FUN, IFNULL(NOM_FUN, NOM_DEP) AS NOM_FUN " .
			   "FROM dependencia d " .
			   "LEFT JOIN funcionario f ON f.cod_dep = d.cod_dep " .
			   "AND f.jef_fun = 'S'";
		$query =  $this->db->query($sql);
		
		if ($query->num_rows() > 0){
			return $query->result_array();
		}
	}
}

?>