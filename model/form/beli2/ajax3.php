<?php
include "../../../config/database.php"; 
$zad = mysqli_fetch_array(mysqli_query($koneksi, "select * from rz_brg where na_brg='$_GET[na_brg]'"));
$zad2 = array( 'kd_brg'    		=>  $zad['kd_brg'],
			   'satuan'    		=>  $zad['satuan'],
               'h_beli'    		=>  $zad['h_beli'],);
 echo json_encode($zad2);
