<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Funcionario extends CI_Model{

	public function InsertFUNCIONARIO($COD_FUN, $COD_DEP, $NOM_FUN, $NUM_DOC_FUN, $TIPO_FUN, $JEF_FUN){
		$sql = "INSERT INTO funcionario(cod_fun, cod_dep, nom_fun, num_doc_fun, tipo_fun, jef_fun) " .
			   "VALUES('" . $COD_FUN . "', '" . $COD_DEP . "', '" . $NOM_FUN . "', " .
			   		  "'" . $NUM_DOC_FUN . "', '" . $TIPO_FUN . "', '" . $JEF_FUN . "') ";
		$this->db->query($sql);
	}

	public function UpdateFUNCIONARIO($COD_FUN, $COD_DEP, $NOM_FUN, $NUM_DOC_FUN, $TIPO_FUN, $JEF_FUN){
		$sql = "UPDATE funcionario " . 
			   "SET cod_dep = '" . $COD_DEP . "', " .
			   	   "nom_fun = '" . $NOM_FUN . "', " .
			   	   "num_doc_fun = '" . $NUM_DOC_FUN . "', " .
			   	   "tipo_fun = '" . $TIPO_FUN . "', " .
			   	   "jef_fun = '" . $JEF_FUN . "'" .
			   "WHERE cod_fun = '" . $COD_FUN . "' "; 
		$this->db->query($sql);
	}

	public function SelectFUNCIONARIO($COD_FUN){
		$sql = "SELECT * " .
			   "FROM funcionario fu " .
			   "INNER JOIN dependencia de ON de. cod_dep = fu.cod_dep ".
			   "WHERE fu.cod_fun = '". $COD_FUN . "' ";
		$query =  $this->db->query($sql);
		
		if ($query->num_rows() > 0){
			return $query->row_array();
		}
	}

    public function ValidarFuncionario($COD_FUN, $PAS_USU){
		$sql = "SELECT * " .
			   "FROM funcionario f " .
			   "INNER JOIN usuario u ON u.cod_fun = f.cod_fun " .
			   "WHERE u.cod_fun = '" . $COD_FUN . "' " .
			   "AND pas_usu = '" . $PAS_USU . "'";
		$query =  $this->db->query($sql);

		if ($query->num_rows() > 0){
			return $query->row_array();
		}
    }
    

	public function HayJefeDependencia($COD_DEP){
		$sql = "SELECT * " .
			   "FROM funcionario " .
			   "WHERE cod_dep = '". $COD_DEP ."' " .
			   "AND jef_fun = 'S' ";

		$query =  $this->db->query($sql);
		
		if ($query->num_rows() > 0){
			return $query->row_array();
		}
	}

	public function ListaFuncionarios(){
		$sql = "SELECT f.COD_FUN, NOM_FUN, NUM_DOC_FUN, NOM_DEP, CASE jef_fun WHEN 'S' THEN 'Si' ELSE 'No' END AS JEF_FUN , " .
					  "CASE est_usu WHEN 'A' THEN 'Activo' ELSE 'Inactivo' END AS EST_USU " .
			    "FROM funcionario f " .
				"INNER JOIN usuario u ON u.cod_fun = f.cod_fun ".
				"INNER JOIN dependencia d ON d.cod_dep = f.cod_dep " . 
				"ORDER BY d.cod_dep, u.cod_fun"; 
		$query =  $this->db->query($sql);
		
		if ($query->num_rows() > 0){
			return $query->result_array();
		}
	}

	public function ListaFuncionariosXDependencia($COD_DEP){
		$sql = "SELECT f.COD_FUN, NOM_FUN, NUM_DOC_FUN, NOM_DEP, CASE jef_fun WHEN 'S' THEN 'Si' ELSE 'No' END AS JEF_FUN , " .
					  "CASE est_usu WHEN 'A' THEN 'Activo' ELSE 'Inactivo' END AS EST_USU " .
			   "FROM funcionario f " .
			   "INNER JOIN usuario u ON u.cod_fun = f.cod_fun ".
			   "INNER JOIN dependencia d ON d.cod_dep = f.cod_dep " . 
			   "WHERE f.cod_dep = '" . $COD_DEP . "' "; 
		$query =  $this->db->query($sql);
		
		if ($query->num_rows() > 0){
			return $query->result_array();
		}
	}

	public function FuncionariosXDependencia($COD_DEP, $COD_ROL){
		$sql = "SELECT f.COD_FUN, NOM_FUN, NUM_DOC_FUN, NOM_DEP, CASE jef_fun WHEN 'S' THEN 'Si' ELSE 'No' END AS JEF_FUN , " .
					  "CASE est_usu WHEN 'A' THEN 'Activo' ELSE 'Inactivo' END AS EST_USU " .
			   "FROM funcionario f " .
			   "INNER JOIN usuario u ON u.cod_fun = f.cod_fun ".
			   "INNER JOIN dependencia d ON d.cod_dep = f.cod_dep " . 
			   "WHERE f.cod_dep = '" . $COD_DEP . "' ";

		if(strcmp($COD_ROL, "VEN") == 0 || strcmp($COD_ROL, "PER") == 0) {
			$sql = $sql . "AND f.jef_fun = 'S' ";
		}
		else if(strcmp($COD_ROL, "JDP") == 0){
			$sql = $sql . "AND f.jef_fun = 'N' ";
		}

		$query =  $this->db->query($sql);
		
		if ($query->num_rows() > 0){
			return $query->result_array();
		}
	}

	public function GetIfoFullFuncionario($COD_FUN){
		$sql = "SELECT * " .
			   "FROM funcionario f " .
			   "INNER JOIN usuario u ON u.cod_fun = f.cod_fun ".
			   "INNER JOIN dependencia d ON d.cod_dep = f.cod_dep " .
			   "WHERE f.cod_fun = '". $COD_FUN . "' " ;
		$query =  $this->db->query($sql);
		
		if ($query->num_rows() > 0){
			return $query->row_array();
		}
	}
}