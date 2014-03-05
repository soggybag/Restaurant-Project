<?php 
	require("pass.php");
	$page_title = "Delete Category";
	include("header.php"); 
?>

<div id="main">
    <div>
    	<?php include("admin_links.php"); ?>
    </div>

	<?php 
		require("../../dbconnect.php");
		$id = $_GET['id']; // delete.php?id=#
		$sql = "SELECT * FROM menu_categories WHERE id='$id' LIMIT 1 ";
		$results = mysql_query( $sql );
		$row = mysql_fetch_array( $results );
		$name = $row['name'];
		
		if (!isset( $_GET['confirm'] ) ) {
			?>
            <p>Are you sure you want to delete Category <strong><?php echo $name; ?></strong> 
            <a href='<?php echo $_SERVER['PHP_SELF'] . "?id=$id&confirm=yes"; ?>'>Yes</a> 
            <a href='list_cats.php'>No</a></p>
			<?php
		} else {
			$sql = "DELETE FROM menu_categories WHERE id='$id' LIMIT 1 ";
			$results = mysql_query( $sql );
			echo "<p>$name has been deleted</p>";
		}
	?>
	
</div>
    
<?php include("footer.php"); ?>






