


<?php

  
$geocode=file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address=new+york&sensor=false');
  $output= json_decode($geocode);
print $output->results[2]->geometry->location->lat;