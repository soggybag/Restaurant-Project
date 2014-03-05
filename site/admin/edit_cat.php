<?php 
	require("pass.php");
	$page_title = "Edit Categories";
	include("header.php"); 
?>

<div id="main">
	<div>
		<?php include("admin_links.php"); ?>
    </div>


	<?php 
		require( "../../dbconnect.php" );
		$id = $_GET['id']; // ?id=#
		
		if ( isset( $_POST['submit'] ) ) { // You clicked the Submit button
			$id				= escape_data( $_POST['id'] );
			$slug 			= escape_data( $_POST['slug_name'] );
			$category_name 	= escape_data( $_POST['category_name'] );
			$sort 			= escape_data( $_POST['sort'] );
			
			$sql = "UPDATE 
						menu_categories  
					SET 
						slug='$slug', name='$category_name', sort='$sort'
					WHERE 
						id='$id'
					LIMIT 1";
					
			$results = mysql_query( $sql );
			echo "<p>" . mysql_error() . "</p>";
			?>
            
            <p>Category Updated</p>
            <a href='list_cats.php'>Back to Category list</a></p>
            
			<?php 
		} else {
			
			$sql			= "SELECT * FROM menu_categories WHERE id='$id' LIMIT 1";
			$results 		= mysql_query( $sql );
			$myrow 			= mysql_fetch_array( $results );
			
			$id 			= $myrow['id'];
			$slug 			= $myrow['slug'];
			$category_name 	= $myrow['name'];
			$sort			= $myrow['sort'];
			$description	= $myrow['description'];
			
			?><!-- exit PHP -->
            
	<form method='post' action="<?php echo $_SERVER['PHP_SELF'] . "?id=$id"; ?>">
		<input type="hidden" name="id" value="<?php echo $id ?>">
		
    	<label for="slug-name">Name (a URL friendly name):</label>
        <input id="slug-name" type='text' 
        class='text_input' name='slug_name' 
        value='<?php echo $slug; ?>' 
        placeholder="slug name">
    	
    	<label for="category-name">Display Name:</label>
        <input id="category-name" type="text" 
        class='text_input' 
        name="category_name" 
        value='<?php echo $category_name; ?>' 
        placeholder="Category name">
        
        <label for="sort">Sort:</label>
        <input id="sort" type="text"
        class="text_input"  
        name="sort" 
        value="<?php echo $sort; ?>"
        placeholder="sort value">
        
         <label for="description">Sort:</label>
        <textarea id="description" type="text" 
        name="description"
        placeholder="description"><?php echo $description; ?></textarea>
        
        <input type="submit" name='submit'>
    </form>
            <?php // reenter PHP
		}
	?>
</div>
<?php include("footer.php"); ?>





