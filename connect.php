<?php

	$server = "localhost";
	$username = "root";
	$password = "abcd";
	$database = "fussi";

	mysql_connect($server, $username, $password);
	mysql_select_db($database);

?>