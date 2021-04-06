<?php
include 'auth.php';
include "config/database.php";

if ($_SESSION['level']=='1'){ //Pembelian
	if($_GET['hal']=="dashboard-level-1"){
		include 'model/dashboard-level-1.php';
	}
	/////////////////////-----------------MASTER ----------------------------//////////////////////////////////
	else if($_GET['hal']=="proses-brg"){ //master barang
		include "model/form/sbrg/brg.php";
	}

	else if($_GET['hal']=="proses-sup"){//master supplier
		include "model/form/ssup/sup.php";
	}
    else if($_GET['hal']=="proses-cus"){//master pelanggan
		include "model/form/scus/cus.php";
	}

	/////////////////////-----------------TRANSAKSI ----------------------------//////////////////////////////////

	else if($_GET['hal']=="proses-fbrg"){ //master barang baru transaksi 
		include "model/form/fbrg/Form-fbrg.php";
	}

	else if($_GET['hal']=="proses-fsup"){ //master supplier baru transaksi 
		include "model/form/fsup/Form-fsup.php";
	}

	else if($_GET['hal']=="proses-fcus"){ //master pelanggan baru transaksi 
		include "model/form/fcus/Form-fcus.php";
	}
//------------------------------------------
	else if($_GET['hal']=="proses-beli"){ //List BELI PERIODE
		include "model/form/beli2/beli.php";
		//include "model/form/sbeli/beli.php";
	}

	else if($_GET['hal']=="proses-belid"){ //List BELI PERIODE
		include "model/form/beli2/beli-detail.php";
		//include "model/form/sbeli/beli.php";
	}

//----------------------settt --------------------


	else if($_GET['hal']=="proses-beli2"){ //List BELI SEMUA DATA 
		include "model/form/beli3/beli.php";
	}

	else if($_GET['hal']=="proses-belid2"){ //Transaksi BELI 
		include "model/form/beli3/beli-detail.php";
	}
//------------------------------------------	

	else if($_GET['hal']=="history-verif-bon"){
		include "model/form/historyBon/bon-SP.php";
	}

	else if($_GET['hal']=="ganti-password"){
		include "model/ganti-password.php";
	}

	else if($_GET['hal']=="ganti-periode"){
		include "model/ganti-periode.php";
	}
	
}



?>