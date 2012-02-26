<?php
include("countrylist.php"); 
$i=0;

mysql_connect("mysql.storymap.villustrator.com", "storyfx", "fireqwerty") or die(mysql_error()); 
mysql_select_db("storymap") or die(mysql_error()); 

function geolocationlat($country) {
  $geocode=file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$country.'&sensor=false');
  $output= json_decode($geocode);
  $lat = $output->results[0]->geometry->location->lat;
  $yoffset = rand(-2000,2000);
  $lat = $lat + ($yoffset/1000.0);
  return $lat;
}

function geolocationlong($country) {
  $geocode=file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$country.'&sensor=false');
  $output= json_decode($geocode);
  $long = $output->results[0]->geometry->location->lng;
  $xoffset = rand(-2000,2000);
  $long = $long + ($xoffset/1000.0);
  return $long;
}

$idcount=0;
$size = count($countrylist); 
while($i<$size) {
  $jsonurl = 'http://api.nytimes.com/svc/search/v1/article?format=json&query=facet_terms%3A'.$countrylist[$i].'+small_image%3Ay&fields=geo_facet%2Curl%2Csmall_image_url%2Curl%2Ctitle%2Cbody&rank=newest&api-key=bb7933c4e64db04f027b97b683a82c81:13:65718622';
  $json = file_get_contents($jsonurl);
  $data = json_decode($json);
  $numresults = count($data->results);

  $j = 0;
  while($j < $numresults)
  {
    $body = $data->results[$j]->body;
    $url = $data->results[$j]->url;
    $title = $data->results[$j]->title;
    $thumb= $data->results[$j]->small_image_url;
    $large= str_replace(array("thumbStandard"), "articleLarge", $thumb);
    $lat = geolocationlat($countrylist[$i]);
    $long = geolocationlong($countrylist[$i]);

    $body = mysql_real_escape_string($body);
    $url = mysql_real_escape_string($url);
    $title = mysql_real_escape_string($title);
    $thumb = mysql_real_escape_string($thumb);
    $large = mysql_real_escape_string($large);
    $lat = mysql_real_escape_string($lat);
    $long = mysql_real_escape_string($long);

      mysql_query("INSERT INTO things VALUES('$idcount','$url', '$title', '$body', '$thumb', '$large', '$lat', '$long')"); 

    $j++;
    $idcount++;
  }

  $i++;
  sleep(1);
}
