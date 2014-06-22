<?php include_once 'connect.php'; ?>

<?php
	
	
	session_start();

	session_unset();

	session_destroy();

	if (isset($_SESSION['username'])) {
		header("location:sLogin.php");
	} else {
		header("location:login.php");
	}

?>