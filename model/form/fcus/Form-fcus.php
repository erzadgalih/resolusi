<?php 


$level = $_SESSION['level'];

$nama = $_SESSION['nama'];
$tgl_saiki = date("Y-m-d");

$sql = "SELECT row_id,kd_cust,na_cust,ttl,alamat,kota,no_hp,tglgabung,nombeli,POINT,e_tgl,ket,kdrz FROM rz_cust ";
$result = mysqli_query($koneksi, $sql);

?>


<div class="row">
	<div class="col-xs-12">
		<div class="box box-default">
			<form method="POST">
				<div class="box-header with-border">
					<div class="col-xs-12">
						<h3 class="box-title">
							FORM TAMBAH PELANGGAN
						</h3> 
					<a href="?hal=proses-cus" type="button" class="pull-right btn btn-primary"> <i class="fa fa-backward"></i>  KEMBALI</a>
					<script src="model/form/Jahit/process.js"></script> <!-- Load file process.js -->
					</div>
				</div>

				<div class="panel-body">
 					 <div class="row form-group">
	              <label for="" class="col-sm-2 control-label">Kode Pelanggan</label>

	              <div class="col-sm-2">
	                <input type="text" step="any" class="form-control" name="kd_cust" id="" placeholder="kode pelanggan" required>
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
	               <label for="" class="col-sm-2 control-label">Nama Pelanggan</label>
					 <div class="col-sm-5">
	                <input type="text" class="form-control" name="na_cust" id="" placeholder="Nama Pelanggan" required >
	              </div>  

				  <div class="row form-group">
	               <label for="" class="col-sm-1 control-label">Tanggal Lahir</label>
					 <div class="col-sm-2">
	                <input type="text" class="form-control" name="ttl" id="" placeholder="Tanggal Lahir" required >
	              </div>  
  
            </div>
				
					
			<div class="row form-group">
			
			  <label class="col-sm-2 control-label">Alamat</label>
			  <div class="col-sm-4">
			 <input type="text" class="form-control" name="alamat" placeholder="Alamat" >
              </div>
			  
			  <label class="col-sm-1 control-label">Kota</label>
			  <div class="col-sm-2">
			 <input type="text" step="any"  class="form-control" name="kota" id="" placeholder="Kota">
              </div>	
			  
			</div>
			
			<div class="row form-group">
					
					<label class="col-sm-2 control-label">Nomer HP</label>
				<div class="col-sm-2">
					<input type="text" class="form-control" name="no_hp" placeholder="Nomer hp" >												
                </div>
				
					<label class="col-sm-1 control-label">Tanggal Gabung </label>
				<div class="col-sm-2">
					<input type="text" class="form-control" name="tglgabung" placeholder="Tanggal Gabung" >												
                </div>
			
					<label class="col-sm-1 control-label">Nominal Pembelian </label>
				<div class="col-sm-2">
					<input type="text" class="form-control" name="nombeli" placeholder="Nominal Pembelian" >												
                </div>
				
		     </div>
			
			
			
			<div class="row form-group">
					
					<label class="col-sm-2 control-label">Keterangan</label>
				<div class="col-sm-6">
					<textarea type="text" class="form-control" name="ket" placeholder="Keterangan" ></textarea>												
                </div>
			
				
		     </div>
			
					<div class="box-footer with-border">
					<div class="col-xs-12">
					<button href="" type="submit" name="simpan_cus" class="pull-right btn btn-primary" ><i class="fa  fa-check-square"> SIMPAN</i>
					</div>
				</div>
				
				<!-- BATAS AKHIR -->
				</div>
			</form>
		</div>
	</div>
</div>


				<?php 

				if(isset($_POST["simpan_cus"])) {

					$user = $_SESSION['nama'];
					$kd_cust= $_POST["kd_cust"];
					$na_cust= $_POST["na_cust"];
					$alamat= $_POST["alamat"];
					$ttl= $_POST["ttl"];
					$kota= $_POST["kota"];
					$kdrz= $_POST["kdrz"];
					$no_hp= $_POST["no_hp"];
					$tglgabung= $_POST["tglgabung"];
					$nombeli= $_POST["nombeli"];
					$ket= $_POST["ket"];
					$time = date('Y-m-d G:i:s');
					
					
					$sqlNewData = "INSERT INTO rz_cust (kd_cust,kdrz,na_cust,alamat,kota,ttl,no_hp,tglgabung,nombeli,ket,e_tgl) VALUES ('$kd_cust','$kdrz','$na_cust','$alamat','$kota','$ttl','$no_hp','$tglgabung','$nombeli','$ket','$time') ";			
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