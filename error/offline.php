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
<title>Server Offline</title>
<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<link rel="icon" type="image/png" href="../assets/dist/img/dr.png">
<!-- Bootstrap 3.3.7 -->
<link rel="stylesheet" href="../assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="../assets/bower_components/font-awesome/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="../assets/bower_components/Ionicons/css/ionicons.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="../assets/dist/css/AdminLTE.min.css">
<!-- iCheck -->
<link rel="stylesheet" href="../assets/plugins/iCheck/square/blue.css">
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
<script src="../https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="../https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition lockscreen">

<div class="lockscreen-wrapper">
	<div class="lockscreen-logo">
		<img src="../assets/dist/img/offline.png" width="auto" height="50px">
	</div>

	<div class="lockscreen-item">
	</div>
	<div class="help-block text-center">
		<div class="wrapper">
		<div class="typing-demo">
		Saat ini server sedang offline.
		</div>
		</div>
	</div>
	<div class="text-center">
		Server saat ini sedang offline / ada gangguan / perbaikan<br> 
		Anda mengakses halaman ini pada <b><?php echo date('Y-m-d H:i:s');?></b><br> 
		Jam operasional server Hari Senin - Sabtu 07.00 WIB - 22.00 WIB.<br> Hari Minggu Offline.<br> 
		<b><a href="/verifikasi/login" class="text-black">Klik disini untuk refresh</a></b>
	</div>
	<div class="lockscreen-footer text-center">
		Copyright &copy;<?php echo date('Y');?> <b><a href="https://intidragon.com" class="text-black">PT. Intidragon Suryatama</a></b> All rights reserved.
	</div>
</div>

<!-- jQuery 3 -->
<script src="../assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../assets/plugins/iCheck/icheck.min.js"></script>
<script>
	$(function () {
	$('input').iCheck({
		checkboxClass: 'icheckbox_square-blue',
		radioClass: 'iradio_square-blue',
		increaseArea: '20%' /* optional */
	});
	});
</script>
</body>
</html>
