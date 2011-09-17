<?php require_once("header.php"); ?>
<?php get_selected_page(); ?>
  <nav id="nav">
    <h2>Navigation</h2>
    <?php echo navigation($sel_subject, $sel_page); ?>
  </nav>
  <section id="main">
  	<?php 
      if(!is_null($sel_subject)) {
        echo "<h2>{$sel_subject["menu_name"]}</h2>";
  	  } elseif (!is_null($sel_page)) {
        echo "<h2>{$sel_page["menu_name"]}</h2>";
        echo "<div class=\"page-content\">{$sel_page["content"]}</div>";
      } else {
        echo "<h2>Content Area</h2>";
        echo "<p>Select a page or subject from the navigation memu on the left.";
      }
  	?>
  </section>
<?php require_once("footer.php"); ?>