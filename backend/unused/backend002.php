<?php
$geocode=file_get_contents('http://maps.google.com/maps/api/geocode/json?address=newyork&sensor=false');

$output= json_decode($geocode);

$lat = $output->results[0]->geometry->location->lat;
$long = $output->results[0]->geometry->location->lng;

print $lat;
