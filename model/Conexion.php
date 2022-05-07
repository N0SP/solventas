<?php
	$conexion = new mysqli("localhost", "root", "", "dbsolventas");
	$connect = new PDO("mysql:host=localhost;dbname=dbsolventas", "root", "");
	
	if (mysqli_connect_errno()) {
	    printf("Connect failed: %s\n", mysqli_connect_error());
	    exit();
	}
	
?>
	