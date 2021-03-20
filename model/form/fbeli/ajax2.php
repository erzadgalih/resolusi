<?php
include "../../../config/database.php"; 
$zad = mysqli_fetch_array(mysqli_query($koneksi, "select * from rz_sup where namas='$_GET[txtCountry]'"));
$zad2 = array( 'kodes'    		=>  $zad['kodes'],
			   'alamat'    		=>  $zad['alamat'],
               'kota'    		=>  $zad['kota'],);
 echo json_encode($zad2);
