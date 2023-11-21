<?php
	$hostname="localhost";
	$username="root";
	$password="";
	$dbname="suplementos_frangolinos";
	
	$mysqli = new mysqli($hostname, $username, $password, $dbname);

	$query = "SELECT * FROM produtos";
	$result = $mysqli->query($query);

	// print_r($result);

	
	
?>
