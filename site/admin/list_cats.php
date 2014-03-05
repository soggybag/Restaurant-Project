<?php 
	require("pass.php");
	$page_title = "List Categories";
	include("header.php"); 
?>

<div id="main">
<div>
<?php include("admin_links.php"); ?>
</div>

<ul>	
	<?php 
		require("../../dbconnect.php");
		$sql = "SELECT * FROM menu_categories ORDER BY name";
		$results = mysql_query( $sql );
		$current_category = "";
		while( $row = mysql_fetch_array($results) ) {
			$name 			= htmlentities( $row['slug'] );
			$display_name 	= htmlentities( $row['name'] );
			$sort			= htmlentities( $row['sort'] );
			$id 			= $row['id'];
						
			echo "<li>
			<a href='edit_cat.php?id=$id'>edit</a> 
			<a href='delete_cat.php?id=$id'>delete</a>
			$display_name $name $sort
			</li>";
		}
	?>
</ul>
</div>

<?php include("footer.php"); ?>












