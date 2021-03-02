<?php
ob_start();
session_start();

// if(!isset($_SESSION['login']) == true) header("location: login");
include "config/database.php";

if (isset($_POST['login'])){
	$username = $_REQUEST['username'];
	$password = $_REQUEST['password'];
	$username = stripslashes($_REQUEST['username']);
	$username = mysqli_real_escape_string($koneksi,$username);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($koneksi,$password);
	$query=mysqli_query($koneksi,"SELECT * FROM users_web WHERE username='$username' && password='".md5($password)."'");
	$num_rows=mysqli_num_rows($query);
	$row=mysqli_fetch_array($query, MYSQLI_ASSOC);
	if (mysqli_num_rows($query) === 1 ){
		$_SESSION['login'] = true;
		$_SESSION['username'] = $username;
		$_SESSION['nama'] = $row['nama'];
		$_SESSION['level'] = $row['level'];
		$_SESSION['sub_level'] = $row['sub_level'];
		$_SESSION['keterangan_level'] = $row['keterangan_level'];
		$_SESSION['tandatangan'] = $row['tandatangan'];

		$_SESSION['kode_divisi'] = $row['kode_divisi'];
		$_SESSION['nama_divisi'] = $row['nama_divisi'];
		$_SESSION['kode_bagian_'] = $row['kode_bagian_'];
		$_SESSION['flag'] = $row['flag'];
		$_SESSION['gambar_profil'] = $row['gambar_profil'];

		header('location:index.php?hal=dashboard-level-'.$_SESSION['level']);
		// if ($_SESSION['level'] === '1') {
		// 	header('location:index.php?hal=dashboard-level-1');
		// } else if ($_SESSION['level'] === '2'){
		// 	header('location:index.php?hal=dashboard-level-2');
		// } else if ($_SESSION['level'] === '3'){
		// 	header('location:index.php?hal=dashboard-level-3');
		// } else if ($_SESSION['level'] === '4'){
		// 	header('location:index.php?hal=dashboard-level-4');
		// } else if ($_SESSION['level'] >= '5'){
		// 	header('location:index.php?hal=dashboard-level-'.$_SESSION['level']);
		// }

	$sqlNewData = "UPDATE users_web SET login_terakhir=now() WHERE username = '$username' ";
	$koneksi->query($sqlNewData);

	}
	else{
	session_destroy();
	header('location:login');
	}
}

?>
<?php
mysqli_close($koneksi);
ob_end_flush();
?>
