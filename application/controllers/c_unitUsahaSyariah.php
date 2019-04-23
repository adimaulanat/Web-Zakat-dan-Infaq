<?php 
 
class c_unitUsahaSyariah extends CI_Controller{
 
	function __construct(){
		parent::__construct();		
		$this->load->model('m_unitUsahaSyariah','',TRUE);
	}
 
	function index(){
		$data['content_view']="v_unitUsahaSyariah.php";
		$data['unit']=$this->m_unitUsahaSyariah->get_data_unit();
		$this->load->view('v_template_frontend',$data);
	}

}	