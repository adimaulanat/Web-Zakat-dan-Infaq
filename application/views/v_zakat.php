<div>			
	<center>
		<h3>
			Data Zakat
		</h3>
	</center>

	<table class="table table-bordered table-striped">
		<tr>
			<th>ID</th>
			<th>Nominal Gaji</th>
			<th>Nominal Zakat</th>
			<th>Tanggal Input</th>
			<th>Tanggal Bayar</th>
			<th>Tanggal Verifikasi</th>
			<th>Bukti Pembayaran</th>
			<th>Status</th>
		</tr>
		<?php
			foreach ($list_zakat->result() as $row){
		?>
		<tr>
			<td><?php echo $row->id; ?></td>
			<td><?php echo $row->nominal_gaji; ?></td>
			<td><?php echo $row->nominal_zakat; ?></td>
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
	<button type="button" class="btn btn-primary btn-sm"><?php echo anchor('c_zakat/add/'.$row->username,'Tambah',array('class' => 'nav-link')) ?></button>
	</div>
</div>