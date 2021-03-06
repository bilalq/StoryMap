<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

<!--DOCUMENT HEAD-->
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>StoryMap - A new way to see the world</title>

    <script type="text/javascript" src='javascripts/jquery/jquery-1.7.1.min.js'></script>
    <script type="text/javascript" src="http://ecn.dev.virtualearth.net/mapcontrol/mapcontrol.ashx?v=7.0"></script>

    <link rel="stylesheet" href="/stylesheets/main.css" type="text/css" charset="utf-8">

    <script type="text/javascript">
      var theWindow = $(window);
      var map = null;
      function getMap() {
        map = new Microsoft.Maps.Map(document.getElementById('myMap'), {
          credentials: 'AgobzOgArMDklOAvAwjqTAtbly6SUNNYzA9gCCJbbMcPTYoEUtURLHmKzsJpURtp',
          enableClickableLogo: false,
          enableSearchLogo: false,
          disableZooming: true,
          showDashboard: false,
          showScalebar: false,
          width: theWindow.width()-20,
          height: theWindow.height()-20,
          zoom: 5,
          center: new Microsoft.Maps.Location(47.393264770508, 14.9493569946289)
//          center: new Microsoft.Maps.Location(40.7393264770508, -73.9893569946289)
        });
      }   
    </script>
</head>

<!--DOCUMENT BODY-->
<body> 
  <script>
    $(document).ready(function(){
      getMap(); //loads map
      var count = 3;
      $.ajax({
        url: "backend/jsoncreate.php",
        success: function(data){
           var points = data;
           var i=0;
           points.list.forEach(function(element) {
             if (i%3 == 0){
               addPin(element.lat, element.long, element.thumb);
             }
             i++;
           });
          }
        })
      
    });

    function addPin(lat, lng, thumb, elem) {
      var pushpinOptions = {icon:thumb, width: 75, height: 75}; 
      var pushpin= new Microsoft.Maps.Pushpin(new Microsoft.Maps.Location(lat,lng), pushpinOptions); 
      map.entities.push(pushpin);
    }
  </script>

  <!-- FULL CONTAINER DIV-->
  <div id="container">
    <div id="myMap"></div> <!-- Generated map -->
  </div>
  <!-- END CONTAINER DIV -->
</body>

</html>
