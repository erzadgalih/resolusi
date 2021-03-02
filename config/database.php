<?php
	global $koneksi;
	$nameserver		= "localhost";
		// $username		= "ol_prog";
		// $password		= "dr460n";
	$username		= "root";
	$password		= "";
	$namadb			= "intidragon_db";
	$koneksi = mysqli_connect($nameserver,$username,$password,$namadb);
		if(!$koneksi) {
			die(header('Location: /verifikasi/error/offline.php'));
			// die("Koneksi Gagal".mysqli_connect_error());
	}
?>