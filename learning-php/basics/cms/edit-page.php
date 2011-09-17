<?php require_once("header.php"); ?>
<?php 
  $action = $_GET['action'];
  $subj = $_GET['subj'];
  
  $title = "";
  if($action == "new") { 
    $title = "Add page";
  } elseif($action == "edit") {
    $title = "Edit page";
  } elseif($action == "delete") {
    $title = "Delete page";
  } else {
    $title = "Unknown action";
  }
?>
<?php get_selected_page(); ?>
  <nav id="nav">
    <h2>Navigation</h2>
    <?php echo navigation($sel_subject, $sel_page); ?>
  </nav>
  <section id="main">
    <h2><?php echo $title; ?></h2>
    <form action="edit-page.php" method="post">
      <p>Subject: <?php echo $sel_subject['menu_name']; ?></p>
      <p><label for="menu-name">Page name:</label>
        <input type="text" name="menu-name" id="menu-name" /></p>
      <p><label for="position">Position:</label>
        <select name="position" id="position">
          <option>1</option>
        </select>
      <p>Visible: 
        <input type="radio" name="visible" id="visible-yes" value="1" checked /><label for="visible-yes">Yes</label>
        <input type="radio" name="visible" id="visible-no" value="0" /><label for="visible-no">No</label></p>
      <p><Label for="content">Content:</Label><br />
        <textarea rows="8" cols="60" id="content" name="content"></textarea></p>
    </form>
  </section>
<?php require_once("footer.php"); ?>