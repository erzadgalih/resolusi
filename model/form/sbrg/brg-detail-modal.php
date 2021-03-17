<?php  
include "../../../config/database.php";

if (isset($_POST["kd_brg"]))	{
	//1
	$output = '';
	$query = "SELECT * FROM rz_belid WHERE kd_brg = '".$_POST["kd_brg"]."' order by tgl";
	$result = mysqli_query($koneksi, $query);
	//pemanggilan array data
	$rz1 = mysqli_fetch_array($result);
	// var_dump($query);
	if(mysqli_num_rows($result) > 0) {
	$output .= '<h3 style="color:red;text-align:left;font-style:bold;">Kode : '.$rz1["kd_brg"].' </h3>
				<h4 style="color:red;text-align:left;font-style:bold;">Nama : '.$rz1["na_brg"].' </h4>
				<div class="table-responsive">
				<table class="table table-bordered" style="width:100%">
				<tr>
				<td style="width:14%"><label>No Bukti</label></td>
				<td style="width:10%"><label>Tanggal</label></td>
				<td style="width:10%"><label>Per</label></td>
				<td style="width:20%"><label>Jumlah</label></td>
				<td style="width:20%"><label>Harga Beli</label></td>
				<td style="width:20%"><label>Tanggal & jam</label></td>
				</tr>';
	while ($row = mysqli_fetch_array($result)) {
	$output .= '<tr>
	<td>'.$row["no_bukti"].'</td>
	<td>'.$row["tgl"].'</td>
	<td>'.$row["per"].'</td>
	<td>'.number_format($row["qty"],0,",",".").' '.$row["satuan"].'</td>
	<td>'.number_format($row["h_beli"],0,",",".").'</td>
	<td>'.$row["e_tgl"].'</td>
				</tr>';
				}
	$output .= '</table></div>';
	echo $output;
	} else {
	echo '<h3 style="color:red;text-align:center;font-style:italic;">Tidak ada Data</h3>';
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