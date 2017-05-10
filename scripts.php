<?php
header('Content-Type: text/html; charset=utf-8');

echo "hello<br>";

# bikes today
$response = file_get_contents('https://apis.is/cyclecounter'); 
$cycles = json_decode($response, true);
#echo json_last_error();
#echo var_dump($cycles);
#echo "<br>";
echo "Bikes today are ".$cycles['results'][0]["DayCount"]."<br><br>";


#concerts
$response = file_get_contents('https://apis.is/concerts');
$concerts = json_decode($response, true);
$x = 0; #number of upcoming conert, could loop through a bunch if needed
echo "Next concert in Iceland is ".$concerts['results'][$x]["eventDateName"]." and is in ".$concerts['results'][$x]["eventHallName"]." at ".gmdate('H:i, d. M Y',strtotime($concerts['results'][$x]["dateOfShow"]));
echo "<br>";
echo "<img src=".$concerts['results'][$x]['imageSource']." alt='Concert picture'>";
echo "<br><br>";


#weather
$response = file_get_contents('https://apis.is/weather/forecasts/en?stations=1');
$forecast = json_decode($response, true);
# "F" = windspeed, "FG" = top wind, "D" = direction of wind, "T" = temperature, "W" = weather disciption, "N" = cloud percentage, "R" = rain amount, more info: http://www.vedur.is/media/vedurstofan/XML-thjonusta.pdf
#echo var_dump($forecast);
$time = 3;
echo "The weather in Reykjavík at ".gmdate('H:i, d. M Y',strtotime($forecast['results'][0]['forecast'][$time]['ftime'])).":<br>";
echo $forecast['results'][0]['forecast'][$time]['T']." °C, ".$forecast['results'][0]['forecast'][$time]['F']." m/s and ".strtolower($forecast['results'][0]['forecast'][$time]['W']);
echo "<br>with ".$forecast['results'][0]['forecast'][$time]['R']." mm/hour of rain";
echo "<br>";


#currency ####BROKEN#### USE jQuery or whatevs
$response = file_get_contents('https://apis.is/currency/lb'); # /currency/{m5,arion,lb}, {m5.is, arionbanki, landsbanki}
$currency = json_decode($response, true);
echo '<select id="curr" name="curr">';
echo '<option value="0">Currency</option>';
echo '<option value="USD">USD</option>';
echo '<option value="CAD">CAD</option>';
echo '<option value="DKK">DKK</option>';
echo '</select>';
if($_POST['submit'] && $_POST['submit'] != 0)
{
   $curr=$_POST['submit'];
   echo $curr;
}


?>
