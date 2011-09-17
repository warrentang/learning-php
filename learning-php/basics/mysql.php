<?php
	//1. create a database connection.
	$connection = mysql_connect("localhost", "root", "123");
	if(!$connection) {
		die("database connection failed: " . mysql_error());
	}
	
	//2. select a database to use.
	$db_select = mysql_select_db("widgetcorp", $connection);
	if(!$db_select) {
		die("database selection failed: " . mysql_error());
	}
	
	//3. perform database query.
	$result = mysql_query("select * from subjects", $connection);
	if(!$result) {
		die("Database query failed: " . mysql_error());
	}
	
	//4. use returned data.
	while($row = mysql_fetch_array($result)) {
		echo "{$row['id']}, {$row[1]}, {$row[2]}, {$row[3]}<br />";
	}
	
	//5. close database connection
	mysql_close($connection);
?>