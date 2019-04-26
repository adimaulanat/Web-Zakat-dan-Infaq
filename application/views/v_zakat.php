<?php
if(!empty($this->session->userdata('filter'))){
  $filter = $this->session->filter;
}else{
  $filter = '';
}
?>

<div>
	<?php function rupiah($angka){
	
	$hasil_rupiah = "Rp. " . number_format($angka,2,',','.');
	return $hasil_rupiah;
 
	} ?>
	<br>
	<h1 style="font-size: 15px;">Selamat Datang, <?php echo $_SESSION['nama']; ?></h1>
	<hr class="my-2">
	<center>
		<br>
		<h3>
			Data Zakat
		</h3>
		<br>
	</center>

	<form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" method="get" action="<?php echo base_url().'index.php/c_zakat/display'?>">
	    <div class="input-group">
	      	<input type="search" class="form-control bg-light border-0 small" placeholder="Cari..." aria-label="Search" aria-describedby="basic-addon2" name="judul" value="<?php echo $filter;?>">
	      	<div class="input-group-append">
	        	<button class="btn btn-primary" type="submit" name="submit">
	          		<i class="fas fa-search fa-sm"></i>
	        	</button>
	        	<?php 
			        $attrs = array(
			          'class' => 'btn btn-primary',
			          'role' => 'button',
			          'aria-pressed' => "true"
			        );
			        echo anchor('C_zakat/user_unset_session_search','Clear Search',$attrs);
	        	?>
	      	</div>
	    </div>
  	</form>

	<table class="table table-bordered table-striped">
		<tr style="font-size: 14px;">
			<th>No</th>
			<th>Nama Zakat</th>
			<th>Nominal Gaji</th>
			<th>Nominal Zakat</th>
			<th>Tanggal Input</th>
			<th>Tanggal Bayar</th>
			<th>Tanggal Verifikasi</th>
			<th>Bukti Pembayaran</th>
			<th>Status</th>
			<?php if($_SESSION['jenis'] == 1){ ?>
			<th>Verifikasi</th>
			<?php } ?>	
		</tr>
		<?php
		$no = 1;
			foreach ($user as $row){
		?>
		<tr style="font-size: 12px;">
			<?php $page = $_SESSION['page'] + $no; ?>
			<td><?php echo $page; ?></td>
			<td><?php echo $row->nama_zakat; ?></td>
			<td><?php echo rupiah($row->nominal_gaji); ?></td>
			<td><?php echo rupiah($row->nominal_zakat); ?></td>
			<td><?php echo $row->tanggal_input; ?></td>
			<td><?php echo $row->tanggal_bayar; ?></td>
			<td><?php echo $row->tanggal_verifikasi; ?></td>
			<td>
				<?php 
					if($row->status != 0){?>
						<img src="<?php echo base_url() ?>assets/img/<?php echo $row->bukti_pembayaran; ?>" width="150px" height="150px">
					<?php
					}
					if($row->status == 0){?>
						<button class="btn btn-primary btn-sm" id="UpPembayaran" data-id="<?php echo $row->id; ?>">Upload bukti pembayaran</button><?php 
					} 
				?>
			</td>
			<td><?php if($row->status == 0){
				echo "Belum melakukan pembayaran";
				} else if($row->status == 1){
				echo "Belum di Verifikasi"; 
				}                                       
				else if($row->status == 2) {
				echo "Sudah di Verifikasi";
				}?></td>
		</tr>
		
		<?php
		$no++;
			}?>

	<a data-toggle="modal" href="#modalAddZakat"><button type="button" class="btn btn-primary btn-sm">(+) Tambah</button></a>
	<a style="float:right;" href="../../c_zakat/print_user_zakat"><button type="button" class="btn btn-danger btn-sm">Download PDF</button></a>
	<br>

	<br>	

	

	</table>
	</div>
</div>
<center><?php 
		echo $this->pagination->create_links();
	    ?></center>
		

		<div class="modal fade" id="modalAddZakat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header text-center">
						<h4 class="modal-title w-100 font-weight-bold">Tambah Zakat</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="form-group">
						<label class="control-label col-lg-12 col-md-12 col-sm-12 col-xs-12">Nama Zakat :</label>
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<input type="text"  class="form-control" id="nama_zakat1" placeholder="Masukkan Nama Zakat" name="nama_zakat">
						</div>
						<label class="control-label col-lg-12 col-md-12 col-sm-12 col-xs-12">Nominal Gaji :</label>
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<input type="number"  class="form-control" id="nominal_gaji1" placeholder="Masukkan Gaji" name="nominal_gaji">
						</div>
					</div>
					<div class="modal-footer d-flex justify-content-center">
						<!-- <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#infoRek">Tambah</button> -->
						<input type="button" name="btn" value="Tambah" id="confBtn" data-toggle="modal" data-target="#infoRek" class="btn btn-primary" />
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="infoRek" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header text-center">
						<h4 class="modal-title w-100 font-weight-bold">Informasi Pembayaran</h4>
						<!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span> -->
						</button>
					</div>
					<div class="modal-header text-center">
						<p>Pembayaran Zakat bisa melalui No. Rekening : <b>8537 9348 3489</b></p>
					</div>
					<?php
					echo form_open_multipart('C_zakat/insert',array('class' => 'form-horizontal Edit')); 
					?>
						<input type="hidden"  class="form-control" id="nominal_gaji" name="nominal_gaji">
						<input type="hidden"  class="form-control" id="nama_zakat" name="nama_zakat">
						<div class="modal-footer d-flex justify-content-center">
							<button type="submit" class="btn btn-primary">Ok</button>
						</div>
					<?php
						echo form_close();
					?>	
				</div>
			</div>
		</div>

		<div class="modal fade" id="modalUpPembayaran" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header text-center">
						<h4 class="modal-title w-100 font-weight-bold">Upload Bukti Pembayaran</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php
						echo form_open_multipart('C_zakat/upload_bukti_pembayaran',array('class' => 'form-horizontal Edit')); 
						?>
					<div class="form-group">
						<input type="hidden" class="form-control" id="ids" name="ids">
						<label class="control-label col-lg-12 col-md-12 col-sm-12 col-xs-12">Bukti Pembayaran :</label>
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<input type='file' name="foto_bukti_pembayaran" id="upPembayaran" class="form-control"/>
						</div>
					</div>
					<div class="modal-footer d-flex justify-content-center">
						<button type="submit" class="btn btn-primary">Upload</button>
						<!-- <input type="button" name="btn" value="Tambah" id="confBtn" data-toggle="modal" data-target="#infoRek" class="btn btn-primary" /> -->
					</div>
					<?php
						echo form_close();
						?>	
			</div>
		</div>
		
<script>
	$('#confBtn').click(function() {
		$('#nominal_gaji').val($('#nominal_gaji1').val());
		$('#nama_zakat').val($('#nama_zakat1').val());
	});

	$('#UpPembayaran').click(function(){
    // $.ajax(
    // {
    //   url: '<?php //echo base_url('Product/get_by_id') ?>',
    //   type: 'POST',
    //   dataType: 'json',
    //   data: {id:$(this).data('id')},
    //   success: function(response)
    //   {
    //   	 //console.log("test");
    //      console.log(response);
    //        $('input[name="ids"]').val($(this).data('id'));
    //   }
    //  })
	$('input[name="ids"]').val($(this).data('id'));

    $('#modalUpPembayaran').modal('show');
  });
</script>
