<?php 


$level = $_SESSION['level'];

$nama = $_SESSION['nama'];
$tgl_saiki = date("Y-m-d");

$sql = "SELECT kd_brg,na_brg,jenis,satuan,h_beli,h_jual,satuan2,h_beli2,h_jual2,pakisi,nama,e_tgl FROM rz_brg ";
$result = mysqli_query($koneksi, $sql);

?>


<div class="row">
	<div class="col-xs-12">
		<div class="box box-default">
			<form method="POST">
				<div class="box-header with-border">
					<div class="col-xs-12">
						<h3 class="box-title">
							FORM TAMBAH TRANSAKSI PEMBELIAN
						</h3> 
					<a href="?hal=proses-sbeli" type="button" class="pull-right btn btn-primary"> <i class="fa fa-backward"></i>  KEMBALI</a>
					<!-- <script src="model/form/Jahit/process.js"></script> Load file process.js -->
					</div>
				</div>
				<div class="panel-body">
 					 <div class="row form-group">
	             	 <label for="" class="col-sm-1 control-label">No Bukti</label>

					<div class="col-sm-2">
						<input type="text" step="any" class="form-control" name="no_bukti" id="" placeholder="No Bukti" required>
					</div>
				  

					<label for="" class="col-sm-1 control-label">Tanggal</label>
						<div class="col-sm-2">
						<input type="text" class="form-control" name="tgl" id="" placeholder="Tanggal" required >
					</div>  


				  <label for="" class="col-sm-1 control-label">Jenis Pengeluaran</label>
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
			 <input type="text" step="any"  class="form-control" onchange="cek_database()" name="txtCountry" id="txtCountry" placeholder="Cari Nama Supplier"></input>
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

			
					<div class="box-footer with-border">
					<div class="col-xs-12">
					<button href="" type="submit" name="simpan_qc_jahit" class="pull-right btn btn-primary" ><i class="fa  fa-check-square"> SIMPAN</i>
					</div>
					</div>
				
				<!-- BATAS AKHIR -->
				</div>
			</form>
		</div>
	</div>
</div>


				<?php 

				if(isset($_POST["simpan_qc_jahit"])) {

					$user = $_SESSION['nama'];
					$kd_brg= $_POST["kd_brg"];
					$na_brg= $_POST["na_brg"];
					$jenis= $_POST["jenis"];
					$kdrz= $_POST["kdrz"];
					$satuan= $_POST["satuan"];
					$h_beli= $_POST["h_beli"];
					$h_jual= $_POST["h_jual"];
					$satuan2= $_POST["satuan2"];
					$h_beli2= $_POST["h_beli2"];
					$h_jual2= $_POST["h_jual2"];
					$pakisi= $_POST["pakisi"];
					$time = date('Y-m-d G:i:s');
					
					
					$sqlNewData = "INSERT INTO rz_brg (kd_brg,kdrz,na_brg,jenis,satuan,h_beli,h_jual,satuan2,h_beli2,h_jual2,pakisi,nama,e_tgl) VALUES ('$kd_brg','$kdrz','$na_brg','$jenis','$satuan','$h_beli','$h_jual','$satuan2','$h_beli2','$h_jual2','$pakisi','$nama','$time') ";			
					$koneksi->query($sqlNewData);
					
					//var_dump($sqlNewData);
					header('Location: ' . $_SERVER['HTTP_REFERER']); 

				}



				?>

<!-------------------- start koding refrensi pencarian namas supplier ---------------------------->

<script>
    $(document).ready(function () {
        $('#txtCountry').typeahead({
            source: function (query, result) {
                $.ajax({
                    url: "model/form/fbeli/ajax_cari_namas.php",
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
        var txtCountry = $("#txtCountry").val();
        $.ajax({
            url: 'model/form/fbeli/ajax2.php',
            data:"txtCountry="+txtCountry ,
        }).done(function (data) {
            var json = data,
            obj = JSON.parse(json);
            $('#kodes').val(obj.kodes);
			$('#alamat').val(obj.alamat);
			$('#kota').val(obj.kota);
        });
    }
</script>






<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
<!-- <script type="text/javascript">
    function cek_database(){
        var karakter = $("#karakter").val();
        $.ajax({
            url: 'model/form/Jahit/ajax.php',
            data:"karakter="+karakter ,
        }).done(function (data) {
            var json = data,
            obj = JSON.parse(json);
            $('#kd_line').val(obj.kd_line);
			$('#kode').val(obj.kode);
        });
    }
</script> -->
<!-- <script src="model/form/Jahit/process.js"></script>  -->