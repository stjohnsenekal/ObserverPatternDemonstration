<?php

require_once 'interfaces/IObserver.php';

class Bird implements IObserver {

  private $isAwake = false;
  private $flowers = null;
  private $flowerMemory;

  public function __construct() {
    $this->flowerMemory = array(1,2,3,4,5,6,7,8,9);
  }

  public function introduceField($field) {
    $this->flowers = $field;
  }

  /* assumptions for this is that as per point 6 in the problem description the bird will gleefully forget which flowers 
      they have visited before while they have nectar, however if they are not empty they will remember the bitter taste of 
      emptiness and not visit again, which is a point of inference in this algorithm */
  public function hourChange(ISubject $subject) {
    if($this->isAwake) {

      $eaten = false;
      $count = 0;
      $currentNectar = 0;
      $memoryCount = count($this->flowerMemory);

      while ($eaten == false && $memoryCount > 0) {
        $count++;
        $key = array_rand($this->flowerMemory, 1); //picks a random flower that it does not recall to be empty
        if(!$this->flowers[$key]->isEmpty()) {
          $eaten = $this->flowers[$key]->provideNectar();
          if ($this->flowers[$key]->isEmpty()) {
            unset($this->flowerMemory[$key]);
            $memoryCount = count($this->flowerMemory);
            //print("emptied flower $key".PHP_EOL);
          }
        } 	
        
        $currentNectar = $this->flowers[$key]->getNectar();
        print("FLOWER-$key ($currentNectar)".PHP_EOL);
      }

      if($eaten == false) {
	exit(PHP_EOL."*ALL FLOWERS ARE EMPTY*".PHP_EOL.PHP_EOL);
      }
    } else {
        print("SLEEP".PHP_EOL);
    }
  }

  public function dayStart(ISubject $subject) {
    $this->isAwake = true;
  }

  public function dayEnd(ISubject $subject) {
    $this->isAwake = false;
  }

}

?>