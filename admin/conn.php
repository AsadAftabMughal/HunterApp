<?php
	$conn = new mysqli('localhost', 'root', '', 'mergetesting');

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	
?>