<?php
// session_start();

if(!isset($_SESSION["login"]) == true ){
	// session_destroy();
	header("Location: login");
	exit(); }

?>
