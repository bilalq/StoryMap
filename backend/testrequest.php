<?php

include("countrylist.php"); 
$size = count($countrylist); 


$i=0;
while($i<count($size))
{

	$jsonurl = 'http://api.nytimes.com/svc/search/v1/article?format=json&query=facet_terms%3A'.$countrylist[$i].'small_image%3Ay&fields=geo_facet%2Csmall_image_url%2Curl%2Ctitle%2Cbody&rank=newest&api-key=bb7933c4e64db04f027b97b683a82c81:13:65718622';
	$json = file_get_contents($jsonurl);
	$data = json_decode($json);
	$numresults = count($data->(results));

	function geolocationlat()
	{
		$geocode=file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address=' .$countrylist[$i]. '&sensor=false');
		$output= json_decode($geocode);
	
		return 	$output->results[$i]->geometry->location->lat;
	}
		function geolocationlong()
	{
		$geocode=file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address=' .$countrylist[$i]. '&sensor=false');
		$output= json_decode($geocode);
	
		return 	 $output->results[$i]->geometry->location->lng;
	}


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
		
		print $countrylist[$i];
		print $url;
		print $lat;
		$j++;
	}

$i++;

}

