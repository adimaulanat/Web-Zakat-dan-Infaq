<head>
	<!-- <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> -->
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/css/bootstrap.css" rel="stylesheet">
	<!-- <link href="<?php echo base_url() ?>assets/css/_variables.scss" rel="stylesheet"> -->
	<link href="<?php echo base_url() ?>assets/css/_bootswatch.scss" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/css/custom.css" rel="stylesheet">
	
	<script src="<?php echo base_url() ?>assets/js/jquery-3.2.1.slim.min.js"></script>
	<script src="<?php echo base_url() ?>assets/js/popper.min.js"></script>
	<script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
</head>
<body>
	<body style="height:100%; width:100%">
    <div id="header" style="position:absolute; top:0px; left:0px; height:50px; right:0px;overflow:hidden;"> 
		    <ul>
				<li><?php echo anchor('c_home/index','Zakat dan Infaq') ?></li>
				<li><?php echo anchor('c_unitUsahaSyariah/index','Unit Usaha Syariah') ?></li>
		      <?php if($this->session->userdata('status') == "login"){?>
		      <li style="float: right;"><?php echo anchor('c_akun/logout','<i class="fas fa-sign-out-alt"></i> &nbsp;Log Out') ?></li>
			  <li><?php echo anchor('c_zakat/display','Zakat') ?></li>
			  <li><?php echo anchor('c_zakat/infaq_display','Infaq') ?></li>
			  <li style="float: right;"><?php echo anchor('c_zakat/disprofiluser','<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>Profil') ?></li>
<?php			} else{ ?>
		      <li style="float: right;"><a data-toggle="modal" href="#modalRegisterForm">Daftar</a></li>
			  <li style="float: right;"><a data-toggle="modal" href="#modalLoginForm">Log In</a></li>
			  
			  
		      <!-- <li><?php /*echo anchor('c_frontend_cart/display','SHOPPING CART')*/ ?></li> -->
		      <?php } ?>
		    </ul>
    </div> 

	 <div id="content" style="position:absolute; top:50px; bottom:40px; left:0px; right:0px; overflow:auto;"> 
	 	<?php	
	 	if($content_view == "v_home.php"){
	 		?>
		    <center><img style="margin-top: 5px;" width="90%" src="<?php echo base_url() ?>assets/img/zakat.jpg"></center>
		<?php } ?>
    	<div class="container custom-body">
			<?php $this->load->view($content_view) ?>
    	</div>
    </div>

    <div id="footer" style="position:absolute; bottom:0px; height:30px; left:0px; right:0px; overflow:hidden;"> 
    	<!-- <footer class="footer-custom"> -->
			<div class="isi-footer">
				<h5 style="font-size: 10px; line-height: 30px; color: white;" class="text-center font-bold text-footer-custom">© Para Pencari Sesuap Nasi</h5>
			</div>
		<!-- </footer> -->
    </div>

		<!-- modal register -->
		<div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header text-center">
						<h4 class="modal-title w-100 font-weight-bold">Daftar</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php
        		echo form_open_multipart('c_akun/register');
    			?>
					<div class="modal-body mx-3">
							<label>Nama</label>
							<input required="true" type="text" name="nama" class="form-control">
							<label>Email</label>
							<input required="true" type="text" name="email" class="form-control">
							<label>Username</label>
							<input required="true" type="text" name="username" class="form-control">
							<label>Password</label>
							<input required="true" type="password" name="password" class="form-control">
							<label>Status</label>
              <select required="true" name="status" class="form-control">
                  <option value="0">User</option>
                  <option value="1">Admin</option>
              </select>
					</div>
					<div class="modal-footer d-flex justify-content-center">
						<button type="submit" class="btn btn-primary">Daftar</button>
					</div>
					<?php
						echo form_close();
					?>	
				</div>
			</div>
		</div>

		<!-- modal login -->
		<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header text-center">
						<h4 class="modal-title w-100 font-weight-bold">Log In</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php
        		echo form_open_multipart('c_akun/cek_akun');
    			?>
					<div class="modal-body mx-3">
							<label>Username</label>
							<input required="true" type="text" name="username" class="form-control">
							<label>Password</label>
							<input required="true" type="password" name="password" class="form-control">
					</div>
					<div class="modal-footer d-flex justify-content-center">
						<button type="submit" class="btn btn-primary">Masuk</button>
					</div>
					<?php
						echo form_close();
					?>	
				</div>
			</div>
		</div>

		<!-- modal message -->
		<div class="modal fade" id="modalMessage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header text-center">
						<h6 class="modal-title w-100">Username Atau Password Salah</h6>
						<button type="button" onclick="location.href='http://localhost/Web-Zakat-dan-Infaq/index.php/c_akun/hapus_data'" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				</div>
			</div>
		</div>
	
</body>

<script>
	// var loc = window.location.pathname;
	// var paths = loc.split('/');
	// console.log(paths[4]);
	// if(paths[4].includes("mahasiswa")){
	// 	document.getElementById("mhs-link").classList.add("active");
	// }else if(paths[4].includes("berita")){
	// 	document.getElementById("berita-link").classList.add("active");
	// }

	// $(document).ready(function(){
	// 	$('#modalLoginForm').modal('show');
	// // 	$("#modal_register").click(function(){
  // //   	$("#myModal").modal("toggle");
  // // 	});
	// });
  
</script>