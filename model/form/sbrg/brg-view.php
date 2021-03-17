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
			<th>Aksi</th>
			
		</tr>
		<?php


		include ($_SERVER['DOCUMENT_ROOT'].'/rzcell/config/database.php');
		$periode = $_SESSION['periode'];

		// $kode_divisi = $_SESSION['kode_divisi'];

		$page = (isset($_POST['page']))? $_POST['page'] : 1;
		$limit = 10; 
		$no = (($page - 1) * $limit) + 1; 


		$limit_start = ($page - 1) * $limit;

		if(isset($_POST['search']) && $_POST['search'] == true){ 
			$param = '%'.mysqli_real_escape_string($koneksi, $keyword).'%';



				$sql = mysqli_query($koneksi, "SELECT * FROM rz_brg  WHERE (kd_brg LIKE '".$param."' OR na_brg LIKE '".$param."' OR jenis LIKE '".$param."' OR satuan LIKE '".$param."') ORDER BY kd_brg DESC LIMIT ".$limit_start.",".$limit);

				$sql2 = mysqli_query($koneksi, "SELECT COUNT(*) AS jumlah FROM rz_brg WHERE (kd_brg LIKE '".$param."' OR na_brg LIKE '".$param."' OR jenis LIKE '".$param."' OR satuan LIKE '".$param."') ORDER BY kd_brg DESC ");
				$get_jumlah = mysqli_fetch_array($sql2);




		} else {


				$sql = mysqli_query($koneksi, "SELECT * FROM rz_brg WHERE e_tgl=LEFT($periode,7) ORDER BY kd_brg DESC LIMIT ".$limit_start.",".$limit);

				$sql2 = mysqli_query($koneksi, "SELECT COUNT(*) AS jumlah FROM rz_brg WHERE e_tgl=LEFT($periode,7) ORDER BY kd_brg DESC ");
				$get_jumlah = mysqli_fetch_array($sql2);
			
		}

		while($data = mysqli_fetch_array($sql)){
			$row_id = $data['row_id'];
			$id2 = $data['row_id'];
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
											<h4 class="modal-title" style="color:blue;text-align:center;font-style:bold;">RIWAYAT PEMBELIAN</h4>
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
									          <h3 style="text-align: center;"><p>Apakah anda yakin menghapus master barang</p> <?php echo $data['na_brg'] ?> </h3>									          
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
                    <h4 class="modal-title">Update Master Barang</h4>
                  </div>
                  <div class="modal-body">
                    <form role="form" action="" id="updatepp" method="POST">
                        <?php
                        $idd = $data['row_id']; 
						$query_edit = mysqli_query($koneksi, "SELECT row_id,kd_brg,na_brg,jenis,satuan,h_beli,h_jual,satuan2,h_beli2,h_jual2,pakisi FROM rz_brg WHERE row_id='$idd'");
						
						//var_dump($query_edit);
						
                        while ($row2 = mysqli_fetch_array($query_edit)) {  
						//var_dump($row2);
                        ?>
                        <input type="hidden" name="row_id" value="<?php echo $row2['row_id']; ?>">
                        <input type="hidden" name="idd" value="<?php echo $row2['row_id']; ?>">
			
			
			<div class="row form-group">
			<label for="" class="col-sm-2 control-label">Nama Barang</label>
			<div class="col-sm-5">
	                <input type="text" class="form-control" name="na_brg" id="" value="<?php echo($data['na_brg']) ?>" required >
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
			
			  <label class="col-sm-1 control-label">Jenis</label>
			  <div class="col-sm-2">
			 <input type="text" class="form-control" name="jenis" value="<?php echo($data['jenis']) ?>" >
              </div>
			  
			  <label class="col-sm-1 control-label">Note</label>
			  <div class="col-sm-4">
			  <input type="textarea" class="form-control" name="ket" value="<?php echo($data['ket']) ?>" >
              </div>	


			 <!-- id="" step="any" -->



			</div>
			
			<div class="row form-group">
					
					<label class="col-sm-1 control-label">Satuan Ecer</label>
				<div class="col-sm-2">
					<input type="text" class="form-control" name="satuan" value="<?php echo($data['satuan']) ?>" >												
                </div>
				
					<label class="col-sm-1 control-label">Harga Beli Ecer </label>
				<div class="col-sm-3">
					<input type="text" class="form-control" name="h_beli" value="<?php echo($data['h_beli']) ?>" >												
                </div>
			
					<label class="col-sm-1 control-label">Harga Jual Ecer </label>
				<div class="col-sm-2">
					<input type="text" class="form-control" name="h_jual" value="<?php echo($data['h_jual']) ?>" >												
                </div>
				
		     </div>
			
			
			
			<div class="row form-group">
					
					<label class="col-sm-1 control-label">Satuan Grosir</label>
				<div class="col-sm-2">
					<input type="text" class="form-control" name="satuan2" value="<?php echo($data['satuan2']) ?>" >												
                </div>
				
					<label class="col-sm-1 control-label">Isi</label>
				<div class="col-sm-1">
					<input type="text" class="form-control" name="pakisi" value="<?php echo($data['pakisi']) ?>" >												
                </div>
				
					<label class="col-sm-1 control-label">Harga Beli Grosir </label>
				<div class="col-sm-2">
					<input type="text" class="form-control" name="h_beli2" value="<?php echo($data['h_beli2']) ?>" >												
                </div>
			
					<label class="col-sm-1 control-label">Harga Jual Grosir </label>
				<div class="col-sm-2">
					<input type="text" class="form-control" name="h_jual2" value="<?php echo($data['h_jual2']) ?>" >												
                </div>
				
		     </div>
			
                        <div class="modal-footer">  
                          <button type="submit" name="updatepp" class="btn btn-success">Simpan</button>
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
	$sqlNewData = "DELETE FROM rz_brg WHERE row_id = '$data_id' ";
	  $koneksi->query($sqlNewData);
	  //var_dump($sqlNewData);
	  header('Location: ' . $_SERVER['HTTP_REFERER']);
  }
   else if (isset($_POST["updatepp"])) {
				
				$idd= $_POST["idd"];
				$na_brg= $_POST["na_brg"];
				$kdrz= $_POST["kdrz"];
				$jenis= $_POST["jenis"];
				$satuan= $_POST["satuan"];
				$ket= $_POST["ket"];
				$satuan2= $_POST["satuan2"];
				$h_beli= $_POST["h_beli"];
				$h_beli2= $_POST["h_beli2"];
				$h_jual= $_POST["h_jual"];
				$h_jual2= $_POST["h_jual2"];
				$pakisi= $_POST["pakisi"];
				$query2 = "UPDATE rz_brg SET kdrz='$kdrz',na_brg='$na_brg',jenis='$jenis',ket='$ket',satuan='$satuan',h_beli='$h_beli',h_jual='$h_jual',satuan2='$satuan2',pakisi='$pakisi',h_beli2='$h_beli2',h_jual2='$h_jual2' WHERE row_id='$idd' ";
				$koneksi->query($query2);
				// var_dump($query2);
				
				header('Location: ' . $_SERVER['HTTP_REFERER']); 
				}

?>



<script type="text/javascript">
		$(document).on('click', '.view_data1', function(){
		var row_id = $(this).attr("id");
			if(row_id != '')
			{
				$.ajax({
					url:"model/form/sbrg/brg-detail-modal.php",
					method:"POST",
					data:{kd_brg:row_id},
					success:function(data){
						$('#DetailPO1').html(data);
						$('#dataModal1').modal('show');
						}
					});
			}
		});
</script>