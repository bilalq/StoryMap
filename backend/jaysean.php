<?php
mysql_connect("mysql.storymap.villustrator.com", "storyfx", "fireqwerty") or die(mysql_error());
mysql_select_db("storymap") or die(mysql_error());

$result = mysql_query("select * from things");

$rows = array();
while ($r = mysql_fetch_assoc($result)) {
  $rows[]=$r;
}
echo json_encode($rows);
$x = 500;
$rose = 0;
$json = "";
while ($row = mysql_fetch_object($result) and $rose <$x) 
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
