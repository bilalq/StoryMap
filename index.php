<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

<!--DOCUMENT HEAD-->
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>StoryMap - A new way to see the world</title>

    <script type="text/javascript" src="http://ecn.dev.virtualearth.net/mapcontrol/mapcontrol.ashx?v=7.0"></script>
    <script type="text/javascript" src='javascripts/jquery/jquery-1.7.1.min.js'></script>

    <link rel="stylesheet" href="/stylesheets/main.css" type="text/css" charset="utf-8">

    <script type="text/javascript">
      var map = null;
      function getMap() {
        map = new Microsoft.Maps.Map(document.getElementById('myMap'), {credentials: 'AgobzOgArMDklOAvAwjqTAtbly6SUNNYzA9gCCJbbMcPTYoEUtURLHmKzsJpURtp'});
      }   
    </script>
</head>

<!--DOCUMENT BODY-->
<body> 
  <script>
    $(document).ready(function(){
      getMap(); //loads map
    });
  </script>
  <div id='myMap'></div>
</body>

</html>
