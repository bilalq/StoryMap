<?php
define('API_KEY', 'bb7933c4e64db04f027b97b683a82c81:13:65718622');
define('API_URL', 'http://api.nytimes.com/svc/search/v1');
$n = 10;
$i = 0;
do{
  $start = $i * $n;
  print "$start\n";
  
  $params = array(
    'api-key' => API_KEY,
    'query' => 'des_facet:[SCIENCE AND TECHNOLOGY]',
    'offset' => $i,
    'fields' => 'byline,body,date,title,url,des_facet',
    );
  
  $data = json_decode(file_get_contents(API_URL . '/article?' . http_build_query($params)));
  foreach ($data->results as $item)
    file_put_contents(sprintf('articles/%s.js', md5($item->url)), json_encode($item)); 
  
  ?>