Restaurant-Project
==================
This project creates a simple web site for a restaurant. 

The site folder contains the PHP/HTML/CSS files for the basic site. The site requires a
database to store the menu for the restaurant and snother table containing the categories 
for the menu. 

The sql folder contains files that can be user to recreate the databases used by site. 

The files menu.sql, and menu_categories.sql contain the structure and the data. Import
these to create a database already populated with data. The file tables-no-data.sql will 
create both tables: menu, and menu_categories empty. You can import these files to create 
these tables using PHPMyAdmin. 

You will need to edit the file dbconnect.php. Edit the host name, username, password, 
and dbname. 

