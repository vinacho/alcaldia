<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TipoPersona extends CI_Model{

	public function SelectTIPO_PERSONA(){
		$sql = "SELECT * FROM tipo_persona";
		$query =  $this->db->query($sql);
		
		if ($query->num_rows() > 0){
			return $query->result_array();
		}
	}
}

?>