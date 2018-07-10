<?php
$jsonweater = file_get_contents('http://api.openweathermap.org/data/2.5/forecast?id=524901&APPID=60b2ecd3825299ba193ac99f6a8268ed');
$link = 'http://api.openweathermap.org/data/2.5/forecast?id=524901&APPID=60b2ecd3825299ba193ac99f6a8268ed';
$jsonweater = file_get_contents($link) or exit('Не удалось получить данные');

$weather = json_decode($jsonweater) or exit('Ошибка декодирования json');
$weather->list[0]->main->temp -= 273.15;
$data = $weather->list[0];
$weather->list[0]->main->pressure = $weather->list[0]->main->pressure * 0.75;
 ?>

<!DOCTYPE html>
<html lang="ru" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Погода</title>
  </head>
  <body>
    <h1>Погода в москве</h1>
    <ul>
      <li><?php echo (!empty($data->main->temp)) ? 'Температура ' . round($data->main->temp) . ' градус цельсия'  : 'не удалось получить температуру'; ?>
      </li>
      <li><?php echo (!empty($data->main->pressure)) ? 'Атмосферное давление ' . round($data->main->pressure) . ' мм рт. ст.' : 'не удалось получить давление'; ?></li>
      <li><?php echo (!empty($data->weather[0]->main)) ?  'Погода ' . round($data->weather[0]->main) : 'не удалось получить данные' ; ?></li>
      <li><?php echo (!empty($data->wind->speed)) ? 'Скорость ветра ' . round($data->wind->speed) . 'м/с' : 'не удалось получить скорость ветра' ?></li>
      <li><?php echo $weather->list[0]->dt_txt . "<br>" ?></li>
      <li><?php echo $weather->city->name; ?></li>
    </ul>
  </body>
</html>
