<?php

if ($_SESSION['sub_level']=='1'){
	//KA / BL
	$sql0 = "SELECT count(no_po) as nbcount12 FROM bl_po where ttd<>'' and ttd1<>'' and ttd2='' order by no_po ";
	$result0 = mysqli_query($koneksi, $sql0);
	$resultfinal0 = mysqli_fetch_array($result0);
	
	$sql100 = "SELECT count(no_bukti) as nbcount3 FROM sp_pp where sp<>'MB' AND sp<>'1R&' AND sp<>'CT' AND ttd1<>'' and ttd2<>'' and ttd3<>'' and ttd4='' order by NO_BUKTI,DR";
	$result100 = mysqli_query($koneksi, $sql100);
	$resultfinal100 = mysqli_fetch_array($result100);
}
else if ($_SESSION['sub_level']=='2') {
	//BL1
	$sql0 = "SELECT count(no_po) as nbcount12 FROM bl_po where kdpbl='NB' and ttd1='' order by no_po ";
	$result0 = mysqli_query($koneksi, $sql0);
	$resultfinal0 = mysqli_fetch_array($result0);
}

else if ($_SESSION['sub_level']=='3') {
	//BL0
	$sql0 = "SELECT count(no_po) as nbcount12 FROM bl_po where kdpbl='NB' and ttd='' order by no_po ";
	$result0 = mysqli_query($koneksi, $sql0);
	$resultfinal0 = mysqli_fetch_array($result0);
}




$kode_divisi = $_SESSION['kode_divisi'];
$sub_level = $_SESSION['sub_level'];
$username = $_SESSION['username'];
$nama_divisi= $_SESSION['nama_divisi'];

$sql = "SELECT count(no_bukti) as nbcount FROM bl_bon WHERE kd_bag='$kode_divisi' and ttd1='' order by no_bukti DESC ";
$result = mysqli_query($koneksi, $sql);
$resultfinal = mysqli_fetch_array($result);

$sql2 = "SELECT count(no_bukti) as bhcount FROM bl_bon WHERE kd_bag='$kode_divisi' and ttd1='' and ttd2='' order by no_bukti DESC ";
$result2 = mysqli_query($koneksi, $sql2);
$resultfinal2 = mysqli_fetch_array($result2);


$sql3 = "SELECT count(no_bukti) as imcount FROM bl_bon WHERE kd_bag='$kode_divisi' and ttd1<>'' and ttd2=''  order by no_bukti DESC ";
$result3 = mysqli_query($koneksi, $sql3);
$resultfinal3 = mysqli_fetch_array($result3);


$sql4 = "SELECT count(no_bukti) as spcount FROM bl_bon WHERE kd_bag='$kode_divisi' and ttd1<>'' and ttd2<>''  order by no_bukti DESC ";
$result4 = mysqli_query($koneksi, $sql4);
$resultfinal4 = mysqli_fetch_array($result4);

$sql21 = "SELECT count(no_bukti) AS dr21 FROM hrd_lemburh WHERE bagian='$nama_divisi' and ttd1='' and status='HO' ORDER BY no_bukti,bagian ";
$result21 = mysqli_query($koneksi, $sql21);
$resultfina21 = mysqli_fetch_array($result21);

$sql44 = "SELECT count(no_bukti) AS dr44 FROM hrd_karyawanh WHERE nm_bag='$nama_divisi' and ttd1='' ORDER BY no_bukti,nm_bag ";
$result44 = mysqli_query($koneksi, $sql44);
$resultfina44 = mysqli_fetch_array($result44);

// PP Order Jahit Luar
$sql4jh = "SELECT count(no_bukti) AS ppjhcount FROM sp_pp WHERE sp='JHL' AND ttd1<>''  AND ttd2<>'' AND ttd3<>'' AND ttd4<>'' AND ttd5='' ";
$result4jh = mysqli_query($koneksi, $sql4jh);
$resultfinal4jh = mysqli_fetch_array($result4jh);


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
									<h4><?php echo $resultfinal0["nbcount12"]; ?></h4>
									<p>PO Belum Validasi</p>
								</div>
								<div class="icon">
									<i class="ion ion-bag"></i>
								</div>
								<?php
								if ($_SESSION['sub_level']=='1'){
								echo '<a href="?hal=proses-verif-po-bl-ka" class="small-box-footer">Validasi <i class="fa fa-arrow-circle-right"></i></a>';
								}
								else if ($_SESSION['sub_level']=='2') {
								echo '<a href="?hal=proses-verif-po-bl-nb-ttd1" class="small-box-footer">Validasi <i class="fa fa-arrow-circle-right"></i></a>';
								}
								else if ($_SESSION['sub_level']=='3') {
								echo '<a href="?hal=proses-verif-po-bl-nb-ttd0" class="small-box-footer">Validasi <i class="fa fa-arrow-circle-right"></i></a>';
								}
								?>
							</div>
						</div>
						<!-- ./col -->
						<!-- ./col -->
						<?php
						if ($_SESSION['sub_level']=='1'){
						echo '
						<div class="col-lg-3 col-xs-6">
							<!-- small box -->
							<div class="small-box bg-blue">
								<div class="inner">
								  <h4>PP</h4>
								  <p>PP Belum Validasi</p>
								</div>
								<div class="icon">
								  <i class="ion ion-bag"></i>
								</div>
								<a href="#myModal2" data-toggle="modal" data-target="#myModal2" type="button" class="small-box-footer">Validasi <i class="fa fa-arrow-circle-right"></i></a>
									<!-- Modal -->
									<div class="modal fade" id="myModal2" role="dialog">
										<div class="modal-dialog modal-sm">
											<!-- Modal content-->
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal">&times;</button>
													<h4 class="modal-title"><font color="black">Sub Menu PP</font></h4>
												</div>
												<div class="modal-body">
													<p><font color="black">Cek Data PP</font></p>
													<a href="?hal=proses-verif-pp-purch-ppnb" class="btn btn-primary btn-lg btn-block">'.$resultfinal100["nbcount3"].' Nonbahan Belum Validasi </a>
													<a href="?hal=proses-verif-pp-bl-jht-lr" class="btn btn-danger btn-lg btn-block">'.$resultfinal4jh["ppjhcount"].' Order Jahit Luar </a>

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
						';
						}
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