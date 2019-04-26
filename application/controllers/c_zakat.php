<?php

class C_zakat extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_zakat','',TRUE);
		$this->load->library('pdf');

	}

	// Menampilkan tabel log zakat
	function display(){
		$this->load->database();
        $jumlah_data = $this->m_zakat->jumlah_data();
        $this->load->library('pagination');
        $config['base_url'] = base_url().'index.php/C_zakat/display/';
        $config['total_rows'] = $jumlah_data;
        $config['per_page'] = 5;
        $from = $this->uri->segment(3);
        $this->pagination->initialize($config);     
        $data['admin'] = $this->m_zakat->data_admin($config['per_page'],$from);
        $data['user'] = $this->m_zakat->data_user($_SESSION['username'],$config['per_page'],$from);
        $data['content_view'] = "v_zakat.php";
        if($this->uri->segment(3) != null){
		$_SESSION['page'] = ($this->uri->segment(3)) ;
		}
		else{
		$_SESSION['page'] = 0;
		}
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
		
		$config['upload_path']          = './assets/img/';
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
			echo $this->upload->data('file_name');
			echo $this->upload->display_errors();
			//$this->load->view('v_template_frontend', $error);
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

		$this->m_zakat->insert($vusername, $vnominal_gaji, $vnama_zakat);
		redirect('C_zakat/display');
	}
 
 	function infaq_display(){

 		$this->load->database();
        $jumlah_data = $this->m_zakat->jumlah_data_infaq();
        $this->load->library('pagination');
        $config['base_url'] = base_url().'index.php/C_zakat/infaq_display/';
        $config['total_rows'] = $jumlah_data;
        $config['per_page'] = 5;
	    $config['prev_link'] = '&nbsp;Previous&nbsp;|&nbsp;';
	    $config['next_link'] = '&nbsp;|&nbsp;Next&nbsp;';
        $from = $this->uri->segment(3);
        $this->pagination->initialize($config);     
        $data['admin'] = $this->m_zakat->data_admin_infaq($config['per_page'],$from);
        $data['user'] = $this->m_zakat->data_user_infaq($_SESSION['username'],$config['per_page'],$from);
        $data['content_view'] = "v_infaq.php";
        if($this->uri->segment(3)){
		$_SESSION['page'] = ($this->uri->segment(3)) ;
		}
		else{
		$_SESSION['page'] = 0;
		}
        $this->load->view('v_template_frontend',$data);

		// $data['content_view'] = "v_infaq.php";
		// $data['list_infaq'] = $this->m_zakat->get_list_data_infaq($_SESSION['username']);
		// $this->load->view('v_template_frontend',$data);
	}

	function insert_infaq(){
		$vusername = $_SESSION['username'];
		$vnominal_infaq = $this->input->post('nominal_infaq');
		$vnama_infaq = $this->input->post('nama_infaq');

		$this->m_zakat->insert_infaq($vusername, $vnominal_infaq, $vnama_infaq);
		redirect('C_zakat/infaq_display');
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
		$this->load->database();
        $jumlah_data = $this->m_zakat->jumlah_data();
        $this->load->library('pagination');
        $config['base_url'] = base_url().'index.php/C_zakat/zakatAdmin';
        $config['total_rows'] = $jumlah_data;
        $config['per_page'] = 5;
	    $config['prev_link'] = '&nbsp;&nbsp;Previous&nbsp;';
	    $config['next_link'] = '&nbsp;Next&nbsp;&nbsp;';
        $from = $this->uri->segment(3);
        $this->pagination->initialize($config);     
        $data['admin'] = $this->m_zakat->data_admin($config['per_page'],$from);
        // $data['user'] = $this->m_zakat->data_user($_SESSION['username'],$config['per_page'],$from);
        $data['content_view'] = "v_zakatAdmin.php";
        if($this->uri->segment(3)){
		$_SESSION['page'] = ($this->uri->segment(3)) ;
		}
		else{
		$_SESSION['page'] = 0;
		}
        // $this->load->view('v_template_frontend',$data);
		$this->load->view('v_admin',$data);
	}

	function infaqAdmin(){
		$this->load->database();
        $jumlah_data = $this->m_zakat->jumlah_data_infaq();
        $this->load->library('pagination');
        $config['base_url'] = base_url().'index.php/C_zakat/infaqAdmin';
        $config['total_rows'] = $jumlah_data;
        $config['per_page'] = 5;
	    $config['prev_link'] = '&nbsp;&nbsp;Previous&nbsp;';
	    $config['next_link'] = '&nbsp;Next&nbsp;&nbsp;';
        $from = $this->uri->segment(3);
        $this->pagination->initialize($config);     
        $data['admin'] = $this->m_zakat->data_admin_infaq($config['per_page'],$from);
        // $data['user'] = $this->m_zakat->data_user($_SESSION['username'],$config['per_page'],$from);
        $data['content_view'] = "v_infaqAdmin.php";
        if($this->uri->segment(3)){
		$_SESSION['page'] = ($this->uri->segment(3)) ;
		}
		else{
		$_SESSION['page'] = 0;
		}
        // $this->load->view('v_template_frontend',$data);
		$this->load->view('v_admin',$data);
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
		$zakat = $this->m_zakat->get_list_data($uname)->result();
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
		$infaq = $this->m_zakat->get_list_data_infaq($uname)->result();
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
		$zakat = $this->m_zakat->get_list_data_all()->result();
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
		$infaq = $this->m_zakat->get_list_data_all_infaq()->result();
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
		$this->load->view('v_admin',$data);
	}
}
?>
