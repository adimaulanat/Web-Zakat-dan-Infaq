<?php 
 
class c_akun extends CI_Controller{
 
	function __construct(){
		parent::__construct();		
		$this->load->model('m_akun');
 
	}
 
	function index(){
	}

	function register(){
		if($this->input->post('status')==0){
			$akun = 0;
		}else{
			$akun = 1;
		}
        $data = array(
			'nama' => $this->input->post('nama'),
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password')),
			'status' => $akun,
		);
		$this->m_akun->add_akun($data);
		redirect(base_url('/'));
	}

	function cek_akun(){
		$data = array(
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password')),
		);
		$cek = $this->m_akun->cek_akun($data);
		if($cek){
			$data_session = array(
				'nama' => $cek->nama,
				'username' => $cek->username,
				'jenis' => $cek->status,
				'status' => "login",
			);
 			
			$this->session->set_userdata($data_session);
 			
 			if($_SESSION['jenis']==0){		
				redirect(site_url("c_zakat/display"));
 			}else if($_SESSION['jenis']==1){		
				redirect(site_url("c_zakat/zakatAdmin"));
 			}
 
		}else{
			$data_session = array(
				'status' => "x",
			);
			$this->session->set_userdata($data_session);
			
			redirect(site_url("c_home/index"));
		}
	}	

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('/'));
	}
}	