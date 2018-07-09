<?php
$jsonweater = file_get_contents('http://api.openweathermap.org/data/2.5/forecast?id=524901&APPID=60b2ecd3825299ba193ac99f6a8268ed');

$weather = json_decode($jsonweater);
$weather->list[0]->main->temp = $weather->list[0]->main->temp - 273.15;
echo "Температура " . $weather->list[0]->main->temp . " градус цельсия <br>";
$weather->list[0]->main->pressure = $weather->list[0]->main->pressure * 0.75;
echo "Атмосферное давление " . $weather->list[0]->main->pressure . " мм рт. ст. <br>";
echo "Погода " . $weather->list[0]->weather[0]->main . "<br>";
echo "Скорость ветра " . $weather->list[0]->wind->speed . "м/с <br>";
echo $weather->list[0]->dt_txt . "<br>";;
echo $weather->city->name;
 ?>

<!DOCTYPE html>
<html lang="ru" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Погода</title>
  </head>
  <body>
  </body>
</html>
