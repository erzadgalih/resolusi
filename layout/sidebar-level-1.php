<?php


$kode_divisi = $_SESSION['kode_divisi'];
$sub_level = $_SESSION['sub_level'];
$username = $_SESSION['username'];
$nama_divisi= $_SESSION['nama_divisi'];
$periode= $_SESSION['periode'];
$date=date('Y-m-d');



///     untuk perhitungan jumlah daftar //////////////////
$sq1 = "SELECT count(kd_brg) as brgj FROM rz_brg ";
$rs1 = mysqli_query($koneksi, $sq1);
$rz1 = mysqli_fetch_array($rs1);

$sq2 = "SELECT count(kodes) as supj FROM rz_sup ";
$rs2 = mysqli_query($koneksi, $sq2);
$rz2 = mysqli_fetch_array($rs2);

$sq3 = "SELECT count(kd_cust) as cusj FROM rz_cust ";
$rs3 = mysqli_query($koneksi, $sq3);
$rz3 = mysqli_fetch_array($rs3);

$sq4 = "SELECT count(no_bukti) as belij FROM rz_beli where per='$periode' ";
$rs4 = mysqli_query($koneksi, $sq4);
$rz4 = mysqli_fetch_array($rs4);

$sq5 = "SELECT count(no_bukti) as belij FROM rz_beli";
$rs5 = mysqli_query($koneksi, $sq5);
$rz5 = mysqli_fetch_array($rs5);

$sq6 = "SELECT count(no_bukti) as jualj FROM rz_jual where tgl='$date' ";
$rs6 = mysqli_query($koneksi, $sq6);
$rz6 = mysqli_fetch_array($rs6);

$sq7 = "SELECT count(no_bukti) as jualj FROM rz_jual where per='$periode'";
$rs7 = mysqli_query($koneksi, $sq7);
$rz7 = mysqli_fetch_array($rs7);

$sq8 = "SELECT count(no_bukti) as jualj FROM rz_jual";
$rs8 = mysqli_query($koneksi, $sq8);
$rz8 = mysqli_fetch_array($rs8);
//---------------------------------------------------------------


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
				<li class="<?php if($_GET['hal']=="dashboard-level-".$_SESSION['level']."") { echo 'active'; } ?>"><a href="?hal=dashboard-level-<?php echo $_SESSION['level']; ?>"><i class="fa fa-university"></i> <span>Dashboard</span></a></li>
				
				<li class="treeview">
					<a href="#">
						<i class="fa fa-newspaper-o"></i> <span>MASTER</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<?php
						if ($_SESSION['level']=='1'){
						echo '
						<li><a href="?hal=proses-brg">BARANG <span class="label label-primary pull-right"> '.$rz1["brgj"].'</span></a></li>
						<li><a href="?hal=proses-sup">SUPPLIER <span class="label label-primary pull-right"> '.$rz2["supj"].'</span></a></li>
						<li><a href="?hal=proses-cus">PELANGGAN <span class="label label-primary pull-right"> '.$rz3["cusj"].'</span></a></li>
						';}
						
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
						if ($_SESSION['level']=='1'){
							echo '
							<li><a href="?hal=proses-beli">PERIODE '.$_SESSION["periode"].'<span class="label label-primary pull-right"> '.$rz4["belij"].'</span></a></li>
							<li><a href="?hal=proses-beli2">SEMUA <span class="label label-primary pull-right"> '.$rz5["belij"].'</span></a></li>
							
							';}
						?>
					</ul>
				</li>
				<li class="treeview">
					<a href="#">
						<i class="fa fa-shopping-cart"></i> <span>PENJUALAN</span>
						<span class="pull-right-container">
							<i class="fa fa-angle-left pull-right"></i>
						</span>
					</a>
					<ul class="treeview-menu">
						<?php
						if ($_SESSION['level']=='1'){
							echo '
							<li><a href="?hal=proses-beli">TANGGAL '.$date.'<span class="label label-primary pull-right"> '.$rz6["jualj"].'</span></a></li>
							<li><a href="?hal=proses-beli">PERIODE '.$_SESSION["periode"].'<span class="label label-primary pull-right"> '.$rz7["jualj"].'</span></a></li>
							<li><a href="?hal=proses-beli2">SEMUA <span class="label label-primary pull-right"> '.$rz8["jualj"].'</span></a></li>
							
							';}
						?>
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
					<?php if ($level=='1'){
									echo '
						<li><a href="?hal=proses-verif-bon-ka">BARANG <span class="label label-primary pull-right"> '.$rz1["brgj"].'</span></a></li>
						<li><a href="?hal=proses-verif-bon-ka">SUPLIER <span class="label label-primary pull-right"> '.$rz2["supj"].'</span></a></li>
						<li><a href="?hal=proses-verif-bon-ka">PELANGGAN <span class="label label-primary pull-right"> '.$rz3["cusj"].'</span></a></li>
						<li><a href="?hal=proses-verif-bon-ka">PEMBELIAN </a></li>
						<li><a href="?hal=proses-verif-bon-ka">PENJUALAN </a></li>
						<li><a href="?hal=proses-verif-bon-ka">OMSET </a></li>
						<li><a href="?hal=proses-verif-bon-ka">KARTU STOK </a></li>
						<li><a href="?hal=proses-verif-bon-ka">PIUTANG </a></li>
						<li><a href="?hal=proses-verif-bon-ka">BAGI HASIL </a></li>
						<li><a href="?hal=proses-verif-bon-ka">LABA </a></li>
						<li><a href="?hal=proses-verif-bon-ka">PERSEDIAAN </a></li>';
						}
						
						?>
						
					</ul>
				</li>
			</ul>