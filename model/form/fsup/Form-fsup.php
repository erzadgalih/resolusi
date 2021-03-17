<?php 


$level = $_SESSION['level'];

$nama = $_SESSION['nama'];
$tgl_saiki = date("Y-m-d");

$sql = "SELECT kodes,namas,alamat,kota,telpon,contact,ket,kdrz FROM rz_sup ";
$result = mysqli_query($koneksi, $sql);

?>


<div class="row">
	<div class="col-xs-12">
		<div class="box box-default">
			<form method="POST">
				<div class="box-header with-border">
					<div class="col-xs-12">
						<h3 class="box-title">
							FORM TAMBAH SUPPLIER
						</h3> 
					<a href="?hal=proses-sup" type="button" class="pull-right btn btn-primary"> <i class="fa fa-backward"></i>  KEMBALI</a>
					<script src="model/form/Jahit/process.js"></script> <!-- Load file process.js -->
					</div>
				</div>
				<div class="panel-body">
 					 <div class="row form-group">
	              <label for="" class="col-sm-2 control-label">Kode Supplier</label>

	              <div class="col-sm-2">
	                <input type="text" step="any" class="form-control" name="kodes" id="" placeholder="kode supplier" required>
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
	               <label for="" class="col-sm-2 control-label">Nama Supplier</label>
					 <div class="col-sm-5">
	                <input type="text" class="form-control" name="namas" id="" placeholder="Nama Supplier" required >
	              </div>  
				  
				
				  
            </div>
				
						 
			 
			
			
			<div class="row form-group">
			
			  <label class="col-sm-2 control-label">Alamat</label>
			  <div class="col-sm-5">
			 <input type="text" class="form-control" name="alamat" placeholder="Alamat" >
              </div>
			  
			  <label class="col-sm-1 control-label">Kota</label>
			  <div class="col-sm-2">
			 <input type="text" step="any"  class="form-control" name="kota" id="" placeholder="Kota">
              </div>	
			  
			</div>
			

			<div class="row form-group">
					
					<label class="col-sm-2 control-label">Telpon</label>
				<div class="col-sm-2">
					<input type="text" class="form-control" name="telpon" placeholder="Nomer Telpon" >												
                </div>
				
					<label class="col-sm-1 control-label">Kontak </label>
				<div class="col-sm-2">
					<input type="text" class="form-control" name="contact" placeholder="Kontak" >												
                </div>
			
				<label class="col-sm-1 control-label">Catatan Pembayaran </label>
				<div class="col-sm-2">
					<input type="text" class="form-control" name="notbay" placeholder="Catatan Pembayaran" >												
                </div>
													
			</div>

			 <div class="row form-group">
				<label class="col-sm-2 control-label">Keterangan</label>
				<div class="col-sm-8">
				<textarea type="text" step="any"  class="form-control" name="ket" id="" placeholder="Keterangan"></textarea>
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
					$kodes= $_POST["kodes"];
					$namas= $_POST["namas"];
					$alamat= $_POST["alamat"];
					$kota= $_POST["kota"];
					$telpon= $_POST["telpon"];
					$contact= $_POST["contact"];
					$ket= $_POST["ket"];
					$kdrz= $_POST["kdrz"];
					$notbay= $POST["notbay"];
					$time = date('Y-m-d G:i:s');
					
					
					$sqlNewData = "INSERT INTO rz_sup (kodes,namas,alamat,kota,telpon,contact,ket,kdrz,nama,notbay,e_tgl) VALUES ('$kodes','$namas','$alamat','$kota','$telpon','$contact','$ket','$kdrz','$nama','$notbay','$time') ";			
					$koneksi->query($sqlNewData);
					
					//var_dump($sqlNewData);
					header('Location: ' . $_SERVER['HTTP_REFERER']); 

				}



				?>

<!------------------------------------------------>




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
</script>
<script src="model/form/Jahit/process.js"></script>  -->