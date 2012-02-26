
<?php
$geocode=file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address=1600+Amphitheatre+Parkway+Mountain+View,+CA&sensor=false');
$output= json_decode($geocode);
$lat = $output->results[0]->geometry->location->lat;
$long = $output->results[0]->geometry->location->lng;
echo '<p>'$lat '</p>';
print $long;
?>