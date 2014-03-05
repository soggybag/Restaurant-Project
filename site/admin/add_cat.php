<?php 
require( "pass.php" );
$page_title = "Add New Category";
include("header.php"); 
?>	

<div id="main">
    <div>
    	<?php include("admin_links.php"); ?>
    </div>
	
	<?php
	
		if( isset($_POST['submit']) ) {
			// form submitted
			require('../../dbconnect.php');
			$category_slug 	= escape_data( $_POST['category_slug'] );
			$category_name 	= escape_data( $_POST['category_name'] );
			$sort 			= escape_data( $_POST['sort_order'] );
			
			echo "<h1>$category_slug $category_name $sort</h1>";
			
			$sql = "INSERT INTO menu_categories ( slug, name, sort ) 
			VALUES( '$category_slug', '$category_name', '$sort' )";
			mysql_query( $sql );
			echo mysql_error();
		?>
	        
	        <p>A new menu Category has been added to the database</p>
	        <p><a href='<?php echo $_SERVER['PHP_SELF']; ?>'>Add another Category</a> 
	        <a href='list_cats.php'>Back to Category list</a></p>
	        
	    <?php
		} else {
			// show form 
		?>
			<!-- html -->
	<form action='<?php echo $_SERVER['PHP_SELF']; ?>' method="post">
	
		<p><label for='category-slug'>Slug Name (a URL friendly name):</label>
	    <input id='category-slug' 
	    class='text_input' type="text" 
	    name='category_slug' 
	    placeholder="Category slug name"></p><!-- $_POST['name'] -->
	    
        <p><label for='category_name'>Category Name:</label>
	    <input id='category-name' 
	    class='text_input' type="text" 
	    name='category_name'  
	    placeholder="Category name"></p><!-- $_POST['display_name'] -->
	    
	    <p><label for='sort-order'>Sort:</label>
	    <input id="sort-order" type="text" name="sort_order" placeholder="sort value"></p>
	   	
        <p><input class='submit_button' type="submit" name='submit' /></p>
	</form>
	<?php } ?>
	
</div>
	
<?php include( "footer.php" ); ?>
	



