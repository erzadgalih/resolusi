		<!-- Header Navbar: style can be found in header.less -->
		<nav class="navbar navbar-static-top">
			<!-- Sidebar toggle button-->
			<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
				<span class="sr-only">Toggle navigation</span>
			</a>

			<div class="navbar-custom-menu">
				<ul class="nav navbar-nav">
<!--------  BATAS SUCI --------------->
					<!-- Control Sidebar Toggle Button -->
					<li>
						<a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
					</li>
<!--------  BATAS SUCI --------------->

					<!-- Tasks: style can be found in dropdown.less -->
					<li class="dropdown tasks-menu">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="fa fa-hourglass"></i>
							<!-- <span class="label label-danger">9</span> -->
						</a>
						<ul class="dropdown-menu">
							<!-- <li class="header">You have 9 tasks</li> -->
							<li>
								<!-- inner menu: contains the actual data -->
								<ul class="menu">
									<li><!-- Task item -->
										<a href="#">
											<!-- <h3>
												Design some buttons
												<small class="pull-right">20%</small>
											</h3> -->
<!--  task item -->
											<!-- <div class="progress xs">
												<div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"
														 aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
													<span class="sr-only">20% Complete</span>
												</div>
											</div> -->
<!--  task item -->
										</a>
									</li>
									<!-- end task item -->
								</ul>
<!--  task item -->

<form method="POST">
				<div class="box-header with-border">
					<div class="col-xs-12">
						<h3 class="box-title">
							Ganti Periode
						</h3>
						<button href="" type="submit" name="ganti_per" class="pull-right btn btn-danger" ><i class="fa fa-check-square"></i>
							Simpan
						</button>
					</div>
				</div>
					<table id="example10" class="table table-striped table-bordered table-hover">
						<thead>
							<tr>
								<td>Periode</td>
								<td>:</td>
								<td><input type="text" name="periode" class="form-control pull-right" value="<?php echo $_SESSION['periode']; ?>" >
								</td>
							</tr>
						</thead>

					</table>
			</form>
<!--  task item -->
							</li>
							<!-- <li class="footer">
								<a href="#">View all tasks</a>
							</li> -->
						</ul>
					</li>
<?php
if(isset($_POST["ganti_per"])) {
	// $username				= $_SESSION['username'];
	$_SESSION['periode'] = $_POST['periode'];
	header('Location: ' . $_SERVER['HTTP_REFERER']);

}
?>
					<!-- User Account: style can be found in dropdown.less -->
					<li class="dropdown user user-menu">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<img src="assets/dist/img/<?php echo $_SESSION['gambar_profil']; ?>" class="user-image" alt="User Image">
							<span class="hidden-xs"><?php echo $_SESSION['nama']; ?></span>
						</a>
						<ul class="dropdown-menu">
							<!-- User image -->
							<li class="user-header">
								<img src="assets/dist/img/<?php echo $_SESSION['gambar_profil']; ?>" class="img-circle" alt="User Image">
								<p>
									<?php echo $_SESSION['nama']; ?>
									<small><?php echo $_SESSION['keterangan_level']; ?></small>
									<small><?php echo $_SESSION['periode']; ?></small>
								</p>
							</li>
							<!-- Menu Footer-->
							<li class="user-footer">

			
									<div>
									<a href="?hal=ganti-password" class="btn btn-default btn-flat">Ganti Password</a>
									<a href="logout.php" class="pull-right btn btn-danger btn-flat"> <i class="fa fa-power-off"></i> Keluar</a>
									</div>

								<!-- <div class="pull-left">
									<a href="?hal=ganti-password" class="btn btn-default btn-flat">Ganti Password</a>
									<a href="?hal=ganti-periode" class="btn btn-default btn-flat">Ganti Periode</a>
								</div>
								<div class="pull-right">
									<a href="logout.php" class="btn btn-default btn-flat">Keluar</a>
								</div> -->

							</li>
						</ul>
					</li>




				</ul>
			</div>
		</nav>

		
