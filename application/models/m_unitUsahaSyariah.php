<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class m_unitUsahaSyariah extends CI_Model{

    function get_data_unit(){
		$query=$this->db->query("call get_unit_usaha()");
		return $query;
    }

}
?>