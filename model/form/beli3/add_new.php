        <?php 
        ob_start();
        session_start();
        include "../../../config/database.php"; 
        include "../../../auth.php";
        ?>

        <form role="form" method="post" action="">
        	<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
        			<span aria-hidden="true">&times;</span></button>
        			<h4 class="modal-title">Tambah Isi Detail</h4>        			
        		</div>
        		<div class="modal-body">
        			<div class="row form-group">
        				<label for="" class="col-sm-2 control-label">Nama Pegawai</label>	              
        				<div class="col-sm-3">
						<input type="hidden" name="bon_id" value="<?php echo $_GET['lembur_detail'];  ?>">
        					<select class="select-basic form-control" name="nm_peg" id="select_peg" required="" onclick="select()"  > 
        						<option value="">---Pilih / Cari Pegawai---</option>
        						<?php 
								include "../../../config/database.php"; 
								
								if (($_GET['lembur_detail'])) {
								$bon_id = $_GET['lembur_detail'];

							// }
							$sql_detail = "SELECT * FROM hrd_lemburh WHERE row_id like '%".$bon_id."%' ";
							$result_detail = mysqli_query($koneksi, $sql_detail);
							$row_detail = mysqli_fetch_assoc($result_detail);

							$no_bukti = $row_detail['no_bukti'];
							$flag = $row_detail['flag'];
							$DR = $row_detail['DR'];
							$status = $row_detail['status'];
							
								
								
								$nama_divisi = $_SESSION['nama_divisi'];
        						$sql_pro = "SELECT * FROM hrd_frmlembur where bagian='$nama_divisi' and dr='$DR' order by nm_peg";
        						$result_pro = mysqli_query($koneksi, $sql_pro);
	                    		if (mysqli_num_rows($result_pro) > 0) {              		// output data of each row
	                    			while($row_pro = mysqli_fetch_assoc($result_pro)) {
	                    				$id_pro = $row_pro['row_id']; 
										$nm_peg = $row_pro['nm_peg']; 
										$kd_peg = $row_pro['kd_peg'];
										$td = $row_pro['td'];
	                    				$ul = $row_pro['ul']; 
	                    				?>
	                    				<option value="<?php echo "$id_pro" ?>"><?php echo "$nm_peg" ?></option>		                    	
	                    			<?php }} ?>
	                    		</select>
	                    	</div>
							<?php } ?>
							<label for="" class="col-sm-1 control-label">Kode Pegawai</label>
	                    	<div class="col-sm-2">
	                    		<input type="text" step="any"  value="" class="form-control" id="kd_peg" name="kd_peg" disabled="" />
	                    	</div>
							<label for="" class="col-sm-1 control-label">Karyawan</label>
	                    	<div class="col-sm-2">
	                    		<input type="text" step="any"  value="" class="form-control" id="td" name="td" disabled="" />
	                    	</div>
	                    </div>
						<div class="row form-group">
						<label for="" class="col-sm-2 control-label">Uang Makan</label>
					      <div class="col-sm-3">
	                    		<input type="text" step="any"  value="" class="form-control" id="ul" name="ul" disabled="" />
	                    	</div>
					    </div>
					    <div class="row form-group">
					      <label for="" class="col-sm-2 control-label">Keterangan</label>
					      <div class="col-sm-10">
					        <textarea type="text" step="any"  class="form-control" name="ket" id="" required></textarea>
					      </div>
					    </div>

	                </div>
	                <div id="test"></div>
	                <div>

	                </div>
	                <div class="modal-footer">
	                	<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
	                	<button type="submit" name="new_bon_detail" class="btn btn-primary">Simpan</button>
	                </div>
	            </form>
				
				 <script>
	            	$('#select_peg').change(function(){
	            		$.ajax({
	            			type: 'GET',
	            			url:'model/form/lembur/ajax.php',
	            			dataType: "json",
	            			data: {id_bahan: $('#select_peg').val()},
	            			success: function(data){
	            				// $("#test").text(data.result.rutin);
	            				$("#ul").val($.trim(data.result.ul));
								$("#kd_peg").val($.trim(data.result.kd_peg));
								$("#td").val($.trim(data.result.td));
	            				

	            			},
	            		});

	            	});

	            </script>



