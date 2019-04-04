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
		$data['list_zakat'] = $this->m_zakat->get_list_data($_SESSION['username']);
		$data['list_zakat_all'] = $this->m_zakat->get_list_data_all();
		$this->load->view('v_template_frontend',$data);
	}

	// Menampilkan tabel log infaq
	function display_infaq(){
		$data['content_view'] = "v_infaq.php";
		$data['list_infaq'] = $this->m_zakat->get_list_data_infaq($_SESSION['username']);
		$data['list_infaq_all'] = $this->m_zakat->get_list_data_all_infaq();
		$this->load->view('v_template_frontend',$data);
	}

	// Menampilkan form untuk upload bukti pembayaran
	function update(){
		$data['content_view'] = "v_upload_bukti_pembayaran.php";
		$this->load->view('v_template_frontend',$data);
	}

	// Fungsi mengupload bukti pembayaran
	function upload_bukti_pembayaran(){
		$vusername = $_SESSION['username'];
		$vid = $this->input->post('ids');

		$config['upload_path']          = './assets/image/';
		$config['allowed_types']        = 'jpg|png|jpeg';
		$config['max_size']             = 500;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;
 
		$this->load->library('upload', $config);
 		
		if ( ! $this->upload->do_upload('foto_bukti_pembayaran')){
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
		$vusername = $_SESSION['username'];
		$vnominal_gaji = $this->input->post('nominal_gaji');

		$this->m_zakat->insert($vusername, $vnominal_gaji);
		redirect('C_zakat/display');
	}
 
 	function infaq_display(){
		$data['content_view'] = "v_infaq.php";
		$data['list_infaq'] = $this->m_zakat->get_list_data_infaq($_SESSION['username']);
		$this->load->view('v_template_frontend',$data);
	}

	function insert_infaq(){
		$vusername = $_SESSION['username'];
		$vnominal_infaq = $this->input->post('nominal_infaq');

		$this->m_zakat->insert_infaq($vusername, $vnominal_infaq);
		redirect('C_zakat/infaq_display');
	}
		
	function verifikasi()
	{
		$data['content_view'] = "v_zakat.php";
		$vid=$this->uri->segment(3);
		$this->m_zakat->update_verifikasi_pembayaran($vid);
		redirect('C_zakat/display');
	}	

	function upload_bukti_pembayaran_infaq(){
		$vusername = $_SESSION['username'];
		$vid = $this->input->post('ids');

		$config['upload_path']          = './assets/image/';
		$config['allowed_types']        = 'jpg|png|jpeg';
		$config['max_size']             = 500;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;
 
		$this->load->library('upload', $config);
 		
		if ( ! $this->upload->do_upload('foto_bukti_pembayaran')){
			echo $this->upload->data('file_name');
			echo $this->upload->display_errors();
			//$this->load->view('v_template_frontend', $error);
		}else{
			$data = array('upload_data' => $this->upload->data());
			$vfoto = $this->upload->data('file_name');
			// $this->load->view('v_template_frontend', $data);
			$this->m_zakat->update_bukti_pembayaran_infaq($vusername, $vid, $vfoto);
			redirect('C_zakat/display_infaq');
		}
	}
}
?>