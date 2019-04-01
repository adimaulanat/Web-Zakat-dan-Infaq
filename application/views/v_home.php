<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<title>Home</title><br><br>
<?php
    foreach ($artikel->result() as $row) {
?>
<div class="row berita-content">
    <div class="berita-content-isi">
        <div class="berita-text">
            <h3><?php echo $row->judul; ?></h3>
            <hr class="my-2">
            <p style="text-align: justify; font-size: 14px;"><?php 
                    // $string = strip_tags
            echo ($row->isi);
                    // if (strlen($string) > 810) {

                    //     // truncate string
                    //     $stringCut = substr($string, 0, 810);
                    //     $endPoint = strrpos($stringCut, ' ');

                    //     //if the string doesn't contain any space then it will cut without word basis.
                    //     $string = $endPoint? substr($stringCut, 0, $endPoint):substr($stringCut, 0);
                    //     $string .= '...';
                    // }
                    // echo $string;
                ?>
            </p>
            <br><br>
        </div>
    </div>  
</div>
<?php
    }
?>