<?php 

$level = $_SESSION['level'];

?>
<div class="row">
	<div class="col-xs-12">
		<div class="box box-default">

			<div class="box-header with-border">
				<div class="col-xs-12">
					<h3 class="box-title">
						TRANSAKSI PEMBELIAN
					</h3>
					<!-- <a href="?hal=proses-fbeli" type="button" class="pull-right btn btn-success"> <i class="fa fa-plus"></i>  TAMBAH TRANSAKSI</a> -->
					<button type="button" class="pull-right btn btn-success" data-toggle="modal" data-target="#new_add"><i class="fa fa-plus"></i>
						TAMBAH TRANSAKSI
					</button>

				</div>
			</div>
			<div class="box-body table-responsive">
				<div class="row">
					<div class="col-xs-12 col-sm-6">
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Pencarian..." id="keyword">
							<span class="input-group-btn">
								<button class="btn btn-primary" type="button" id="btn-search">Cari</button>
								<a href="" class="btn btn-warning">Reset</a>
							</span>
						</div>
					</div>
				</div>

				<div id="view"><?php include "beli-view.php"; ?></div>



			</div>

	</div>
</div>

<script src="/rzcell/model/form/sbeli/beli.js"></script>



<!-- /.modal new_add  Atau Penambahan transaksi Baru-->

<div class="modal fade" id="new_add" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <form role="form" method="post" action="">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">FORM TAMBAH TRANSAKSI PEMBELIAN</h4>
            </div>
            <div class="modal-body">
			<div class="row form-group">
	             	 <label for="" class="col-sm-2 control-label">No Bukti</label>
					<!-- <div class="col-sm-2">
						<input readonly type="text" step="any" class="form-control" name="no_bukti" id="" placeholder="No Bukti" required>
					</div> -->
					<div class="col-sm-3">
	                <input type="text" step="any" class="form-control" name="no_bukti" id="" placeholder="No_Bukti" value="#AUTO FILL" required disabled>
	             	 </div>

				  

					<label for="" class="col-sm-1 control-label">Tanggal</label>
						<!-- <div class="col-sm-2">
						<input type="text" class="form-control" name="tgl" id="" placeholder="Tanggal" required >
						</div>   -->
					<div class="col-sm-3">
									<div class="input-group date">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<input type="text" class="form-control pull-right" id="datepicker" name="tgl" value="<?php echo date('Y-m-d'); ?>" required="" >
									</div>
	              </div>



				  <label for="" class="col-sm-2 control-label">Jenis Pengeluaran</label>
				  <div class="col-sm-2">
							<select class="form-control" name="potong" required  > 
								<option value="">Pilih</option>
								<option value="LACI">Budget LACI</option>
								<option value="KAS">Budget KAS</option>
							</select>   
				   </div>
				  
				 
            </div>
				
			<div class="row form-group">
	              <label for="" class="col-sm-3 control-label">Data Suplier:</label>		 
			</div>

			<div class="row form-group">
			
			  <!-- <label class="col-sm-1 control-label">Kode Supplier</label> -->
			  <!-- <div class="col-sm-1"> -->
			 <!-- <input type="text" class="form-control" id="search_sup" name="sup" placeholder="Kodes" > -->
			 <!-- <input type="text" name="city" id="search_city" placeholder="Type to search..." class="form-control">  -->
			 <!-- <label class="demo-label">Cari Nama Suplier:</label><br/> <input type="text" name="txtCountry" id="txtCountry" class="typeahead"/> 
              </div> -->
			<!-- ---------------------------------------------------------- -->

			  <label class="col-sm-0 control-label"></label>
			  <div class="col-sm-4">
			 <input type="text" step="any"  class="form-control" onchange="cek_database()" name="namas" id="namas" placeholder="Cari Nama Supplier"></input>
              </div>	


			  <label class="col-sm-0 control-label"></label>
			  <div class="col-sm-2">
			 <input readonly type="text" step="any"  class="form-control" name="kodes" id="kodes" placeholder="Kode Supplier"></input>
              </div>	

			  <label class="col-sm-0 control-label"></label>
			  <div class="col-sm-3">
			 <input readonly type="text" step="any"  class="form-control" name="alamat" id="alamat" placeholder="Alamat Supplier"></input>
              </div>	
			  
			  <label class="col-sm-0 control-label"></label>
			  <div class="col-sm-2">
			 <input readonly type="text" step="any"  class="form-control" name="kota" id="kota" placeholder="Kota Supplier"></input>
              </div>	

			</div>
		

			<div class="row form-group">
				<label class="col-sm-1 control-label">Catatan</label>
				<div class="col-sm-5">	
					<textarea type="text" step="any"  class="form-control" name="notes" id="" placeholder="Catatan"></textarea>										
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



<!-------------------- start koding refrensi pencarian namas supplier ---------------------------->

<script>
    $(document).ready(function () {
        $('#namas').typeahead({
            source: function (query, result) {
                $.ajax({
                    url: "model/form/sbeli/ajax_cari_namas.php",
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
<!--------------------------------- ISI KOLOM DARI NAMAS------------------------------------------------------------------->

<script type="text/javascript">
    function cek_database(){
        var namas = $("#namas").val();
        $.ajax({
            url: 'model/form/sbeli/ajax2.php',
            data:"namas="+namas ,
        }).done(function (data) {
            var json = data,
            obj = JSON.parse(json);
            $('#kodes').val(obj.kodes);
			$('#alamat').val(obj.alamat);
			$('#kota').val(obj.kota);
        });
    }
</script>

<!--------------------------------- fungsi tombol simpan modal TAMBAH TRX HEADER------------------------------------------------------------------->

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