<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php
  if(intval($_GET['subj']) == 0) {
    redirect_to("content.php");
  }
  
  $id = mysql_prepare($_GET['subj']);
  
  $query = "delete from subjects where id = {$id} limit 1";
  $result = mysql_query($query);
  if(mysql_affected_rows() == 1) {
    redirect_to("content.php");
  } else {
    echo "Subject deletion failed.<br />";
    echo "<p>" . mysql_error() . "</p>";
    echo "<p><a href=\"content.php\">Return to main</a></p>";
  }
?>
<?php require_once("includes/connection-close.php"); ?>