<?php 
 
class M_home extends CI_Model{	
	function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
	}

	function get_data_artikel(){
		$query=$this->db->query("SELECT * FROM artikel ORDER BY id");
		return $query;
  }

	function get_detailberita($id){
	$query = $this->db->get_where('artikel', array('id' => $id))->row();
	return $query;
	}
	
}
?>