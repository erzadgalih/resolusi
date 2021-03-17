<div class="table-responsive">
	<table class="table table-bordered">
		<tr>
			<th>No</th>
			<th>Kode Pelanggan</th>
			<th>Nama Pelanggan</th>
			<th>Alamat</th>
			<th>Kota</th>
			<th>Keterangan</th>
			
		</tr>
		<?php


		include ($_SERVER['DOCUMENT_ROOT'].'/rzcell/config/database.php');


		// $kode_divisi = $_SESSION['kode_divisi'];

		$page = (isset($_POST['page']))? $_POST['page'] : 1;
		$limit = 10; 
		$no = (($page - 1) * $limit) + 1; 


		$limit_start = ($page - 1) * $limit;

		if(isset($_POST['search']) && $_POST['search'] == true){  // posisi untuk pencarian
			$param = '%'.mysqli_real_escape_string($koneksi, $keyword).'%';

			$sql = mysqli_query($koneksi, "SELECT row_id,kd_cust,na_cust,alamat,kota,ket FROM rz_cust WHERE (kd_cust LIKE '".$param."' OR na_cust LIKE '".$param."' OR alamat LIKE '".$param."') ORDER BY kd_cust DESC LIMIT ".$limit_start.",".$limit);

			$sql2 = mysqli_query($koneksi, "SELECT COUNT(*) AS jumlah FROM rz_cust WHERE (kd_cust LIKE '".$param."' OR na_cust LIKE '".$param."' OR alamat LIKE '".$param."') ORDER BY kd_cust DESC LIMIT ".$limit_start.",".$limit);

			$get_jumlah = mysqli_fetch_array($sql2);
		} else {// posisi untuk tidak pencarian
			$sql = mysqli_query($koneksi, "SELECT *  FROM rz_cust ORDER BY kd_cust DESC LIMIT ".$limit_start.",".$limit);

			$sql2 = mysqli_query($koneksi, "SELECT COUNT(*) AS jumlah FROM rz_cust ORDER BY kd_cust DESC LIMIT ".$limit_start.",".$limit);
			$get_jumlah = mysqli_fetch_array($sql2);
		}

		while($data = mysqli_fetch_array($sql)){
			$row_id = $data['row_id'];
			$id2 = $data['row_id'];
			?>
			<tr id="<?php echo $data["row_id"]; ?>">
				<td><?php echo $no; ?></td>
				<td><?php echo $data['kd_cust']; ?></td>
				<td><?php echo $data['na_cust']; ?></td>
				<td><?php echo $data['alamat']; ?></td>
				<td><?php echo $data['kota']; ?></td>
				<td><?php echo $data['ket']; ?></td>
				<td>
					<a href="#" type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal<?php echo $data['row_id']; ?>">Ubah</a>
					<a href="#hapusModal_<?php echo $id2 ?>" type="button" data-toggle="modal" type="button" class="btn btn-danger btn-xs" data-toggle='tooltip' title="Hapus">Hapus</a>
				
				
				<!--  Modal Hapus -->
			<div id="hapusModal_<?php echo $id2 ?>" class="modal fade" data-backdrop="static" data-keyboard="false">
									  <div class="modal-dialog ">
									    <div class="modal-content">
									      <form role="form" method="post" action="">									        
									        <input type="hidden" name="data_id_r" value="<?php echo $id ?>">
									        <input type="hidden" name="data_id" value="<?php echo $id2 ?>">
									        
									        <div class="modal-header">
									          <button type="button" class="close" data-dismiss="modal">&times;</button>

									        </div>
									        <div class="modal-body">
									          <h3 style="text-align: center;"><p>Apakah anda yakin menghapus master pelanggan</p> <?php echo $data['na_cust'] ?> </h3>									          
									        </div>

									        <!-- /.box-body -->
									        <div class="modal-footer">
									          <button type="button" class="btn btn-default " data-dismiss="modal">Batal</button>
									          <button type="submit" name="hapus_data" class="btn btn-primary">Hapus</button>
									        </div>               
									      </form>         
									    </div>
									  </div>
			</div>

			<!-- MODAL EDIT -->
																		 
			<div class="modal fade" id="myModal<?php echo $data['row_id']; ?>" role="dialog">
              <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Update Master Pelanggan</h4>
                  </div>
                  <div class="modal-body">
                    <form role="form" action="" id="updatecus" method="POST">
                        <?php
                        $idd = $data['row_id']; 
						$query_edit = mysqli_query($koneksi, "SELECT * FROM rz_cust WHERE row_id='$idd'");
						
						//var_dump($query_edit);
						
                        while ($row2 = mysqli_fetch_array($query_edit)) {  
						//var_dump($row2);
                        ?>
                        <input type="hidden" name="row_id" value="<?php echo $row2['row_id']; ?>">
                        <input type="hidden" name="idd" value="<?php echo $row2['row_id']; ?>">
			
			
			<div class="row form-group">
			<label for="" class="col-sm-2 control-label">Nama Pelanggan</label>
			<div class="col-sm-5">
	                <input type="text" class="form-control" name="na_cust" id="" value="<?php echo($data['na_cust']) ?>" required >
	              </div>  


				  <label for="" class="col-sm-1 control-label">Kode</label>
			<div class="col-sm-2">
					<select class="form-control" name="kdrz" required  > 
						<option value="<?php echo($data['kdrz']) ?>"><?php echo($data['kdrz']) ?></option>
						<option value="">Pilih</option>
	              		<option value="TK">Toko</option>
	              		<option value="JS">Jasa</option>
						<option value="HP">HandPhone</option>
	              	</select>   
			</div>

			</div>
          
			<div class="row form-group">
			
			  <label class="col-sm-1 control-label">Alamat</label>
			  <div class="col-sm-5">
			 	<input type="text" class="form-control" name="alamat" value="<?php echo($data['alamat']) ?>" >
              </div>
			  
			  <label class="col-sm-1 control-label">Kota</label>
			  <div class="col-sm-3">
			  	<input type="textarea" class="form-control" name="kota" value="<?php echo($data['kota']) ?>" >
              </div>	

			</div>
			
			<div class="row form-group">
					
					<label class="col-sm-1 control-label">No HP</label>
				<div class="col-sm-3">
					<input type="textarea" class="form-control" name="no_hp" value="<?php echo($data['no_hp']) ?>" >
				</div>	

					<label class="col-sm-2 control-label">Tanggal Gabung</label>
				<div class="col-sm-2">
					<input type="text" class="form-control" name="tglgabung" value="<?php echo($data['tglgabung']) ?>" >												
                </div>
				
				
				
		     </div>
			
	
			 <div class="row form-group">
			 <label class="col-sm-1 control-label">Nominal Beli </label>
				<div class="col-sm-3">
					<input type="text" class="form-control" name="nombeli" value="<?php echo($data['nombeli']) ?>" >												
                </div>
			
					<label class="col-sm-1 control-label">Keterangan </label>
				<div class="col-sm-5">
					<input type="text" class="form-control" name="ket" value="<?php echo($data['ket']) ?>" >												
                </div>
			</div>
			
                        <div class="modal-footer">  
                          <button type="submit" name="updatecus" class="btn btn-success">Simpan</button>
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div><?php 
                        }
                        ?>        
                      </form>
                  </div>
                </div>
              </div>
            </div>

			<!-- BATAS -->

				</td>
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


<?php 

if(isset($_POST["hapus_data"])) {
	$data_id = $_POST['data_id'];
	//$no_bukti = $_POST['no_bukti'];
	//var_dump($no_bukti);
	$sqlNewData = "DELETE FROM rz_cust WHERE row_id = '$data_id' ";
	  $koneksi->query($sqlNewData);
	  //var_dump($sqlNewData);
	  header('Location: ' . $_SERVER['HTTP_REFERER']);
  }
   else if (isset($_POST["updatecus"])) {
				
				$idd= $_POST["idd"];
				$na_cust= $_POST["na_cust"];
				$kdrz= $_POST["kdrz"];
				$alamat= $_POST["alamat"];
				$kota= $_POST["kota"];
				$no_hp= $_POST["no_hp"];
				$tglgabung= $_POST["tglgabung"];
				$nombeli= $_POST["nombeli"];
				$ket= $_POST["ket"];
				$time = date('Y-m-d G:i:s');

				$query2 = "UPDATE rz_cust SET kdrz='$kdrz',na_cust='$na_cust',alamat='$alamat',kota='$kota',no_hp='$no_hp',tglgabung='$tglgabung',nombeli='$nombeli',ket='$ket',e_tgl='$time' WHERE row_id='$idd' ";
				$koneksi->query($query2);
				// var_dump($query2);
				
				header('Location: ' . $_SERVER['HTTP_REFERER']); 
				}

?>

