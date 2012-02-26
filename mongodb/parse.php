//<?php
//$jsonurl = "http://api.nytimes.com/svc/search/v1/article?format=json&query=facet_terms%3Anew+york+small_image%3Ay&fields=geo_facet%2Csmall_image_url%2Ctitle%2Cbody&rank=newest&api-key=bb7933c4e64db04f027b97b683a82c81:13:65718622";
//$json = file_get_html($jsonurl);
//$data = json_decode($json,true);


//echo $data['results'[0]]['title']; 

//?>


<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">  
<?  
/** 
 * Demo of The New York Times Campaign Finance API. 
 * @see http://developer.nytimes.com/docs/campaign_finance_api 
 * @see http://code.google.com/apis/chart/ 
 * @author Andrei Scheinkman <andrei@nytimes.com> 
 **/  
   
    $code = $_GET['code'];  
    if (!$code) $code = "10016";  
      
    // Fetch data from nytimes.com  
    $response = file_get_contents("http://api.nytimes.com/svc/elections/us/president/2008/finances/zips/{$code}?api-key=bb7933c4e64db04f027b97b683a82c81:13:65718622");  
    $results = json_decode($response)->body;  
    if (!$results) {   
        print 'That didn\'t work. Try this: <a href="zip.php">10016</a>.'; exit;   
    }  
      
    // Collect labels and values for bar graph  
    $labels = array();  
    $values = array();  
    foreach ($results as $candidate) {  
        if ($candidate->total >= 10000) {  
            $labels []= $candidate->full_name;  
            $values []= $candidate->total;  
        }  
        else {  
            $other += $candidate->total;  
        }  
    }  
    $labels []= "Other";  
    $values []= $other;  
      
    // Prepare parameters for Google Chart API  
    $chxl = implode("|", $labels);  
    $chd = implode(",", array_reverse($values));  
?>  
<html>  
    <head>  
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8" >  
        <title>2008 campaign donations by zip code</title>  
    </head>  
    <body>  
        <h1>2008 campaign donations by zip code</h1>  
        <form action="zip.php">  
            <p><input type="text" name="code" value="<?= $code ?>"> <input type="submit" value="Go"></p>  
        </form>  
        <p><img src="http://chart.apis.google.com/chart?cht=bhg&amp;chds=0,<?= max($values) ?>&amp;chd=t:<?= $chd ?>&amp;chs=500x400&amp;chxt=y&amp;chxl=0:|<?= $chxl ?>" alt=""></p>  
        <p>Source: New York Times campaign finance API.</p>  
    </body>  
</html>  


