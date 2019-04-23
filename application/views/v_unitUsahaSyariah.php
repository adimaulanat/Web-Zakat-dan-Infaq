<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<title>Unit Usaha Syariah</title><br><br>

<div class="unit-title">
    <h1>Unit Usaha Syariah</h1>
</div>
<br>
<?php
    foreach ($unit->result() as $row) {
?>
<div class="row unit-content">
    <div class="foto-unit col-md-3">
        <img src="<?php echo base_url().'assets/img/unitUsahaSyariah/'.$row->foto;?>">
    </div>
    <div class="unit-content-isi col-md-9">
        <div class="berita-text">
            <h3><?php echo $row->nama; ?></h3>
            <br>
            <p>Alamat : <?php echo $row->lokasi; ?></p>
            <p>Produk : <?php echo $row->produk; ?></p>
        </div>
    </div>  
</div>
<br>
<?php
    }
?>