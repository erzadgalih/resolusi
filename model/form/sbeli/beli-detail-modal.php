<?php  
include "../../../config/database.php";

if (isset($_POST["no_bukti"]))	{
	//1
	$output = '';
	// $query2 = "SELECT * FROM rz_beli WHERE no_bukti = '".$_POST["no_bukti"]."'";
	// $result2 = mysqli_query($koneksi, $query2);
	// //pemanggilan array data
	// $rz2 = mysqli_fetch_array($result2);
	// var_dump($query);

	$query = "SELECT * FROM rz_belid WHERE no_bukti = '".$_POST["no_bukti"]."' order by rec";
	$result = mysqli_query($koneksi, $query);
	//pemanggilan array data
	$rz1 = mysqli_fetch_array($result);
	// var_dump($query);

	if(mysqli_num_rows($result) > 0) {
	$output .= '<h4 style="color:black;text-align:left;font-style:bold;">No Bukti : '.$rz2["no_bukti"].' </h4>
				<h4 style="color:black;text-align:left;font-style:bold;">Tanggal  : '.$rz2["tgl"].' </h4>
				<h4 style="color:black;text-align:left;font-style:bold;">Supplier : '.$rz2["namas"].' </h4>
				<h4 style="color:red;text-align:left;font-style:bold;">Total    : Rp. '.number_format($rz2["nett"],0,",",".").' </h4>

				<div class="table-responsive">
				<table class="table table-bordered" style="width:100%">
				<tr>
				<td style="width:3%"><label>No</label></td>
				<td style="width:10%"><label>Kode Barang</label></td>
				<td style="width:30%"><label>Nama Barang</label></td>
				<td style="width:10%"><label>Jumlah</label></td>
				<td style="width:10%"><label>Harga Beli</label></td>
				<td style="width:10%"><label>Total</label></td>
				</tr>';
	while ($row = mysqli_fetch_array($result)) {
	$output .= '<tr>
	<td>'.$row["rec"].'</td>
	<td>'.$row["kd_brg"].'</td>
	<td>'.$row["na_brg"].'</td>
	<td>'.number_format($row["qty"],0,",",".").' '.$row["satuan"].'</td>
	<td>'.number_format($row["h_beli"],0,",",".").'</td>
	<td>'.number_format($row["total"],0,",",".").'</td>
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