<div class="row">
	<div class="col-xs-12">
		<div class="box box-default">
			<div class="box-header with-border">


			</div>

			<div class="box-body">
						<?php 
							if (($_GET['nobuk'])) {
								$bon_id = $_GET['nobuk'];

							// }
							$sql_detail = "SELECT row_id,no_bukti,tgl,kodes,namas,concat(alamat,' - ',kota) as alamat FROM rz_beli WHERE row_id like '%".$bon_id."%' ";
							$result_detail = mysqli_query($koneksi, $sql_detail);
							$row_detail = mysqli_fetch_assoc($result_detail);

							$no_bukti = $row_detail['no_bukti'];
						 ?>
				      <div class="modal-content">
				        <form role="form" method="post" action="">
				        	<input type="hidden" name="id" value="<?php echo $row_detail['row_id'] ?>">
				          <div class="modal-header">
				            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				              <span aria-hidden="true">&times;</span></button>
				              <h4 class="modal-title">TRANSAKSI PEMBELIAN</h4>
				            </div>
				            <div class="modal-body">
				              	<div class="row form-group">
					              <label for="" class="col-sm-1 control-label">No Bukti</label>

									<div class="col-sm-5">
										<input type="text" step="any"  class="form-control" name="no_bukti" id="" placeholder="No Bukti" value="<?php echo $row_detail['no_bukti'] ?>" readonly>
									</div>
										<div class="col-sm-3">
											<div class="input-group date">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<input type="text" class="form-control pull-right" id="datepicker" name="tgl" value="<?php echo $row_detail['tgl'] ?>" required="">
											</div>
										</div>
					            </div>

								<div class="row form-group">
					              <label for="" class="col-sm-2 control-label">Data Supplier</label>
									<div class="col-sm-2">
										<input type="text" step="any"  class="form-control" name="kodes" id="" placeholder="Kode Supplier" value="<?php echo $row_detail['kodes'] ?>" readonly>
									</div>
									<div class="col-sm-4">
										<input type="text" step="any"  class="form-control" name="namas" id="" placeholder="Nama Supplier" value="<?php echo $row_detail['namas'] ?>" readonly>
									</div>
					            </div>

								<div class="row form-group">
							    	<label for="" class="col-sm-2 control-label">            </label>
									<div class="col-sm-6">
										<input type="text" step="any"  class="form-control" name="alamat" id="" placeholder="Alamat Supplier" value="<?php echo $row_detail['alamat'] ?>" readonly>
									</div>
									
					            </div>
				             	           
				            </div>
				        <?php } ?>
				            <div class="modal-footer">
				              <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
				              <button type="submit" name="edit_no_bukti" class="btn btn-primary">Simpan</button>
				            </div>
				          </form>
				        </div>

				    </div>


				    <div class="box-header with-border">

				    	<h3 class="box-title">
				    		<button type="button" href="/verifikasi/model/form/lembur/add_new.php?lembur_detail=<?php echo $_GET['lembur_detail']; ?>" class="btn btn-info" data-toggle="modal" data-target="#new_add"><i class="fa fa-plus"></i>
				    			Tambah Isi
				    		</button>
				    	</h3>
				    		<a href="?hal=proses-beli" type="button" class="pull-right btn btn-success"> <i class="fa fa-backward"></i>  Kembali</a>

				    </div>
				 <div class="box-body">
				<table id="example2" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>No Urut</th>
							<th>Kode Barang</th>
							<th>Nama Barang</th>
							<th>Qty</th>
							<th>Satuan</th>
							<th>Harga Beli</th>
							
							
						</tr>
					</thead>
					<tbody>
						<?php 
						$periode = $_SESSION['periode'];
						$count = "SELECT COUNT(*) FROM rz_belid where per='$periode' ORDER BY no_bukti DESC";
						$record = mysqli_query($koneksi, $count); 
						$sql = "SELECT * FROM rz_belid WHERE no_bukti='$no_bukti' ";
						$result = mysqli_query($koneksi, $sql);
						// var_dump($sql);

						$total_record = mysqli_fetch_array($record)[0];
						
						?>
						<?php
						if (mysqli_num_rows($record) > 0) {						
							
								$no = 0;
							while($row = mysqli_fetch_array($result)) {
								$no++;
								$id = $row['row_id']; 
								?>  
								<tr>
									<td><?php echo $row['rec']; ?></td>
									<td><?php echo $row['kd_brg']; ?></td>
									<td><?php echo $row['na_brg']; ?></td>
									<td><?php echo number_format($row['qty'],2); ?></td>
									<td><?php echo $row['satuan']; ?></td>
									<td><?php echo number_format($row['h_beli'],2); ?></td>
								


									<td>
<!-- 										<a href="#lihatModal_<?php echo $id ?>" data-toggle="modal" data-id="<?php echo $id ?>"  type="button"><span><i class="fa fa-eye" data-toggle='tooltip' title="Lihat/Edit Tambah Detail"></i></span></a> -->
										<a href="#hapusModal_<?php echo $id ?>" data-toggle="modal" type="button"><span><i class="fa fa-trash" data-toggle='tooltip' title="Hapus"></i></span></a>
<!-- 										<a href="" data-toggle="modal" type="button"><span><i class="fa fa-print" data-toggle='tooltip' title="Cetak"></i></span></a> -->
									</td>
									<!-- / Modal Hapus -->
									<div id="hapusModal_<?php echo $id ?>" class="modal fade" data-backdrop="static" data-keyboard="false">
									  <div class="modal-dialog ">
									    <div class="modal-content">
									      <form role="form" method="post" action="">									        
									        <input type="hidden" name="data_id" value="<?php echo $id ?>">
									        
									        <div class="modal-header">
									          <button type="button" class="close" data-dismiss="modal">&times;</button>

									        </div>
									        <div class="modal-body">
									          <h3 style="text-align: center;"><p>Apakah anda yakin menghapus</p> Detail <?php echo $row['nm_peg'] ?> </h3>									          
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
									<!--/ Modal Hapus -->
								</tr>
							<?php }}?>
						</tfoot>
					</table>

				</div>

			</div>
	</div>
