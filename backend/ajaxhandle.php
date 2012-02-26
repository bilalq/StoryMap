<?php 
  mysql_connect("mysql.storymap.villustrator.com", "storyfx", "fireqwerty") or die(mysql_error()); 
  mysql_select_db("storymap") or die(mysql_error()); 
  $phone="testing";
  mysql_query("INSERT INTO phonebook(phone, firstname, lastname, address) VALUES('+1 123 456 7890','$phone', 'Doe', 'North America')"); 
  Print "Your table has been populated"; 
?>
