<?php
include "../../../config/database.php";  // Load file koneksi.php

$no_kik = $_POST['no_kik']; // Ambil data NIS yang dikirim lewat AJAX

$query = mysqli_query($koneksi, "SELECT no_kik,model,warna,GROUP_CONCAT(na_kom ORDER BY na_kom DESC SEPARATOR ',') AS xxx, GROUP_CONCAT(na_bhn ORDER BY na_bhn DESC SEPARATOR ',') AS yyy FROM qc_kik WHERE no_kik='".$no_kik."'"); // Tampilkan data siswa dengan NIS tersebut
$row = mysqli_num_rows($query); // Hitung ada berapa data dari hasil eksekusi $query

if($row > 0){ // Jika data lebih dari 0
	$data = mysqli_fetch_array($query); // ambil data siswa tersebut
	
	// BUat sebuah array
	$callback = array(
		'status' => 'success', // Set array status dengan success
		'model' => $data['model'], // Set array nama dengan isi kolom nama pada tabel siswa
		'warna' => $data['warna'], // Set array jenis_kelamin dengan isi kolom jenis_kelamin pada tabel siswa
		'na_kom' => $data['xxx'], // Set array jenis_kelamin dengan isi kolom telp pada tabel siswa
		'na_bhn' => $data['yyy'], // Set array jenis_kelamin dengan isi kolom telp pada tabel siswa
	);
}else{
	$callback = array('status' => 'failed'); // set array status dengan failed
}

echo json_encode($callback); // konversi varibael $callback menjadi JSON
?>