</div>



   <!-- /.modal new_add -->
  <div class="modal fade" id="new_add" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        </div>
      </div>
    </div>
    <!-- /.modal new_add -->




<?php
	if(isset($_POST["edit_no_bukti"])) {
		$id = $_POST['id'];
		$no_bukti = $_POST['no_bukti'];
		$tgl = $_POST['tgl'];
		$user = $_SESSION['nama'];
		$time = date('Y-m-d G:i:s');
		$sqlNewData = "UPDATE hrd_lemburh SET no_bukti ='$no_bukti' , tgl='$tgl', username='$user', e_tgl='$time' WHERE row_id = '$id'  ";
	    $koneksi->query($sqlNewData);
	    // var_dump($sqlNewData);
	  	header('Location: ' . $_SERVER['HTTP_REFERER']); 
	}
	if(isset($_POST["new_bon_detail"])) {

		// $bahan_id = $_POST['kode_bahan'];
		// $sql_bahan =  "SELECT * FROM bahan where id=$bahan_id ";
		// $result_bahan = mysqli_query($koneksi, $sql_bahan);
		// $row_bahan = mysqli_fetch_array($result_bahan);
		
		$bahan_id = $_POST['nm_peg'];
		$sql_bahan =  "SELECT * FROM hrd_frmlembur where row_id=$bahan_id ";
		$result_bahan = mysqli_query($koneksi, $sql_bahan);
		$row_bahan = mysqli_fetch_array($result_bahan);

		$bon_id = $_POST['bon_id'];
		$sql_no_bukti =  "SELECT * FROM hrd_lemburh where row_id=$bon_id ";
		$result_no_bukti = mysqli_query($koneksi, $sql_no_bukti);
		$row_no_bukti = mysqli_fetch_array($result_no_bukti);
		$no_bukti = $row_no_bukti['no_bukti'];
		// var_dump($no_bukti);

		$cek_urut = "SELECT rec FROM hrd_lemburd WHERE no_bukti='$no_bukti' ORDER BY rec DESC LIMIT 1";
		$result_cek = mysqli_query($koneksi, $cek_urut);
		$row_cek = mysqli_fetch_array($result_cek);
		// var_dump($row_cek['no_urut']);
		if ($row_cek['rec'] == NULL) {
			$no_urut = 1;
		} else {
			$no_urut = $row_cek['rec']+1;
		}
		$nm_peg = $row_bahan['nm_peg'];
		$ul = $row_bahan['ul'];
		$kd_peg = $row_bahan['kd_peg'];
		$td = $row_bahan['td'];
		$flag = $row_bahan['flag'];
		
		$ket = $_POST['ket'];
		
		$sqlNewData = "INSERT INTO hrd_lemburd (no_bukti,rec,nm_peg,ket,ul,kd_peg,td,flag) VALUES ('$no_bukti','$no_urut','$nm_peg','$ket','$ul','$kd_peg','$td','$flag') ";
	    // var_dump($sqlNewData);
	    $koneksi->query($sqlNewData);
	     //var_dump($sqlNewData);
	    // printf("Errormessage: %s\n", $koneksi->error);
		
		$jumlah = "SELECT count(no_bukti) as k, sum(ul) as t from hrd_lemburd where no_bukti='$no_bukti'";
		$jumlah1 = mysqli_query($koneksi, $jumlah);
		$jumlah2 = mysqli_fetch_array($jumlah1);
		
		$k=$jumlah2['k'];
		$t=$jumlah2['t'];
		
		$sqlNewData1 = "UPDATE hrd_lemburh set jml='$k', tot_ul='$t' WHERE no_bukti = '$no_bukti'  ";
	    $koneksi->query($sqlNewData1);
		//var_dump($sqlNewData1);
	  	header('Location: ' . $_SERVER['HTTP_REFERER']);
	}
	if(isset($_POST["hapus_data"])) {
		$data_id = $_POST['data_id'];
		$sqlNewData = "DELETE FROM hrd_lemburd WHERE row_id = '$data_id' ";
		$koneksi->query($sqlNewData);
		
		$jumlah4 = "SELECT count(no_bukti) as f, sum(ul) as g from hrd_lemburd where no_bukti='$no_bukti'";
		$jumlah5 = mysqli_query($koneksi, $jumlah4);
		$jumlah6 = mysqli_fetch_array($jumlah5);
		
		$f=$jumlah6['f'];
		$g=$jumlah6['g'];
		
		$sqlNewData1 = "UPDATE hrd_lemburh set jml='$f', tot_ul='$g' WHERE no_bukti = '$no_bukti'  ";
	    $koneksi->query($sqlNewData1);
		
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}
 ?>

