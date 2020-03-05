  <?php
$apiKey = "a27da409970657af869f26fef6c2eb2f"; //You will need to add in the 
$cityName = "Shakopee"; //5046997 Shakopee City Id
$tableColor = "#539cff"; //Changes the background color of the weather table

$units = "imperial";//metric-Celcius  imperial-Farhenheit
if ($units == 'metric'){//Changes the $temp varaible to match 
    $temp = "C";
    $speed = "km/h";
}
else {
    $temp = "F";
    $speed = "mph";
}

$googleApiUrl = "http://api.openweathermap.org/data/2.5/weather?q=" . $cityName . "&lang=en&units=" . $units . "&APPID=" . $apiKey;

//http://api.openweathermap.org/data/2.5/weather?q=Shakopee&lang=en&units=imperial&APPID=a27da409970657af869f26fef6c2eb2f

$ch = curl_init();

curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_VERBOSE, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($ch);

curl_close($ch);
$data = json_decode($response);
$currentTime = time();

$sunsetTime = ($data->sys->sunset); //Gives the time for sunset
$sunriseTime = ($data->sys->sunrise); //Gives the time for sunrise

$curtemp = ($data->main->temp);
$maxTemp = ($data->main->temp_max);
$minTemp = ($data->main->temp_min);

if (($curtemp) > 32){
    $currentColor = "#ffb026";
}else{
    $currentColor = "#0069e0";
}

if (($maxTemp) > 32){
    $maxColor = "#ffb026";
}else{
    $maxColor = "#0069e0";
}

if (($minTemp) > 32){
    $minColor = "#ffb026";
}else{
    $minColor = "#0069e0";
}


echo '<script type="text/JavaScript">  
        prompt("This is JavaScript run in PHP!");
     </script>'
    ;

?>


  <!doctype html>
  <html>

  <head>

      <title>Forecast Weather using OpenWeatherMap with PHP</title>

      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
      <style>
          body {
              font-family: Arial;
              font-size: 0.95em;
              color: #929292;
          }

          .report-container {
              border: #E0E0E0 1px solid;
              padding: 20px 40px 40px 40px;
              border-radius: 2px;
              width: 550px;
              margin: 0 auto;
          }

          .weather-icon {
              margin-right: 5px;
          }

          .weather-forecast {
              color: #212121;
              font-size: 1.2em;
              font-weight: bold;
              margin: 20px 0px;
          }

          .weatherTable {
              text-align: center;
          }

          thead {
              background-color: <?php echo $tableColor;
              ?>
          }

          .weatherColumn {
              border: 1px solid #555555;
              padding: 5px;
              color: #000000;
          }

          .time {
              line-height: 25px;
          }

          .heading {
              text-align: center;
              color: #000000;
          }

      </style>

  </head>

  <body>
      <h2 class='heading'><?php echo $data->name; ?> Weather Status</h2>
      <div class="report-container">
          <div class="time">
              <div><?php echo date("l g:i a", $currentTime); ?></div>
              <div><?php echo date("jS F, Y",$currentTime); ?></div>
              <div id='sunsetTimeDisplay'>Sunset Time: </div>
              <div id='sunriseTimeDisplay' style='margin-top:2px;'>Sunrise Time: </div>
          </div>

          <h2 style='margin-top:10px;'>Weather Report</h2>
          <div>
              <table>
                  <tr>
                      <td>
                          <img src="http://openweathermap.org/img/w/<?php echo $data->weather[0]->icon; ?>.png" class="weather-icon" />
                      </td>
                      <td>
                          <p style='margin-bottom:15px;'><?php echo ucwords($data->weather[0]->description); ?></p>
                      </td>
                  </tr>
              </table>

              <table class='weatherTable'>
                  <thead>
                      <td class='weatherColumn'>Current Temp</td>
                      <td class='weatherColumn'>Min Temp</td>
                      <td class='weatherColumn'>Max Temp</td>
                  </thead>

                  <tr>
                      <td class='weatherColumn'><?php echo $data->main->temp; ?>&deg;<?php echo $temp; ?></td>
                      <td class='weatherColumn'><?php echo $data->main->temp_min; ?>&deg;<?php echo $temp; ?></td>
                      <td class='weatherColumn'><?php echo $data->main->temp_max; ?>&deg;<?php echo $temp; ?></td>
                  </tr>
              </table>
              <div></div>
          </div>

          <div class="time">
              <div>Humidity: <?php echo $data->main->humidity; ?> %</div>
              <div>Wind: <?php echo $data->wind->speed; ?><?php echo $speed; ?></div>
          </div>
      </div>

      <script>
          var sunsetDate = new Date(<?php echo $sunsetTime?> * 1000);
          var hour = sunsetDate.getHours(),
              minutes = "0" + sunsetDate.getMinutes();
          var ampm = " AM";
          if (hour > 12) {
              var hours = hour - 12;
              ampm = " PM";
          }
          var formattedTime = hours + ':' + minutes.substr(-2) + ampm;
          document.getElementById("sunsetTimeDisplay").innerHTML = "Sunset Time: " + formattedTime;


          var sunriseDate = new Date(<?php echo $sunriseTime?> * 1000)
          var hour = sunriseDate.getHours(),
              minutes = "0" + sunriseDate.getMinutes();
          var ampm = " AM";
          if (hour > 12) {
              var rhours = hour - 12;
              ampm = " PM";
          } else {
              var rhours = hour;
          }
          var formattedTime2 = rhours + ':' + minutes.substr(-2) + ampm;
          document.getElementById("sunriseTimeDisplay").innerHTML = "Sunrise Time: " + formattedTime2;

      </script>
  </body>

  </html>
