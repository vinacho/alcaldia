<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DocumentoIdentificacion extends CI_Model{
	
	public function SelectTIPO_DOCUMENTO(){
		$sql = "SELECT * FROM tipo_documento";
		$query =  $this->db->query($sql);
		
		if ($query->num_rows() > 0){
			return $query->result_array();
		}
	}
}

?>