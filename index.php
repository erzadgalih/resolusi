<?php
ob_start();
session_start();
date_default_timezone_set('Asia/Jakarta');
include "config/database.php";
include "auth.php";
include "inc/qr/qrlib.php";
require 'inc/inc.library.php';
require 'inc/inc.pagination.php';
require 'inc/inc.telegram.php';
$level = $_SESSION['level'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Dashboard</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- No need to index this site on google or another search engine -->
	<meta name="robots" content="noindex">
	<link rel="icon" type="image/png" href="assets/dist/img/dr.png">
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="assets/bower_components/font-awesome/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="assets/bower_components/Ionicons/css/ionicons.min.css">
	<!-- iCheck -->
	<link rel="stylesheet" href="assets/plugins/iCheck/square/blue.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
	<!-- AdminLTE Skins. Choose a skin from the css/skins
			 folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="assets/dist/css/skins/_all-skins.min.css">
	<!-- Morris chart -->
	<!-- <link rel="stylesheet" href="assets/bower_components/morris.js/morris.css"> -->
	<!-- jvectormap -->
	<link rel="stylesheet" href="assets/bower_components/jvectormap/jquery-jvectormap.css">
	<!-- Date Picker -->
	<link rel="stylesheet" href="assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
	<!-- Daterange picker -->
	<link rel="stylesheet" href="assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
	<!-- bootstrap wysihtml5 - text editor -->
	<link rel="stylesheet" href="assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

	<script src="assets/bower_components/jquery/dist/jquery.min.js"></script>
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	<!-- Google Font -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

	<header class="main-header">
	<!-- Logo -->
	<a href="#" class="logo">
		<!-- mini logo for sidebar mini 50x50 pixels -->
		<!-- <span class="logo-mini"><b>ID</b>ST</span> -->
		<img src="assets/dist/img/rz.png" width="30px" height="30px">
		<!-- logo for regular state and mobile devices -->
		<!-- <span class="logo-lg"><b>PT.</b> Intidragon</span> -->
	</a>
		<?php include "layout/navbar.php"; ?>
	</header>
	<!-- Left side column. contains the logo and sidebar -->
	<aside class="main-sidebar">
		<!-- sidebar: style can be found in sidebar.less -->
		<section class="sidebar">
			<?php include "layout/sidebar-level-".$level.".php"; ?>
		</section>
		<!-- /.sidebar -->
	</aside>

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<!-- <section class="content-header">
			<h1>
			<?php include "layout/judul.php"; ?>
			</h1>
		</section> -->

		<!-- Main content -->
		<section class="content">
			<?php include "data.php"; ?>
		</section>
		<!-- /.content -->
	</div>

	<!-- /.content-wrapper -->
	<footer class="main-footer">
	<?php include "layout/footer.php"; ?>
	<!-- /.container -->
	</footer>
	
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark"">
	<!-- Create the tabs -->
	<ul class="nav nav-tabs nav-justified control-sidebar-tabs">
	  <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
	  <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
	</ul>
	<!-- Tab panes -->
	<div class="tab-content">
	  <!-- Home tab content -->
	  <div class="tab-pane" id="control-sidebar-home-tab">
		<h3 class="control-sidebar-heading">Recent Activity</h3>
		<ul class="control-sidebar-menu">
		  <li>
			<a href="javascript:void(0)">
			  <i class="menu-icon fa fa-birthday-cake bg-red"></i>

			  <div class="menu-info">
				<h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

				<p>Will be 23 on April 24th</p>
			  </div>
			</a>
		  </li>
		  <li>
			<a href="javascript:void(0)">
			  <i class="menu-icon fa fa-user bg-yellow"></i>

			  <div class="menu-info">
				<h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

				<p>New phone +1(800)555-1234</p>
			  </div>
			</a>
		  </li>
		  <li>
			<a href="javascript:void(0)">
			  <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

			  <div class="menu-info">
				<h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

				<p>nora@example.com</p>
			  </div>
			</a>
		  </li>
		  <li>
			<a href="javascript:void(0)">
			  <i class="menu-icon fa fa-file-code-o bg-green"></i>

			  <div class="menu-info">
				<h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

				<p>Execution time 5 seconds</p>
			  </div>
			</a>
		  </li>
		</ul>
		<!-- /.control-sidebar-menu -->

		<h3 class="control-sidebar-heading">Tasks Progress</h3>
		<ul class="control-sidebar-menu">
		  <li>
			<a href="javascript:void(0)">
			  <h4 class="control-sidebar-subheading">
				Custom Template Design
				<span class="label label-danger pull-right">70%</span>
			  </h4>

			  <div class="progress progress-xxs">
				<div class="progress-bar progress-bar-danger" style="width: 70%"></div>
			  </div>
			</a>
		  </li>
		  <li>
			<a href="javascript:void(0)">
			  <h4 class="control-sidebar-subheading">
				Update Resume
				<span class="label label-success pull-right">95%</span>
			  </h4>

			  <div class="progress progress-xxs">
				<div class="progress-bar progress-bar-success" style="width: 95%"></div>
			  </div>
			</a>
		  </li>
		  <li>
			<a href="javascript:void(0)">
			  <h4 class="control-sidebar-subheading">
				Laravel Integration
				<span class="label label-warning pull-right">50%</span>
			  </h4>

			  <div class="progress progress-xxs">
				<div class="progress-bar progress-bar-warning" style="width: 50%"></div>
			  </div>
			</a>
		  </li>
		  <li>
			<a href="javascript:void(0)">
			  <h4 class="control-sidebar-subheading">
				Back End Framework
				<span class="label label-primary pull-right">68%</span>
			  </h4>

			  <div class="progress progress-xxs">
				<div class="progress-bar progress-bar-primary" style="width: 68%"></div>
			  </div>
			</a>
		  </li>
		</ul>
		<!-- /.control-sidebar-menu -->

	  </div>
	  <!-- /.tab-pane -->
	  <!-- Stats tab content -->
	  <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
	  <!-- /.tab-pane -->
	  <!-- Settings tab content -->
	  <div class="tab-pane" id="control-sidebar-settings-tab">
		<form method="post">
		  <h3 class="control-sidebar-heading">General Settings</h3>

		  <div class="form-group">
			<label class="control-sidebar-subheading">
			  Report panel usage
			  <input type="checkbox" class="pull-right" checked>
			</label>

			<p>
			  Some information about this general settings option
			</p>
		  </div>
		  <!-- /.form-group -->

		  <div class="form-group">
			<label class="control-sidebar-subheading">
			  Allow mail redirect
			  <input type="checkbox" class="pull-right" checked>
			</label>

			<p>
			  Other sets of options are available
			</p>
		  </div>
		  <!-- /.form-group -->

		  <div class="form-group">
			<label class="control-sidebar-subheading">
			  Expose author name in posts
			  <input type="checkbox" class="pull-right" checked>
			</label>

			<p>
			  Allow the user to show his name in blog posts
			</p>
		  </div>
		  <!-- /.form-group -->

		  <h3 class="control-sidebar-heading">Chat Settings</h3>

		  <div class="form-group">
			<label class="control-sidebar-subheading">
			  Show me as online
			  <input type="checkbox" class="pull-right" checked>
			</label>
		  </div>
		  <!-- /.form-group -->

		  <div class="form-group">
			<label class="control-sidebar-subheading">
			  Turn off notifications
			  <input type="checkbox" class="pull-right">
			</label>
		  </div>
		  <!-- /.form-group -->

		  <div class="form-group">
			<label class="control-sidebar-subheading">
			  Delete chat history
			  <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
			</label>
		  </div>
		  <!-- /.form-group -->
		</form>
	  </div>
	  <!-- /.tab-pane -->
	</div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
	   immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->


<!-- jQuery 3 -->
<script src="assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
	$.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- Select2 -->
<link rel="stylesheet" href="assets/bower_components/select2/dist/css/select2.min.css">
<!-- Morris.js charts -->
<script src="assets/bower_components/raphael/raphael.min.js"></script>
<!-- <script src="assets/bower_components/morris.js/morris.min.js"></script> -->
<!-- Sparkline -->
<script src="assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="assets/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="assets/bower_components/moment/min/moment.min.js"></script>
<script src="assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- select2 -->
<script src="assets/bower_components/select2/dist/js/select2.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="assets/dist/js/pages/dashboard.js"></script> -->
<!-- iCheck -->
<script src="assets/plugins/iCheck/icheck.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="assets/dist/js/demo.js"></script>

<!-- ChartJS -->
<script src="assets/bower_components/chart.js/Chart.js"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="assets/dist/js/pages/dashboard2.js"></script>

<!-- Load Select Cained -->
<script src="assets/dist/js/jquery.chained.js"></script>
<script src="assets/dist/js/jquery.chained.min.js"></script>
<script src="assets/dist/js/jquery.chained.remote.js"></script>
<script src="assets/dist/js/jquery.chained.remote.min.js"></script>

	<script>
// jQuery.noConflict(); 
$(function () {
	$('#example1').DataTable({
		'paging'		: true,
		'lengthChange'	: true,
		'searching'		: true,
		'ordering'		: true,
		'info'			: true,
		'autoWidth'		: true,
		'scrollX'		: false,
		'responsive'	: true,
		'deferRender'	: true,
		'lengthMenu'	: [[25, 50, -1], [25, 50, "All"]]
		//'modal' : true,
		//'responsive': {
		//		details: {
		//			renderer: $.fn.dataTable.Responsive.renderer.tableAll()
		//		}
		//	}
		})

	$('#example2').DataTable({
		'paging'		: true,
		'lengthChange'	: true,
		'searching'		: true,
		'ordering'		: true,
		'info'			: true,
		'autoWidth'		: true,
		'scrollX'		: false,
		'responsive'	: true,
		'deferRender'	: true,
		'lengthMenu'	: [[25, 50, -1], [25, 50, "All"]]
		//'modal' : true,
		//'responsive': {
		//		details: {
		//			renderer: $.fn.dataTable.Responsive.renderer.tableAll()
		//		}
		//	}
		})

})
</script>
<script>
$(function () {
	$('#example3').DataTable({
		'paging'		: true,
		'lengthChange'	: true,
		'searching'		: true,
		'ordering'		: true,
		'info'			: true,
		'autoWidth'		: true,
		'scrollX'		: true,
		'responsive'	: true
		})
})
</script>

<script>
	$(document).ready(function() {
		$('.select-basic').select2({
			placeholder: "------------- Pilih / Cari Kode / Nama -------------",
			allowClear: true
		});
	});
	$.fn.modal.Constructor.prototype.enforceFocus = function() {
		function initiateSelect2() {
			$('.select-basic').select2();
		}
		initiateSelect2();
		$('.modal').on('shown.bs.modal', function () {
			initiateSelect2();
		})
	};
</script>

<script>
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function (e) {
				$('#blah').attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
			}
		}
	$("#file").change(function(){
	readURL(this);
	});

	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function (e) {
				$('#fir_1').attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}
	}
	$("#file_1").change(function(){
	readURL(this);
	});

	function readURL0(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function (e) {
				$('#fir_0').attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}
	}
	$("#file_0").change(function(){
	readURL0(this);
	});

	function readURL1(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function (e) {
				$('#fir_1').attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}
	}
	$("#file_1").change(function(){
	readURL1(this);
	});
</script>
<script>
	//Date picker
	$('#datepicker0').datepicker({
		format : "yyyy-mm-dd",
		autoclose: true
	});
	$('#datepicker').datepicker({
		format : "yyyy-mm-dd",
		autoclose: true
	});
	$('#datepicker1').datepicker({
		format : "yyyy-mm-dd",
		autoclose: true
	});
	$('#datepicker2').datepicker({
		format : "yyyy-mm-dd",
		autoclose: true
	});
</script>

<script>
	$(function () {
		$('input').iCheck({
			checkboxClass: 'icheckbox_square-blue',
			radioClass: 'iradio_square-blue',
			increaseArea: '20%' /* optional */
		});
		$('input.all').on('ifChecked ifUnchecked', function(event) {
		if (event.type == 'ifChecked') {
			$('input.check').iCheck('check');
		} else {
			$('input.check').iCheck('uncheck');
		}
	});
	$('input.check').on('ifUnchecked', function(event) {
		$('input.all').iCheck('uncheck');
	});
	});
</script>


</body>
</html>
<?php
mysqli_close($koneksi);
ob_end_flush();
?>


