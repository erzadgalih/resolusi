		<!-- Header Navbar: style can be found in header.less -->
		<nav class="navbar navbar-static-top">
			<!-- Sidebar toggle button-->
			<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
				<span class="sr-only">Toggle navigation</span>
			</a>

			<div class="navbar-custom-menu">
				<ul class="nav navbar-nav">
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
								</p>
							</li>
							<!-- Menu Footer-->
							<li class="user-footer">
								<div class="pull-left">
									<a href="?hal=ganti-password" class="btn btn-default btn-flat">Ganti Password</a>
								</div>
								<div class="pull-right">
									<a href="logout.php" class="btn btn-default btn-flat">Keluar</a>
								</div>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</nav>