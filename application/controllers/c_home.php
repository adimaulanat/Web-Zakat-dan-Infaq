<?php 
 
class c_home extends CI_Controller{
 
	function __construct(){
		parent::__construct();		
		$this->load->model('m_home','',TRUE);
	}
 
	function index(){
		$data['content_view']="v_home.php";
		$data['artikel']=$this->m_home->get_data_artikel();
		$this->load->view('v_template_frontend',$data);
	}

	function display_user(){
		$data['content_view']="v_user.php";
		$this->load->view('v_template_frontend',$data);
	}

	function display_admin(){
		$data['content_view']="v_admin.php";
		$this->load->view('v_template_frontend',$data);
	}	
}	