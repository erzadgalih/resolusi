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
							FORM TAMBAH MASTER
						</h3> 
					<a href="?hal=proses-brg" type="button" class="pull-right btn btn-primary"> <i class="fa fa-backward"></i>  KEMBALI</a>
					<script src="model/form/Jahit/process.js"></script> <!-- Load file process.js -->
					</div>
				</div>
				<div class="panel-body">
 					 <div class="row form-group">
	              <label for="" class="col-sm-2 control-label">Kode Barang</label>

	              <div class="col-sm-2">
	                <input type="text" step="any" class="form-control" name="kd_brg" id="" placeholder="kode barang" required>
	              </div>
				  
				  <label for="" class="col-sm-1 control-label">Kode</label>
			<div class="col-sm-2">
					<select class="form-control" name="kdrz" required  > 
						<option value="">Pilih</option>
	              		<option value="TK">Toko</option>
	              		<option value="JS">Jasa</option>
						<option value="HP">HandPhone</option>
	              	</select>   
			</div>
				  
				  
				 
	            </div>
				
				 <div class="row form-group">
	               <label for="" class="col-sm-2 control-label">Nama Barang</label>
					 <div class="col-sm-5">
	                <input type="text" class="form-control" name="na_brg" id="" placeholder="Nama Barang" required >
	              </div>  
				  
				
				  
            </div>
				
						 
			 
			
			
			<div class="row form-group">
			
			  <label class="col-sm-1 control-label">Jenis</label>
			  <div class="col-sm-2">
			 <input type="text" class="form-control" name="jenis" placeholder="Jenis" >
              </div>
			  
			  <label class="col-sm-1 control-label">Note</label>
			  <div class="col-sm-4">
			 <textarea type="text" step="any"  class="form-control" name="ket" id="" placeholder="Catatan"></textarea>
              </div>	
			  
			</div>
			
			<div class="row form-group">
					
					<label class="col-sm-1 control-label">Satuan Ecer</label>
				<div class="col-sm-1">
					<input type="text" class="form-control" name="satuan" placeholder="Satuan ecer" >												
                </div>
				
					<label class="col-sm-1 control-label">Harga Beli Ecer </label>
				<div class="col-sm-2">
					<input type="text" class="form-control" name="h_beli" placeholder="Harga Beli Ecer" >												
                </div>
			
					<label class="col-sm-1 control-label">Harga Jual Ecer </label>
				<div class="col-sm-2">
					<input type="text" class="form-control" name="h_jual" placeholder="Harga Jual Ecer" >												
                </div>
				
		     </div>
			
			
			
			<div class="row form-group">
					
					<label class="col-sm-1 control-label">Satuan Grosir</label>
				<div class="col-sm-1">
					<input type="text" class="form-control" name="satuan2" placeholder="Satuan grosir" >												
                </div>
				
					<label class="col-sm-1 control-label">Isi</label>
				<div class="col-sm-1">
					<input type="text" class="form-control" name="pakisi" placeholder="Isi" >												
                </div>
				
					<label class="col-sm-1 control-label">Harga Beli Grosir </label>
				<div class="col-sm-2">
					<input type="text" class="form-control" name="h_beli2" placeholder="Harga Beli grosir" >												
                </div>
			
					<label class="col-sm-1 control-label">Harga Jual Grosir </label>
				<div class="col-sm-2">
					<input type="text" class="form-control" name="h_jual2" placeholder="Harga Jual grosir" >												
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

<!------------------------------------------------>




<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
<script type="text/javascript">
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
</script>
<script src="model/form/Jahit/process.js"></script> 