<?php
include("countrylist.php"); 

function geolocationlat() {
  $geocode=file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address=' .$countrylist[$i]. '&sensor=false');
  $output= json_decode($geocode);

$latitude = $output->results[$i]->geometry->location->lat;
return $latitude;
$bin =  	$output->results[$i]->geometry->location->lat;
return $bin;
}

function geolocationlong() {
  $geocode=file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address=' .$countrylist[$i]. '&sensor=false');
  $output= json_decode($geocode);
<<<<<<< HEAD

 $longitude = $output->results[$i]->geometry->location->lng;
 
 return $longitude;
=======
print $output->results[$i]->geometry->location->lat;
  return 	 $output->results[$i]->geometry->location->lng;
>>>>>>> 8ba74a2d9ec38347b5c5909ae66a8c66b405d3a7
}

function randomspiral($lat,$long) {

<<<<<<< HEAD
  $yoffset = rand(-2000,2000);
  $xoffset = rand(-2000,2000);
  $lat = $lat + ($yoffset/1000.0);
  $long = $long + ($xoffset/1000.0);
<<<<<<< HEAD

=======
  $v++;
  echo $lat;
  echo $long;
  }
>>>>>>> 9c13ffa546db1d6c6487a87a5a1fba5b090d0f47
=======
>>>>>>> 8ba74a2d9ec38347b5c5909ae66a8c66b405d3a7
}

$size = count($countrylist); 
$idcount = 0;
$i=0;
while($i<1)
{

  $jsonurl = 'http://api.nytimes.com/svc/search/v1/article?format=json&query=facet_terms%3A'.$countrylist[$i].'+small_image%3Ay&fields=geo_facet%2Curl%2Csmall_image_url%2Curl%2Ctitle%2Cbody&rank=newest&api-key=bb7933c4e64db04f027b97b683a82c81:13:65718622';
  $json = file_get_contents($jsonurl);
  $data = json_decode($json);
  $numresults = count($data->results);
  echo $numresults;

  $j = 0;
  while($j < $numresults)
  {
    $body = $data->results[$j]->body;
    $url = $data->results[$j]->url;
    $title = $data->results[$j]->title;
    $small_image_url = $data->results[$j]->small_image_url;
    $large_image_url = str_replace("thumbStandard", "articleLarge", $small_image_url);
    $lat = geolocationlat();
    $long = geolocationlong();
    randomspiral($lat,$long);

   

    //print $countrylist[$i];
    //print $url;
    print $lat;
    print "blah";
    print $long;

  mysql_connect("mysql.storymap.villustrator.com", "storyfx", "fireqwerty") or die(mysql_error()); 
  mysql_select_db("storymap") or die(mysql_error()); 
  $phone="testing";
  mysql_query("INSERT INTO data(source,headline,body,thumb,image,lat,long,id) VALUES('$url','$title', '$body', '$small_image_url','$large_image_url','$lat','$long','$idcount')"); 
     
      $idcount++;

        $j++;
  }

  $i++;
  sleep(1);
}

mysql_close();
