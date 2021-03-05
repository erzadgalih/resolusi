<?php  
include "../../../config/database.php";

if (isset($_POST["no_bukti"]))	{
	//1
	$output = '';
	$query = "SELECT row_id, id, no_bukti, rec, artikel, size, warna, jml, ket FROM mr_ord_repackd WHERE no_bukti = '".$_POST["no_bukti"]."' order by rec";
	$result = mysqli_query($koneksi, $query);
	//var_dump($query);
	if(mysqli_num_rows($result) > 0) {
	$output .= '<h3 style="color:blue;text-align:center;font-style:italic;">&nbsp;</h3>
				<div class="table-responsive">
				<table class="table table-bordered" style="width:100%">
				<tr>
				<td style="width:20%"><label>Artikel</label></td>
				<td style="width:16%"><label>Warna</label></td>
				<td style="width:16%"><label>Size</label></td>
				<td style="width:16%"><label>Jumlah</label></td>
				<td style="width:16%"><label>Keterangan</label></td>
				</tr>';
	while ($row = mysqli_fetch_array($result)) {
	$output .= '<tr>
				<td>'.$row["artikel"].'</td>
				<td>'.$row["size"].'</td>
				<td>'.$row["warna"].'</td>
				<td>'.number_format($row["jml"],0,",",".").'</td>
				<td>'.$row["ket"].'</td>
				</tr>';
				}
	$output .= '</table></div>';
	echo $output;
	} else {
	echo '<h3 style="color:red;text-align:center;font-style:italic;">Tidak ada Data</h3>';
	}

}
?>