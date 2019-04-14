<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<title>Profil</title>

<div class="row berita-content" style="background:white; padding:30px;">
    
        <div class="berita-text">
            <p><b>
			Data Profil
	</b>	</p>
    <hr class="my-2">
           <table style="font-size:14px;">
		<tr>
			<td>Nama Lengkap</td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td><?php echo $profil->nama;?></td>
		</tr>
        <tr>
			<td>E-mail</td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td>fajarpancasaputra@gmail.com</td>
		</tr>
        <tr>
			<td>Username</td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td><?php echo $profil->username;?></td>
		</tr>
        </table>
        <br>
         <a data-toggle="modal" href="#editProfil"><button type="button" class="btn btn-primary btn-sm">Edit Profil</button></a>
	
            <br><br>
        </div>
        <div class="modal fade" id="editProfil" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header text-center">
						<h4 class="modal-title w-100 font-weight-bold">Daftar</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php
        		echo form_open_multipart('c_akun/editProfil');
    			?>
					<div class="modal-body mx-3">
							<label>Nama</label>
							<input required="true" type="text" name="nama" value="<?php $profil->nama ?>" class="form-control">
							<label>E-mail</label>
							<input disabled required="true" type="text" name="email" class="form-control">
							<label>Username</label>
							<input disabled required="true" type="text" name="username" class="form-control">
							<label>Password</label>
							<input required="true" type="password" name="password" class="form-control">
					</div>
					<div class="modal-footer d-flex justify-content-center">
						<button type="submit" class="btn btn-primary">Edit Profil</button>
					</div>
					<?php
						echo form_close();
					?>	
				</div>
			</div>
		</div>
</div>