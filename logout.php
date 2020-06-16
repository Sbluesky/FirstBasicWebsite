<?php
	session_start();
	setcookie("ID","",time()-3600);
	$_SESSION['ID'] = '';
	session_destroy();
	header('location: index.php');
?>
