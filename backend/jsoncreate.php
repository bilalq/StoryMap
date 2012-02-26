<?php
mysql_connect("mysql.villustrator.com", "creeves2", "qwerty");
mysql_select_db("storymap");
$result = mysql_query("select * from dummy");
$json = "";
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


$json {"results:"{"id": $id,"source": $source,"headline": $headline,"body": $body,"thumb": $thumb,"image": $image,"lat": $lat,"long": $long}}

}

mysql_free_result($result);
?>