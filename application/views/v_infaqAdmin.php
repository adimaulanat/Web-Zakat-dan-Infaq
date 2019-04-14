<?php function rupiah($angka){
        
        $hasil_rupiah = "Rp. " . number_format($angka,2,',','.');
        return $hasil_rupiah;
        
        } ?>
        <br>
        <h1 style="font-size: 18px;">Data Infaq</h1>
        <hr class="my-2">
        
        <table class="table table-bordered table-striped">
          <tr style="font-size: 14px;">
            <th>No</th>
            <th>Nominal Infaq</th>
            <th>Tanggal Input</th>
            <th>Tanggal Bayar</th>
            <th>Tanggal Verifikasi</th>
            <th>Bukti Pembayaran</th>
            <th>Status</th>
            <th>Verifikasi</th>
          </tr>
          <?php
            $no = 1;
            foreach ($admin as $row){
          ?>
          <tr style="font-size: 12px;">
            <?php $page = $_SESSION['page'] + $no; ?>
            <td><?php echo $page; ?></td>
            <td><?php echo rupiah($row->nominal_infaq); ?></td>
            <td><?php echo $row->tanggal_input; ?></td>
            <td><?php echo $row->tanggal_bayar; ?></td>
            <td><?php echo $row->tanggal_verifikasi; ?></td>
            <td><?php 
              if($row->status != 0){?>
                <img src="<?php echo base_url() ?>assets/img/<?php echo $row->bukti_pembayaran; ?>" width="150px" height="150px">
              <?php
              }
              if($row->status == 0){
                echo "Belum melakukan pembayaran";
              } 
            ?></td>
            <td><?php if($row->status == 0){
            echo "Belum melakukan pembayaran";
            } else if($row->status == 1){
            echo "Belum di Verifikasi"; 
            }                                       
            else if($row->status == 2) {
            echo "Sudah di Verifikasi";
            }?></td>
            <td><?php if($row->status == 0){
              echo "Belum melakukan pembayaran";
            } else if($row->status == 1){ ?>
              <button class="btn btn-primary btn-sm" type="button"><?php echo anchor('c_zakat/verifikasi_infaq/'.$row->id,'Verifikasi',array('class' => 'nav-link'))?></button>
            <?php } else if($row->status == 2) {
              echo "Sudah di Verifikasi";
            }?></td>
          </tr>
          
          <?php
          $no++;
        }
      
        ?>
  </table>       

<center><?php 
echo $this->pagination->create_links();
?></center>