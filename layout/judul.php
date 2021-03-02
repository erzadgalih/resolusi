<?php 
if($_GET['hal']=="dashboard"){
	echo "Dashboard";
}
elseif ($_GET['hal']=="dashboard-level-1") {
	echo "Direktur Utama";
}
elseif ($_GET['hal']=="dashboard-level-2") {
	echo "Dashboard level 2";
}
elseif ($_GET['hal']=="dashboard-level-3") {
	echo "Factory Manager";
}
elseif ($_GET['hal']=="dashboard-level-4") {
	echo "Head Office Manager";
}
elseif ($_GET['hal']=="dashboard-level-5") {
	echo "Human Resouce Development";
}
elseif ($_GET['hal']=="dashboard-level-8") {
	echo "Information Technbology";
}
elseif ($_GET['hal']=="dashboard-level-9") {
	echo "ISO";
}
elseif ($_GET['hal']=="dashboard-level-10") {
	echo "Pemasaran";
}
elseif ($_GET['hal']=="dashboard-level-11") {
	echo "Industrial Engineering";
}
elseif ($_GET['hal']=="dashboard-level-12") {
	echo "AR";
}
elseif ($_GET['hal']=="dashboard-level-13") {
	echo "RND";
}
?>