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
										<input type="text" step="any"  class="form-control" name="nobukti" id="" placeholder="No Bukti" value="<?php echo $row_detail['no_bukti'] ?>" readonly>
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
				              <!-- <button type="submit" name="edit_no_bukti" class="btn btn-primary">Simpan</button> -->
				            </div>
				          </form>
				        </div>

				    </div>


				    <div class="box-header with-border">

				    	<h3 class="box-title">
				    		<button type="button" class="btn btn-info" data-toggle="modal" data-target="#new_add"><i class="fa fa-plus"></i>
									Tambah Isi
							</button>

				    	</h3>
				    		<a href="?hal=proses-beli" type="button" class="pull-right btn btn-success"> <i class="fa fa-backward"></i>  Kembali</a>

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
									<td><?php echo number_format($row['qty'],0); ?></td>
									<td><?php echo $row['satuan']; ?></td>
									<td><?php echo number_format($row['h_beli'],0); ?></td>
									<td><?php echo number_format($row['total'],0); ?></td>
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
			<input type="hidden" name="id" value="<?php echo $row_detail['row_id'] ?>">
	             	 <label for="" class="col-sm-2 control-label">No Bukti</label>

					<div class="col-sm-2">
	                <input type="text" step="any" class="form-control" name="no_bukti" id="" placeholder="No_Bukti" value="<?php echo $row_detail['no_bukti'] ?>" required readonly>
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
				<input type="text" step="any"  class="form-control" name="total" id="total" placeholder="Total" readonly></input>
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
			$cek_urut = "SELECT rec FROM rz_belid WHERE no_bukti='$no_bukti' ORDER BY rec DESC LIMIT 1";
			$result_cek = mysqli_query($koneksi, $cek_urut);
			$row_cek = mysqli_fetch_array($result_cek);
			// var_dump($row_cek['no_urut']);
			if ($row_cek['rec'] == NULL) {
				$no_urut = 1;
			} else {
				$no_urut = $row_cek['rec']+1;
			}

		$id = $_POST['id'];
		$tgl = $_POST['tgl'];
		$no_bukti = $_POST['no_bukti'];
		$kd_brg = $_POST['kd_brg'];
		$na_brg = $_POST['na_brg'];
		$satuan = $_POST['satuan'];
		$qty = $_POST['qty'];
		$h_beli = $_POST['h_beli'];
		$total = $_POST['total'];
		$time = date('Y-m-d G:i:s');
		$periode=$_SESSION['periode'];
		$sqlNewData = "INSERT INTO rz_belid (rec,id,no_bukti,tgl, na_brg, kd_brg, satuan, qty, h_beli, total, e_tgl, per) VALUES ('$no_urut','$id','$no_bukti','$tgl','$na_brg','$kd_brg','$satuan','$qty','$h_beli','$total','$time','$periode') ";
	    $koneksi->query($sqlNewData);


		$total = "SELECT sum(total) as total FROM rz_belid WHERE no_bukti='$no_bukti' LIMIT 1";
			$result_tot = mysqli_query($koneksi, $total);
			$dia = mysqli_fetch_array($result_tot);
		$totnil = $dia['total'];

		$sqlNewData2 = "UPDATE rz_beli set nett='$totnil' where no_bukti='$no_bukti'";
		$koneksi->query($sqlNewData2);	
	    //var_dump($sqlNewData);
	  header('Location: ' . $_SERVER['HTTP_REFERER']);
	}

	if(isset($_POST["hapus_data"])) {
        $no_bukti = $_POST['no_bukti'];
        $sqlNewDatad = "DELETE FROM rz_belid WHERE no_bukti = '$no_bukti' ";
          $koneksi->query($sqlNewDatad);
          header('Location: ' . $_SERVER['HTTP_REFERER']);
      }

 ?>

 

<!-------------------- start koding refrensi pencarian nama barang ---------------------------->

<script>
    $(document).ready(function () {
        $('#na_brg').typeahead({
            source: function (query, result) {
                $.ajax({
                    url: "model/form/beli2/ajax4.php",
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
            url: 'model/form/beli2/ajax3.php',
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
                    url: "model/form/beli2/ajax5.php",
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
            url: 'model/form/beli2/ajax6.php',
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

<script type="text/javascript">
    $(document).ready(function(){
      $("#qty").keyup(function(){
        var qty  = parseInt($("#qty").val());
        var h_beli  = parseInt($("#h_beli").val());
        var total = qty*h_beli;
        $("#total").val(total);
      });
    });
  </script> 