<?php

require 'interfaces/ISubject.php';

class Sun implements ISubject {

  private $hour = 0;

  private $observers = array();

  function __construct() {
  }

  function attach(IObserver $observer) {
    array_push($this->observers, $observer);
  }

  function detach(IObserver $observer) {
    foreach($this->observers as $key => $val) {
      if ($val == $observer) { 
        unset($this->observers[$key]);
      }
    }
  }

  function onHourChange() {
    foreach($this->observers as $observer) {
      $observer->hourChange($this);
    }
  }

  function onDayStart() {
    foreach($this->observers as $observer) {
      $observer->dayStart($this);
    }
  }

  function onDayEnd() {
    foreach($this->observers as $observer) {
      $observer->dayEnd($this);
    }
  }

  function updateHour() {
    $this->hour = $this->hour + 1;
    $this->onHourChange();
  }

  function getHour() {
    return $this->hour;
  }
}

?>