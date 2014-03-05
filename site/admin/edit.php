<?php 
	require("pass.php");
	$page_title = "Edit Menu item";
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
			$id			= escape_data( $_POST['id'] );
			$name 		= escape_data( $_POST['name'] );
			$price 		= escape_data( $_POST['price'] );
			$description= escape_data( $_POST['description'] );
			$category	= escape_data( $_POST['category'] );
			
			
			$sql = "UPDATE menu  
			SET name='$name', price='$price', description='$description', category='$category'
			WHERE id='$id'
			LIMIT 1";
			$results = mysql_query( $sql );
			echo "<p>" . mysql_error() . "</p>";
			?>
            
            <p>Product Updated</p>
            <a href='edit_list.php'>Back to list</a></p>
            
			<?php 
		} else {
			$results 	= mysql_query( "SELECT * FROM menu WHERE id='$id' LIMIT 1" );
			$myrow 		= mysql_fetch_array( $results );
			$id 		= $myrow['id'];
			$name 		= $myrow['name'];
			$description= $myrow['description'];
			$price		= $myrow['price'];
			$category	= $myrow['category'];
			?><!-- exit PHP -->
            
	<form method='post' action="<?php echo $_SERVER['PHP_SELF'] . "?id=$id"; ?>">
		<input type="hidden" name="id" value="<?php echo $id ?>">
    	
    	<label for="name">Name:</label>
        <input id="name" type='text' 
        class='text_input' name='name' 
        value='<?php echo $name; ?>'
        placeholder="Name">
    	
    	<label for="price">Price:</label>
        <input id="price" type="text" class='text_input' name="price" value='<?php echo $price; ?>' placeholder="price">
        
        <label for="description">Description:</label>
        <textarea id="description" name="description"><?php echo $description; ?></textarea>
        
        <label for="category">Category:</label>
        <select id="category" name="category">
	        <?php // *
	    		$sql = "SELECT * FROM menu_categories ORDER BY name";
	    		$results = mysql_query( $sql );
	    		
	    		while( $row = mysql_fetch_array( $results ) ) {
	    			$id 		= $row['id'];
	    			$display 	= $row['name'];
	    			if ( $category == $id ) {
	    				echo "<option selected='selected' value='$id'>$display</option>";
	    			} else {
	    				echo "<option value='$id'>$display</option>";
	    			}
	    		}
	    	?>
        </select>
        <input type="submit" name='submit' />
    </form>
            <?php } ?>
    </div>

<?php include("footer.php"); ?>







