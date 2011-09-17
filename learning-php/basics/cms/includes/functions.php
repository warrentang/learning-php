<?php
  /**
   * Escape mysql parameters as necessary.
   * @param string $value the paramter to be escaped.
   * @author Warren Tang
   */
  function mysql_prepare($value) {
    $new_enough_php = function_exists("mysql_real_escape_string");
    $magic_quotes_active = get_magic_quotes_gpc();
    
    if($new_enough_php) {
      if($magic_quotes_active) {
        $value = stripslashes($value);
      }
      $value = mysql_real_escape_string($value);
    } else {
      if(!$magic_quotes_active) {
        $value = addslashes($value);
      }
    }
    
    return $value;
  }
  
  function redirect_to($location = NULL){
    if(!is_null($location)) {
      header("Location: {$location}");
      exit;
    }
  }
  
  function check_string($str) {
    return is_string($str) && strlen(trim($str)) > 0;
  }
  
  function confirm_query($result_set) {
    if(!$result_set) {
      die("Database query failed: " . mysql_error());
    }
  }
  
  function get_all_subjects() {
    $query = "select * from subjects order by position";
  	$result = mysql_query($query);
  	confirm_query($result);
  	return $result;
  }
  
  function get_pages_for_subject($subject_id) {
    $query = "select * from pages where subject_id = {$subject_id} order by position";
    $result = mysql_query($query);
    confirm_query($result);
    return $result;
  }
  
  function get_subject_by_id($subject_id) {    
    $query = "select * from subjects where id = {$subject_id} limit 1";
    $result = mysql_query($query);
    confirm_query($result);
    if($subject = mysql_fetch_array($result)) {
      return $subject;
    } else {
      return NULL;
    }
  }
  
  function get_page_by_id($page_id) {    
    global $connection;
    $query = "select * from pages where id = {$page_id} limit 1";
    $result_set = mysql_query($query, $connection);
    confirm_query($result_set);
    if($page = mysql_fetch_array($result_set)) {
      return $page;
    } else {
      return NULL;
    }
  }
  
  function get_selected_page() {
    global $sel_subject;
    global $sel_page;
    if(isset($_GET['subj'])) {
      $sel_subject = get_subject_by_id($_GET['subj']);
    } elseif (isset($_GET['page'])) {
      $sel_page = get_page_by_id($_GET['page']);
    }
  }
  
  function navigation($sel_subject, $sel_page) {
    $output = "<ul>";

    //List all subjects.
    $subject_set = get_all_subjects();
  	while($subject = mysql_fetch_array($subject_set)) {
      $output .= "<li";
      if($subject["id"] == $sel_subject) { 
        $output .= " class=\"selected\""; 
      }
      $output .= "><a href=\"edit-subject.php?subj=" 
        . urlencode($subject["id"]) 
        . "\">{$subject['menu_name']}</a>";
      
      //List all pages of a specific subject.
      $page_set = get_pages_for_subject($subject["id"]);
      $output .= "<ul>";
      while ($page = mysql_fetch_array($page_set)) {
      $output .= "<li";
      if($page["id"] == $sel_page) { 
        $output .= " class=\"selected\""; 
      }
      $output .= "><a href=\"content.php?page="
          . urlencode($page["id"]) 
          . "\">{$page['menu_name']}</a></li>";
      }
      $output .= "</ul></li>";
  	}

    $output .= "</ul>";
    $output .= "<p><a href=\"new-subject.php\">+ Add a new subject</a></p>";
    return $output;
  }
?>