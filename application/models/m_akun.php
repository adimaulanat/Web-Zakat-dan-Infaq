<?php 
 
class m_akun extends CI_Model{
    private $akun = 'akun';
    
    function add_akun($data){
		$this->db->insert($this->akun, $data);
    }
    
	function cek_akun($data){		
		return $this->db->get_where($this->akun,$data)->row();
	}
}
?>