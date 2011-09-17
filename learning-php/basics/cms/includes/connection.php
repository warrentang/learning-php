<?php
  require_once("constants.php");
  
  //1. create a database connection.
  $connection = mysql_connect(DB_SERVER, DB_USER, DB_PWD);
  if(!$connection) {
    die("database connection failed: " . mysql_error());
  }
  
  //2. select a database to use.
  $db_select = mysql_select_db(DB_NAME, $connection);
  if(!$db_select) {
    die("database selection failed: " . mysql_error());
  }
?>