<?php

require_once 'interfaces/IObserver.php';

class Flower implements IObserver {

  private $nectar = 10;
  private $isEmpty = false;
  private $isOpen = false;

  public function __construct() {
  }

  public function hourChange(ISubject $subject) {
    //photosynthesising
  }

  public function dayStart(ISubject $subject) {
    $this->isOpen = true;
  }

  public function dayEnd(ISubject $subject) {
    $this->isOpen = false;
  }

  public function getNectar() {
    return $this->nectar;
  }

  public function provideNectar() {
    if($this->nectar > 0) {
      $this->nectar = $this->nectar - 1;
      return true;
      print('necar given'.PHP_EOL);
    } else {
      print('necar given'.PHP_EOL);
      return false;
    }
  }

  public function isEmpty() {
    if($this->nectar == 0) {
      return true;
    } else {
      return false;
    }
  }

}

?>