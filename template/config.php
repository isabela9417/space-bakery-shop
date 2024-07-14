<?php 
	
    $conn = new mysqli('localhost', 'Isabela94', '+BlackWidow94', 'space_shop');

    //check the DB connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

?>