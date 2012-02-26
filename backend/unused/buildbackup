<?php
include("countrylist.php"); 
$i=0;

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

$size = count($countrylist); 
$idcount = 0;
while($i<1) {
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
    $small_image_url = $data->results[$j]->small_image_url;
    $large_image_url = str_replace("thumbStandard", "articleLarge", $small_image_url);
    $lat = geolocationlat($countrylist[$i]);
    $long = geolocationlong($countrylist[$i]);

    print ' rand lat: '.$lat;
    print ' rand lng: '.$long;


    $idcount++;

    $j++;
  }

  $i++;
  sleep(1);
}
