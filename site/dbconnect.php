<?php
	mysql_connect( "localhost", "username", "password" ) or die( "Unable to connect to Host!" );
	mysql_select_db( "dbname" ) or die( "Unable to select to database" ); // Not a table name!


	function escape_data( $data ) {
		if ( ini_get( 'magic_quotes_gpc' ) ) {
			$data = stripslashes( $data );
		}
		if ( !is_numeric( $data ) ) {
			$data = mysql_real_escape_string( $data );
		}
		return $data;
	}