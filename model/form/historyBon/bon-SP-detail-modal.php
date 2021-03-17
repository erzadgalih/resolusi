<?php  
include "../../../config/database.php";

if (isset($_POST["no_bukti"]))	{
	//1
	$output = '';
	$query = "SELECT * FROM bl_bond WHERE no_bukti = '".$_POST["no_bukti"]."' order by no_urut";
	$result = mysqli_query($koneksi, $query);
	//var_dump($query);
	if(mysqli_num_rows($result) > 0) {
	$output .= '<h3 style="color:blue;text-align:center;font-style:italic;">&nbsp;</h3>
				<div class="table-responsive">
				<table class="table table-bordered" style="width:100%">
				<tr>
				<td style="width:20%"><label>Nama Barang</label></td>
				<td style="width:20%"><label>Ket Barang</label></td>
				<td style="width:16%"><label>Qty</label></td>
				<td style="width:20%"><label>Keterangan</label></td>
				<td style="width:16%"><label>Diterima Sparepart</label></td>
				</tr>';
	while ($row = mysqli_fetch_array($result)) {
	$output .= '<tr>
				<td>'.$row["nm_brg"].'</td>
				<td>'.$row["notes"].'</td>
				<td>'.number_format($row["qty"],0,",",".").' '.$row["satuan"].'</td>
				<td>'.$row["ket"].'</td>
				<td>
				<div class="checkbox">
				<label><input type="checkbox" class="preference" value="'.$row["ok"].'" data-value="size1" id="datasize1" onclick="return false;"></label>
				</div>
				</td>
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