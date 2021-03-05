<?php
include 'auth.php';
include "config/database.php";

if ($_SESSION['level']=='15'){ //Pembelian
	if($_GET['hal']=="dashboard-level-15"){
		include 'model/dashboard-level-15.php';
	}
	else if($_GET['hal']=="proses-brg"){ //master barang
		include "model/form/sbrg/master-brg.php";
	}
	else if($_GET['hal']=="proses-sup"){
		include "model/form/ssup/sup.php";
	}
    else if($_GET['hal']=="proses-cus"){
		include "model/form/scus/cus.php";
	}

	else if($_GET['hal']=="history-verif-bon"){
		include "model/form/historyBon/bon-SP.php";
	}
	
}



?>