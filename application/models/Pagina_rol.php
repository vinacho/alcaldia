<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pagina_rol extends CI_Model{

	public function SelectPAGINA_ROL($COD_ROL){
		$sql = "SELECT * " .
			   "FROM pagina_rol pr " .
			   "INNER JOIN pagina p ON p.path_pag = pr.path_pag " . 
			   "WHERE cod_rol = '". $COD_ROL . "' " . 
			   "ORDER BY ord_pag";
		$query =  $this->db->query($sql);
		
		if ($query->num_rows() > 0){
			return $query->result_array();
		}
	}
}