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
	<h1 style="font-size: 16px;">Data Profil</h1>
	<hr class="my-2"><br><br>
	<table style="font-size:16px;">
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
         <a href="../c_zakat/edit_profil_user"><button type="button" class="btn btn-primary btn-sm">Edit Profil</button></a>
	
            <br><br>

	

	
	</div>
</div>

