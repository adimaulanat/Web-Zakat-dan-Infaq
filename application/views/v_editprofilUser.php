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
        <?php echo form_open("c_zakat/edit_profil_to_db_user"); ?>
      <table cellpadding="8">
        <tr>
          <td>Nama Lengkap</td>
          <td><input type="text" class="form-control" name="nama" value="<?php echo set_value('nama', $profil->nama); ?>" ></td>
        </tr>
        <tr>
          <td>E-mail</td>
          <td><input disabled class="form-control" type="text" value="<?php echo set_value('email', $profil->email); ?>"></td>
        </tr>
          <td>Username</td>
          <td><input disabled type="text" class="form-control" name="user" value="<?php echo set_value('user', $profil->username); ?>"></td>
        </tr>
        <tr>
          <td>Password</td>
          <td><input type="text" placeholder="password" class="form-control" name="password"></td>
        </tr>
      </table>
        
      <hr>
      <button type="submit" class="btn btn-primary">Simpan</button>
      <a href="../c_zakat/disprofilUser"><input type="button" class="btn btn-danger" value="Batal"></a>
    <?php echo form_close(); ?>
        </div>
        
</div>
