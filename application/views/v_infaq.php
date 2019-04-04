<div>
	<br>
	<h1 style="font-size: 15px;">Selamat Datang, <?php echo $_SESSION['nama']; ?></h1>
	<hr class="my-2">
	<center>
		<br>
		<h3>
			Data Infaq
		</h3>
		<br>
	</center>
	<a data-toggle="modal" href="#modalAddZakat"><button type="button" class="btn btn-primary btn-sm">(+) Tambah</button></a>
	<br><br>

	<table class="table table-bordered table-striped">
		<tr style="font-size: 14px;">
			<th>ID</th>
			<th>Nominal Infaq</th>
			<th>Tanggal Input</th>
			<th>Tanggal Bayar</th>
			<th>Tanggal Verifikasi</th>
			<th>Bukti Pembayaran</th>
			<th>Status</th>
		</tr>
		<?php
			foreach ($list_infaq->result() as $row){
		?>
		<tr style="font-size: 12px;">
			<td><?php echo $row->id; ?></td>
			<td><?php echo $row->nominal_infaq; ?></td>
			<td><?php echo $row->tanggal_input; ?></td>
			<td><?php echo $row->tanggal_bayar; ?></td>
			<td><?php echo $row->tanggal_verifikasi; ?></td>
			<td>
				<?php 
					if($row->status != 0){?>
						<img src="<?php echo base_url() ?>image/<?php echo $row->bukti_pembayaran; ?>" width="150px" height="150px">
					<?php
					}
					if($row->status == 0){?>
						<button type="button" class="btn btn-primary btn-sm"><?php echo anchor('c_zakat/update/'.$row->username.'/'.$row->id,'Upload Bukti Pembayaran',array('class' => 'nav-link')) ?></button><?php 
					} 
				?>
			</td>
			<td><?php echo $row->status; ?></td>
		</tr>
		
		<?php
			}
		?>
	</table>

	<div class="modal fade" id="modalAddZakat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header text-center">
						<h4 class="modal-title w-100 font-weight-bold">Tambah Zakat</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php
	        		echo form_open_multipart('C_zakat/insert_infaq',array('class' => 'form-horizontal Edit')); ?>
					<div class="form-group">
						<label class="control-label col-lg-12 col-md-12 col-sm-12 col-xs-12">Nominal Infaq:</label>
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<input type="number"  class="form-control" id="nominal_infaq" placeholder="Masukkan Nominal Infaq" name="nominal_infaq">
						</div>
					</div>
					<div class="modal-footer d-flex justify-content-center">
						<button type="submit" class="btn btn-primary">Tambah</button>
					</div>
					<?php
						echo form_close();
					?>	
				</div>
			</div>
		</div>
</div>