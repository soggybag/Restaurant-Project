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
		$sql = "SELECT
					menu.name,
					menu.price,
					menu.id,
					menu_categories.name as category
				
				FROM
					menu, menu_categories
					
				WHERE 
					menu.category = menu_categories.id
				
				ORDER BY 
					menu_categories.name, 
					menu.name";
					
		$results = mysql_query( $sql );
		echo "Error:" . mysql_error();
		$current_category = "";
		
		while( $row = mysql_fetch_array($results) ) {
			$name 		= htmlentities( $row['name'] );
			$price		= $row['price'];
			$category 	= $row['category'];
			$id 		= $row['id'];
			
			if ( $category != $current_category ) {
				echo "<li><h3>$category</h3></li>";
				$current_category = $category;
			}
			
			echo "<li>
			<a href='edit.php?id=$id&category=$category'>edit</a> 
			<a href='delete.php?id=$id'>delete</a>
			$name $price $category
			</li>";
		}
	?>
</ul>
</div>

<?php include("footer.php"); ?>







