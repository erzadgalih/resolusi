<?php
include "../../../config/database.php"; 
$karyawan = mysqli_fetch_array(mysqli_query($koneksi, "select * from qc_bag where karakter='$_GET[karakter]'"));
$data_karyawan = array( 'kd_line'    		=>  $karyawan['kd_line'],
						'kode'    		=>  $karyawan['kode'],);
 echo json_encode($data_karyawan);
