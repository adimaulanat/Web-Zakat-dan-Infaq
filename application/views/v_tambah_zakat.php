<?php 
$vusername = $this->uri->segment(3);
echo form_open_multipart('C_zakat/insert',array('class' => 'form-horizontal Edit')); ?>
	<div class="form-group">
		<label class="control-label col-lg-1 col-md-12 col-sm-12 col-xs-12">Username:</label>
		<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
			<input type="text" class="form-control" id="username" name="username" value="<?php echo $vusername ?>" readonly="true">
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-lg-1 col-md-12 col-sm-12 col-xs-12">Nominal Gaji:</label>
		<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
			<input type="number"  class="form-control" id="nominal_gaji" placeholder="Masukkan Gaji" name="nominal_gaji">
		</div>
	</div>
	<div class="form-group">        
		<div class="col-sm-3">
			<button type="submit" class="btn btn-primary">SIMPAN</button>
		</div>
	</div>
<?php echo form_close()?>