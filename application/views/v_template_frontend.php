<head>
	<link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/css/bootstrap.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/css/_variables.scss" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/css/_bootswatch.scss" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/css/custom.css" rel="stylesheet">
</head>
<body>
	<body style="height:100%; width:100%">
    <div id="header" style="position:absolute; top:0px; left:0px; height:50px; right:0px;overflow:hidden;"> 
		    <ul>
		      <?php if($this->session->userdata('status') == "login"){?>
		      <li style="float: right;"><?php echo anchor('c_login/logout','LOGOUT') ?></li>
<?php			} else{ ?>
		      <li style="float: right;"><?php echo anchor('#','REGISTER') ?></li>
			  <li style="float: right;"><?php echo anchor('#','LOGIN') ?></li>
			  <li style="float: right;"><?php echo anchor('c_home/display_user','ke page User') ?></li>
			  <li style="float: right;"><?php echo anchor('c_home/display_admin','ke page Admin') ?></li>
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
</script>