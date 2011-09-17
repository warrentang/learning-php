<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php
  $errors = array();
  
  $required_fields = array('menu-name', 'position', 'visible');
  foreach($required_fields as $field_name)
  if(!isset($_POST[$field_name]) || !check_string($_POST[$field_name])) {
    $errors[] = "empty field: {$field_name}";
  }
  
  $fields_with_lengths = array('menu-name' => 30);
  foreach ($fields_with_lengths as $field_name => $value) {
    if($_POST[$field_name] > $value) {
      $errors[] = "length exceeded: {$field_name}";
    }
  }
  
  if(!empty($errors)) {
    redirect_to("new-subject.php");
  }

  $menu_name = mysql_prepare($_POST["menu-name"]);
  $position = mysql_prepare($_POST["position"]);
  $visible = mysql_prepare($_POST["visible"]);
  
  $query = "insert into subjects(menu_name, position, visible)
  	values('{$menu_name}', {$position}, {$visible})";
  if(mysql_query($query)) {
    //Redirect.
    header("Location: content.php");
  } else {
    echo "<h2>Subject creation failed. </h2>";
    echo "<p>" . mysql_error() . "/p"; 
  }
?>
<?php require_once("includes/connection-close.php"); ?>