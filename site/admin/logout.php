<?php
	session_start();
	if ( $_SESSION['loggedin'] != true ) {
		
	} else { 
		session_destroy();
		setcookie( session_name(), '', time() - 4200, '/' );
	}
	
	header( "Location: index.php" );
?>