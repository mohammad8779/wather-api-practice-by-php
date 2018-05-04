<?php 
  
  error_reporting(0);
  $get = json_decode(file_get_contents('http://ip-api.com/json/'),true);
  
  date_default_timezone_set($get['timezone']);
  $city = $_GET['city'];
  $country = $_GET['country'];

  $string = "http://api.openweathermap.org/data/2.5/weather?q=".$city.",".$country."&appid=52ef31bacd720bd30f912bd6a1697773";
  $data = json_decode(file_get_contents($string),true);

  $temp = $data['main']['temp'];
  $icon = $data['weather'][0]['icon'];
  $visivility = $data['visivility'];
  $visivilitykm = visivilitykm / 1000;
  $logo = "<center><img src='http://openweathermap.org/img/w/".$icon.".png'></center>";
  $desc = "<b>Description: <p>".$data['weather'][0]['description']."</p></b>";

  $temperature = "<b>Temperature: ".$temp."°С</b><br>";
  $clouds = "<b>Clouds: ".$data['clouds']['all']."%</b><br>";
  $humidity = "<b>Humidity: ".$data['main']['humidity']."%</b><br>";
  $windspeed = "<b>Wind Speed: ".$data['wind']['speed']."m/s</b><br>";
  $pressure = "<b>Pressure: ".$data['main']['pressure']."hpa</b><br>";
  $visivility = "<b>Visivility: ".$visivilitykm."km</b><br>";
  $sunrise = "<b>Sunrise: ".date('h:i A',$data['sys']['sunrise'])."</b><br>";
  $sunset = "<b>Sunset: ".date('h:i A',$data['sys']['sunset'])."</b><br>";
 

   
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Weather Report Of <?php echo $_GET['city'];?></title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="jumbotron.css" rel="stylesheet">
  </head>

  <body>

   

    <main role="main">

      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="jumbotron">
        <div class="container">
          <h1>Weather App</h1> <br/>
           <h5>Weather Details Of Your <?php echo $_GET['city'];?></h5>
          <table class="table table-hover table-dark">
            <thead>
              <tr>
                <th scope="col">Option Name</th>
                 <th></th>
                <th scope="col">Option Value</th>
               
              </tr>
             </thead> 
            <tbody>
              <tr>
               <td colspan="2">Temperatures:</td>
                <td><?php echo $logo;?> <?php echo $temperature;?></td>
              </tr>
               
               <tr>
               <td colspan="2">Description:</td>
                <td><?php echo $desc;?></td>
              </tr>

              <tr>
               <td colspan="2">Clouds:</td>
                <td><?php echo $clouds;?></td>
              </tr>

              <tr>
               <td colspan="2">Humidity:</td>
                <td><?php echo $humidity;?></td>
              </tr>

              <tr>
               <td colspan="2">Wind Speed:</td>
                <td><?php echo $windspeed;?></td>
              </tr>

              <tr>
               <td colspan="2">Pressure:</td>
                <td><?php echo $pressure;?></td>
              </tr>

              <tr>
               <td colspan="2">Visivility:</td>
                <td><?php echo $visivility;?></td>
              </tr>

              <tr>
               <td colspan="2">Sunrise:</td>
                <td><?php echo $sunrise;?></td>
              </tr>
              <tr>
               <td colspan="2">Sunset:</td>
                <td><?php echo $sunset;?></td>
              </tr>
              
             
            </tbody>

           </table>
           
        </div>
      </div>

     

    </main>

    <footer class="container">
      <p>&copy; All Reserves By Locus  2018</p>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
   
  </body>
</html>
