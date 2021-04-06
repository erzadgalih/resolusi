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
							$sql_detail = "SELECT row_id,no_bukti,tgl,kodes,namas,concat(alamat,' - ',kota) as alamat,nett FROM rz_beli WHERE row_id like '%".$bon_id."%' ";
							$result_detail = mysqli_query($koneksi, $sql_detail);
							$row_detail = mysqli_fetch_assoc($result_detail);

							$no_bukti = $row_detail['no_bukti'];
						 ?>
				      <div class="modal-content">
				        <form role="form" method="post" action="" style="background-color: #FFF8DC">
				        	<input type="hidden" name="id" value="<?php echo $row_detail['row_id'] ?>">
				          <div class="modal-header">
				            <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				              <span aria-hidden="true">&times;</span></button> -->
				              <h4 class="modal-title">TRANSAKSI PEMBELIAN</h4>
				            </div>
				            <div class="modal-body">
				              	<div class="row form-group">
					              <label for="" class="col-sm-2 control-label">No Bukti</label>

									<div class="col-sm-2">
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

								<div class="row form-group">
							    	<label for="" class="col-sm-2 control-label">TOTAL</label>
									<div class="col-sm-6">
										<input type="text" step="any"  class="form-control" name="NETT" id="" placeholder="Total Pembelian" value="Rp. <?php echo number_format($row_detail['nett'],2); ?>" readonly>
									</div>
									
					            </div>
				             	           
				            </div>
				        <?php } ?>
				            <div class="modal-footer">
				              <!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
				              <button disabled type="submit" name="edit_no_bukti" class="btn btn-primary">Simpan</button>
				            </div>
				          </form>
				        </div>

				    </div>


				    <div class="box-header with-border">

				    	<h3 class="box-title">
				    		<button disabled type="button" class="btn btn-info" data-toggle="modal" data-target="#new_add"><i class="fa fa-plus"></i>
									Tambah Isi
							</button>

				    	</h3>
				    		<a href="?hal=proses-beli2" type="button" class="pull-right btn btn-success"> <i class="fa fa-backward"></i>  Kembali</a>

				    </div>
					
				 <div class="box-body table-responsive">
				 <table id="example3" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>No Urut</th>
							<th>Kode Barang</th>
							<th>Nama Barang</th>
							<th>Qty</th>
							<th>Satuan</th>
							<th>Harga Beli</th>
							<th>Total Beli</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$count = "SELECT COUNT(*) FROM rz_belid where no_bukti='$no_bukti'";
						$record = mysqli_query($koneksi, $count); 
						$sql = "SELECT * FROM rz_belid WHERE no_bukti='$no_bukti'";
						$result = mysqli_query($koneksi, $sql);
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
									<td><?php echo number_format($row['total'],2); ?></td>
									<td>
										<a href="#hapusModal_<?php echo $id ?>" data-toggle="modal" type="button"><span><i class="fa fa-trash" data-toggle='tooltip' title="Hapus"></i></span></a>
									</td>
									<!-- / Modal Hapus -->
									<div id="hapusModal_<?php echo $id ?>" class="modal fade" data-backdrop="static" data-keyboard="false">
									  <div class="modal-dialog ">
									    <div class="modal-content">
									      <form role="form" method="post" action="">									        
									        <input type="hidden" name="data_id" value="<?php echo $id ?>">
									        
									        <div class="modal-header">
									          <button type="button" class="close" data-dismiss="modal">&times;</button>
											 	 <!-- <h4 class="modal-title"><?php echo $row['na_brg'] ?></h4> -->
									        </div>
									        <div class="modal-body">
									          <h3 style="text-align: center;"><p>Apakah anda yakin menghapus</p> Detail <?php echo $row['na_brg'] ?> </h3>									          
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
        <form role="form" method="post" action="">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">FORM TAMBAH ITEM TRANSAKSI</h4>
            </div>
            <div class="modal-body">
			<div class="row form-group">
	             	 <label for="" class="col-sm-2 control-label">No Bukti</label>

					<div class="col-sm-2">
	                <input type="text" step="any" class="form-control" name="no_bukti" id="" placeholder="No_Bukti" value="#AUTO FILL" required disabled>
	             	 </div>

					<label for="" class="col-sm-1 control-label">Tanggal</label>
					<div class="col-sm-3">
									<div class="input-group date">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<input type="text" class="form-control pull-right" id="datepicker" name="tgl" value="<?php echo date('Y-m-d'); ?>" required="" >
									</div>
	              </div>
				 
            </div>
				
			<div class="row form-group">
	              <label for="" class="col-sm-3 control-label">Cari Barang:</label>		 	
			</div>

			<div class="row form-group">


			  <!-- <label class="col-sm-0 control-label"></label> -->
			  <div class="col-sm-4">
			 <input type="text" step="any"  class="form-control" onchange="cek_database4()" name="kd_brg" id="kd_brg" placeholder="Cari Kode barang"></input>
              </div>	

			  <!-- <label class="col-sm-0 control-label"></label> -->
			  <div class="col-sm-2">
			 <input readonly type="text" step="any"  class="form-control" name="satuan" id="satuan" placeholder="Satuan"></input>
              </div>	
			  
			  <!-- <label class="col-sm-0 control-label"></label> -->
			  <div class="col-sm-2">
			 <input readonly type="text" step="any"  class="form-control" name="h_beli" id="h_beli" placeholder="Harga Beli"></input>
              </div>	

			</div>

			<div class="row form-group">
			
				<div class="col-sm-4">
				<input type="text" step="any"  class="form-control" onchange="cek_database3()" name="na_brg" id="na_brg" placeholder="Cari Nama Barang"></input>
				</div>	

				<label class="col-sm-1 control-label">Jumlah</label>
				<div class="col-sm-2">
				<input type="text" step="any"  class="form-control" name="qty" id="qty" placeholder="Jumlah"></input>
				</div>	

				<label class="col-sm-1 control-label">Total</label>
				<div class="col-sm-2">
				<input type="text" step="any"  class="form-control" name="total" id="total" placeholder="Total"></input>
				</div>	

   			</div>	


            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
              <button type="submit" name="new_trx" class="btn btn-primary">Simpan</button>
            </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <!-- /.modal new_add -->
    <!-- /.modal new_add -->



