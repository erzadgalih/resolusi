<?php  
include "../../../config/database.php";

if (isset($_POST["kodes"]))	{
	//1
	$output = '';
	$query = "SELECT * FROM rz_sup WHERE kodes = '".$_POST["kodes"]."' order by kodes";
	$result = mysqli_query($koneksi, $query);
	//pemanggilan array data
	$rz1 = mysqli_fetch_array($result);
	// var_dump($query);
	if(mysqli_num_rows($result) > 0) {
	$output .= '<h3 style="color:red;text-align:left;font-style:bold;">Kode   : '.$rz1["kodes"].' </h3>
				<h4 style="color:red;text-align:left;font-style:bold;">Nama   : '.$rz1["namas"].' </h4>
				<h4 style="color:black;text-align:left;font-style:bold;">Bagian : '.$rz1["kdrz"].' </h4>
				<h4 style="color:black;text-align:left;font-style:bold;">Alamat : '.$rz1["alamat"].' </h4>
				<h4 style="color:black;text-align:left;font-style:bold;">Kota   : '.$rz1["kota"].' </h4>
				<h4 style="color:black;text-align:left;font-style:bold;">Telpon : '.$rz1["telpon"].' </h4>
				<h4 style="color:black;text-align:left;font-style:bold;">Ket    : '.$rz1["ket"].' </h4>
				<h4 style="color:black;text-align:left;font-style:bold;">Tanggal: '.$rz1["e_tgl"].' </h4>

				';
	while ($row = mysqli_fetch_array($result)) {
	$output .= '<tr>
	<td>'.$row["alamat"].'</td>
	<td>'.$row["kota"].'</td>
	<td>'.$row["telpon"].'</td>
	<td>'.$row["contact"].'</td>
	<td>'.$row["ket"].'</td>
	<td>'.$row["e_tgl"].'</td>
				</tr>';
				}
	$output .= '</table></div>';
	echo $output;
	} else {
	echo '<h3 style="color:red;text-align:center;font-style:italic;">Tidak ada Detail</h3>';
	}

}
?>


<script type="text/javascript">
$(function(){
$('.preference').each(function(e){
	if($(this).val() == 1){
		$(this).attr("checked", "checked");
	}
});
});
</script>