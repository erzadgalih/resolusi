<?php

$kode_divisi = $_SESSION['kode_divisi'];
$sub_level = $_SESSION['sub_level'];
$username = $_SESSION['username'];
$nama_divisi= $_SESSION['nama_divisi'];




?>

<div class="box box-default">
	<div class="box-header with-border">
		<h3 class="box-title">Menu Utama</h3>
	</div>
		<div class="box-body">
			<section class="content">
					<!-- Small boxes (Stat box) -->
					<div class="row">
						<!-- ./col -->
						<div class="col-lg-3 col-xs-6">
							<!-- small box -->
							<div class="small-box bg-aqua">
								<div class="inner">
									<h4>PO Belum Validasi</h4>
									<p>PO Belum Validasi</p>
								</div>
								<div class="icon">
									<i class="ion ion-bag"></i>
								</div>
								<?php
								if ($_SESSION['level']=='15'){
								echo '<a href="?hal=proses-verif-po-bl-ka" class="small-box-footer">Validasi <i class="fa fa-arrow-circle-right"></i></a>';
								}
								
								?>
							</div>
						</div>
						<!-- ./col -->
						<!-- ./col -->
						<?php
						
						?>
						<div class="col-lg-3 col-xs-6">
							<!-- small box -->
							<div class="small-box bg-blue">
								<div class="inner">
								  <h4>Bon</h4>
								  <p>Bon</p>
								</div>
								<div class="icon">
								  <i class="ion ion-bag"></i>
								</div>
								<a href="#myModal" data-toggle="modal" data-target="#myModal" type="button" class="small-box-footer">Cek Data Bon <i class="fa fa-arrow-circle-right"></i></a>
									<!-- Modal -->
									<div class="modal fade" id="myModal" role="dialog">
										<div class="modal-dialog modal-sm">
											<!-- Modal content-->
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal">&times;</button>
													<h4 class="modal-title"><font color="black">Sub Menu Bon</font></h4>
												</div>
												<div class="modal-body">
													<p><font color="black">Cek Data Bon</font></p>
													<?php if ($sub_level=='1'){
													echo '<a href="?hal=proses-verif-bon-ka" type="button" class="btn btn-danger btn-lg btn-block">'.$resultfinal2["bhcount"].' Belum Validasi Kabag</a>';
													}
													else if ($sub_level=='2') {
													echo '<a href="?hal=master-bon" type="button" class="btn btn-info btn-lg btn-block">'.$resultfinal["nbcount"].' Data Bon</a>'; 
													} ?>
													<a href="?hal=history-verif-ka-bon" type="button" class="btn btn-warning btn-lg btn-block"><?php echo $resultfinal3["imcount"]; ?> Belum Validasi Sparepart</a>
													<a href="?hal=history-verif-bon" type="button" class="btn btn-success btn-lg btn-block"> <?php echo $resultfinal4["spcount"]; ?> Sudah Validasi Sparepart</a>
												</div>
												<div class="modal-footer">
												<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
												</div>
											</div>
											
										</div>
									</div>
									<!-- Modal -->
							</div>
						</div>
						<!-- ./col -->
						<!-- ./col -->
						<div class="col-lg-3 col-xs-6">
							<!-- small box -->
							<div class="small-box bg-yellow">
								<div class="inner">
									<h4>Pengajuan</h4>
									<p>Lembur</p>
								</div>
								<div class="icon">
									<i class="ion ion-person-add"></i>
								</div>
								<a href="#myModal4" data-toggle="modal" data-target="#myModal4" type="button" class="small-box-footer">Validasi Lembur <i class="fa fa-arrow-circle-right"></i></a>
										<!-- Modal -->
										<div class="modal fade" id="myModal4" role="dialog">
											<div class="modal-dialog modal-sm">
												<!-- Modal content-->
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal">&times;</button>
														<h4 class="modal-title"><font color="black">Sub Menu Lembur</font></h4>
													</div>
													<div class="modal-body">
														<p><font color="black">Validasi Lembur</font></p>
													<?php if ($sub_level=='1'){
													echo '<a href="?hal=proses-verif-lembur-kabag-staf" type="button" class="btn btn-danger btn-lg btn-block">'.$resultfina21["dr21"].' Belum Validasi Kabag</a>';
													}
													else if ($sub_level=='2') {
													echo '<a href="?hal=master-lembur" type="button" class="btn btn-info btn-lg btn-block"> Data lembur</a>'; 
													} ?>
													<p><font color="black">Validasi Karyawan</font></p>
													<?php if ($sub_level=='1'){
													echo '<a href="?hal=verif-pengajuan-kabag" type="button" class="btn btn-danger btn-lg btn-block">'.$resultfina44["dr44"].' Belum Validasi Kabag</a>';
													}
													else if ($sub_level=='2') {
													echo '<a href="?hal=master-pengajuan" type="button" class="btn btn-info btn-lg btn-block"> Data Pengajuan</a>'; 
													} ?>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
													</div>
												</div>
											</div>
										</div>
										<!-- Modal -->
							</div>
						</div>
						<!-- ./col -->

						<!-- ./col -->
						<div class="col-lg-3 col-xs-6">
							<!-- small box -->
							<div class="small-box bg-green">
								<div class="inner">
								  <h4>Pesanan</h4>
								  <p>RnD</p>
								</div>
								<div class="icon">
								  <i class="ion ion-bag"></i>
								</div>
								<a href="#myModal1" data-toggle="modal" data-target="#myModal1" type="button" class="small-box-footer">Cek Data Pesanan RnD <i class="fa fa-arrow-circle-right"></i></a>
									<!-- Modal -->
									<div class="modal fade" id="myModal1" role="dialog">
										<div class="modal-dialog modal-sm">
											<!-- Modal content-->
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal">&times;</button>
													<h4 class="modal-title"><font color="black">Sub Menu Pesanan RnD</font></h4>
												</div>
												<div class="modal-body">
													<p><font color="black">Cek Data Pesanan RnD</font></p>
													<?php if ($sub_level=='1'){
													echo '<a href="?hal=proses-verif-meba-kabag-bl" type="button" class="btn btn-primary btn-lg btn-block"> Meba Belum Verifikasi Kabag</a>';
													} 
													else if ($sub_level=='3'){
													echo '<a href="?hal=pp-cetakan" type="button" class="btn btn-primary btn-lg btn-block"> Cek Data Cetakan</a>
													<a href="?hal=pp-meba" type="button" class="btn btn-primary btn-lg btn-block"> Cek Data Meba</a>';
														} 
													
													?>
													<!-- <a href="?hal=history-verif-ka-bon" type="button" class="btn btn-warning btn-lg btn-block"><?php echo $resultfinal3["imcount"]; ?> Cek Verifikasi</a> -->
												</div>
												<div class="modal-footer">
												<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
												</div>
											</div>
											
										</div>
									</div>
									<!-- Modal -->
							</div>
						</div>
						<!-- ./col -->
			</section>
		</div>
		<!-- /.box-body -->
</div>