<?php
$jsonurl = "http://api.nytimes.com/svc/search/v1/article?format=json&query=facet_terms%3Anew+york+small_image%3Ay&fields=geo_facet%2Csmall_image_url%2Ctitle%2Cbody&rank=newest&api-key=bb7933c4e64db04f027b97b683a82c81:13:65718622";
$json = file_get_html($jsonurl);
$data = json_decode($json,true);


echo $data['results'[0]]['title']; 

