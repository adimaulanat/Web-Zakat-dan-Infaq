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
			<td><?php echo $profil->email;?></td>
		</tr>
        <tr>
			<td>Username</td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td><?php echo $profil->username;?></td>
		</tr>
        </table>
        <br>
         <a href="../c_zakat/edit_profil"><button type="button" class="btn btn-primary btn-sm">Edit Profil</button></a>
	
            <br><br>
        </div>
        
</div>