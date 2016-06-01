<?php 

require 'lib/Sun.php';
require 'lib/Flower.php';
require 'lib/Bird.php';

  $sun = new Sun();
  $sunbird = new Bird();
  $fieldOfFlowers = array();

  $sun->attach($sunbird);

  for ($x = 0; $x <= 10; $x++) {
    array_push($fieldOfFlowers, new Flower()); 
    $sun->attach($fieldOfFlowers[$x]);
  } 

  $sunbird->introduceField($fieldOfFlowers);

  $stillFlowers = true;
  $day = -1;

  do {

  for($i = 0; $i < 24; $i++) {
    switch($i) {
    case 0:
      $day++;
      print(PHP_EOL."DAY START($day)".PHP_EOL.PHP_EOL);
      $sun->onDayStart();
      print("HOUR CHANGE($i)".PHP_EOL);
      $sun->updateHour();
      break;
    case 11:
      print(PHP_EOL."HOUR CHANGE($i)".PHP_EOL);
      $sun->updateHour();
      $sun->onDayEnd();
      print(PHP_EOL."DAY END($i)".PHP_EOL);
      break;
    default:
      print(PHP_EOL."HOUR CHANGE($i)".PHP_EOL);
      $sun->updateHour();
      break;
    }
  }

  } while ($stillFlowers);


?>