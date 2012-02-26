<?php

include("countrylist.php"); 
$size = count($countrylist); 


$i=0;
while(i<len($size))
{

	$jsonurl = "http://api.nytimes.com/svc/search/v1/article?format=json&query=facet_terms%3A".$countrylist[i]."small_image%3Ay&fields=geo_facet%2Csmall_image_url%2Curl%2Ctitle%2Cbody&rank=newest&api-key=bb7933c4e64db04f027b97b683a82c81:13:65718622";
	$json = file_get_contents($jsonurl);
	$data = json_decode($json);
	$numresults = $data->count(results);

	function geolocation()
	{
		$geocode=file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address=1600+Amphitheatre+Parkway+Mountain+View,+CA&sensor=false');
		$output= json_decode($geocode);
	
		return 	$output->results[0]->geometry->location->lat.', '.$output->results[0]->geometry->location->lng;
	}


	$j = 0;
	while($j < $numresults)
	{
		$body = $data->results[$j]->body;
		$url = $data->results[$j]->url;
		$title = $data->results[$j]->title;
		$small_image_url = $data->results[$j]->small_image_url;
		$large_image_url = str_replace("thumbStandard", "articleLarge", $small_image_url);
		$lat,$long = geolocation($countrylist[$i]);
		
		print $countrylist[$i];
		print $url;
		print $lat;
	}



echo $test;

