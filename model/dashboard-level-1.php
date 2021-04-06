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
									<h4>TOKO RETAIL</h4>
									<p>Snack,Minuman,Sembako,dll.</p>
								</div>
								<div class="icon">
									<i class="ion ion-bag"></i>
								</div>
								<a href="#myModal1" data-toggle="modal" data-target="#myModal1" type="button" class="small-box-footer">Cek Aplikasi <i class="fa fa-arrow-circle-right"></i></a>
									<!-- Modal -->
									<div class="modal fade" id="myModal1" role="dialog">
										<div class="modal-dialog modal-sm">
											<!-- Modal content-->
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal">&times;</button>
													<h4 class="modal-title"><font color="black">MENU TOKO RETAIL</font></h4>
												</div>
												<div class="modal-body">
													<p><font color="black">Maaf Belum Tersedia</font></p>
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
						<!-- ./col -->
						<?php
						
						?>
						<div class="col-lg-3 col-xs-6">
							<!-- small box -->
							<div class="small-box bg-blue">
								<div class="inner">
								  <h4>KONTER HP</h4>
								  <p>Pulsa, Paket Data,Accesories HP,dll.</p>
								</div>
								<div class="icon">
								  <i class="ion ion-bag"></i>
								</div>
								<a href="#myModal2" data-toggle="modal" data-target="#myModal2" type="button" class="small-box-footer">Cek Aplikasi <i class="fa fa-arrow-circle-right"></i></a>
									<!-- Modal -->
									<div class="modal fade" id="myModal2" role="dialog">
										<div class="modal-dialog modal-sm">
											<!-- Modal content-->
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal">&times;</button>
													<h4 class="modal-title"><font color="black">MENU KONTER HP</font></h4>
												</div>
												<div class="modal-body">
													<p><font color="black">Maaf Belum Tersedia</font></p>
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
						<!-- ./col -->
						<div class="col-lg-3 col-xs-6">
							<!-- small box -->
							<div class="small-box bg-yellow">
								<div class="inner">
									<h4>LAUNDRY</h4>
									<p>Cuci Basah,Kering,Setrika,dll.</p>
								</div>
								<div class="icon">
									<i class="ion ion-person-add"></i>
								</div>
								<a href="#myModal3" data-toggle="modal" data-target="#myModal3" type="button" class="small-box-footer">Cek Aplikasi <i class="fa fa-arrow-circle-right"></i></a>
										<!-- Modal -->
										<div class="modal fade" id="myModal3" role="dialog">
											<div class="modal-dialog modal-sm">
												<!-- Modal content-->
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal">&times;</button>
														<h4 class="modal-title"><font color="black">MENU LAUNDRY</font></h4>
													</div>
													<div class="modal-body">
													
													<p><font color="black">Maaf Belum Tersedia</font></p>
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
								  <h4>SOFTWARE HOUSE</h4>
								  <p>Programming Project</p>
								</div>
								<div class="icon">
								  <i class="ion ion-bag"></i>
								</div>
								<a href="#myModal4" data-toggle="modal" data-target="#myModal4" type="button" class="small-box-footer">Cek Aplikasi <i class="fa fa-arrow-circle-right"></i></a>
									<!-- Modal -->
									<div class="modal fade" id="myModal4" role="dialog">
										<div class="modal-dialog modal-sm">
											<!-- Modal content-->
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal">&times;</button>
													<h4 class="modal-title"><font color="black">MENU SOFTWARE HOUSE</font></h4>
												</div>
												<div class="modal-body">
													<p><font color="black">Maaf Belum Tersedia</font></p>
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







<div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Rekap Penjualan Perbulan</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <div class="btn-group">
                  <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-wrench"></i></button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                  </ul>
                </div>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-8">
                  <p class="text-center">
                    <strong>Sales: 1 Januari, 2021 - 30 Juli, 2021</strong>
                  </p>

                  <div class="chart">
                    <!-- Sales Chart Canvas -->
                    <canvas id="salesChart" style="height: 180px;"></canvas>
                  </div>
                  <!-- /.chart-responsive -->
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                  <p class="text-center">
                    <strong>Goal Completion</strong>
                  </p>

                  <div class="progress-group">
                    <span class="progress-text">Add Products to Cart</span>
                    <span class="progress-number"><b>160</b>/200</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-aqua" style="width: 80%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">Complete Purchase</span>
                    <span class="progress-number"><b>310</b>/400</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-red" style="width: 80%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">Visit Premium Page</span>
                    <span class="progress-number"><b>480</b>/800</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-green" style="width: 80%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">Send Inquiries</span>
                    <span class="progress-number"><b>250</b>/500</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-yellow" style="width: 80%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- ./box-body -->