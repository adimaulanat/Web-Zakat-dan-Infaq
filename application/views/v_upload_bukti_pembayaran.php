<?php 
$vusername = $this->uri->segment(3);
$vid = $this->uri->segment(4);
echo form_open_multipart('C_zakat/upload_bukti_pembayaran',array('class' => 'form-horizontal Edit')); ?>
	<div class="form-group">
		<label class="control-label col-lg-1 col-md-12 col-sm-12 col-xs-12">Username:</label>
		<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
			<input type="text" class="form-control" id="username" name="username" value="<?php echo $vusername ?>" readonly="true">
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-lg-1 col-md-12 col-sm-12 col-xs-12">ID:</label>
		<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
			<input type="number" class="form-control" id="id" name="id" value="<?php echo $vid ?>" readonly="true">
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-lg-1 col-md-12 col-sm-12 col-xs-12">Image:</label>
		<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
			<input type="file" class="form-control" id="foto" placeholder="Enter Image" name="foto">
		</div>
	</div>
	<div class="form-group">        
		<div class="col-sm-3">
			<button type="submit" class="btn btn-primary">SIMPAN</button>
		</div>
	</div>
<?php echo form_close()?>