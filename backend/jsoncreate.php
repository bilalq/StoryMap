<?php
mysql_connect("mysql.storymap.villustrator.com", "storyfx", "fireqwerty") or die(mysql_error());
mysql_select_db("storymap") or die(mysql_error());

$result = mysql_query("select * from things");

$rows = array();
while ($r = mysql_fetch_assoc($result)) {
  $rows[]=$r;
}
echo json_encode($rows);

