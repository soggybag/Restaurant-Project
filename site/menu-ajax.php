<?php 
	// Connect to database
	require_once("../dbconnect.php");
	
	// Check for a category
	if ( isset($_GET['cat']) ) {
		$cat = $_GET['cat'];
		// Define an SQL query to get menu items from a category
		$sql = "SELECT * FROM restaurant WHERE category='$cat' ";
	} else {
		// Define an SQL query to get all menu items
		$sql = "SELECT * FROM restaurant";
	}
	
	$results = mysql_query( $sql ); // Run the query
	
	// Use this loop to create and format results returned to the browser 
	while( $row = mysql_fetch_array( $results ) ) {
		$name 	= $row['name'];
		$price 	= $row['price'];
		echo "<li>$name \$$price</li>";
	}
?>