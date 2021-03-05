<div class="table-responsive">
	<table class="table table-bordered">
		<tr>
			<th>No</th>
			<th>Kode Supplier</th>
			<th>Nama Supplier</th>
			<th>Alamat</th>
			<th>Kota</th>
			<th>Telpon</th>
			<th>Kontak</th>
			<th>Catatab Pembayaran</th>
			<th>Keterangan</th>
		</tr>
		<?php
		include ($_SERVER['DOCUMENT_ROOT'].'/rzcell/config/database.php');

		$page = (isset($_POST['page']))? $_POST['page'] : 1;
		$limit = 10; 
		$no = (($page - 1) * $limit) + 1; 


		$limit_start = ($page - 1) * $limit;

		if(isset($_POST['search']) && $_POST['search'] == true){ 
			$param = '%'.mysqli_real_escape_string($koneksi, $keyword).'%';

			$sql = mysqli_query($koneksi, "SELECT row_id,kodes,namas,alamat,kota,telpon,contact,notbay,ket FROM rz_sup WHERE (kodes LIKE '".$param."' OR namas LIKE '".$param."' OR alamat LIKE '".$param."') ORDER BY kodes DESC LIMIT ".$limit_start.",".$limit);

			$sql2 = mysqli_query($koneksi, "SELECT COUNT(*) AS jumlah FROM rz_sup WHERE (kodes LIKE '".$param."' OR namas LIKE '".$param."' OR alamat LIKE '".$param."') ORDER BY kodes DESC LIMIT ".$limit_start.",".$limit);

			$get_jumlah = mysqli_fetch_array($sql2);
		} else {
			$sql = mysqli_query($koneksi, "SELECT row_id,kodes,namas,alamat,kota,telpon,contact,notbay,ket FROM rz_sup ORDER BY kodes DESC LIMIT ".$limit_start.",".$limit);

			$sql2 = mysqli_query($koneksi, "SELECT COUNT(*) AS jumlah FROM rz_sup ORDER BY kodes DESC LIMIT ".$limit_start.",".$limit);
			$get_jumlah = mysqli_fetch_array($sql2);
		}

		while($data = mysqli_fetch_array($sql)){
			$row_id = $data['row_id'];
			?>
			<tr id="<?php echo $data["row_id"]; ?>">
				<td><?php echo $no; ?></td>
				<td><?php echo $data['kodes']; ?></td>
				<td><?php echo $data['namas']; ?></td>
				<td><?php echo $data['alamat']; ?></td>
				<td><?php echo $data['kota']; ?></td>
				<td><?php echo $data['telpon']; ?></td>
				<td><?php echo $data['contact']; ?></td>
				<td><?php echo $data['notbay']; ?></td>
				<td><?php echo $data['ket']; ?></td>
				
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
					url:"model/form/historyVerifPO/ceo-detail-modal.php",
					method:"POST",
					data:{no_po:row_id},
					success:function(data){
						$('#DetailPO1').html(data);
						$('#dataModal1').modal('show');
						}
					});
			}
		});
</script>