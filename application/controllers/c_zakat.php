<?php

class C_zakat extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_zakat','',TRUE);
		$this->load->library('pdf');
		$this->load->helper('url');
		$this->load->library('session');

		if($this->session->userdata('status') != "login"){
			redirect(site_url("c_home/index"));
		}

	}

	// Menampilkan tabel log zakat
	function display(){
		if($this->session->userdata('jenis') == 1){
			redirect(site_url("c_zakat/zakatAdmin"));
		}
		$this->load->database();
 	    if($this->input->get('submit')!==NULL){
			$this->session->set_userdata('filter', $this->input->get('judul'));
		}
		$jumlah_data = $this->m_zakat->jumlah_data($this->session->filter);
		$data['content_view'] = "v_zakat.php";
		$from = $this->input->get('per_page');

		$this->load->library('pagination');
		$config['base_url'] = base_url().'index.php/C_zakat/display/';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 5;

		$config['prev_link'] = '&nbsp;&nbsp;Previous&nbsp;';
	    $config['next_link'] = '&nbsp;Next&nbsp;&nbsp;';
        $from = $this->uri->segment(3);

        $this->pagination->initialize($config);
        $data['admin'] = $this->m_zakat->data_admin($config['per_page'],$from,$this->session->filter);
        $data['user'] = $this->m_zakat->data_user($_SESSION['username'],$config['per_page'],$from,$this->session->filter);
        if($this->uri->segment(3)){
		$_SESSION['page'] = ($this->uri->segment(3)) ;
		}
		else{
		$_SESSION['page'] = 0;
		}
		$this->load->view('v_template_frontend',$data);


		// $this->load->database();
  //       $jumlah_data = $this->m_zakat->jumlah_data();
  //       $this->load->library('pagination');
  //       $config['base_url'] = base_url().'index.php/C_zakat/display/';
  //       $config['total_rows'] = $jumlah_data;
  //       $config['per_page'] = 5;
  //       $from = $this->uri->segment(3);
  //       $this->pagination->initialize($config);     
  //       $data['admin'] = $this->m_zakat->data_admin($config['per_page'],$from);
  //       $data['user'] = $this->m_zakat->data_user($_SESSION['username'],$config['per_page'],$from);
  //       $data['content_view'] = "v_zakat.php";
  //       if($this->uri->segment(3) != null){
		// $_SESSION['page'] = ($this->uri->segment(3)) ;
		// }
		// else{
		// $_SESSION['page'] = 0;
		// }
  //       $this->load->view('v_template_frontend',$data);
	}

	function user_unset_session_search(){
		$this->session->unset_userdata('filter');
		redirect('c_zakat/display');
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
		
		$config['upload_path']          = './assets/img/';
		$config['allowed_types']        = 'jpg|png|jpeg';
		$config['max_size']             = 500;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;
 
		$this->load->library('upload', $config);
 		
		if ( ! $this->upload->do_upload('foto_bukti_pembayaran')){
			$data_session = array(
				'errorUp' => "y",
			);
			$this->session->set_userdata($data_session);
			redirect('C_zakat/display');
		}else{
			$data = array('upload_data' => $this->upload->data());
			$vfoto = $this->upload->data('file_name');
			// $this->load->view('v_template_frontend', $data);
			$this->m_zakat->update_bukti_pembayaran($vusername, $vid, $vfoto);
			redirect('C_zakat/display');
		}
	}

	// Fungsi mengupload bukti pembayaran
	function upload_bukti_pembayaran_infaq(){
		$vusername = $_SESSION['username'];
		$vid = $this->input->post('ids');
		
		$config['upload_path']          = './assets/img/';
		$config['allowed_types']        = 'jpg|png|jpeg';
		$config['max_size']             = 500;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;
 
		$this->load->library('upload', $config);
 		
		if ( ! $this->upload->do_upload('foto_bukti_pembayaran')){
			$data_session = array(
				'errorUp' => "y",
			);
			$this->session->set_userdata($data_session);
			redirect('C_zakat/infaq_display');
		}else{
			$data = array('upload_data' => $this->upload->data());
			$vfoto = $this->upload->data('file_name');
			// $this->load->view('v_template_frontend', $data);
			$this->m_zakat->update_bukti_pembayaran_infaq($vusername, $vid, $vfoto);
			redirect('C_zakat/infaq_display');
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
		$vnama_zakat = $this->input->post('nama_zakat');
		$vnominal_zakat = $vnominal_gaji * 2.5 / 100;
		$vtanggal_input=date("Y-m-d");
		//Image harus 16:9
		$config['upload_path']          = './assets/img/';
		$config['allowed_types']        = 'jpg|png|jpeg';
		$config['max_size']             = 500;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;
		
		$this->load->library('upload', $config);

		// $this->upload->do_upload('slip_gaji');
		
		if (!$this->upload->do_upload('slip_gaji')) {
			$data_session = array(
				'errorUp' => "y",
			);
			$this->session->set_userdata($data_session);
			redirect('C_zakat/display');
		}else {
		
		$file = $this->upload->data();

		$data = array(
			'username' => $vusername,
			'nama_zakat' => $vnama_zakat,
			'nominal_gaji' => $vnominal_gaji,
			'nominal_zakat' => $vnominal_zakat,
			'slip_gaji' => $this->upload->data('file_name'),
			'bukti_pembayaran' => '',
			'tanggal_input' => $vtanggal_input,
			'tanggal_bayar' => '',
			'tanggal_verifikasi' => '',
			'status' => '0'
		);

		$this->m_zakat->input_data_zakat($data,'zakat');
		$data_session = array(
				'infoRek' => "y",
			);
		$this->session->set_userdata($data_session);

		redirect('C_zakat/display');
		}
	}

	function hapus_data(){
		$data_session = array(
				'infoRek' => "n",
			);
		$this->session->set_userdata($data_session);
		redirect('C_zakat/display');
	}

	function hapus_data_infaq(){
		$data_session = array(
				'infoRek' => "n",
			);
		$this->session->set_userdata($data_session);
		redirect('C_zakat/infaq_display');
	}

	function hapus_data_error_zakat(){
		$data_session = array(
				'errorUp' => "n",
			);
		$this->session->set_userdata($data_session);
		redirect('C_zakat/display');
	}
	
	function hapus_data_error_infaq(){
		$data_session = array(
				'errorUp' => "n",
			);
		$this->session->set_userdata($data_session);
		redirect('C_zakat/infaq_display');
	}
 
 	function infaq_display(){
		 if($this->session->userdata('jenis') == 1){
			redirect(site_url("c_zakat/zakatAdmin"));
		}
 		$this->load->database();
 	    if($this->input->get('submit')!==NULL){
			$this->session->set_userdata('filter', $this->input->get('judul'));
		}
		$jumlah_data = $this->m_zakat->jumlah_data_infaq($this->session->filter);
		$data['content_view'] = "v_infaq.php";
		$from = $this->input->get('per_page');

		$this->load->library('pagination');
		$config['base_url'] = base_url().'index.php/C_zakat/infaq_display/';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 5;

		$config['prev_link'] = '&nbsp;&nbsp;Previous&nbsp;';
	    $config['next_link'] = '&nbsp;Next&nbsp;&nbsp;';
        $from = $this->uri->segment(3);

        $this->pagination->initialize($config);
        $data['admin'] = $this->m_zakat->data_admin_infaq($config['per_page'],$from,$this->session->filter);
        $data['user'] = $this->m_zakat->data_user_infaq($_SESSION['username'],$config['per_page'],$from,$this->session->filter);
        if($this->uri->segment(3)){
		$_SESSION['page'] = ($this->uri->segment(3)) ;
		}
		else{
		$_SESSION['page'] = 0;
		}
		$this->load->view('v_template_frontend',$data);
 		

 	// 	$this->load->database();
  //       $jumlah_data = $this->m_zakat->jumlah_data_infaq();
  //       $this->load->library('pagination');
  //       $config['base_url'] = base_url().'index.php/C_zakat/infaq_display/';
  //       $config['total_rows'] = $jumlah_data;
  //       $config['per_page'] = 5;
	 //    $config['prev_link'] = '&nbsp;Previous&nbsp;|&nbsp;';
	 //    $config['next_link'] = '&nbsp;|&nbsp;Next&nbsp;';
  //       $from = $this->uri->segment(3);
  //       $this->pagination->initialize($config);     
  //       $data['admin'] = $this->m_zakat->data_admin_infaq($config['per_page'],$from);
  //       $data['user'] = $this->m_zakat->data_user_infaq($_SESSION['username'],$config['per_page'],$from);
  //       $data['content_view'] = "v_infaq.php";
  //       if($this->uri->segment(3)){
		// $_SESSION['page'] = ($this->uri->segment(3)) ;
		// }
		// else{
		// $_SESSION['page'] = 0;
		// }
  //       $this->load->view('v_template_frontend',$data);

		// $data['content_view'] = "v_infaq.php";
		// $data['list_infaq'] = $this->m_zakat->get_list_data_infaq($_SESSION['username']);
		// $this->load->view('v_template_frontend',$data);
	}

	function user_unset_session_search_infaq(){
		$this->session->unset_userdata('filter');
		redirect('c_zakat/infaq_display');
	}

	function insert_infaq(){
		$vusername = $_SESSION['username'];
		$vnama_infaq = $this->input->post('nama_infaq');
		$vnominal_infaq = $this->input->post('nominal_infaq');
		$vtanggal_input=date("Y-m-d");
		//Image harus 16:9
		$config['upload_path']          = './assets/img/';
		$config['allowed_types']        = 'jpg|png|jpeg';
		$config['max_size']             = 500;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;
		
		$this->load->library('upload', $config);
		$this->upload->do_upload('slip_gaji');

		
		if (!$this->upload->do_upload('slip_gaji')) {
			$data_session = array(
				'errorUp' => "y",
			);
			$this->session->set_userdata($data_session);
			redirect('C_zakat/infaq_display');
		}else {

		$file = $this->upload->data();

		$data = array(
			'username' => $vusername,
			'nama_infaq' => $vnama_infaq,
			'nominal_infaq' => $vnominal_infaq,
			'slip_gaji' => $this->upload->data('file_name'),
			'bukti_pembayaran' => '',
			'tanggal_input' => $vtanggal_input,
			'tanggal_bayar' => '',
			'tanggal_verifikasi' => '',
			'status' => '0'
		);

		$this->m_zakat->input_data_infaq($data,'infaq');
		$data_session = array(
				'infoRek' => "y",
			);
		$this->session->set_userdata($data_session);

		redirect('C_zakat/infaq_display');
		}
	}
		
	function verifikasi()
	{
		// $data['content_view'] = "v_zakat.php";
		$id=$this->uri->segment(3);
		$this->m_zakat->update_verifikasi_pembayaran($id);
		redirect('C_zakat/zakatAdmin');
	}	

	function verifikasi_infaq()
	{
		// $data['content_view'] = "v_infaq.php";
		$id=$this->uri->segment(3);
		$this->m_zakat->update_verifikasi_pembayaran_infaq($id);
		redirect('C_zakat/infaqAdmin');
	}	

	function zakatAdmin(){
		if($this->session->userdata('jenis') == 0){
			redirect(site_url("c_zakat/display"));
		}
		$this->load->database();
		// $data['admin'] = $this->m_zakat->get_all_data();
 	    if($this->input->get('submit')!==NULL){
			$this->session->set_userdata('filter', $this->input->get('username'));
		}
		// $test = $this->session->filter;
		// echo $test;
		$jumlah_data = $this->m_zakat->jumlah_data($this->session->filter);
		$data['content_view'] = "v_zakatAdmin.php";
		$from = $this->input->get('per_page');
		// $test = $this->session->filter;
		// echo $from;
		// echo $jumlah_data;
		// echo $test;

		$this->load->library('pagination');
		$config['base_url'] = base_url().'index.php/C_zakat/zakatAdmin/';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 5;

		$config['prev_link'] = '&nbsp;&nbsp;Previous&nbsp;';
	    $config['next_link'] = '&nbsp;Next&nbsp;&nbsp;';
        $from = $this->uri->segment(3);

        $this->pagination->initialize($config);
		// $data['list_zakat'] = $this->m_zakat->get_data($config['per_page'],$from,$this->session->filter);
        $data['admin'] = $this->m_zakat->data_admin($config['per_page'],$from,$this->session->filter);
        $data['user'] = $this->m_zakat->data_user($_SESSION['username'],$config['per_page'],$from,$this->session->filter);
        // $data['content_view'] = "v_zakat.php";
        if($this->uri->segment(3)){
		$_SESSION['page'] = ($this->uri->segment(3)) ;
		}
		else{
		$_SESSION['page'] = 0;
		}
		$this->load->view('v_admin',$data);
	}

	function unset_session_search(){
		$this->session->unset_userdata('filter');
		redirect('c_zakat/zakatAdmin');
	}

	function infaqAdmin(){
		if($this->session->userdata('jenis') == 0){
			redirect(site_url("c_zakat/display"));
		}
		$this->load->database();
		// $data['admin'] = $this->m_zakat->get_all_data();
 	    if($this->input->get('submit')!==NULL){
			$this->session->set_userdata('filter', $this->input->get('username'));
		}
		// $test = $this->session->filter;
		// echo $test;
		$jumlah_data = $this->m_zakat->jumlah_data_infaq($this->session->filter);
		$data['content_view'] = "v_infaqAdmin.php";
		$from = $this->input->get('per_page');
		// $test = $this->session->filter;
		// echo $from;
		// echo $jumlah_data;
		// echo $test;

		$this->load->library('pagination');
		$config['base_url'] = base_url().'index.php/C_zakat/infaqAdmin/';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 5;

		$config['prev_link'] = '&nbsp;&nbsp;Previous&nbsp;';
	    $config['next_link'] = '&nbsp;Next&nbsp;&nbsp;';
        $from = $this->uri->segment(3);

		$this->pagination->initialize($config);
		// $data['list_zakat'] = $this->m_zakat->get_data($config['per_page'],$from,$this->session->filter);
        $data['admin'] = $this->m_zakat->data_admin_infaq($config['per_page'],$from,$this->session->filter);
        $data['user'] = $this->m_zakat->data_user_infaq($_SESSION['username'],$config['per_page'],$from,$this->session->filter);
        // $data['content_view'] = "v_zakat.php";
        if($this->uri->segment(3)){
		$_SESSION['page'] = ($this->uri->segment(3)) ;
		}
		else{
		$_SESSION['page'] = 0;
		}
		$this->load->view('v_admin',$data);
	}

	function unset_session_search_infaq(){
		$this->session->unset_userdata('filter');
		redirect('c_zakat/infaqAdmin');
	}

	function chart(){
		$data['content_view'] = "v_chart.php";
		$this->load->view('v_admin',$data);
	}

	// Menampilkan tabel log zakat
	function disprofil(){
		$data['content_view'] = "v_profilAdmin.php";
		$this->load->model('m_zakat');
		$uname = $_SESSION['username'];
		$profil = $this->m_zakat->get_profil($uname);
		$data['profil'] = $profil;
		$this->load->view('v_admin',$data);
	}

	// Mencetak data zakat page user
	function print_user_zakat(){
        $pdf = new FPDF('l','mm','A5');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
		// mencetak string
		$pdf->Cell(190,7,'DATA ZAKAT',0,1,'C');
        // // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(30,15,'',0,1);
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(7,6,'No',1,0,'C');
        $pdf->Cell(29,6,'NOMINAL GAJI',1,0,'C');
        $pdf->Cell(29,6,'NOMINAL ZAKAT',1,0,'C');
        $pdf->Cell(25,6,'TANGGAL INPUT',1,0,'C');
        $pdf->Cell(26,6,'TANGGAL BAYAR',1,0,'C');
        $pdf->Cell(33,6,'TANGGAL VERIFIKASI',1,0,'C');
        $pdf->Cell(41,6,'STATUS',1,1,'C');
        $pdf->SetFont('Arial','',8);
        $uname = $_SESSION['username'];
		$zakat = $this->m_zakat->get_list_data_print($uname)->result();
		$no = 1;
        foreach ($zakat as $row){
            $pdf->Cell(7,6,$no,1,0,'C');
            $pdf->Cell(29,6,"Rp. " . number_format($row->nominal_gaji,2,',','.'),1,0);
			$pdf->Cell(29,6,"Rp. " . number_format($row->nominal_zakat,2,',','.'),1,0);
			$pdf->Cell(25,6,$row->tanggal_input,1,0,'C');
	        $pdf->Cell(26,6,$row->tanggal_bayar,1,0,'C');
	        $pdf->Cell(33,6,$row->tanggal_verifikasi,1,0,'C');
	        if($row->status == 0){
				$pdf->Cell(41,6,'Belum melakukan pembayaran',1,1);
			} else if($row->status == 1){
				$pdf->Cell(41,6,'Belum di Verifikasi',1,1);
			}                                       
			else if($row->status == 2) {
				$pdf->Cell(41,6,'Sudah di Verifikasi',1,1);
	        }
	        $no++;
        }
        $pdf->Output();
	}
	
	function print_user_zakat_transaksi(){
		$id=$this->uri->segment(3);

        $pdf = new FPDF('l','mm','A5');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
		// mencetak string
		$pdf->Cell(190,7,'DATA ZAKAT',0,1,'C');
        // // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(30,15,'',0,1);
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(7,6,'No',1,0,'C');
        $pdf->Cell(29,6,'NOMINAL GAJI',1,0,'C');
        $pdf->Cell(29,6,'NOMINAL ZAKAT',1,0,'C');
        $pdf->Cell(25,6,'TANGGAL INPUT',1,0,'C');
        $pdf->Cell(26,6,'TANGGAL BAYAR',1,0,'C');
        $pdf->Cell(33,6,'TANGGAL VERIFIKASI',1,0,'C');
        $pdf->Cell(41,6,'STATUS',1,1,'C');
        $pdf->SetFont('Arial','',8);
        $uname = $_SESSION['username'];
		$zakat = $this->m_zakat->get_list_data_print_transaksi($id)->result();
		$no = 1;
        foreach ($zakat as $row){
            $pdf->Cell(7,6,$no,1,0,'C');
            $pdf->Cell(29,6,"Rp. " . number_format($row->nominal_gaji,2,',','.'),1,0);
			$pdf->Cell(29,6,"Rp. " . number_format($row->nominal_zakat,2,',','.'),1,0);
			$pdf->Cell(25,6,$row->tanggal_input,1,0,'C');
	        $pdf->Cell(26,6,$row->tanggal_bayar,1,0,'C');
	        $pdf->Cell(33,6,$row->tanggal_verifikasi,1,0,'C');
	        if($row->status == 0){
				$pdf->Cell(41,6,'Belum melakukan pembayaran',1,1);
			} else if($row->status == 1){
				$pdf->Cell(41,6,'Belum di Verifikasi',1,1);
			}                                       
			else if($row->status == 2) {
				$pdf->Cell(41,6,'Sudah di Verifikasi',1,1);
	        }
	        $no++;
        }
        $pdf->Output();
    }


    // Mencetak data infaq page user
	function print_user_infaq(){
        $pdf = new FPDF('l','mm','A5');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
		// mencetak string
		$pdf->Cell(190,7,'DATA INFAQ',0,1,'C');
        // // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(30,15,'',0,1);
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(10,6,'No',1,0,'C');
        $pdf->Cell(35,6,'NOMINAL INFAQ',1,0,'C');
        $pdf->Cell(30,6,'TANGGAL INPUT',1,0,'C');
        $pdf->Cell(30,6,'TANGGAL BAYAR',1,0,'C');
        $pdf->Cell(35,6,'TANGGAL VERIFIKASI',1,0,'C');
        $pdf->Cell(50,6,'STATUS',1,1,'C');
        $pdf->SetFont('Arial','',8);
        $uname = $_SESSION['username'];
		$infaq = $this->m_zakat->get_list_data_infaq_print($uname)->result();
		$no = 1;
        foreach ($infaq as $row){
            $pdf->Cell(10,6,$no,1,0,'C');
			$pdf->Cell(35,6,"Rp. " . number_format($row->nominal_infaq,2,',','.'),1,0,'L');
			$pdf->Cell(30,6,$row->tanggal_input,1,0,'C');
	        $pdf->Cell(30,6,$row->tanggal_bayar,1,0,'C');
	        $pdf->Cell(35,6,$row->tanggal_verifikasi,1,0,'C');
	        if($row->status == 0){
				$pdf->Cell(50,6,'Belum melakukan pembayaran',1,1);
			} else if($row->status == 1){
				$pdf->Cell(50,6,'Belum di Verifikasi',1,1);
			}                                       
			else if($row->status == 2) {
				$pdf->Cell(50,6,'Sudah di Verifikasi',1,1);
	        }
	        $no++;
        }
        $pdf->Output();
	}
	
	function print_user_infaq_transaksi(){
		$id=$this->uri->segment(3);

        $pdf = new FPDF('l','mm','A5');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
		// mencetak string
		$pdf->Cell(190,7,'DATA INFAQ',0,1,'C');
        // // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(30,15,'',0,1);
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(10,6,'No',1,0,'C');
        $pdf->Cell(35,6,'NOMINAL INFAQ',1,0,'C');
        $pdf->Cell(30,6,'TANGGAL INPUT',1,0,'C');
        $pdf->Cell(30,6,'TANGGAL BAYAR',1,0,'C');
        $pdf->Cell(35,6,'TANGGAL VERIFIKASI',1,0,'C');
        $pdf->Cell(50,6,'STATUS',1,1,'C');
        $pdf->SetFont('Arial','',8);
        $uname = $_SESSION['username'];
		$infaq = $this->m_zakat->get_list_data_infaq_print_transaksi($id)->result();
		$no = 1;
        foreach ($infaq as $row){
            $pdf->Cell(10,6,$no,1,0,'C');
			$pdf->Cell(35,6,"Rp. " . number_format($row->nominal_infaq,2,',','.'),1,0,'L');
			$pdf->Cell(30,6,$row->tanggal_input,1,0,'C');
	        $pdf->Cell(30,6,$row->tanggal_bayar,1,0,'C');
	        $pdf->Cell(35,6,$row->tanggal_verifikasi,1,0,'C');
	        if($row->status == 0){
				$pdf->Cell(50,6,'Belum melakukan pembayaran',1,1);
			} else if($row->status == 1){
				$pdf->Cell(50,6,'Belum di Verifikasi',1,1);
			}                                       
			else if($row->status == 2) {
				$pdf->Cell(50,6,'Sudah di Verifikasi',1,1);
	        }
	        $no++;
        }
        $pdf->Output();
    }

    // Mencetak data zakat page admin
	function print_admin_zakat(){
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');

        $pdf = new FPDF('l','mm','A5');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
		// mencetak string
		$pdf->Cell(190,7,'DATA ZAKAT',0,1,'C');
        // // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(30,15,'',0,1);
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(7,6,'No',1,0,'C');
        $pdf->Cell(29,6,'NOMINAL GAJI',1,0,'C');
        $pdf->Cell(29,6,'NOMINAL ZAKAT',1,0,'C');
        $pdf->Cell(25,6,'TANGGAL INPUT',1,0,'C');
        $pdf->Cell(26,6,'TANGGAL BAYAR',1,0,'C');
        $pdf->Cell(33,6,'TANGGAL VERIFIKASI',1,0,'C');
        $pdf->Cell(41,6,'STATUS',1,1,'C');
        $pdf->SetFont('Arial','',8);
		$zakat = $this->m_zakat->print_by_month($bulan,$tahun)->result();
		$no = 1;
        foreach ($zakat as $row){
            $pdf->Cell(7,6,$no,1,0,'C');
            $pdf->Cell(29,6,"Rp. " . number_format($row->nominal_gaji,2,',','.'),1,0);
			$pdf->Cell(29,6,"Rp. " . number_format($row->nominal_zakat,2,',','.'),1,0);
			$pdf->Cell(25,6,$row->tanggal_input,1,0,'C');
	        $pdf->Cell(26,6,$row->tanggal_bayar,1,0,'C');
	        $pdf->Cell(33,6,$row->tanggal_verifikasi,1,0,'C');
	        if($row->status == 0){
				$pdf->Cell(41,6,'Belum melakukan pembayaran',1,1);
			} else if($row->status == 1){
				$pdf->Cell(41,6,'Belum di Verifikasi',1,1);
			}                                       
			else if($row->status == 2) {
				$pdf->Cell(41,6,'Sudah di Verifikasi',1,1);
	        }
	        $no++;
        }
        $pdf->Output();
    }

    // Mencetak data infaq page admin
	function print_admin_infaq(){
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');

        $pdf = new FPDF('l','mm','A5');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
		// mencetak string
		$pdf->Cell(190,7,'DATA INFAQ',0,1,'C');
        // // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(30,15,'',0,1);
        $pdf->SetFont('Arial','B',8);
        // $pdf->SetLeftMargin(5);
        $pdf->Cell(10,6,'No',1,0,'C');
        $pdf->Cell(35,6,'NOMINAL INFAQ',1,0,'C');
        $pdf->Cell(30,6,'TANGGAL INPUT',1,0,'C');
        $pdf->Cell(30,6,'TANGGAL BAYAR',1,0,'C');
        $pdf->Cell(35,6,'TANGGAL VERIFIKASI',1,0,'C');
        $pdf->Cell(50,6,'STATUS',1,1,'C');
        $pdf->SetFont('Arial','',8);
		$infaq = $this->m_zakat->print_by_month_infaq($bulan,$tahun)->result();
		$no = 1;
        foreach ($infaq as $row){
            $pdf->Cell(10,6,$no,1,0,'C');
			$pdf->Cell(35,6,"Rp. " . number_format($row->nominal_infaq,2,',','.'),1,0,'L');
			$pdf->Cell(30,6,$row->tanggal_input,1,0,'C');
	        $pdf->Cell(30,6,$row->tanggal_bayar,1,0,'C');
	        $pdf->Cell(35,6,$row->tanggal_verifikasi,1,0,'C');
	        if($row->status == 0){
				$pdf->Cell(50,6,'Belum melakukan pembayaran',1,1);
			} else if($row->status == 1){
				$pdf->Cell(50,6,'Belum di Verifikasi',1,1);
			}                                       
			else if($row->status == 2) {
				$pdf->Cell(50,6,'Sudah di Verifikasi',1,1);
	        }
	        $no++;
        }
        $pdf->Output();
    }

	function edit_profil(){
		$data['content_view'] = "v_editprofil.php";
		$this->load->model('m_zakat');
		$uname = $_SESSION['username'];
		$profil = $this->m_zakat->get_profil($uname);
		$data['profil'] = $profil;
		$this->load->view('v_admin',$data);
	}

	function edit_profil_to_db(){
		$nama = $this->input->post('nama');
		$password = $this->input->post('password');
		$data = array();

		if(!$password){
			$data = $data + array(
				'nama' => $nama,
			);
		}else if($password){
			$data = $data + array(
				'nama' => $nama,
				'password' => md5($password)
			);
		}

		$where = array(
			'username' => $_SESSION['username']
		);
		
		if($this->m_zakat->update_data_profil($where,$data,'akun')){
			redirect(site_url("c_zakat/disprofil"));
		}else{
			$this->db->error();
		}
	}

	function disprofiluser(){
		$data['content_view'] = "v_profilUser.php";
		$this->load->model('m_zakat');
		$uname = $_SESSION['username'];
		$profil = $this->m_zakat->get_profil($uname);
		$data['profil'] = $profil;
		$this->load->view('v_template_frontend',$data);
	}

	function edit_profil_user(){
		$data['content_view'] = "v_editprofilUser.php";
		$this->load->model('m_zakat');
		$uname = $_SESSION['username'];
		$profil = $this->m_zakat->get_profil($uname);
		$data['profil'] = $profil;
		$this->load->view('v_template_frontend',$data);
	}

	function edit_profil_to_db_user(){
		$nama = $this->input->post('nama');
		$password = $this->input->post('password');
		$data = array();

		if(!$password){
			$data = $data + array(
				'nama' => $nama,
			);
		}else if($password){
			$data = $data + array(
				'nama' => $nama,
				'password' => md5($password)
			);
		}

		$where = array(
			'username' => $_SESSION['username']
		);
		
		if($this->m_zakat->update_data_profil($where,$data,'akun')){
			redirect(site_url("c_zakat/disprofiluser"));
		}else{
			$this->db->error();
		}
	}
}
?>
