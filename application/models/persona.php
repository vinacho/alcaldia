<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Persona extends CI_Model{

	public function InsertPERSONA($COD_TIP_PER, $COD_TIP_DOC, $NUM_DOC_PER,
								  $NOM_PER, $APE_PER, $GEN_PER, $DIR_CON_PER,
								  $EMAIL_PER){
		$sql = "INSERT INTO persona(cod_tip_per, cod_tip_doc, num_doc_per, nom_per, ape_per, gen_per, dir_con_per, email_per) " .
			   "VALUES('" . $COD_TIP_PER . "', '". $COD_TIP_DOC ."', '". $NUM_DOC_PER ."', '". $NOM_PER ."', '". $APE_PER ."', " .
			   		  "'" . $GEN_PER . "', '" . $DIR_CON_PER . "', '" . $EMAIL_PER . "')";
		$this->db->query($sql);
	}

	public function SelectPERSONA($NUM_DOC_PER){
		$sql = "SELECT * " .
			   "FROM persona " .
			   "WHERE num_doc_per = '". $NUM_DOC_PER ."'";
		$query =  $this->db->query($sql);
		
		if ($query->num_rows() > 0){
			return $query->row_array();
		}
	}
}

?>