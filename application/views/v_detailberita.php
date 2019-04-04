<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<title>Home</title><br><br>

<div class="row berita-content">
    <div class="berita-content-isi">
        <div class="berita-text">
            <h3><?php echo $detail->judul; ?></h3>
            <hr class="my-2">
            <img style="margin-right: 20px;" src="<?php echo base_url().'assets/img/'.$detail->gambar;?>"width="500" align="left">
            <p style="text-align: justify; font-size: 14px;"><?php 
            echo ($detail->isi);
            ?></p>
            <?php echo anchor('c_home/index','<< kembali'); ?></p>
            <br><br>
        </div>
    </div>  
</div>