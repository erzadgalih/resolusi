<?php
$keyword = $_POST['keyword']; 
session_start();
ob_start();
include "brg-view.php";
$html = ob_get_contents(); 
ob_end_clean();


echo json_encode(array('hasil'=>$html));
?>