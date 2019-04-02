<head>
	<link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/css/bootstrap.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/css/_variables.scss" rel="stylesheet">
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
		      <?php if($this->session->userdata('status') == "login"){?>
		      <li style="float: right;"><?php echo anchor('c_akun/logout','LOG OUT') ?></li>
<?php			} else{ ?>
		      <li style="float: right;"><a data-toggle="modal" href="#modalRegisterForm">Daftar</a></li>
			  <li style="float: right;"><a data-toggle="modal" href="#modalLoginForm">Log In</a></li>
			  <li style="float: right;"><?php echo anchor('c_home/display_user','ke page User') ?></li>
			  <li style="float: right;"><?php echo anchor('c_home/display_admin','ke page Admin') ?></li>
			  <li style="float: right;"><?php echo anchor('c_zakat/display','Zakat') ?></li>
		      <!-- <li><?php /*echo anchor('c_frontend_cart/display','SHOPPING CART')*/ ?></li> -->
		      <?php } ?>
		    </ul>
    </div> 

	 <div id="content" style="position:absolute; top:50px; bottom:40px; left:0px; right:0px; overflow:auto;"> 
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

		<!-- modal register -->
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
	
</body>

<script>
	var loc = window.location.pathname;
	var paths = loc.split('/');
	console.log(paths[4]);
	if(paths[4].includes("mahasiswa")){
		document.getElementById("mhs-link").classList.add("active");
	}else if(paths[4].includes("berita")){
		document.getElementById("berita-link").classList.add("active");
	}

	// $(document).ready(function(){
	// 	$("#modal_register").click(function(){
  //   	$("#myModal").modal("toggle");
  // 	});
	// });

  
</script>