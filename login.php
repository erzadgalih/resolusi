<?php
date_default_timezone_set('Asia/Jakarta');
$hour = date('H');
$day = date('D');
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Log in | RZ_CELL by: ERZAD GALIH WARDHANA</title>
<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<link rel="icon" type="image/png" href="/verifikasi/assets/dist/img/rz.png">
<!-- Bootstrap 3.3.7 -->
<link rel="stylesheet" href="assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="assets/bower_components/font-awesome/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="assets/bower_components/Ionicons/css/ionicons.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
<!-- iCheck -->
<link rel="stylesheet" href="assets/plugins/iCheck/square/purple.css">
	<style>
	.wrapper {
	/*This part is important for centering*/
	display: flex;
	align-items: center;
	justify-content: center;
	}

	.typing-demo {
	width: 25ch;
	animation: typing 3s steps(22), blink .5s step-end infinite alternate;
	white-space: nowrap;
	overflow: hidden;
	border-right: 3px solid;
	}

	@keyframes typing {
	from {
		width: 0
	}
	}
		
	@keyframes blink {
	50% {
		border-color: transparent
	}
	}
	</style>

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">

<div class="login-box">
	<div class="login-logo">
		<img src="assets/dist/img/rz.png" width="170" height="170">
	</div>
	<!-- /.login-logo -->
	<div class="login-box-body">
	<p class="login-box-msg">Masuk untuk akses program</p>
	<form action="cek_login.php" method="post">
		<div class="form-group has-feedback">
		<input type="text" name="username" class="form-control" placeholder="Username">
		<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
		</div>
		<div class="form-group has-feedback">
		<input type="password" name="password" class="form-control" placeholder="Password">
		<span class="glyphicon glyphicon-lock form-control-feedback"></span>
		</div>
		<div class="row">
		<div class="col-xs-8">
			<div class="checkbox icheck">
			<label>
				<input type="checkbox"> Ingat Saya
			</label>
			</div>
		</div>
		<!-- /.col -->
		<div class="col-xs-12">
		<?php
		if( $hour > 6 && $hour <= 23 && $day <> 'Sun') {
			echo '<button type="su bmi " name="login" class="btn btn-primary btn-block btn-flat btn-lg">Masuk</button>';
		}
		else {
		header('Location: /verifikasi/error/offline.php');
		}
		?>
		</div>
		<!-- /.col -->
		</div>
	</form>
	</div>
	<!-- /.login-box-body -->
</div>
<!-- /.login-box -->



<!-- jQuery 3 -->
<script src="assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="assets/plugins/iCheck/icheck.min.js"></script>
<script>
	$(function () {
	$('input').iCheck({
		checkboxClass: 'icheckbox_square-purple',
		radioClass: 'iradio_square-purple',
		increaseArea: '20%' /* optional */
	});
	});
</script>
</body>
</html>
