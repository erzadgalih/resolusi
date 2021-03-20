
<!--------------------------------- ISI KOLOM DARI NAMAS------------------------------------------------------------------->
<?php
require_once ($_SERVER['DOCUMENT_ROOT'].'/rzcell/config/database.php');

	$keyword = strval($_POST['query']);
	$search_param = "{$keyword}%";
	// $koneksi =new mysqli('localhost', 'root', '' , 'blog_samples');

	$sql = $koneksi->prepare("SELECT namas,kodes,alamat,kota FROM rz_sup WHERE namas LIKE ?");
	$sql->bind_param("s",$search_param);			
	$sql->execute();
	$result = $sql->get_result();
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
		 $countryResult[] = $row["namas"];
		

		}
		echo json_encode($countryResult);
		
	}
	$koneksi->close();
?>
