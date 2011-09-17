<?php require_once("header.php"); ?>
<?php
  if(intval($_GET['subj']) == 0) {
    redirect_to("content.php");
  }
  
  if(isset($_POST['submit'])) {
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
    
    if(empty($errors)) {
      $id = mysql_prepare($_GET['subj']);
      $menu_name = mysql_prepare($_POST["menu-name"]);
      $position = mysql_prepare($_POST["position"]);
      $visible = mysql_prepare($_POST["visible"]);
      
      $query = "update subjects set
      	menu_name = '{$menu_name}', 
      	position = {$position},
      	visible = {$visible}
      	where id = {$id}";
      $result = mysql_query($query);
      if(mysql_affected_rows() == 1) {
        $message = "Update successful.";
      } else {
        $message = "Update faild: ";
        $message .= $query . "<br />";
        $message .= mysql_error();
      }
    } else {
      //$errors not empty
      $message = implode("<br />", $errors);
    }
  }
?>

<?php get_selected_page(); ?>

  <nav id="nav">
    <h2>Navigation</h2>
    <?php echo navigation($sel_subject, $sel_page); ?>
  </nav>
  <section id="main">
  	<h2>Edit Subject: <?php echo $sel_subject['menu_name']; ?></h2>
    <?php if(isset($message)) { ?>
      <div id="message"><?php echo $message; ?></div>
    <?php } ?>
    <form action="edit-subject.php?subj=<?php echo urlencode($sel_subject['id']); ?>" method="post">
      <p>
        <label for="menu-name">Subject name: </label>
        <input type="text" name="menu-name" id="menu-name" value="<?php echo $sel_subject['menu_name']; ?>" />
      </p>
      <p>
        <label for="position">Position:</label>
        <select name="position" id="position">
          <?php 
            $subject_set = get_all_subjects();
            $subject_count = mysql_num_rows($subject_set);
            for($count = 1; $count <= $subject_count + 1; $count++) {
              echo "<option value=\"{$count}\"";
              if($count == $sel_subject['position']) {
                echo " selected";
              }
              echo ">{$count}</option>";
            }
          ?>
        </select>
      </p>
      <p>
        <label>Visible:</label>
        <input type="radio" name="visible" id="visible-yes" 
          <?php if($sel_subject['visible'] == 1) { echo "checked"; } ?> value="1"><label for="visible-yes">Yes</label>
        <input type="radio" name="visible" id="visible-no"
          <?php if($sel_subject['visible'] == 0) { echo "checked"; } ?> value="0"><label for="visible-no">No</label>
      </p>
      <p><input type="submit" name="submit" value="Submit" />
    </form>
    <menu>
      <a href="content.php">Cancel</a> |
      <a href="delete-subject.php?subj=<?php echo urlencode($sel_subject["id"]); ?>"
        onclick="return confirm('Are you sure to delete the subject?'); ">Delete</a> | 
      <a href="edit-page.php?action=new&amp;subj=<?php echo urlencode($sel_subject["id"]); ?>">+ Add a new page</a>
    </menu>
  </section>
<?php require_once("footer.php"); ?>