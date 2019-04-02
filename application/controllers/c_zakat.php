<?php

class C_zakat extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_zakat','',TRUE);

		// if($this->session->userdata('status') != "login"){
		// 	redirect(site_url("c_login/index"));
		// }
	}

	// Menampilkan tabel log zakat
	function display(){
		$data['content_view'] = "v_zakat.php";
		$data['list_zakat'] = $this->m_zakat->get_list_data('fadhil');
		$this->load->view('v_template_frontend',$data);
	}

	// Menampilkan form untuk upload bukti pembayaran
	function update(){
		$data['content_view'] = "v_upload_bukti_pembayaran.php";
		$this->load->view('v_template_frontend',$data);
	}

	// Fungsi mengupload bukti pembayaran
	function upload_bukti_pembayaran(){
		$vusername = $this->input->post('username');
		$vid = $this->input->post('id');

		$config['upload_path']          = './image/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 100;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;
 
		$this->load->library('upload', $config);
 		
		if ( ! $this->upload->do_upload('foto')){
			echo $this->upload->data('file_name');
			echo $this->upload->display_errors();
			//$this->load->view('v_template_frontend', $error);
		}else{
			$data = array('upload_data' => $this->upload->data());
			$vfoto = $this->upload->data('file_name');
			// $this->load->view('v_template_frontend', $data);
			$this->m_zakat->update_bukti_pembayaran($vusername, $vid, $vfoto);
			redirect('C_zakat/display');
		}
	}

	// Menampilkan form untuk menambah zakat
	function add(){
		$data['content_view'] = "v_tambah_zakat.php";
		$this->load->view('v_template_frontend',$data);
	}

	// Fungsi mengupload bukti pembayaran
	function insert(){
		$vusername = $this->input->post('username');
		$vnominal_gaji = $this->input->post('nominal_gaji');

		$this->m_zakat->insert($vusername, $vnominal_gaji);
		redirect('C_zakat/display');
	}
 
		

	

	// function view_detail(){
	// 	$vnim = $this->uri->segment(3);
	// 	$data['content_view'] = "v_mahasiswa_detail.php";
	// 	$data['row_data'] = $this->m_mahasiswa->get_detail_data($vnim);
	// 	$this->load->view('v_template_frontend',$data);
	// }

 //    function update(){
	// 	$vnim = $this->input->post('nim');
	// 	$vnama = $this->input->post('nama');
	// 	$vip = $this->input->post('ip');
	// 	// $vfoto = $this->input->post('foto');

	// 	$config['upload_path']          = './image/';
	// 	$config['allowed_types']        = 'gif|jpg|png';
	// 	$config['max_size']             = 100;
	// 	$config['max_width']            = 1024;
	// 	$config['max_height']           = 768;
 
	// 	$this->load->library('upload', $config);
 		
	// 	if ( ! $this->upload->do_upload('foto')){
	// 		echo $this->upload->data('file_name');
	// 		echo $this->upload->display_errors();
	// 		//$this->load->view('v_template_frontend', $error);
	// 	}else{
	// 		$data = array('upload_data' => $this->upload->data());
	// 		$vfoto = $this->upload->data('file_name');
	// 		// $this->load->view('v_template_frontend', $data);
	// 		$this->m_mahasiswa->update($vnim, $vnama, $vip, $vfoto);
	// 		redirect('C_frontend_mahasiswa/display');
	// 	}
	// }
 
	// function edit(){
	// 	$vnim = $this->uri->segment(3);
	// 	$data['content_view'] = "v_mahasiswa_edit.php";
	// 	$data['row_data'] = $this->m_mahasiswa->get_detail_data($vnim);
	// 	$this->load->view('v_template_frontend',$data);
	// }
}
?>