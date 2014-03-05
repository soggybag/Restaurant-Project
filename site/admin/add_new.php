<?php 
	require("pass.php");
	$page_title = "Add New Menu Item";
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
		$name 			= escape_data( $_POST['name'] );
		$price 			= escape_data( $_POST['price'] );
		$description 	= escape_data( $_POST['description'] );
		$category_id	= escape_data( $_POST['category_id'] );
		
		$sql = "INSERT INTO menu ( name, price, description, category ) 
		VALUES('$name', '$price', '$description', '$category_id')";
		mysql_query( $sql );
		echo mysql_error();
		?>
        
        <p>A new menu item has been added to the database</p>
        <p><a href='<?php echo $_SERVER['PHP_SELF']; ?>'>Add another</a></p>
        
        <?php
	} else {
		// show form 
		?>
		<!-- html -->
<form action='<?php echo $_SERVER['PHP_SELF']; ?>' method="post">
	
	<p>
		<label for='name'>Name:</label>
    	<input id='name' class='text_input' type="text" name='name' placeholder="Name">
    </p><!-- $_POST['name'] -->
   
   
    <p>
    	<label for='price'>Price:</label>
    	<input id='price' class='text_input' type="text" name='price' placeholder="Price"></p><!-- $_POST['price'] -->
    
    <p>
    	<label for='description'>Description:</label>
    	<textarea id='description' name='description' placeholder="Description"></textarea>
    </p><!-- $_POST['description'] --> 
       
    <p><label for='category'>Category:</label>
    <select id='category' name='category_id'>
    	<?php 
    		require("../../dbconnect.php");
    		$sql = "SELECT * FROM menu_categories ORDER BY name";
    		$results = mysql_query( $sql );
    		while( $row = mysql_fetch_array( $results ) ) {
    			$id 		= $row['id'];
    			$display 	= $row['name'];
    			
    			echo "<option value='$id'>$display</option>";
    		}
    	?>
    </select></p>
 	<p><input class='submit_button' type="submit" name='submit'></p>
</form>
        <?php
	}

?>

</div>

<?php include("footer.php"); ?>




