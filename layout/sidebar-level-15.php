<?php

// if ($_SESSION['sub_level']=='1'){
// 	//KA / BL
// 	$sql0 = "SELECT count(no_po) as nbcount12 FROM bl_po where ttd<>'' and ttd1<>'' and ttd2='' order by no_po ";
// 	$result0 = mysqli_query($koneksi, $sql0);
// 	$resultfinal0 = mysqli_fetch_array($result0);
	
// 	$sql100 = "SELECT count(no_bukti) as nbcount3 FROM sp_pp where sp<>'MB' AND sp<>'1R&' AND sp<>'CT' AND ttd1<>'' and ttd2<>'' and ttd3<>'' and ttd4='' order by NO_BUKTI,DR";
// 	$result100 = mysqli_query($koneksi, $sql100);
// 	$resultfinal100 = mysqli_fetch_array($result100);
// }
// else if ($_SESSION['sub_level']=='2') {
// 	//BL1
// 	$sql0 = "SELECT count(no_po) as nbcount12 FROM bl_po where kdpbl='NB' and ttd1='' order by no_po ";
// 	$result0 = mysqli_query($koneksi, $sql0);
// 	$resultfinal0 = mysqli_fetch_array($result0);
// }

// else if ($_SESSION['sub_level']=='3') {
// 	//BL0
// 	$sql0 = "SELECT count(no_po) as nbcount12 FROM bl_po where kdpbl='NB' and ttd='' order by no_po ";
// 	$result0 = mysqli_query($koneksi, $sql0);
// 	$resultfinal0 = mysqli_fetch_array($result0);
// }




$kode_divisi = $_SESSION['kode_divisi'];
$sub_level = $_SESSION['sub_level'];
$username = $_SESSION['username'];
$nama_divisi= $_SESSION['nama_divisi'];



$sq1 = "SELECT count(kd_brg) as brgj FROM rz_brg ";
$rs1 = mysqli_query($koneksi, $sq1);
$rz1 = mysqli_fetch_array($rs1);

$sq2 = "SELECT count(kodes) as supj FROM rz_sup ";
$rs2 = mysqli_query($koneksi, $sq2);
$rz2 = mysqli_fetch_array($rs2);

$sq3 = "SELECT count(kd_cust) as cusj FROM rz_cust ";
$rs3 = mysqli_query($koneksi, $sq3);
$rz3 = mysqli_fetch_array($rs3);



?>
		<!-- Sidebar user panel -->
			<div class="user-panel">
				<div class="pull-left image">
					<img src="assets/dist/img/<?php echo $_SESSION['gambar_profil']; ?>" class="img-circle" alt="User Image">
				</div>
				<div class="pull-left info">
					<p><?php echo $_SESSION['nama']; ?></p>
					<a href="#"><i class="fa fa-circle text-success"></i> <?php echo $_SESSION['keterangan_level']; ?></a>
				</div>
			</div>
			<!-- sidebar menu: : style can be found in sidebar.less -->
			<ul class="sidebar-menu" data-widget="tree">
				<li class="header">MAIN NAVIGATION</li>
				<li class="<?php if($_GET['hal']=="dashboard-level-".$_SESSION['level']."") { echo 'active'; } ?>"><a href="?hal=dashboard-level-<?php echo $_SESSION['level']; ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
				<li class="treeview">
					<a href="#">
						<i class="fa fa-shopping-cart"></i> <span>MASTER</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<?php
						if ($_SESSION['level']=='15'){
						echo '
						<li><a href="?hal=proses-brg">BARANG <span class="label label-primary pull-right"> '.$rz1["brgj"].'</span></a></li>
						<li><a href="?hal=proses-sup">SUPPLIER <span class="label label-primary pull-right"> '.$rz2["supj"].'</span></a></li>
						<li><a href="?hal=proses-cus">PELANGGAN <span class="label label-primary pull-right"> '.$rz3["cusj"].'</span></a></li>
						<li><a href="?hal=history-verif-bon">BON1 <span class="label label-primary pull-right"> '.$rz3["cusj"].'</span></a></li>
						<li><a href="?hal=history-verif-ka-bon">BON2 <span class="label label-primary pull-right"> '.$rz3["cusj"].'</span></a></li>';}
						
						?>
					</ul>
				</li>
				<li class="treeview">
					<a href="#">
						<i class="fa fa-shopping-cart"></i> <span>PEMBELIAN</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
				<?php
						if ($_SESSION['sub_level']=='1'){
						echo '
						<li><a href="?hal=proses-verif-pp-purch-ppnb">Nonbahan Belum Validasi <span class="label label-primary pull-right"> '.$resultfinal100["nbcount3"].'</span></a></li>
						<li><a href="?hal=proses-verif-pp-bl-jht-lr">Order Jahit Luar <span class="label label-primary pull-right"> '.$resultfinal4jh["ppjhcount"].'</span></a></li>
						<li><a href="#"><i class="fa fa-angle-double-down"></i> RnD</a></li>
						<li><a href="?hal=proses-verif-meba-kabag-bl">Meba </a></li>
						'; }
						else if ($sub_level=='3'){
						echo '
						<li><a href="?hal=pp-cetakan">Cek Data Cetakan </a></li>
						<li><a href="?hal=pp-meba">Cek Data Meba </a></li>
						'; }
						?>
					</ul>
				</li>
				<li class="treeview">
					<a href="#">
						<i class="fa fa-archive"></i> <span>PENJUALAN</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<li><a href="#"><i class="fa fa-angle-double-down"></i> Lembur</a></li>
						<?php if ($sub_level=='1'){
						echo '
						<li><a href="?hal=proses-verif-lembur-kabag-staf">Validasi Kabag<span class="label label-primary pull-right"> '.$resultfina21["dr21"].'</span></a></li>';
						}
						else if ($sub_level=='2') {
						echo '<li><a href="?hal=master-lembur">Lembur</a></li>'; 
						} ?>

						<li><a href="#"><i class="fa fa-angle-double-down"></i> Karyawan Baru</a></li>
						<?php if ($sub_level=='1'){
						echo '
						<li><a href="?hal=verif-pengajuan-kabag">Karyawan<span class="label label-primary pull-right">'.$resultfina44["dr44"].'</span></a></li>';
						}
						else if ($sub_level=='2') {
						echo '
						<li><a href="?hal=master-pengajuan">Data Pengajuan</a></li>';
						} ?>
					</ul>
				</li>
				<li class="treeview">
					<a href="#">
						<i class="fa fa-industry"></i> <span>LAPORAN</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
					<?php if ($level=='15'){
									echo '
						<li><a href="?hal=proses-verif-bon-ka">BARANG <span class="label label-primary pull-right"> '.$rz1["brgj"].'</span></a></li>
						<li><a href="?hal=proses-verif-bon-ka">SUPLIER <span class="label label-primary pull-right"> '.$rz2["supj"].'</span></a></li>
						<li><a href="?hal=proses-verif-bon-ka">PELANGGAN <span class="label label-primary pull-right"> '.$rz3["cusj"].'</span></a></li>
						<li><a href="?hal=proses-verif-bon-ka">PEMBELIAN </a></li>
						<li><a href="?hal=proses-verif-bon-ka">PENJUALAN </a></li>
						<li><a href="?hal=proses-verif-bon-ka">OMSET </a></li>';
						}
						
						?>
						
					</ul>
				</li>
			</ul>