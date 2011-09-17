<?php require_once("header.php"); ?>
<?php get_selected_page(); ?>
  <nav id="nav">
    <h2>Navigation</h2>
    <?php echo navigation($sel_subject, $sel_page); ?>
  </nav>
  <section id="main">
  	<h2>Add Subject</h2>
    <form action="new-subject-submit.php" method="post">
      <p>
        <label for="menu-name">Subject name: </label>
        <input type="text" name="menu-name" id="menu-name" />
      </p>
      <p>
        <label for="position">Position:</label>
        <select name="position" id="position">
          <?php 
            $subject_set = get_all_subjects();
            $subject_count = mysql_num_rows($subject_set);
            for($count = 1; $count <= $subject_count + 1; $count++) {
              echo "<option value=\"{$count}\">{$count}</option>";
            }
          ?>
        </select>
      </p>
      <p>
        <label>Visible:</label>
        <input type="radio" name="visible" id="visible-yes" checked value="1"><label for="visible-yes">Yes</label>
        <input type="radio" name="visible" id="visible-no" value="0"><label for="visible-no">No</label>
      </p>
      <p><input type="submit" value="Submit" />
    </form>
    <p><a href="content.php">Cancel</a></p>
  </section>
<?php require_once("footer.php"); ?>