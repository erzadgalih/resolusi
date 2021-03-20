<?php  
include "../../../config/database.php";

if (isset($_POST["no_bukti"]))	{
	//1
	$view = $koneksi->query("SELECT * FROM rz_beli WHERE no_bukti = '".$_POST["no_bukti"]."'");

	if($view->num_rows){
		//fetch data ke dalam veriabel $row_view
		$row_view = $view->fetch_assoc();
		//menampilkan data dengan table
		echo '
		<div class="table-responsive">
		<table class="table table-bordered">
			<tr>
				<th>No Bukti </th>
				<td>'.$row_view['no_bukti'].'</td>
			</tr>
			<tr>
				<th>Tanggal </th>
				<td>'.$row_view['tgl'].'</td>
			</tr>
			<tr>
				<th>Supplier </th>
				<td>'.$row_view['namas'].'</td>
			</tr>
			<tr>
				<th>Total </th>
				<td>'.number_format($row_view["nett"],0,",",".").'</td>
			</tr>
		</table></div>
		';
	}


	$output = '';
	$query = "SELECT * FROM rz_belid WHERE no_bukti = '".$_POST["no_bukti"]."' order by rec";
	$result = mysqli_query($koneksi, $query);
	//var_dump($query);
	if(mysqli_num_rows($result) > 0) {
		$output .= '<div class="table-responsive">
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