<?php 
	if(isset($_POST["new_trx"])) {
		$periode = $_SESSION['periode'];
		
		$cek_urut = "SELECT substr(no_bukti,4,4) as no_bukti FROM rz_beli WHERE per='$periode' ORDER BY no_bukti DESC LIMIT 1";
		$result_cek = mysqli_query($koneksi, $cek_urut);
		$row_cek = mysqli_fetch_array($result_cek);
		 // var_dump($row_cek['nomor']);
		if ($row_cek['no_bukti'] == NULL) {
			$nomor = 1;
		} else {
			$nomor = $row_cek['no_bukti']+1;
			
		}

		$y = date('Y');
		$m= date('m');
		$no_bukti = 'BL-'.str_pad($nomor, 4, "0", STR_PAD_LEFT).'-'.$m.'-'.$y;;

		// $no_bukti = 'LBR-'.$y1.$m.str_pad($nomor, 6, "0", STR_PAD_LEFT);;
		var_dump($no_bukti); // hasil ini apa : contoh hasil : LBR-2103000001     jdikan BL-0005-09-2018

		// $no_bukti = $_POST['no_bukti'];
		$tgl = $_POST['tgl'];
		$potong = $_POST['potong'];
		$namas = $_POST['namas'];
		$kodes = $_POST['kodes'];
		$alamat = $_POST['alamat'];
		$kota = $_POST['kota'];
		$notes = $_POST['notes'];
		$time = date('Y-m-d G:i:s');
		$sqlNewData = "INSERT INTO rz_beli (no_bukti, tgl, potong, namas, kodes, alamat, kota, notes, e_tgl, per) VALUES ('$no_bukti','$tgl','$potong','$namas','$kodes','$alamat','$kota','$notes','$time','$periode') ";
	    $koneksi->query($sqlNewData);


	    var_dump($sqlNewData);
	  header('Location: ' . $_SERVER['HTTP_REFERER']);
	}


 ?>

 

<!-------------------- start koding refrensi pencarian nama barang ---------------------------->

<script>
    $(document).ready(function () {
        $('#na_brg').typeahead({
            source: function (query, result) {
                $.ajax({
                    url: "model/form/beli3/ajax4.php",
					data: 'query=' + query,            
                    dataType: "json",
                    type: "POST",
                    success: function (data) {
						result($.map(data, function (item) {
							return item;
                        }));
                    }
                });
            }
        });
    });
</script>


<!-------------------- start koding ISI Kolom berdasar nama barang ---------------------------->
<script type="text/javascript">
    function cek_database3(){
        var na_brg = $("#na_brg").val();
        $.ajax({
            url: 'model/form/beli3/ajax3.php',
            data:"na_brg="+na_brg ,
        }).done(function (data) {
            var json = data,
            obj = JSON.parse(json);
            $('#kd_brg').val(obj.kd_brg);
			$('#satuan').val(obj.satuan);
			$('#h_beli').val(obj.h_beli);
        });
    }
</script>


<!-------------------- start koding refrensi pencarian KODE barang ---------------------------->

<script>
    $(document).ready(function () {
        $('#kd_brg').typeahead({
            source: function (query, result) {
                $.ajax({
                    url: "model/form/beli3/ajax5.php",
					data: 'query=' + query,            
                    dataType: "json",
                    type: "POST",
                    success: function (data) {
						result($.map(data, function (item) {
							return item;
                        }));
                    }
                });
            }
        });
    });
</script>

<script type="text/javascript">
    function cek_database4(){
        var kd_brg = $("#kd_brg").val();
        $.ajax({
            url: 'model/form/beli3/ajax6.php',
            data:"kd_brg="+kd_brg ,
        }).done(function (data) {
            var json = data,
            obj = JSON.parse(json);
            $('#na_brg').val(obj.na_brg);
			$('#satuan').val(obj.satuan);
			$('#h_beli').val(obj.h_beli);
        });
    }
</script>