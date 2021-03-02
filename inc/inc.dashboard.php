<?php
$hour = date('H');
$day = date('D');

if( $hour > 6 && $hour <= 11) {
	$say = 'Selamat Pagi';
}
else if($hour > 11 && $hour <= 15) {
	$say = 'Selamat Siang';
}
else if($hour > 15 && $hour <= 18) {
	$say = 'Selamat Sore';
}
else if($hour > 18 && $hour <= 23) {
	$say = 'Selamat Malam';
}
else {
	$say = 'Tidur woy, udah malem ini';
}
?>


<?php
$tanggal=date('Y-m-d');
function tanggal_indo($tanggal, $cetak_hari = false)
{
	$hari = array ( 1 =>    'Senin',
				'Selasa',
				'Rabu',
				'Kamis',
				'Jumat',
				'Sabtu',
				'Minggu'
			);
			
	$bulan = array (1 =>   'Januari',
				'Februari',
				'Maret',
				'April',
				'Mei',
				'Juni',
				'Juli',
				'Agustus',
				'September',
				'Oktober',
				'November',
				'Desember'
			);
	$split 	  = explode('-', $tanggal);
	$tgl_indo = $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
	
	if ($cetak_hari) {
		$num = date('N', strtotime($tanggal));
		return $hari[$num] . ', ' . $tgl_indo;
	}
	return $tgl_indo;
}
?>


<?php
$tgl_event="2020-11-10";
if(date('Y-m-d')==$tgl_event) {
	$pengumuman ='Selamat Hari Pahlawan';
	$event ='<img src="upload/tutorial/selamat-hari-pahlawan.jpg" width="100%" height="100%" alt="Informasi">';
}
else {
	$pengumuman ='';
	$event ='';
}
?>