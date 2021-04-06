<?php
require_once ($_SERVER['DOCUMENT_ROOT'].'/rzcell/config/database.php');

	$keyword = strval($_POST['query']);
	$search_param = "{$keyword}%";
	// $koneksi =new mysqli('localhost', 'root', '' , 'blog_samples');

	$sql = $koneksi->prepare("SELECT kd_brg,na_brg,satuan,h_beli FROM rz_brg WHERE kd_brg LIKE ?");
	$sql->bind_param("s",$search_param);			
	$sql->execute();
	$result = $sql->get_result();
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
		 $countryResult[] = $row["kd_brg"];
		

		}
		echo json_encode($countryResult);
		
	}
	$koneksi->close();
?>

