<?php 
  mysql_connect("mysql.storymap.villustrator.com", "storyfx", "fireqwerty") or die(mysql_error()); 
  mysql_select_db("storymap") or die(mysql_error()); 
  $result = mysql_query("SELECT * FROM things"); 
  $data = array();
  while ($row = mysql_fetch_array($result) ) {
    $data[]=$row;
  }
?>
