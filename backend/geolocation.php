<?php
$geocode=file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address=1600+Amphitheatre+Parkway+Mountain+View,+CA&sensor=false');
$output= json_decode($geocode);
$lat = $output->results[0]->geometry->location->lat;
$long = $output->results[0]->geometry->location->lng;
<<<<<<< HEAD:mongodb/geolocation.php
echo .$lat.;
print .$long.;


=======
echo $lat.'\n';
echo $long.'\n';
>>>>>>> dffcd44b5f7029f8975f102a3e03df888780c252:backend/geolocation.php
