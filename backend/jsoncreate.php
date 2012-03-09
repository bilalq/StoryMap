<?php
include("keys.php");
header('Content-type: application/json');
mysql_connect($SQLSERVER, $SQLUSER , $SQLPASS);
mysql_select_db($SQLDB); 
$result = mysql_query("select * from things ORDER BY  `things`.`id` DESC ");
$rows = array();
while ($r = mysql_fetch_assoc($result)) 
  $rows[]=$r;
echo "{\"list\": ".json_encode($rows)."}";
