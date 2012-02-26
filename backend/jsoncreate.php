<?php
header('Content-type: application/json');
mysql_connect("mysql.storymap.villustrator.com", "storyfx", "fireqwerty") or die(mysql_error());
mysql_select_db("storymap") or die(mysql_error());

$result = mysql_query("select * from things ORDER BY  `things`.`id` DESC ");

$rows = array();
while ($r = mysql_fetch_assoc($result)) {
  $rows[]=$r;
}
echo "{\"list\": ".json_encode($rows)."}";
/*$json = "";
while ($row = mysql_fetch_object($result)) 
{
    $id =  $row->id;
    $source = $row->source;
    $headline = $row->headline;
    $body = $row->body;
    $thumb = $row->thumb;
    $image = $row->image;
    $lat = $row->lat;
    $long = $row->long;


$json ={"results:"{"id": $id,"source": $source,"headline": $headline,"body": $body,"thumb": $thumb,"image": $image,"lat": $lat,"long": $long}};

}

mysql_free_result($result);

return $json;*/
?>
