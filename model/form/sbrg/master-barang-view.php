<div class="table-responsive">
	<table class="table table-bordered">
		<tr>
			<th>No</th>
			<th>Kode Barang</th>
			<th>Nama Barang</th>
			<th>Jenis</th>
			<th>Satuan</th>
			<th>Harga Beli</th>
			<th>Harga Jual</th>
		</tr>
		<?php
		include ($_SERVER['DOCUMENT_ROOT'].'/rzcell/config/database.php');

		$page = (isset($_POST['page']))? $_POST['page'] : 1;
		$limit = 10; 
		$no = (($page - 1) * $limit) + 1; 


		$limit_start = ($page - 1) * $limit;

		if(isset($_POST['search']) && $_POST['search'] == true){ 
			$param = '%'.mysqli_real_escape_string($koneksi, $keyword).'%';

			$sql = mysqli_query($koneksi, "SELECT row_id,kd_brg,na_brg,jenis,satuan,h_jual,h_beli FROM rz_brg where kdrz='TK' AND (kd_brg LIKE '".$param."' OR na_brg LIKE '".$param."' OR jenis LIKE '".$param."') ORDER BY na_brg DESC LIMIT ".$limit_start.",".$limit);

			$sql2 = mysqli_query($koneksi, "SELECT COUNT(*) AS jumlah FROM rz_brg where kdrz='TK' AND (kd_brg LIKE '".$param."' OR na_brg LIKE '".$param."' OR jenis LIKE '".$param."') ORDER BY na_brg DESC LIMIT ".$limit_start.",".$limit);
			$get_jumlah = mysqli_fetch_array($sql2);
		} else {
			$sql = mysqli_query($koneksi, "SELECT row_id,kd_brg,na_brg,jenis,satuan,h_jual,h_beli FROM rz_brg where kdrz='TK' ORDER BY na_brg DESC LIMIT ".$limit_start.",".$limit);

			$sql2 = mysqli_query($koneksi, "SELECT COUNT(*) AS jumlah FROM rz_brg where kdrz='TK' ORDER BY na_brg DESC ");
			$get_jumlah = mysqli_fetch_array($sql2);
			// var_dump($get_jumlah);
		}

		while($data = mysqli_fetch_array($sql)){
			$row_id = $data['row_id'];
			?>
			<tr id="<?php echo $data["row_id"]; ?>">
				<td><?php echo $no; ?></td>
				<td>
				<input type="button" name="view1" value="<?php echo $data["kd_brg"]; ?>" id="<?php echo $data["kd_brg"]; ?>" class="btn btn-info btn-block view_data1" />
						<!-- modal detail-->
						<div id="dataModal1" class="modal fade">
							<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title" style="color:blue;text-align:center;font-style:bold;">Detail Rekap Order</h4>
										</div>
										<div class="modal-body" id="DetailPO1">
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										</div>
									</div>
							</div>
						</div> 
						<!-- modal detail -->
				</td>
				<td><?php echo $data['na_brg']; ?></td>
				<td><?php echo $data['jenis']; ?></td>
				<td><?php echo $data['satuan']; ?></td>
				<td><?php echo number_format($data["h_beli"],0,",","."); ?></td>
				<td><?php echo number_format($data["h_jual"],0,",","."); ?></td>
			</tr>
			<?php
			$no++;
		}
		?>
	</table>
</div>

<?php
$count = mysqli_num_rows($sql);
if($count > 0){ 
?>

	<ul class="pagination">
		<?php
		if($page == 1){
		?>
			<li class="disabled"><a href="#">Awal</a></li>
			<li class="disabled"><a href="#">&laquo;</a></li>
		<?php
		}else{ 
			$link_prev = ($page > 1)? $page - 1 : 1;
		?>
			<li><a href="javascript:void(0);" onclick="searchWithPagination(1, false)">Awal</a></li>
			<li><a href="javascript:void(0);" onclick="searchWithPagination(<?php echo $link_prev; ?>, false)">&laquo;</a></li>
		<?php
		}
		?>

		<!-- LINK NUMBER -->
		<?php
		$jumlah_page = ceil($get_jumlah['jumlah'] / $limit);

		// $jumlah_page = ceil($get_jumlah['jumlah'] / $limit);


		// function toFloats($array)
		// {
		// 	return array_map('floatval', $array);
		// }
		
		// $data = array_map('toFloats', $get_jumlah['jumlah']);
		// var_dump($data);
		// $jumlah_page = isset($get_jumlah['jumlah']) ? ceil($get_jumlah['jumlah']) : 0;
		// $get_jumlah = array_map('intval', explode(',', $get_jumlah['jumlah']));

		// $jumlah_page = isset($get_jumlah['jumlah']) ? ceil($get_jumlah['jumlah']) : 0;
		
		// $len = $cOTLdata['char_data'] === null ? 0 : count($cOTLdata['char_data']);
		// $len = isset($cOTLdata['char_data']) ? count($cOTLdata['char_data']) : 0;




		echo "<br>jumlah page";
		var_dump($jumlah_page);
		echo "<br>get jumlah";
		var_dump($get_jumlah);
		echo "<br>limit";
		var_dump($limit);
		echo "<br>";

		$jumlah_number = 3;
		$start_number = ($page > $jumlah_number)? $page - $jumlah_number : 1;
		$end_number = ($page < ($jumlah_page - $jumlah_number))? $page + $jumlah_number : $jumlah_page;

		for($i = $start_number; $i <= $end_number; $i++){
			$link_active = ($page == $i)? ' class="active"' : '';
		?>
			<li<?php echo $link_active; ?>><a href="javascript:void(0);" onclick="searchWithPagination(<?php echo $i; ?>, false)"><?php echo $i; ?></a></li>
		<?php
		}
		?>

		<!-- LINK NEXT AND LAST -->
		<?php

		if($page == $jumlah_page){ 
		?>
			<li class="disabled"><a href="#">&raquo;</a></li>
			<li class="disabled"><a href="#">Akhir</a></li>
		<?php
		}else{
			$link_next = ($page < $jumlah_page)? $page + 1 : $jumlah_page;
		?>
			<li><a href="javascript:void(0);" onclick="searchWithPagination(<?php echo $link_next; ?>, false)">&raquo;</a></li>
			<li><a href="javascript:void(0);" onclick="searchWithPagination(<?php echo $jumlah_page; ?>, false)">Akhir</a></li>
		<?php
		}
		?>
	</ul>
	<?php
}
?>




<script type="text/javascript">
		$(document).on('click', '.view_data1', function(){
		var row_id = $(this).attr("id");
			if(row_id != '')
			{
				$.ajax({
					url:"model/form/historyVerifOrder/ceo-detail-order-repack-modal.php",
					method:"POST",
					data:{no_bukti:row_id},
					success:function(data){
						$('#DetailPO1').html(data);
						$('#dataModal1').modal('show');
						}
					});
			}
		});
</script>