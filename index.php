<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>StoryMap - A new way to see the world</title>
    <link rel="stylesheet" href="/stylesheets/main.css" type="text/css" charset="utf-8">
    <script type="text/javascript" src="http://ecn.dev.virtualearth.net/mapcontrol/mapcontrol.ashx?v=7.0"></script>
    <script type="text/javascript">
      var map = null;
      function getMap() {
        map = new Microsoft.Maps.Map(document.getElementById('myMap'), {credentials: 'AgobzOgArMDklOAvAwjqTAtbly6SUNNYzA9gCCJbbMcPTYoEUtURLHmKzsJpURtp'});
      }   
    </script>
</head>

<body onload="getMap();">
  <div id='myMap' style="position:relative; width:400px; height:400px;"></div>
</body>
</html>
