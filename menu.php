<?php 
	$page_title = "Restaurant Menu";
	$menu_class = "current-page";
 ?>


<?php include( "header.php" ); ?>
    	<!-- end header.php -->
      
    	<!-- Content Here! -->
    	<h2>Menu.php</h2>
    <div>
		<ul>
			<?php 
				require_once("../dbconnect.php");
				$sql = "SELECT * FROM menu_categories ORDER BY sort";
				$results = mysql_query( $sql );
				$current_cat = $_GET['category'];
				while( $row = mysql_fetch_array( $results ) ) {
					$name = $row['name'];
					$slug = $row['slug'];
					$desc = $row['description'];
					$url = $_SERVER['PHP_SELF'] . "?category=$slug";
					if ($current_cat==$slug) {
						$selected = "class='selected' ";
					} else {
						$selected = "";
					}
					echo "<li><a $selected href='$url'>$name</a></li>";
				}
				
				
				if ( !isset($_GET['category']) ) {
					$selected = "class='selected' ";
				} else {
					$selected = "";
				}
			?>
			<li><a <?php echo $selected; ?> href="<?php echo $_SERVER['PHP_SELF']; ?>">All Items</a></li>	
		</ul>
    </div>
      	
      <?php 
				require_once("../dbconnect.php");
				
				if ( isset( $_GET['category'] ) ) {
					$cat = $_GET['category'];
					$sql = "SELECT 
								menu.name, 
								menu.price,
								menu.description,
								menu_categories.name as category
							FROM
								menu, menu_categories
							WHERE 
								menu.category = menu_categories.id 
							AND 
								menu_categories.slug = '$cat'
							ORDER BY 
								menu_categories.sort, menu.name";
				} else {
					$sql = "SELECT 
								menu.name, 
								menu.price,
								menu.description,
								menu_categories.name as category
							FROM
								menu, menu_categories
							WHERE 
								menu.category = menu_categories.id
							ORDER BY 
								menu_categories.sort, menu.name";
				}
				
				$results = mysql_query( $sql );
				
				$count = 0;
				$current_category = "";
				
				while( $row = mysql_fetch_array( $results ) ) {
					$name 			= $row['name'];
					$description 	= $row['description'];
					$price 			= $row['price'];
					$category 		= $row['category'];
					
					if ( $category != $current_category ) {
						echo "<h2 class='grid_12'>$category</h2>";
						$current_category = $category;
					}
					
					echo "<div class='menu-item grid_3'>
							<h3>$name</h3> 
							<p>$description</p>
							<p>$price</p>
						</div>";
					$count ++;
					
					if ( $count == 4 ) {
						echo "<div class='clear'></div>";
						$count = 0;
					}
					
				} // end while loop --------------------------
			?>
			
    	<!-- begin footer.php -->
<?php include( "footer.php" ); ?>












